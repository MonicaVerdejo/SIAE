<?php
include_once '../db.php';
$db = new DB();

if (!empty($_POST['taller'])) {
    $nombre = $_POST['nombre'];
    $matricula = $_POST['matricula'];
    $password = password_hash($_POST['year'], PASSWORD_BCRYPT);
    $taller = $_POST['taller'];
    $representativo = $_POST['representativo'];
    $carrera = $_POST['carrera'];
    $semestre = $_POST['semestre'];
    $sexo = $_POST['sexo'];


    //Insertar los datos en la bd
    $newstd = $db->connect()->prepare("INSERT INTO `alumnos` (`nombre`, `matricula`, `password`, `taller_id`, `representativo`, `carrera`, `estatus`, `semestre`, `evaluacion`, `sexo`, `rol_id`) 
    VALUES ('$nombre', '$matricula', '$password', '$taller', '$representativo', '$carrera', 'Cursando', '$semestre', '', '$sexo', '2');");
    $newstd->execute();

    header('Location: ../administrativo.php');
} else {
    echo 'no esta registrando';
}
require_once('../administrativo.php');
?>