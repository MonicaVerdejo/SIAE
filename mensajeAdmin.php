<?php
include_once 'db.php';
$db = new DB();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['mensaje'])) {
    $mensaje = $_POST['mensaje'];
    $admin_id = $_POST['admin_id'];


    $query = $db->connect()->prepare("INSERT INTO mensajeadmin (mensaje,fecha,estado,admin_id) 
                                      VALUES('$mensaje', now(), 0 ,'$admin_id');");
    $query->execute();

    echo '<script type="text/javascript">
    alert("El mensaje ha sido enviado con éxito ᕕ( ՞ ᗜ ՞ )ᕗ");
    window.location.href="administrativo.php";
    </script>';
}else{
    echo '<script type="text/javascript">
         alert("Lo sentimos, el mensaje no se ha podido enviar, por favor intenta más tarde (-_-｡)");
         window.location.href="maestro.php";
         </script>';
}
