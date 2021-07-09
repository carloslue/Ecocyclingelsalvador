@extends('layouts.appinit')

@section('template_title')
    Informacion
@endsection

@section('content')
    <div class="container">
        <br>    
        <h2><hr>Informacion empresarial <hr></h2>
        <div class="row">
            @foreach ($informacions as $informacion)
                <div class="col-sm-3">
                    <div class="cad">
                        <div class="card-header bg-primary">
                            <span id="card_title">
                                <h3> {{ __('MISION') }}</h3>
                            </span>
                        </div>
                        <div class="card-body">
                            {{ $informacion->mision }}
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="cad">
                        <div class="card-header bg-primary">
                            <span id="card_title">
                                <h3> {{ __('VISION') }}</h3>
                            </span>
                        </div>
                        <div class="card-body">
                            <td>{{ $informacion->vision }}</td>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="cad">
                        <div class="card-header bg-primary">
                            <span id="card_title">
                                <h3> {{ __('OBGETIVO GENERAL') }}</h3>
                            </span>
                        </div>
                        <div class="card-body">
                            <td>{{ $informacion->general }}</td>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="cad">
                        <div class="card-header bg-primary">
                            <span id="card_title">
                                <h3> {{ __('OBGETIVO ESPECIFICO') }}</h3>
                            </span>
                        </div>
                        <div class="card-body">
                            <td>{{ $informacion->epecifico }}</td>
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
        background: rgba(5, 243, 203, 0.253);
        height: 290px;
    }
    .card-header{
        height: 92px;
        
    }
    .card{
        background: rgba(255, 0, 0, 0.89);
    }
    <style>
    .card-body{
      
  } 
</style>
</style>
