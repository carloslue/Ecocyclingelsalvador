@extends('layouts.app')

@section('template_title')
    Ruta
@endsection

@section('content')

<div class="contenedor container " >
    <hr>
    <h5 class="lin"> <b><center>RUTAS A LAS QUE PUEDES HACER TUS RECORRIDOS SI NOS VISITAS</center></b></h5>
    <hr>   
        <div class="row">
            
            @foreach ($rutas as $ruta)
            
                <div class="columnas col-sm-3">

                    <div class="card">
                        
                        <div class="cuerpotargeta">
                            <img class="imagen" src="{{ asset('imagenes/' . $ruta->imagen) }}" alt=" {{ $ruta->imagen }}">
                            <a class="btn btn-sm btn-primary " href="{{ route('ruta.show', $ruta->id) }}"><i
                                class="fa fa-fw fa-eye"></i> ver informacion de la imagen</a> 
                        </div>
                      
                    </div>

                </div>
            @endforeach
         
        </div>
        
    </div>

    
    </div>
@endsection

<style>
    .imagen{
        width: 100%;
        height: 200;
        margin-top: 0em;
       }
.contenedor{

    background: #0000005e;
        border-radius: 1%;
}

    .btn{
           width: 100%;
          
       
    }

    .columnas{
        margin-top: 1%;
        margin-bottom: 1%;
    }
    

    </style>
   

