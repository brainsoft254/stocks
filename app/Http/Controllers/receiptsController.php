<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\receipt;
use App\receipt_detail;
use Stockspro;
use DB;
use Auth;
use App\location;
use App\client;
use Carbon\Carbon;
use App\invoice;
use App\account;


class receiptsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipts=receipt::OrderBy('rno','desc')->get();
        return view('accounting.receivables.receipts.index')->with(['receipts'=>$receipts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings=DB::table("settings")->first();
        $accounts=account::whereRaw("type in ('bank','cash') and status=1")->get();
        $invoices=DB::table("invoices")->select(DB::raw("invno,invdate,clcode,get_client_name(clcode)as clname,lpo, amount,vat,amount_paid,getParent(clcode) as parent"))->orderBy('invdate','asc')->get();

        $locations=location::where('status',1)->orderBy('code','desc')->get();
        $clients=client::where('status',1)->orderBy('code','asc')->get();
        //$clients=DB::table("clients")->select(DB::raw("code,name,isVatExc(code)as vatexc"))->where('status',1)->orderBy('code','asc')->get();
        return view('accounting.receivables.receipts.create')->with(['accounts'=>$accounts,'invoices'=>$invoices,'locations'=>$locations,'clients'=>$clients,'settings'=>$settings]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   //dd($request->input());
       $this->validate($request,[
        'trandate'=>'required',
        'account'=>'required|not_in:-1',
        'bankdate'=>'required',
        'chequeno'=>'required',
        'remarks'=>'required',
        'location'=> 'required|not_in:-1',
        'client'=> 'required|not_in:-1',
        'amount'=>'required|numeric|min:1',
        'wtax'=>'required|numeric|min:0',
        'factax'=>'required|numeric|min:0',
        'totaldue'=>'required|numeric|min:1',
        'totalpaid'=>'required|numeric|min:1',
    ]);
       DB::beginTransaction();
       try{
        $rct=new receipt;
        $rct->rno=Stockspro::getNextNumber("RECEIPT",1);
        $rct->trandate=$request->trandate;
        $rct->bankdate=$request->bankdate;
        $rct->clcode=$request->client;
        $rct->account=$request->account;
        $rct->amount=$request->amount;
        $rct->balcf=$request->totalcf;
        $rct->wtax=$request->wtax;
        $rct->factax=$request->factax;
        $rct->remarks=$request->remarks;
        $rct->chequeno=$request->chequeno;
        $rct->location=$request->location;
        $rct->refno=$request->refno;
        $rct->parent=($request->parent=='on'?1:0);
        $rct->staff=Auth::user()->email;
        $rct->inwords="";
        $rct->status=0;
        $rct->save();


        $count=count($request->invno);

        for ($i=0; $i <$count ; $i++)
        { 
            if($request->payme[$i]>0){

                $rctd=new receipt_detail;
                $rctd->rno=$rct->rno;
                $rctd->invno=$request->invno[$i];
                $rctd->invdate=$request->invdate[$i];
                $rctd->due=str_replace(",","",$request->due[$i]);
                $rctd->paid=str_replace(",","",$request->paid[$i]);
                $rctd->source=$request->clcodex[$i];
                $rctd->lpo=$request->lpo[$i];
                $rctd->loc=$request->location;
                $rctd->save();
            }

        }
        DB::select("CALL do_post_receipt('".$rct->rno."','".Auth::user()->email."',0)");
        DB::commit();
        Stockspro::auditLog("Receipt RCT-".$rct->rno." Created Successfully");
        return "Receipt Rct-".$rct->rno." Created Successfully";
    }catch(\Exception $e){
       // dd($e);
        //if there is an error/exception in the above code before commit, it'll rollback
        DB::rollBack();
        return $e->getMessage();
    }
}

/*1245098777
5mby13*/
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receipt=receipt::findorFail($id);

        $details=$receipt->receipt_details;
        $coy=Stockspro::getCoy();
        $now=Carbon::now()->toDateTimeString();
        return view('reports.receipts.print-receipt')->with(['receipt'=>$receipt,'details'=>$details,'coy'=>$coy,'tstamp'=>$now]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reverseReceipt(Request $request)
    {
       $rct=receipt::findorFail($request->id);
       if($rct->status==0){
            $resp = array('flag' =>0,'msg'=>"Sorry !, Receipt Already Reversed " );
             return json_encode($resp);

        }else{
            DB::select("CALL do_post_receipt('".$rct->rno."','".Auth::user()->email."',1)");
            DB::commit();
            Stockspro::auditLog("Receipt RCT-".$rct->rno." Reversed Successfully");

            $resp = array('flag' =>0,'msg'=>"Receipt Rct-".$rct->rno." Reversed Successfully" );
             return json_encode($resp);
        }
    }


}
