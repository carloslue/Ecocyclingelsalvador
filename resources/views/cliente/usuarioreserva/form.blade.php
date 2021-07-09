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
            {{ Form::label('Fecha') }}
            {{ Form::date('fecha', $reserva->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Hora') }}
            {{ Form::time('hora', $reserva->hora, ['class' => 'form-control' . ($errors->has('hora') ? ' is-invalid' : ''), 'placeholder' => 'Hora']) }}
            {!! $errors->first('hora', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad de persona') }}
            {{ Form::number('cantidad', $reserva->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Telefono') }}
            {{ Form::text('telefono', $reserva->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
