<div class="box box-info padding-1">
    <div class="box-body">


        {{ Form::label('fecha_visita') }} <br>
        <input class="form-group" type="date" value="{{ $reservaspromo->fecha_visita }}" name="fecha_visita" id="date"
            min="<?php echo date('Y-m-d', strtotime(date('Y-m-d') . '+ 1 days')); ?>">


        <div class="form-group">
            {{ Form::label('hora') }}
            {{ Form::time('hora', $reservaspromo->hora, ['class' => 'form-control' . ($errors->has('hora') ? ' is-invalid' : ''), 'placeholder' => 'Hora']) }}
            {!! $errors->first('hora', '<div class="invalid-feedback">:message</p>') !!}
        </div>
       
        {{ Form::label('Estado') }}
        <h6 class="alerta bg-danger">Si cambia este campo a "cancelar" se eliminara su reserva</h6>
        
        @if ($reservaspromo->estado == 'pendiente')

            <select name="estado" id="$reservaspromo->estado" aria-placeholder="">
                <option value="pendiente">{{ $reservaspromo->estado }}</option>
                <option value="cancelado">Cancelar</option>

            </select>
        @else
            <select name="estado" id="$reservaspromo->estado" aria-placeholder="">
                <option value="cancelado">{{ $reservaspromo->estado }}</option>
                <option value="pendiente">Pendiente</option>


            </select>

        @endif
        <br>

        <input style="visibility: hidden" type="text" value="{{ $reservaspromo->clienteID }}" name="clienteID">
        <input style="visibility: hidden" type="text" value="{{ $reservaspromo->promocionID }}" name="promocionID">

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>

<style>
    .alerta{
        color: aliceblue;
        width: 70%;
    }
</style>