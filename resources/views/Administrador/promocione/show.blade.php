@extends('adminlte::page')

@section('template_title')
    {{ $promocione->name ?? 'Show Promocione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="float-left">
                            <span class="card-title">Informacion de la promocion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('promociones') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Rutasid:</strong>
                            {{ $promocione->rutasID }}
                        </div>
                        <div class="form-group">
                            <strong>Equipoid:</strong>
                            {{ $promocione->equipoID }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $promocione->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $promocione->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $promocione->precio }}
                        </div>
                        <div class="form-group">
                            <strong>fecha de vigencia:</strong>
                            {{ $promocione->fecha_vigencia }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
