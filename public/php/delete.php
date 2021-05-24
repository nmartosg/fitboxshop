<!DOCTYPE html>
<html lang="en">

<head>
</head>
<!-- ELIMINAR ARCHIVOS DE LA CESTA -->

<body style="background-color:black;">
<?php
    $pedidoId=($_GET['pedidoId']);
    $usuarioId=($_GET['usuarioId']);
    
    
    //MOSTRAR ULTIMO ID COMANDA
    require_once 'configDB.php';
            
    $conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("ERROR AL CONECTAR");
    $db = mysqli_select_db( $conexion, $basededatos ) or die ( "ERROR AL CONECTAR" );

    $consultaborrar = "DELETE FROM carro WHERE carro.id=$pedidoId";
    $resultadoinsert = mysqli_query( $conexion, $consultaborrar ) or die ( "ERROR EN LA CONSULTA EN LA BD");


    mysqli_close( $conexion );

    
?>
<script type="text/javascript">
  window.location="../cesta";
</script>
</body>
</html>