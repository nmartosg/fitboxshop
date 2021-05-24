@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
  
  <title>PRODUCTO</title>
  
</head>
<body>
<!-- MUESTRA TODOS LOS PRODCUTOS DISPONIBLES DE LA WEB -->
<div class="row" id="movil-tabla-producto">
    <div class="container-fluid">
        <div class="col-md-11 ml-5"><br>
            <a style="color:#F1F1F1;" href="{{ url('/home') }}" >INICIO &nbsp</a> / <a style="color:#F1F1F1;" href="{{ url('/administracion-de-la-web') }}" > &nbsp ADMINISTRACIÓN &nbsp</a>  / <a style="color:#F1F1F1;" href="{{ url('/producte') }}" > &nbsp PRODUCTOS</a> <br></br>
            <h3><b><u>INFORMACIÓN DE LAS PRODUCTOS DE LA WEB</u></b></h3><br>
        </div>

        <div class="col-md-11 ml-5" style="background-color:white;">
            <div class="table-container">
                <table id="tableinfo" class="table table-bordred ">
                    <br>
                    <thead class=" text-center thead-light ">
                    <th style="border: 1px solid black">ID</th>
                    <th style="border: 1px solid black">NOMBRE DEL PRODUCTO</th>
                    <th style="border: 1px solid black">DESCRIPCIÓN</th>
                    <th style="border: 1px solid black">TIPO</th>
                    <th style="border: 1px solid black; width:15%;">PRECIO UNITARIO</th>
                    <th style="border: 1px solid black">EDITAR</th>
                    <th style="border: 1px solid black">ELIMINAR</th>
                </thead>
                <tbody>
                    @if($productes->count())
                        @foreach($productes as $producte)
                        <tr class="text-center">
                            <td style="border: 1px solid black">{{$producte->id}}</td>
                            <td style="border: 1px solid black">{{$producte->nom}}</td>
                            <td style="border: 1px solid black">{{$producte->descripcion}}</td>
                            <td style="border: 1px solid black">{{$producte->tipos}}</td>
                            <td style="border: 1px solid black">{{$producte->precio}} €</td>
                            <td style="border: 1px solid black">
                                <a class="btn btn-xs" href="{{action( [App\Http\Controllers\ProducteController::class, 'edit'], $producte->id)}}" >
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>

                            <td style="border: 1px solid black">
                                <form action="{{action([App\Http\Controllers\ProducteController::class, 'destroy'], $producte->id)}}" method="post">
                                <!-- VALIDAR FORMULARIOS -->
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-xs" type="submit">
                                    <i class="fas fa-trash-alt"></i>
                                </form>
                            </td>
                        </tr>
                        @endforeach 
                            @else
                                <tr>
                                    <td colspan="8">No hay registro !!</td>
                                        </tr>
                            @endif
                                @if (Session::has('create'))
                                    <div class="alert alert-primary">
                                        {{Session::get('create')}}
                                    </div>
                                @endif
                                @if (Session::has('update'))
                                <div class="alert alert-info">
                                    {{Session::get('update')}}
                                </div>
                                @endif
                                @if (Session::has('delete'))
                                <div class="alert alert-success">
                                    {{Session::get('delete')}}
                                </div>
                                @endif
                        </tbody>
                </table>
                <div class="btn-group">
                    <a href="{{ route('producte.create') }}"  class="btn btn-outline-success text-dark" ><b>AÑADIR PRODUCTO &nbsp <i class="fas fa-folder-plus"></i></a>
                </div>
            </div>
            <br>
        </div>

  </div>
</div>
         <!-- PARA VISUALIZAR LAS DIFERENTES PANTLLAS, YA QUE NO SALEN TODOS LAS COMANDAS EN LAS MISMAS -->
<br>
<div class="row">
    <div class="container-fluid">
        <div class=" ml-5"><br>
            <p> {{ $productes->links() }} </p>
        </div>
    </div>
</div>



</body>

</html>

@endsection
