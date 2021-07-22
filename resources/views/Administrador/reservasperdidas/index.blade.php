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
                                {{ __('RESERVAS DE PROMOCIONES PERDIDAS Y CANCELADAS') }}
                            </span>

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-warning">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                   
                   
                    
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <thead class="thead">
                                <tr>
                                   
                                    <th ><b class="bg-warning">Reservas Canceladas: {{ $totalc }}</b></th>
                                    <th ><b class="bg-danger" >Reservas perdidas: {{ $total }}</b></th>


                                   
                                </tr>
                            </thead>
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>perfil</th>
                                        <th>Cliente</th>
                                        <th>Ruta</th>
                                        <th>Fecha Visita</th>
                                        <th>Hora</th>
                                        <th>Estado</th>


                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservascanceladas as $reservascancelada)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>
                                            <img src="{{ asset('imagenes/' . $reservascancelada->imagen) }}"
                                                alt=" {{ $reservascancelada->imagen }}" height="100px" width="100px"
                                                style="border-radius: 50%;">
                                        </td>
                                        <td>{{ $reservascancelada->name }}</td>
                                        <td>{{ $reservascancelada->titulo }}</td>
                                        <td>{{ $reservascancelada->fecha }}</td>
                                        <td>{{ $reservascancelada->hora }}</td>
                                        <td >

                                            @if ($reservascancelada->estado == 'perdida')
                                                <button type="button" class="btn btn-sm btn-danger">Perdida</button>
                                            @else
                                          
                                            <button type="button" class="btn btn-sm btn-warning">Cancelado</button>
                                           
                                            @endif

                                        </td>
                                      

                                        <td>
                                            <form action="{{ route('reservasperdidas.destroy', $reservascancelada->id) }}"
                                                method="POST">
                                                
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-fw fa-trash"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                    <!--registros de reservas perdidas-->
                                    @foreach ($reservasperdidas as $reservasperdida)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>
                                            <img src="{{ asset('imagenes/' . $reservasperdida->imagen) }}"
                                                alt=" {{ $reservasperdida->imagen }}" height="100px" width="100px"
                                                style="border-radius: 50%;">
                                        </td>
                                        <td>{{ $reservasperdida->name }}</td>
                                        <td>{{ $reservasperdida->titulo }}</td>
                                        <td>{{ $reservasperdida->fecha }}</td>
                                        <td>{{ $reservasperdida->hora }}</td>
                                        <td >

                                            @if ($reservasperdida->estado == 'perdida')
                                                <button type="button" class="btn btn-sm btn-danger">Perdida</button>
                                            @else
                                          
                                            <button type="button" class="btn btn-sm btn-warning">Cancelado</button>
                                           
                                            @endif

                                        </td>
                                      

                                        <td>
                                            <form action="{{ route('reservasperdidas.destroy', $reservasperdida->id) }}"
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

