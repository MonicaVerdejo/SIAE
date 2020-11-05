<?php
include_once '../db.php';
$db = new DB();

if (!empty($_POST['estatus']) && !empty($_POST['matricula'])) {
    $matricula = $_POST['matricula'];
    $estatus=$_POST['estatus'];

    //Editar los datos de la bd
    $editstd = $db->connect()->prepare("UPDATE `alumnos` SET `estatus` = '$estatus' WHERE `alumnos`.`matricula` = '$matricula'; ");
    $editstd->execute();

    header('Location: ../administrativo.php');
} else {
    echo 'no esta registrando';
}
require_once('../administrativo.php');
?>