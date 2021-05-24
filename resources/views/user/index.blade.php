@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
  <title>CLIENTES</title>
</head>

<body>
<!-- MUESTRA TODOS LOS CLIENTES REGISTRADOS EN LA WEB -->
    <div class="row" id="tablas-movil-clientes">
        <div class="container-fluid">
            <div class="col-md-11 ml-5"><br>
                <a style="color:#F1F1F1;" href="{{ url('/home') }}" >INICIO &nbsp</a> / <a style="color:#F1F1F1;" href="{{ url('/administracion-de-la-web') }}" > &nbsp ADMINISTRACIÓN &nbsp</a>  / <a style="color:#F1F1F1;" href="{{ url('/user') }}" > &nbsp CLIENTES</a> <br></br>
                <h3><b><u>INFORMACIÓN DE LOS CLIENTES REGISTRADOS</u></b></h3><br>
            </div>
            <div class="col-md-11 ml-5" style="background-color:white;">
                    <div class="table-container">
                        
                        <table id="tableinfo" class="table table-bordred ">
                            <br>
                            <thead class=" text-center thead-light ">
                                <th style="border: 1px solid black">ID</th>
                                <th style="border: 1px solid black">NOMBRE</th>
                                <th style="border: 1px solid black;">PRIMER APELLIDO</th>
                                <th style="border: 1px solid black;">SEGUNDO APELLIDO</th>
                                <th style="border: 1px solid black">DNI</th>
                                <th style="border: 1px solid black">EMAIL</th>
                                <th style="border: 1px solid black;" class=" ">ADMINSITRADOR  &nbsp<i class="fas fa-users-cog"></i> &nbsp / &nbsp USUARIO  &nbsp<i class='fas fa-user'></i> </th>
                                <!-- <th style="border: 1px solid black;">ELIMINAR</th> -->
                            </thead>
                          
                            <tbody>
                                @if($users->count())
                                    @foreach($users as $user)
                                    <tr class="text-center">
                                        <td style="border: 1px solid black">{{$user->id}}</td>
                                        <td style="border: 1px solid black">{{$user->name}}</td>
                                        <td style="border: 1px solid black">{{$user->primerapellido}}</td>
                                        <td style="border: 1px solid black">{{$user->segundoapellido}}</td>
                                        <td style="border: 1px solid black">{{$user->dni}}</td>
                                        <td style="border: 1px solid black">{{$user->email}}</td>
                                        <?php
                                            $rol="{$user->rol}";
                                            if($rol==0){
                                                echo"<td style='border: 1px solid black'> <center> <i class='fas fa-user' style='font-size: 20px; color:blue;'></i></center></td>";
                                            }else{
                                                echo"<td style='border: 1px solid black'> <center><i class='fas fa-users-cog ' style='font-size: 20px; color:black;'></i></center></td>";
                                            }
                                        ?>
                                    </tr>
                                    @endforeach 
                                @else
                                 <tr>
                                        <td colspan="8">No hay usuarios registrados en la web.</td>
                                    </tr>
                                    @endif 
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
                <!-- PARA VISUALIZAR LAS DIFERENTES PANTLLAS, YA QUE NO SALEN TODOS LOS PEDIDOS EN LAS MISMAS -->
                <div class="row">
                    <div class=" ml-5"><br>
                        <p> {{ $users->links() }} </p>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>

@endsection


