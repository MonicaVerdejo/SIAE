<?php
include_once '../db.php';
$db = new DB();

if (isset($_POST['mtro'])) {
    $id_mtro = $_POST['mtro'];
   //Primero deberemos vaciar el campo taller_asignado para poder eliminar al mtro
   $vaciarMaestro = $db->connect()->prepare("UPDATE maestro set taller_asignado=1 WHERE id='$id_mtro'");
   $vaciarMaestro->execute();
   //Despues vaciamos el campo mtro_asignado de la tabla talleres
   $vaciarTalleres = $db->connect()->prepare("UPDATE talleres set mtro_asignado=1 WHERE mtro_asignado='$id_mtro'");
   $vaciarTalleres->execute();
    //Eliminar los datos en la bd
    $eliminar = $db->connect()->prepare("DELETE FROM maestro WHERE id='$id_mtro'");
    $eliminar->execute();

    header('Location: ../administrativo.php');
} else {
    echo 'no esta registrando';
}
require_once('../administrativo.php');
?>