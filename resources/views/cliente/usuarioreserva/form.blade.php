<div class="box box-info padding-1">
    <div class="box-body">
        
       
            <input type="text" style="visibility: hidden" value="{{ Auth::user()->id }}" name="clienteID"> 
   
        <div class="form-group">
            {{ Form::label('Rutas') }}
            <select name="rutaID" id="" class="form-control">
                @foreach ($rutas as $rutas)
                    <option value="{{ $rutas->id }}">{{ $rutas->titulo}}</option>
                @endforeach
            </select>
        </div>
        
        
        <div class="form-group">
            {{ Form::label('Cantidad de persona') }}
            
            {{ Form::number('cantidad', $reserva->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Telefono') }}
          
                <input class="form-control" type="number" pattern=".{8,10}" required name="telefono" value="{{$reserva->telefono}}" maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(8, this.maxLength);" /><i>(Máximo 8 dígitos)</i>
            </div>
        <div class="form-group">
            {{ Form::label('Hora') }}
            {{ Form::time('hora', $reserva->hora, ['class' => 'form-control' . ($errors->has('hora') ? ' is-invalid' : ''), 'placeholder' => 'Hora']) }}
            {!! $errors->first('hora', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Fecha') }} <br>
            <input class="" required type="date" name="fecha" value="{{$reserva->fecha}}" id="date" min = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 1 days"));?>">
        </div>
        <div class="form-group">
           <input style="visibility: hidden" type="text" value="pendiente" name="estado">
          
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
