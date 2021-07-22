@extends('adminlte::page')

@section('template_title')
    {{ $venta->name ?? 'Show Venta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="float-left">
                            <span class="card-title">Datos de esta venta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ventas.index') }}">Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Factura:</strong>
                            {{ $venta->factura }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $venta->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Promocion:</strong>
                            {{ $venta->promocion }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $venta->precio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $venta->fecha }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
