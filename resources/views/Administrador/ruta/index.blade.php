@extends('adminlte::page')

@section('template_title')
    Ruta
@endsection


@section('content')
 <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/cargando.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/maquinawrite.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/switch.css') }}">
 
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Rutas o paquetes registrados') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('rutas.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Agregar nuevo paquete') }}
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

                                        <th>Imagen</th>
                                        <th>Titulo</th>
                                        <th>Descripcion Rutas</th>
                                        <th>Precio</th>
                                        <th>Estado</th>

                                        <th>
                                            <center>Acciones</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rutas as $ruta)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>
                                                <img src="{{ asset('imagenes/' . $ruta->imagen) }}"
                                                    alt=" {{ $ruta->imagen }}" height="100px" width="100px">
                                            </td>
                                            <td>{{ $ruta->titulo }}</td>
                                            <td>{{ $ruta->descripcion_rutas }}</td>
                                            <td>{{ $ruta->costo }}</td>
                                            <td >
                                                
                                                  @if($ruta->estado == 'Abilitado')
                                                  <button type="button" class="btn btn-sm btn-success">Abilitado</button>
                                                      @else
                                                  <button type="button" class="btn btn-sm btn-danger">Inhabilitado</button>
                                                  @endif
                                              
                                              </td>
                                             

                                            <td>
                                                <center>
                                                    <form action="{{ route('rutas.destroy', $ruta->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('rutas.show', $ruta->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> </a>
                                                                
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('rutas.edit', $ruta->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> </button>
                                                    </form>
                                                </center>
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


