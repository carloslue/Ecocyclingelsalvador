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
                        <form method="POST" action="{{ route('reservas.update', $reserva->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="form-group">
                                        <input type="text" style="visibility:hidden" value="{{ $reserva->fecha }}" name="fecha">
                                        <input type="text" style="visibility:hidden" value="{{ $reserva->hora }}" name="hora">
                                        <input type="text" style="visibility:hidden" value="{{ $reserva->rutaID }}" name="rutaID">
                                        <input type="text" style="visibility:hidden" value="{{ $reserva->clienteID }}" name="clienteID">
                                        <input type="text" style="visibility:hidden" value="{{ $reserva->cantidad }}" name="cantidad">
                                        <input type="text" style="visibility:hidden" value="{{ $reserva->telefono }}" name="telefono">

                                        <div class="form-group">
                                            {{ Form::label('Estado') }} <br>

                                            @if ($reserva->estado == 'pendiente')
                                                <select name="estado" id="$reserva->estado" aria-placeholder="">
                                                    <option value="pendiente">{{ $reserva->estado }}</option>
                                                    <option value="realizada">Realizada</option>
                                                    <option value="perdida">Perdida</option>
                                                </select>
                                            @elseif($reserva->estado == 'perdida')

                                                <select name="estado" id="$reserva->estado" aria-placeholder="">
                                                    <option value="perdida">{{ $reserva->estado }}</option>
                                                    <option value="realizada">Realizada</option>
                                                    <option value="pendiente">Pendiente</option>
                                                </select>
                                                @else
                                                <select name="estado" id="$reserva->estado" aria-placeholder="">
                                                    <option value="realizada">{{ $reserva->estado }}</option>
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
