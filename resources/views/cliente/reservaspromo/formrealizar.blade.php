

@extends('layouts.app')

@section('template_title')
    Create Reservaspromo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Realizar reserva de esta promocion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reservasproms.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    
                                    <div class="form-group  " style="visibility: hidden">
                                        <select style="visibility: hidden" name="clienteID"  id="" class="form-control">
                                            <option  value="id"></option>
                                    </select>
                                    </div>
                                    <fieldset hidden>
                                    <div class="form-group"  >
                                        {{ Form::label('Promocion numero') }}
                                        {{ Form::text('promocionID',$promocione->id, ['class' => 'form-control' . ($errors->has('promocionID') ? ' is-invalid' : ''), 'placeholder' => 'Promocionid']) }}
                                        {!! $errors->first('promocionID', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>
                                </fieldset>
                                    <div class="form-group">
                                        {{ Form::label('fecha_visita') }}
                                        {{ Form::date('fecha_visita', $promocione->fecha_visita, ['class' => 'form-control' . ($errors->has('fecha_visita') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Visita']) }}
                                        {!! $errors->first('fecha_visita', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('hora') }}
                                        {{ Form::time('hora', $promocione->hora, ['class' => 'form-control' . ($errors->has('hora') ? ' is-invalid' : ''), 'placeholder' => 'Hora']) }}
                                        {!! $errors->first('hora', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>
                            
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                            

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<style></style>