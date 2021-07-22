@extends('adminlte::page')

@section('template_title')
    Update Promocione
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-info">
                        <span class="card-title">Cambiar Estado</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reservaspromos.update', $reservaspromo->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="form-group">
                                        <input type="text" style="visibility:hidden" value="{{ $reservaspromo->fecha_visita }}" name="fecha_visita">
                                        <input type="text" style="visibility:hidden" value="{{ $reservaspromo->hora }}" name="hora">
                                        <input type="text" style="visibility:hidden" value="{{ $reservaspromo->promocionID }}" name="promocionID">
                                        <input type="text" style="visibility:hidden" value="{{ $reservaspromo->clienteID }}" name="clienteID">

                                        <div class="form-group">
                                            {{ Form::label('Estado') }} <br>

                                            @if ($reservaspromo->estado == 'pendiente')
                                                <select name="estado" id="$reservaspromo->estado" aria-placeholder="">
                                                    <option value="pendiente">{{ $reservaspromo->estado }}</option>
                                                    <option value="realizada">Realizada</option>
                                                    <option value="perdida">Perdida</option>
                                                </select>
                                            @elseif($reservaspromo->estado == 'perdida')

                                                <select name="estado" id="$reservaspromo->estado" aria-placeholder="">
                                                    <option value="perdida">{{ $reservaspromo->estado }}</option>
                                                    <option value="realizada">Realizada</option>
                                                    <option value="pendiente">Pendiente</option>
                                                </select>
                                                @else
                                                <select name="estado" id="$reservaspromo->estado" aria-placeholder="">
                                                    <option value="realizada">{{ $reservaspromo->estado }}</option>
                                                    <option value="pendiente">Pendiente</option>
                                                    <option value="perdida">Perdida</option>
                                                    
                                                </select>

                                            @endif
                                        </div>

                                    </div>
                                    <div class="box-footer mt20">
                                        <button type="submit" class="btn btn-primary">Cambiar estado</button>
                                    </div>
                                </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
