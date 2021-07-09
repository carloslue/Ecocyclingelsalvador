@extends('adminlte::page')

@section('template_title')
    Update Promocione
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-info">
                        <span class="card-title">Actualizar informacion de la Promocion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('promociones.update', $promocione->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('Administrador.promocione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
