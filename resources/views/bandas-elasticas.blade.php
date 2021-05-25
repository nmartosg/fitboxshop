@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BANDAS ELASTICAS</title>

  <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
</head>

<body>
<!-- MUESTRA TODOS LOS PRODUCTOS DE LA CATEGORIA DE BANDAS ELASTICAS-->
<br>
  <div class="container">
    <div class="row">
      <br></br>
      <a class="text-white" href="{{ url('/home') }}" > &nbsp &nbsp INICIO &nbsp</a> / <a class="text-white" href="{{ url('/home#galeria') }}" >  &nbsp GALERIA &nbsp</a> / <a href="{{ url('/bandas-elasticas') }}" class="text-white" >&nbsp BANDAS ELASTICAS</a> 
      <br></br>
      <div class="container-fluid">
        <div class="row">
		      <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <h1 class="my-4">BANDAS ELASTICAS</h1>
              </div>
              <div class="col-md-6">
                <!-- BUSCADOR BANDAS ELASTICAS -->
                <form method="GET" action="" onSubmit="return validarForm(this)">
                  <br><br>
                    <input id="buscadorr" type="text" class="form-control" placeholder="Buscar Bandas Elasticas" name="buscarBandas" >
                    <input id="buscadorBoton" type="submit" value="BUSCAR" name="buscar" class="form-control" ></input>
                  </form>

                  <script type="text/javascript">
                    function validarForm(formulario){
                      if(formulario.buscarBandas.value.length==0) 
                      {
                        formulario.buscarBandas.focus();
                        alert('Introduce valores para buscar.');
                        return false; 
                      }  
                      return true 
                      }  
                  </script>
                </div>
              </div>
            </div>               
          </div>
        </div>
      </div>      


      <div class="col-lg-12">

        <div class="row">
          <?php  
            if(isset($_GET['buscar'])) {   
              require_once '../public/php/configDB.php';
              $usuarioId = Auth::user()->id;
              
              $conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("Error al conectar con la base de datos");
              $db = mysqli_select_db( $conexion, $basededatos ) or die ( "Error al conectar con la base de datos" );

              $buscar = $_GET["buscarBandas"];
              $consulta="SELECT  id,nom,descripcion,precio,img FROM productes WHERE  tipos='Bandas' and nom like '%%$buscar%%'";
              $resultado = mysqli_query( $conexion, $consulta ) or die ( "Error en la consulta de datos");
              
              while($columna = mysqli_fetch_array( $resultado )) {
          ?> 

          <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src=<?=$columna["img"]?> alt="">
            <div class="card-body">
              <h4 class="card-title">
                <label class="text-dark"><?=$columna["nom"]?></label>
              </h4>
              <h5 class="card-text text-dark"><?=$columna["descripcion"]?></h5>
              <p class="text-dark"><?=$columna["precio"]?> €</p>
            </div>
            <div class="card-footer">
            <button type="button" class="btn btn-primary">
              <a style="color:white;" href="../public/php/add.php?pedidoId=<?=$columna['id']?>&usuarioId=<?=$usuarioId?>">
              <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a>
            </button>
            </div>
          </div>
        </div>
          <?php 
            }
            if (mysqli_num_rows($resultado)==0) {           

              echo "<div class=' col-md-12 '>
                      <div class='card h-100'>
                        <div class='card-body' style='text-align:center;'>
                        <h4 class='card-title'>
                          <label class='text-dark'>NO SE HAN ENCONTRADO RESULTADOS</label>
                            </h4>
                          </div>
                        </div>
                      </div>";
            }
      }else{
      $usuarioId=Auth::user()->id;
          ?>  

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="../imatges/bandas/naranja.JPG" alt="banda naranja">
            <div class="card-body">
              <h4 class="card-title">
                <label class="text-dark">BANDA NARANJA</label>
              </h4>
              <h5 class="text-dark">Muy suave.</h5>
              <p class="card-text text-dark">10.00 €</p>
            </div>
            <div class="card-footer">
            <button type="button" product-id="13" class="btn btn-primary">
              <a style="color:white;" href="../public/php/add.php?pedidoId=13&usuarioId=<?=$usuarioId?>">
              <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a>
            </button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="../imatges/bandas/roja.JPG" alt="banda roja">
            <div class="card-body">
              <h4 class="card-title">
                <label class="text-dark">BANDA ROJA</label>
              </h4>
              <h5 class="text-dark">Suave.</h5>
              <p class="card-text text-dark">12.00 €</p>
            </div>
            <div class="card-footer">
            <button type="button" product-id="14" class="btn btn-primary">
              <a style="color:white;" href="../public/php/add.php?pedidoId=14&usuarioId=<?=$usuarioId?>">
              <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a>
            </button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
          <img class="card-img-top" src="../imatges/bandas/azul.JPG" alt="banda azul">
            <div class="card-body">
              <h4 class="card-title">
                <label class="text-dark">BANDA AZUL</label>
              </h4>
              <h5 class="text-dark">Medio.</h5>
              <p class="card-text text-dark">14.00 €</p>
            </div>
            <div class="card-footer">
            <button type="button" product-id="15" class="btn btn-primary">
              <a style="color:white;" href="../public/php/add.php?pedidoId=15&usuarioId=<?=$usuarioId?>">
              <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a>
            </button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
          <img class="card-img-top" src="../imatges/bandas/verde.JPG" alt="banda verde">
            <div class="card-body">
              <h4 class="card-title">
                <label class="text-dark">BANDA VERDE</label>
              </h4>
              <h5 class="text-dark">Fuerte.</h5>
              <p class="card-text text-dark">16.00 €</p>
            </div>
            <div class="card-footer">
            <button type="button" product-id="16" class="btn btn-primary">
              <a style="color:white;" href="../public/php/add.php?pedidoId=16&usuarioId=<?=$usuarioId?>">
              <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a>
            </button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
          <img class="card-img-top" src="../imatges/bandas/negra.JPG" alt="banda negra">
            <div class="card-body">
              <h4 class="card-title">
                <label class="text-dark">BANDA NEGRA</label>
              </h4>
              <h5 class="text-dark">Muy fuerte.</h5>
              <p class="card-text text-dark">18.00 €</p>
            </div>
            <div class="card-footer">
            <button type="button" class="btn btn-primary">
              <a style="color:white;" href="../public/php/add.php?pedidoId=17&usuarioId=<?=$usuarioId?>">
              <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a>
            </button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="../imatges/bandas/lila.JPG" alt="banda morada">
            <div class="card-body">
              <h4 class="card-title">
                <label class="text-dark">BANDA MORADA</label>
              </h4>
              <h5 class="text-dark">Ultrafuerte.</h5>
              <p class="card-text text-dark">20.00 €</p>
            </div>
            <div class="card-footer">
            <button type="button" class="btn btn-primary" >
              <a style="color:white;" href="../public/php/add.php?pedidoId=18&usuarioId=<?=$usuarioId?>">
              <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a>
            </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- Footer -->
<hr style="background: white;
  height: 1px;">
  <footer >
      <div class="col-sm-12">
          <br>
          <p style="color:white;
                      font-family:Helvetica; 
                      float:left; 
                      margin-top: 0.5rem;"> © 2021 | Web created by Noelia Martos García with Laravel </p>
          
          <p style="color:white;
                      font-family:Helvetica; 
                      float:right">
              <!-- link instagram -->
              <a href="https://www.instagram.com/fitboxshopp/">
              <i class="fab fa-instagram" style="color: white;
                                                  font-size: 40px;     
                                                  padding-right: 20px;"></i></a>

              <!-- link TWITTER -->
              <a href="https://twitter.com/">
              <i class="fab fa-twitter" style="color: white;
                                                  font-size: 40px;     
                                                  padding-right: 20px;"></i></a>
          
              <!-- link FACEBOOK -->
              <a href="https://www.facebook.com/">
              <i class="fab fa-facebook-f" style="color: white;
                                                  font-size: 40px;     
                                                  padding-right: 20px;"></i></a>
          </p>
      </div>
  </footer>
    <?php
      }
    ?>
</body>

</html>

@endsection