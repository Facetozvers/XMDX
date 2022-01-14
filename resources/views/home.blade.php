@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (Auth::user()->level == 0)
                        <div class="alert alert-success" role="alert">
                            Akun kamu saat ini level BASIC
                        </div>
                        <a href="/premium" class="btn btn-success">Upgrade ke Premium</a>

                    @elseif (Auth::user()->level == 1)
                        <div class="alert alert-success" role="alert">
                            Akun kamu saat ini level PREMIUM
                        </div>
                    @endif
                    

                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        @if(count($payments) > 0)
        <h5>Billing</h5>
        @endif
        <div class="col-md-12">
            @foreach($payments as $bill)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row mb-0">
                        <div class="col">
                            <p><strong>{{$bill->order_id}}</strong></p>
                        </div>
                        <div class="col">
                            <p><strong>Status</strong></p>
                        </div>
                        <div class="col">
                            <p><strong>Total</strong></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>{{date('d M Y, H:i', strtotime($bill->created_at))}}</p>
                        </div>
                        <div class="col">
                            <p>{{ucfirst(strtolower($bill->status))}}</p>
                        </div>
                        <div class="col">
                            <p>IDR {{number_format($bill->amount,0,',','.')}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <p>{{$bill->payment_type}}</p>
                        </div>
                        @if(strtolower($bill->status) == 'pending')
                        <div class="col-8">
                            <a class="btn btn-primary float-right" href="">Lanjutkan Pembayaran</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
