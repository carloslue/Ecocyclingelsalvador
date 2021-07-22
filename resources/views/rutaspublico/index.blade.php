@extends('layouts.appinit')





@section('content')
    <div class="contenedor container ">
       
        <h3>
            <center><h2 class="White"><b>PAQUETES QUE OFRECEMOS, ¡¡VEN Y DIVIERTETE!!</b></h2></center>
        </h3>
      

        <div class="row">
            @foreach ($rutas as $ruta)
                <div class="col-sm-4">

                    <div class="cuadro_promociones">

                        <div class="uno_cuadro">
                            <img class="imagen" src="{{ asset('imagenes/' . $ruta->imagen) }}"
                                alt=" {{ $ruta->imagen }}" height="200px">
                        </div>

                        <div class="text_cuadro">

                            <h2>{{ $ruta->titulo }}</h2>
                            <br>
                            <p><b>Descripcion: </b></p>
                            <p>{{ $ruta->descripcion_rutas }}</p>
                            <br>
                            <b>
                                <p>Costo:</p>
                            </b>
                           <p>${{ $ruta->costo }}</p> 

                        </div>

                    </div>

                </div>
            @endforeach
        </div>
        @foreach ($informacions as $informacion)
            <div class="row">
                <div class="playa">
                    <img src="img/img3.jpg" alt="">

                    <div class="texto absoluto">
                        <!--llamando informacion de la empresa-->

                        <h2> <span>MISION</span> </h2>
                        <p> {{ $informacion->mision }}</p>
                        <h2> <span>VISION</span> </h2>
                        <p>{{ $informacion->vision }}</p>
                        <h2> <span>OBJETIVO GENERAL</span> </h2>
                        <p>{{ $informacion->general }}</p>
                        <h2> <span>OBJETIVO ESPECIFICO</span> </h2>
                        <p>{{ $informacion->epecifico }}</p>
                    </div>

                </div>
            </div>
        @endforeach


    @endsection
    <style>
        .white{
            color: aliceblue;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>