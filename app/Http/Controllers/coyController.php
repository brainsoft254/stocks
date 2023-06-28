<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Db;
use App\coy;
use Reams;

class coyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $coy=coy::orderBy("id")->get();

        return view('settings.coy.index')->with('coy',$coy);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('settings.coy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request);
        $coy=new coy;
        $coy->name=$request->name;
        $coy->address=$request->address;
        $coy->town=$request->town;
        $coy->telephone=$request->telephone;
        $coy->cellphone=$request->cellphone;
        $coy->email=$request->email;
        $coy->physicaladd=$request->physicaladd;
        $coy->pinno=$request->pinno;
        $coy->paybillno=$request->paybillno;
        $coy->website=$request->website;
        $coy->defaultcoy=($request->defaultcoy=='on'? 1: 0);
        $coy->save();
        if($request->file('logo')){$coy->addMediaFromRequest('logo')->toMediaCollection('logo');}

        return "Company Details Added Successfully";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coy=coy::findOrFail($id);
        return view('settings.coy.view')->with('coy',$coy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coy=coy::findOrFail($id);
        return view('settings.coy.edit')->with('coy',$coy);
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
        //dd($request);
        $coy=coy::findOrFail($id);
        $coy->name=$request->name;
        $coy->address=$request->address;
        $coy->town=$request->town;
        $coy->telephone=$request->telephone;
        $coy->cellphone=$request->cellphone;
        $coy->email=$request->email;
        $coy->physicaladd=$request->physicaladd;
        $coy->pinno=$request->pinno;
        $coy->paybillno=$request->paybillno;
        $coy->website=$request->website;
        $coy->defaultcoy=($request->defaultcoy=='on'? 1: 0);
        $coy->save();
        if(isset($coy->getFirstMedia('logo')->id)){
            $coy->deleteMedia($coy->getFirstMedia('logo')->id);
            $coy->addMediaFromRequest('logo')->toMediaCollection('logo');
        }else{
            $coy->addMediaFromRequest('logo')->toMediaCollection('logo');
        }

        return "Company Details Updated Successfully";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coy=coy::findOrFail($id);
        $coy->deleteMedia($coy->getFirstMedia('logo')->id);
        coy::destroy($id);
        $log=Reams::auditLog("Company : { ".$coy->name." } Deleted Successfully");
        return "Company Details Deleted Successfully";
    }
}
