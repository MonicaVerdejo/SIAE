<?php
ob_start();
include_once 'db.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require './PHPMailer/Exception.php';
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';
$db = new DB();
$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";


if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['mensaje'])) {
    $mensaje = $_POST['mensaje'];
    $admin_id = $_POST['admin_id'];
    $destinatario = $_POST['destinatario'];
    $correoDestino;
 
    $query = $db->connect()->prepare("INSERT INTO mensajeadmin (mensaje,fecha,estado,admin_id,destinatario) 
                                      VALUES('$mensaje', NOW(), 0 ,'$admin_id','$destinatario');");
    if($query->execute()){

        if($destinatario == "Todos"){

            $conn = new mysqli("localhost", "root","","siae");
            $sql = $conn->query("select * from maestro WHERE id > 1");
        
            if(mysqli_num_rows($sql)>0){
              while ($x = $sql->fetch_assoc()) {
                $mail->addAddress($x['correo']);
              }
            }
          
        }else{
 
            $consulta = $db->connect()->prepare("SELECT correo FROM `maestro` WHERE nombre='$destinatario'");
            $consulta->execute();
            $correoDestino = $consulta->fetch(PDO::FETCH_ASSOC);
            $mail->addAddress($correoDestino['correo']);  
           
        }

       
   try {
       //Server settings
       $mail->SMTPDebug =  0;                      // Enable verbose debug output
       $mail->isSMTP();                                            // Send using SMTP
       $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
       $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
       $mail->Username   = 'vinculacionacad.itescham@gmail.com';                     // SMTP username
       $mail->Password   = 'SoftUp97_esdeath';                               // SMTP password
       $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
       $mail->Port       = 587;                                    // TCP port to connect to
       //Recipients
       $mail->setFrom('vinculacionacad.itescham@gmail.com', 'Dept. Calidad e Innovación');
         // Add a recipient
       // Content
       $mail->isHTML(true);                                  // Set email format to HTML
       $mail->Subject = 'Dept. Calidad e Innovación';
       $mail->Body = $mensaje;
       $mail->AltBody = 'Dept. Calidad e Innovación';
       
     
       if($mail->send()){
        echo '<script type="text/javascript">
        alert("El mensaje ha sido enviado con éxito ᕕ( ՞ ᗜ ՞ )ᕗ");
        window.location.href="administrativo.php";
        </script>';
       }
     
   } catch (Exception $e) {
       echo "El correo no pudo ser enviado. Error: {$mail->ErrorInfo}";
   }


    }else{
        echo '<script type="text/javascript">
        alert("Lo sentimos, el mensaje no se ha podido enviar, por favor intenta más tarde");
        window.location.href="administrativo.php";
        </script>';
    }

}else{
    echo '<script type="text/javascript">
         alert("Lo sentimos, el mensaje no se ha podido enviar, por favor intenta más tarde (-_-｡)");
         window.location.href="administrativo.php";
         </script>';
}
ob_end_flush();
?>
