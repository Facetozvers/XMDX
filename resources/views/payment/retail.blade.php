@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <h1>Pembayaran Tunai {{ucfirst(Request::get('outlet'))}}</h1>
        </div>
        <div class="col-12 text-center">
            <div class="container p-5 border">
                <h5>Kode Pembayaran</h5>
                <h3>{{$data['payment_code']}}</h3>
                <br>
            
                <h5>Pembayaran Kepada Merchant</h5>
                <h3>TestingAja</h3>
                <br>
            
                <h5>Nominal Yang Akan Dibayarkan</h5>
                <h3>IDR {{$data['expected_amount']}}</h3>
                <br>
            </div>
        </div>
        

        @if(Request::get('outlet') == 'alfamart')
        <div class="col-12 mt-3">
            <h3 class="mb-4"><strong>LANGKAH PEMBAYARAN</strong></h3>
            <h5>LANGKAH 1: TEMUKAN CABANG TERDEKAT</h5>
            <p>1. Kunjungi Alfamart or Alfamidi terdekat sebelum invoice kadaluarsa</p>
            <p>2. Sebutkan pembayaran melalui "TestingAja" ke kasir, atau berikan kode barcode untuk di scan oleh kasir.</p>
            <h5>LANGKAH 2: DETAIL PEMBAYARAN</h5>
            <p>1. Berikan kode pembayaran yang ada di invoice, dan pastikan nominal yang akan dibayarkan sudah benar</p>
            <p>2. Lanjutkan pembayaran anda dengan nominal yang disebutkan di invoice</p>
            <h5>LANGKAH 3: TRANSAKSI BERHASIL</h5>
            <p>1. Terima bukti pembayaran anda dari kasir</p>
            <p>2. Pembayaran anda berhasil</p>
        </div>
        @endif
        
        @if(Request::get('outlet') == 'indomaret')
        <div class="col-12 mt-3">
            <h3 class="mb-4"><strong>LANGKAH PEMBAYARAN</strong></h3>
            <h5>LANGKAH 1: TEMUKAN CABANG TERDEKAT</h5>
            <p>1. Kunjungi gerai Indomaret terdekat sebelum kode pembayaran kedaluwarsa</p>
            <p>2. Sebutkan pembayaran melalui "TestingAja" ke kasir, atau berikan kode barcode untuk di scan oleh kasir.</p>
            <h5>LANGKAH 2: DETAIL PEMBAYARAN</h5>
            <p>1. Berikan kode pembayaran yang ada di invoice, dan pastikan nominal yang akan dibayarkan sudah benar</p>
            <p>2. Lanjutkan pembayaran anda dengan nominal yang disebutkan di invoice</p>
            <h5>LANGKAH 3: TRANSAKSI BERHASIL</h5>
            <p>1. Terima bukti pembayaran anda dari kasir</p>
            <p>2. Pembayaran anda berhasil</p>
        </div>
        @endif

        <a href="/simulasi/retail/{{Request::get('outlet')}}/{{$data['payment_code']}}" class="btn btn-success">Simulate Payment</a>
    </div>
</div>
    
@endsection