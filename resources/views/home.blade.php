@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class=" card">
               <div class="targeta col-md-12"> <div class="targeta card-header">{{ __('Dashboard') }}</div></div>

                <div class="targeta card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <center><h1>{{ __('Bienvenido') }} {{ Auth::user()->name }}{{ __(' que deseas hacer') }}</h1></center>
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>

    .targeta{
        background: rgb(5, 230, 16);
        color:floralwhite;
    }
    </style>