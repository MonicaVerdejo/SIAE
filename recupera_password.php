<?php 
ob_start();
require 'db.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'public/PHPMailer/Exception.php';
require 'public/PHPMailer/PHPMailer.php';
require 'public/PHPMailer/SMTP.php';
if (array_key_exists("email2", $_POST)) {
    $db = new DB();
 	  $consulta = $db->connect()->prepare('SELECT correo FROM usuario WHERE correo = :email');
      $consulta->bindParam(':email', $_POST['email2']);
      $consulta->execute();
       //Si el correo existe
       if ($resultado = $consulta -> fetch(PDO::FETCH_ASSOC)) {
       	echo 'Enviar email de recuperacion a '.$resultado['correo'];
     $enviaraemail = $resultado['correo'];
     $token = uniqid();
    $consulta = "UPDATE usuario set Token = '$token' WHERE correo = '{$resultado['correo']}'";
    
    //PHPMailer
     $mail = new PHPMailer(true);
     $mail->CharSet = "UTF-8";
try {
    //Server settings
    $mail->SMTPDebug =  2;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'mpdverdejo@gmail.com';                     // SMTP username
    $mail->Password   = 'malodika1997';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('mpdverdejo@gmail.com.com', 'Ocupación hotelera de Champotón');
    $mail->addAddress($enviaraemail);     // Add a recipient
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Recupere su contraseña';
    $mail->Body = 'Haga click en este <a href="http://localhost/ocupacionhotelera/cambia_password.php?token='.$token.'">link</a>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    $mail->send();
    
     echo ('Mensaje enviado');
     header('Location: index.php');
    //echo'<script >window.location.href="sesion.php";</script>';

} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado. Mailer Error: {$mail->ErrorInfo}";
}
//-----Para actualizar token-----
       	try {
            $db->connect()->exec($consulta);
       	} catch (PDOException $e) {
       		 echo "no se pudo guardar el token: ".$e-> getMessage();
       	}
       }else{
       	echo 'No existe el correo';
       }
 }
ob_end_flush();
?>