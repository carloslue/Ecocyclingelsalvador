@extends('layouts.app')

@section('template_title')
    Informacion
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($informacions as $informacion)
                <div class="col-sm-6">
                    <div class="cad">
                        <div class="header">
                            <span id="card_title">
                                <h3> {{ __('MISION') }}</h3>
                            </span>
                        </div>
                        <div class="card-body">
                            {{ $informacion->mision }}
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="cad">
                        <div class="header">
                            <span id="card_title">
                                <h3> {{ __('VISION') }}</h3>
                            </span>
                        </div>
                        <div class="card-body">
                            <td>{{ $informacion->vision }}</td>
                        </div>
                    </div>
                </div>
             

              
            @endforeach
            {!! $informacions->links() !!}
        </div>
    </div>
    </div>
@endsection
<style>
    .card-body{
        background: rgba(5, 5, 5, 0.589);
        height: 290px;
        color: white;
    }
    .header{
        background: #06680bf8;
        padding: 5px;
        height: 40px;
        
    }
  
    h3{
        text-align: center;
        color: white;
        font-family: Bebas neue;

    }
  
</style>
