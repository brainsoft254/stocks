<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;
use DB;
use App\order;
use App\invoice;
use App\Exports\SalesExport;
use App\Exports\StockLevelsExport;
use App\Exports\ProductSalesExport;
use App\Exports\TenantStatementExport;
use App\Exports\ClientBalancesExport;
use App\Exports\ExportAnnualAnalysis;
use App\Exports\ExportAgingAnalysis;
use App\Exports\ExportClientSalesrpt;
use App\receipt;
use App\creditnote;
use App\sreturn;
use App\payment;
use Stockspro;
use Carbon\Carbon;
use Mail;
use App\coy;
use Maatwebsite\Excel\Facades\Excel;
use App\client;
use Illuminate\Support\Collection;

class reportsController extends Controller
{
  public function printOrder(Request $request)
  {
    $order = order::where('refno', $request->refno)->first();

    $details = $order->order_details;
    $coy = Stockspro::getCoy();
    $now = Carbon::now()->toDateTimeString();

    if ($request->pdf) {
      $pdf = PDF::loadView('reports.orders.print-order-pdf', ['order' => $order, 'details' => $details, 'coy' => $coy, 'tstamp' => $now]);
      return $pdf->stream("ORDER" . '-' . $order->refno . '.pdf');
    }
    return view('reports.orders.print-order')->with(['order' => $order, 'details' => $details, 'coy' => $coy, 'tstamp' => $now]);
  }



  public function printInvoice(Request $request)
  {
    $invoice = invoice::find($request->id);


    $coy = Stockspro::getCoy();
    $now = Carbon::now()->toDateTimeString();
    $voucherno = $invoice->order->voucherno;
    $dno = $invoice->order->dno;

    if ($request->list) {
      $details = $invoice->invoice_details;
      // dd($details);

      if ($request->pdf) {

        if ($request->pgb) {
          $pdf = PDF::loadView('reports.invoices.print-invoice-pdf_org_tmp', ['invoice' => $invoice, 'details' => $details, 'coy' => $coy, 'tstamp' => $now, 'voucherno' => $voucherno, 'dno' => $dno]);
          return $pdf->stream("INVOICE" . '-' . $invoice->invno . '.pdf');
        }
        $pdf = PDF::loadView('reports.invoices.print-invoice-pdf', ['invoice' => $invoice, 'details' => $details, 'coy' => $coy, 'tstamp' => $now, 'voucherno' => $voucherno, 'dno' => $dno]);
        return $pdf->stream("INVOICE" . '-' . $invoice->invno . '.pdf');
      }
      return view('reports.invoices.print-invoice')->with(['invoice' => $invoice, 'details' => $details, 'coy' => $coy, 'tstamp' => $now, 'voucherno' => $voucherno, 'dno' => $dno]);
    } else {
      /*select p.pdref,'' as icode ,concat(get_item_categ(p.icode),'- (Assorted)') as idesc,bprice, uprice,sum(p.dqty) as dqty,sum(p.vat_amt) as vat_amt,if(i.vatinc=1,sum(p.tamt-p.vat_amt),sum(p.tamt)) as tamt from pos_details p,ar_invoices i  where p.pdref = i.trancode and p.pdref = '" + v_pos_ref + "' group by  get_item_categ(p.icode) */
      $gdetails = DB::table("invoice_details")->select(DB::raw("concat(get_item_categ(icode),'- (Assorted)') as idesc,price,sum(qty) as qty,sum(vat) as vat,sum(total) as total "))
        ->where('invno', $invoice->invno)
        ->groupBy(DB::raw("get_item_categ(icode)"))
        ->get();

      //dd($gdetails);
      if ($request->pdf) {

        $pdf = PDF::loadView('reports.invoices.print-invoice-grp-pdf', ['invoice' => $invoice, 'details' => $gdetails, 'coy' => $coy, 'tstamp' => $now, 'voucherno' => $voucherno, 'dno' => $dno]);
        return $pdf->stream("INVOICE" . '-' . $invoice->invno . '.pdf');
      }

      return view('reports.invoices.print-invoice')->with(['invoice' => $invoice, 'details' => $gdetails, 'coy' => $coy, 'tstamp' => $now, 'voucherno' => $voucherno, 'dno' => $dno]);
    }
  }

