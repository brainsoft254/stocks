<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\items;
use Stockspro;
use App\category;
use DB;
use Illuminate\Support\Str;

class itemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=items::orderBy('id','desc')->get();
        return view('settings.items.index')->with(['items'=>$items]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=category::orderBy('code','asc')->get();
        $uoms=DB::table('units')->orderBy('code','asc')->get();
        $accounts=DB::table('accounts')->orderBy('code','asc')->get();
        return view('settings.items.create')->with(['categories'=>$categories,'uoms'=>$uoms,'accounts'=>$accounts]);
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
            //'code'=>'required|alpha_dash|unique:items',
            'description'=>'required',
            // 'barcode'=> 'required|alpha_dash',
            'status'=> 'required',
            'category'=> 'required|not_in:-1',
            'bprice'=> 'required|between:1,99.99',
            'sprice'=> 'required|between:1,99.99',
            'uom'=> 'required|not_in:-1',
            'rol'=> 'required|between:1,99.99',
           /* 'forpurchase'=> 'accepted',
           'forsale'=> 'required|accepted',*/
           'acct_cog'=> 'required|not_in:-1',
           'acct_inventory'=> 'required|not_in:-1',
           'acct_income'=> 'required|not_in:-1',
       ]);
        if(Stockspro::get_settings()->ispos>0){
            $nextNo=Str::upper(substr($request->description,0,2)).Stockspro::getNextNumber("ITEM",1);        
        }else{
            $nextNo=$request->code;
        }
        $item=new items;
        $item->code=$nextNo;
        $item->description=$request->description;
        $item->barcode=$request->barcode;
        $item->status=$request->status;
        $item->category=$request->category;
        $item->vatable=$request->vatable;
        $item->bprice=$request->bprice;
        $item->sprice=$request->sprice;
        $item->rol=$request->rol;
        $item->uom=$request->uom;
        $item->forpurchase=($request->forpurchase=='on'?1:0); 
        $item->forsale=($request->forsale=='on'?1:0); 
        $item->acct_cog=$request->acct_cog; 
        $item->acct_inventory=$request->acct_inventory; 
        $item->acct_income=$request->acct_income; 

        $item->save();
        Stockspro::auditLog('Stock Item Created -'.$item->code);

        return "Item Successfully Saved Successfully !";
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
        $item=items::findorFail($id);
        $categories=category::orderBy('code','asc')->get();
        $uoms=DB::table('units')->orderBy('code','asc')->get();
        $accounts=DB::table('accounts')->orderBy('code','asc')->get();
        return view('settings.items.edit')->with(['item'=>$item,'categories'=>$categories,'uoms'=>$uoms,'accounts'=>$accounts]);
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
            'code'=>'required|alpha_dash',
            'description'=>'required',
            //'barcode'=> 'required|alpha_dash',
            'status'=> 'required',
            'category'=> 'required|not_in:-1',
            'bprice'=> 'required|between:1,99.99',
            'sprice'=> 'required|between:1,99.99',
            'uom'=> 'required|not_in:-1',
            'rol'=> 'required|between:1,99.99',
               /* 'forpurchase'=> 'accepted',
               'forsale'=> 'required|accepted',*/
               'acct_cog'=> 'required|not_in:-1',
               'acct_inventory'=> 'required|not_in:-1',
               'acct_income'=> 'required|not_in:-1',
           ]);

         $item=items::findorFail($id);
         $item->code=$request->code;
         $item->description=$request->description;
         $item->barcode=$request->barcode;
         $item->status=$request->status;
         $item->category=$request->category;
         $item->vatable=$request->vatable;
         $item->bprice=$request->bprice;
         $item->sprice=$request->sprice;
         $item->rol=$request->rol;
         $item->uom=$request->uom;
         $item->forpurchase=($request->forpurchase=='on'?1:0); 
         $item->forsale=($request->forsale=='on'?1:0); 
         $item->acct_cog=$request->acct_cog; 
         $item->acct_inventory=$request->acct_inventory; 
         $item->acct_income=$request->acct_income; 

         $item->save();
         Stockspro::auditLog('Stock Item Updated -'.$item->code);
         return "Item Successfully Updated Successfully !";

 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $item=items::findorFail($id);
        Stockspro::auditLog('Stock Item Deleted -'.$item->code);
        items::where('id',$id)->update(['deleted'=>9]);
        return "Stock Item {".$item->code."} Deleted Successfully";
    }

    public function getAllItems(){
        return Stockspro::getItems();
    }

    public function getItemDescr(Request $request){
        return Stockspro::getItemDescrClient($request->item,$request->client);
    }
    public function getItemPrice(Request $request){
        return Stockspro::getClientPrice($request->item,$request->client);
    }

    public function reloadClPrices(Request $request){
        return Stockspro::reloadClPrices($request->client,$request->location);
    }
    public function getVatStatus(Request $request){
        return Stockspro::isVatable($request->client);
    }

    public function getItemsWithLocQty(Request $request){
        $items=DB::table("items")
        ->select(DB::raw("code,description,category,bprice,sprice,".Stockspro::getItemQty(DB::raw('code'),$request->location)." as qty"))
            ->where('status',1)
            ->orderBy('code','asc')
            ->toSql();
;

            dd($items);

        return $items;
    }
}
