@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DISCOS</title>
    
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
  </head>

  <body>
<br>
<!-- MUESTRA TODOS LOS PRODUCTOS DE LA CATEGORIA DE DISCOS-->
  <div class="container">
  <div class="row">
     <br></br>
     <a class="text-white" href="{{ url('/home') }}" >&nbsp &nbsp  INICIO &nbsp</a> / <a class="text-white" href="{{ url('/home#galeria') }}" >  &nbsp GALERIA &nbsp</a> / <a href="{{ url('/discos') }}" class="text-white"> &nbsp DISCOS</a> 
    <br></br>
    <div class="container">
        <div class="row">
		      <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <h1 class="my-4">DISCOS</h1>
              </div>
              <div class="col-md-6">
                <!-- BUSCADOR DISCOS -->
                <form method="GET" action="" onSubmit="return validarForm(this)">
                  <br><br>
                  <input id="buscadorr" type="text" class="form-control" placeholder="Buscar Discos" name="buscadorDiscos" >


                  <input id="buscadorBoton"type="submit" value="BUSCAR" name="buscar" class="form-control" ></input>
                </form>

              <script type="text/javascript">
                  function validarForm(formulario){
                    if(formulario.buscadorDiscos.value.length==0) 
                    { //¿Tiene 0 caracteres?
                        formulario.buscadorDiscos.focus();
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
          if(isset($_GET['buscadorDiscos'])) {   
            require_once '../public/php/configDB.php';
            $usuarioId = Auth::user()->id;
            
            $conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("Error al conectar con la base de datos");
            $db = mysqli_select_db( $conexion, $basededatos ) or die ( "Error al conectar con la base de datos" );

            $buscar = $_GET["buscadorDiscos"];
            $consulta="SELECT id,nom,descripcion,precio,img FROM productes WHERE  tipos='Discos' and nom like '%%$buscar%%'";
            $resultado = mysqli_query( $conexion, $consulta ) or die ( "Error en la consulta de datos");
            
          while($columna = mysqli_fetch_array($resultado )) {
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
              <button type="button" class="btn btn-primary"><a style="color:white;" href="../public/php/add.php?pedidoId=<?=$columna['id']?>&usuarioId=<?=$usuarioId?>">
              <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a></button>
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
            <img class="card-img-top" src="../imatges/discos/0.5kg.JPG" alt="disco 0.5kg">
            <div class="card-body">
              <h4 class="card-title">
                <label style="color:black; font-weight:bold;">Discos 0.5 kg</label>
              </h4>
              <h5 style="color:black;">Pareja de discos Change de 0.5 kg (IWF)</h5>
              <p class="card-text" style="color:black;">30.00 €</p>
            </div>
            <div class="card-footer">
              <button type="button" class="btn btn-primary" style="color:white;">
                <a style="color:white;" href="../public/php/add.php?pedidoId=19&usuarioId=<?=$usuarioId?>">
                <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a>
              </button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
          <img class="card-img-top" src="../imatges/discos/1kg.JPG" alt="disco 1kg">
            <div class="card-body">
              <h4 class="card-title">
                <label style="color:black; font-weight:bold;">Discos 1 kg</label>
              </h4>
              <h5 style="color:black;">Pareja de discos Change de 1 kg (IWF)</h5>
              <p class="card-text" style="color:black;">35.00 €</p>
            </div>
            <div class="card-footer">
            <button type="button" class="btn btn-primary"><a style="color:white;" href="../public/php/add.php?pedidoId=20&usuarioId=<?=$usuarioId?>">
            <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a></button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
          <img class="card-img-top" src="../imatges/discos/1.5kg.JPG" alt="disco 1.5kg">
            <div class="card-body">
              <h4 class="card-title">
                <label style="color:black; font-weight:bold;">Discos 1.5 kg</label>
              </h4>
              <h5 style="color:black;">Pareja de discos Change de 1.5 kg (IWF)</h5>
              <p class="card-text" style="color:black;">41.00 €</p>
            </div>
            <div class="card-footer">
            <button type="button" class="btn btn-primary"><a style="color:white;" href="../public/php/add.php?pedidoId=21&usuarioId=<?=$usuarioId?>">
            <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a></button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
          <img class="card-img-top" src="../imatges/discos/2kg.JPG" alt="disco 2kg">
            <div class="card-body">
              <h4 class="card-title">
                <label style="color:black; font-weight:bold;">Discos 2 kg</label>
              </h4>
              <h5 style="color:black;">Pareja de discos Change de 2 kg (IWF)</h5>
              <p class="card-text" style="color:black;">45.00 €</p>
            </div>
            <div class="card-footer">
            <button type="button" class="btn btn-primary"><a style="color:white;" href="../public/php/add.php?pedidoId=22&usuarioId=<?=$usuarioId?>">
            <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a></button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
          <img class="card-img-top" src="../imatges/discos/2.5kg.JPG" alt="disco 2.5kg">
            <div class="card-body">
              <h4 class="card-title">
                <label style="color:black; font-weight:bold;">Discos 2.5 kg</label>
              </h4>
              <h5 style="color:black;">Pareja de discos Change de 2.5 kg (IWF)</h5>
              <p class="card-text" style="color:black;">51.00 €</p>
            </div>
            <div class="card-footer">
            <button type="button" class="btn btn-primary"><a style="color:white;" href="../public/php/add.php?pedidoId=23&usuarioId=<?=$usuarioId?>">
            <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a></button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
          <img class="card-img-top" src="../imatges/discos/5kg.JPG" alt="disco 5kg">
            <div class="card-body">
              <h4 class="card-title">
                <label style="color:black; font-weight:bold;">Discos 5 kg</label>
              </h4>
              <h5 style="color:black;">Pareja de discos Change de 5 kg (IWF)</h5>
              <p class="card-text" style="color:black;">99.00 €</p>
            </div>
            <div class="card-footer">
            <button type="button" class="btn btn-primary"><a style="color:white;" href="../public/php/add.php?pedidoId=1&usuarioId=<?=$usuarioId?>">
            <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a></button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
          <img class="card-img-top" src="../imatges/discos/10kg.JPG" alt="disco 10kg">
            <div class="card-body">
              <h4 class="card-title">
                <label style="color:black; font-weight:bold;">Discos 10 kg</label>
              </h4>
              <h5 style="color:black;">Pareja de discos Change de 10 kg (IWF)</h5>
              <p class="card-text" style="color:black;">149.00 €</p>
            </div>
            <div class="card-footer">
            <button type="button" class="btn btn-primary"><a style="color:white;" href="../public/php/add.php?pedidoId=2&usuarioId=<?=$usuarioId?>">
            <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a></button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="../imatges/discos/15kg.JPG" alt="disco 15kg">
            <div class="card-body">
              <h4 class="card-title">
                <label style="color:black; font-weight:bold;">Discos 15 kg</label>
              </h4>
              <h5 style="color:black;">Pareja de discos Change de 15 kg (IWF)</h5>
              <p class="card-text" style="color:black;">216.00 €</p>
            </div>
            <div class="card-footer">
            <button type="button" class="btn btn-primary"><a style="color:white;" href="../public/php/add.php?pedidoId=3&usuarioId=<?=$usuarioId?>">
            <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a></button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
          <img class="card-img-top" src="../imatges/discos/20kg.JPG" alt="disco 20kg">
            <div class="card-body">
              <h4 class="card-title">
                <label style="color:black; font-weight:bold;">Discos 20 kg</label>
              </h4>
              <h5 style="color:black;">Pareja de discos Change de 20 kg (IWF)</h5>
              <p class="card-text" style="color:black;">280.00 €</p>
            </div>
            <div class="card-footer">
            <button type="button" class="btn btn-primary"><a style="color:white;" href="../public/php/add.php?pedidoId=4&usuarioId=<?=$usuarioId?>">
            <i class="fas fa-cart-plus" style="padding-right:2px;"></i> Añadir a la cesta</a></button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
          <img class="card-img-top" src="../imatges/discos/25kg.JPG" alt="disco 25kg">
            <div class="card-body">
              <h4 class="card-title">
                <label style="color:black; font-weight:bold;">Discos 25 kg</label>
              </h4>
              <h5 style="color:black;">Pareja de discos Change de 25 kg (IWF)</h5>
              <p class="card-text" style="color:black;">341.00 €</p>
            </div>
            <div class="card-footer">
            <button type="button" class="btn btn-primary"><a style="color:white;" href="../public/php/add.php?pedidoId=28&usuarioId=<?=$usuarioId?>">
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