  /*Print receipt*/
  public function printReceipt(Request $request)
  {
    $rct = receipt::where('rno', $request->rno)->first();


    $coy = Stockspro::getCoy();
    $now = Carbon::now()->toDateTimeString();

    $details = $rct->receipt_details;

    if ($request->pdf) {
      $pdf = PDF::loadView('reports.receipts.print-receipt-pdf', ['receipt' => $rct, 'details' => $details, 'coy' => $coy, 'tstamp' => $now]);
      return $pdf->stream("Receipt" . '-' . $rct->rno . '.pdf');
    }
    return view('reports.receipts.print-receipt')->with(['receipt' => $rct, 'details' => $details, 'coy' => $coy, 'tstamp' => $now]);
  }

  /*Print Creditnote*/
  public function printCreditnote(Request $request)
  {
    //dd($request);
    $crnote = creditnote::where('refno', $request->refno)->first();

    $coy = coy::first();
    $now = Carbon::now()->toDateTimeString();

    if (!$crnote->return_cr) {
      $details = $crnote->creditnote_d;
    } else {
      $ret = sreturn::where('refno', $crnote->refno)->first();
      $details = $ret->return_details;
    }

    if ($request->pdf) {
      if (!$crnote->return_cr) {
        $pdf = PDF::loadView('reports.creditnotes.print-creditnote-pdf', ['creditnote' => $crnote, 'details' => $details, 'coy' => $coy, 'tstamp' => $now]);
      } else {
        if ($request->header) {
          $pdf = PDF::loadView('reports.returns.print-creditnote-pdf-header', ['ret' => $ret, 'details' => $details, 'coy' => $coy, 'tstamp' => $now]);
        } else {
          $pdf = PDF::loadView('reports.returns.print-creditnote-pdf', ['ret' => $ret, 'details' => $details, 'coy' => $coy, 'tstamp' => $now]);
        }
      }

      return $pdf->stream("Creditnote" . '-' . $crnote->rno . '.pdf');
    }
    return view('reports.creditnotes.print-creditnote')->with(['creditnote' => $crnote, 'details' => $details, 'coy' => $coy, 'tstamp' => $now]);
  }

  /*generate stock levels*/

  public function getStockLevel()
  {
    $locations = DB::table('locations')->where('status', 1)->OrderBy('code', 'asc')->get();
    return view('reports.stocks.Fget-stock-levels')->with(['locations' => $locations]);
  }

  public function print_payment_voucher(Request $request)
  {
    $payment = payment::where('refno', $request->refno)->first();
    $coy = Stockspro::getCoy();
    $now = Carbon::now()->toDateTimeString();

    $pdf = PDF::loadView('reports.payments.print-payment-pdf', ['payment' => $payment, 'coy' => $coy, 'tstamp' => $now]);
    return $pdf->stream("PaymentVoucher" . '-' . $payment->refno . '.pdf');
  }

  public function getSalesAnalysis()
  {
    $now = Carbon::today();
    $dfrom = Carbon::today()->toDateString();
    $dto = Carbon::today()->toDateString();

    return view('reports.getSalesAnalysis')->with(['dfrom' => $dfrom, 'dto' => $dto]);
  }
  public function getClientSalesAnalysis()
  {
    $now = Carbon::today();
    $dfrom = Carbon::today()->firstOfMonth()->toDateString();
    $dto = Carbon::today()->lastOfMonth()->toDateString();
    $clients = DB::table('clients')->where(['status' => 1])->OrderBy('code', 'asc')->get();

    return view('reports.sales.getClientSalesAnalysis')->with(['dfrom' => $dfrom, 'dto' => $dto, 'clients' => $clients]);
  }
  public function getAnnualAnalysis()
  {
    $now = Carbon::today();
    $period = Carbon::now()->year;
    $dfrom = Carbon::today()->firstOfMonth()->toDateString();
    $dto = Carbon::today()->lastOfMonth()->toDateString();
    $clients = client::where(['status' => 1])->OrderBy('code', 'asc')->get();

    return view('reports.sales.do_annual_analysis')->with(['period' => $period, 'dfrom' => $dfrom, 'dto' => $dto, 'clients' => $clients]);
  }

