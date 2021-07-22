@extends('layouts.app')

@section('template_title')
    Update Reserva
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-info">
                        <span class="card-title">Actualizar reserva</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reserva.update', $reserva->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">


                                    <input type="text" style="visibility: hidden" value="{{ Auth::user()->id }}"
                                        name="clienteID">

                                    <div class="form-group">
                                        {{ Form::label('Rutas') }}
                                        <select name="rutaID" id="" class="form-control">
                                            @foreach ($rutas as $rutas)
                                                <option value="{{ $rutas->id }}">{{ $rutas->titulo }}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                    <div class="form-group">
                                        {{ Form::label('Cantidad de persona') }}
                                        {{ Form::number('cantidad', $reserva->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                                        {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Telefono') }}
                                        {{ Form::text('telefono', $reserva->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                                        {!! $errors->first('telefono', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>


                                    <div class="form-group">
                                        {{ Form::label('Hora') }}
                                        {{ Form::time('hora', $reserva->hora, ['class' => 'form-control' . ($errors->has('hora') ? ' is-invalid' : ''), 'placeholder' => 'Hora']) }}
                                        {!! $errors->first('hora', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('Fecha') }} <br>
                                        <input class="" type="date" name="fecha" value="{{ $reserva->fecha }}" id="date"
                                            min="<?php echo date('Y-m-d', strtotime(date('Y-m-d') . '+ 1 days')); ?>">
                                    </div>
                                    {{ Form::label('Estado') }}
                                    <h6 class="alerta bg-danger">Si cambia este campo a "cancelar" se eliminara su reserva
                                    </h6>

                                    @if ($reserva->estado == 'pendiente')

                                        <select name="estado" id="$reserva->estado" aria-placeholder="">
                                            <option value="pendiente">{{ $reserva->estado }}</option>
                                            <option value="cancelado">Cancelar</option>

                                        </select>
                                    @else
                                        <select name="estado" id="$reserva->estado" aria-placeholder="">
                                            <option value="cancelado">{{ $reserva->estado }}</option>
                                            <option value="pendiente">Pendiente</option>


                                        </select>

                                    @endif
                                    
                                </div><br>
                                <div class="box-footer mt20">
                                   <center> <button type="submit" class="btn btn-primary">Actualizar</button></center>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<style>

    .alerta{
        color: aliceblue;
    }
</style>
