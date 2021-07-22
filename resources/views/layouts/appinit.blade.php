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
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>

<body>
    <div class="nave">
        <div name="inicio" id="inicio"></div>
        <div class="menu_bar">
            <a href="{{ route('publico') }}" class="bt-menu"><img src="img/menu.png" alt="menu">ECOCYCLING</a>
        </div>
        <div id="app">
            <!--------------------------------Barra de Navegación-->
            <nav>
                <img class="imag_menu1" src="img/Logo2.png" alt="logo">
                <!-- Left Side Of Navbar -->
                <ul>
                    <!--<li><a href="{{ route('infoempresa') }}">QUIENES SOMOS?</a></li>-->
                    <li><a href="{{ route('publico') }}">INICIO</a></li>
                    <li><a href="#nosotros">NOSOTROS</a></li>

                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li><a href="{{ route('login') }}">LOGIN</a></li>
                        @endif

                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">REGISTRATE</a></li>
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
            </nav>
        </div>
        <!--------------------------------slider-->
        <header>
            <div class="slider">
                <ul>
                    <li><img src="img/s2.jpg" alt="mujeres en playa"></li>
                    <li><img src="img/s1.jpg" alt="hostal"></li>
                    <li><img src="img/img8.jpg" alt="atardecer"></li>
                    <li><img src="img/fondo2.jpg" alt="lugar"></li>

            </div>

        </header>


        <!--------------------------------nostros-->
        <div name="nosotros" id="nosotros"></div>
        <div class="content-all">
            <div class="content-img">
                <div class="vacio1_nosotros"></div>
                <div class="img_1">
                    <img class="imagesuno1" src="img/n2.jpg" alt=""> <br> <br><br> <br>
                </div>
                <div class="vacio_nosotros"></div>
                <div class="img_2">
                    <img class="imagesuno" src="img/s2.jpg" alt="">
                </div>
                <div class="content-txtO">
                    <h1 class="h2_servicios">Nosotros</h1> <br>
                    <p class="p_servicios">

                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Sapiente modi sint, repellendus quo assumenda, velit dolores
                        laudantium veritatis error placeat, praesentium maiores amet.
                        <br>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Ad unde nesciunt ex repellat dignissimos obcaecati quos alias atque
                        iure perspiciatis. Unde temporibus eaque omnis voluptatem, voluptas
                        ipsa nulla inventore velit?
                    </p>

                </div>

                <div class="content_1"></div>
                <div class="content_2"></div>
                <div class="content_3"></div>
                <div class="content_4"></div>
            </div>
        </div>

        <!-- rutas y promociones -->

        <div name="promociones" id="promociones"></div>
        <div class="contenedor_Promociones">
           
            <center><p><h2 class="White">¡¡PROMOCIONES!!</h2></p></center>
          
            <!-- posible que vaya in div class row aquiiiii xd  -->
            <div class="row">
                @foreach ($Promociones as $promocione)
                    <div class="col-sm-4">
                        <div class="cuadro_promociones">
                            <div class="uno_cuadro">
                                <img class="imagen" src="{{ asset('imagenes/' . $promocione->imagen) }}"
                                    alt=" {{ $ruta->imagen }}">
                            </div>
                            <div class="text_cuadro">   
                                <h2> {{ $promocione->titulo }}</h2> <br>
                                <p><b>Equipo:</b></p>
                                <p> {{ $promocione->descripcion_equipo }}</p>
                                <p> <b>Cantidad de personas:</b></p>
                                <p> {{ $promocione->cantidad }} <br></p>
                                <p> <b>Descripcion:</b></p>
                                <p> {{ $promocione->descripcion }} <br></p>
                                <p> <b>Costo:</b></p>
                                <p>{{ $promocione->precio }} <br></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>

        <!--llamando informacion de la rutas o paquetes-->
        <main class="py-4">
            @yield('content')
            <br>
          
        </main>
       

        <!--------------------------------------pie-->
        <footer>
            <div class="container1">
                <div class="footer1">
                    <div class="footer2">
                        <a name="contactos" id="contactos"></a>
                        <h3>Informacion</h3>
                        <a class="pa" href="#inicio"> Inicio </a> <br>
                        <a class="pa" href="#Precios"> Precios </a> <br>
                        <a class="pa" href="#promociones"> Promociones </a> <br>
                        <a class="pa" href="#"> Términos y Condiciones </a><br>
                    </div>
                    <div class="footer2">
                        <h3>Dirección</h3>
                        <span><i class="fa fa-map-marker"></i>
                            <p>290 Av. las cruces - Apaneca</p>
                        </span> <br>
                        <span><i class="fa fa-phone"></i>
                            <p>(+503) 7837-2373</p>
                        </span> <br>
                        <span><i class="fa fa-envelope"></i>
                            <p>ecocyclingelssalvador@gmail.com</p>
                        </span>
                    </div>
                    <div class="footer2">
                        <h3>Sobre Nosotros</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            <br> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </div>
                </div>
            </div>
            <div class="footer_redes">
                <div class="main_redes">
                    <div class="footer_copy">
                        &copy; 2021, Todos los derechos reservados - | ECO CYCLING EL SALVADOR |.
                    </div>
                    <div class="footer--redes">
                        <a href="https://api.whatsapp.com/send?phone=50362085740&app=facebook&entry_point=page_cta&fbclid=IwAR2WQjcLCCZQa4LZWhW5lyOE83tKBg5yGnNpRwtESaogBom-VxGn4DzQYe8"
                            target="_blank"><img src="img/watsapp.png" alt="nuestro whatsapp" width=48 height=48></a>

                        <a href="http://www.facebook.com/ecocyclingtours" target="_blank"><img
                                alt="Siguenos en Facebook"
                                src="https://lh3.googleusercontent.com/-NSLbC_ztNls/T6VX0g6z8AI/AAAAAAAAA0A/_vyIBrmZbuY/s48/facebook48.png"
                                width=48 height=48 /></a>


                        <a href="http://instagram.com/eco.cycling?utm_medium=copy_link" target="_blank"><img
                                alt="Siguenos en Instagram"
                                src="https://lh3.googleusercontent.com/-D-erW-8vZFo/UIqE3H6oUuI/AAAAAAAABgE/4kh346Lwaxk/s48/instagram48.png"
                                width=48 height=48 /></a>
                    </div>
                </div>
            </div>
        </footer>


        <!--<div class="footer">
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
        </div>-->
    </div>


