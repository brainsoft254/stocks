<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\account as account;
use App\banking as banking;
use App\journal as journal;
use App\journal_detail as journal_detail;
use App\debtor as debtor;
use Reams;


class accountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $accounts=DB::table("accounts")
                  ->select(DB::raw("id,code,description,type,category,bs,status"))
                  ->orderBy('code','asc')
                  ->get();

        return view('accounting.accounts.index')->with('accounts',$accounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounting.accounts.create');
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
            'code'=>'required|unique:accounts',
            'description'=>'required|unique:accounts',
            'atype'=> 'required|not_in:-1',
            'category'=> 'required|not_in:-1',
            'bs'=> 'required',
            'status'=> 'required',
            'direct'=> 'required',
         ]);

         $account=new account;
         $account->code=$request->code;
         $account->description=$request->description;
         $account->type=$request->atype;
         $account->category=$request->category;
         $account->bs=$request->bs;
         $account->status=$request->status;
         $account->direct=$request->direct;
         $account->save();
         
         return "account Added Successfully";
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
        $account=account::findOrFail($id);
        return view('accounting.accounts.edit')->with('account',$account);
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
            'code'=>'required',
            'description'=>'required',
            'atype'=> 'required|not_in:-1',
            'category'=> 'required|not_in:-1',
            'bs'=> 'required',
            'status'=> 'required',
            'direct'=> 'required',
         ]);

         $account=account::findOrFail($id);
         $account->code=$request->code;
         $account->description=$request->description;
         $account->type=$request->atype;
         $account->category=$request->category;
         $account->bs=$request->bs;
         $account->status=$request->status;
         $account->direct=$request->direct;
         $account->save();


        return "Account Updated Successfully !";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $acct=account::findOrFail($id);
        account::destroy($id);
        $log=Reams::auditLog("Account No: { ".$acct->code." } Deleted Successfully");
        return "Account No: { ".$acct->code." } Deleted Successfully";
    }

    public function bankingslist()
    {
     $bankings=DB::table("bankings")
      ->select(DB::raw("ref,accountfrom,accountto,amount,status,chequeno,remarks"))
      ->orderBy('id','desc')
      ->get();

        return view('accounting.accounts.banking.index')->with('bankings',$bankings);
    }

    public function newBanking()
    {
     $accounts=DB::table("accounts")
      ->select(DB::raw("code,description"))
      ->where("status",1)
      ->wherein("type",["bank","Cash"])
      ->get();
        return view('accounting.banking.create')->with('accounts',$accounts);
    }
    public function savebanking(Request $req)
    {
         $bankno=DB::select("select get_next_number('BANKING',1)as bno");
         $nextno=$bankno[0]->bno; 
         $banking=new banking;
         $banking->ref=$nextno;
         $banking->accountfrom=$req->accountfc;
         $banking->accountto=$req->accounttc;
         $banking->chequeno=$req->chequeno;
         $banking->amount=$req->amount;
         $banking->remarks=$req->remarks;
         $banking->save();
         DB::select("call do_post_bankings('".$nextno."','staff')");
         return "Banking Added Successfully";
    }

    public function journalslist()
    {
     $journals=DB::table("journals")
      ->select(DB::raw("id,ref,jdate,remarks,tdebit,tcredit,status"))
      ->orderBy('id','desc')
      ->get();

        return view('accounting.journals.index')->with('journals',$journals);
    }

    public function newJournal()
    {
     $accounts=DB::table("accounts")
      ->select(DB::raw("code,description"))
      ->where("status",1)
      ->get();
        return view('accounting.journals.create')->with('accounts',$accounts);
    }

    public function savejournal(Request $req)
    {
         $jno=DB::select("select get_next_number('JOURNAL',1)as jno");
         $nextno=$jno[0]->jno; 
         $journal=new journal;
         $journal->ref=$nextno;
         $journal->jdate=$req->jdate;
         $journal->remarks=$req->remarks;
         $journal->tdebit=$req->tdebit;
         $journal->tcredit=$req->tcredit;
         $journal->save();

         $v_cnt=count($req->code);
         for ($i=0; $i <$v_cnt; $i++) { 
             $journal_d=new journal_detail;         
             $journal_d->dref=$nextno;
             $journal_d->code=$req->code[$i];
             $journal_d->description=$req->description[$i];
             $journal_d->debit=$req->debit[$i];
             $journal_d->credit=$req->credit[$i];
             $journal_d->comments=$req->comments[$i];
             $journal_d->save();
         }

         DB::select("call post_journal('".$nextno."','staff')");
         
         return "Journal Added Successfully";
    }
    public function viewjournal($id){
        $journal=journal::findOrFail($id);
        $journal_d=DB::table('journal_details')->where('dref',$journal->ref)->get();
        
        return view('accounting.journals.view')->with('journal',$journal)->with('journal_d',$journal_d);
    }

    public function reversejournal($id)
    {
        $journal=journal::findOrFail($id);
        DB::select("call do_reverse_journal('".$journal->ref."','staff')");
        return "Journal Reversed Successfully";
    }
}
