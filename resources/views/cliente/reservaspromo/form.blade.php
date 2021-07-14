<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group  " style="visibility:hidden ">
            <select style="visibility:hidden " name="clienteID"  id="" class="form-control">
                <option  value="id"></option>
        </select>
        </div>
    
      
        <div class="form-group">
            {{ Form::label('fecha_visita') }} <br>
            <input class="form-group" type="date" value="{{$reservaspromo->fecha_visita}}" name="fecha_visita" id="date" min = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 1 days"));?>">
           
        </div>
        <div class="form-group">
            {{ Form::label('hora') }}
            {{ Form::time('hora', $reservaspromo->hora, ['class' => 'form-control' . ($errors->has('hora') ? ' is-invalid' : ''), 'placeholder' => 'Hora']) }}
            {!! $errors->first('hora', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group" style="visibility:hidden">
            {{ Form::label('promocionID') }}
            {{ Form::text('promocionID', $reservaspromo->promocionID, ['class' => 'form-control' . ($errors->has('promocionID') ? ' is-invalid' : ''), 'placeholder' => 'Promocionid']) }}
            {!! $errors->first('promocionID', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>