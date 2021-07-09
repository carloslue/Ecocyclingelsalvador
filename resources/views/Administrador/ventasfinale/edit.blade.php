@extends('adminlte::page')

@section('template_title')
    Update Ventasfinale
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-info">
                        <span class="card-title">Actualizar datos de venta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ventasfinales.update', $ventasfinale->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('Administrador.ventasfinale.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
