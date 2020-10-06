<?php
include_once '../db.php';
$db = new DB();

if (isset($_POST['mtro'])) {
    $id_mtro = $_POST['mtro'];
   
    //Insertar los datos en la bd
    $eliminar = $db->connect()->prepare("DELETE FROM maestro WHERE id='$id_mtro'");
    $eliminar->execute();

    header('Location: ../administrativo.php');
} else {
    echo 'no esta registrando';
}
require_once('../administrativo.php');
?>