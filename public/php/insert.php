<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body style="background-color:black;">
<?php
    $value=($_GET['value']);
    $usuarioId=($_GET['usuarioId']);
    $state=1;
    $dia=date('Y-m-d', strtotime('now'));
    
    require_once 'configDB.php';
            
    $conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("ERROR AL CONECTAR");
    $db = mysqli_select_db( $conexion, $basededatos ) or die ( "ERROR AL CONECTAR" );

           
    $consulta = "SELECT max(id)as id2 FROM comandas";
    $resultado = mysqli_query( $conexion, $consulta ) or die ( "ERROR EN LA CONSULTA EN LA BD");
    while ($columna = mysqli_fetch_array( $resultado ))
    {
        $id=$columna['id2'];
        $pedidoId=($id+1);
    }
    
    $consultainsert = "INSERT INTO comandas (id,precioTotal,estadoPedido) VALUES ($pedidoId,$value,$state)";
    $resultadoinsert = mysqli_query( $conexion, $consultainsert ) or die ( "ERROR EN LA CONSULTA EN LA BD");

    $consultainsert1 = "INSERT INTO users_comandas (fid_user,fid_Comanda,data_Comanda) VALUES ($usuarioId,$pedidoId,'$dia')";
    $resultadoinsert1 = mysqli_query( $conexion, $consultainsert1 ) or die ( "ERROR EN LA CONSULTA EN LA BD");

    $consultaprod = "SELECT idprod,cantidad FROM carro WHERE iduser=$usuarioId";
    $resultadoprod = mysqli_query( $conexion, $consultaprod ) or die ( "ERROR EN LA CONSULTA EN LA BD");

    
    while ($columna = mysqli_fetch_array( $resultadoprod )){
      $prod=$columna['idprod'];
      $cantidad=$columna['cantidad'];
      $consultainsert2 = "INSERT INTO comandas_productes (fid_Comanda,fid_Producte,cantidad) VALUES ($pedidoId,$prod,$cantidad)";
      $resultadoinsert2 = mysqli_query( $conexion, $consultainsert2 ) or die ( "ERROR EN LA CONSULTA EN LA BD");

      $updateinsert="UPDATE productes SET comprado=comprado+$cantidad WHERE  id=$prod";
      $resultadoinsert=mysqli_query( $conexion, $updateinsert ) or die ( "ERROR EN LA CONSULTA EN LA BD");
    } 

    $consultadelete = "DELETE FROM carro WHERE iduser=$usuarioId";
    $resultadodeleter = mysqli_query( $conexion, $consultadelete ) or die ( "ERROR EN LA CONSULTA EN LA BD");

    mysqli_close( $conexion );

    
?>
<script type="text/javascript">
  window.location="../public/php/sendmail.php?insert=1&usuarioId=<?=$usuarioId?>&dia=<?=$dia?>&value=<?=$value?>&pedidoId=<?=$pedidoId?>&pedido=Pedido";
</script>
</body>
</html>