  public function print_annual_analysis(Request $request)
  {

    $xcelUri = substr(str_replace('&pdf=0', '&excel=1', $request->getrequestUri()), 1);
    $details = collect();
    $allClients = $request->client == -1;
    $client = $request->client;
    $isParent = $request->cltype == 1;
    $invoiceSource = $request->source == 1;
    $period = $request->period;
    $yrstart = Carbon::Create($period)->startOfYear()->format('Y-m-d');
    $yrend = Carbon::Create($period)->endOfYear()->format('Y-m-d');
    $rptmode = $request->rptmode;
    $timestamp = Carbon::now()->timestamp;

    $yrsales = $invoiceSource ? invoice::where(['status' => 1, 'locked' => 1])->whereBetween('invdate', [$yrstart, $yrend])->get() :
      order::where(['status' => 1])->whereBetween('trandate', [$yrstart, $yrend])->get();

    $monthsBtn = Stockspro::getBetweenMonths($yrstart, $yrend);



    $dbclients = client::where(['status' => 1])->get();
    $dbparents = $dbclients->filter(function ($cl) {
      return $cl->parent > 0;
    });
    switch ($rptmode) {
      case -1:

        $clients = $dbclients;
        $parents = $dbparents;
        break;
      case 0:
        $clients = $dbclients->whereIn('code', $yrsales->pluck('clcode'));
        $parents = $clients->filter(function ($cl) {
          return $cl->parent > 0;
        });
        break;
      case 1:
        $clients = $dbclients->whereNotIn('code', $yrsales->pluck('clcode'));
        $parents = $clients->filter(function ($cl) {
          return $cl->parent > 0;
        });
        break;
      default:
        $clients = $dbclients;
        $parents = $dbparents;
    }

    //    dd($monthsBtn);


    if ($isParent) {
      if ($allClients) {
        foreach ($parents as $parent) {
          //get children attached to the parent
          $children = $clients->filter(function ($cl) use ($parent) {
            return $cl->attachedto == $parent->code;
          });

          //dd(Stockspro::getAnnualReceipts($parent, $children));
          //get parent Analysis for each parent
          $details->push((object)[
            'code' => $parent->code, 'name' => $parent->name,
            'sales' => Stockspro::getParentAnnualSales($yrsales, $parent, $children),
            'crnote' => Stockspro::getAnnualCreditnotes($yrstart, $yrend, $parent, $children),
          ]);
          //'paid'=>Stockspro::getAnnualReceipts($yrstart,$yrend,$parent, $children)
        }
        // dd($details->all());
      } else {

        $parent = $parents->where('code', $client);
        $children = $clients->where(
          'attachedto',
          $client
        );

        //get  Analysis for each child
        foreach ($children as $child) {

          $details->push((object)[
            'code' => $child->code, 'name' => $child->name,
            'sales' => Stockspro::getParentAnnualSales($yrsales, $child, $child, true),
            'crnote' => Stockspro::getAnnualCreditnotes($yrstart, $yrend, $child, $child, true),
            'paid' => Stockspro::getAnnualReceipts($yrstart, $yrend, $child, $child, true)
          ]);
        }

        //dd($details);

      }
    } else {
      if ($allClients) {
        $children = $clients->where('parent', 0)->sortBy('code');
        //get  Analysis for each child
        foreach ($children as $child) {
          $details->push((object)[
            'code' => $child->code, 'name' => $child->name,
            'sales' => Stockspro::getParentAnnualSales($yrsales, $child, $child, true),
            'crnote' => Stockspro::getAnnualCreditnotes($yrstart, $yrend, $child, $child, true),
            'paid' => Stockspro::getAnnualReceipts($yrstart, $yrend, $child, $child, true)
          ]);
        }
        // dd($details);
      } else {
        $child = $clients->where('code', $client)->first();

        //get  Analysis for each child
        $details->push((object)[
          'code' => $child->code, 'name' => $child->name,
          'sales' => Stockspro::getParentAnnualSales($yrsales, $child, $child, true),
          'crnote' => Stockspro::getAnnualCreditnotes($yrstart, $yrend, $child, $child, true),
          'paid' => Stockspro::getAnnualReceipts($yrstart, $yrend, $child, $child, true)
        ]);
      }
    }

    // dd($details->all());

    $rptOptions = [
      'details' => $details->all(), 'monthsBtn' => $monthsBtn, 'period' => $period, 'datasource' => $invoiceSource ? 'INVOICES' : 'ORDERS', 'rpt_type' => $isParent ? 'PARENT' : 'CHILD', 'client' => $allClients ? 'ALL CLIENTS' : $client . ':' . Stockspro::getClientName($client), 'xceluri' => $xcelUri
    ];

    if ($request->excel) {
      return Excel::download(new ExportAnnualAnalysis($rptOptions), 'print_annual_analysis_excel' . $period . $timestamp . '.xlsx');
    }


    return view('reports.sales.annual_analysis')->with($rptOptions);
  }


