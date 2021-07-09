@extends('adminlte::page')

@section('template_title')
    Ventasfinale
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ventasfinale') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('ventasfinales.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-warning>
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <b class="bg-info">Total de registros: {{ $total }}</b>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead class="thead ">
                                    <tr>
                                        <th>No</th>
                                        <th>Fecha</th>
                                        <th>N Factura Inicio</th>
                                        <th>N Factura Final</th>
                                        <th>N Caja</th>
                                        <th>Ventas Internas Exentas</th>
                                        <th>Ventas Internas Locales</th>
                                        <th>Exportaciones</th>
                                        <th>Total Ventas</th>
                                        <th>Ventas A Cuenta Terceros</th>
                                        <th>Iva Retenido</th>
                                        <th>Iva Percibido</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ventasfinales as $ventasfinale)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $ventasfinale->dia }}</td>
                                            <td>{{ $ventasfinale->n_factura_inicio }}</td>
                                            <td>{{ $ventasfinale->n_factura_final }}</td>
                                            <td>{{ $ventasfinale->n_caja }}</td>
                                            <td>{{ $ventasfinale->ventas_internas_exentas }}</td>
                                            <td>{{ $ventasfinale->ventas_internas_locales }}</td>
                                            <td>{{ $ventasfinale->exportaciones }}</td>
                                            <td class="bg-info">{{ $ventasfinale->total_ventas }}</td>
                                            <td>{{ $ventasfinale->ventas_a_cuenta_terceros }}</td>
                                            <td>{{ $ventasfinale->iva_retenido }}</td>
                                            <td>{{ $ventasfinale->iva_percibido }}</td>

                                            <td>
                                                <form action="{{ route('ventasfinales.destroy', $ventasfinale->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('ventasfinales.show', $ventasfinale->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('ventasfinales.edit', $ventasfinale->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ventasfinales->links() !!}
            </div>
        </div>
    </div>
@endsection
