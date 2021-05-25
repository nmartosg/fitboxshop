@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EDITAR PRODUCTO</title>
</head>
<body>


<div class="row">
  <div class="container-fluid">
    <div class="col-md-11 ml-5"><br>
        <a style="color:#F1F1F1;" href="{{ url('/home') }}" >INICIO &nbsp</a> / <a style="color:#F1F1F1;" href="{{ url('/administracion-de-la-web') }}" > &nbsp ADMINISTRACIÓN &nbsp</a>  / <a style="color:#F1F1F1;" href="{{ url('/producte') }}" > &nbsp PRODUCTO &nbsp </a>   / <a style="color:#F1F1F1;" href=""> &nbsp EDITAR</a> <br></br>
        <h3><b><u>EDITAR PRODUCTO</u></b></h3><br>
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

          <form method="POST" action="{{ route('producte.update',$productes->id) }}" role="form">
            <!-- VALIDAR FORMULARIOS -->
            @csrf
            <!-- EDICIO DE LOS PRODUCTOS -->
            <input name="_method" type="hidden" value="PATCH">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <label class="text-dark"><b>NOMBRE DEL PRODUCTO:</b></label> 
                  <input type="text"name="nom" id="nom" class="form-control input-sm" value="{{$productes->nom}}">
                </div>
              </div>
            </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="text-dark"> <b>TIPOS DE PRODUCTO: </b></label>
                    <input type="text"name="tipos" id="tipos" class="form-control input-sm" value="{{$productes->tipos}}">
                  </div>
              </div>
            </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="text-dark"> <b>DESCRIPCIÓN DEL PRODUCTO: </b></label>
                    <textarea style="width:48%;"name="descripcion"class="form-control input-sm" placeholder="descripcion">{{$productes->descripcion}}</textarea>
                  </div>
              </div>
            </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="text-dark"> <b>PRECIO DEL PRODUCTO: </b></label>
                    <input type="text"name="precio" id="precio" class="form-control input-sm" value="{{$productes->precio}}">
                  </div>
              </div>
            </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="text-dark"> <b>IMAGEN DEL PRODUCTO: </b></label>
                    <input type="text"name="img" id="img" class="form-control input-sm" value="{{$productes->img}}">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 colmd-12">
                <div class="form-group">
                  <label class="text-dark"><b>PRODUCTOS EN CESTA:</b></label> 
                  <input type="text" name="productoCesta" id="productoCesta" class="form-control input-sm" placeholder="Productos en cesta, 0." value="{{$productes->productoCesta}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 colmd-12">
                <div class="form-group">
                  <label class="text-dark"><b>COMPARADOS:</b></label> 
                  <input type="text" name="comprado" id="comprado" class="form-control input-sm" placeholder="Comprados, 0" value="{{$productes->comprado}}">
                </div>
              </div>
            </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <i class='far fa-edit'  style="color: black; font-size: 15px; position: absolute; left: 25px; padding-top: 10px;"></i>
                    <input type="submit"  class="btn btn-outline-success" style="color:black; padding-left: 40px;" value="GUARDAR CAMBIOS"></input><br>
                  </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

</body>

</html>

@endsection