  public function getClientBalances()
  {
    $now = Carbon::today();
    $asAtDate = Carbon::today()->toDateString();
    $clients = client::where(['status' => 1])->OrderBy('code', 'asc')->get();



    return view('reports.sales.getClientBalances')->with(['asAtDate' => $asAtDate, 'clients' => $clients]);
  }
  public function getRepSalesAnalysis()
  {
    $now = Carbon::today();
    $dfrom = Carbon::today()->firstOfMonth()->toDateString();
    $dto = Carbon::today()->lastOfMonth()->toDateString();
    $clients = DB::table('clients')->where(['status' => 1])->OrderBy('code', 'asc')->get();
    $staffs = DB::table('users')->where(['status' => 1])->OrderBy('name', 'asc')->get();

    return view('reports.sales.getRepSalesAnalysis')->with(['dfrom' => $dfrom, 'dto' => $dto, 'staffs' => $staffs]);
  }

  public function getProductSalesAnalysis()
  {
    $now = Carbon::today();
    $dfrom = Carbon::today()->firstOfMonth()->toDateString();
    $dto = Carbon::today()->lastOfMonth()->toDateString();
    $items = DB::table('items')->where(['status' => 1])->OrderBy('code', 'asc')->get();
    $locations = DB::table('locations')->where(['status' => 1])->OrderBy('code', 'asc')->get();
    $clients = DB::table('clients')->where(['status' => 1])->OrderBy('code', 'asc')->get();

    return view('reports.sales.get_product_sales_analysis')->with(['dfrom' => $dfrom, 'dto' => $dto, 'items' => $items, 'locations' => $locations, 'clients' => $clients]);
  }

  public function print_sales_analysis(Request $request)
  {
    //dd($request);
    $now = Carbon::today();
    $timestamp = Carbon::now()->timestamp;
    $sales = DB::table("invoices")->whereBetween('invdate', array($request->dfrom, $request->dto))->get();
    $coy = Stockspro::getCoy();

    if ($request->pdf) {
      //dd($sales);
      $pdf = PDF::loadView('reports.sales.print_sales_analysis_pdf', ['sales' => $sales, 'dfrom' => $request->dfrom, 'dto' => $request->dto, 'coy' => $coy]);
      return $pdf->stream("sales_analysis" . '-' . $request->dfrom . '.pdf');
    };

    if ($request->excel) {

      //return (new SalesExport())->download('invoices.xlsx');
      return Excel::download(new SalesExport($request->dfrom, $request->dto), 'invoices_' . $timestamp . '.xlsx');
    }

    return view('reports.sales.sales_analysis')->with(['sales' => $sales, 'dfrom' => $request->dfrom, 'dto' => $request->dto, 'coy' => $coy]);
  }

  public function print_client_sales_analysis(Request $request)
  {
    //dd($request);
    $coy = Stockspro::getCoy();
    $now = Carbon::now()->toDateTimeString();
    $ttimestamp = Carbon::now()->timestamp;
    $clients = DB::table('clients')->where(['status' => 1])->OrderBy('code', 'asc')->get();

    DB::select("call do_client_sales_analysis('" . $request->dfrom . "','" . $request->dto . "','" . $request->client . "','" . $request->parent . "')");
    $details = DB::table('client_sales_analysis')->OrderBy('amount', 'desc')->get();

    if ($request->pdf) {
      //dd($sales);
      $pdf = PDF::loadView('reports.sales.print_client_sales_analysis_pdf', ['sales' => $details, 'coy' => $coy, 'tstamp' => $now, 'dfrom' => $request->dfrom, 'dto' => $request->dto, 'parent' => $request->parent, 'client' => $request->client, 'clients' => $clients]);
      return $pdf->stream('Client_sales_analysis_' . $request->client . '-' . $request->dfrom . '.pdf');
    };

    if ($request->excel) {
      return Excel::download(new ExportClientSalesrpt($details), 'Client_Sales_Rpt' . $ttimestamp . '.xlsx');
    }


    return view('reports.sales.sales_analysis_by_client')->with(['details' => $details, 'coy' => $coy, 'tstamp' => $now, 'dfrom' => $request->dfrom, 'dto' => $request->dto, 'client' => $request->client, 'parent' => $request->parent, 'clients' => $clients]);
  }




