<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Xendit\Xendit;
use App\Payment;
use App\User;

class XenditController extends Controller
{

    private $api_key = 'xnd_development_GiHaXBB0xU7KWB5ZSrIFJKa0c1Oi2nCwWlSnITWvBNqRYQnARySGb8hBv3SwDc';

    public function getBalance(){
        
        Xendit::setApiKey($this->api_key);

        $getBalance = \Xendit\Balance::getBalance('TAX');
        dd($getBalance);

    }
    
    public function getPaymentChannels(){
        Xendit::setApiKey($this->api_key);
        
        $paymentChannels = \Xendit\PaymentChannels::list();
        dd($paymentChannels);
    }
    
    public function chargeDana(){
        Xendit::setApiKey($this->api_key);

        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->order_id = 'DX-'.Str::random(5);
        $payment->gateway = 'Xendit';
        $payment->payment_type = 'DANA eWallet';
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $ChargeParams = [
            'reference_id' => $payment->order_id,
            'currency' => 'IDR',
            'amount' => $payment->amount,
            'checkout_method' => 'ONE_TIME_PAYMENT',
            'channel_code' => 'ID_DANA',
            'channel_properties' => [
                'success_redirect_url' => 'http://localhost:8000/home',
            ],
            'metadata' => [
                'branch_code' => 'tree_branch'
            ]
        ];
        
        $chargeData = \Xendit\EWallets::createEWalletCharge($ChargeParams);
        
        $payment->transaction_id = $chargeData['id'];
        $payment->status = $chargeData['status'];
        $payment->save();
        
        return redirect($chargeData['actions']['desktop_web_checkout_url']);

        
    }

    public function chargeLinkAja(){
        Xendit::setApiKey($this->api_key);

        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->order_id = 'DX-'.Str::random(5);
        $payment->gateway = 'Xendit';
        $payment->payment_type = 'LinkAja eWallet';
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $ChargeParams = [
            'reference_id' => $payment->order_id,
            'currency' => 'IDR',
            'amount' => $payment->amount,
            'checkout_method' => 'ONE_TIME_PAYMENT',
            'channel_code' => 'ID_LINKAJA',
            'channel_properties' => [
                'success_redirect_url' => 'http://localhost:8000/home',
            ],
            'metadata' => [
                'branch_code' => 'tree_branch'
            ]
        ];
        
        $chargeData = \Xendit\EWallets::createEWalletCharge($ChargeParams);
        
        $payment->transaction_id = $chargeData['id'];
        $payment->status = $chargeData['status'];
        $payment->save();
        
        return redirect($chargeData['actions']['desktop_web_checkout_url']);

        
    }

    public function chargeShopeePay(){
        Xendit::setApiKey($this->api_key);

        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->order_id = 'DX-'.Str::random(5);
        $payment->gateway = 'Xendit';
        $payment->payment_type = 'ShopeePay eWallet';
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $ChargeParams = [
            'reference_id' => $payment->order_id,
            'currency' => 'IDR',
            'amount' => $payment->amount,
            'checkout_method' => 'ONE_TIME_PAYMENT',
            'channel_code' => 'ID_SHOPEEPAY',
            'channel_properties' => [
                'success_redirect_url' => 'http://localhost:8000/home',
            ],
            'metadata' => [
                'branch_code' => 'tree_branch'
            ]
        ];
        
        $chargeData = \Xendit\EWallets::createEWalletCharge($ChargeParams);
        
        $payment->transaction_id = $chargeData['id'];
        $payment->status = $chargeData['status'];
        $payment->save();
        
        return redirect()->action('XenditController@shopeePayCheckout', ['links' => $chargeData['actions']]);

        
    }

    public function shopeePayCheckout(Request $request){
        $qr_code = $request->links['mobile_deeplink_checkout_url'];
        
        return view('payment.shopeepay', ['qr_code' => $qr_code]);
    }

