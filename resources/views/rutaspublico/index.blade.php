@extends('layouts.appinit')





@section('content')
    <div class="contenedor container ">
        <hr class="borde">
        <h3>
            <center><b class="TITULO">PAQUETES QUE OFRECEMOS VEN Y DIVIERTETE</b></center>
        </h3>
        <hr class="borde">

        <div class="row">
            @foreach ($rutas as $ruta)
                <div class="columnas col-sm-4">

                    <div class="card">

                        <div class="card-title">
                            <img class="imagen" src="{{ asset('imagenes/' . $ruta->imagen) }}"
                                alt=" {{ $ruta->imagen }}">
                        </div>

                        <div class="card-body cuerpotargeta">

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
        <h3>
            <center><b class="TITULO">PROMOCIONES QUE NO TE PUEDES PERDER</b></center>
        </h3>
        <hr class="borde">

        <div class="row">
            @foreach ($Promociones as $promocione)
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-title">
                            <img class="imagen" src="{{ asset('imagenes/' . $promocione->imagen) }}"
                                alt=" {{ $ruta->imagen }}">
                        </div>
                        <div class="card-body">

                            <b>
                                <h5>Titulo de la promocion:</h5>
                            </b>
                            {{ $promocione->titulo }} <br>
                            <b>Equipo:</b>
                            {{ $promocione->descripcion_equipo }}
                            <b>Cantidad de personas:</b>
                            {{ $promocione->cantidad }} <br>
                            <b>Descripcion:</b>
                            {{ $promocione->descripcion }} <br>
                            <b>Costo:</b>
                            {{ $promocione->precio }} <br>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection

<style>
    .borde {
        background: rgb(0, 0, 0);

    }

    .imagen {
        width: 100%;
        margin-top: 0em;
    }

    .columnas {
        margin-top: 1%;
        margin-bottom: 1%;
    }

    .borde {
        background: rgb(255, 255, 255);
        color: green;

    }

   

    .contenedor {
        background: #0000005e;
        border-radius: 1%;
        padding-top: 1%;
        padding-bottom: 2%;
    }

</style>

