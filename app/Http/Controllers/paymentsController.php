<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment;
use App\payment_detail;
use DB;
use Carbon\Carbon;
use Stockspro;
use Auth;

class paymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments=DB::table('payments')->orderBy('id','desc')->get();

        return view('accounting.payments.index')->with(['payments'=>$payments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $now=Carbon::today()->toDateString();
        $accounts=DB::table('accounts')->where('status','=','1')->whereIn('type',['Cash','Bank'])->get();
        $expcategs=DB::table('accounts')->where('status','=','1')->whereIn('type',['expense'])->get();
        $locations=DB::table('locations')->where('status','=','1')->get();

        return view('accounting.payments.create')->with(['today'=>$now,'accounts'=>$accounts,'expcategs'=>$expcategs,'locations'=>$locations]);
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
            'account'=> 'required|not_in:-1',
            'location'=> 'required|not_in:-1',
            'payee'=> 'required',
            'chequeno'=> 'required',
            'remarks'=> 'required',
            'total'=> 'required|between:0,99999999999.99',
        ]);

        

        if($request->total>0){
            $net=0;
            $vat=0;
            $nextNo=Stockspro::getNextNumber('AP-PAYMENTS',1); 
            $payment=new payment;
            $payment->refno=$nextNo;
            $payment->trandate=$request->pdate;
            $payment->account=$request->account;
            $payment->location=$request->location;
            $payment->amount=$request->total;
            $payment->cheque=$request->chequeno;
            $payment->ptype=$request->etype;
            $payment->entrydate=$request->entrydate;
            $payment->payee=$request->payee;
            $payment->pinno=$request->pinno;
            $payment->docno=$request->docno;
            $payment->remarks=$request->remarks;
            $payment->inwords=$request->towords;
            $payment->staff=Auth()->user()->email;
            $payment->save();


            $cnt=count($request->ecode);
            $payment->payment_details()->delete();


            for ($i=0; $i < $cnt; $i++)
            { 
                $payment_d=new payment_detail;         
                $payment_d->refno=$nextNo;
                $payment_d->code=$request->ecode[$i];
                $payment_d->description=$request->description[$i];
                $payment_d->amount=($request->vatable[$i]>0?$request->amount[$i]*100/114:$request->amount[$i]);
                $payment_d->vat=($request->vatable[$i]>0?$request->amount[$i]*14/114:0);
                $payment_d->total=$request->amount[$i];
                $payment_d->save();
            }

           // $resp=array('msg' =>'vourcher Added Successfully','flag'=>1);

            return 'vourcher Added Successfully';  
        }
        else{

          //$arr= array('flag'=>'0','msg'=>'Invalid Amount Entered');
          
           // $respp=json_encode($respx) ;
           // $resp = array('flag' =>0,'msg'=>"Sorry !, Order Not Posted " );
           // dd(json_encode($arr));
          
          return "Invalid Amount Entered.\n\rCheck and try Again";
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
      $payment=payment::findorFail($id);
      $coy=Stockspro::getCoy();
      $now=Carbon::now()->toDateTimeString();
      return view('accounting.payments.view')->with(['payment'=>$payment,'coy'=>$coy,'tstamp'=>$now]);
  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $now=Carbon::today()->toDateString();
      $payment=payment::findorFail($id);
      $payments_d=payment_detail::where('refno',$payment->refno)->get();
      $accounts=DB::table('accounts')->where('status','=','1')->whereIn('type',['Cash','Bank'])->get();
      $expcategs=DB::table('accounts')->where('status','=','1')->whereIn('type',['expense'])->get();
      $locations=DB::table('locations')->where('status','=','1')->get();


      return view('accounting.payments.edit')->with(['accounts'=>$accounts,'expcategs'=>$expcategs,'payment'=>$payment,'payments_d'=>$payments_d,'today'=>$now,'locations'=>$locations]);
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
            'account'=> 'required|not_in:-1',
            'location'=> 'required|not_in:-1',
            'payee'=> 'required',
            'chequeno'=> 'required',
            'remarks'=> 'required',
            'total'=> 'required|between:0,99999999999.99',
        ]);


        if($request->total>0){
            $net=0;
            $vat=0;
            $payment=payment::findorFail($id);
            $payment->trandate=$request->pdate;
            $payment->account=$request->account;
            $payment->location=$request->location;
            $payment->amount=$request->total;
            $payment->cheque=$request->chequeno;
            $payment->ptype=$request->etype;
            $payment->entrydate=$request->entrydate;
            $payment->payee=$request->payee;
            $payment->pinno=$request->pinno;
            $payment->docno=$request->docno;            
            $payment->remarks=$request->remarks;
            $payment->inwords=$request->towords;
            $payment->staff=Auth()->user()->email;
            $payment->save();

            $cnt=count($request->ecode);
            $payment->payment_details()->delete();


            for ($i=0; $i < $cnt; $i++)
            { 
                $payment_d=new payment_detail;         
                $payment_d->refno=$payment->refno;
                $payment_d->code=$request->ecode[$i];
                $payment_d->description=$request->description[$i];
                $payment_d->amount=($request->vatable[$i]>0?$request->amount[$i]*100/114:$request->amount[$i]);
                $payment_d->vat=($request->vatable[$i]>0?$request->amount[$i]*14/114:0);
                $payment_d->total=$request->amount[$i];
                $payment_d->save();
            }
            Stockspro::auditLog("Expense Voucher-".$request->refno." Updated Successfully");

            return "vourcher Updated Successfully";
        }
        else{
           return "Invalid Amount";
       }    
   }

   public function postExpense(Request $request)
   {
                //dd($request);
    $payt=payment::findorFail($request->id);
    if($request->post>0){

        DB::select("call do_post_payment('".$payt->refno."','".Auth::user()->email."','".Auth::user()->station."')");
        Stockspro::auditLog("Expense Voucher-".$request->refno." Posted Successfully");
        return "Payment Posted Successfully";
    }else{
        DB::select("call do_reverse_payment('".$payt->refno."','".Auth::user()->email."')");
        Stockspro::auditLog("Expense Voucher-".$request->refno." Reversed Successfully");
        return "Payment Reversed Successfully";                
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
        $payt=payment::findorFail($id);
        if($payt->status>0){return "Cant Delete a posted Voucher. Reverse & Try Again";}
        $payt->payment_details()->delete();
        $payt->destroy($id);
        Stockspro::auditLog("Deleted Voucher ".$payt->refno);
        return "Payment Voucher ".$payt->refno. "Deleted Successfully";

    }
}