    public function chargeOVO(Request $request){
        Xendit::setApiKey($this->api_key);
        
        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->order_id = 'DX-'.Str::random(5);
        $payment->gateway = 'Xendit';
        $payment->payment_type = 'OVO eWallet';
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $ChargeParams = [
            'reference_id' => $payment->order_id,
            'currency' => 'IDR',
            'amount' => $payment->amount,
            'checkout_method' => 'ONE_TIME_PAYMENT',
            'channel_code' => 'ID_OVO',
            'channel_properties' => [
                'mobile_number' => '+62'.$request->mobile_number,
                'success_redirect_url' => 'http://localhost:8000/home',
            ],
            'metadata' => [
                'branch_code' => 'tree_branch'
            ]
        ];
        
        $chargeData = \Xendit\EWallets::createEWalletCharge($ChargeParams);
        
        $payment->transaction_id = $chargeData['id'];
        $payment->status = $chargeData['status'];
        $payment->save();
        
        return redirect('/ovo/checkout?code='.$payment->transaction_id);

        
    }

    public function ovoCheckout(Request $request){
        $code = $request->code;
        return view('payment.ovo', ['code' => $code]);
    }

    public function chargeAlfamart(){
        Xendit::setApiKey($this->api_key);

        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->order_id = 'DX-'.Str::random(5);
        $payment->gateway = 'Xendit';
        $payment->payment_type = 'Alfamart';
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $params = [
            'external_id' => $payment->order_id,
            'retail_outlet_name' => 'ALFAMART',
            'name' => Auth::user()->name,
            'expected_amount' => $payment->amount,
            ];
        
        $chargeData = \Xendit\Retail::create($params);
        $payment->transaction_id = $chargeData['payment_code'];
        $payment->status = $chargeData['status'];
        $payment->retail_payment_id = $chargeData['id'];
        $payment->save();
        
        return redirect('/retail/checkout?code='.$payment->retail_payment_id.'&outlet=alfamart');
    }

    public function retailCheckout(Request $request){
        Xendit::setApiKey($this->api_key);

        $id = $request->code;

        $chargeData = \Xendit\Retail::retrieve($id);
        
        if(strtoupper($request->outlet) == $chargeData['retail_outlet_name']){
            return view('payment.retail', ['data' => $chargeData]);
        }
        else{
            return 'Kode Pembayaran Tidak Ditemukan!';
        }
    }

    public function chargeIndomaret(){
        Xendit::setApiKey($this->api_key);

        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->order_id = 'DX-'.Str::random(5);
        $payment->gateway = 'Xendit';
        $payment->payment_type = 'Indomaret';
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $params = [
            'external_id' => $payment->order_id,
            'retail_outlet_name' => 'INDOMARET',
            'name' => Auth::user()->name,
            'expected_amount' => $payment->amount,
            ];
        
        $chargeData = \Xendit\Retail::create($params);
        $payment->transaction_id = $chargeData['payment_code'];
        $payment->status = $chargeData['status'];
        $payment->retail_payment_id = $chargeData['id'];
        $payment->save();
        
        return redirect('/retail/checkout?code='.$payment->retail_payment_id.'&outlet=indomaret');
    }
    
    public function payIndomaret($id){
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->post('https://api.xendit.co/fixed_payment_code/simulate_payment', [
            "headers" => [
                "Authorization" => "Basic eG5kX2RldmVsb3BtZW50X0dpSGFYQkIweFU3S1dCNVpTcklGSkthMGMxT2kybkN3V2xTbklUV3ZCTnFSWVFuQVJ5U0diOGhCdjNTd0RjOg=="
            ],
            "form_params" => [
                "retail_outlet_name" =>  "INDOMARET",
                "payment_code" =>  $id,
                "transfer_amount" =>  699000
            ]
        ]);

        return redirect('/home');
    }

    public function payAlfamart($id){
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->post('https://api.xendit.co/fixed_payment_code/simulate_payment', [
            "headers" => [
                "Authorization" => "Basic eG5kX2RldmVsb3BtZW50X0dpSGFYQkIweFU3S1dCNVpTcklGSkthMGMxT2kybkN3V2xTbklUV3ZCTnFSWVFuQVJ5U0diOGhCdjNTd0RjOg=="
            ],
            "form_params" => [
                "retail_outlet_name" =>  "ALFAMART",
                "payment_code" =>  $id,
                "transfer_amount" =>  699000
            ]
        ]);

        return redirect('/home');
    }
    
    
}
