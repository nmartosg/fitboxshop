<?php
// SI HAY UN ERRROR EN LA COMPRA LLAMARA A ESTE ARCHIVO CONFROMA HAY UN PROBLEMA A LA HORA DEL PAGO, EL CUAL LLAMA A LA VISTA ERROR.BLADE.PHP
header("HTTP/1.0 402 Not Found");
echo "
      <html>
        <head>
            <meta http-equiv='Refresh' content='0;url=../error' />
        </head>
        <body style='background-color:black;'>";

  $value=($_GET['value']);
  $usuarioId=($_GET['usuarioId']);
  $precio=($value*100);
  
  require '..\shopNoe\vendor\autoload.php';


  Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
  Stripe\Charge::create ([
          "amount" => $precio,
          "currency" => "eur",
          "source" => $request->stripeToken,
          "description" => "Make payment and chill." 
  ]);

  echo "<pre>", print_r($charge), "</pre>";

  
?>

<script type="text/javascript">
  window.location="../php/insert.php?value=<?=$value?>&usuarioId=<?=$usuarioId?>";
</script>

  <?php
    echo " </body>";
    echo  "</html>";
  ?>
