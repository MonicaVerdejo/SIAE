<?php 
require 'db.php';
include_once 'contacto.html'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';



// Valores enviados desde el formulario
if ( !isset($_POST["contact-name"]) || !isset($_POST["contact-email"])  || !isset($_POST["contact-message"]) ) {
    
}


$nombre = $_POST["contact-name"];

$email = $_POST["contact-email"];

$mensaje = $_POST["contact-message"];

$destinatario = "mpdverdejo@gmail.com";


// Datos de la cuenta de correo utilizada para enviar via SMTP
$smtpHost = 'smtp.gmail.com';  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "mpdverdejo@gmail.com";  // Mi cuenta de correo
$smtpClave = "malodika1997";  // Mi contraseña




$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 587; 
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";

// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;


$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($destinatario); // Esta es la direccion a donde enviamos los datos del formulario

$mail->Subject = "Formulario desde el Sitio Web"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "
<html> 

<body> 

<h1>Recibiste un nuevo mensaje desde el formulario de contacto</h1>

<p>Informacion enviada por el usuario de la web:</p>

<p>nombre: {$nombre}</p>

<p>email: {$email}</p>



<p>asunto: {$asunto}</p>

<p>mensaje: {$mensaje}</p>

</body> 

</html>

<br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n "; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
   //
} else {
    echo "Ocurrio un error inesperado.";
    
}

?>