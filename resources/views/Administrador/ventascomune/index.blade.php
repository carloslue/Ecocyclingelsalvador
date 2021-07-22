@extends('adminlte::page')

@section('template_title')
    Ventascomune
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form  action="{{ route('ventacomun') }}"  role="form" method="get">
                    <label for="">fecha inicio</label>
                    <input required class="form" type="date"  name="inicio">
                    <label  for="">fecha final</label>
                    <input required class="form" type="date" name="final">
                    <button type="submit" class="btn btn-primary">Consultar</button>
                   </form>
                    <br> <br>
                <div class="card">
                    <div class="card-header bg-info">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('REGISTROS DE VENTAS DE SERVICIOS TURISTICOS COMUN') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('ventascomunn.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Agregar nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('danger'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Factura</th>
										<th>Nombre</th>
										<th>Ruta</th>
										<th>Precio</th>
										<th>Fecha</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ventascomunes as $ventascomune)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ventascomune->factura }}</td>
											<td>{{ $ventascomune->nombre }}</td>
											<td>{{ $ventascomune->ruta }}</td>
											<td>{{ $ventascomune->precio }}</td>
											<td>{{ $ventascomune->fecha }}</td>

                                            <td>
                                                <form action="{{ route('ventascomunn.destroy',$ventascomune->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('ventascomunn.show',$ventascomune->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ventascomunn.edit',$ventascomune->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="tfoot">
                                   <tr>
                                    <th colspan="7"><center>RESULTADOS</center></th>
                                   </tr>
                                    <tr>
                                        <th colspan="1" class="bg-warning">ventas: {{$totalc}}</th>
										<th colspan="2" class="bg-warning"><center><label for="">Total: ${{$ventacomun}}</label></center></th>
                                        <th colspan="2" class="bg-warning"><center><label for="">Neto: ${{$iva}}</label></center></th>
                                        <th colspan="2" class="bg-warning"><center><label for="">IVA: ${{$libre}}</label></center></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ventascomunes->links() !!}
            </div>
        </div>
    </div>
@endsection
