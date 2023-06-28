<?php

namespace App\Exports;

use App\invoice;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Illuminate\Contracts\View\View;
use DB;
use Stockspro;


class ProductSalesExport  implements FromView

{
	use Exportable;
	private $master;
	private $details;
	private $dfrom;
	private $dto;
	private $client;

	public function  __construct($dfrom,$dto,$master,$details,$client)
	{ 
		$this->master=$master;
		$this->details=$details;
		$this->details=$details;
		$this->dfrom=$dfrom;
		$this->dto=$dto;
		$this->client=$client;

	}

	public function view(): View
    {
	   if($this->client==-1){
		   $this->client="ALL";
	   }else{
		   $this->client=Stockspro::getClientName($this->client);
	   }

        return view('reports.sales.sales_analysis_by_product_excel', ['client'=>$this->client,
            'master' => $this->master,'details'=>$this->details,'dfrom'=>$this->dfrom,'dto'=>$this->dto ]);
    }
}
