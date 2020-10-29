<?php 
ob_start();
require '../db.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
if (array_key_exists("email2", $_POST)) {
    $db = new DB();
 	  $consulta = $db->connect()->prepare('SELECT correo FROM maestro WHERE correo = :email');
      $consulta->bindParam(':email', $_POST['email2']);
      $consulta->execute();
       //Si el correo existe
       if ($resultado = $consulta -> fetch(PDO::FETCH_ASSOC)) {
       	echo 'Enviar email de recuperacion a '.$resultado['correo'];
     $enviaraemail = $resultado['correo'];
     $token = uniqid();
    $consulta = "UPDATE maestro set Token = '$token' WHERE correo = '{$resultado['correo']}'";
    
    //PHPMailer
     $mail = new PHPMailer(true);
     $mail->CharSet = "UTF-8";
try {
    //Server settings
    $mail->SMTPDebug =  2;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'vinculacionacad.itescham@gmail.com';                     // SMTP username
    $mail->Password   = 'SoftUp97_esdeath';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('vinculacionacad.itescham@gmail.com', 'Departamento de vinculación/ITESCHAM');
    $mail->addAddress($enviaraemail);     // Add a recipient
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Recupere su contraseña';
    $mail->Body = 'Haga click en este <a href="http://localhost/SIAE2/maestro/cambia_password.php?token='.$token.'">link</a> para cambiar su contraseña de usuario. <br> Gracias por tu tiempo y suerte trabajando con nosotros. ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    $mail->send();
    //header('Location: ../perfiles.html');
    echo '"Te enviamos un correo para que crees una nueva contraseña y 
    puedas seguir trabajando con nosotros, verifica tu bandeja de entrada."';
    header('Location:../perfiles.html');
          

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
       	echo 'El correo que has proporcionado no esta dado de alta en el sistema con ninguna cuenta de usuario, lo sentimos pero coteja que tus credenciales sean correctas. Gracias.';
       }
 }
ob_end_flush();
?>