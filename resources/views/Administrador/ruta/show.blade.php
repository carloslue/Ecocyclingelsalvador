@extends('adminlte::page')

@section('template_title')
    {{ $ruta->name ?? 'Show Ruta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="float-left">
                            <span class="card-title">Informacion de Ruta o paquete</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('rutas') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <img src="{{ asset('imagenes/' . $ruta->imagen) }}" alt=" {{ $ruta->imagen }}"
                                height="400px" width="600px">
                        </div>
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $ruta->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion Rutas:</strong>
                            {{ $ruta->descripcion_rutas }}
                        </div>
                        <div class="form-group">
                            <strong> Costo:</strong>
                            {{ $ruta->costo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