</body>

</html>

<style>
    body {
      
        background: rgba(19, 146, 5, 0.664);
        background-position: center;
        background-size: cover;
    }

    /*******************************BARRA*/
    .nave {
        width: 100%;
    }

    .imag_menu1 {
        margin-left: 1%;
        height: 100%;
        width: 12%;
        /*position: fixed;*/
    }

    .menu_bar {
        display: none;
    }

    .nave nav ul {
        float: right;
        padding-top: 13px;
        text-align: center;
        list-style: none;
        font-family: 'Source Sans Pro', sans-serif;
    }

    .nave nav ul li {
        display: inline-flex;
    }

    .nave nav ul li a {
        color: white;
        padding: 14px;
        display: block;
        text-decoration: none;
        font-size: 20px;
        font-family: 'Playfair Display', serif;
    }

    .nave nav ul li:hover {
        background: rgba(255, 255, 255, 0.541);
    }

    .nave nav ul li a:hover {
        color: #272727;
    }

    @media screen and (min-width: 882px) {
        .nave nav {
            z-index: 90;
            /*position:*/
            background: green;
            left: 0%;
            width: 100%;
            height: 100px;
        }
    }

    @media screen and (max-width: 882px) {

        .imag_menu {
            display: none;
        }

        .nave nav {
            z-index: 100;
            width: 150%;
            /*80px*/
            left: -100%;
            margin: 0;
            position: absolute;
            height: 40px;
        }

        .nave nav ul {
            margin: 0;
            padding: 0;
        }

        .nave nav ul li {
            background: #1CBACC;
            display: block;
            width: 50%;
            text-align: justify;
            float: none;
            border-bottom: 1px solid rgba(255, 255, 255.3);
        }

        .nave nav ul li a {
            color: yellow;
            padding-bottom: 10%;
            padding-top: 10%;
        }

        .menu_bar {
            display: block;
            width: 100%;
            background: #ccc;
        }

        .menu_bar .bt-menu {
            display: block;
            padding: 20px;
            background: #1CBACC;
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 35px;
            box-sizing: border-box;
        }

        .menu_bar img {
            float: right;
        }

        .imag_menu1 {
            display: none;
        }

    }

    /***********************************slider*/
    .slider {
        padding: 0;
        margin: auto;
        overflow: hidden;
    }

    .slider ul {
        display: flex;
        padding: 0;
        margin-top: 0;
        width: 400%;
        animation: cambio 20s infinite alternate linear;
    }

    .slider li {
        width: 100%;
        list-style: none;
    }

    .slider img {
        margin-top: 0px;
        width: 100%;
        height: 650PX;
        /*border: solid;
    border-color: black;*/
    }

    @keyframes cambio {
        0% {
            margin-left: 0;
        }

        20% {
            margin-left: 0;
        }

        25% {
            margin-left: -100%;
        }

        45% {
            margin-left: -100%;
        }

        50% {
            margin-left: -200%;
        }

        70% {
            margin-left: -200%;
        }

        75% {
            margin-left: -300%;
        }

        100% {
            margin-left: -300%;
        }
    }

    /****************************nosotros******************/
    .content-all {
        width: 100%;

    }

    .content-img {
        width: 100%;
        height: 700px;
        /**/
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: row;
    }

    @media screen and (min-width: 880px) {

        .p_servicios {
            padding: 0;
            margin: 0;
            width: 100%;
            font-size: 20px;
            padding-bottom: 10%;
            font-family: 'Playfair Display', serif;
        }

        .vacio1_nosotros {
            width: 100%;
            height: 73% !important;
        }
    }

    @media screen and (max-width: 480px) {
        .img_1 {
            display: none;
        }

        .p_servicios {
            color: #000;

        }

        .content-all {
            width: 100%;
            height: auto;
            background: #1CBACC;
        }

        .h2_servicios {
            color: #000;
            text-align: center;

        }

        .content_1 {
            display: none;
        }

        .content_2 {
            display: none;
        }

        .content_3 {
            display: none;
        }

        .content_4 {
            display: none;
        }

    }

    @media screen and (max-width: 882px) {

        .img_1 {
            z-index: 1;
            width: 25%;
            height: 2%;
            padding-left: 5%;
            padding-top: 5%;
        }

        .img_2 {
            display: none !important;
            margin: 0;
            padding: 0;
        }

        .imagesuno1 {
            box-shadow: 25px 25px 15px #272727;
            width: 100%;
            height: auto;
        }

        .imagesuno {
            display: none;
        }

        .p_servicios {
            padding: 0;
            margin: 0;
            width: 100%;
            font-size: 15px;
            padding-bottom: 10%;
            font-family: 'Playfair Display', serif;
        }

        .h2_servicios {
            font-family: 'Playfair Display', serif;
            font-size: 50px;
            text-align: center;
        }

        .vacio1_nosotros {
            box-shadow: 1px 1px 20px #272727;
            display: none;
        }

        .vacio_nosotros {
            display: none;

        }
    }

    .img_1 {
        z-index: 1;
        width: 25%;
        height: 4%;
        padding-left: 5%;
        padding-top: 9%;
    }

    .img_2 {
        display: flex;
        flex-direction: row;
        width: 18%;
        height: 40%;
        padding-left: 4%;
        padding-top: 12%;
        padding-bottom: 10%;
        z-index: 1;
    }

    .imagesuno1 {
        box-shadow: 25px 25px 15px #272727;
        width: 100%;
        height: auto;
    }

    .imagesuno {
        box-shadow: 25px 25px 15px #272727;
        width: 100%;
        height: 100%;
    }

    .content-txtO {
        font-size: 28px;
        text-align: justify;
        color: white;
        z-index: 1;
        width: 50%;
        padding-top: 12.5%;
        padding-left: 10%;
        padding-right: 5%;
        font-family: 'Playfair Display', serif;
    }

    .h2_servicios {
        font-family: 'Playfair Display', serif;
        font-size: 150%;
        text-align: center;
    }

    .vacio1_nosotros {
        box-shadow: 1px 1px 20px #272727;
        width: 21%;
        height: 54% !important;
        margin-top: 8%;
        margin-left: 4%;
        position: absolute;
    }

    .vacio_nosotros {
        box-shadow: 1px 1px 20px #272727;
        width: 14%;
        height: 30%;
        margin-left: 28.5%;
        margin-top: 11%;
        padding-bottom: 5%;
        position: absolute;
    }

    .content_1 {
        width: 100%;
        height: 1000%;
        position: absolute;
        top: 0;
        background: rgba(28, 186, 204, 0.5);
        -webkit-transform: rotate(-30deg);
        transform: rotate(-30deg);
        margin-left: -750px;
        transition: all 300ms;
    }

    .content_2 {
        width: 100%;
        height: 1000px;
        position: absolute;
        top: 0;
        background: rgba(0, 0, 0, 0.4);
        -webkit-transform: rotate(-30deg);
        transform: rotate(-30deg);
        margin-left: -800px;
        transition: all 500ms;
    }

    .content_3 {
        width: 100%;
        height: 1000px;
        position: absolute;
        top: 0;
        background: rgba(0, 0, 0, 0.4);
        -webkit-transform: rotate(30deg);
        transform: rotate(30deg);
        margin-left: -800px;
        margin-top: -500px;
        transition: all 900ms;
    }

    .content_4 {
        width: 100%;
        height: 1000px;
        position: absolute;
        top: 0;
        background: rgba(28, 186, 204, 0.5);
        -webkit-transform: rotate(30deg);
        transform: rotate(30deg);
        margin-left: -850px;
        margin-top: -500px;
        transition: all 700ms;
        -webkit-box-shadow: 0px 1px 20px -5px #272727;
        box-shadow: 0px 1px 20px -5px #272727;
    }

    .content-img .content_1 {
        width: 250%;

        -webkit-transition: all 900ms;
        transition: all 900ms;
    }

    .content-img .content_2 {
        width: 250%;
        -webkit-transition: all 300ms;
        transition: all 300ms;
    }

    .content-img .content_3 {
        width: 250%;
        height: 170%;
        -webkit-transition: all 500ms;
        transition: all 500ms;
    }

    .content-img .content_4 {
        width: 250%;
        height: 170%;
        -webkit-transition: all 700ms;
        transition: all 700ms;
    }


    /****************************Promociones******************/

    .tema_promociones {
        width: 25%;

    }

    .contenedor_Promociones {
        position: relative;
        width: 100%;
        /*1200px*/
        min-height: 600px;
        margin: 0 auto 0;
        /* aqui esta en ancho de body con el cuadro*/
        /*background: #262626;*/
    }

    @media screen and (max-width: 702px) {
        .contenedor_Promociones {
            display: flex;
            flex-direction: column;
            min-height: 300px;
        }
    }

    .cuadro_promociones {
        position: relative;
        width: calc(33% - 30px);
        height: calc(300px - 30px);
        background: #000;
        float: left;
        margin: 15px;
        box-sizing: border-box;
        overflow: hidden;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .8);
    }

    @media screen and (max-width: 702px) {
        .cuadro_promociones {
            width: auto;
            margin: 40px;
        }
    }

    .cuadro_promociones:before {
        content: '';
        position: absolute;
        top: 10px;
        left: 10px;
        right: 10px;
        bottom: 10px;
        border-top: 1px solid #fff;
        border-bottom: 1px solid #fff;
        box-sizing: border-box;
        transition: 0.5s;
        transform: scaleX(0);
        opacity: 0;
    }

    .cuadro_promociones:hover:before {
        transform: scaleX(1);
        opacity: 1;
    }

    .cuadro_promociones:after {
        content: '';
        position: absolute;
        /* decoracion de la linea*/
        top: 10px;
        left: 10px;
        right: 10px;
        bottom: 10px;
        border-left: 1px solid #fff;
        border-right: 1px solid #fff;
        box-sizing: border-box;
        transition: 0.5s;
        transform: scaleY(0);
        opacity: 0;
    }

    .cuadro_promociones:hover:after {
        transform: scaleY(1);
        opacity: 1;
    }

    .uno_cuadro img {
        width: 100%;
        height: 280px;
        transition: 0.5s;
    }

    .cuadro_promociones:hover img {
        opacity: .2;
        transform: scale(1.2);
    }

    .text_cuadro {
        position: absolute;
        width: 100%;
        top: 50%;
        transform: translateY(-50%);
        z-index: 1;
        padding: 20px;
        box-sizing: border-box;
        color: #fff;
        text-align: center;
    }

    .text_cuadro h2 {
        margin: 0 0 10px;
        padding: 0;
        transition: 0.5s;
        transform: translateY(-50);
        opacity: 0;
        visibility: hidden;
        font-family: 'Playfair Display', serif;
        font-size: 150%;
    }

    .text_cuadro p {
        margin: 0;
        padding: 0;
        transition: 0.5s;
        transform: translateY(50);
        opacity: 0;
        visibility: hidden;
        font-family: 'Playfair Display', serif;
        font-size: 17px;
    }

    .cuadro_promociones:hover h2,
    .cuadro_promociones:hover p {
        opacity: 1;
        visibility: visible;
        transform: translateY(0px);
        transition-delay: 0.2s;
    }


    /****************************servicios******************/
    .absoluto {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .playa {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 100%;
        margin-top: 6%;
        display: block;
        background: rgba(58, 52, 42, 0.9);
    }

    .playa:hover img {
        opacity: 0.4;
    }

    .playa:hover .texto {
        background: rgba(58, 52, 42, 0);
    }

    .playa:hover .texto:before {
        opacity: 1;
        transform: scale(1);
    }

    .playa:hover .texto h2 {
        transform: translate3d(0, 0, 0);
    }

    .playa:hover .texto p {
        opacity: 1;
        transform: scale(1);
    }

    .playa img {
        width: 100%;
        height: 100vh;
        position: relative;
        display: block;
        transition: opacity 0.35s;
    }

    .playa a {
        z-index: 1;
    }

    .playa .texto {
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
        color: white;
        font-size: 20px;
        transition: 0.35s;
    }

    .playa .texto:before {
        content: '';
        position: absolute;
        top: 30px;
        right: 30px;
        left: 30px;
        bottom: 30px;
        border: 1px solid white;
        opacity: 0;
        transform: scale(0);
        transition: opacity 0.35s, transform 0.35s;
    }

    .playa .texto h2 {
        margin-top: 10%;
        font-weight: 300;
        text-transform: uppercase;
        transform: translate3d(0, 100%, 0);
        transition: transform 0.35s;
        font-family: 'Playfair Display', serif;
        font-size: 150%;
    }

    .playa .texto h2 span {
        font-weight: 700;
    }

    .playa .texto p {
        padding: 10px 50px;
        opacity: 0;
        transform: scale(0);
        transition: opacity 0.35s, transform 0.35s;
        font-family: 'Playfair Display', serif;
        font-size: 20px;
        text-align: justify;
    }





    /***********************************pie*/

    footer {
        width: 100%;
        font-family: 'Playfair Display', serif;

    }

    .container1 {
        width: 100%;
        background: #272727;
        color: #fff;
    }

    .footer1 {
        width: 98%;
        max-width: 1000px;
        margin: auto;
        padding: 50px 0;
        display: flex;
        flex-wrap: wrap;
    }

    .pa {
        color: white;
        text-decoration: none;
    }

    .footer1 .footer2 {
        width: calc(100% / 3);
        text-align: justify;
    }


    .footer1 .footer2 h3 {
        font-size: 32px;
        color: #1CBACC;
        margin-bottom: 20px;
    }

    .footer1 .footer2 span p {
        display: inline-block;
        margin-left: 5px;
        margin-bottom: 15px;
        font-family: 'Playfair Display', serif;
    }

    .footer_redes {
        width: 100%;
        background: green;
        border-top: 3px solid #fff;
    }

    /***********************************iconos*/
    .main_redes {
        width: 98%;
        max-width: 1000px;
        padding: 15px 0;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        -ms-align-items: center;
        align-items: center;
    }

    .main_redes .footer_copy {
        width: 70%;
        color: #fff;
    }

    .main_redes .footer--redes {
        width: 30%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    /*.main_redes .footer--redes a {
    display: inline-block;
    text-decoration: none;
    width: 40px;
    height: 40px;
    line-height: 40px;
    border-radius:50%;
    background: #fff;
    color: #000;
    text-align: center;
    transition: transform .3s;
}*/

    /*#face:hover{
transform: scale(1.3);

}
#tw:hover{
transform: scale(1.3);
}
#you:hover{
transform: scale(1.3);

}
#ins:hover{
transform: scale(1.3);

}*/

    @media screen and (max-width: 750px) {

        .footer1 .footer2 {
            padding: 0 10px;
        }

        .footer1 .footer2 h3 {
            font-size: 28px;
        }

        .footer1 .footer2 p {
            font-size: 14px;
        }
    }

    @media screen and (max-width: 640px) {
        .footer1 {
            padding: 10px 0;
        }

        .footer1 .footer2 {
            width: 100%;
            text-align: center;
            margin: 10px 0;
        }

        .footer1 .footer2 h3 {
            margin-bottom: 5px;
        }

        .footer1 .footer2 span {
            display: block;
        }

        .main_redes .footer_copy {
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }

        /*.main_redes .footer--redes {
        width: 80%;
        margin: auto;
    }*/

    }

</style>