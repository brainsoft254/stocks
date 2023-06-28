<?php

namespace App\Http\Controllers\api;

use App\invoice;
use App\Http\Controllers\Controller;
use App\salesrep;
use Illuminate\Http\Request;
use Stockspro;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $invoices=collect([]);
        $list=invoice::orderBy('id', 'desc')->get();
        // $list->map(function($inv) use($invoices){
        //     $invoices->push((object)[
        //         'invno'=>$inv->invno,
        //         'invdate'=>$inv->invdate,
        //         'clcode'=>$inv->clcode,
        //         'clname'=>Stockspro::getClientName($inv->clcode),
        //         'amount'=>$inv->amount,
        //         'amount_paid'=>$inv->amount_paid,
        //         'vat'=>$inv->vat,
        //         'lpo'=>$inv->lpo,
        //         'status'=>$inv->status
        //     ]);
        // });



        return $list;
    }

    public function getClientName(Request $request)
    {
        return Stockspro::getClientName($request->clientcode);
    }

    public function unlock(Request $request)
    {
        try {
            $invoice = invoice::findorFail($request->id);
            if (!$invoice->locked) {
                return "Invoice  " . $invoice->invno . "Not Locked ";
            }
            $invoice->update(['locked' => 0]);

            //Stockspro::auditLog("Unlocked Invoice " . $invoice->invno);

            return "Invoice  " . $invoice->invno . "Unlocked Successfully";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function newSalesRep(Request $request){
    $rep=salesrep::updateorCreate(['code'=>Stockspro::getNextNumber('SALESREP',1),'name'=>$request->name]);
    return $rep;
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
     * @param  \App\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoice $invoice)
    {
        //
    }
}