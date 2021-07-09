@extends('adminlte::page')

@section('template_title')
    Reserva
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <center> {{ __('RESERVAS REALIZADAS') }}</center>
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
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
                    <b class="bg-danger">total de registros son: {{ $total }}</b>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Cliente</th>
                                        <th>Ruta</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Cantidad de personas</th>
                                        <th>Telefono</th>
                                        <th>fecha de creacion</th>
                                        <th>acciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservas as $reserva)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <img src="{{ asset('imagenes/' . $reserva->imagen) }}"
                                                    alt=" {{ $reserva->imagen }}" height="100px" width="100px"
                                                    style="border-radius: 50%;">
                                            </td>
                                            <td>{{ $reserva->name }}</td>
                                            <td>{{ $reserva->descripcion_rutas }}</td>
                                            <td>{{ $reserva->fecha }}</td>
                                            <td>{{ $reserva->hora }}</td>
                                            <td>{{ $reserva->cantidad }}</td>
                                            <td>{{ $reserva->telefono }}</td>
                                            <td>{{ $reserva->created_at }}</td>

                                            <td>
                                                <form action="{{ route('reservas.destroy', $reserva->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('reservas.show', $reserva->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> </a>

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
