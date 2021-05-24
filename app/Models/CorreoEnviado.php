<?php

if (isset($_POST['submit'])){
    if (!empty($_POST['nom']) && !empty($_POST['apellido'] && !empty($_POST['correo'])  && !empty($_POST['mensaje'])) ){
        $nom = $_POST['nom'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $order = $_POST['order'];
        $mensaje = $_POST['mensaje'];
        $mym="fitboxshopp@gmail.com";
        $header = "From: ".$correo."\r\n";
        $header.= "Reply-To : noreply@example.com"."\r\n";
        $header.= "X-Mailer: PHP/".phpversion();
        $mail = @mail($mym,$asunto,$mensaje,$header);
        if ($mail){
            echo "<h4>Enviado</h4>";
        }

    }
}
?>