  public function print_client_balances(Request $request)
  {
    //dd($request);
    $coy = Stockspro::getCoy();
    $now = Carbon::now()->toDateTimeString();
    $ttimestamp = Carbon::now()->timestamp;
    $client_type = $request->cltype ? 'PARENT' : 'CHILD';
    $report_type = $request->summary ? 'SUMMARY' : 'DETAILED';
    $clcode = $request->client;
    $isParent = $request->cltype > 0;
    $asatDate = $request->asatdate;
    $isSummary = $request->summary > 0;
    $details = collect();
    $total = 0;

    // dd($request);
    if ($isParent) {
      if ($clcode != -1) {

        //parent client selected
        $parent = client::where('code', $clcode)->first();
        //children
        $children = client::where(['attachedto' => $clcode])->OrderBy('code', 'asc')->get();

        if ($isSummary) {
          //Sum chilren balances grouped by parent code
          //get children balances
          $total += Stockspro::getChildrenBal($children, $asatDate);

          //get parent balance and add it up to children balance.
          $total += Stockspro::getClBalance($parent->transactions, $asatDate);
          if ($total > 0) {
            $details->push((object) ['code' => $parent->code, 'name' => $parent->name, 'bal' => $total]);
          }
          //dd($details);
        } else {
          //Details for a single Parent Selected
          //get parent balance and add it up to children balance.
          foreach ($children as $child) {
            $total += Stockspro::getClBalance($child->transactions, $asatDate);

            if ($total > 0) {
              $details->push((object)['code' => $child->code, 'name' => $child->name, 'bal' => $total, 'parent' => $parent->code]);
            }
            $total = 0;
          }
          $total += Stockspro::getClBalance($parent->transactions, $asatDate);
          $details->push((object)['code' => $parent->code, 'name' => $parent->name, 'bal' => $total, 'parent' => $parent->code]);
        }
      } else {
        //All parent clients summary
        $parents = client::where('parent', 1)->get();

        if ($isSummary) {

          foreach ($parents as $parent) {
            $children = client::where(['attachedto' => $parent->code])->OrderBy('code', 'asc')->get();
            //get Children total balance
            $total += Stockspro::getChildrenBal($children, $asatDate);
            //get parent balance and add it up to children balance.
            $total += Stockspro::getClBalance($parent->transactions, $asatDate);
            if ($total > 0) {
              $details->push((object) ['code' => $parent->code, 'name' => $parent->name, 'bal' => $total]);
            }
            $total = 0;
          }
        } else {
          //Detailed For All parents
          foreach ($parents as $parent) {
            $children = client::where(['attachedto' => $parent->code])->OrderBy('code', 'asc')->get();

            foreach ($children as $child) {
              $total += Stockspro::getClBalance($child->transactions, $asatDate);

              if ($total > 0) {
                $details->push((object) ['code' => $child->code, 'name' => $child->name, 'bal' => $total, 'parent' => $parent->code]);
              }
              $total = 0;
            }
            $total += Stockspro::getClBalance($parent->transactions, $asatDate);
            $details->push((object) ['code' => $parent->code, 'name' => $parent->name, 'bal' => $total, 'parent' => $parent->code]);
            $total = 0;
          }
        }
      }
    } else {
      //Children Balances
      //No Summary  when its only children
      //All clients Balances
      if ($clcode != -1) {
        $client = client::where('code', $clcode)->first();
        $details->push((object)['code' => $client->code, 'name' => $client->name, 'bal' => Stockspro::getClBalance($client->transactions, $asatDate)]);
        //dd($details);
      } else {
        $clients = client::where('status', 1)->get();
        foreach ($clients as $client) {
          $total = Stockspro::getClBalance($client->transactions, $asatDate);
          if ($total > 0) {
            $details->push((object)['code' => $client->code, 'name' => $client->name, 'bal' => $total]);
          }
        }
      }
    }
    //Get Total Balances
    $totalBals = $details->pipe(function ($coll) {
      return $coll->sum('bal');
    });

    $rptOptions = collect(['totalBals' => $totalBals, 'details' => $details->sortByDesc('bal'), 'coy' => $coy, 'tstamp' => $now, 'asatdate' => $request->asatdate, 'client_type' => $client_type, 'report_type' => $report_type, 'summary' => $request->summary, 'cltype' => $request->cltype, 'client' => $request->client]);

    if ($isParent && !$isSummary && $clcode == -1) {
      $parents = client::where('parent', 1)->get();
      $children = client::where('attachedto', '!=', '')->get();

      $parOrdered = $parents->map(function ($par) use ($children) {
        //dd($children->where('attachedto', $par->code)->count());
        $updated = collect($par)->put('children', $children->where('attachedto', $par->code)->count());
        //dd($updated->all());
        return (object)$updated->all();
      });
      $rptOptions->put('parents', $parOrdered->sortByDesc('children'));
    }
    if ($request->pdf) {
      $pdf = PDF::loadView('reports.sales.print_client_balances_pdf', $rptOptions->all());

      return $pdf->stream("Client_Balances_List" . '-' . $now . '.pdf');
    }

    if ($request->excel) {
      return Excel::download(new ClientBalancesExport($rptOptions->all()), 'Clients_Balances_ASAT_' . $ttimestamp . '.xlsx');
    }


    //return view('reports.sales.print_client_balances_excel')->with($rptOptions->all());
    return view('reports.sales.client_balances')->with($rptOptions->all());
  }

