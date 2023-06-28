<?php
namespace App\Helpers;

use App\invoice;
use App\order;
use App\issue;
use DB;
use Auth;
use Carbon\carbon;
use Carbon\CarbonPeriod;
use App\client;
use App\client_tran;
use App\setting;
use Telegram;
use Ixudra\Curl\Facades\Curl;

class customFunctions{

	public static function passwordExpired()
	{
		$pswdAge=config('auth.password_age');
		$pswd_updated_at=Auth::user()->pswd_updated_at;

		return Carbon::parse($pswd_updated_at)->addDays($pswdAge)<=Carbon::now();
	}

	public static function getRandomCat()
	{
		$response = Curl::to('https://api.thecatapi.com/v1/images/search')
		->asJson()
        ->get();
		return $response[0]->url;
	}


	public static function auditLog($operation){
		DB::select("call do_audit_trail('".Auth::user()->name."','".$operation."')");
		return true;
	}
	public static function auditLogVue($operation,$staff){
	DB::select("call do_audit_trail('".$staff."','".$operation."')");
	return true;
	}

	public static function vatRate()
	{
		$settings=setting::first();
		
		return $settings->vrate;
	}

	public static function getToday()
	{
		return Carbon::now()->toDateString();
	}

	public static function getTimestamp()
	{
		return Carbon::now()->toDateTimeString();
	}

	public static function cleanNumber($var) {

		return preg_replace('/[^\d.]/', '', $var);
	}


	public static function stripCommas($str)
	{
		return str_replace(",", "", $str);
	}

	public static function getNextNumber($vtype,$inc)
	{
		$nextNo=DB::select("select get_next_number('".$vtype."','".$inc."')as no");

		return $nextNo[0]->no; 
	}
	public static function getItems($status=1)
	{	
		$items=DB::table('items')->where('status',$status)->get();

		return $items;
	}
	public static function getItemCategory($itemcode)
	{
		$item=DB::table('items')->where('code',$itemcode)->first();
		return $item->category; 
	}
	public static function getCoy()
	{
		$coy=\App\coy::where('defaultcoy',1)->first();
		return $coy; 
	}
	public static function getItemDescr($itemcode)
	{
		$item=DB::table('items')->where('code',$itemcode)->first();
		return $item->description; 
	}

	public static function getLocationName($code)
	{
		if(DB::table('locations')->where('code',$code)->exists()){
			$location=DB::table('locations')->where('code',$code)->first();
			return $location->description; 
		}else{
			return "UnKnown";
		}
	}
	public static function getClientName($code)
	{
		$client=DB::table('clients')->where('code',$code)->first();
		return $client->name; 
	}

	public static function getClientContacts($client){
		if(SELF::isChild($client)){$parent=trim(SELF::getParent($client));}else{$parent=$client;}
			$info=DB::table('clients')->where(['code'=>$parent])->first();
			return $info;
		}
		public static function getClientCode($clname)
		{

			$client=client::where('name',$clname)->first();
			dd($client->code);
			return $client->code; 
		}

		public static function getItemDescrClient($itemcode,$client)
		{

			$parent="";
			if(SELF::isClientItem($itemcode,$client)){
				if(SELF::isChild($client)){ $parent=SELF::getParent($client);}else{$parent=$client;}
					$item=DB::table('client_items')->where(['itemcode'=>$itemcode,'clcode'=>$parent])->first();

					return $item->description; 
				}else{

					$item=DB::table('items')->where(['code'=>$itemcode])->first();

					return $item->description; 
				}
			}

			public static function getBuyingPrice($item)
			{
				$item=DB::table('items')->where(['code'=>$item])->first();
				return $item->bprice;
			}

			public static function getClientPrice($item,$client)
			{
				if(SELF::isClientItem($item,$client)){
					$item=DB::table("client_items")->where(['clcode'=>SELF::getParent($client),'itemcode'=>$item])->first();
					$var= (SELF::isVatable($client)>0?round(($item->price*100/116),2):$item->price);
					return $var;
				}else{
					$item=DB::table("items")->where(['code'=>$item])->first();
					$var =(SELF::isVatable($client)>0?round(($item->sprice*100/116),2):$item->sprice);
					return $var;
				}
			}

			public static function round_up ($value, $precision ) { 
				$pow = pow ( 10, $precision ); 
				return ( ceil ( $pow * $value ) + ceil ( $pow * $value - ceil ( $pow * $value ) ) ) / $pow; 
			} 

			public static function isChild($client)
			{
				if(SELF::clientExists($client)){
					$client=DB::table('clients')->where('code',$client)->first();
					return ($client->parent==0?1:0);
				}else{
					return 0;
				}
			}

