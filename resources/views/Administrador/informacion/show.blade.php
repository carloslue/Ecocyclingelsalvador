@extends('adminlte::page')

@section('template_title')
    {{ $informacion->name ?? 'Show Informacion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="float-left">
                            <span class="card-title">Informacion empresarial</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('informacion') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Mision:</strong>
                            {{ $informacion->mision }}
                        </div>
                        <div class="form-group">
                            <strong>Vision:</strong>
                            {{ $informacion->vision }}
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
