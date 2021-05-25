@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DISCOS</title>
    
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  </head>

<body>
<!-- MUESTRA TODOS LOS PRODUCTOS DE LA CATEGORIA DE BARRAS OLIMPICAS-->
<br>
  <div class="container">
    <div class="row">
    <a class="text-white" href="{{ url('/home') }}" >&nbsp &nbsp INICIO &nbsp</a> / <a class="text-white" href="{{ url('/home#galeria') }}" >  &nbsp GALERIA &nbsp</a> / <a href="{{ url('/barras-olimpicas') }}" class="text-white" > &nbsp BARRAS OLÍMPICAS</a> 
    <br></br>
      <div class="container-fluid">
        <div class="row">
		      <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <h1 class="my-4">BARRAS OLÍMPICAS</h1>
              </div>
              <div class="col-md-6">
                <!-- BUSCADOR BARRAS -->
                <form method="GET" action="" onSubmit="return validarForm(this)">
                  <input id="buscadorr" type="text" class="form-control" placeholder="Buscar Barras" name="buscadorProducto">
                  <input id="buscadorBoton" type="submit" value="BUSCAR" name="buscar"class="form-control"></input>
                </form>

                <script type="text/javascript">
                  function validarForm(formulario){
                    if(formulario.buscadorProducto.value.length==0) {
                        formulario.buscadorProducto.focus();
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

            $buscar = $_GET["buscadorProducto"];
            $consulta="SELECT  id,nom,descripcion,precio,img FROM productes WHERE  tipos='Barras' and nom like '%%$buscar%%'";
            $resultado = mysqli_query( $conexion, $consulta ) or die ( "Error en la consulta de datos");
            
          while($columna = mysqli_fetch_array( $resultado )) 
          {
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
        <button type="button" class="btn btn-primary"><a style="color:white;" href="../public/php/add.php?pedidoId=<?=$columna['id']?>&usuarioId=<?=$usuarioId?>"> <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a></button>
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
            <img class="card-img-top" src="../imatges/barras/Bright-zinc.JPG" alt="">
            <div class="card-body">
              <h4 class="card-title">
                <label class="text-dark">ROGUE OLYMPIC WEIGHTLIFTING BAR - BRIGHT ZINC</label>
              </h4>
              <h5 class="text-dark">Halterofilia olímpica, 20kg, 28 mm</h5>
              <p class="card-text text-dark">525.00 €</p>
            </div>
            <div class="card-footer">
              <button type="button" product-id="5" class="btn btn-primary"><a style="color:white;" href="../public/php/add.php?pedidoId=5&usuarioId=<?=$usuarioId?>">
              <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a></button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="../imatges/barras/cerakote.JPG" alt="">
            <div class="card-body">
              <h4 class="card-title">
                <label class="text-dark">THE OHIO BAR - CERAKOTE</label>
              </h4>
              <h5 class="text-dark">Multiusos, 20kg, 28.5 mm</h5>
              <p class="card-text text-dark">360.00 €</p>
            </div>
            <div class="card-footer">
              <button type="button" product-id="6" class="btn btn-primary"><a style="color:white;" href="../public/php/add.php?pedidoId=6&usuarioId=<?=$usuarioId?>">
              <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a></button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="../imatges/barras/black-zinc.JPG" alt="">
            <div class="card-body">
              <h4 class="card-title">
                <label class="text-dark">THE OHIO BAR - BLACK ZINC</label>
              </h4>
              <h5 class="text-dark">Multiusos, 20kg, 28.5 mm</h5>
              <p class="card-text text-dark">315.00 €</p>
            </div>
            <div class="card-footer">
              <button type="button"  product-id="9" class="btn btn-primary"><a style="color:white;" href="../public/php/add.php?pedidoId=9&usuarioId=<?=$usuarioId?>">
              <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a></button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="../imatges/barras/e-coat.JPG" alt="">
            <div class="card-body">
              <h4 class="card-title">
                <label class="text-dark">THE OHIO BAR - E-COAT</label>
              </h4>
              <h5 class="text-dark">Multiusos, 20kg, 28.5 mm</h5>
              <p class="card-text text-dark">315.00 €</p>
            </div>
            <div class="card-footer">
              <button type="button" product-id="10" class="btn btn-primary"><a style="color:white;" href="../public/php/add.php?pedidoId=10&usuarioId=<?=$usuarioId?>">
              <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a></button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="../imatges/barras/stainless-steel.JPG" alt="">
            <div class="card-body">
              <h4 class="card-title">
                <label class="text-dark">ROGUE 20KG OHIO POWER BAR - STAINLESS STEEL</label>
              </h4>
              <h5 class="text-dark">Powerlifting (Levantamiento de potencia), 20kg, 29 mm</h5>
              <p class="card-text text-dark">450.00 €</p>
            </div>
            <div class="card-footer">
              <button type="button" product-id="11" class="btn btn-primary"><a style="color:white;" href="../public/php/add.php?pedidoId=11&usuarioId=<?=$usuarioId?>">
              <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a></button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="../imatges/barras/echo-bar.JPG" alt="">
            <div class="card-body">
              <h4 class="card-title">
                <label class="text-dark">ROGUE ECHO BAR 2.0 </label>
              </h4>
              <h5 class="text-dark">Multiusos, 20kg, 28.5 mm</h5>
              <p class="card-text text-dark">244.00 €</p>
            </div>
            <div class="card-footer">
              <button type="button" product-id="12" class="btn btn-primary" ><a style="color:white;" href="../public/php/add.php?pedidoId=12&usuarioId=<?=$usuarioId?>">
              <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <hr style="background: white;
    height: 1px;">
    <!-- Footer -->
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