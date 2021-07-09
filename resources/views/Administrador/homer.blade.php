@extends('adminlte::page')


@section('content')
    <div class="container">
        <div class="container imagen">
            <div class="targeta col-md-12">
                <div class="encabezado card-header">
                    <center>
                        <h1 class="titulo">{{ __('Bienvenido') }}
                            {{ Auth::user()->name }}{{ __(' que deseas hacer') }}</h1>
                    </center>
                </div>
            </div>


        </div>
    </div>
@endsection

<style>
    .imagen {
        background-image: url("../../img/Logo1.png");
        /* background-image: url('../../img/Iimg7.jpg');*/
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        width: 90%;
        height: 90%;
    }

    .logo {
        border-radius: 55%;
    }

</style>
