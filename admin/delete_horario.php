<?php
include_once '../db.php';
$db = new DB();
$nombre = $_POST['nombre'];
$turno = $_POST['turno'];


$sintaller = "No asignado";
if (strcmp($nombre, $sintaller) === 0) {
     echo '<script type="text/javascript">
     alert("Error. Datos no encontrados ( ຈ ﹏ ຈ )");
     window.location.href="../admin_horarios.php"; </script>';
} else {
     $buscarHorario = $db->connect()->prepare("SELECT taller from horarios where taller=$nombre and turno='$turno' ;");
     $buscarHorario->execute();
     
     if (($buscarHorario->rowCount() > 0)) {
          //sentencia pa borrar alv el horario
          $eliminarHorario = $db->connect()->prepare("DELETE from horarios where taller= $nombre and turno='$turno' ;");
          $eliminarHorario->execute();
          echo '<script type="text/javascript">
          alert("Horario eliminado ( ຈ ﹏ ຈ )");
          window.location.href="../admin_horarios.php"; </script>';
     } else {
          echo '<script type="text/javascript">
           alert("El horario que buscas no esta registrado, no podemos eliminar algo que no existe.");
           window.location.href="../admin_horarios.php";
           </script>';
     }
}


require_once('../admin_horarios.php');
