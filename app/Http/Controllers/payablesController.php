<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payable;
use  Stockspro;
use DB;
use App\apinvoice;
use App\apinvoice_detail;
use Auth;
use Carbon\Carbon;

class payablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $suppliers=payable::OrderBy('id','desc')->get();

        return view('accounting.payables.index')->with(['suppliers'=>$suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('accounting.payables.create');
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
        'name'=>'required',
        'pobox'=> 'required',
        'email'=> 'required|email',
        'pinno'=> 'required|alpha_num',
        'tel'=> 'required|alpha_num',
        'contact_person'=> 'required',
        'concell'=> 'required|alpha_num',
    ]);

       $supplier=new payable;
       $supplier->code=Stockspro::getNextNumber('SUPPLIER',1);
       $supplier->name=$request->name;
       $supplier->status=$request->status;
       $supplier->pobox=$request->pobox;
       $supplier->email=$request->email;
       $supplier->tel=$request->tel;
       $supplier->pinno=$request->pinno;
       $supplier->paymode=$request->paymode;
       $supplier->padd=$request->physicaladd;
       $supplier->remarks=$request->remarks;
       $supplier->contact_person=$request->contact_person;
       $supplier->concell=$request->concell;
       $supplier->conemail=$request->conemail;
       $supplier->save();

       Stockspro::auditLog("Created Supplier Profile-".$supplier->code);
       return "Supplier Details Added Successfully !";



   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier=payable::findorFail($id);
        return view ('accounting.payables.edit')->with(['supplier'=>$supplier]);
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
        'name'=>'required',
        'pobox'=> 'required',
        'email'=> 'required|email',
        'pinno'=> 'required|alpha_num',
        'tel'=> 'required|alpha_num',
        'contact_person'=> 'required',
        'concell'=> 'required|alpha_num',
    ]);

       $supplier=payable::findorFail($id);
       $supplier->code=$request->code;
       $supplier->name=$request->name;
       $supplier->status=$request->status;
       $supplier->pobox=$request->pobox;
       $supplier->email=$request->email;
       $supplier->tel=$request->tel;
       $supplier->pinno=$request->pinno;
       $supplier->paymode=$request->paymode;
       $supplier->padd=$request->physicaladd;
       $supplier->remarks=$request->remarks;
       $supplier->contact_person=$request->contact_person;
       $supplier->concell=$request->concell;
       $supplier->conemail=$request->conemail;
       $supplier->save();

       Stockspro::auditLog("Supplier Profile Updated-".$supplier->code);
       return "Supplier Details Updated Successfully !";
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

    public function payable_invoices()
    {
        $dinvoices = DB::table("apinvoices")
            ->select(DB::raw("*,(amount-amountpaid) as due"))
            ->orderBy("invno","desc")
            ->get();

            return view ('accounting.payables.invoice.apinvoicelist')->with('dinvoices',$dinvoices);
    }

    public function payable_invoice()
    {
         $creditors=payable::orderBy('name','asc')
        ->get();

         $glaccounts=DB::table("accounts")
        ->select(DB::raw("code,description"))
        ->where('type','Expense')
        ->orderBy('description','asc')
        ->get();

        return view('accounting.payables.invoice.apinvoice')->with(['creditors'=>$creditors,'glaccounts'=>$glaccounts]);
    }

    public function Post_payable_invoices($id)
    {
        $apinvoice=apinvoice::findOrFail($id);
        DB::select("call do_post_ap_invoice('".$apinvoice->invno."','".Auth::User()->email."',0,'".Auth::User()->station."')");
        return "Invoice Posted Successfully";
    }

    public function Reverse_payable_invoices($id)
    {
        $apinvoice=apinvoice::findOrFail($id);
        DB::select("call do_post_ap_invoice('".$apinvoice->invno."','".Auth::User()->email."',1,'".Auth::User()->station."')");
        return "Invoice POsted Successfully";
    }

    public function save_payable_invoice(Request $request)
    {
         $ino=DB::select("select get_next_number('CRINVOICE',1)as invno");
         $nextNo=$ino[0]->invno; 
         $apinvoices=new apinvoice;
         $apinvoices->invno=$nextNo;
         $apinvoices->scode=$request->scode;
         $apinvoices->sname=$request->sname;
         $apinvoices->invdate=$request->invdate;
         $apinvoices->duedate=$request->duedate;
         $apinvoices->amount=$request->tamount;
         $apinvoices->vatamt=$request->tvat;
         $apinvoices->remarks=$request->remarks;
         $apinvoices->staffname=Auth::User()->email;
         $apinvoices->save();

         $v_cnt=count($request->code);
           for ($i=0; $i <$v_cnt; $i++) { 
             $apinvoices_d=new apinvoice_detail;         
             $apinvoices_d->invno=$nextNo;
             $apinvoices_d->code=$request->code[$i];
             $apinvoices_d->description=$request->description[$i];
             $apinvoices_d->amount=$request->amount[$i];
             $apinvoices_d->vatable=$request->vatable[$i];
             $apinvoices_d->vat=$request->vat[$i];
             $apinvoices_d->total=$request->total[$i];
             $apinvoices_d->save();
            } 
         return "Creditor Invoice Saved Successfully";

    }


    public function payable_receipts()
    {
        $apreceipts=DB::table('apreceipts')
                     ->orderBy('id','asc')
                     ->get();
        return view('accounting.payables.receipt.apreceiptlist')->with('apreceipts',$apreceipts);
    }

    public function payable_receipt()
    {
         $creditors=DB::table("payables")
        ->select(DB::raw("*"))
        ->orderBy('name','asc')
        ->get();

         $accounts=DB::table("accounts")
        ->select(DB::raw("code,description"))
        ->whereIn('type',['Bank','Cash'])
        ->orderBy('description','asc')
        ->get();


        $now=Carbon::today()->toDateString();

        return view('accounting.payables.receipt.apreceipt')->with(['creditors'=>$creditors,'accounts'=>$accounts,'today'=>$now]);
    }

    public function save_payable_receipt(Request $request)
    {
         $ino=DB::select("select get_next_number('AP-PAYMENTS',1)as invno");
         $nextNo=$ino[0]->invno; 

             $apreceipt=new apreceipt;
             $apreceipt->rno=$nextNo;
             $apreceipt->rdate=$request->pdate;
             $apreceipt->scode=$request->scode;
             $apreceipt->sname=$request->sname;
             $apreceipt->amount=$request->amount;
             $apreceipt->account=$request->account;
             $apreceipt->chequeno=$request->chequeno;
             $apreceipt->remarks=$request->remarks;
             $apreceipt->amtinwords=$request->towords;
             $apreceipt->totaldue=$request->tdue;
             $apreceipt->balcf=$request->balcf;
             $apreceipt->staff=Auth::user()->email;
             $apreceipt->save();

             DB::select("call do_post_ap_receipt('".$request->pdate."','".$nextNo."','".$request->scode."','".$request->amount."','".$request->account."','".$request->chequeno."','".Auth::user()->email."')");
             return "vourcher Added Successfully";
    }

    public function get_outstanding_bills($ccode)
    {
        $apinvoices=DB::table('apinvoices')->select(DB::raw('invno,scode,sname,invdate,amount,sum(amount-amountpaid) as due,remarks'))->where(['scode'=>$ccode,'status'=>'1'])->groupby('invno')->get();
        return $apinvoices;
    }
}
