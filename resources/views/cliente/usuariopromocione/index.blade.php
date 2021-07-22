@extends('layouts.app')

@section('template_title')
    Promocione
@endsection

@section('content')


    <div class=" contenedor container">

        <hr class="borde">
        <h3>
            <center><b class="lin">PAQUETES QUE OFRECEMOS VEN Y DIVIERTETE</b></center>
        </h3>
        <hr class="borde">
        <div class="row">
            @foreach ($rutas as $ruta)
                <div class="columna col-sm-4">

                    <div class="card">

                        <div class="card-title">
                            <img class="imagen" src="{{ asset('imagenes/' . $ruta->imagen) }}"
                                alt=" {{ $ruta->imagen }}" height="200px">
                        </div>

                        <div class="card-body cuerpo">


                            <h5><b>Titulo del paquete: </b></h5>

                            {{ $ruta->titulo }}
                            <br>
                            <b>Descripcion: </b>
                            {{ $ruta->descripcion_rutas }}
                            <br>
                            <b>Costo: </b>
                            {{ $ruta->costo }}

                        </div>

                    </div>

                </div>
            @endforeach
        </div>

        <hr class="borde">
        <h3 class="lin">
            <center><b>PROMOCIONES QUE NO TE PUEDES PERDER</b></center>
        </h3>
        <hr class="borde">

        <div class="row">
            @foreach ($Promociones as $promocione)
                <div class="columna col-sm-4">
                    <div class="card">
                        <div class="card-title">
                            <img class="imagen" src="{{ asset('imagenes/' . $promocione->imagen) }}"
                                alt=" {{ $promocione->imagen }}"    >
                        </div>
                        <div class="card-body ">

                            <b>
                                <h5>Titulo de la promocion:</h5>
                            </b>
                            {{ $promocione->titulo }} <br>
                            <b>Equipo:</b>
                            {{ $promocione->descripcion_equipo }} <br>
                            <b>Cantidad de personas:</b>
                            {{ $promocione->cantidad }} <br>
                            <b>Descripcion:</b>
                            {{ $promocione->descripcion }} <br>
                            <b>Costo:</b>
                            {{ $promocione->precio }} <br>
                            <b>Fecha de vigencia:</b>
                            {{ $promocione->fecha_vigencia}} <br>
                            <button class="btn bg-primary"> <a class="btn btn-sm "
                                    href="{{ route('promocion.show', $promocione->id) }}">
                                    <h6>Reservar Promocion </h6>
                                </a></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-primary">
                        <span class="card-title">Envia una sugerencia o comentario</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('promocion.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('cliente.usuariopromocione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


