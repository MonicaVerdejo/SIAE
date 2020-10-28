<?php
include_once '../db.php';
$db = new DB();

if (isset($_POST['taller'])) {
    $id_taller = $_POST['taller'];
   //Antes de eliminar al taller debere asignar un taller null a la tabla maestro
  $editTaller = $db->connect()->prepare("UPDATE `maestro` SET `taller_asignado` = '1' WHERE `maestro`.`taller_asignado` =$id_taller;");
  $editTaller->execute();

    //Insertar los datos en la bd
    $eliminar = $db->connect()->prepare("DELETE FROM talleres WHERE id='$id_taller'");
    $eliminar->execute();

    header('Location: ../administrativo.php');
} else {
    echo 'no esta registrando';
}
require_once('../administrativo.php');
?>