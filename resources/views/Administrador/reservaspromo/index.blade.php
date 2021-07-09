@extends('adminlte::page')

@section('template_title')
    Reservaspromo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Reservas de promociones') }}
                            </span>

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
                                        <th>perfil</th>
                                        <th>Cliente</th>
                                        <th>Promocion</th>
                                        <th>Fecha Visita</th>
                                        <th>Hora</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservaspromos as $reservaspromo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <img src="{{ asset('imagenes/' . $reservaspromo->imagen) }}"
                                                    alt=" {{ $reservaspromo->imagen }}" height="100px" width="100px"
                                                    style="border-radius: 50%;">
                                            </td>
                                            <td>{{ $reservaspromo->name }}</td>
                                            <td>{{ $reservaspromo->promocionID }}</td>
                                            <td>{{ $reservaspromo->fecha_visita }}</td>
                                            <td>{{ $reservaspromo->hora }}</td>

                                            <td>
                                                <form action="{{ route('reservaspromos.destroy', $reservaspromo->id) }}"
                                                    method="POST">

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
