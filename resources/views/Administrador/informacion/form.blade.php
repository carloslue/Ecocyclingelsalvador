<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('mision') }}
            {{ Form::text('mision', $informacion->mision, ['class' => 'form-control' . ($errors->has('mision') ? ' is-invalid' : ''), 'placeholder' => 'Mision']) }}
            {!! $errors->first('mision', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('vision') }}
            {{ Form::text('vision', $informacion->vision, ['class' => 'form-control' . ($errors->has('vision') ? ' is-invalid' : ''), 'placeholder' => 'Vision']) }}
            {!! $errors->first('vision', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('general') }}
            {{ Form::text('general', $informacion->general, ['class' => 'form-control' . ($errors->has('general') ? ' is-invalid' : ''), 'placeholder' => 'General']) }}
            {!! $errors->first('general', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('epecifico') }}
            {{ Form::text('epecifico', $informacion->epecifico, ['class' => 'form-control' . ($errors->has('epecifico') ? ' is-invalid' : ''), 'placeholder' => 'Epecifico']) }}
            {!! $errors->first('epecifico', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar informacion</button>
    </div>
</div>
