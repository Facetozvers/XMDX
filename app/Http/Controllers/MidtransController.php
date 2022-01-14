<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Payment;
use App\User;

class MidtransController extends Controller
{
    private $api_key= 'SB-Mid-server-Z0WqZ60NiCXVrKeoKr0D3miW';

    public function chargeCard(Request $request){
        //cek apakah ada pembayaran aktif dan level 1
        $active_payment = Payment::where('user_id', '=', Auth::id())
        ->where(function($query){
            $query->where('status','=','pending')->orWhere('status','=','challenge');
        })
        ->get();

        if(count($active_payment) > 0 || Auth::user()->level == 1){
            return redirect('/home');
        }

        \Midtrans\Config::$serverKey = $this->api_key;
        \Midtrans\Config::$isProduction = false;
        
        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->order_id = 'DX-'.Str::random(5);
        $payment->gateway = 'Midtrans';
        $payment->payment_type = 'Card Payment';
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $params = array(
            'transaction_details' => array(
                'order_id' => $payment->order_id,
                'gross_amount' => $payment->amount,
            ),
            'payment_type' => 'credit_card',
            'credit_card'  => array(
                'token_id'      => $request->card_token,
                'authentication'=> true,
            ),
            'item_details' => array(
                array(
                    'id' => 'a1',
                    'price' => 699000,
                    'quantity' => 1,
                    'name' => 'Talent Premium',
                )
            ),
            'customer_details' => array(
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => Auth::user()->email,
                'billing_address' => array(
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => Auth::user()->email,
                    'address' => $request->address,
                    'city' => $request->city,
                    'postal_code' => $request->postal_code,
                    'country_code' => $request->country_code,
                ),
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
        //cek apakah ada pembayaran aktif dan level 1
        $active_payment = Payment::where('user_id', '=', Auth::id())
        ->where(function($query){
            $query->where('status','=','pending')->orWhere('status','=','challenge');
        })
        ->get();

        if(count($active_payment) > 0 || Auth::user()->level == 1){
            return redirect('/home');
        }

        \Midtrans\Config::$serverKey = $this->api_key;
        \Midtrans\Config::$isProduction = false;

        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->order_id = 'DX-'.Str::random(5);
        $payment->gateway = 'Midtrans';
        $payment->payment_type = 'GOPAY eWallet';
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $params = array(
            'transaction_details' => array(
                'order_id' => $payment->order_id,
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
        //cek apakah ada pembayaran aktif dan level 1
        $active_payment = Payment::where('user_id', '=', Auth::id())
        ->where(function($query){
            $query->where('status','=','pending')->orWhere('status','=','challenge');
        })
        ->get();

        if(count($active_payment) > 0 || Auth::user()->level == 1){
            return redirect('/home');
        }

        \Midtrans\Config::$serverKey = $this->api_key;
        \Midtrans\Config::$isProduction = false;

        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->order_id = 'DX-'.Str::random(5);
        $payment->gateway = 'Midtrans';
        $payment->payment_type = 'BNI Virtual Account';
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $params = array(
            "payment_type" => "bank_transfer",
            "transaction_details" => array(
                'order_id' => $payment->order_id,
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
        //cek apakah ada pembayaran aktif dan level 1
        $active_payment = Payment::where('user_id', '=', Auth::id())
        ->where(function($query){
            $query->where('status','=','pending')->orWhere('status','=','challenge');
        })
        ->get();

        if(count($active_payment) > 0 || Auth::user()->level == 1){
            return redirect('/home');
        }

        \Midtrans\Config::$serverKey = $this->api_key;
        \Midtrans\Config::$isProduction = false;

        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->order_id = 'DX-'.Str::random(5);
        $payment->gateway = 'Midtrans';
        $payment->payment_type = 'BCA Virtual Account';
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $params = array(
            "payment_type" => "bank_transfer",
            "transaction_details" => array(
                'order_id' => $payment->order_id,
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
        //cek apakah ada pembayaran aktif dan level 1
        $active_payment = Payment::where('user_id', '=', Auth::id())
        ->where(function($query){
            $query->where('status','=','pending')->orWhere('status','=','challenge');
        })
        ->get();

        if(count($active_payment) > 0 || Auth::user()->level == 1){
            return redirect('/home');
        }

        \Midtrans\Config::$serverKey = $this->api_key;
        \Midtrans\Config::$isProduction = false;

        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->order_id = 'DX-'.Str::random(5);
        $payment->gateway = 'Midtrans';
        $payment->payment_type = 'BRI Virtual Account';
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $params = array(
            "payment_type" => "bank_transfer",
            "transaction_details" => array(
                'order_id' => $payment->order_id,
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
        //cek apakah ada pembayaran aktif dan level 1
        $active_payment = Payment::where('user_id', '=', Auth::id())
        ->where(function($query){
            $query->where('status','=','pending')->orWhere('status','=','challenge');
        })
        ->get();

        if(count($active_payment) > 0 || Auth::user()->level == 1){
            return redirect('/home');
        }

        \Midtrans\Config::$serverKey = $this->api_key;
        \Midtrans\Config::$isProduction = false;

        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->order_id = 'DX-'.Str::random(5);
        $payment->gateway = 'Midtrans';
        $payment->payment_type = 'Mandiri Virtual Account';
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $params = array(
            "payment_type" => "echannel",
            "transaction_details" => array(
                'order_id' => $payment->order_id,
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
        //cek apakah ada pembayaran aktif dan level 1
        $active_payment = Payment::where('user_id', '=', Auth::id())
        ->where(function($query){
            $query->where('status','=','pending')->orWhere('status','=','challenge');
        })
        ->get();

        if(count($active_payment) > 0 || Auth::user()->level == 1){
            return redirect('/home');
        }
        
        \Midtrans\Config::$serverKey = $this->api_key;
        \Midtrans\Config::$isProduction = false;

        $payment = new Payment;
        $payment->user_id = Auth::id();
        $payment->order_id = 'DX-'.Str::random(5);
        $payment->gateway = 'Midtrans';
        $payment->payment_type = 'Permata Virtual Account';
        $payment->amount = 699000;
        $payment->status = 'PENDING';
        $payment->save();

        $params = array(
            "payment_type" => "permata",
            "transaction_details" => array(
                'order_id' => $payment->order_id,
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

    public function cardPaymentStatus(Request $request){
        $response = json_decode($request['response'], true);
        
        if($response['transaction_status'] == 'capture'){
            if($response['fraud_status'] == 'challenge'){
                echo 'pembayaran anda sedang dalam pertimbangan, mohon pantau dashboard untuk mendapatkan informasi lebih lanjut..';
                
                echo "<script>setTimeout(function(){ window.location.href = '/home'; }, 5000);</script>"; 
            }
            else{
                echo 'Pembayaran berhasil, mengalihkan...';
                echo "<script>setTimeout(function(){ window.location.href = '/home'; }, 5000);</script>";
            }
        }
        if($response['transaction_status'] == 'deny'){
            echo 'Transaksi gagal';
            return header("Refresh", "5;url=/home"); 
        }
    }

}
