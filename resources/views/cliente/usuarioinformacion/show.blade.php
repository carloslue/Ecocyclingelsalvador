@extends('layouts.app')

@section('template_title')
    {{ $informacion->name ?? 'Show Informacion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Informacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('informacions.index') }}"> Back</a>
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
                        <div class="form-group">
                            <strong>General:</strong>
                            {{ $informacion->general }}
                        </div>
                        <div class="form-group">
                            <strong>Epecifico:</strong>
                            {{ $informacion->epecifico }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
