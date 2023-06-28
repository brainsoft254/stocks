<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\discount AS discount;
use DB;
use Auth;
use Stockspro;

class discountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts=DB::table('discounts')->orderBy('id','desc')->get();
        return view('settings.discounts.index')->with(['discounts'=>$discounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create
        return view('settings.discounts.create');
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
            'rate'=>'required|integer',
            'description'=>'required',

        ]);

        $discount=new discount;
        $discount->code=$request->code;
        $discount->description=$request->description;
        $discount->rate=$request->rate;
        $discount->save();

        return "Discount Created Successfully";
        
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
        $discount=discount::findorFail($id);
        return view('settings.discounts.edit')->with(['discount'=>$discount]);
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
            'rate'=>'required|integer',
            'description'=>'required',

        ]);

        $discount=discount::findorFail($id);
        $discount->code=$request->code;
        $discount->description=$request->description;
        $discount->rate=$request->rate;
        $discount->save();

        return "Discount Updated Successfully";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discount=discount::findorFail($id);

        Stockspro::auditLog("Deleted Discount ".$discount->code);
        $discount->destroy($id);
        return "Discount ".$discount->code. "Deleted Successfully";
    }
}
