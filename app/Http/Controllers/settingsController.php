<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\account;
use App\setting;

class settingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accts=account::where('status',1)->get();
        $settings=setting::first();
        return view('settings.setup.index')->with(['accounts'=>$accts,'settings'=>$settings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
         $this->validate($request,[
            'vat'=>'required|not_in:-1',
            'receivables'=>'required|not_in:-1',
            'payables'=> 'required|not_in:-1',
            'stocks'=> 'required|not_in:-1',
            'returns'=> 'required|not_in:-1',
            'wtax'=> 'required|numeric|between:0,99.99',
            'factax'=> 'required|numeric|between:0,99.99',
            'vrate'=> 'required|numeric|between:0,99.99',
         ]);
         
         $settings= setting::updateOrCreate(
            [
                 "vat"=>$request->vat,
                 "receivables"=>$request->receivables,
                 "payables"=>$request->payables,
                 "stocks"=>$request->stocks,
                 "returns"=>$request->returns,
                 "wtax"=>$request->wtax,
                 "factax"=>$request->factax,
                 "vrate"=>$request->vrate,
                 "vat_inclusive"=>($request->vat_inclusive=='on'? 1: 0) 
            ]
        );

        setting::where('id','!=',$settings->id)->delete();


        return "Parameters Updated Successfully!";
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
        //
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
        //
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
