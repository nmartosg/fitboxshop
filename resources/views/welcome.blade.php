<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SHOPNOE</title>
    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="../public//css/welcome.css" />
    <link rel="alternate" title="Usando animaciones CSS" href="https://developer.mozilla.org/es/docs/Web/CSS/CSS_Animations/Using_CSS_animations" hreflang="es">
</head>
<body>
   <!-- PAGINA DE INICIO, LA CUAL TIENES QUE REGISTRARTE O BIEN ACCEDER PARA IR A LA PAGINA DE INICIO -->
<div class="row ">
    <div class="col-sm-12" >
        <div class="topPage">
            @if (Route::has('login'))
                <div class="top-right">
                    @auth
                        <a href="{{ url('/home') }}" style="font-family:Helvetica;">PÁGINA PRINCIPAL</a>
                    @else
                        <a href="{{ route('login') }}">INICIAR SESIÓN</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">CREAR CUENTA</a>
                        @endif
                    @endauth
                </div>
            @endif

            <!-- LOGO WEB -->
            <!-- <div class="logo"> -->
                <!-- <img src="../imatges/logo/logo_white_large.png" alt="fitbox shop logo"  style="" > -->
            <!-- </div> -->
            <br>
            <style>
                img {
                    animation-duration: 3s;
                    animation-name: slidein;
                }

                    @keyframes slidein {
                    from {
                        margin-left: 100%;
                        width: 60%
                    }

                    to {
                        margin-left: 0%;
                        width: 60%;
                    }
                    }
            </style>

            <img src="../imatges/logo/logo_white_large.png" alt="fitbox shop logo" style="width:60%" >
        </div>
    </div>
</div> 
</body>
</html>
