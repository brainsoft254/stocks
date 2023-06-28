<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invoice;
use Stockspro;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class invoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //return Schema::getColumnListing('invoices');
        $invoices = invoice::orderBy('id', 'desc')->get();
        
        return view('accounting.receivables.invoices.index')->with(['invoices'=>$invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Create New Invoice";
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
        $invoice=invoice::findorFail($id);
        $voucherno=$invoice->order->voucherno;
        $dno=$invoice->order->dno;

        $details=$invoice->invoice_details;
        $coy=Stockspro::getCoy();
        $now=Carbon::now()->toDateTimeString();
       return view('reports.invoices.print-invoice')->with(['invoice'=>$invoice,'details'=>$details,'coy'=>$coy,'tstamp'=>$now,'voucherno'=>$voucherno,'dno'=>$dno]);
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

    /** // var datastr='&refno={!!$invoice->invno!!}&list=0';
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice=invoice::findorFail($id);
        if(!$invoice->locked){
            return "Invoice  ".$invoice->invno. "Not Locked ";
        }
        $invoice->update(['locked'=>0]);
        Stockspro::auditLog("Unlocked Invoice ".$invoice->invno);
        return "Invoice  ".$invoice->invno. "Unlocked Successfully";

    }
}