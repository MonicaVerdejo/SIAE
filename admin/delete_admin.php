<?php
include_once '../db.php';
$db = new DB();

if (!empty($_POST['nombre']) ) {
    $id_admin = $_POST['nombre'];
    
    //Eliminar los datos en la bd
    $eliminar = $db->connect()->prepare("DELETE FROM administrador WHERE id='$id_admin'");
    $eliminar->execute();

    
    header('Location: ../administrativo.php');
} else {
    echo 'no esta registrando';
}
require_once('../administrativo.php');
?>