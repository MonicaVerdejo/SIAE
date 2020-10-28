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

     //Si algun otro mtro tiene ese id entonces lo borramos
     $editTblmtro = $db->connect()->prepare("UPDATE `maestro` set 
     `taller_asignado`=1 WHERE `maestro`.`taller_asignado` = '$taller';");
     $editTblmtro->execute();
    
    
    //Insertar los datos en la bd
    $editmtro = $db->connect()->prepare("UPDATE `maestro` set 
    `taller_asignado`='$taller', `telefono`='$telefono' WHERE `maestro`.`id` = '$id_mtro';");
    $editmtro->execute();

    //Insertar los datos en la bd
    $editTblTaller = $db->connect()->prepare("UPDATE `talleres` set 
    `mtro_asignado`='$id_mtro' WHERE `talleres`.`id` = '$taller';");
    $editTblTaller->execute();

    header('Location: ../administrativo.php');
} else {
    echo 'no esta registrando';
}
require_once('../administrativo.php');
?>