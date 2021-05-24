@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CREAR COMANADAS</title>
</head>
<body>


<div class="row">
  <div class="container-fluid">
    <div class="col-md-11 ml-5"><br>
        <a style="color:#F1F1F1;" href="{{ url('/home') }}" >INICIO &nbsp</a> / <a style="color:#F1F1F1;" href="{{ url('/administracion-de-la-web') }}" > &nbsp ADMINISTRACIÓN &nbsp</a>  / <a style="color:#F1F1F1;" href="{{ url('/comanda') }}" > &nbsp PEDIDOS &nbsp </a>   / <a style="color:#F1F1F1;" href=""> &nbsp CREAR PEDIDO</a> <br></br>
        <h3><b><u>CREAR NUEVA PEDIDO</u></b></h3><br>
    </div>
    <div class="col-md-11 ml-5" style="background-color:white;">
        <div class="table-container">
          <br>
          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>ERROR EN GUARDAR LOS CAMBIOS.</strong><br><br>
            <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
          @endif
          @if(Session::has('success'))
            <div class="alert alert-info">
              {{Session::get('success')}}
            </div>
          @endif

          <form method="POST"action="{{ route('comanda.store') }}" role="form">
            <!-- VALIDAR FORMULARIOS -->
            @csrf
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <label class="text-dark"><b>PRECIO TOTAL:</b></label> 
                <input type="text" name="precioTotal" id="precioTotal" class="form-control input-sm" placeholder="Precio total">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <label class="text-dark"> <b>ESTADO DEL PEDIDO: </b></label>
                <input type="text" name="estadoPedido" id="estadoPedido" class="form-control input-sm" placeholder="Estado del pedido : ( 0 en proceso, 1 finalizada )">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <i class="fas fa-folder-plus" style="color: black; font-size: 15px; position: absolute; left: 25px; padding-top: 10px;"></i>
              <input type="submit" value="CREAR NUEVO PEDIDO" class="btn btn-outline-success" style="color:black; padding-left: 40px;" >
            </div>
            <br></br></br>  
          </div>
        </form> 
      </div>
    </div>
  </div>
</div>


</body>

</html>

@endsection










