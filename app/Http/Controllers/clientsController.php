<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\client;
use App\client_item;
use Stockspro;
use DB;
use PhpParser\Node\Stmt\TryCatch;

class clientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients=client::orderBy('code','asc')->get();
        return view('settings.clients.index')->with(['clients'=>$clients]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staffs=DB::table('users')->where('status',1)->get();
        if(!(Stockspro::get_settings()->ispos)){
            $clients=client::orderBy('code','asc')->get();
            $routes=DB::table('route_managers')->where('status',1)->distinct('code')->orderBy('code','asc')->get();
            $parents=client::where('parent',1)->orderBy('code','asc')->get();
            
            return view('settings.clients.create')->with(['clients'=>$clients,'parents'=>$parents,'routes'=>$routes,'staffs'=>$staffs]);
        }else{
            return view('settings.clients.posclient')->with('staffs',$staffs);
        }
     }
    
     public function createclient_fly()
     {
         $staffs=DB::table('users')->where('status',1)->get();
        return view('settings.clients.posclient_fly')->with('staffs',$staffs);
      }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!(Stockspro::get_settings()->ispos)){
            $this->validate($request,[
            'name'=>'required',
            'pobox'=> 'required',
            'email'=> 'required|email',
            'pinno'=> 'required|alpha_num',
            'tel'=> 'required|alpha_num',
            'contact_person'=> 'required',
            'concell'=> 'required|alpha_num',
            ]);
        }else{
            $this->validate($request,[
                'name'=>'required',
                'tel'=> 'required|alpha_num',
                ]);
        }
        DB::beginTransaction();
        try {
            $client=new client;
            $client->code=Stockspro::getNextNumber('CLIENTS',1);
            $client->name=$request->name;
            $client->status=$request->status;
            $client->vatexc=($request->vatexc=='on'? 1: 0);
            $client->hasvat=($request->hasvat=='on'? 1: 0);
            $client->factax=($request->factax=='on'? 1: 0);
            $client->pobox=$request->pobox;
            $client->email=$request->email;
            $client->tel=$request->tel;
            $client->parent=($request->parent=='on'? 1: 0);
            $client->attachedto=$request->attachedto;
            $client->pinno=$request->pinno;
            $client->paymode=(isset($request->paymode)?$request->paymode:0);
            $client->padd=$request->physicaladd;
            $client->remarks=$request->remarks;
            $client->contact_person=$request->contact_person;
            $client->concell=$request->concell;
            $client->conemail=$request->conemail;
            $client->route=$request->route;
            $client->rep=$request->rep;
            $client->save();
            
             Stockspro::auditLog("Create Client Profile-".$client->code);
             DB::commit();
             return "Client Details Added Successfully !";
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
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
        $client=client::findorFail($id);
        $routes=DB::table('route_managers')->where('status',1)->orderBy('code','asc')->distinct('code')->get();
        $isParent=$client->parent;
        $items=client_item::where('clcode',$client->code)->orderBy('itemcode','asc')->get();
        $parents=client::where('parent',1)->orderBy('code','asc')->get();
        $staffs=DB::table('users')->where('status',1)->get();
        return view('settings.clients.edit')->with(['items'=>$items,'parents'=>$parents,'client'=>$client,'isParent'=>$isParent,'routes'=>$routes,'staffs'=>$staffs]);
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


     $client=client::findorFail($id);
     $client->name=$request->name;
     $client->status=$request->status;
     $client->vatexc=($request->vatexc=='on'? 1: 0);
     $client->hasvat=($request->hasvat=='on'? 1: 0);
     $client->factax=($request->factax=='on'? 1: 0);
     $client->pobox=$request->pobox;
     $client->email=$request->email;
     $client->tel=$request->tel;
     $client->parent=($request->parent=='on'? 1: 0);
     $client->attachedto=$request->attachedto;
     $client->pinno=$request->pinno;
     $client->paymode=$request->paymode;
     $client->padd=$request->physicaladd;
     $client->remarks=$request->remarks;
     $client->contact_person=$request->contact_person;
     $client->concell=$request->concell;
     $client->conemail=$request->conemail;
     $client->route=$request->route;
     $client->rep=$request->rep;
     $client->save();
    
    Stockspro::auditLog("Updated Client Details-".$client->code);
     return "Client Details Updated Successfully !";

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
