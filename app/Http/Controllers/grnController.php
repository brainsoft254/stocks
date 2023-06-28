<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\grn;
use App\grn_d;
use DB;
use Stockspro;
use App\items;
use App\unit;
use App\location;
use App\account;
use App\payable;
use Auth;
use Illuminate\Support\Carbon;
use PDF;

class grnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grns=grn::orderBy('id','desc')->get();
        return view('trans.grn.index')->with(['grns'=>$grns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items=items::where('status',1)->orderBy('code','desc')->get();
        $units=unit::where('status',1)->orderBy('code','desc')->get();
        $locations=location::where('status',1)->orderBy('code','desc')->get();
        $wheregrp=array('status'=>1,'type'=>'bank');
        $accounts=account::where($wheregrp)->orWhere(['type'=>'cash'])->orderBy('code','desc')->get();
        $suppliers=payable::where('status',1)->get();

        return view('trans.grn.create')->with(['items'=>$items,'units'=>$units,'locations'=>$locations,'accounts'=>$accounts,'suppliers'=>$suppliers]);
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
            /*'lpo'=> 'required|not_in:-1',*/
            'acct'=> 'required|not_in:-1',
            "itemcode"    => "required|array|min:1",
            "itemcode.*"  => "required|string|distinct|min:1|not_in:-1",
            "description.*"  => "required|string|distinct|min:1|not_in:-1",
            "qty.*"  => "required|numeric|min:1",
            "price.*"  => "required|numeric|min:1",
            "vat.*"  => "required|numeric|min:1",
            "total.*"  => "required|numeric|min:1",
            'vattotal'=>'required|numeric|min:0',
            'grosstotal'=>'required|numeric|min:1',
        ]);



        $grn=new grn;
        $grn->refno=Stockspro::getNextNumber('GRN',1);
        $grn->trandate=$request->trandate;
        $grn->lpo=$request->lpo;
        $grn->location=$request->location;
        $grn->sno=$request->acct;
        $grn->trantype=$request->receivemode;
        $grn->pmode=$request->ptype;
        $grn->vat=$request->vattotal;
        $grn->total=$request->grosstotal;
        $grn->qty=$request->tqty;
        $grn->remarks=$request->remarks;
        $grn->staff=Auth::user()->email;
        $grn->save();


        $count=count($request->itemcode);

        for ($i=0; $i <$count ; $i++) { 
            $grnd=new grn_d;
            $grnd->refno=$grn->refno;
            $grnd->icode=$request->itemcode[$i];
            $grnd->pu=$request->uom[$i];
            $grnd->qty=$request->qty[$i];
            $grnd->uprice=$request->price[$i];
            $grnd->vat=$request->vat[$i];
            $grnd->total=$request->total[$i];
            $grnd->vatable=$request->vatable[$i];
           $grnd->save();
        }

            return "Grn Details Successfully Created !";

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $grn=grn::findorFail($id);
            $coy=Stockspro::getCoy();
            $tstamp=Carbon::now();
        
            return view('trans.grn.show')->with(['grn'=>$grn,'coy'=>$coy,'tstamp'=>$tstamp]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        
    }
    public function printGrnPdf(Request $request)
    {
        try {
            $grn=grn::findorFail($request->id);
            $coy=Stockspro::getCoy();
            $tstamp=Carbon::now();

            $pdf = PDF::loadView('trans.grn.print-grn-pdf', ['grn'=>$grn,'coy'=>$coy,'tstamp'=>$tstamp]);
            return $pdf->stream("GRN" . '-' . $grn->refno . '.pdf');
        
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $grn=grn::findorFail($id);
        $items=items::where('status',1)->orderBy('code','desc')->get();
        $units=unit::where('status',1)->orderBy('code','desc')->get();
        $locations=location::where('status',1)->orderBy('code','desc')->get();
        $wheregrp=array('status'=>1,'type'=>'bank');
        $accounts=account::where($wheregrp)->orWhere(['type'=>'cash'])->orderBy('code','desc')->get();
        $suppliers=payable::where('status',1)->get();

        return view('trans.grn.edit')->with(['items'=>$items,'units'=>$units,'locations'=>$locations,'accounts'=>$accounts,'suppliers'=>$suppliers,'grn'=>$grn]);
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
        //dd(count($request->itemcode));
        $this->validate($request,[
            'trandate'=>'required',
            'remarks'=>'required',
            'location'=> 'required|not_in:-1',
            'lpo'=> 'required|not_in:-1',
            'acct'=> 'required|not_in:-1',
            "itemcode"    => "required|array|min:1",
            "itemcode.*"  => "required|string|distinct|min:1|not_in:-1",
            "description.*"  => "required|string|distinct|min:1|not_in:-1",
            "qty.*"  => "required|numeric|min:1",
            "price.*"  => "required|numeric|min:1",
            "vat.*"  => "required|numeric|min:1",
            "total.*"  => "required|numeric|min:1",
            'vattotal'=>'required|numeric|min:0',
            'grosstotal'=>'required|numeric|min:1',
        ]);



        $grn=grn::findorFail($id);
        $grn->refno=$request->refno;
        $grn->trandate=$request->trandate;
        $grn->lpo=$request->lpo;
        $grn->location=$request->location;
        $grn->sno=$request->acct;
        $grn->trantype=$request->receivemode;
        $grn->pmode=$request->ptype;
        $grn->vat=$request->vattotal;
        $grn->total=$request->grosstotal;
        $grn->qty=$request->tqty;
        $grn->remarks=$request->remarks;
        $grn->staff=Auth::user()->email;
        $grn->save();

        
        $count=count($request->itemcode);
        if($count>=1){$grn->grn_d()->delete();}

        for ($i=0; $i <$count ; $i++) { 
            $grnd=new grn_d;
            $grnd->refno=$grn->refno;
            $grnd->icode=$request->itemcode[$i];
            $grnd->pu=$request->uom[$i];
            $grnd->qty=$request->qty[$i];
            $grnd->uprice=$request->price[$i];
            $grnd->vat=$request->vat[$i];
            $grnd->total=$request->total[$i];
            $grnd->vatable=$request->vatable[$i];
           $grnd->save();
        }

            return "Grn Details Successfully Updated !";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grn=grn::findorFail($id);
        if($grn->status>0){return "Cant Delete a posted Grn. Reverse & Try Again";}
        $grn->grn_d()->delete();
        $grn->destroy($id);
        Stockspro::auditLog("Deleted Grn ".$grn->refno);
        return "Grn ".$grn->refno. "Deleted Successfully";

    }

    public function postGrn(Request $request)
    {
         $grn=grn::findOrFail($request->id);
         if($grn->status>0){
             $resp = array('flag' =>0,'msg'=>"Sorry !, Grn Already posted " );
            return json_encode($resp);
          }

         DB::select("call do_post_grn('".$grn->refno."','".Auth::user()->email."',0)");
         $resp = array('flag' =>1,'msg'=>"Grn Posted Successfully" );

        return $resp;
    }

    public function reverseGrn(Request $request)
    {
         $grn=grn::findOrFail($request->id);
         if($grn->status<0){
            $resp = array('flag' =>0,'msg'=>"Sorry !, Grn Not Posted " );
            return json_encode($resp);
        }

         DB::select("call do_post_grn('".$grn->refno."','".Auth::user()->email."',1)");
        $resp = array('flag' =>1,'msg'=>"Grn Reversed Successfully" );
        return json_encode($resp);
    }
}
