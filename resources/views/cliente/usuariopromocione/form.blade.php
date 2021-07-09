<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">

            {{ Form::text('Descripcion', $comentario->Descripcion, ['class' => 'form-control' . ($errors->has('Descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Escribir']) }}
            {!! $errors->first('Descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success">Enviar sugerencia</button>
        
    </div>
</div>