<?php
include_once '../db.php';
$db = new DB();

if (isset($_POST['taller'])) {
    $id_mtro = $_POST['mtro'];
    //$password = password_hash($_POST['curp'], PASSWORD_BCRYPT);
    //$correo = $_POST['correo'];
    //$curp = $_POST['curp'];
    $taller = $_POST['taller'];
    $telefono = $_POST['telefono'];
    $sexo = $_POST['sexo'];
    
    //Insertar los datos en la bd
    $editmtro = $db->connect()->prepare("UPDATE `maestro` set 
    `taller_asignado`='$taller', `telefono`='$telefono', `sexo`='$sexo' WHERE `maestro`.`id` = '$id_mtro';  ");
    $editmtro->execute();

    header('Location: ../administrativo.php');
} else {
    echo 'no esta registrando';
}
require_once('../administrativo.php');
?>