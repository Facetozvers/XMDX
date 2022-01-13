<?php

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

Route::get('/premium', function () {
    return view('payment');
});
Route::get('/', function(){
    return view('welcome');
});

Route::get('/xendit/getBalance', 'XenditController@getBalance');
Route::get('/xendit/getPaymentChannels', 'XenditController@getPaymentChannels');

//xendit Charge
Route::get('/xendit/chargeDana', 'XenditController@chargeDana');
Route::post('/xendit/chargeOVO', 'XenditController@chargeOVO');
Route::get('/xendit/chargeLinkAja', 'XenditController@chargeLinkAja');
Route::get('/xendit/chargeShopeePay', 'XenditController@chargeShopeePay');
Route::get('/xendit/chargeAlfamart', 'XenditController@chargeAlfamart');
Route::get('/xendit/chargeIndomaret', 'XenditController@chargeIndomaret');

//midtrans charge
Route::get('/midtrans/chargeGopay', 'MidtransController@chargeGopay');
Route::get('/midtrans/chargeBNIVA', 'MidtransController@chargeBNIVA');
Route::get('/midtrans/chargeBCAVA', 'MidtransController@chargeBCAVA');
Route::get('/midtrans/chargeBRIVA', 'MidtransController@chargeBRIVA');
Route::get('/midtrans/chargeMandiriVA', 'MidtransController@chargeMandiriVA');
Route::get('/midtrans/chargePermataVA', 'MidtransController@chargePermataVA');
Route::post('/midtrans/chargeCard', 'MidtransController@chargeCard');

//checkoutPage
Route::get('/shopeePay/checkout', 'XenditController@shopeePayCheckout');
Route::get('/retail/checkout', 'XenditController@retailCheckout');
Route::get('/ovo/checkout', 'XenditController@ovoCheckout');
Route::get('/payment/checkout/{id}', 'MidtransController@vaCheckout');


//Xendit Callback
Route::post('/callback/xendit/ewallet/status', 'callback\XenditCallbackController@eWalletPaymentStatus');
Route::post('/callback/xendit/retail/status', 'callback\XenditCallbackController@retailPaymentStatus');

//Midtrans Callback
Route::post('/callback/midtrans/payment/status', 'callback\MidtransCallbackController@paymentStatus');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/simulasi/retail/indomaret/{id}','XenditController@payIndomaret');
Route::get('/simulasi/retail/alfamart/{id}','XenditController@payAlfamart');

Route::get('/test', function(){
    return view('payment.3ds');
});