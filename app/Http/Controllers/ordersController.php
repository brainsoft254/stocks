<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\order_detail;
use Stockspro;
use DB;
use App\client;
use App\location;
use App\items;
use Auth;
use Carbon\Carbon;
use PDF;
use App\discount;
use App\account;
use App\receipt;
use App\receipt_detail;

class ordersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=order::orderBy('trandate','desc')->limit(800)->get();
        return view('trans.orders.index')->with(['orders'=>$orders]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items=items::where('status',1)->orderBy('code','desc')->get();
        $units=DB::table('units')->where('status',1)->orderBy('code','desc')->get();
        $locations=location::where('status',1)->orderBy('code','desc')->get();
        $clients=client::where('status',1)->orderBy('name','asc')->get();
        $discounts=discount::where('status',1)->orderBy('code','asc')->get();
        $clients=DB::table("clients")->select(DB::raw("code,name"))->where('status',1)->orderBy('code','asc')->get();
        $accounts=account::where('status',1)->whereRaw("type in ('bank','cash')")->get();
        
        if(!(Stockspro::get_settings()->ispos)){
            return view('trans.orders.create')->with(['items'=>$items,'units'=>$units,'locations'=>$locations,'clients'=>$clients,'discounts'=>$discounts]);
        }else{
            return view('trans.orders.createorder')->with(['items'=>$items,'units'=>$units,'locations'=>$locations,'clients'=>$clients,'discounts'=>$discounts,'accounts'=>$accounts]);
        }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request); exit();
       DB::beginTransaction();
        try {
            $this->validate($request,[
                'refno'=>'required|unique:orders',
                'trandate'=>'required',
                'remarks'=>'required',
                'location'=> 'required|not_in:-1',
                'client'=> 'required|not_in:-1',
                "itemcode"    => "required|array|min:1",
                "itemcode.*"  => "required|string|distinct|min:1|not_in:-1",
                "description.*"  => "required|string|distinct|min:1|not_in:-1",
                "qty.*"  => "required|numeric|min:1",
                "price.*"  => "required|numeric|min:1",
                "vat.*"  => "required|numeric|min:0",
                "total.*"  => "required|numeric|min:1",
                'vattotal'=>'required|numeric|min:0',
                'grosstotal'=>'required|numeric|min:1',
            ]);
            $vat_rate=Stockspro::vatRate();
            $vrate=(!(Stockspro::get_settings()->ispos)?$vat_rate:0);
            $tvrate=$vrate+100;
            $dvrate=$vrate/100;
            
            $orderrno =Stockspro::getNextNumber("RECEIPT",1);
            $nextNo = (!(Stockspro::get_settings()->ispos)?$request->refno:Stockspro::getNextNumber('CRINVOICE',1));
            
            $order=new order;
            $order->refno=$nextNo;
            $order->trandate=$request->trandate;
            $order->clcode=$request->client;
            $order->description=$request->remarks;
            $order->location=$request->location;
            $order->total=$request->grosstotal;
            $order->discount=$request->totaldisc;
            $order->discrate=$request->discount;
            if($request->vattotal=="0"){ //Added this line just to address the issues of VAT on vat less tree tomato product
                                         //It can be removed when the situatio  changes
                $order->tax="0";
            }else{
                $order->tax=(Stockspro::get_settings()->ispos?0:(Stockspro::isVatable($request->client)>0?$request->grosstotal*$dvrate:$request->grosstotal*$vrate/$tvrate));
            }
            $order->staff=Auth::user()->email;
            $order->ordertype=(isset($request->ordertype)? $request->ordertype : 0);
            $order->depositpaid=(isset($request->depositpaid)? Stockspro::stripCommas($request->depositpaid) : 0);
            $order->depositacct=$request->account;
            $order->postype=Stockspro::get_settings()->ispos;
            $order->deporno=$orderrno;
            $order->save();
            
            $count=count($request->itemcode);
            
            for ($i=0; $i <$count ; $i++)
            { 
                $order_d=new order_detail;
                $order_d->refno=$nextNo;
                $order_d->icode=$request->itemcode[$i];
                $order_d->description=$request->description[$i];
                $order_d->qty=$request->qty[$i];
                $order_d->uom=$request->uom[$i];
                $order_d->rate=$request->price[$i];
                if($request->itemcode[$i]=="2035394000000"){
                    $order_d->vat=0;//(Stockspro::isVatable($request->client)>0?$request->total[$i]*$dvrate:$request->total[$i]*$vrate/$tvrate);   
                }else{
                   $order_d->vat=(Stockspro::isVatable($request->client)>0?$request->total[$i]*$dvrate:$request->total[$i]*$vrate/$tvrate);
                }
                $order_d->total=$request->total[$i];
                
                $order_d->save();
            }
            if($request->depositpaid>0){
                $rct=new receipt;
                $rct->rno=$orderrno;
                $rct->trandate=$request->trandate;
                $rct->bankdate=$request->trandate;
                $rct->clcode=$request->client;
                $rct->account=$request->account;
                $rct->amount=$request->depositpaid;
                $rct->balcf=$request->balcf;
                $rct->wtax=0;
                $rct->factax=0;
                $rct->remarks=$request->remarks;
                $rct->chequeno='';
                $rct->location=$request->location;
                $rct->refno='';
                $rct->parent=0;
                $rct->staff=Auth::user()->email;
                $rct->inwords="";
                $rct->status=0;
                $rct->rtype=0;
                $rct->save();
            
                $rctd=new receipt_detail;
                $rctd->rno=$orderrno;
                $rctd->invno=$nextNo;
                $rctd->invdate=$request->trandate;
                $rctd->due=str_replace(",","",$request->grosstotal);
                $rctd->paid=str_replace(",","",$request->depositpaid);
                $rctd->source=$request->client;
                $rctd->lpo='';
                $rctd->loc=$request->location;
                $rctd->save();
            
            }            
            DB::commit();
            Stockspro::auditLog("Sales Order-".$request->refno." Created Successfully");
            return "Sales Order-".$request->refno." Created Successfully";
        } catch (\Throwable $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=order::findorFail($id);
        $details=$order->order_details;
        $coy=Stockspro::getCoy();
        $now=Carbon::now()->toDateTimeString();
        
        
        return view('reports.orders.print-order')->with(['order'=>$order,'details'=>$details,'coy'=>$coy,'tstamp'=>$now]);
    }
    
    public function getDeliveryNote(Request $request)
    {
        $order=order::findorFail($request->id);
        $details=$order->order_details;
        $coy=Stockspro::getCoy();
        $now=Carbon::now()->toDateTimeString();
        if($order->dno=='NOTA'){
          $order->update(['dno'=>Stockspro::getNextNumber('DNOTE',1)]);
        }
        
       
       
        if ($request->pdf) {
            
            $pdf = PDF::loadView('reports.orders.print-delivery-note-pdf', ['order' => $order, 'details' => $details, 'coy' => $coy, 'tstamp' => $now]);
            return $pdf->stream("DNOTE" . '-' . $order->refno . '.pdf');
        }
        
        if($request->assorted){
            
            $details = DB::table("order_details")->select(DB::raw("concat(get_item_categ(icode),'- (Assorted)') as description,rate,sum(qty) as qty,sum(vat) as vat,sum(total) as total "))
            ->where('refno', $order->refno)
            ->groupBy(DB::raw("get_item_categ(icode)"))
            ->get();
           
            
            $pdf = PDF::loadView('reports.orders.print-delivery-assorted-pdf', ['order' => $order, 'details' => $details, 'coy' => $coy, 'tstamp' => $now]);
            return $pdf->stream("DNOTE" . '-' . $order->refno . '.pdf');
        }
    
        return view('reports.orders.print-delivery-note')->with(['order'=>$order,'details'=>$details,'coy'=>$coy,'tstamp'=>$now]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $order=order::findorFail($id);
       $items=items::where('status',1)->orderBy('code','desc')->get();
       $units=DB::table('units')->where('status',1)->orderBy('code','desc')->get();
       $locations=location::where('status',1)->orderBy('code','desc')->get();
       $clients=client::where('status',1)->orderBy('code','asc')->get();
       $discounts=discount::where('status',1)->orderBy('code','asc')->get();
       $accounts=account::where('status',1)->whereRaw("type in ('bank','cash')")->get();
        
       if(!(Stockspro::get_settings()->ispos)){
          return view('trans.orders.edit')->with(['items'=>$items,'units'=>$units,'locations'=>$locations,'clients'=>$clients,'order'=>$order,'discounts'=>$discounts]);
       }else{
        return view('trans.orders.editorder')->with(['items'=>$items,'units'=>$units,'locations'=>$locations,'clients'=>$clients,'order'=>$order,'accounts'=>$accounts]);
    }
   }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $this->validate($request,[
                // 'refno'=>'required|alpha_num',
                'trandate'=>'required',
                'remarks'=>'required',
                'location'=> 'required|not_in:-1',
                'client'=> 'required|not_in:-1',
                "itemcode"    => "required|array|min:1",
                "itemcode.*"  => "required|string|distinct|min:1|not_in:-1",
                "description.*"  => "required|string|distinct|min:1|not_in:-1",
                "qty.*"  => "required|numeric|min:1",
                "price.*"  => "required|numeric|min:1",
                "vat.*"  => "required|numeric|min:0",
                "total.*"  => "required|numeric|min:1",
                'vattotal'=>'required|numeric|min:0',
                'grosstotal'=>'required|numeric|min:1',
            ]);
            
            $vat_rate=Stockspro::vatRate();
            $vrate=(!(Stockspro::get_settings()->ispos)?$vat_rate:0);
            $tvrate=$vrate+100;
            $dvrate=$vrate/100;
            
            $order=order::findorFail($id);
            $order->refno=$request->refno;
            $order->trandate=$request->trandate;
            $order->clcode=$request->client;
            $order->description=$request->remarks;
            $order->location=$request->location;
            $order->voucherno=$request->voucherno;
            $order->total=$request->grosstotal;
            $order->discount=$request->totaldisc;
            $order->discrate=$request->discount;
            
            $order->tax=(Stockspro::get_settings()->ispos?0:(Stockspro::isVatable($request->client)>0?$request->grosstotal*$dvrate:$request->grosstotal*$vrate/$tvrate));
            $order->staff=Auth::user()->email;
            $order->ordertype=(isset($request->ordertype)? $request->ordertype : 0);
            $order->depositpaid=(isset($request->depositpaid)? Stockspro::stripCommas($request->depositpaid) : 0);
            $order->depositacct=$request->account;
            $order->postype=Stockspro::get_settings()->ispos;
            $order->save();
            if((Stockspro::get_settings()->ispos) && ($request->depositpaid>0)){
                receipt::where('rno',$order->deporno)->update(['trandate'=>$request->trandate,'clcode'=>$request->client,'account'=>$request->account,'balcf'=>($request->balcf)*-1,'location'=>$request->location,'amount'=>Stockspro::stripCommas($request->depositpaid)]);
            }
            $order->order_details()->delete();
    
            $count=count($request->itemcode);
    
            for ($i=0; $i <$count ; $i++)
            { 
                $order_d=new order_detail;
                $order_d->refno=$request->refno;
                $order_d->icode=$request->itemcode[$i];
                $order_d->description=$request->description[$i];
                $order_d->qty=$request->qty[$i];
                $order_d->uom=$request->uom[$i];
                $order_d->rate=$request->price[$i];
                $order_d->vat=(Stockspro::isVatable($request->client)>0?$request->total[$i]*$dvrate:$request->total[$i]*$vrate/$tvrate);
                $order_d->total=$request->total[$i];
                $order_d->save();
            }
    
            Stockspro::auditLog("Sales Order-".$request->refno." Updated Successfully");
            return "Sales Order-".$request->refno." Updated Successfully";
    
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order=order::findorFail($id);
        if($order->status>0){return "Cant Delete a posted Order. Reverse & Try Again";}
        $order->order_details()->delete();
        $order->destroy($id);
        receipt::where('rno',$order->deporno)->delete();
        Stockspro::auditLog("Deleted Order ".$order->refno);
        return "Sales Order ".$order->refno. "Deleted Successfully";
    
    }
    
    
    public function getItemQty(Request $request)
    {
        return Stockspro::getItemQty($request->item,$request->loc);
    }

    public function getNewRow(Request $request)
    {
       // $items=items::where('status',1)->orderBy('code','desc')->get();
        $items= Stockspro::getItems();
        $units=DB::table('units')->where('status',1)->orderBy('code','desc')->get();
        $clientcode=$request->client;
        $rid=$request->rid;
        return view('trans.orders.row')->with(['items'=>$items,'units'=>$units,'clientcode'=>$clientcode,'rid'=>$rid]);
    }

    public function postSalesOrder(Request $request)
    {  
        $resp="";
        $order=order::findorFail($request->id);
        if($request->post){
            
            if(Stockspro::isOrderServiceable($order->refno)){
                if($order->status>0){
                    $resp = array('flag' =>0,'msg'=>"Sorry !, Order Already posted " );
                    return json_encode($resp);
                }
                DB::select("call do_post_order('".$order->refno."','".Auth::user()->email."',0)");
                $resp = array('flag' =>1,'msg'=>"Order Posted Successfully!" );
                
                return json_encode($resp);
            }else{
                $msglog=Stockspro::getqtyLog($order->location,$order->refno);
                $resp = array('flag' =>0,'msg'=>"Sorry !,\n\rInsufficient Item Quantities to service the Order!\n\rEdit & Try Again \n\r Check this Item\n\r.......\n\r".$msglog );
                return json_encode($resp);
            }
        }else{
            if($order->status<1){
                $resp = array('flag' =>0,'msg'=>"Sorry !, Order Not Posted " );
                return json_encode($resp);
            }
            /*Check if invoice has been unlocked for reversal*/
            if(Stockspro::islocked($order->invno)){
                $resp = array('flag' =>0,'msg'=>"Sorry!\n\rCan`t Reverse an Order with a LOCKED corresponding Invoice!\r\n Unlock the Invoice first & Try Again" );
                return json_encode($resp);
            }

            DB::select("call do_post_order('".$order->refno."','".Auth::user()->email."',1)");
            $resp = array('flag' =>1,'msg'=>"Order Reversed Successfully!" );

            return json_encode($resp);

        }
    }
}