			public static function getParent($childclient)
			{ 
				if(SELF::isChild($childclient)){
					$client=DB::table('clients')->select(DB::raw('if(attachedto="",code,attachedto) as parent'))->where('code',$childclient)->first();
					return $client->parent;
				}else{
					return $childclient;
				}
			}

			public static function isClientItem($item,$client)
			{
				$parent="";
				if(SELF::isChild($client)){ $parent=SELF::getParent($client);}else{$parent=$client;}
					if(DB::table('client_items')->where(['itemcode'=>$item,'clcode'=>$parent])->exists()){
						return 1;
					}else{
						return 0;
					}
				}
				public static function getParentVatStatus($client)
				{
					$parent="";
					DB::enableQueryLog();
					if(SELF::isChild($client)){ $parent=SELF::getParent($client);}else{$parent=$client;}
						$clparent=DB::table('clients')->where('code',$parent)->get();
						dd(DB::getQueryLog());
						$vstat=$clparent[0]->vatexc;
						return $vstat;	
					}

					public static function clientExists($client)
					{
						if(DB::table('clients')->where(['code'=>$client])->exists()){
							return 1;
						}else{
							return 0;
						}
					}

					public static function getItemQty($item,$location)
					{
						$item=DB::table('stock_trans')->select(DB::raw("ifnull(sum(if(transign='+',qty,qty*-1)),0) as qty"))->where(['code'=>$item,'location'=>$location])->first();
						return $item->qty;
					}

/**
*Check if available quatities in the order location are  enough to service the recorded order
*/
public static function isOrderServiceable($orderno){

	$isServiceable=0;
	if(DB::table('orders')->where('refno',$orderno)->exists())
		{
			$order=order::where('refno',$orderno)->first();
			DB::table('orderlogs')->where(['refno'=>$order->refno,'ostore'=>$order->location])->delete();
			foreach ($order->order_details as $order_d) {
				/*SELF::auditLog("oqty=".$order_d->qty." iqty=".SELF::getItemQty($order_d->icode,$order->location));*/
				if($order_d->qty>SELF::getItemQty($order_d->icode,$order->location)){
					SELF::auditQty($order_d->icode,SELF::getItemQty($order_d->icode,$order->location),$order_d->qty,$order->location,$order->refno);
				}
			}
			$logged=DB::table('orderlogs')->where(['ostore'=>$order->location,'refno'=>$order->refno])->get()->count();

			if($logged>0){
				$isServiceable=0;
			}else{
				$isServiceable=1;
			}

		}else{

			$isServiceable=0;
		}

		return $isServiceable;
	}


	public static function auditQty($item,$storeqty,$orderqty,$store,$refno)
	{
		DB::select("call do_logqty('".$item."','".$storeqty."','".$orderqty."','".$store."','".$refno."')");
		return true;
	}

	public static function getqtyLog($location,$refno){
		$log=DB::table("orderlogs")->select(DB::raw("concat(icode,'-Availqty=',storeqty,'-OrderQTy=',orderqty) as msg"))->where(['ostore'=>$location,'refno'=>$refno])->get();
		return json_encode($log);
	}

	public static function isVatable($client)
	{
		if(empty($client)){return 0;}
		$parent=SELF::getParent($client);
		$vclient=DB::table('clients')->where('code',$parent)->first();
		//if(empty($vclient)){return 0;}
		return ($vclient->vatexc>0?1:0);

	}

	public static function _hasVatexc($clcode)
	{
		return SELF::isVatable($clcode);
	}
	public static function _hasFactax($clcode)
	{
		if(empty($clcode)){return 0;}
		$parent=SELF::getParent($clcode);
		$vclient=DB::table('clients')->where('code',$parent)->first();
		
		return ($vclient->factax>0?1:0);

	}

	public static function isIssueServiceable($refno)
	{

		$isServiceable=0;
		if(DB::table('issues')->where('refno',$refno)->exists())
			{
				$issue=issue::where('refno',$refno)->first();
				DB::table('orderlogs')->where(['refno'=>$issue->refno,'ostore'=>$issue->locfrom])->delete();
				foreach ($issue->issue_details as $issue_d) {
					if($issue_d->qty>SELF::getItemQty($issue_d->code,$issue->locfrom)){
						SELF::auditQty($issue_d->code,SELF::getItemQty($issue_d->code,$issue->locfrom),$issue_d->qty,$issue->locfrom,$issue->refno);
					}
				}
				$logged=DB::table('orderlogs')->where(['ostore'=>$issue->locfrom,'refno'=>$refno])->get()->count();
				if($logged>0){
					$isServiceable=0;
				}else{
					$isServiceable=1;
				}

			}else{

				$isServiceable=0;
			}

			return $isServiceable;
		}

