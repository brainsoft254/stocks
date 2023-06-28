<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\URL;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/posi', 'TelegramBotController@rett');
Route::get('backup', 'sandBoxController@init');
Route::get('usersx', 'usersController@export');
Route::get('usersx', 'usersController@export');





Route::group(['middleware' => ['web','auth']], function() {
	
	Route::resource('/', 'DashboardController');
	Route::resource('clitems', 'clientItemsController');
	Route::resource('clients', 'clientsController');
	Route::resource('items', 'itemsController');
	Route::resource('roles', 'rolesController');
	Route::resource('accounts', 'accountsController');
	Route::resource('locations', 'locationsController');
	Route::resource('categories', 'categoriesController');
	Route::get('show-roles', 'rolesController@show_rights');
	Route::resource('users', 'usersController');
	Route::resource('coys', 'coyController');
	Route::resource('setup', 'settingsController');
	Route::get('post-grn', 'grnController@postGrn');
	Route::get('print-grn-pdf', 'grnController@printGrnPdf');
	Route::get('reverse-grn', 'grnController@reverseGrn');
	Route::resource('grn', 'grnController');
	Route::resource('units', 'unitsController');
	Route::get('getQty', 'ordersController@getItemQty');
	Route::get('post-order', 'ordersController@postSalesOrder');
	Route::resource('orders', 'ordersController');
	Route::get('get-delivery-note', 'ordersController@getDeliveryNote');
	Route::get('print-delivery-note', 'ordersController@getDeliveryNote');
	Route::get('get-new-row', 'ordersController@getNewRow');
	Route::resource('invoices', 'invoicesController');
	Route::resource('receipts', 'receiptsController');
	Route::get('reverse-receipt', 'receiptsController@reverseReceipt');
	Route::get('get-receipt-invoices', 'receiptsController@getClientInvoices');
	Route::resource('creditnotes', 'creditnotesController');
	Route::get('get-cl-invoices', 'creditnotesController@getInvoices');
	Route::get('post-creditnote', 'creditnotesController@postCreditnote');

	Route::resource('returns', 'returnsController');
	Route::get('xreturns', 'returnsController@without_invoice');
	Route::get('get-return-invoices', 'returnsController@getInvoices');
	Route::get('get-invoices-items', 'returnsController@getInvoiceItems');
	Route::get('post-return', 'returnsController@postReturn');

	Route::resource('issues', 'issuesController');
	Route::get('post-issue', 'issuesController@postIssue');

	
	Route::resource('discounts', 'discountsController');

	Route::resource('requisitions', 'requisitionController');
	Route::get('post-requisition', 'requisitionController@postRequisition');
	Route::get('get-requisition', 'requisitionController@getRequisition');

	/*custom-helper Urls*/
	Route::get("getItems",'itemsController@getAllItems');
	Route::get("getItemsWithLocQty",'itemsController@getItemsWithLocQty');
	Route::get("getItemDescr",'itemsController@getItemDescr');
	Route::get("getItemPrice",'itemsController@getItemPrice');
	Route::get("reloadClPrices",'itemsController@reloadClPrices');
	Route::get("isClvatable",'itemsController@getVatStatus');

	Route::resource("routesman",'routeManagerController');


	/*Reports*/

	Route::get("print-order","reportsController@printOrder");
	Route::get("print-invoice","reportsController@printInvoice");
	Route::get("print-receipt","reportsController@printReceipt");
	Route::get("get-stock-levels","reportsController@getStockLevel");
	Route::get("print-stock-levels","reportsController@print_stock_levels");
	Route::get("print-voucher","reportsController@print_payment_voucher");
	Route::get("print-creditnote","reportsController@printCreditnote");
	Route::get("get-client-stat","reportsController@getClientStat");
	Route::get("print-client-statement","reportsController@print_client_statement");

	Route::get("get-sales-analysis","reportsController@getSalesAnalysis");
	Route::get("get-client-sales-analysis","reportsController@getClientSalesAnalysis");
	Route::get("get-annual-analysis", "reportsController@getAnnualAnalysis");
	Route::get("print-annual-analysis", "reportsController@print_annual_analysis");
	Route::get("get-client-balances", "reportsController@getClientBalances");
	Route::get("get-rep-sales-analysis","reportsController@getRepSalesAnalysis");
	Route::get("print-rep-sales-analysis","reportsController@print_rep_sales_analysis");
	Route::get("print-sales-analysis","reportsController@print_sales_analysis");
	Route::get("print-client-sales-analysis","reportsController@print_client_sales_analysis");
	Route::get("print-client-balances", "reportsController@print_client_balances");

	Route::get("get-product-sales-analysis","reportsController@getProductSalesAnalysis");
	Route::get("print-product-sales-analysis","reportsController@print_product_sales_analysis");

	Route::get("get-invoice-listing","reportsController@getInvoicelisting");
	Route::get("print-invoice-listing","reportsController@print_client_invoice_listing");
	Route::get("get-client-aging-analysis","reportsController@getClientAging");
	Route::get("print_client_aging_analysis","reportsController@print_client_aging_analysis");

	Route::get('/home', 'HomeController@index')->name('home');

	/*accounting*/
	Route::resource('payables', 'payablesController');
	Route::get('payable-invoices', 'payablesController@payable_invoices');
	Route::get('payable-invoice', 'payablesController@payable_invoice');
	Route::POST('save-payable-invoice', 'payablesController@save_payable_invoice');
	Route::get('postapInvoice/{id}','payablesController@Post_payable_invoices'); 
	Route::get('reverseapInvoice/{id}','payablesController@Reverse_payable_invoices'); 

	Route::get('payable-receipts', 'payablesController@payable_receipts');
	Route::POST('save-payable-receipt', 'payablesController@save_payable_receipt');
	Route::get('get_outstanding_apbills/{scode}','payablesController@get_outstanding_bills'); 

	/*payments*/
	Route::resource('payments', 'paymentsController');
	Route::get('post-payment', 'paymentsController@postExpense');
});

Auth::routes();