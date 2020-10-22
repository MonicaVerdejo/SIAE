<?php
include_once '../db.php';
$db = new DB();
$nombre = $_POST['nombre'];
$turno = $_POST['turno'];


$sintaller = "No asignado";
if (strcmp($nombre, $sintaller) === 0) {
     echo '<script type="text/javascript">
     alert("Sí serás pendejo! ¿Cómo voy a eliminar algo que no ingresaste?");
     window.location.href="../administrativo.php"; </script>';
} else {
//sentencia pa borrar alv el horario
$insertar = $db->connect()->prepare(" delete from horarios where taller= $nombre and turno='$turno' ;");
$insertar->execute();
header('Location: ../administrativo.php');

 
}


require_once('../administrativo.php');
