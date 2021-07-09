@extends('adminlte::page')

@section('template_title')
    User
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ususarios registrados ') }}
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
                                        <th>imagen</th>
                                        <th>Name</th>
                                        <th>Edad</th>
                                        <th>Dui</th>
                                        <th>Telefono</th>
                                        <th>Rol</th>
                                        <th>Email</th>

                                        <th>
                                            <center>Acciones</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <img src="{{ asset('imagenes/' . $user->imagen) }}"
                                                    alt=" {{ $user->imagen }}" height="100px" width="100px">
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->edad }}</td>
                                            <td>{{ $user->dui }}</td>
                                            <td>{{ $user->telefono }}</td>
                                            <td>{{ $user->rol }}</td>
                                            <td>{{ $user->email }}</td>

                                            <td>
                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('user.show', $user->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('user.edit', $user->id) }}"><i
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
