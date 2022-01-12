<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Payment;
use App\User;

class MidtransController extends Controller
{
    private $api_key= 'SB-Mid-server-Z0WqZ60NiCXVrKeoKr0D3miW';

    public function chargeCard(Request $request){
        \Midtrans\Config::$serverKey = $this->api_key;
        \Midtrans\Config::$isProduction = false;

        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $params = array(
            'transaction_details' => array(
                'order_id' => 'test'.$payment->id,
                'gross_amount' => $payment->amount,
            ),
            'payment_type' => 'credit_card',
            'credit_card'  => array(
                'token_id'      => $request->card_token,
                'authentication'=> true,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            )
        );
         
        $chargeData = \Midtrans\CoreApi::charge($params);
        
        $payment->transaction_id = $chargeData->transaction_id;
        $payment->status = $chargeData->transaction_status;
        $payment->save();

        if(isset($chargeData->redirect_url) && $chargeData->transaction_status == 'pending'){ //berarti membutuhkan 3ds
            return view('payment.3ds', ['chargeData' => $chargeData]);
        }
        return redirect($chargeData->actions['1']->url);
    }

    public function chargeGopay(){
        \Midtrans\Config::$serverKey = $this->api_key;
        \Midtrans\Config::$isProduction = false;

        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $params = array(
            'transaction_details' => array(
                'order_id' => 'test'.$payment->id,
                'gross_amount' => $payment->amount,
            ),
            'payment_type' => 'gopay',
            'gopay' => array(
                'enable_callback' => true,                // optional
                'callback_url' => 'http://localhost:8000/home'   // optional
            )
        );
         
        $chargeData = \Midtrans\CoreApi::charge($params);
        
        $payment->transaction_id = $chargeData->transaction_id;
        $payment->status = $chargeData->transaction_status;
        $payment->save();

        return redirect($chargeData->actions['1']->url);
    }

    public function chargeBNIVA(){
        \Midtrans\Config::$serverKey = $this->api_key;
        \Midtrans\Config::$isProduction = false;

        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $params = array(
            "payment_type" => "bank_transfer",
            "transaction_details" => array(
                'order_id' => 'test'.$payment->id,
                'gross_amount' => $payment->amount,
            ),
            "bank_transfer" => array(
                "bank" => "bni"
            )
        );
         
        $chargeData = \Midtrans\CoreApi::charge($params);
        
        $payment->transaction_id = $chargeData->transaction_id;
        $payment->status = $chargeData->transaction_status;
        $payment->save();

        return redirect('/payment/checkout/'.$payment->transaction_id);
    }

    public function chargeBCAVA(){
        \Midtrans\Config::$serverKey = $this->api_key;
        \Midtrans\Config::$isProduction = false;

        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $params = array(
            "payment_type" => "bank_transfer",
            "transaction_details" => array(
                'order_id' => 'test'.$payment->id,
                'gross_amount' => $payment->amount,
            ),
            "bank_transfer" => array(
                "bank" => "bca"
            )
        );
         
        $chargeData = \Midtrans\CoreApi::charge($params);
        
        $payment->transaction_id = $chargeData->transaction_id;
        $payment->status = $chargeData->transaction_status;
        $payment->save();

        return redirect('/payment/checkout/'.$payment->transaction_id);
    }

    public function chargeBRIVA(){
        \Midtrans\Config::$serverKey = $this->api_key;
        \Midtrans\Config::$isProduction = false;

        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $params = array(
            "payment_type" => "bank_transfer",
            "transaction_details" => array(
                'order_id' => 'test'.$payment->id,
                'gross_amount' => $payment->amount,
            ),
            "bank_transfer" => array(
                "bank" => "bri"
            )
        );
         
        $chargeData = \Midtrans\CoreApi::charge($params);
        
        $payment->transaction_id = $chargeData->transaction_id;
        $payment->status = $chargeData->transaction_status;
        $payment->save();

        return redirect('/payment/checkout/'.$payment->transaction_id);
    }

    public function chargeMandiriVA(){
        \Midtrans\Config::$serverKey = $this->api_key;
        \Midtrans\Config::$isProduction = false;

        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $params = array(
            "payment_type" => "echannel",
            "transaction_details" => array(
                'order_id' => 'test'.$payment->id,
                'gross_amount' => $payment->amount,
            ),
            "echannel" => array(
                "bill_info1" => "Payment:",
                "bill_info2" => "Online purchase"
            )
        );
         
        $chargeData = \Midtrans\CoreApi::charge($params);
        
        $payment->transaction_id = $chargeData->transaction_id;
        $payment->status = $chargeData->transaction_status;
        $payment->save();

        return redirect('/payment/checkout/'.$payment->transaction_id);
    }

    public function chargePermataVA(){
        \Midtrans\Config::$serverKey = $this->api_key;
        \Midtrans\Config::$isProduction = false;

        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $params = array(
            "payment_type" => "permata",
            "transaction_details" => array(
                'order_id' => 'test'.$payment->id,
                'gross_amount' => $payment->amount,
            ),
        );
         
        $chargeData = \Midtrans\CoreApi::charge($params);
        
        $payment->transaction_id = $chargeData->transaction_id;
        $payment->status = $chargeData->transaction_status;
        $payment->save();

        return redirect('/payment/checkout/'.$payment->transaction_id);
    }

    public function vaCheckout($id){
        \Midtrans\Config::$serverKey = $this->api_key;
        \Midtrans\Config::$isProduction = false;

        $chargeData = \Midtrans\Transaction::status($id);
        
        return view('payment.va', ['chargeData' => $chargeData]);
    }

}
