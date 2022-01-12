<?php

namespace App\Http\Controllers\callback;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;
use App\User;

class MidtransCallbackController extends Controller
{
    public function paymentStatus(){
        $charge = json_decode(request()->getContent(), true);
        

        //proses pembayaran berhasil
        if($charge['transaction_status'] == 'settlement'){ 

            $payment = Payment::where('transaction_id',$charge['transaction_id'])->first();
            $payment->status = $charge['transaction_status'];  
            $payment->save();


            $user = User::where('id', $payment->user_id)->first();
            $user->level = 1;       //ubah ke premium user
            $user->save();

            return response('Pembayaran berhasil dan User telah diupgrade menjadi premium!', 201);
        }

        //status pembayaran berubah
        else{       

            $payment = Payment::where('transaction_id',$charge['transaction_id'])->first();
            $payment->status = $charge['transaction_status'];  
            $payment->save();

            return response('Status Pembayaran berhasil diupdate', 200);
        }
    }
}
