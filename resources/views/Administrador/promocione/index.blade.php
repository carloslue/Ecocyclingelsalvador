@extends('adminlte::page')

@section('template_title')
    Promocione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card ">
                    <div class="card-header bg-info">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Promociones registradas') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('promociones.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Agregar nueva promocion') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-warning">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($query)
                        <H6>
                            <div class="alert alert-primary" role="alert">
                                Los resultados para tu busqueda '{{ $query }}' son:
                            </div>
                        </H6>
                    @endif
                    <b class="bg-info">Total de registros: {{ $total }}</b>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Ruta</th>
                                        <th>Equipo</th>
                                        <th>Cantidad de personas</th>
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                        <th>Valido hasta</th>
                                        <th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Promociones as $promocione)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $promocione->titulo }}</td>
                                            <td>{{ $promocione->descripcion_equipo }}</td>
                                            <td>{{ $promocione->cantidad }}</td>
                                            <td>{{ $promocione->descripcion }}</td>
                                            <td>{{ $promocione->precio }}</td>
                                            <td>{{ $promocione->fecha_vigencia }}</td>
                                            <td>
                                                @if($promocione->estado == 'Abilitado')
                                                <button type="button" class="btn btn-sm btn-success">Abilitado</button>
                                                    @else
                                                <button type="button" class="btn btn-sm btn-danger">Inhabilitado</button>
                                                @endif</td>

                                            <td>
                                                <form action="{{ route('promociones.destroy', $promocione->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('promociones.edit', $promocione->id) }}"><i
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

            </div>
        </div>
    </div>
@endsection
