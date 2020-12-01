<?php
include_once '../db.php';
$db = new DB();
$matricula = $_POST['matricula'];
$taller = $_POST['taller_id'];
$busqueda = $db->connect()->prepare("SELECT matricula FROM alumnos WHERE taller_id='$taller'");
$busqueda->execute();
foreach ($busqueda  as $row) {
    $matricula = $row[0];
    if (!empty($_POST['matricula'])) {
        $matricula = $_POST['matricula'];
        $representativo = $_POST['representativo'];
        //Editar los datos de la bd
        $editstd = $db->connect()->prepare("UPDATE `alumnos` SET  `representativo` = '$representativo' WHERE `alumnos`.`matricula` = '$matricula'; ");
        $editstd->execute();
        echo '<script type="text/javascript">
            alert("El cambio ha sido asignado con éxito ᕕ( ՞ ᗜ ՞ )ᕗ");
            window.location.href="../maestro.php";
            </script>';
    } else {
        $var = "Lo sentimos, el cambio no se ha podido ejecutar, por favor intenta más tarde (-_-｡)";
        echo "<script>alert('" . $var . "');</script>";
        header('Location: ../maestro.php');
    }
}
require_once('../maestro.php');
