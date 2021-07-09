@extends('layouts.app')

@section('template_title')
    Create Reserva
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-info">
                        <span class="card-title">Ingrese sus datos para realizar su reserva</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reserva.store') }}"  role="form" enctype="multipart/form-data">
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