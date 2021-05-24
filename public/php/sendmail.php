<!DOCTYPE html>
<html lang="en">
<head>
</head>
<!-- ENVIAR UN MAIL, DESDE LA PAGINA DE CONTACTO -->
<body style="background-color:black;">
<?php
if(isset($_GET['submit'])) {
    require './src/PHPMailer.php';
    require './src/SMTP.php';

    $mail=new PHPMailer();
    $mail->CharSet = 'UTF-8';

    // Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
    $email_to = "fitboxshopp@gmail.com";
    $email_subject = $_GET['order'];
    
    // Aquí se deberían validar los datos ingresados por el usuario
    if(!isset($_GET['order']) || !isset($_GET['msg'])) {
    
        echo "<b>El formulario no se ha podido enviar. </b><br />";
        echo "Vuelve a enviar el formualrio de nuevo, por favor.<br />";
        die();
    }
    
    $email_message .= "<h1><b>Mensaje enviado en el formulario de contacto de Fitbox Shop: </b> </h1> <br> Mensaje enviado del usuario con correo electrónico: ". $_GET['email']."<p> Los datos del usuario son los siguientes: <br> </br> <b>ID: </b>". $_GET['id'] ." <b><br> NOMBRE I APELLIDOS: </b>". $_GET['name'] ." ". $_GET['primerapellido'] ." ". $_GET['segundoapellido'] ."<br><b> DNI: </b>". $_GET['dni'] ."<br></br> El <u>mensaje</u> enviado por el usuario es el siguiente: <br> \n". $_GET['msg'] . "<br>\n\n";
    
   echo $email_message;

   $from_mail="fitboxshopp@gmail.com";
    // Ahora se envía el e-mail usando la función mail() de PHP
    $header = "From: fitboxshopp@gmail.com"." <".$from_mail.">\n";
    $header .= "Reply-To: fitboxshopp@gmail.com "."\n";
    $header .= "MIME-Version: 1.0\n";

    mail($email_to, $email_subject, $email_message, $header);
    
    echo "¡El formulario se ha enviado correctamente!";
    ?>
<script type="text/javascript">
    window.location="../contacto";
</script>
<?php
}
?>

<?php
if(isset($_GET['insert'])) {
    require './src/PHPMailer.php';
    require './src/SMTP.php';

    $mail=new PHPMailer();
    $mail->CharSet = 'UTF-8';

    $email_to = "fitboxshopp@gmail.com";
    $email_subject = $_GET['pedido'];

    $email_message = "Se ha realizado un pedido:<br>\n\n";
    $email_message .= "Id de Cliente: ". $_GET['usuarioId'] ."<br>\n";
    $email_message .= "Id de Comanda: ". $_GET['pedidoId'] ."<br>\n";
    $email_message .= "Id de Producto: ". $_GET['pedidoId'] ."<br>\n";
    $email_message .= "Precio: ". $_GET['p'] ."<br>\n";
    $email_message .= "Fecha Realizada: ". $_GET['dia'] ."<br>\n";

    
   echo $email_message;

   $from_mail="fitboxshopp@gmail.com";
    // Ahora se envía el e-mail usando la función mail() de PHP
    $header = "From: fitboxshopp@gmail.com"." <".$from_mail.">\n";
    $header .= "Reply-To: fitboxshopp@gmail.com "."\n";
    $header .= "MIME-Version: 1.0\n";

    mail($email_to,$email_subject, $email_message, $header);
    
    echo "¡Pedido efectuado correctamente!";
?>
<script type="text/javascript">
    window.location="../public/misPedidos";
</script>
<?php
}
?>
<?php
    $body = $email_message;
    echo $body;

    $mail->IsSMTP();
    $mail->SMTPAuth = true;  // Enable SMTP authentication
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->SMTPDebug  = 1;
    $mail->SMTPAuth   = true;
    $mail->Username   = 'fitboxshopp';
    $mail->Password   = 'yjixvaeuxkywrfan';
    $mail->SetFrom('fitboxshopp@gmail.com', "fitboxshopp");
    $mail->AddReplyTo('no-reply@mycomp.com','no-reply');
    $mail->Subject    = $_GET['order'];
    $mail->MsgHTML($body);

    $mail->AddAddress('fitboxshopp@gmail.com', 'fitboxshopp');

    var_dump($mail->smtpConnect($mail->SMTPOptions));
    var_dump($mail->smtpClose());
    var_dump($mail->ErrorInfo);
    $mail->send();

?>
<body>
<html>