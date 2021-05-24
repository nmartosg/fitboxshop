<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FITBOX SHOP</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Implementacio del icones de bootstrap -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="alternate" title="Usando animaciones CSS" href="https://developer.mozilla.org/es/docs/Web/CSS/CSS_Animations/Using_CSS_animations" hreflang="es">
    
     
</head>

<body style="background-color:black;">
    <div id="app" style="z-index: 100;
                        background-color:black;
                        color: white">
        <nav class="navbar navbar-expand-md shadow-sm ">
            <div class="container">
              <!-- MARQUEEE IMAGEN EN MOVIMINETO -->
            <!-- <img src="../imatges/logo/logo_small_icon_only_inverted.png" alt="fitbox shop logo" style="width:40%" > -->
                <!-- <marquee width="100%" scrolldelay="100" scrollamount="5" direction="left" loop="2" behavior=alternate style="color:white;  margin-top:3px; font-family:Helvetica;"> -->
                    <a style="color:#FFF; font-size:23px;" class="navbar-brand" href="{{ url('/') }}"  >
                        <img class="imagen-movimiento" src="../imatges/logo/logo_small_icon_only_inverted.png" alt="fitbox shop logo"  height="10%" width="25%" > FITBOX SHOP
                    <!-- </marquee> -->
                    </a>
                <button style="background-color: #FFF;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon" ><i class="fas fa-caret-down m-1"></i></span>
                </button>
            
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <!-- LINK INICIO DE SESSION I CREACION -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color:white;">{{ __('INICIAR SESIÓN') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color:white;">{{ __('CREAR CUENTA') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:white; ">
                                    <i class="fas fa-user" style="font-size: 160%; padding-right: 6px; margin-top:1.5px;"></i> {{ Auth::user()->name }} <span class="caret"></span> 
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
                                <!-- SI ES ADMINISTRADOR TENDRA UNAS OPCIONES I SI ES CLIENTE TENDRA OTRAS -->
                                    <!-- ROL ADMINSITRADOR -->
                                    <?php
                                        $rol = Auth::user()->rol;
                                        if ($rol==1){
                                    ?>
                                        <a class="dropdown-item" href="{{ url('/administracion-de-la-web') }}">
                                             ADMINISTRAR
                                        </a>
                                    
                                    
                                    <!-- ROL CLIENTE -->
                                    <?php
                                        }else{
                                    ?>
                                    <a class="dropdown-item" href="{{ url('/cuenta') }}">
                                        MI PERFIL
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/misPedidos') }}">
                                        MIS PEDIDOS
                                    </a>
                                    
                                    <?php
                                    }
                                    ?>
                                    
                                    <!-- PARTE  COMPARTIDA PARA TODO TIPO DE ROLES -->
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                         CERRAR SESIÓN
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>   
                            </li>
                            
                            <li>
                                <a  href="{{ url('/cesta') }}" style="color:white;"><i class="fas fa-shopping-cart" style="font-size: 150%; margin-top:10px; padding-left:20px;"></i>     
                            </li>                           
                        @endguest
                    </ul>
                </div>
            </div>
            
        </nav>

        <!-- MENU -->
        <nav class="navbar navbar-light bg-muted  navbar-expand-md " role="navigation" style="width: 100%; background-color:black; border-top: solid white 2px; border-bottom: solid white 2px; " >
            <div class="container my-1"><br>
                <!-- <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
                &#x2630; <span class="sm-block">MENU</span></button> <a class="navbar-brand" href="#"></a> -->     
                    <ul class="nav navbar-nav" style="width:100%;">
                        <a href="{{ url('/home') }}" class="active nav-item" style="padding-right:75px;"> 
                            <button class="btn"  class="nav-link"  style="color:white; width:125%; font-size:18px;">INICIO</button>
                        </a>
                        <!-- Enlace que proviene de app.blade.php, es decir del navbar. -->
                        <a href="home/#galeria" class="nav-item" style="padding-right:75px;"> 
                            <button class="btn "   class="nav-link"  style="color:white; width:125%; font-size:18px; ">GALERIA</button>
                            <!-- <a href="home/#galeria">galeria</a>.  -->
                        </a>
                        <a href="{{ url('/sobremi') }}" class="nav-item" style="padding-right:75px;"> 
                            <button class="btn"   class="nav-link"  style="color:white; width:125%;  font-size:18px; ">SOBRE MI</button>
                        </a>
                        <a  href="{{ url('/contacto') }}" class="nav-item"style="padding-right:75px;" > 
                            <button class="btn" class="nav-link"  style="color:white; width:125%; font-size:18px; ">CONTACTO</button>
                        </a>
                    </ul>
            </div>
        </nav>

        <main class="py-4" style="margin-top:-25px;">
            @yield('content')
        </main>

    </div>
</body>
</html>
