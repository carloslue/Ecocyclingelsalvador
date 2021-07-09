@extends('adminlte::page')

@section('template_title')
    Create Ventasfinale
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-info">
                        <span class="card-title">Crear nuevo Registro de ventas</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ventasfinales.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('Administrador.ventasfinale.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
