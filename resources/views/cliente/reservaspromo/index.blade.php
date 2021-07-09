@extends('layouts.app')

@section('template_title')
    Reservaspromo
@endsection

@section('content')
    <div class="container targeta">
        <div class="row">
            <div class=" col-sm-12">
                <div class="cad">
                    <div class="card-header bg-info">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Reservas realizadas de promociones') }}
                            </span>

                            
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class=" cuerpo card-body">
                        <div class="table-responsive ">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Cliente</th>
										
                                        <th>ruta</th>
                                        <th>cantidad</th>
                                        <th>precio</th>
                                        <th>fecha de vigencia</th>
										<th>Fecha a Visitar</th>
										<th>Hora</th>

                                        <th><center>Acciones</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservaspromos as $reservaspromo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $reservaspromo->name }}</td>
											<td>{{ $reservaspromo->rutasID }}</td>
                                            <td>{{ $reservaspromo->cantidad }}</td>
                                            <td>{{ $reservaspromo->precio }}</td>
                                            <td>{{ $reservaspromo->fecha_vigencia }}</td>
											<td>{{ $reservaspromo->fecha_visita }}</td>
											<td>{{ $reservaspromo->hora }}</td>

                                            <td>
                                               <center>
                                                <form action="{{ route('reservasproms.destroy',$reservaspromo->id) }}" method="POST">
                                                    
                                                    <a class="btn btn-sm btn-success" href="{{ route('reservasproms.edit',$reservaspromo->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
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
<style>
    .card-body{
      background: rgba(0, 0, 0, 0.514);
  } 

  th{
      color: rgb(6, 238, 6);
  }
  td{
      color: aliceblue; 
  }
</style>