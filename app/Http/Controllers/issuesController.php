<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\issue;
use App\issue_detail;
use App\items;
use App\location;
use App\requisition;
use Stockspro;
use Auth;
use Carbon\Carbon;

class issuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues=issue::OrderBy('id','desc')->get();
        return view('trans.issues.index')->with(["issues"=>$issues]);
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
        $requisitions=DB::table('requisitions')->where('status',1)->orderBy('refno','asc')->get();
        $locations=location::where('status',1)->orderBy('code','desc')->get();
        $now=Stockspro::getToday();

        return view('trans.issues.create')->with(['items'=>$items,'units'=>$units,'locations'=>$locations,'requisitions'=>$requisitions,'today'=>$now]);
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
            'locationfrom'=> 'required|not_in:-1',
            'locationto'=> 'required|not_in:-1',
            "itemcode"    => "required|array|min:1",
            "itemcode.*"  => "required|string|distinct|min:1|not_in:-1",
            "description.*"  => "required|string|distinct|min:1|not_in:-1",
            "qty.*"  => "required|numeric|min:1",
            "price.*"  => "required|numeric|min:1",
            "total.*"  => "required|numeric|min:1",
            'grosstotal'=>'required|numeric|min:1',
        ]);

        $issue=new issue;
        $refno=Stockspro::getNextNumber('ISSUE',1);
        $issue->refno=$refno;
        $issue->description=$request->remarks;
        $issue->trandate=$request->trandate;    
        $issue->locfrom=$request->locationfrom;  
        $issue->locto=$request->locationto;
        $issue->requestno=$request->requestno;  
        $issue->tqty=$request->tqty;    
        $issue->total=$request->grosstotal;  
        $issue->status=0;    
        $issue->trantype=$request->trantype;    
        $issue->staff=Auth::user()->email;
        $issue->save();


        $count=count($request->itemcode);

        for ($i=0; $i <$count ; $i++)
        { 
         $issue_d=new issue_detail;
         $issue_d->refno=$refno;
         $issue_d->code=$request->itemcode[$i];
         $issue_d->description=$request->description[$i];
         $issue_d->qty=$request->qty[$i];
         $issue_d->uom=$request->uom[$i];
         $issue_d->bprice=$request->price[$i];
         $issue_d->total=$request->total[$i];
         $issue_d->save();

     }

     Stockspro::auditLog("Issue-".$request->refno." Created Successfully");
     return "Issue -".$request->refno." Created Successfully";

 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $issue=issue::findorFail($id);
        $details=$issue->issue_details;

        $now=Carbon::now()->toDateTimeString();

        return view('trans.issues.view')->with(['issue'=>$issue,'details'=>$details,'tstamp'=>$now]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $issue=issue::findorFail($id);
        $details=$issue->issue_details;
        $items=items::where('status',1)->orderBy('code','desc')->get();
        $requisitions=DB::table('requisitions')->where('status',1)->orderBy('refno','asc')->get();
        $units=DB::table('units')->where('status',1)->orderBy('code','desc')->get();
        $locations=location::where('status',1)->orderBy('code','desc')->get();

        return view('trans.issues.edit')->with(['issue'=>$issue,'details'=>$details,'requisitions'=>$requisitions,'locations'=>$locations,'items'=>$items,'units'=>$units]);
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
            'trandate'=>'required',
            'refno'=>'required',
            'remarks'=>'required',
            'locationfrom'=> 'required|not_in:-1',
            'locationto'=> 'required|not_in:-1',
            "itemcode"    => "required|array|min:1",
            "itemcode.*"  => "required|string|distinct|min:1|not_in:-1",
            "description.*"  => "required|string|distinct|min:1|not_in:-1",
            "qty.*"  => "required|numeric|min:1",
            "price.*"  => "required|numeric|min:1",
            "total.*"  => "required|numeric|min:1",
            'grosstotal'=>'required|numeric|min:1',
        ]);

        $issue=issue::findorFail($id);
        $issue->refno=$request->refno;
        $issue->description=$request->remarks;
        $issue->trandate=$request->trandate;    
        $issue->locfrom=$request->locationfrom;  
        $issue->locto=$request->locationto;
        $issue->requestno=$request->requestno;  
        $issue->tqty=$request->tqty;    
        $issue->total=$request->grosstotal;  
        $issue->status=0;    
        $issue->trantype=$request->trantype;    
        $issue->staff=Auth::user()->email;
        $issue->save();

        $issue->issue_details()->delete();

        $count=count($request->itemcode);

        for ($i=0; $i <$count ; $i++)
        { 
         $issue_d=new issue_detail;
         $issue_d->refno=$request->refno;
         $issue_d->code=$request->itemcode[$i];
         $issue_d->description=$request->description[$i];
         $issue_d->qty=$request->qty[$i];
         $issue_d->uom=$request->uom[$i];
         $issue_d->bprice=$request->price[$i];
         $issue_d->total=$request->total[$i];
         $issue_d->save();

     }

     Stockspro::auditLog("Issue/Transfer-".$request->refno." Updated Successfully");
     return "Issue/Transfer -".$request->refno." Updated Successfully";

 }


 public function postIssue(Request $request)
 {
    $issue=issue::findorFail($request->id);

    if($request->post){
        if(Stockspro::isIssueServiceable($issue->refno)){

            if($issue->status>0){
                $resp=array('flag'=>0,'msg'=> ($issue->trantype>0?'Transfer':'Issue'). " Already Posted !");
                return json_encode($resp);
            }
            DB::select("call do_post_issue('".$issue->refno."','".Auth::user()->email."',0)");
            $resp = array('flag' =>1,'msg'=>($issue->trantype>0?'Transfer':'Issue')." Posted Successfully!" );
            
            return json_encode($resp);
        }else{
              $msglog=Stockspro::getqtyLog($issue->locfrom,$issue->refno);
              //dd($mslog);
                $resp = array('flag' =>0,'msg'=>"Sorry !,\n\rInsufficient Item Quantities to service the Issue/Transfer!\n\rEdit & Try Again \n\r Check this Item\n\r.......\n\r".$msglog );
                return json_encode($resp);

        }
    }else{
        if($issue->status<1){
            $resp = array('flag' =>0,'msg'=>"Sorry !, Issue Not Posted " );
            return json_encode($resp);
        }
        DB::select("call do_post_issue('".$issue->refno."','".Auth::user()->email."',1)");
        $resp = array('flag' =>1,'msg'=>($issue->trantype>0?'Transfer':'Issue')." Reversed Successfully!" );

        return json_encode($resp);

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
        //
    }
}
