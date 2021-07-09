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
         
                <img class="imgl" src="img/Logo2.png" width="130" height="80" alt="img">
              
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="menu collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <a class="btnn nav-link" href="{{ route('infoempresa') }}"><center><p class="lin">QUIENES SOMOS?</p></center></a>
                    <a class="btnn nav-link" href="{{ route('publico') }}"><center><p class="lin">INICIO</p></center></a>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="boton nav-link" href="{{ route('login') }}"><center><p class="lin">LOGIN</p></center></a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="boton nav-link" href="{{ route('register') }}"><center><p class="lin">REGISTRATE</p></center></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        
        <main class="py-4 fondo">
          <br><br><br>
            
            @yield('content')
        </main>


        <div class="footer">
            <br>
            <div class="redes">
                <center>
                   <b> <p>Siguenos en nuestras redes sociales</p></b>
                   <a href="https://api.whatsapp.com/send?phone=50362085740&app=facebook&entry_point=page_cta&fbclid=IwAR2WQjcLCCZQa4LZWhW5lyOE83tKBg5yGnNpRwtESaogBom-VxGn4DzQYe8" target="_blank"><img src="img/watsapp.png" alt="nuestro whatsapp" width=48 height=48></a>
           
            <a href="http://www.facebook.com/ecocyclingtours" target="_blank"><img alt="Siguenos en Facebook" src="https://lh3.googleusercontent.com/-NSLbC_ztNls/T6VX0g6z8AI/AAAAAAAAA0A/_vyIBrmZbuY/s48/facebook48.png" width=48 height=48  /></a>

          
            <a href="http://instagram.com/eco.cycling?utm_medium=copy_link" target="_blank"><img alt="Siguenos en Instagram" src="https://lh3.googleusercontent.com/-D-erW-8vZFo/UIqE3H6oUuI/AAAAAAAABgE/4kh346Lwaxk/s48/instagram48.png" width=48 height=48  /></a>
        </center>
        </div>
        <br>
            <center>
                <h5><b>Copyright Ecocycling © {{ date('Y') }}</b></h5>
            </center>
            <br>
        </div>
    </div>


</body>

</html>

<style>
     
 
    .footer{
        background: black;
        color: aliceblue;
    }
    .fondo {
        background-image: url("imagenes/fondito.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: inherit;
       
    }

  
    .barra {
        background-color: #06680bf8;
        color: white;
        

    }

    .menu{
        background: #00000025;
        width: 90%;
        justify-content: space-between;
        
    }

    .perfil{
        border-radius: 50%;
    }

    a {
       
       height: 100%;
        transition: background-color .5s;
        
        
    }
    
    .btnn{
       
        width: 100%;
        
    }
.lin{
    color:aliceblue;
    font-family:bebas neue;
    padding-top: 4px;
    font-size: 17px;
}
.salir{
    color: rgb(5, 212, 202);
}
    a:hover {
       /* background-color: rgba(4, 241, 229, 0.507);*/
        background-color: rgba(141, 151, 5, 0.733);
        color: rgb(0, 0, 0);

    }

    .boton{
        border-radius: 5%;
        border: 1px solid #000000;
        background: rgb(10, 221, 38);
        height: 56px;
        transition: background-color .5s;
        
    }


    .footer {
        background-color: black;
        bottom: 0px;
        width: 100%;
        color: white;
    }


    .titulo {

color: rgb(255, 255, 255);
font-family: bebas neue;

}
   

</style>

<style type="text/css">
    @font-face {
        font-family:bebas neue;
        src: url(../fonts/BebasNeue-Regular.ttf);
    }
    </style>