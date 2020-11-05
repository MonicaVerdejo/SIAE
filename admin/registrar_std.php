<?php
include_once '../db.php';
$db = new DB();

if (!empty($_POST['taller'])) {
    $nombre = $_POST['nombre'];
    $matricula = $_POST['matricula'];
    $taller = $_POST['taller'];
    $representativo = $_POST['representativo'];
    $carrera = $_POST['carrera'];
    $semestre = $_POST['semestre'];
    $sexo = $_POST['sexo'];

    $matriculasregistradas = $db->connect()->prepare('SELECT matricula FROM alumnos WHERE matricula = :matricula');
    $matriculasregistradas->bindParam(':matricula', $_POST['matricula']);
    $matriculasregistradas->execute();

    if ($matriculasregistradas->rowCount() > 0) {
        echo '<script type="text/javascript">
         alert("La matricula que has proporcionado ya se encuentra registrada con otro estudiante, intenta nuevamente por favor, verifica correctamente las credenciales de tu estudiante.");
         window.location.href="../admin_std.php";
         </script>';
    } else {
        $password = password_hash($_POST['year'], PASSWORD_BCRYPT);
        //Insertar los datos en la bd
    $newstd = $db->connect()->prepare("INSERT INTO `alumnos` (`nombre`, `matricula`, `password`, `taller_id`, `representativo`, `carrera`, `estatus`, `semestre`, `evaluacion`, `sexo`, `rol_id`) 
    VALUES ('$nombre', '$matricula', '$password', '$taller', '$representativo', '$carrera', 'Cursando', '$semestre', '', '$sexo', '2');");
    $newstd->execute();

    header('Location: ../admin_std.php');
    }
} else {
    echo 'no esta registrando';
}
require_once('../admin_std.php');
?>