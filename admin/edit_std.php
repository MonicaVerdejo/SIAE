<?php
include_once '../db.php';
$db = new DB();

if ((($_POST['taller'])!="No asignado") && !empty($_POST['matricula'])) {
    $matricula = $_POST['matricula'];
    $taller = $_POST['taller'];
    $representativo = $_POST['representativo'];
    $semestre = $_POST['semestre'];
    $estatus=$_POST['status'];
    //Editar los datos de la bd
    $editstd = $db->connect()->prepare("UPDATE `alumnos` SET `taller_id` = '$taller', `representativo` = '$representativo', `estatus` = '$estatus', 
    `semestre` = '$semestre' WHERE `alumnos`.`matricula` = '$matricula'; ");
    $editstd->execute();
    echo '<script type="text/javascript">
    alert("Alumno actualizado correctamente (ﾉ◕ヮ◕)ﾉ*:･ﾟ✧");
    window.location.href="../admin_std.php"; </script>';
} else {
    echo '<script type="text/javascript">
    alert("No has seleccionado todos los datos o ha ocurrido algun error interno, intenta otra vez.");
    window.location.href="../admin_std.php"; </script>';
}
require_once('../admin_std.php');
?>