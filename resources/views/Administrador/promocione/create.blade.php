@extends('adminlte::page')

@section('template_title')
    Create Promocione
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-info">
                        <span class="card-title ">Agregar Promocion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('promociones.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('Administrador.promocione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
