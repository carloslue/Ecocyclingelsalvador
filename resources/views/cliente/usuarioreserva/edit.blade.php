@extends('layouts.app')

@section('template_title')
    Update Reserva
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-info">
                        <span class="card-title">Actualizar reserva</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reserva.update', $reserva->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('cliente.usuarioreserva.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<style></style>