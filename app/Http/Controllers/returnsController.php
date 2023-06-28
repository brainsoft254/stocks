<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\sreturn;
use App\sreturn_detail as return_detail;
use Stockspro;
use Auth;
class returnsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $returns=DB::table('returns')->OrderBy('id','desc')->get();


        return view('trans.returns.index')->with(['returns'=>$returns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations=DB::table('locations')->where('status',1)->get();
        $clients=DB::table('clients')->where('status',1)->get();
        return view('trans.returns.create')->with(['clients'=>$clients,'locations'=>$locations]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function without_invoice()
    {
        $clients=DB::table('clients')->where('status',1)->get();
        $items=DB::table('items')->where('status',1)->orderBy('code','desc')->get();
        $units=DB::table('units')->where('status',1)->orderBy('code','desc')->get();
        $locations=DB::table('locations')->where('status',1)->orderBy('code','desc')->get();


        return view('trans.returns.create_without_invoice')->with(['clients'=>$clients,'locations'=>$locations,'units'=>$units]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'trandate'=>'required',
            'remarks'=>'required',
            'location'=> 'required|not_in:-1',
            'rtmode'=> 'required|not_in:-1',
            'crinvno'=>'required',
            'gtotal'=>'required',
        ]);
        //dd($request);

        $refno = Stockspro::getNextNumber('RETURNS', 1);

        $count=count($request->icode);

        if($request->rtype){
            
            for ($i=0; $i <$count ; $i++)
            { 
               if($request->selcode[$i]>0){
                    $return_d = new return_detail;
                   $return_d->refno=$refno;
                   $return_d->icode=$request->icode[$i];
                   $return_d->idesc=$request->idesc[$i];
                   $return_d->uom=$request->punit[$i];
                   $return_d->qty=$request->qty[$i];
                   $return_d->rate=$request->rate[$i];
                   $return_d->vat=$request->vat[$i];
                   $return_d->total=$request->total[$i];
                   $return_d->save();
               }

           }
        }else{

            for ($i = 0; $i < $count; $i++) {
                $return_d = new return_detail;
                   $return_d->refno=$refno;
                   $return_d->icode=$request->icode[$i];
                   $return_d->idesc=$request->idesc[$i];
                   $return_d->uom=$request->uom[$i];
                   $return_d->qty=$request->qty[$i];
                   $return_d->rate=$request->rate[$i];
                   $return_d->vat=$request->vat[$i];
                   $return_d->total=$request->total[$i];
                   $return_d->save();
           }  

        }

        $return = new sreturn;
        $return->refno = $refno;
        $return->clcode = $request->clcode;
        $return->amount = $request->gtotal;
        $return->trandate = $request->trandate;
        $return->vat = $request->gvat;
        $return->status = 0;
        $return->cltype = $request->cltype;
        $return->invno = $request->crinvno;
        $return->remarks = $request->remarks;
        $return->location = $request->location;
        $return->rtmode = $request->rtmode;
        $return->rtype = $request->rtype;
        $return->staff = Auth::user()->email;
        $return->save();



        //send a telegram message for approval
        // $clname = Stockspro::getClientName($return->clcode);
        // $urli = env('APP_URL');
        // $msg = <<<TMSG
        // <b>RETURN-CREDITNOTE-{$return->refno}</b>\n<b>CLIENT:</b>{$clname}\n<b>CR.AMOUNT:</b>KES {$request->gtotal}\n<b>REMARKS:</b>{$request->remarks}\n<b>INVOICENO:</b>{$return->invno}\n
        // <a href="{$urli}post-return?id={$return->id}&post=1">APPROVE RETURNS-CREDITNOTE</a>
        // TMSG;

        // //dd($msg);

        // Stockspro::sendTelegram($msg);

       Stockspro::auditLog("Return-".$refno." Created Successfully");
       return "Return -".$refno." Created Successfully";
   }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ret=sreturn::findorFail($id);
        $coy=Stockspro::getCoy();
        $tstamp=Stockspro::getTimestamp();

        return view('trans.returns.view')->with(['ret'=>$ret,'coy'=>$coy,'tstamp'=>$tstamp]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $return=sreturn::findorFail($id);
        $invoice=DB::table('invoices')->where(['invno'=>$return->invno])->first();
        $locations=DB::table('locations')->where('status',1)->get();
        $units=DB::table('units')->where('status',1)->orderBy('code','desc')->get();

        $clients=DB::table('clients')->where('status',1)->get();
        if($return->rtype>0){
         return view('trans.returns.edit')->with(['return'=>$return,'invoice'=>$invoice,'clients'=>$clients,'locations'=>$locations]);
        }else{
        return view('trans.returns.edit_without_invoice')->with(['return'=>$return,'clients'=>$clients,'units'=>$units,'locations'=>$locations]);
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
       // dd($request);
        $this->validate($request,[
            'refno'=>'required',
            'trandate'=>'required',
            'remarks'=>'required',
            'location'=> 'required|not_in:-1',
            'rtmode'=> 'required|not_in:-1',
            'crinvno'=>'required',
            'gtotal'=>'required',
        ]);

        $return=sreturn::findorFail($id);
        $return->refno=$request->refno;
        $return->clcode=$request->clcode;
        $return->amount=$request->gtotal;
        $return->trandate=$request->trandate;
        $return->vat=$request->gvat;
        $return->status=0;
        $return->cltype=$request->cltype;
        $return->invno=$request->crinvno;
        $return->remarks=$request->remarks;
        $return->location=$request->location;
        $return->rtmode=$request->rtmode;
        $return->rtype=$request->rtype;
        $return->staff=Auth::user()->email;
        $return->save();

        $return->return_details()->delete();

        $count=count($request->icode);


        if($request->rtype){
            for ($i=0; $i <$count ; $i++)
            { 
               if($request->selcode[$i]>0){
                    $return_d = new return_detail;
                   $return_d->refno=$request->refno;
                   $return_d->icode=$request->icode[$i];
                   $return_d->idesc=$request->idesc[$i];
                   $return_d->uom=$request->punit[$i];
                   $return_d->qty=$request->qty[$i];
                   $return_d->rate=$request->rate[$i];
                   $return_d->vat=$request->vat[$i];
                   $return_d->total=$request->total[$i];
                   $return_d->save();
               }

           }
        }else{
          for ($i=0; $i <$count ; $i++) {
                $return_d = new return_detail;
                   $return_d->refno=$request->refno;
                   $return_d->icode=$request->icode[$i];
                   $return_d->idesc=$request->idesc[$i];
                   $return_d->uom=$request->uom[$i];
                   $return_d->qty=$request->qty[$i];
                   $return_d->rate=$request->rate[$i];
                   $return_d->vat=$request->vat[$i];
                   $return_d->total=$request->total[$i];
                   $return_d->save();
           }  

        }

       Stockspro::auditLog("Return-".$request->refno." Updated Successfully");
       return "Return -".$request->refno." Updated Successfully";
   }

   public function postReturn(Request $request)
   {

    $ret=sreturn::findorFail($request->id);
    if($request->post>0){  

        if($ret->status>0){
            $resp = array('flag' =>0,'msg'=>"Sorry !, Return Already posted " );
            return json_encode($resp);
        }

        DB::select("call do_post_returns('".$ret->refno."','".Auth::user()->email."',1)");
        Stockspro::auditLog("Stock return with refno ".$request->refno." from Invno ~".$ret->invno." Posted Successfully");
        $resp = array('flag' =>1,'msg'=>"Return Posted Successfully!" );
    }else{
        DB::select("call do_post_returns('".$ret->refno."','".Auth::user()->email."',0)");
        Stockspro::auditLog("Stock return with refno ".$request->refno." from Invno ~".$ret->invno." Reversed Successfully");
        $resp = array('flag' =>1,'msg'=>"Return Reversed Successfully!" );                
    }

    return json_encode($resp);

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $return=sreturn::findorFail($id);
        if($return->status>0){return "Cant Delete a posted Return. Reverse & Try Again";}
        $return->return_details()->delete();
        $return->destroy($id);
        Stockspro::auditLog("Deleted Return ".$return->refno);
        return "Return ".$return->refno. "Deleted Successfully";
    }

    public function getInvoices(Request $request)
    {
        //DB::enableQueryLog();
        if($request->parent==0)
        {
            $invoices=DB::table('invoices')->where(['clcode'=>$request->client])
            ->whereBetween('invdate',array($request->dfrom,$request->dto))
            ->OrderBy('invdate','asc')
            ->get();
        }else{

            $invoices=DB::table('invoices')
            ->whereBetween('invdate',array($request->dfrom,$request->dto))
            ->where(DB::raw('getParent(clcode)'),$request->client)
            ->OrderBy('invdate','asc')
            ->get();
        }
           // dd($invoices);
        return view('trans.returns.cl_invoices')->with(['invoices'=>$invoices,'parent'=>$request->parent]);
    }

    public function getInvoiceItems(Request $request)
    {
        return Stockspro::getInvoiceItems($request->invno);
    }
}