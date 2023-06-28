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


class StockLevelsExport  implements FromQuery,WithHeadings,ShouldAutoSize,WithColumnFormatting

{
	use Exportable;

	public function  __construct($v_location)
	{ 
		$this->location=$v_location;
		
	}

	public function columnFormats(): array
	{
		return [
			
			'D' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED2,
			'E' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED2,
			
		];
	}

	public function headings(): array
	{
		return [
			'Code',
			'Description',
			'Qty',
			'Cost',
			'Value',
			
		];
	}

	public function query()
	{
		if(!$this->location=="ALL"){
			return DB::table("stock_trans")->select(DB::raw("code,get_item_descr(code),sum(if(transign='+',qty,qty*-1)) as qty,get_bprice(code),sum(if(transign='+',qty,qty*-1))*get_bprice(code)"))
			->where('location',$this->location)
		  ->groupBy("code")
		  ->OrderBy("code", 'asc');
	
		}else{
			return DB::table("stock_trans")->select(DB::raw("code,get_item_descr(code),sum(if(transign='+',qty,qty*-1)) as qty,get_bprice(code),sum(if(transign='+',qty,qty*-1))*get_bprice(code)"))
		  ->groupBy("code")
		  ->OrderBy("code", 'asc');
	
		}
      //->get();

		//return DB::table('invoices')->select(DB::raw("invno,invdate,clcode,get_client_name(clcode),if(isVatExc(clcode)>0,amount,amount*100/116) as amount,vat,if(isVatExc(clcode)>0,amount+vat,amount) as total"))->whereBetween('invdate',array($this->dfrom,$this->dto))->orderBy('invdate','asc');

		//return invoice::query()->whereBetween('invdate',array($this->dfrom,$this->dto));
	}
}