  public function print_rep_sales_analysis(Request $request)
  {
    $coy = Stockspro::getCoy();
    $now = Carbon::now()->toDateTimeString();
    $ttimestamp = Carbon::now()->timestamp;

    //DB::select("call do_sales_route_rep('" . $request->dfrom . "','" . $request->dto . "')");
    $details = DB::table('tmp_sales_routes')->OrderBy('rep', 'asc')->get();
    $staffs = DB::table('tmp_sales_routes')->select('rep', 'route')->groupBy('rep')->groupBy('route')->get();
    $routes = DB::table('tmp_sales_routes')->select('rep', 'route')->groupBy('rep')->groupBy('route')->get();

    return view('reports.sales.sales_analysis_by_rep')->with(['details' => $details, 'coy' => $coy, 'tstamp' => $now, 'dfrom' => $request->dfrom, 'dto' => $request->dto, 'routes' => $routes, 'staffs' => $staffs]);
  }

  public function print_product_sales_analysis(Request $request)
  {
    $coy = coy::first();
    $now = Carbon::now()->toDateTimeString();
    $ttimestamp = Carbon::now()->timestamp;
    $clients = DB::table('clients')->where(['status' => 1, 'parent' => 1])->OrderBy('code', 'asc')->get();

    //dd($request);

    DB::select("call do_sales_by_product('" . $request->product . "','" . $request->dfrom . "','" . $request->dto . "','" . $request->location . "','" . $request->clcode . "')");

    $details = DB::table('tmp_prod_sales')->OrderBy('invdate', 'asc')->get();
    $master = DB::table('tmp_prod_sales')->OrderBy('icode', 'asc')
      ->groupBy('icode')
      ->get();


    if ($request->pdf) {
      $pdf = PDF::loadView('reports.sales.print_product_sales_analysis_pdf', ['client' => $request->clcode, 'details' => $details, 'coy' => $coy, 'tstamp' => $now, 'dfrom' => $request->dfrom, 'dto' => $request->dto, 'product' => $request->product, 'location' => $request->location, 'master' => $master, 'coy' => $coy]);
      return $pdf->stream("Product_sales_analysis" . '-' . $ttimestamp . '.pdf');
    };


    if ($request->excel) {
      return Excel::download(new ProductSalesExport($request->dfrom, $request->dto, $master, $details, $request->clcode), 'Product_Sales_' . $ttimestamp . '.xlsx');
    }

    return view('reports.sales.sales_analysis_by_product')->with(['details' => $details, 'coy' => $coy, 'tstamp' => $now, 'dfrom' => $request->dfrom, 'dto' => $request->dto, 'product' => $request->product, 'location' => $request->location, 'master' => $master, 'client' => $request->clcode]);
  }




  public function print_stock_levels(Request $request)
  {
    $coy = Stockspro::getCoy();
    $now = Carbon::now()->toDateTimeString();
    $ttimestamp = Carbon::now()->timestamp;
    $stocks = DB::table("stock_trans")->select(DB::raw("code,sum(if(transign='+',qty,qty*-1)) as qty"))
      ->where(["location" => $request->location])
      ->groupBy("code")
      ->OrderBy("code", 'asc')
      ->get();

    if ($request->pdf) {
      $pdf = PDF::loadView('reports.stocks.print-stocks-levels-pdf', ['details' => $stocks, 'coy' => $coy, 'tstamp' => $now, 'location' => $request->location, 'ttimestamp' => $ttimestamp]);
      return $pdf->stream("StockLevels" . '-' . $ttimestamp . '.pdf');
    }

    if ($request->excel) {
      //return (new SalesExport())->download('invoices.xlsx');
      return Excel::download(new StockLevelsExport($request->location), $request->location . '_StockLevels_' . $ttimestamp . '.xlsx');
    }

    return view('reports.stocks.print-stocks-levels')->with(['details' => $stocks, 'coy' => $coy, 'tstamp' => $now, 'location' => $request->location]);
  }

  public function getClientStat()
  {
    $now = Carbon::today();
    $dfrom = Carbon::today()->toDateString();
    $dto = Carbon::today()->toDateString();

    $clients = DB::table('clients')->where('status', 1)->OrderBy('code', 'asc')->get();
    return view('reports.statements.do_statement')->with(['clients' => $clients, 'dfrom' => $dfrom, 'dto' => $dto]);
  }