		public static function getClients()
		{
			$clinfo=DB::table("clients")->where("status",1)->get();
			return $clinfo;
		}
		public static function getClientOpts()
		{
			DB::enableQueryLog();
			$clients=DB::table("clients")->where("status",1)->get();
			$clopts="<option value='-1' selected>--Select Client--</option>";
			$vatopts="<option value='-1' selected>--Select VatStat--</option>";
			foreach ($clients as $client) {
				$clopts.="<option value='".$client->code."'>".$client->name."</option>";
				$vatopts.="<option value='".SELF::isVatable(SELF::getParent($client->code))."'>".SELF::isVatable(SELF::getParent($client->code))."</option>";
			};


			$clientOpts = array('clients' =>$clopts ,'vstats' =>$vatopts);

			dd(json_encode($clientOpts));
			return json_encode($clientOpts);


		}

		public static function getFactor($uom)
		{
			$unit=DB::table('units')->where('code',$uom)->first();
			return $unit->factor;
		}

		public static function reloadClPrices($client,$location)
		{
			$items=SELF::getItems(1);
			$popts="<option value='0' selected>--Select price--</option>";
			$copts="<option value='-1' selected>--Select Code--</option>";
			$dopts="<option value='-1' selected>--Select Description--</option>";
			$qtyopts="<option value='0' selected>0</option>";
			foreach ($items as $item) {
				$popts.="<option value='".SELF::getClientPrice($item->code,$client)."'>".$item->code.'-'.SELF::getClientPrice($item->code,$client)."</option>";
				$copts.="<option value='".$item->code."'>".$item->code."</option>";
				$dopts.="<option value='".trim(SELF::getItemDescrClient($item->code,$client))."'>".trim(SELF::getItemDescrClient($item->code,$client))."</option>";
				$qtyopts.="<option value='".trim(SELF::getItemQty($item->code,$location))."'>".trim(SELF::getItemQty($item->code,$location))."</option>";

			};

			$listOpts = array('prices' =>$popts ,'code' =>$copts ,'desc' =>$dopts,'qty'=>$qtyopts);

			return json_encode($listOpts);

		}

		public static function getInvoiceItems($invno)
		{
			$details=DB::table("invoice_details")->where(["invno"=>$invno])->OrderBy("id",'asc')->get();

			return $details;
		}

		public static function isLocked($invno){
			$invoice=DB::table('invoices')->where(["invno"=>$invno])->first();
			return $invoice->locked>0;
		}

		public static function sendTelegram($message){
			Telegram::sendMessage([
				'chat_id' => '-1001226410585',
				'parse_mode' => 'HTML',
				'text' => $message
			]);
		}

	public static function getInventoryValue()
	{
		$res = DB::table("stock_trans")->select(DB::Raw("sum(if(transign=' + ',qty,qty*-1))*cost as stockvalue"))
			->where('location', Auth()->User()->station)
			->first();

		return is_null($res->stockvalue) ? 0 : $res->stockvalue;
	}

	//Client Balances
	public static function getClBalance($cltrans, $asat)
	{
		return $cltrans->where('jtdate', '<=', $asat)->sum(function ($item) {
			return $item->transign == '+' ? $item->amount : $item->amount * -1;
		});
	}

	public static function getChildrenBal($children, $asat)
	{
		$total = 0;
		foreach ($children as $child) {
			$total += self::getClBalance($child->transactions, $asat);
		}
		return $total;
	}
    
	//Used when printing sales Annual Analysis 
	public static function getParentAnnualSales($allSales, $parent, $herChildren, $isSingleChild = false)
	{
		//$sortedSales = null;
		$groupedSales = null;

		//get children codes + parents
		$clcodes = $isSingleChild ? $parent->code : $herChildren->pluck('code')->push($parent->code);

		//Use the codes to get their sales;
		$sortedSales = $allSales->whereIn('clcode', $clcodes)->sortBy('invdate')->groupBy(function ($sale) {
			return date('m', strtotime($sale->invdate));
		});

		$summed = collect([]);
		$sortedSales->each(function ($sale, $key) use ($summed) {
			$summed->put($key, $sale->sum(function ($item) {
				return $item->amount;
			}));
		});


		return $summed->all();
	}

