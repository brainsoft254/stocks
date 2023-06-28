<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\unit;
use Auth;
use Stockspro;

class unitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units=unit::orderBy('id','desc')->get();
        return view('settings.units.index')->with(['units'=>$units]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.units.create');
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
            'code'=>'required|alpha_num',
            'description'=>'required',
            'factor'=>'required|numeric|min:1',
            'status'=> 'required',
        ]);

        $unit=new unit;
        $unit->code=$request->code;
        $unit->description=$request->description;
        $unit->factor=$request->factor;
        $unit->status=$request->status;
        $unit->staff=Auth::user()->email;
        $unit->save();
        Stockspro::auditLog("Packaging Unit-".$request->code.' Created Successfully');

        return "Packing Unit Created Successfully!";
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
        $unit=unit::findorFail($id);
        return view('settings.units.edit')->with(['unit'=>$unit]);
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
            'code'=>'required|alpha_num',
            'description'=>'required',
            'factor'=>'required|numeric|min:1',
            'status'=> 'required',
        ]);

        $unit=unit::findorFail($id);
        $unit->code=$request->code;
        $unit->description=$request->description;
        $unit->factor=$request->factor;
        $unit->status=$request->status;
        $unit->staff=Auth::user()->email;
        $unit->save();

        Stockspro::auditLog("Packing Unit-".$request->code.' Updated Successfully');
       
        return "Packing Unit Updated Successfully!";                       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit=unit::findorFail($id);
         Stockspro::auditLog("Packaging Unit-".$unit->code.' Deleted Successfully');
        $unit->delete();

        return "Packaging Unit Deleted Successfully";

    }
}
