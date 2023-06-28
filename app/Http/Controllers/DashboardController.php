<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\items;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $start = Carbon::now()->startOfMonth()->toDateString();
        // $start = new \DateTime('now');
        // $start->modify('first day of this month');
        $end = Carbon::today()->toDateString();
        // $end = new \DateTime('now');
        // $end->modify('last day of this month');
        // dd($start);
        
        $items=items::where('status',1);
        $orders=DB::table('orders')->select(DB::raw("ifnull(sum(total),0)as ototal"))
                    ->where('status',1)
                    ->where('status',1)
                    ->whereBetween('trandate',array($start,$end))->first();
        
        $orderlist=DB::table('orders')->OrderBy('trandate','desc')->limit(7)->get();
        //$itemList=DB::table('stock_trans')->select(DB::raw("code","sum(if(transign='+',qty,qty*-1))as qty","cost"))->get();
        $balances=DB::table('receivables_transactions')->select(DB::raw("sum(if(transign='+',amount,amount*-1)) as tbal"))->whereBetween('jtdate',array($start,$end))->first();
        
        $receipts=DB::table('receipts')->select(DB::raw("ifnull(sum(amount),0)as rcts"))->where('status',1)->whereBetween('trandate',array($start,$end))->first();
        
        $creditnotes=DB::table('creditnotes')->select(DB::raw("ifnull(sum(amount),0)as credits"))->where('status',1)->whereBetween('trandate',array($start,$end))->first();
       
       $inventValue=DB::Select(DB::raw(" select getStockValue('".Auth()->User()->station."')as svalue"));
       
       $DSSales=DB::table("invoices")->select(DB::raw("getParent(clcode) AS y,SUM(amount) AS a,get_client_name(getParent(clcode))as name"))
                                     ->whereBetween("invdate",array($start,$end) )
                                     ->groupBy(DB::raw('getParent(clcode)'))
                                     ->OrderBy('a','desc')
                                     ->get();
       // dd($DSSales);
        /*sales by route & Rep*/                                    
       $routesales=DB::table("invoices")->select(DB::raw("clcode,invno,invdate,if(isVatExc(clcode),amount+vat,amount) as amount,getSalesRep(clcode) AS rep,getRoute(clcode)as route"))
       ->whereBetween("invdate",array($start,$end) )
       ->groupBy(DB::raw('getSalesRep(clcode)'))
       ->OrderBy('invdate','desc')
       ->get();
       
        
        //dd($inventValue);
        return view('dashboard')->with(['orders'=>$orders,'orderlist'=>$orderlist,'inventvalue'=>$inventValue,'balances'=>$balances,'receipts'=>$receipts,'currentdate'=>$start,'DSSales'=>$DSSales,'creditnotes'=>$creditnotes,'routesales'=>$routesales,'items'=>$items]);
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
        //
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