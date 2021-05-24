<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body style="background-color:black;">
<!-- AÑADIR PRODCUTOS A LA CESTA -->
<?php
    $pedidoId=($_GET['pedidoId']);
    $usuarioId=($_GET['usuarioId']);

    require_once 'configDB.php';
            
    $conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("ERROR AL CONECTAR");
    $db = mysqli_select_db( $conexion, $basededatos ) or die ( "ERROR AL CONECTAR" );


    $registro="SELECT * FROM carro WHERE iduser=$usuarioId AND idprod=$pedidoId";
    $resultado = mysqli_query( $conexion, $registro ) or die ( "ERROR EN LA CONSULTA EN LA BD");

    if (mysqli_num_rows($resultado)==0) { 

    $consultainsert = "INSERT INTO carro (iduser,idprod) VALUES ($usuarioId,$pedidoId)";
    $resultadoinsert = mysqli_query( $conexion, $consultainsert ) or die ( "ERROR EN LA CONSULTA EN LA BD");
    $updateadd="UPDATE productes SET productoCesta=1 WHERE id=$pedidoId";
    $resultadoadd=mysqli_query( $conexion, $updateadd ) or die ( "ERROR EN LA CONSULTA EN LA BD");
    }else{
      $update="UPDATE carro SET cantidad=1 WHERE iduser=$usuarioId AND idprod=$pedidoId";
      $resultado = mysqli_query( $conexion, $update ) or die ( "ERROR EN LA CONSULTA EN LA BD");
      $updateadd2="UPDATE productes SET productoCesta=productoCesta+1 WHERE  id=$pedidoId";
      $resultadoadd2=mysqli_query( $conexion, $updateadd2 ) or die ( "ERROR EN LA CONSULTA EN LA BD");
    }

    mysqli_close( $conexion );

    
?>
<!-- SI TODO ESTA OKEY, REDIRIGIR A LA CESTA -->
<script type="text/javascript">
   window.location="../cesta";
</script>
</body>
</html>