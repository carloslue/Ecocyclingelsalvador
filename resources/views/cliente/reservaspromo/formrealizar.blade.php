

@extends('layouts.app')

@section('template_title')
    Create Reservaspromo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Realizar reserva de esta promocion</span>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('danger'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                        <form method="POST" action="{{ route('reservasproms.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                
                                <div class="box-body">
                                 
                                    <div class="form-group  " style="visibility: hidden">
                                        <select style="visibility: hidden" name="clienteID"  id="" class="form-control">
                                            <option  value="id"></option>
                                    </select>
                                    </div>
                                  
                                    @foreach ($promociones as $promocione)
                                   
                                    <fieldset hidden>
                                  
                                        <input type="number" name="promocionID" value="{{$promocione->id}}">
                                       
                                </fieldset>
                                <div class="form-group">
                                    <input type="date" style="visibility: hidden" name="fechavigencia" value="{{$promocione->fecha_vigencia}}"> <br>
                                    {{ Form::label('fecha_vigencia de la promocion') }} <br>
                               
                                 <input type="date" name="" value="{{$promocione->fecha_vigencia}}">
                                </div>
                                    @endforeach
                                
                                 
                                  
                                   
                                    <div class="form-group">
                                        {{ Form::label('hora') }}
                                        <input type="time" required class="form-control" name="hora">
                                       
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('fecha_visita') }} <br>
                                        <input class="" type="date" name="fecha_visita" id="date" min = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 1 days"));?>">
                                    </div>
                                    <select style="visibility: hidden" name="estado" id="$ruta->estado">
                                        <option value="pendiente"></option>
                                     </select>
                                </div>
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
<style></style>