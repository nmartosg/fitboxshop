@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CESTA</title>
        </head>
<body>
<div class="container mb-4">
    <div class="container" >
        <div class="col-md-12 "><br>
            <a style="color:#F1F1F1;" href="{{ url('/home') }}" >INICIO &nbsp</a> / <a style="color:#F1F1F1;" href="{{ url('/cesta') }}" > &nbsp MI &nbspCESTA &nbsp</a><br></br>
        </div>
    <div class="row">
        <div class="col-12" style="background-color: white;">
            <div class="table-responsive">
                <table class="table table-striped">
                
                    <?php
                    require_once '../public/php/configDB.php';
                    
                    $usuarioId = Auth::user()->id; 
                    $preciototal=0;
                    
                    $conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("ERROR AL CONECTAR");
                    $db = mysqli_select_db( $conexion, $basededatos ) or die ( "ERROR AL CONECTAR" );

                    // COMPRUEBA SI HAY PRODUCTOS EN EL CARRO, SI HAY LOS MUESTRA SINO MUESTRA UNA VISTA CONFORME NO HAY PRODUCTO EN LA CESTA
                    $consulta = "SELECT carro.id,productes.productoCesta,productes.nom,productes.descripcion,productes.precio,productes.img FROM productes,carro WHERE productes.id=carro.idprod AND carro.iduser=$usuarioId";
                    $resultado = mysqli_query( $conexion, $consulta ) or die ( "ERROR EN LA CONSULTA EN LA BD");

                    $columna = mysqli_fetch_array( $resultado );
                    if (mysqli_num_rows($resultado)==0) { 
                        echo "  <div class='container-fluid my-4'>
                                    <div class='row'>
                                        <div class='col-lg-12' style='background-color:white;'>
                                            <br>
                                            <center>
                                            <label style='text-align:center;color:red;font-size: 20px;'> CESTA VACÍA. <br>PULSA EN &nbsp<u>EN COMPRAR</u>&nbsp PARA PROCEDER AL PEDIDO. </label><br></br>
                                            <button style='height:50px; width:300px; background-color: black;' class='btn btn-block'><a style='font-size:20px; color:white;' href='../public/home#galeria'>IR A COMPRAR</a></button></br>
                                            </center>
                                        </div>
                                    </div>
                                </div>";
                    }else{
                        echo "<br>
                        <div class='col-md-11' style='background-color:white;'>
                            <div class='table-container' > 
                            <table class='table table-bordred' style='background-color:white;'>
                                <thead class='text-center thead-light'>
                                    <tr class='text-center'>
                                        <th style='border: 1px solid black'>IMAGEN DEL PRODUCTO</th>
                                        <th style='border: 1px solid black'>PRODUCTO</th>
                                        <th style='border: 1px solid black' class='text-center'>CANTIDAD</th>
                                        <th style='border: 1px solid black' class='text-center'>PRECIO UNITARIO</th>
                                        <th style='border: 1px solid black'>ELIMINAR PRODUCTOS </th>
                                    </tr>
                                </thead>    
                            <tbody>
                        </div>";

                        $resultado = mysqli_query( $conexion, $consulta ) or die ( "ERROR EN LA CONSULTA EN LA BD");
                        while ($columna = mysqli_fetch_array( $resultado ))
                        {
                        $preciototal=$preciototal+($columna['precio']*$columna['productoCesta']);
                    ?>
                        <tr>
                            <td style='border: 1px solid black' class="text-center"><p ><img src="<?=$columna['img']?>" style="height:120px; width:170px;"></p> </td>
                            <td style='border: 1px solid black' class="text-center"><p class="mt-4"><b><?=$columna['nom']?></b><br><?=$columna['descripcion']?></p></td>
                            <td style='border: 1px solid black' class="text-center"><p class="mt-5"><?=$columna['productoCesta']?></p></td>
                            <td style='border: 1px solid black' class="text-center"><p class="mt-5"><?=$columna['precio']?> €</p></td>
                            <td style='border: 1px solid black; width:19%;' class="text-center "><p class="mt-4"><button class="btn btn-xs"><a style="color:black; font-size:22px;" href="../public/php/delete.php?pedidoId=<?=$columna['id']?>&usuarioId=<?=$usuarioId?>"><i class="fa fa-trash"></i> </button> </p></td>
                        </tr>
                        
                            <?php
                            }

                            ?>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="border: white;"></td>
                            <td style="border: white;"></td>
                            <td style="border: white;"></td>
                            <td colspan="2"class=" text-dark " style="font-size:18px; text-align:center; border:white; border-radius: 20px; background-color: orange; "><b>  IMPORTE TOTAL : &nbsp&nbsp<?=$preciototal?> € &nbsp&nbsp&nbsp&nbsp</b></td>
                        </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col mb-2"><br><br>
                    <div class="row">
                        <div class="col-sm-12  col-md-6 text-right">
                            <button class="btn btn-block btn-light" style="height:50px;font-size:20px;"><a style="color:black;" href="../public/home#galeria">SEGUIR COMPRANDO</a></button>
                        </div>
                        <div class="col-sm-12 col-md-6 text-right">
                            <button class="btn btn-lg btn-block " style=" background-color:orange; height:50px; font-size:20px;"><a style="color:black;" href="../public/php/index.php?usuarioId=<?=$usuarioId?>&value=<?=$preciototal?>"><i class="fas fa-receipt"></i> PAGAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php
            }
            mysqli_close( $conexion );
            ?>
</body>

</html>

@endsection