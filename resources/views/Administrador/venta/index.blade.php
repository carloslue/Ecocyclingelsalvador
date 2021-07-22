@extends('adminlte::page')

@section('template_title')
    Venta
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-sm-12">
           
           <form  action="{{ route('ventapromocion') }}"  role="form" method="get">
            <label for="">fecha inicio</label>
            <input required class="form" type="date"  name="inicio">
            <label  for="">fecha final</label>
            <input required class="form" type="date" name="final">
            <button type="submit" class="btn btn-primary">Consultar</button>
           </form>
            <br> <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('REGISTROS DE VENTAS PROMOCIONES DE SERVICIOS TURISTICOS') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('ventas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Promocion</th>
										<th>Precio</th>
										<th>Fecha</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach ($ventas as $venta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $venta->factura }}</td>
											<td>{{ $venta->nombre }}</td>
											<td>{{ $venta->promocion }}</td>
											<td >{{ $venta->precio }}</td>
											<td>{{ $venta->fecha }}</td>

                                            <td>
                                                <form action="{{ route('ventas.destroy',$venta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('ventas.show',$venta->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ventas.edit',$venta->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
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
                                       
                                        
                                        
										<th colspan="2" class="bg-warning"><center><label for="">Total: ${{$ventapromocion}}</center></label></th>
                                        <th colspan="2" class="bg-warning"><center><label for="">Neto: ${{$iva}}</label></center></th>
                                        <th colspan="2" class="bg-warning"><center><label for="">IVA: ${{$libre}}</label></center></th>
										
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                {!! $ventas->links() !!}
            </div>
        </div>
    </div>
@endsection
