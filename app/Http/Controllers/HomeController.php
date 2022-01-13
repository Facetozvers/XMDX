<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Payment;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $payments = Payment::where("user_id", Auth::id())->orderBy('created_at','desc')->get();
        return view('home', ['payments' => $payments]);
    }
    public function premium(){
        //cek apakah ada pembayaran aktif dan user level 1
        $active_payment = Payment::where('user_id', '=', Auth::id())
        ->where(function($query){
            $query->where('status','=','pending')->orWhere('status','=','challenge');
        })
        ->get();

        if(count($active_payment) > 0 || Auth::user()->level == 1){
            return redirect('/home');
        }
        
        return view('payment');
    }
}
