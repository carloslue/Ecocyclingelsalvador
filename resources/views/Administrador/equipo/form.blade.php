<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::number('cantidad', $equipo->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion_equipo') }}
            {{ Form::text('descripcion_equipo', $equipo->descripcion_equipo, ['class' => 'form-control' . ($errors->has('descripcion_equipo') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Equipo']) }}
            {!! $errors->first('descripcion_equipo', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
