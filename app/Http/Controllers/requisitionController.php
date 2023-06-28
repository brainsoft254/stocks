<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Stockspro;
use App\items;
use App\location;
use App\requisition;
use App\requisition_detail;
use Carbon\carbon;

class requisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisitions=DB::table('requisitions')->OrderBy('id','desc')->get();
        return view ('trans.requisition.index')->with(['requisitions'=>$requisitions]);
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


        return view('trans.requisition.create')->with(['items'=>$items,'units'=>$units,'locations'=>$locations]);


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
            'refno'=>'required|unique:requisitions',
            'trandate'=>'required',
            'remarks'=>'required',
            'locfrom'=> 'required|not_in:-1|different:locto',
            'locto'=> 'required|not_in:-1|different:locfrom',
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
        
        $requesition=new requisition;
        $refno=Stockspro::getNextNumber('REQUISITION',1);
        $requesition->refno=$refno;
        $requesition->trandate=$request->trandate;
        $requesition->remarks=$request->remarks;
        $requesition->locfrom=$request->locfrom;
        $requesition->locto=$request->locto;
        $requesition->qty=$request->tqty;
        $requesition->total=$request->grosstotal;
        $requesition->tax=$request->vattotal;
        $requesition->staff=Auth::user()->email;
        $requesition->save();

        $count=count($request->itemcode);

        for ($i=0; $i <$count ; $i++)
        { 
            $req_d=new requisition_detail;
            $req_d->refno=$refno;
            $req_d->icode=$request->itemcode[$i];
            $req_d->description=$request->description[$i];
            $req_d->qty=$request->qty[$i];
            $req_d->uom=$request->uom[$i];
            $req_d->rate=$request->price[$i];
            $req_d->vat=$request->vat[$i];
            $req_d->total=$request->total[$i];
            $req_d->save();

        }

        Stockspro::auditLog("Requisition-".$request->refno." Created Successfully");
        return "Requisition -".$request->refno." Created Successfully";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requisition=requisition::findorFail($id);
        $details=$requisition->req_details;
        $now=Carbon::now()->toDateTimeString();

        return view('reports.requisition.print-requisition')->with(['requisition'=>$requisition,'details'=>$details,'tstamp'=>$now]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items=items::where('status',1)->orderBy('code','desc')->get();
        $units=DB::table('units')->where('status',1)->orderBy('code','desc')->get();
        $locations=location::where('status',1)->orderBy('code','desc')->get();
        $requisition=requisition::findorFail($id);


        return view('trans.requisition.edit')->with(['requisition'=>$requisition,'items'=>$items,'units'=>$units,'locations'=>$locations]);
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
            'refno'=>'required',
            'trandate'=>'required',
            'remarks'=>'required',
            'locfrom'=> 'required|not_in:-1',
            'locto'=> 'required|not_in:-1',
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
        
        $requesition=requisition::findorFail($id);
        $requesition->refno=$request->refno;
        $requesition->trandate=$request->trandate;
        $requesition->remarks=$request->remarks;
        $requesition->locfrom=$request->locfrom;
        $requesition->locto=$request->locto;
        $requesition->qty=$request->tqty;
        $requesition->total=$request->grosstotal;
        $requesition->tax=$request->vattotal;
        $requesition->staff=Auth::user()->email;
        $requesition->save();

        $requesition->req_details()->delete();

        $count=count($request->itemcode);
        for ($i=0; $i <$count ; $i++)
        { 
            $req_d=new requisition_detail;
            $req_d->refno=$request->refno;
            $req_d->icode=$request->itemcode[$i];
            $req_d->description=$request->description[$i];
            $req_d->qty=$request->qty[$i];
            $req_d->uom=$request->uom[$i];
            $req_d->rate=$request->price[$i];
            $req_d->vat=$request->vat[$i];
            $req_d->total=$request->total[$i];
            $req_d->save();

        }

        Stockspro::auditLog("Requisition-".$request->refno." Updated Successfully");
        return "Requisition -".$request->refno." Updated Successfully";
    }

    public function postRequisition(Request $request)
    {
        $req=requisition::findorFail($request->id);
        if($req->status>0){
            return "Requisition Already Received & Being Processed";
        }else{
            $req->status=1;
            $req->save();
            return "Requisition {".$req->refno."} Received Successfully !";
        }
    }


    public function getRequisition(Request $request)
    {
        $requisition=requisition::where('refno',$request->refno)->first();

        $details=$requisition->req_details;

        return view('trans.issues.issue_row')->with(['requisition'=>$requisition,'details'=>$details]);
    }

    /**
     * Remove the specified resource from storage.
     *deta
     * @param  int  $id   
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
