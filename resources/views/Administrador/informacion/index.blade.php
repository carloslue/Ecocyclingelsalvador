@extends('adminlte::page')

@section('template_title')
    Informacion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Informacion de la empresa') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('informacions.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Agregar informacion de empresa') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <b class="bg-danger">total de registros son: {{ $total }}</b>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Mision</th>
                                        <th>Vision</th>
                                        <th>Obgetivo General</th>
                                        <th>Obgetivo Epecifico</th>

                                        <th>
                                            <center>Acciones</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($informacions as $informacion)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $informacion->mision }}</td>
                                            <td>{{ $informacion->vision }}</td>
                                            <td>{{ $informacion->general }}</td>
                                            <td>{{ $informacion->epecifico }}</td>

                                            <td>

                                                <form action="{{ route('informacions.destroy', $informacion->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('informacions.show', $informacion->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('informacions.edit', $informacion->id) }}"><i
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
                {!! $informacions->links() !!}
            </div>
        </div>
    </div>
@endsection
