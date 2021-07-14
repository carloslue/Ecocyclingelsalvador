<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <b style="visibility: hidden">
          
            {{ Form::label('imagen') }}
            {{ Form::text('imagen', $ruta->imagen, ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</p>') !!}
            </b>
        </div>
        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $ruta->titulo, ['class' => 'form-control' . ($errors->has('descripcion_rutas') ? ' is-invalid' : ''), 'placeholder' => 'titulo de Rutas']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion_rutas') }}
            {{ Form::text('descripcion_rutas', $ruta->descripcion_rutas, ['class' => 'form-control' . ($errors->has('descripcion_rutas') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Rutas']) }}
            {!! $errors->first('descripcion_rutas', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('costo') }}
            {{ Form::number('costo', $ruta->costo, ['class' => 'form-control' . ($errors->has('costo') ? ' is-invalid' : ''), 'placeholder' => 'costo de Rutas']) }}
            {!! $errors->first('costo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            @if($ruta->estado == 'Abilitado')
            <select name="estado" id="$ruta->estado" aria-placeholder="">
                <option value="Abilitado">{{$ruta->estado}}</option>
               <option value="Inhabilitado">Inhabilitar</option>
            </select>
                @else
                <select name="estado" id="$ruta->estado" aria-placeholder="">
                    <option value="Inhabilitado">{{$ruta->estado}}</option>
                   <option value="Abilitado">Abilitar</option>
                </select>
            @endif
 
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
