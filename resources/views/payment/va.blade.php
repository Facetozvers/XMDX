@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            @if($chargeData->payment_type == 'echannel')
            <h1>Mandiri Virtual Account (Echannel)</h1>
            @elseif(isset($chargeData->permata_va_number))
            <h1>Permata Virtual Account</h1>
            @else
            <h1>{{strtoupper($chargeData->va_numbers['0']->bank)}} Virtual Account</h1>
            @endif
        </div>
        <div class="col-12 text-center">
            <div class="container p-5 border">
                @if($chargeData->payment_type == 'echannel')
                <h5>Virtual Account</h5>
                <h3>{{$chargeData->bill_key}}</h3>
                <br>

                <h5>Kode Perusahaan</h5>
                <h3>{{$chargeData->biller_code}}</h3>
                <br>
                
                @else
                <h5>Virtual Account</h5>
                <h3>{{isset($chargeData->permata_va_number) ? $chargeData->permata_va_number : $chargeData->va_numbers['0']->va_number}}</h3>
                <br>
                @endif
            
                <h5>Nominal Yang Akan Dibayarkan</h5>
                <h3>IDR {{$chargeData->gross_amount}}</h3>
                <br>
            </div>
        </div>
        
        @if($chargeData->payment_type == 'echannel')
        <a target="_blank" href="https://simulator.sandbox.midtrans.com/mandiri/bill/index" class="btn btn-success">Simulate Payment</a>
        @else
        <a target="_blank" href="https://simulator.sandbox.midtrans.com/{{isset($chargeData->permata_va_number) ? 'permata' : $chargeData->va_numbers['0']->bank}}/va/index" class="btn btn-success">Simulate Payment</a>
        @endif
    </div>
</div>
    
@endsection