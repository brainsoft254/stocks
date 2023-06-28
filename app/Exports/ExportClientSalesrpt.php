<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Stockspro;

class ExportClientSalesrpt implements FromCollection,WithHeadings
{
    private $details;

    public function  __construct($details)
	{ 
		$this->details=$details;
	}

    public function headings(): array
	{
		return [
			'Code',
			'Name',
			'Amount',
		];
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $rpt=collect([]);
        
        $this->details->map(function($sale) use($rpt){
            $rpt->push((object)['code'=>$sale->code,'name'=>Stockspro::getClientName($sale->code),'Amount'=>$sale->amount]);
        });
        $salesrpt=$rpt;

        return $salesrpt;
    }
}