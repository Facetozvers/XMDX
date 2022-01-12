@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <h1>BAYAR IDR 699.000 DENGAN SHOPEEPAY</h1>
        </div>
        <div class="col-12 text-center">
            <p>{!! QrCode::size(250)->generate($qr_code); !!}</p>
        </div>
        <div class="col-12 text-center">

            <p>PINDAI QR CODE UNTUK MELAKUKAN PEMBAYARAN</p>
        </div>
        
        <a href="{{$qr_code}}" class="btn btn-success">Simulate Payment</a>
    </div>
</div>
    
@endsection