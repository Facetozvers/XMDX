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

//Xendit Callback
Route::post('/callback/xendit/ewallet/status', 'callback\XenditCallbackController@eWalletPaymentStatus');
Route::post('/callback/xendit/retail/status', 'callback\XenditCallbackController@retailPaymentStatus');

//Midtrans Callback
Route::post('/callback/midtrans/payment/status', 'callback\MidtransCallbackController@paymentStatus');
Route::post('/card/checkout/status', 'MidtransController@cardPaymentStatus');
