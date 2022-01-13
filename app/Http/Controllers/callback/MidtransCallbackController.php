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
        if($charge['transaction_status'] == 'settlement' || $charge['transaction_status'] == 'capture'){ 

            $payment = Payment::where('order_id', $charge['order_id'])->first();
            $payment->status = $charge['transaction_status'];  
            $payment->save();

            //untuk card payment
            if(isset($charge['fraud_status'])){
                if($charge['fraud_status'] == 'deny'){
                    return response('Transaksi Gagal', 200);
                }

                else if($charge['fraud_status'] == 'challenge'){
                    $payment->status = $charge['fraud_status'];  //challenge, tahan perubahan status
                    $payment->save();
                    return response('Pembayaran sedang dalam pertimbangan!', 201);
                }
                else{           //fraud status accept
                    $user = User::where('id', $payment->user_id)->first();
                    if($user->level == 1){   //berarti callback berupa perubahan status capture ke settlement
                        return response('OK',200);
                    }
                    else{
                        $user->level = 1;       //ubah ke premium user
                        $user->save();
                    }
                }
            }
            //untuk pembayaran lain selain card payment
            else{
                $user = User::where('id', $payment->user_id)->first();
                $user->level = 1;       //ubah ke premium user
                $user->save();
                return response('Pembayaran berhasil dan User telah diupgrade menjadi premium!', 201);
            }
            

        }
        //jika terjadi reversal atau cancel
        else if($charge['transaction_status'] == 'deny' || $charge['transaction_status'] == 'cancel'){
            $payment = Payment::where('order_id', $charge['order_id'])->first();
            $payment->status = $charge['transaction_status'];  
            $payment->save();


            $user = User::where('id', $payment->user_id)->first();
            $user->level = 0;       //ubah ke premium user
            $user->save();

            return response('Status Pembayaran berhasil diupdate!', 200);
        }

        //status pembayaran berubah
        else{       

            $payment = Payment::where('order_id',$charge['order_id'])->first();
            $payment->status = $charge['transaction_status'];  
            $payment->save();

            return response('Status Pembayaran berhasil diupdate', 200);
        }

    }
}
