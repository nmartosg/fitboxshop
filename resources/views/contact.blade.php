
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="../public/css/contacto.css">
  <link rel="stylesheet" type="text/css" href="../public/css/styles.css"> 
</head>
<body>

<br></br>
<h1 class="h1form">FORMULARIO DE CONTACTO</h1>
<br><br>
<!-- PAGINA DE CONTACTO EN LA QUE EL USUARIO PUEDE ENVIAR UN CORREO ELECTRONICO A fitboxshopp@gmail.com DE MANERA AUTOMATICA SIN NECESIDAD DE IRSE A SU CORREO PROPIO -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12" style="border: solid white 1px; ">
                <br>
                    <h3 class="text-center text-white" >Envia un mensaje</h3>
                    <hr>
                    <form method="get" action="php/sendmail.php">
                    @csrf
                    <!-- RECOGO TODOS LOS CAMPOS , ES DECIR TODOS LOS VALOR PARA  A LA HORA DE ENVIAR DICHO CORREO LOS ENVIE CON EL -->
                        <input type="text" name="id" value="{{Auth::user()->id}}" hidden></input>
                        <input type="text" name="name" value="{{Auth::user()->name}}" hidden></input>
                        <input type="text" name="primerapellido" value="{{Auth::user()->primerapellido}}" hidden></input>
                        <input type="text" name="segundoapellido" value="{{Auth::user()->segundoapellido}}" hidden></input>
                        <input type="text" name="email" value="{{Auth::user()->email}}" hidden></input>
                        <input type="text" name="dni" value="{{Auth::user()->dni}}" hidden></input>
                        <p>
                        <label for="" style="color:white;">Tipo de asunto: &nbsp &nbsp  &nbsp  &nbsp</label>			
                            <select name="order" style=" height:54px; width:300px;" required>
                                <option value="Sin asunto "> &nbsp</option>
                                <option value="Pregunta">Pregunta</option>
                                <option value="Devolución" >Devolucion</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </p>
                        <p class="full-width">
                        <label for="" style="color:ehite;">Introduzca el texto a enviar:</label>
                        <textarea name="msg" id="" cols="30" rows="7" required></textarea>
                        </p>
                        <p class="full-width">
                        <input type="submit" name="submit" id="submit"></input>
                        </p>
                    </form>
                    <br>
				</div>
                <!-- UNICAMENTE DA INFORMACION ACERCA DEL CORREO ELECTRONICO -->
				<div class="col-md-12 mt-5" style="background-color:#E8E8E8; height:300px;">
                    <br>
                    <h3 class="text-center text-dark"><b>INFORMACIÓN DE CONTACTO</b></h3>
                    <hr>
                    <ul>
                        <li class="text-dark">Si requiere de ayuda o necesita infromación envia un correo electrónico al que aparece a continuación:</li><br></br>
                        <h2 class="text-dark"><i class="far fa-envelope"></i>&nbsp fitboxshopp@gmail.com</h2>
                    </ul>
				</div>
			</div>
		</div> 
        </div> 
        </div> 

<br>

    <hr style="background: white; height: 1px;">
    <!-- Footer -->
    <footer >
        <div class="col-sm-12">
            <br>
            <p style="float:left; 
                      margin-top: 0.5rem;"> © 2021 | Web created by Noelia Martos García with Laravel </p>
            
            <p style="float:right">
                <!-- link instagram -->
                <a href="https://www.instagram.com/fitboxshopp/">
                <i class="fab fa-instagram"></i></a>

                <!-- link TWITTER -->
                <a href="https://twitter.com/">
                <i class="fab fa-twitter"></i></a>
            
                <!-- link FACEBOOK -->
                <a href="https://www.facebook.com/">
                <i class="fab fa-facebook-f" ></i></a>
            </p>
        </div>
    </footer>
</body>


@endsection



