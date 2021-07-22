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
                                        <th>Promocion</th>
                                        <th>Fecha Visita</th>
                                        <th>Hora</th>
                                        <th>Estado</th>


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
                                            <td >

                                                @if ($reservaspromo->estado == 'perdida')
                                                    <button type="button" class="btn btn-sm btn-danger">Perdida</button>
                                                @elseif($reservaspromo->estado == 'realizada')
                                                <button type="button" class="btn btn-sm btn-success">Realizada</button>
                                                @elseif($reservaspromo->estado == 'cancelado')
                                                <button type="button" class="btn btn-sm btn-warning">Cancelado</button>
                                                @else
                                                <button type="button" class="btn btn-sm btn-info">Pendiente</button>
                                                                         
                                                @endif

                                            </td>
                                          

                                            <td>
                                                <form action="{{ route('reservapromoperdida.destroy', $reservaspromo->id) }}"
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
                                    @foreach ($reservaspromoperdidas as $reservasprom)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>
                                            <img src="{{ asset('imagenes/' . $reservasprom->imagen) }}"
                                                alt=" {{ $reservasprom->imagen }}" height="100px" width="100px"
                                                style="border-radius: 50%;">
                                        </td>
                                        <td>{{ $reservasprom->name }}</td>
                                        <td>{{ $reservasprom->promocionID }}</td>
                                        <td>{{ $reservasprom->fecha_visita }}</td>
                                        <td>{{ $reservasprom->hora }}</td>
                                        <td >

                                            @if ($reservasprom->estado == 'perdida')
                                                <button type="button" class="btn btn-sm btn-danger">Perdida</button>
                                            @elseif($reservasprom->estado == 'realizada')
                                            <button type="button" class="btn btn-sm btn-success">Realizada</button>
                                            @elseif($reservasprom->estado == 'cancelado')
                                            <button type="button" class="btn btn-sm btn-warning">Cancelado</button>
                                            @else
                                            <button type="button" class="btn btn-sm btn-info">Pendiente</button>
                                                                     
                                            @endif

                                        </td>
                                      

                                        <td>
                                            <form action="{{ route('reservapromoperdida.destroy', $reservasprom->id) }}"
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

