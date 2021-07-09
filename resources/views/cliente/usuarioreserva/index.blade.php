@extends('layouts.app')

@section('template_title')
    Reserva
@endsection

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-sm-12">
                <div class="cad">
                    <div class="card-header bg-info">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Reservas realizadas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('reserva.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('realizar nueva reserva') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										
										<th>Ruta</th>
										<th>Fecha</th>
										<th>Hora</th>
										<th>Cantidad</th>
										<th>Telefono</th>

                                        <th><center>Acciones</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservas as $reserva)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											
											<td>{{ $reserva->descripcion_rutas }}</td>
											<td>{{ $reserva->fecha }}</td>
											<td>{{ $reserva->hora }}</td>
											<td>{{ $reserva->cantidad }}</td>
											<td>{{ $reserva->telefono }}</td>

                                            <td>
                                               <center>
                                                <form action="{{ route('reserva.destroy',$reserva->id) }}" method="POST">
                                                    
                                                    <a class="btn btn-sm btn-success" href="{{ route('reserva.edit',$reserva->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
