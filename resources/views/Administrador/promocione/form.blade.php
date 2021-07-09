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
            {{ Form::label('válido hasta') }}
            {{ Form::date('fecha_vigencia', $promocione->fecha_vigencia, ['class' => 'form-control' . ($errors->has('fecha_vigencia') ? ' is-invalid' : ''), 'placeholder' => 'fecha de validez']) }}
            {!! $errors->first('fecha_vigencia', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
