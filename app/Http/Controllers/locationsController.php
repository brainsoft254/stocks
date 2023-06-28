<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\location;
use Stockspro;

class locationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locs=location::all();
        return view('settings.locations.index')->with(['locations'=>$locs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.locations.create');
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
            'code'=>'required',
            'description'=>'required',
            'status'=> 'required',
         ]);

        $location=new location;
        $location->code=$request->code;
        $location->description=$request->description;
        $location->status=$request->status;
        $location->save();

        stockspro::auditLog('Stock location Created -'.$request->code);

        return "Stock Location Added Successfully";

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
        $location=location::findorFail($id);
        return view('settings.locations.edit')->with(['location'=>$location]);
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
            'status'=> 'required',
         ]);

        $location=location::findorFail($id);
        $location->code=$request->code;
        $location->description=$request->description;
        $location->status=$request->status;
        $location->save();
        Stockspro::auditLog('Stock location Updated -'.$request->code);
        return "Stock Location Updated Successfully";

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loc=location::findorFail($id);
        Stockspro::auditLog('Stock location Deleted -'.$loc->code);
        $loc->delete();
        return "Location {".$loc->code."} Deleted Successfully";
    }
}
