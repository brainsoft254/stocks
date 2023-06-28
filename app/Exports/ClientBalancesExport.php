<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ClientBalancesExport implements FromView
{

    private $rptOptions;
    public function  __construct($rptOptions)
    {
        //dd($rptOptions);
        $this->rptOptions = $rptOptions;
    }
    public function view(): View
    {
        return view('reports.sales.print_client_balances_excel')->with($this->rptOptions);
    }
}