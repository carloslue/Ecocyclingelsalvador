@extends('layouts.app')

@section('template_title')
    {{ $reserva->name ?? 'Show Reserva' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="float-left">
                            <span class="card-title">Informacion de la reserva realizada</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reserva.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Clienteid:</strong>
                            {{ $reserva->clienteID }}
                        </div>
                        <div class="form-group">
                            <strong>Rutaid:</strong>
                            {{ $reserva->rutaID }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $reserva->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $reserva->hora }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $reserva->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $reserva->telefono }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<style></style>