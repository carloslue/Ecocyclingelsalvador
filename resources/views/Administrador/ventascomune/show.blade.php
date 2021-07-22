@extends('adminlte::page')

@section('template_title')
    {{ $ventascomune->name ?? 'Show Ventascomune' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="float-left">
                            <span class="card-title">DATOS DE ESTA VENTA</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ventascomunn.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Factura:</strong>
                            {{ $ventascomune->factura }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $ventascomune->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Ruta:</strong>
                            {{ $ventascomune->ruta }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $ventascomune->precio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $ventascomune->fecha }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
