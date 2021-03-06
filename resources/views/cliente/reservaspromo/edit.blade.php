@extends('layouts.app')

@section('template_title')
    Update Reservaspromo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar informacion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reservasproms.update', $reservaspromo->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('cliente.reservaspromo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<style></style>