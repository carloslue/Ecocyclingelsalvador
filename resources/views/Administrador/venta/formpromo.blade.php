@extends('adminlte::page')

@section('template_title')
    Create Venta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Agregar registro</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ventas.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf



                            <div class="box box-info padding-1">
                                @foreach ($reservaspromos as $reservaspromo)
                                    <div class="box-body">
                                       

                                        <div class="form-group">
                                            <label >Factura</label>
                                            <input class="form-control" required type="number" name="factura">

                                        </div>
                                        <div class="form-group">
                                            <label >Nombre</label>
                                            <input class="form-control" required type="text" value="{{$reservaspromo->name}}" name="nombre">

                                        </div>
                                        <div class="form-group">
                                            <label >Promocion</label>
                                            <input  class="form-control"  required type="text" value="{{$reservaspromo->descripcion}}" name="promocion">

                                        </div>
                                        <div class="form-group">
                                            <label >Precio</label>
                                            <input class="form-control"  required type="decimal" value="{{$reservaspromo->precio}}" name="precio">

                                        </div>
                                        <div class="form-group">
                                            <label>Fecha</label>
                                            <input class="form-control"  required type="date" value="{{$reservaspromo->fecha_visita}}" name="fecha">

                                        </div>

                                  
                                        
                                       
                                       
                                    </div>
                                    @endforeach
                                    <div class="box-footer mt20">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                   
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
