@extends('layouts.appinit')

@section('template_title')
    Informacion
@endsection

@section('contentt')
<br>
    <div class="container">
        <div class="row">
            @foreach ($informacions as $informacion)
                <div class="col-sm-3">
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
                <div class="col-sm-3">
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
                <div class="col-sm-3">
                    <div class="cad">
                        <div class="header">
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
                        <div class="header">
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
 