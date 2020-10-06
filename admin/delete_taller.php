<?php
include_once '../db.php';
$db = new DB();

if (isset($_POST['taller'])) {
    $id_taller = $_POST['taller'];
   
    //Insertar los datos en la bd
    $eliminar = $db->connect()->prepare("DELETE FROM talleres WHERE id='$id_taller'");
    $eliminar->execute();

    header('Location: ../administrativo.php');
} else {
    echo 'no esta registrando';
}
require_once('../administrativo.php');
?>