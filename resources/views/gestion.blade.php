@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
  <title>GESTIÓN DE COMPRAS</title>
</head>

<body>
<!-- ESTA VISTA MUESTRA TODOS LOS PEDIDOS REALIZADOS POR LOS USUARIOS -->
<div class="row" id="tablas-movil"  >
        <div class="container-fluid">
            <div class="col-md-11 ml-5"><br>
                <a style="color:#F1F1F1;" href="{{ url('/home') }}" >INICIO &nbsp</a> / <a style="color:#F1F1F1;" href="{{ url('/administracion-de-la-web') }}" > &nbsp ADMINISTRACIÓN &nbsp</a>  / <a style="color:#F1F1F1;" href="" > &nbsp GESTIÓN DE COMPRAS</a> <br></br>
                <h3><b><u>GESTIÓN DE COMPRAS DE TODOS LOS CLIENTES</u></b></h3><br>
            </div>
            <div class="col-md-11 ml-5" style="background-color:white;">
                    <div class="table-container">
                        <table class="table table-bordred">
                        <br>
                        <thead class="text-center thead-light">
                            <tr>
                                <th style="border: 1px solid black">NOMBRE Y APELLIDOS DEL CLIENTE</th>
                                <th style="border: 1px solid black">DNI CLIENTE</th>
                                <th style="border: 1px solid black">CORREO ELECTRÓNICO DEL CLIENTE</th>
                                <th style="border: 1px solid black" >ID DEL PEDIDO</th>
                                <th style="border: 1px solid black">NOMBRE DEL PRODUCTO</th>
                                <th style="border: 1px solid black">CANTIDAD DE PRODUCTOS</th>
                                <th style="border: 1px solid black">PRECIO UNITARIO</th>
                                <!-- <th style="border: 1px solid black">PRECIO / PRODUCTO</th> -->
                                <th style="border: 1px solid black">PRECIO TOTAL PEDIDO</th>
                                <th style="border: 1px solid black" >FECHA DEL PEDIDO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require_once '../public/php/configDB.php';
                                $conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("ERROR AL CONECTAR");
                                $db = mysqli_select_db( $conexion, $basededatos ) or die ( "ERROR AL CONECTAR" );


                                $consulta ="SELECT users_comandas.fid_Comanda,users_comandas.data_Comanda,comandas.precioTotal,users.name,users.primerapellido, users.segundoapellido,users.dni,users.email,productes.nom,comandas_productes.cantidad,productes.precio 
                                FROM users_comandas,comandas,users,comandas_productes,productes 
                                WHERE users_comandas.fid_Comanda=comandas.id
                                AND users.id=users_comandas.fid_user
                                AND comandas_productes.fid_Comanda=comandas.id
                                AND comandas_productes.fid_Producte=productes.id
                                ORDER BY users_comandas.fid_Comanda";
                                
                                $resultado = mysqli_query( $conexion, $consulta ) or die ( "ERROR EN LA CONSULTA EN LA BD");

                                while($columna = mysqli_fetch_array( $resultado )) {
                            ?>

                            <tr class="text-center">
                                <td style="border: 1px solid black"><?=$columna['name']?> <?=$columna['primerapellido']?> <?=$columna['segundoapellido']?></td>
                                <td style="border: 1px solid black"><?=$columna['dni']?></td>
                                <td style="border: 1px solid black"><?=$columna['email']?></td>
                                <td style="border: 1px solid black"><?=$columna['fid_Comanda']?></td>
                                <td style="border: 1px solid black"><?=$columna['nom']?></td>
                                <td style="border: 1px solid black"><?=$columna['cantidad']?></td>
                                <td style="border: 1px solid black"><?=$columna['precio']?> €</td>
                                <td style="border: 1px solid black"><b><?=$columna['precioTotal']?> €</b></td>
                                <td style="border: 1px solid black"><?=$newDate = date("d / m / Y", strtotime($columna['data_Comanda']));?></td>
                       
                            </tr>
                                <?php
                                }
                                ?>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection