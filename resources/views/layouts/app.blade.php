<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav class="barra navbar fixed-top navbar-expand-md navbar-light  shadow-sm">
            <a>
                <img src='../../img/Logo2.png' width="100" height="60" alt="">
            </a>
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if (Auth::check())
                        <ul class="menu navbar-nav mr-auto">
                            <a class="btnn nav-link" href="{{ route('reservaindex') }}">
                                <center>
                                    <p class="lin">Reservar</p>
                                </center>
                            </a>
                            <a class="btnn nav-link" href="{{ route('reservasp') }}">
                                <center>
                                    <p class="lin"> Promociones reservadas</p>
                                </center>
                            </a>

                           
                            <a class="btnn nav-link" href="{{ route('inicio') }}">
                                <center>
                                    <p class="lin">Rutas</p>
                                </center>
                            </a>
                            <a class="btnn nav-link" href="{{ route('promocione') }}">
                                <center>
                                    <p class="lin">Inicio</p>
                                </center>
                            </a>



                        </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item  dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <b class="salir">
                                        <img class="perfil" src="{{ asset('imagenes/' . Auth::user()->imagen) }}"
                                            alt=" {{ Auth::user()->imagen }}" width="50px" height="50px">

                                    </b>
                                </a>

                                <div class="bg-info dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item " href="{{ Auth::user()->name }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>



                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 fon">
            <br><br><br>



            @yield('content')
        </main>

        <div class="footer">
            <div class="redes">
                <center>
                    <b>
                        <p>Siguenos en nuestras redes sociales</p>
                    </b>
                    <a href="https://api.whatsapp.com/send?phone=50362085740&app=facebook&entry_point=page_cta&fbclid=IwAR2WQjcLCCZQa4LZWhW5lyOE83tKBg5yGnNpRwtESaogBom-VxGn4DzQYe8"
                        target="_blank"><img src='../../img/watsapp.png' alt="nuestro whatsapp" width=48 height=48></a>

                    <a href="http://www.facebook.com/ecocyclingtours" target="_blank"><img alt="Siguenos en Facebook"
                            src="https://lh3.googleusercontent.com/-NSLbC_ztNls/T6VX0g6z8AI/AAAAAAAAA0A/_vyIBrmZbuY/s48/facebook48.png"
                            width=48 height=48 /></a>


                    <a href="http://instagram.com/eco.cycling?utm_medium=copy_link" target="_blank"><img
                            alt="Siguenos en Instagram"
                            src="https://lh3.googleusercontent.com/-D-erW-8vZFo/UIqE3H6oUuI/AAAAAAAABgE/4kh346Lwaxk/s48/instagram48.png"
                            width=48 height=48 /></a>
                </center>
            </div>
            <br>
            <center>
                <h5><b>Copyright © {{ date('Y') }}</b></h5>
            </center>
            <br>
        </div>
    </div>


</body>

</html>

<style>
    .fon {
        margin-top: 0.2%;
        background-image: url("../../img/fonditoo.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        background-attachment: fixed;


    }

    .barra {
        font-size: 15px;
        background-color: #06680bf8;
        color: white;

    }

    .menu {
        background: #00000025;
        width: 90%;
        justify-content: space-between;
    }

    .perfil {
        border-radius: 50%;
    }

    a {

        height: 100%;
        transition: background-color .5s;

    }

    .btnn {

        width: 100%;

    }

   

    .salir {
        color: rgb(5, 212, 202);
    }

    .btnn:hover {
        background-color: rgba(141, 151, 5, 0.733);
        color: rgb(0, 0, 0);

    }

    .boton {

        background: rgb(10, 221, 38);
    }


    .footer {
        background-color: black;

        bottom: 0px;
        width: 100%;

        color: white;
    }

   
    
.lin{
    color:aliceblue;
    font-family:'bebas neue';
}
    <style>
    .borde {
        background: rgb(255, 255, 255);
        color: green;

    }

    .columna {
        margin-top: 1%;
        margin-bottom: 1%;
    }

    .imagen {
        width: 100%;
        height: 180;
        margin-top: 0em;
    }

    .contenedor {
        background: #0000005e;
        border-radius: 1%;

        padding-top: 1%;
        /*  background: #00000049;*/
        padding-bottom: 2%;
    }

  



</style>


<style type="text/css">
@font-face {
    font-family:bebas neue;
    src: url(../../fonts/BebasNeue-Regular.ttf);
}
</style>