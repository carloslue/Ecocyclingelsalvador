@extends('adminlte::page')

@section('template_title')
    Update Informacion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-info">
                        <span class="card-title">Actualizar Informacion empresarial</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('informacions.update', $informacion->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('Administrador.informacion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
