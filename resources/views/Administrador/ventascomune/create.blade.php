@extends('adminlte::page')
@section('template_title')
    Create Ventascomune
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-info">
                        <span class="card-title">NUEVA VENTA</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ventascomunn.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('Administrador.ventascomune.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
