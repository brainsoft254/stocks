<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\creditnote;
use App\creditnote_detail;
use DB;
use Stockspro;
use Carbon\Carbon;
use Auth;

class creditnotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creditnotes=creditnote::OrderBy('id','desc')->get();
        return view('accounting.creditnotes.index')->with(['creditnotes'=>$creditnotes]);
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
        return view('accounting.creditnotes.create')->with(['clients'=>$clients,'locations'=>$locations]);
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
        'clcode'=>'required',
        'cltype'=> 'required|not_in: -1',
        'location'=> 'required|not_in: -1',
        'gtotal'=> 'required',

    ]);

        //dd($request);
        $uniqueREF = Stockspro::getNextNumber('CREDITNOTE', 1);

     $count=count($request->invno);
     for ($i=0; $i <$count ; $i++)
     { 
        if($request->cramt[$i]>0){
            $crnote_d=new creditnote_detail;
                $crnote_d->refno = $uniqueREF;
            $crnote_d->invno=$request->invno[$i];
            $crnote_d->invdate=$request->invdate[$i];
            $crnote_d->invamnt=$request->amount[$i];
            $crnote_d->cramnt=$request->cramt[$i];
            $crnote_d->rmks=$request->lpo[$i];
            $crnote_d->save();
        }

    }

        $crnote = new creditnote;
        $crnote->refno = $uniqueREF;
        $crnote->trandate = $request->trandate;
        $crnote->clcode = $request->clcode;
        $crnote->location = $request->location;
        $crnote->amount = $request->gtotal;
        $crnote->cltype = $request->cltype;
        $crnote->remarks = $request->remarks;
        $crnote->staff = Auth::user()->email;
        $crnote->save();




        //$txt=urlencode($tlgMSG);

        //     $msg = "<b>CREDITNOTE-" . $crnote->refno . "</b>\n<b>CLIENT:</b>" . Stockspro::getClientName($request->clcode) . "\n<b>CR.AMOUNT:</b>KES" . $request->gtotal . "\n<b>REMARKS:</b>" . $request->remarks .
        //         "\n
        // <a href='https://joedream.stockcity.co.ke?id=" . $crnote->id . "&post=1'>APPROVE CREDITNOTE</a>";

    //     $clname = Stockspro::getClientName($request->clcode);
    //     $urli = env('APP_URL');

    //     $msg = "<b>RETURN-CREDITNOTE-{$crnote->refno}</b>\n<b>CLIENT:</b>{$clname}\n<b>CR.AMOUNT:</b>KES {$request->gtotal}\n<b>REMARKS:</b>{$request->remarks}\n\r\n\n";
    //     $msg .= "<a href='" . $urli . "post-creditnote?id=" . $crnote->id . "&post=1'>APPROVE CREDITNOTE</a>";
        

      

    // Stockspro::sendTelegram($msg);


    Stockspro::auditLog("Creditnote -".$crnote->refno." Created Successfully");
    return "CreditNote-".$crnote->refno." Created Successfully";

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coy=Stockspro::getCoy();
        $now=Carbon::now()->toDateTimeString();
        $creditnote=creditnote::findorFail($id);
        $details=$creditnote->creditnote_d;

        return  view('reports.creditnotes.print-creditnote')
               ->with(['creditnote'=>$creditnote,'details'=>$details,'coy'=>$coy,'tstamp'=>$now]); 
    }

    /**pi/registerhook
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients=DB::table('clients')->where('status',1)->get();
        $creditnote=creditnote::findorFail($id);
        $invoices=$creditnote->creditnote_d()->get();
        $locations=DB::table('locations')->where('status',1)->get();

        //dd($invoices);
        return view('accounting.creditnotes.edit')->with(['clients'=>$clients,'creditnote'=>$creditnote,'invoices'=>$invoices,'locations'=>$locations]);
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
     $this->validate($request,[
        'clcode'=>'required',
        'cltype'=> 'required|not_in: -1',
        'location'=> 'required|not_in: -1',
        'gtotal'=> 'required',

    ]);

     //dd($request);
     $crnote= creditnote::findorFail($id);
     $crnote->refno=$request->refno;
     $crnote->trandate=$request->trandate;
     $crnote->clcode=$request->clcode;
     $crnote->amount=$request->gtotal;
     $crnote->location=$request->location;
     $crnote->cltype=$request->cltype;
     $crnote->remarks=$request->remarks;
     $crnote->staff=Auth::user()->email;
     $crnote->save();


     $count=count($request->invno);
     if($count>0){$crnote->creditnote_d()->delete();}

     for ($i=0; $i <$count ; $i++)
     { 
        if($request->cramt[$i]>0){
            $crnote_d=new creditnote_detail;
            $crnote_d->refno=$crnote->refno;
            $crnote_d->invno=$request->invno[$i];
            $crnote_d->invdate=$request->invdate[$i];
            $crnote_d->invamnt=$request->amount[$i];
            $crnote_d->cramnt=$request->cramt[$i];
            $crnote_d->rmks=$request->lpo[$i];
            $crnote_d->save();
        }

    }

    Stockspro::auditLog("Creditnote -".$crnote->refno." Updated Successfully");
    return "CreditNote-".$crnote->refno." Updated Successfully";
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $creditnote=creditnote::findorFail($id);
        if($creditnote->status>0){return "Cant Delete a posted Creditnote. Reverse & Try Again";}
        $creditnote->creditnote_d()->delete();
        $creditnote->destroy($id);
        Stockspro::auditLog("Deleted Creditnote ".$creditnote->refno);
        return "Creditnote ".$creditnote->refno. "Deleted Successfully";
    }

    public function postCreditnote(Request $request)
    {
        $resp="";
        $creditnote=creditnote::findorFail($request->id);

        if($request->post)
        {
            if($creditnote->status>0){
                $resp = array('flag' =>0,'msg'=>"Sorry !, Creditnote Already posted " );
                return json_encode($resp);
            }
            DB::select("call do_post_creditnote('".$creditnote->refno."','".Auth::user()->email."',1)");
            $resp = array('flag' =>1,'msg'=>"Creditnote Posted Successfully!" );
        }else{
            DB::select("call do_post_creditnote('".$creditnote->refno."','".Auth::user()->email."',0)");

            
            $resp = array('flag' =>1,'msg'=>"Creditnote Reversed Successfully!" );

        }

        return json_encode($resp);

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
        return view('accounting.creditnotes.cl_invoices')->with(['invoices'=>$invoices,'parent'=>$request->parent]);
    }
}