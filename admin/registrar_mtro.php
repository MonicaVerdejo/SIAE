<?php 
include_once 'db.php';
$db = new DB();
if (isset($_POST['texto']) && !empty($_FILES)) {
    $nombre = $_POST['texto'];
    $correo = $_POST['correo'];
    $categoria = $_POST['categoria'];
    

    $sentencia = $db->connect()->prepare("INSERT INTO maestro (id,nombre,correo,password,taller_asignado,curp,telefono,sexo,Token, rol_id)
    VALUES(NULL,'$nombre', '$correo', '$curp ' ,'$taller_asignado', '$curp', '$telefono', '$sexo', 0, 3)");
    $sentencia->execute();
    header('Location: administrativo.php');
} else {
    echo 'no esta registrando';
}
require_once('administrativo.php');
?>