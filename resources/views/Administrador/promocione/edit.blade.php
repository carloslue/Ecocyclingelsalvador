@extends('adminlte::page')

@section('template_title')
    Update Promocione
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-info">
                        <span class="card-title">Actualizar informacion de la Promocion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('promociones.update', $promocione->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                            
                                    <div class="form-group">
                                        {{ Form::label('seleccionar ruta') }}
                                        <select name="rutasID" id="" class="form-control ">
                                            @foreach ($ruta as $rutas)
                                                <option value="{{ $rutas->id }}">{{ $rutas->titulo }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Seleccionar equipo') }}
                                        <select name="equipoID" id="" class="form-control">
                                            @foreach ($equipos as $equipo)
                                                <option value="{{ $equipo->id }}">{{ $equipo->descripcion_equipo }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Cantidad de personas') }}
                                        {{ Form::number('cantidad', $promocione->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                                        {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('descripcion') }}
                                        {{ Form::text('descripcion', $promocione->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                                        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('precio') }}
                                        {{ Form::number('precio', $promocione->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
                                        {!! $errors->first('precio', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('válido hasta') }} <br>
                                        <input class="form-group" type="date" value="{{$promocione->fecha_vigencia}}" name="fecha_vigencia" id="date" min = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 1 days"));?>">
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('Estado') }} <br>
                                    @if($promocione->estado == 'Abilitado')
                                    <select name="estado" id="$promocione->estado" aria-placeholder="">
                                        <option value="Abilitado">{{$promocione->estado}}</option>
                                       <option value="Inhabilitado">Inhabilitar</option>
                                    </select>
                                        @else
                                       
                                        <select name="estado" id="$promocione->estado" aria-placeholder="">
                                            <option value="Inhabilitado">{{$promocione->estado}}</option>
                                           <option value="Abilitado">Abilitar</option>
                                        </select>
                                    @endif
                                </div>
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
