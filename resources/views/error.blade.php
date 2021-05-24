@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PAGINA DE ERROR STRIPE</title>
	<link href="https://fonts.googleapis.com/css?family=Muli:400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">


</head>

<body>
<!-- VISTA PARA CUANDO HAYA UIN PROBLEMA CON LA TARJETA INTRODUCIDA POR EL USUARIO -->
	<br></br>
	<center>
		<div class="col-md-8"  style="background-color:white; "><br>
			<h2 class="text-dark">HA OCURRIDO UN ERROR CON LA TARJETA INTRODUCIDA</h2><br>
			<a href="../public/home"><button type="button" class="btn btn-info">VOLVER A LA PÁGINA DE INICIO</button><br></a><br>
		</div>
	</center>
</body>

</html>
@endsection