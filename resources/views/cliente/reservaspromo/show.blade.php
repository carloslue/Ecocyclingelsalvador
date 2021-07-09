@extends('layouts.app')

@section('template_title')
    {{ $reservaspromo->name ?? 'Show Reservaspromo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Informacion de la reserva de promocion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reservasp') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Clienteid:</strong>
                            {{ $reservaspromo->clienteID }}
                        </div>
                        <div class="form-group">
                            <strong>Promocionid:</strong>
                            {{ $reservaspromo->promocionID }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Visita:</strong>
                            {{ $reservaspromo->fecha_visita }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $reservaspromo->hora }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<style></style>