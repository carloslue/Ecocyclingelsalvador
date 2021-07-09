@extends('adminlte::page')

@section('template_title')
    Comentario
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <center>
                                    <h6>Comentarios realizados por los clientes</h6>
                                </center>
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    
                    <b class="bg-danger">total de registros son: {{ $total }}</b>
                    <div class="card-body">
                        <div class="table-responsive table-bordered">
                            <table class="table table-striped table-hover">
                                <thead class="thead bg-dark">
                                    <tr>
                                        <th>No</th>

                                        <th>Descripcion</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comentarios as $comentario)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $comentario->Descripcion }}</td>

                                            <td>
                                                <form action="{{ route('comentarios.destroy', $comentario->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('comentarios.show', $comentario->id) }}"><i
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
                {!! $comentarios->links() !!}
            </div>
        </div>
    </div>
@endsection
