<?php

include 'includes/script.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


$mail = new PHPMailer(true);
//https://www.google.com/settings/security/lesssecureapps
//ruta para activar configuracion de gmail
try {
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'programac02020@gmail.com';                     // SMTP username
    $mail->Password   = '15521118';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('programac02020@gmail.com', 'Joyeria D Ambrosio');
    $mail->addAddress('programac02020@gmail.com');
   // $mail->addAddress('joyeriadambrosio@yahoo.com.ar');
    $mail->addAddress($_SESSION['correo']);     // Add a recipient

    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Joyeria D Ambrosio';
    $mail->Body    = '



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<style type="text/css">
*{
    margin: 0;
    padding: 0;
     font-family:Verdana, sans-serif;
}
    #nav{
        width: 100%;
        height:110px;
        background-color: rgb(50,50,50);
       
    }
   
    h2{
        padding:20px ;
    }
    #p{
        padding: 20px;
        font-size: 1.2em;
        color: black;
        font-family: italic;
    }
</style>

<body>
    <header>
        <nav id="nav" >
            <img id="logo" src="http://imgfz.com/i/O7AySwj.png">
            
        </nav>
        <section>
            <h2>Hola '.$_SESSION["nombre"].'</h2>
            <div>
                <p id="p">Este es un mensaje automatico para confirmarte que recibimos tu consulta. A la brevedad nos comunicaremos al correo que nos dejaste. muchas gracias por interesarte en nuestros servicios. Joyeria D Ambrosio</p>
            </div>
        </section>
        <footer>
            <h4>Su consulta es:</h4>
            <p>'.$_SESSION["mensaje"].'</p>
             <p>Enviado desde: '.$_SESSION["correo"].'</p>
        </footer>
    </header>
</body>
</html>
';
    
    $mail->send();


    
} catch (Exception $e) {
    echo "Error en el envio: {$mail->ErrorInfo}";
}


?>




