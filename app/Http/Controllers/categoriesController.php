<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use Stockspro;

class categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categs=category::orderBy('id','desc')->get();
        return view('settings.categories.index')->with(['categories'=>$categs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.categories.create');
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

         $categ=new category;
         $categ->code=$request->code;
         $categ->description=$request->description;
         $categ->status=$request->status;
         $categ->save();

         stockspro::auditLog('Stock Category Created -'.$request->code);

         return "Stock Category Created Successfully";

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
       $categ=category::findorFail($id);
        return view('settings.categories.edit')->with(['category'=>$categ]);
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

        $categ=category::findorFail($id);
        $categ->code=$request->code;
        $categ->description=$request->description;
        $categ->status=$request->status;
        $categ->save();
        Stockspro::auditLog('Stock Category Updated -'.$request->code);
        return "Stock Category Updated Successfully";

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categ=category::findorFail($id);
        Stockspro::auditLog('Stock Category Deleted -'.$categ->code);
        $categ->delete();
        return "Stock Category {".$categ->code."} Deleted Successfully";

    }
}
