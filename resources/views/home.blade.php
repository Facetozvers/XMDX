@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
</div>
@endsection
