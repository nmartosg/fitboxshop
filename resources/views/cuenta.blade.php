@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>CUENTA</title>
    <link rel="stylesheet" type="text/css" href="/shopNoe/public/css/styles.css">
</head><br>
	<body>
	<!-- VISTA SOBRE LA INFROMACION DE MI PERFIL -->
	<div class="row">
		<div class="container">
			<div class="col-md-11 ">
				<a style="color:#F1F1F1;" href="{{ url('/home') }}" >INICIO &nbsp</a> / <a style="color:#F1F1F1;" href="{{ url('/cuenta') }}" > &nbsp MI PERFIL &nbsp</a><br></br>
			</div><br>
			<div class="col-md-11 ml-3" style="background-color:white;">
				<div class="table-container">
					<table id="tableinfo" class="table table-bordred ">
					<br>
					<div class="card-title text-center">
						<label class="col-lg-3" style="font-size:22px; color:black;"><b>MI PERFIL</b></label>
					</div>
					<div class="card-body">
						<form class="form" role="form" autocomplete="off" action="">
							<!-- <div class="row">
								<label class="col-lg-3 text-dark" style="font-weight: bold;">ID</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" value="{{Auth::user()->id}}" readonly="true">
								</div>
							</div><hr> -->
							<div class="row">
								<label class="col-lg-3 text-dark" style="font-weight: bold;">NOMBRE</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" value="{{Auth::user()->name}}" readonly="true" >
								</div>
							</div><hr>
							<div class="row">
								<label class="col-lg-3 text-dark" style="font-weight: bold;">PRIMER APELLIDO</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" value="{{Auth::user()->primerapellido}}" readonly="true">
								</div>
							</div><hr>
							<div class="row">
								<label class="col-lg-3 text-dark" style="font-weight: bold;">SEGUNDO APELLIDO</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" value="{{Auth::user()->segundoapellido}}" readonly="true">
								</div>
							</div><hr>
							<div class="row">
								<label class="col-lg-3 text-dark" style="font-weight: bold;">DNI</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" value="{{Auth::user()->dni}}" readonly="true">
								</div>
							</div><hr>
							<div class="row">
								<label class="col-lg-3 text-dark" style="font-weight: bold;">EMAIL</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" value="{{Auth::user()->email}}" readonly>
								</div>
							</div><hr>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>


@endsection