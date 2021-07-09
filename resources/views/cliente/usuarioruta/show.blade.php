@extends('layouts.app')

@section('template_title')
    {{ $ruta->name ?? 'Show Ruta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="float-left">
                            <span class="card-title">Ruta he informacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('inicio') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card">
                        
                        <div class="form-group">
                            <img src="{{ asset('imagenes/' . $ruta->imagen) }}"
                            alt=" {{ $ruta->imagen }}" height="100%" width="100%">
                        </div>
                       

                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <strong> titulo:</strong>
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
