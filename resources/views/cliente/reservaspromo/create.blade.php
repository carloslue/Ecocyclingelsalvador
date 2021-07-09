@extends('layouts.app')

@section('template_title')
    Create Reservaspromo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Hacer reserva de esta promocion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reservasproms.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                           
                            @include('cliente.reservaspromo.formrealizar')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<style></style>