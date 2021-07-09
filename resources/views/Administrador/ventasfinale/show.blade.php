@extends('adminlte::page')

@section('template_title')
    {{ $ventasfinale->name ?? 'Show Ventasfinale' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="float-left">
                            <span class="card-title">Datos de venta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ventaindex') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $ventasfinale->dia }}
                        </div>
                        <div class="form-group">
                            <strong>N Factura Inicio:</strong>
                            {{ $ventasfinale->n_factura_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>N Factura Final:</strong>
                            {{ $ventasfinale->n_factura_final }}
                        </div>
                        <div class="form-group">
                            <strong>N Caja:</strong>
                            {{ $ventasfinale->n_caja }}
                        </div>
                        <div class="form-group">
                            <strong>Ventas Internas Exentas:</strong>
                            {{ $ventasfinale->ventas_internas_exentas }}
                        </div>
                        <div class="form-group">
                            <strong>Ventas Internas Locales:</strong>
                            {{ $ventasfinale->ventas_internas_locales }}
                        </div>
                        <div class="form-group">
                            <strong>Exportaciones:</strong>
                            {{ $ventasfinale->exportaciones }}
                        </div>
                        <div class="form-group">
                            <strong>Total Ventas:</strong>
                            {{ $ventasfinale->total_ventas }}
                        </div>
                        <div class="form-group">
                            <strong>Ventas A Cuenta Terceros:</strong>
                            {{ $ventasfinale->ventas_a_cuenta_terceros }}
                        </div>
                        <div class="form-group">
                            <strong>Iva Retenido:</strong>
                            {{ $ventasfinale->iva_retenido }}
                        </div>
                        <div class="form-group">
                            <strong>Iva Percibido:</strong>
                            {{ $ventasfinale->iva_percibido }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
