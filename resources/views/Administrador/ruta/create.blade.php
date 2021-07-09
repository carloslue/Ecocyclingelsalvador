@extends('adminlte::page')

@section('template_title')
    Create Ruta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-info">
                        <span class="card-title">Agregar informacion de paquete</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('rutas.store') }}" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                {{ Form::label('imagen') }}
                                {{ Form::file('imagen', $ruta->imagen, ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
                                {!! $errors->first('imagen', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            @include('Administrador.ruta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
