@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PEDIDOS</title>
</head>
<body>
<div class="row">
    <div class="container-fluid">
        <div class="col-md-11 ml-5"><br>
            <a style="color:#F1F1F1;" href="{{ url('/home') }}" >INICIO &nbsp</a> / <a style="color:#F1F1F1;" href="{{ url('/administracion-de-la-web') }}" > &nbsp ADMINISTRACIÓN &nbsp</a>  / <a style="color:#F1F1F1;" href="{{ url('/comanda') }}" > &nbsp PEDIDOS</a> <br></br>
            <h3><b><u>INFORMACIÓN DE PEDIDOS REGISTRADOS</u></b></h3><br>
        </div>

        <div class="col-md-11 ml-5" style="background-color:white;">
            <div class="table-container">
                <table id="tableinfo" class="table table-bordred ">
                    <br>
                    <thead class=" text-center thead-light ">
                        <th style="border: 1px solid black">ID</th>
                        <th style="border: 1px solid black">PRECIO TOTAL</th>
                        <th style="border: 1px solid black">ESTADO DEL PEDIDO</th>
                        <th style="border: 1px solid black">EDITAR</th>
                        <th style="border: 1px solid black">ELIMINAR</th>
                    </thead>
                    <tbody>
                        @if($comandas->count())
                            @foreach($comandas as $comanda)
                            <tr class="text-center">
                                <td style="border: 1px solid black">{{$comanda->id}}</td>
                                <td style="border: 1px solid black">{{$comanda->precioTotal}} €</td>
                            <?php
                                $state="{$comanda->estadoPedido}";
                                if($state==0){
                                    echo"<td style='border: 1px solid black'>
                                            <i style='color:orange;' class='fas fa-spinner'></i>
                                        </td>";
                                }else{
                                    echo"<td style='border: 1px solid black'>
                                            <i style='color:green;' class='fas fa-check-circle'></i>
                                        </td>";
                                } 
                            ?>
                            <td style="border: 1px solid black">
                                <a class="btn btn-xs" href="{{action( [App\Http\Controllers\ComandaController::class, 'edit'], $comanda->id)}}" >
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td style="border: 1px solid black">
                                <form action="{{action( [App\Http\Controllers\ComandaController::class, 'destroy'], $comanda->id)}}" method="post">
                                <!-- VALIDAR FORMULARIOS -->
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-xs" type="submit">
                                <i class="fas fa-trash-alt"></i>
                                </button>
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
                <a href="{{ route('comanda.create') }}" class="btn btn-outline-success text-dark" ><b>AÑADIR PEDIDO &nbsp <i class="fas fa-folder-plus"></i></b></a>
            </div>
        </div>
        <br>         
    </div>
  <!-- PARA VISUALIZAR LAS DIFERENTES PANTLLAS, YA QUE NO SALEN TODOS LAS COMANDAS EN LAS MISMAS -->
  <div class="row">
    <div class="container-fluid">
        <div class=" ml-5"><br>
            <p> {{ $comandas->links() }} </p>
        </div>
    </div>
</div>
</div>

 

</body>

</html>

@endsection


