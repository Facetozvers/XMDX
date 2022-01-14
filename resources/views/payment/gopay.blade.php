@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-9 text-center">
            <div class="card">
                <div class="card-body">
                        <h1 class="pb-4">BAYAR IDR 699.000 DENGAN GOPAY</h1>
                    
                        <img src="{{$qr_code}}" alt="" style="height:300px; width:auto">
                    
                        <p>PINDAI QR CODE UNTUK MELAKUKAN PEMBAYARAN</p>
                        
                        <a href="{{$mobile_link}}" class="btn btn-success">Simulate Payment</a>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection