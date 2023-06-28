<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\client;
use App\items;
use App\category;
use App\client_item as clitem;
use DB;
use Stockspro;

class clientItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $clstatus=['status'=>1,'parent'=>1];
      $clients=client::where($clstatus)->get();
      $items=items::where('status',1)->get();
      $categories=category::where('status',1)->get();

      return view('settings.clients.clitems.create')->with(['clients'=>$clients,'items'=>$items,'categories'=>$categories]);
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
                'clcode'=>'required|not_in:-1',
                "itemcode"    => "required|array|min:1",
                "itemcode.*"  => "required|string|distinct|min:1|not_in:-1",
            ]);


            $count=count($request->itemcode);

            for ($i=0; $i <$count ; $i++) { 
                $clitem=new clitem;
                $clitem->clcode=$request->clcode;
                $clitem->itemcode=$request->itemcode[$i];
                $clitem->description=$request->description[$i];
                $clitem->price=$request->price[$i];
                $clitem->save();
            }

            return "Client Items Added Successfully !";

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
        $item=clitem::where('id',$id)->first();
       
        return view ('settings.clients.clitems.edit')->with(['item'=>$item]);
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
                'itemcode'=>'required',
                'description'=>'required',
                'price'=>'required|numeric|min:1',
            ]);


            $item=clitem::findorFail($id);
            $oldprice=$item->price;
            $olddesc=$item->description;
            $idesc=($olddesc==$request->description? 0:1);
            $item->price=$request->price;
            $item->description=$request->description;
            $item->save();
            $newdesc=($idesc>0? 'and new description to'.$request->description:'');
            Stockspro::auditLog("Cl_item ".$item->itemcode." Changed price from ".$oldprice."to ".$request->price.$newdesc);
            return "Price changed from KES {".$oldprice."} to KES. ".$request->price." For Item {".$item->itemcode.'} Successfully';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=clitem::where('id',$id)->first();
        Stockspro::auditLog("Cl_item ".$item->itemcode." Deleted Successfully ");
        clitem::destroy($id);
        return "Item {".$item->itemcode."} Deleted Successfully ";
    }
}