  public function print_client_statement(Request $request)
  {
    $with_parent_sales = ($request->with_parent == 'on' ? 1 : 0);
    if ($request->cltype) {
      DB::select("call do_client_statement_parent('" . $request->client . "','" . $request->dfrom . "','" . $request->dto . "','" . $with_parent_sales . "')");
    } else {
      DB::select("call do_client_statement('" . $request->client . "','" . $request->dfrom . "','" . $request->dto . "')");
    }

    $coy = coy::first();

    $now = Carbon::now()->toDateTimeString();
    $ttimestamp = Carbon::now()->timestamp;

    $client = DB::table('clients')->where('code', $request->client)->first();
    $details = DB::table('clstat')->OrderBy('jdate', 'asc')->get();
    $aging = DB::table('claging')->get();

    if ($request->pdf) {
      if ($request->cltype) {
        if ($request->withheader) {

          $pdf = PDF::loadView('reports.statements.print_client_statement_parent_header_pdf', ['statement' => $details, 'tstamp' => $now, 'client' => $client, 'aging' => $aging, 'dfrom' => $request->dfrom, 'dto' => $request->dto, 'parent' => $request->cltype, 'coy' => $coy])->setPaper('a4', 'landscape');
        } else {
          $pdf = PDF::loadView('reports.statements.print_client_statement_parent_pdf', ['statement' => $details, 'tstamp' => $now, 'client' => $client, 'aging' => $aging, 'dfrom' => $request->dfrom, 'dto' => $request->dto, 'parent' => $request->cltype])->setPaper('a4', 'landscape');
        }
      } else {
        if ($request->withheader) {

          $pdf = PDF::loadView('reports.statements.print_client_statement_header_pdf', ['statement' => $details, 'tstamp' => $now, 'client' => $client, 'aging' => $aging, 'dfrom' => $request->dfrom, 'dto' => $request->dto, 'parent' => $request->cltype, 'coy' => $coy]);
        } else {
          $pdf = PDF::loadView('reports.statements.print_client_statement_pdf', ['statement' => $details, 'tstamp' => $now, 'client' => $client, 'aging' => $aging, 'dfrom' => $request->dfrom, 'dto' => $request->dto, 'parent' => $request->cltype]);
        }
      }
      return $pdf->stream("Client-statement" . '-' . $request->client . '.pdf');
    }

    if ($request->excel) {

      return Excel::download(new TenantStatementExport($request->dfrom, $request->dto, $details, $coy, $client), 'Periodic_stat_' . $client->name . '-' . $ttimestamp . '.xlsx');
    }

    /*Email Statement as attachment*/
    if ($request->emailpdf) {
      $toemail = $request->toemail;

      if ($request->cltype) {
        $pdf = PDF::loadView('reports.statements.print_client_statement_parent_pdf', ['statement' => $details, 'tstamp' => $now, 'client' => $client, 'aging' => $aging, 'dfrom' => $request->dfrom, 'dto' => $request->dto, 'parent' => $request->cltype])->setPaper('a4', 'landscape');
      } else {
        $pdf = PDF::loadView('reports.statements.print_client_statement_pdf', ['statement' => $details, 'tstamp' => $now, 'client' => $client, 'aging' => $aging, 'dfrom' => $request->dfrom, 'dto' => $request->dto, 'parent' => $request->cltype]);
      }


      $dfrom = $request->dfrom;
      $dto = $request->dto;
      $data = array("period" => $request->dfrom . ' to ' . $request->dto);

      Mail::send('email.statement', $data, function ($message) use ($toemail, $pdf, $dfrom, $dto) {
        $message
          ->from(env('EMAIL_FROM'), env('FROM_NAME'))
          ->to($toemail)
          ->attachData($pdf->output(), 'statement.pdf')
          ->subject('Statement between ' . $dfrom . ' to ' . $dto);
      });
      return "Send Successfully !";
    }


    return view('reports.statements.print_client_statement')->with(['statement' => $details, 'coy' => $coy, 'tstamp' => $now, 'client' => $client, 'aging' => $aging, 'dfrom' => $request->dfrom, 'dto' => $request->dto, 'parent' => $request->cltype, 'ptrans' => $request->with_parent]);
  }

  /*generate aging analysis*/
  public function getClientAging()
  {
    $now = Carbon::today();
    $dfrom = Carbon::today()->toDateString();
    $dto = Carbon::today()->toDateString();

    $clients = DB::table('clients')->where('status', 1)->OrderBy('code', 'asc')->get();
    return view('reports.aging.do_client_aging')->with(['clients' => $clients, 'dfrom' => $dfrom, 'dto' => $dto]);
  }

