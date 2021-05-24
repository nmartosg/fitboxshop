@extends('layouts.app')

@section('content')
<!-- VISTA DE MIS PEDIDOS -->
<body>
<div class="row">
		<div class="container">
      <div class="col-md-12 "><br>
        <a style="color:#F1F1F1;" href="{{ url('/home') }}" >INICIO &nbsp</a> / <a style="color:#F1F1F1;" href="{{ url('/misPedidos') }}" > &nbsp MIS &nbsp PEDIDOS &nbsp</a><br></br>
      </div>
  <?php
    require_once '../public/php/configDB.php';
    $id=Auth::user()->id;
    $conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("ERROR AL CONECTAR");
    $db = mysqli_select_db( $conexion, $basededatos ) or die ( "ERROR AL CONECTAR" );

    $pedidosrealizados=array();
    $consulta ="SELECT users_comandas.fid_Comanda
    FROM users,users_comandas,comandas
    WHERE users.id=$id
    AND users_comandas.fid_user=$id
    AND users_comandas.fid_Comanda=comandas.id";
    $resultado = mysqli_query( $conexion, $consulta ) or die ( "ERROR EN LA CONSULTA EN LA BD");
    
    while ($columna = mysqli_fetch_array( $resultado )){
      array_push($pedidosrealizados, $columna['fid_Comanda']);
    }
              
    //SI NO HAY PEDIDOS REALIZADOS SE MOSTRARA ESTA PARTE
    if (!$pedidosrealizados){
      
      echo "<div class=' col-md-12 '>
              <div class='card h-100'>
                <div class='card-body' style='text-align:center;'>
                  <h4 class='card-title'>
                    <label class='text-dark'>NO HA REALIZADO NINGUNA COMPRA EN LA WEB. <br> <br>SI QUIERES REALIZAR O VISUALIZAR PRODUCTOS CLICA EN IR A COMPRAR </label>
                  </h4>
                  <div class='card-body'>
                    <button type='button' class='btn btn-info'><a style='color:white;' href='../public/home'>IR A COMPRAR PRODUCTOS</a></button>                    
                  </div>
                </div>                  
              </div>
            </div>";

    
      // SINO SE MOSTRARAN TODOS LOS PEDIDOS
    }else{

      $resultado = mysqli_query( $conexion, $consulta ) or die ( "ERROR EN LA CONSULTA EN LA BD");
      echo "<div class='row'>";
      $columna = mysqli_fetch_array( $resultado );
      if (mysqli_num_rows($resultado)!=0) {

      }
      $i=0;

      while($i<sizeof($pedidosrealizados)){
        $pedido=$pedidosrealizados[$i];
        $consulta1="SELECT DISTINCT comandas.estadoPedido,comandas.precioTotal,users_comandas.data_Comanda
        FROM comandas,users_comandas,users 
        WHERE comandas.id=$pedido
        AND comandas.id=users_comandas.fid_Comanda
        AND users_comandas.fid_user=$id";
        $resultado1 = mysqli_query( $conexion, $consulta1 ) or die ( "ERROR EN LA CONSULTA EN LA BD");

        echo "<div class='container my-4' style='background:white;'>
              <div class='row'>
                <div class='col-lg-12'>
                </div>
              <br>
                <div class='col-md-10'>";
      
          while ($fechacomanda = mysqli_fetch_array( $resultado1 )){
            ?>                 
  
          <div class="row">
            <div class="col-lg-10">
              <h4 class="text-dark ml-4"><b><u>PEDIDOS REALIZADOS</u></b></h4>
              <div class='card-body text-dark'>
                <p><b>FECHA DE REALIZACIÓN DEL PEDIDO: </b><?=$newDate = date("d / m / Y", strtotime($fechacomanda['data_Comanda']));?></p>
                <p><b>PRECIO TOTAL: </b><?=$fechacomanda['precioTotal'] ?> €</p>

                  <?php
                  if (($fechacomanda['estadoPedido'])==1){
                    echo "<p><b>ESTADO DEL PEDIDO :</b> PAGADO </p>";
                  }else{
                    echo"<p><b>ESTADO DEL PEDIDO :</b> NO PAGADO </p>";
                  }
                  $consulta2="SELECT productes.nom,productes.img,comandas_productes.cantidad 
                  FROM productes,comandas_productes
                  WHERE comandas_productes.fid_Comanda=$pedido 
                  AND comandas_productes.fid_Producte=productes.id";
                  $resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "ERROR EN LA CONSULTA EN LA BD");
                  while ($columnaimagen = mysqli_fetch_array( $resultado2 )){
                    echo "<td> <b>PRODUCTO COMPRADO : </b>".$columnaimagen['nom']."<br><br><td><img style='height:150px; width: 220px;' src=".$columnaimagen['img']."></img></td><br><br>";
                  }
                    echo "</div> </div> </div><br>";
                  }  
                  ?>
              </div>
            </div>
          </div>
        <?php

      ++$i;
    }
  }
  mysqli_close( $conexion );
  ?>

</body>

@endsection