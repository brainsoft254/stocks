<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportAnnualAnalysis implements FromView
{
    private $rptOptions;
    public function  __construct($rptOptions)
    {
        $this->rptOptions = $rptOptions;
    }
    public function view(): View
    {
        return view('reports.sales.print_annual_analysis_excel')->with($this->rptOptions);
    }
}