	//Used when printing sales Annual Analysis
	public static function getAnnualReceipts($yrstart,$yrend,$parent, $herChildren, $isSingleChild = false)
	{
		//get children codes + parents
		$clcodes = $isSingleChild ? $parent->code : $herChildren->pluck('code')->push($parent->code);
		
		//Use the codes to get receipts;
		$receipts=client_tran::whereIn('code',[$clcodes])
					->whereBetween('jtdate',[$yrstart,$yrend])
					->where(['trantype'=>'RECEIPT'])->get();

		$totalRCts=$receipts->reduce(function($carry,$rct){

			return $carry+($rct->transign=='-'?$rct->amount:$rct->amount*-1);
		});

		return 	isset($totalRCts)?$totalRCts:0;

	}
	//Used when printing sales Annual Analysis
	public static function getAnnualCreditnotes($yrstart,$yrend,$parent, $herChildren, $isSingleChild = false)
	{
		//get children codes + parents
		$clcodes = $isSingleChild ? $parent->code : $herChildren->pluck('code')->push($parent->code);
		// dd($clcodes);
		//Use the codes to get creditnotes;
		$creditnotes=client_tran::whereIn('code',[$clcodes])
					->whereBetween('jtdate',[$yrstart,$yrend])
					->where(['trantype'=>'CREDITNOTE'])->get();

		$totalCRts=$creditnotes->reduce(function($carry,$cr){
			
			return $carry+($cr->transign=='-'?$cr->amount:$cr->amount*-1);
		});

		return 	isset($totalCRts)?$totalCRts:0;

	}

	public static function getBetweenMonths($dateFrom, $dateTo)
	{
		foreach (CarbonPeriod::create($dateFrom, '1 month', $dateTo) as $month) {
			$months[$month->format('m')] = $month->format('M');
		}
		return collect($months);
	}
	public static function getTotalSales($yrSales)
	{
		return $yrSales->sum(function ($sale) {

			return $sale->amount;
		});
	}

	private static function getTotals($sales)
	{
		return $sales->sum(function ($sale) {
				return $sale->amount-$sale->amount_paid;
		});
	}

	private static function getChildren($parentClcode)
	{
		$childrencl = collect([]);
		$dbclients = \App\client::where('status', 1)->get();

		foreach ($parentClcode as $parcode) {
			$childrencl->push($dbclients->whereIn('attachedto', $parcode)->isEmpty() ? $dbclients->whereIn('code', $parcode)->all() : $dbclients->whereIn('attachedto', $parcode)->all());
		};



		return $childrencl->flatten();
	}

	public  static function getAging($sales, $clients, $parent, $period)
	{
		$currentAge=collect([]);
		$clientAging = collect([]);

		//get all current sales/invoices

		//get children client codes if parent else use supplied client codes;

		//dd($clients->pluck('code')->all());

		$clcodes = $parent ? SELF::getChildren($clients->pluck('code')->all())->pluck('code')->all() : $clients->pluck('code')->all();

		//Age<=30
		$CurrentSales = $sales->whereIn('clcode', $clcodes)->filter(function ($sale) use ($period) {
			return Carbon::now()->diffInDays(Carbon::parse($sale->invdate)) <= $period;
		});

		//Age>=31<=60
		$age31Sales = $sales->whereIn('clcode', $clcodes)->filter(function ($sale) use ($period) {
			return Carbon::now()->diffInDays(Carbon::parse($sale->invdate)) > $period  && Carbon::now()->diffInDays(Carbon::parse($sale->invdate)) <= $period * 2;
		});
		//Age>=61<=90
		$age61Sales = $sales->whereIn('clcode', $clcodes)->filter(function ($sale) use ($period) {
			return Carbon::now()->diffInDays(Carbon::parse($sale->invdate)) > ($period * 2) && Carbon::now()->diffInDays(Carbon::parse($sale->invdate)) <= $period * 3;
		});
		//Age>90
		$age91Sales = $sales->whereIn('clcode', $clcodes)->filter(function ($sale) use ($period) {
			return Carbon::now()->diffInDays(Carbon::parse($sale->invdate)) > $period * 3;
		});

		$clients->each(function ($client) use ($sales, $clients, $clientAging, $CurrentSales, $age31Sales, $age61Sales, $age91Sales, $parent) {

			$chCodes = $parent ? SELF::getChildren(['code' => $client->code])->pluck('code')->all() : $client->code;


			$clCurrentSales = $CurrentSales->whereIn('clcode', $chCodes);
			$clage31Sales = $age31Sales->whereIn('clcode', $chCodes);
			$clage61Sales = $age61Sales->whereIn('clcode', $chCodes);
			$clage91Sales = $age91Sales->whereIn('clcode', $chCodes);
			$totalsales = 0; //SELF::getTotals($sales->whereIn('clcode', $chCodes));

			$clientAging->push(
				(object)[
					'code' => $client->code,
					'name' => $client->name,
					'_current' => SELF::getTotals($clCurrentSales),
					'_1stage' => SELF::getTotals($clage31Sales),
					'_2ndage' => SELF::getTotals($clage61Sales),
					'_3rdage' => SELF::getTotals($clage91Sales),
					'_total' => $totalsales
				]
			);
		});

		return $clientAging->sortBy('code')->all();
	}






	}



	?>