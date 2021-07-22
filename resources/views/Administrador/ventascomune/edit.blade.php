@extends('adminlte::page')

@section('template_title')
    Update Ventascomune
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-info">
                        <span class="card-title">ACTUALIZAR VENTA</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ventascomunn.update', $ventascomune->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('Administrador.ventascomune.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
