<?php

namespace App\Http\Controllers\callback;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Payment;
use App\User;

class XenditCallbackController extends Controller
{

    public function __construct(){
        $token = request()->header('X-CALLBACK-TOKEN');
        $this->middleware('xendit:'.$token);
    }

    public function eWalletPaymentStatus(){
        $charge = json_decode(request()->getContent(), true);
        
        //proses pembayaran berhasil
        if($charge['data']['status'] == 'SUCCEEDED'){ 

            $payment = Payment::where('transaction_id',$charge['data']['id'])->first();
            $payment->status = $charge['data']['status'];   //SUCCEEDED
            $payment->save();


            $user = User::where('id', $payment->user_id)->first();
            $user->level = 1;       //ubah ke premium user
            $user->save();

            return response('Pembayaran berhasil dan User telah diupgrade menjadi premium!', 201);
        }

        //status pembayaran berubah
        else{       

            $payment = Payment::where('transaction_id',$charge['data']['id'])->first();
            $payment->status = $charge['data']['status'];  
            $payment->save();

            return response('Status Pembayaran berhasil diupdate', 200);
        }
    }

    public function retailPaymentStatus(){
        $charge = json_decode(request()->getContent(), true);

        $payment = Payment::where('transaction_id', $charge['payment_code'])->first();
        
        $payment->status = $charge['status'];   
        $payment->save();

        

        $user = User::where('id', $payment->user_id)->first();
        $user->level = 1;       //ubah ke premium user
        $user->save();

        return response('Pembayaran berhasil dan User telah diupgrade menjadi premium!', 201);
        
    }
}
