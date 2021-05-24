@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SOBRE MI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<!-- PAGINA DE INFORMACION SOBRE MI -->
    <div class="row justify-content-center">
        <div class="col-md-9" style="color:white;text-align:center;">
        <br></br><h1><b>SOBRE MI</b></h1><br>
            <p class="text-center" style="font-size:16px;">Soy una estudiante de segundo año del ciclo superior de desarrollo de aplicaciones web (DAW), en el instituto Joaquim Mir de Vilanova i la Geltrú. </p>
            <p class="text-center" style="font-size:16px;"> El cual estoy haciendo un proyecto con las tecnologías aprendidas, el objetivo es acabar el grado con el fin de entrar al sector informático o bien seguir formándome.</p>
            <p class="text-center" style="font-size:16px;">Las tecnologías aprendidas a lo largo del grado son JavaScript, jQuery, C#, PHP, Vue, Pyhton, MySQL, Laravel. Como también la maquetación con Bootstrap y el lenguaje de CSS, SASS y LESS. </p>
            <p class="text-center" style="font-size:16px;"> Esta es una web para todo tipo de personas las cuales les gusta el tema fitness, lo cual en esta página podrán encontrar diferentes categorías para el deporte. </p>
            <p class="text-center" style="font-size:16px;"> Para contactar conmigo puede hacerlo o bien enviando un correo a <a href="">fitboxshopp@gmail.com</a> o a través de la <a href="{{ url('/contacto') }}"> página de contacto.
                <br></br>
			</p><img alt="Imagen sobre mi" src="../imatges/logo/logo_small_icon_only.png" class="rounded" height=130px; width=130px; />
		</div>
	</div><br>

      
   
  <hr style="background: white;
    height: 1px;">
    <!-- Footer -->
    <footer >
        <div class="col-sm-12">
            <br>
            <p style="color:white;
                        font-family:Helvetica; 
                        float:left; 
                        margin-top: 0.5rem;"> © 2021 | Web created by Noelia Martos García with Laravel </p>
            
            <p style="color:white;
                        font-family:Helvetica; 
                        float:right">
                <!-- link instagram -->
                <a href="https://www.instagram.com/fitboxshopp/">
                <i class="fab fa-instagram" style="color: white;
                                                    font-size: 40px;     
                                                    padding-right: 20px;"></i></a>

                <!-- link TWITTER -->
                <a href="https://twitter.com/">
                <i class="fab fa-twitter" style="color: white;
                                                    font-size: 40px;     
                                                    padding-right: 20px;"></i></a>
            
                <!-- link FACEBOOK -->
                <a href="https://www.facebook.com/">
                <i class="fab fa-facebook-f" style="color: white;
                                                    font-size: 40px;     
                                                    padding-right: 20px;"></i></a>
            </p>
        </div>
    </footer>
</body>
</html>
@endsection