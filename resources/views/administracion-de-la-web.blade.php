@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ADMINISTRACIÓN DE LA WEB</title>
</head>
<body>
<br></br>
  <!-- PANEL DE CONTROL DE ADMINSITRACION-->
<div class="container">
<h3 class="text-white"><b>PANEL DE ADMINISTRACIÓN</b></h3><br>
  <div class="row">
    <div class="col-lg-12">
        <div class="row">
        
          <div class="col-lg-3 col-md-6 mb-4">
            <a class="card h-100" href="{{ url('/../public/user') }}" >
              <h3 class="my-3 ml-4 text-dark font-weight-bold"> CLIENTES </h3>
                <div class="card-body">
                  <h4 class="card-title">
                    <label class="text-dark"> Visualizar todos los clientes dados de alta.</label>
                  </h4>
                  <h1 class="text-center "><i class="fas fa-users"></i></h1>
                </div>
            </a>
          </div>
          
          <div class="col-lg-3 col-md-6 mb-4">
            <a class="card h-100" href="{{ url('/../public/producte') }}" >
              <h3 class="my-3 ml-4 text-dark font-weight-bold"> PRODUCTOS </h3>
                <div class="card-body">
                  <h4 class="card-title">
                    <label class="text-dark"> Visualizar todos los productes.</label>
                  </h4>
                  <h1 class="text-center "><i class="fas fa-box"></i></h1>
                </div>
            </a>
          </div>
          
          <div class="col-lg-3 col-md-6 mb-4">
            <a class="card h-100" href="{{ url('/../public/comanda') }}" >
              <h3 class="my-3 ml-4 text-dark font-weight-bold"> PEDIDOS </h3>
                <div class="card-body">
                  <h4 class="card-title">
                    <label class="text-dark"> Visualizar pedidos efectuadas por los clientes.</label>
                  </h4>
                  <h1 class="text-center "><i class="fas fa-list"></i></h1>
                </div>
            </a>
          </div>

          <div class="col-lg-3 col-md-6 mb-4">
            <a class="card h-100" href="{{ url('/../public/gestion') }}" >
              <h3 class="my-3 ml-4 text-dark font-weight-bold"> GESTIÓN DE COMPRAS </h3>
                <div class="card-body">
                  <h4 class="card-title">
                    <label class="text-dark"> Gestion de compras de la web</label>
                  </h4>
                  <h1 class="text-center "><i class="fas fa-tasks"></i></h1>
                </div>
            </a>
          </div>

          <div class="col-lg-3 col-md-6 mb-4">
            <a class="card h-100" target="_blank" href="https://dashboard.stripe.com/test/payments" >
              <h3 class="my-3 ml-4 text-dark font-weight-bold"> PAGOS </h3>
                <div class="card-body">
                  <h4 class="card-title">
                    <label class="text-dark"> Aqui se puede visualizar los pagos efectuados.</label>
                  </h4>
                  <h1 class="text-center "><i class="fab fa-stripe"></i></h1>
                </div>
            </a>
          </div>

          <div class="col-lg-3 col-md-6 mb-4">
            <a class="card h-100" target="_blank" href="https://mail.google.com/mail/u/9/" >
              <h3 class="my-3 ml-4 text-dark font-weight-bold"> CORREO </h3>
                <div class="card-body">
                  <h4 class="card-title">
                    <label class="text-dark"> Mensajes al correo electrónico de <br><small>fitboxshopp@gmail.com</small></label>
                  </h4>
                  <h1 class="text-center "><i class="fas fa-envelope-square"></i></h1>
                </div>
            </a>
          </div>
    </div>
</div>

</body>

</html>

@endsection