  public function print_client_aging_analysis(Request $request)
  {
    $header = [];
    switch ($request->period) {
      case 30:
        $header = ["#", "Code", "Name", "Current", "30-60", "61-90", "Over 90", "Total"];
        break;
      case 60:
        $header = ["#", "Code", "Name", "Current", "60-120", "121-180", "Over 180", "Total"];
        break;
      case 90:
        $header = ["#", "Code", "Name", "Current", "90-180", "181-270", "Over 270", "Total"];
        break;
    }
    //  // dd($request);
    $coy = coy::first();
    $now = Carbon::now()->toDateTimeString();
    $ttimestamp = Carbon::now()->timestamp;
    $isParent = $request->parent > 0;
    $isAllClients = $request->client == -1;
    $clientcode = $request->client;
    $period = $request->period;

    $clients = client::where(['status' => 1])->get();

    $parentCl = $isAllClients ? $clients->filter(function ($cl) {
      return $cl->attachedto == "";
    }) : $clients->filter(function ($cl) use ($clientcode) {
      return $cl->code == $clientcode;
    });



    $childrencl = $isAllClients ?
      $clients->whereIn(
        'attachedto',
        $parentCl->pluck('code')->all()
      )
      :
      $clients->whereIn('code', $clientcode);


    $sales = \App\invoice::where(['status' => 1, 'locked' => 1])->get();

    //    $childrenSales = $sales->wherein('clcode', $childrencl->pluck('code')->all());

    $details = collect([]);


    if ($isParent) {
      //parent aging
      $details = Stockspro::getAging($sales, $parentCl, $isParent, $period);
    } else {
      //Children Aging
      $details = Stockspro::getAging($sales, $childrencl, $isParent, $period);
    }

    if ($request->excel) {
      //dd(collect($details));
      return Excel::download(new ExportAgingAnalysis(collect($details), $header), 'Aging_Analysis_period' . $request->period . '.xlsx');
    }


    return view('reports.aging.client_aging_report')->with(['details' => $details, 'header' => $header, 'coy' => $coy, 'tstamp' => $now, 'period' => $request->period, 'parent' => $request->parent, 'client' => $request->client, 'balance' => $request->balance]);
  }

  public function getInvoicelisting()
  {
    $now = Carbon::today();
    $dfrom = Carbon::today()->firstOfMonth()->toDateString();
    $dto = Carbon::today()->lastOfMonth()->toDateString();

    $clients = DB::table('clients')->where('status', 1)->OrderBy('code', 'asc')->get();
    return view('reports.invoices.do_invoices_list')->with(['clients' => $clients, 'dfrom' => $dfrom, 'dto' => $dto]);
  }

  public function print_client_invoice_listing(Request $request)
  {
    $coy = coy::first();
    $now = Carbon::now()->toDateTimeString();
    $ttimestamp = Carbon::now()->timestamp;
    //$details ="";

    //dd($request);

    //do_client_aging(v_client varchar(25),v_rd integer,v_bal decimal(20,2),v_status integer,v_parent integer )


    // if(!$request->pdf){
    DB::connection()->enableQueryLog();
    if ($request->parent > 0) {
      $details = DB::table('invoices')->select(DB::raw('invno,invdate,clcode,lpo,
                                          if(isVatExc(clcode),amount+vat,amount)as amount,amount_paid as paid,(if(isVatExc(clcode),amount+vat,amount)-amount_paid) as due'))
        ->whereBetween('invdate', array($request->datefrom, $request->dateto))
        ->whereRaw('getParent(clcode)=?', [$request->client])
        ->OrderBy('invdate', 'asc')
        ->get();
    } else {
      $details = DB::table('invoices')->select(DB::raw('invno,invdate,clcode,lpo,
                                          if(isVatExc(clcode),amount+vat,amount)as amount,amount_paid as paid,(if(isVatExc(clcode),amount+vat,amount)-amount_paid) as due'))
        ->whereBetween('invdate', array($request->datefrom, $request->dateto))
        ->where('clcode', $request->client)
        ->OrderBy('invdate', 'asc')
        ->get();
    }

    // dd(DB::getQueryLog());

    if ($request->pdf) {
      $pdf = PDF::loadView('reports.aging.print-client-aging-pdf-header', ['details' => $details, 'tstamp' => $now, 'client' => $request->client, 'period' => $request->period, 'parent' => $request->parent, 'coy' => $coy])->setPaper('a4', 'landscape');
      return $pdf->stream("Client-Aging-Analysis" . '-' . $request->client . '.pdf');
    }

    return view('reports.invoices.print-invoice-listing')->with(['details' => $details, 'coy' => $coy, 'tstamp' => $now, 'period' => $request->period, 'parent' => $request->parent, 'client' => $request->client, 'balance' => $request->balance]);
  }
};
