<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/clients', 'api\OrderController@clients')->name('clients');
Route::post('/items', 'api\OrderController@items')->name('items');
Route::get('/initdata', 'api\OrderController@initialData')->name('init-data');
Route::post('/itemqty', 'api\OrderController@getItemQty')->name('item-qty');
Route::post('/process-order', 'api\OrderController@saveOrder')->name('process-order');
Route::post('/order-exists', 'api\OrderController@isOrdernoUsed')->name('order-exists');
Route::post('receiveupdates', 'TelegramBotController@getUpdates');
Route::get('listupdates', 'TelegramBotController@listUpdates');
Route::get('registerhook', 'TelegramBotController@setWebHuk');
Route::get('/get-invoices', 'api\InvoicesController@index');
Route::post('/get-client-name', 'api\InvoicesController@getClientName');
Route::post('/unlock-invoice', 'api\InvoicesController@unlock');
Route::get('/get-reps', 'api\SalesrepsController@index');
Route::post('/add-salesrep', 'api\InvoicesController@newSalesRep');