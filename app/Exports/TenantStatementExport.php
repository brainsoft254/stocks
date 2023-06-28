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


class TenantStatementExport  implements FromView

{
	use Exportable;
	private $statement;
	private $coy;
	private $client;
	private $dfrom;
	private $dto;

	public function  __construct($dfrom,$dto,$statement,$coy,$client)
	{ 
		$this->statement=$statement;
		$this->coy=$coy;
		$this->client=$client;
		$this->dfrom=$dfrom;
		$this->dto=$dto;

	}

	public function view(): View
    {
        return view('reports.statements.print_client_statement_excel', [
            'coy'=>$this->coy,'client' => $this->client,'statement'=>$this->statement,'dfrom'=>$this->dfrom,'dto'=>$this->dto ]);
    }
}
