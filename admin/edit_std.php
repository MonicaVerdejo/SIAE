<?php
include_once '../db.php';
$db = new DB();

if (!empty($_POST['taller']) && !empty($_POST['matricula'])) {
   
    $matricula = $_POST['matricula'];
    $taller = $_POST['taller'];
    $representativo = $_POST['representativo'];
    $semestre = $_POST['semestre'];
    $estatus=$_POST['status'];

    //Editar los datos de la bd
    $editstd = $db->connect()->prepare("UPDATE `alumnos` SET `taller_id` = '$taller', `representativo` = '$representativo', `estatus` = '$estatus', 
    `semestre` = '$semestre' WHERE `alumnos`.`matricula` = '$matricula'; ");
    $editstd->execute();

    header('Location: ../administrativo.php');
} else {
    echo 'no esta registrando';
}
require_once('../administrativo.php');
?>