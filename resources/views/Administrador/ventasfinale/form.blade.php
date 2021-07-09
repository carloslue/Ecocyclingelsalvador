<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('dia') }}
                    {{ Form::date('dia', $ventasfinale->dia, ['class' => 'form-control' . ($errors->has('dia') ? ' is-invalid' : ''), 'placeholder' => 'dia']) }}
                    {!! $errors->first('dia', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('n_factura_inicio') }}
                    {{ Form::number('n_factura_inicio', $ventasfinale->n_factura_inicio, ['class' => 'form-control' . ($errors->has('n_factura_inicio') ? ' is-invalid' : ''), 'placeholder' => 'N Factura Inicio']) }}
                    {!! $errors->first('n_factura_inicio', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('n_factura_final') }}
                    {{ Form::number('n_factura_final', $ventasfinale->n_factura_final, ['class' => 'form-control' . ($errors->has('n_factura_final') ? ' is-invalid' : ''), 'placeholder' => 'N Factura Final']) }}
                    {!! $errors->first('n_factura_final', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('n_caja') }}
                    {{ Form::number('n_caja', $ventasfinale->n_caja, ['class' => 'form-control' . ($errors->has('n_caja') ? ' is-invalid' : ''), 'placeholder' => 'N Caja']) }}
                    {!! $errors->first('n_caja', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('ventas_internas_exentas') }}
                    {{ Form::number('ventas_internas_exentas', $ventasfinale->ventas_internas_exentas, ['class' => 'form-control' . ($errors->has('ventas_internas_exentas') ? ' is-invalid' : ''), 'placeholder' => 'Ventas Internas Exentas']) }}
                    {!! $errors->first('ventas_internas_exentas', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('ventas_internas_locales') }}
                    {{ Form::number('ventas_internas_locales', $ventasfinale->ventas_internas_locales, ['class' => 'form-control' . ($errors->has('ventas_internas_locales') ? ' is-invalid' : ''), 'placeholder' => 'Ventas Internas Locales']) }}
                    {!! $errors->first('ventas_internas_locales', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('exportaciones') }}
                    {{ Form::number('exportaciones', $ventasfinale->exportaciones, ['class' => 'form-control' . ($errors->has('exportaciones') ? ' is-invalid' : ''), 'placeholder' => 'Exportaciones']) }}
                    {!! $errors->first('exportaciones', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('ventas_a_cuenta_terceros') }}
                    {{ Form::number('ventas_a_cuenta_terceros', $ventasfinale->ventas_a_cuenta_terceros, ['class' => 'form-control' . ($errors->has('ventas_a_cuenta_terceros') ? ' is-invalid' : ''), 'placeholder' => 'Ventas A Cuenta Terceros']) }}
                    {!! $errors->first('ventas_a_cuenta_terceros', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('iva_retenido') }}
                    {{ Form::number('iva_retenido', $ventasfinale->iva_retenido, ['class' => 'form-control' . ($errors->has('iva_retenido') ? ' is-invalid' : ''), 'placeholder' => 'Iva Retenido']) }}
                    {!! $errors->first('iva_retenido', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('iva_percibido') }}
                    {{ Form::number('iva_percibido', $ventasfinale->iva_percibido, ['class' => 'form-control' . ($errors->has('iva_percibido') ? ' is-invalid' : ''), 'placeholder' => 'Iva Percibido']) }}
                    {!! $errors->first('iva_percibido', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" style="visibility: hidden">
                    <input type="text" name="total_ventas" value="0">
                </div>
            </div>


        </div>











    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
