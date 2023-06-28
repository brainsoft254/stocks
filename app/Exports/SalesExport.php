<?php

namespace App\Exports;

use App\invoice;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use DB;


class SalesExport  implements FromQuery, WithHeadings, ShouldAutoSize, WithColumnFormatting

{
	use Exportable;

	public function  __construct($dfrom, $dto)
	{
		$this->dfrom = Carbon::parse($dfrom);
		$this->dto = Carbon::parse($dto);
	}

	public function columnFormats(): array
	{
		return [

			'E' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED2,
			'F' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED2,
			'G' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED2,
		];
	}

	public function headings(): array
	{
		return [
			'Invno',
			'Date',
			'Code',
			'Name',
			'Amount',
			'Vat',
			'Total',
		];
	}

	public function query()
	{
		// DB::table('invoices')->select(DB::raw("invno,invdate,clcode,get_client_name(clcode),if(isVatExc(clcode)>0,amount,amount*100/116) as amount,vat,if(isVatExc(clcode)>0,amount+vat,amount) as total"))->whereBetween('invdate', array($this->dfrom, $this->dto))->orderBy('invdate', 'asc')->get();
		$results =
			DB::table('invoices')->select(DB::raw("invno,invdate,clcode,get_client_name(clcode),if(isvatexc,amount,amount*100/116) as amount,vat,if(isvatexc,amount+vat,amount) as total"))->whereBetween('invdate', array($this->dfrom, $this->dto))->orderBy('invdate', 'asc');

		// hpdd($results);

		return $results;

		//return invoice::query()->whereBetween('invdate',array($this->dfrom,$this->dto));
	}
}
