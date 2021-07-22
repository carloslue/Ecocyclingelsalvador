@extends('adminlte::page')
@section('template_title')
    Create Ventascomune
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-info">
                        <span class="card-title">Agregar Registro</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ventascomunn.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                           
<div class="box box-info padding-1">
    @foreach ($reservas as $reserva)
    <div class="box-body">
                                           
                                           
        <div class="form-group">
            {{ Form::label('factura') }}
            <input class="form-control"  required type="number" name="factura">
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $reserva->name, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ruta') }}
            {{ Form::text('ruta', $reserva->titulo, ['class' => 'form-control' . ($errors->has('ruta') ? ' is-invalid' : ''), 'placeholder' => 'Ruta']) }}
            {!! $errors->first('ruta', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::number('precio', $reserva->costo, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $reserva->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    @endforeach
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar informacion</button>
    </div>
</div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

