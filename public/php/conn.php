<?php
$usuario = "nmartos";
$password = "nmartos";
$servidor = "localhost";
$basededatos = "nmartos_shopNoe";
$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("ERROR AL CONECTAR");
$db = mysqli_select_db( $conexion, $basededatos ) or die ( "ERROR AL CONECTAR" );
                    
?>
