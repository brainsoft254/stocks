<?php

namespace App\Exports;

use App\receipt;
use App\receipt_detail;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use DB;


class CashSalesExport  implements FromQuery, WithHeadings, ShouldAutoSize, WithColumnFormatting

{
	use Exportable;
	
	public function  __construct($dfrom, $dto,$location,$product)
	{
		$this->dfrom = Carbon::parse($dfrom);
		$this->dto = Carbon::parse($dto);
		$this->location = $location;
		$this->product = $product;
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
			'Rno',
			'Date',
			'Account',
			'Code',
			'Location',
			'Price',
			'Qty',
			'Total',
		];
	}
	
	public function query()
	{
		// DB::table('invoices')->select(DB::raw("invno,invdate,clcode,get_client_name(clcode),if(isVatExc(clcode)>0,amount,amount*100/116) as amount,vat,if(isVatExc(clcode)>0,amount+vat,amount) as total"))->whereBetween('invdate', array($this->dfrom, $this->dto))->orderBy('invdate', 'asc')->get();
            $_sales = receipt::where('status',1)->whereBetween('trandate', array($this->dfrom, $this->dto))
            ->join('receipt_details',['receipts.rno'=>'receipt_details.rno'])
            ->select(DB::Raw("receipts.rno,trandate,account,location,itemcode,isprice,iqty,paid"));
            // $_sales->when(!($this->location=="ALL"),function($q)use($location){ return $q->where('location',$this->location);});
            // $_sales->when(!($this->product=="ALL"),function($p)use($product){ return $p->where('itemcode',$this->product);});
            $results=$_sales;
		
		// hpdd($results);
		
		return $results;
		
		//return invoice::query()->whereBetween('invdate',array($this->dfrom,$this->dto));
	}
}
