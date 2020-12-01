<?php
include_once '../db.php';
$db = new DB();
$nombre = $_POST['nombre'];
$turno = $_POST['turno'];
$lunes = $_POST['lunes'];
$martes = $_POST['martes'];
$miercoles = $_POST['miercoles'];
$jueves = $_POST['jueves'];
$viernes = $_POST['viernes'];
$sabado = $_POST['sabado'];
$domingo = $_POST['domingo'];

$busquedaTurno = $db->connect()->prepare("SELECT turno from horarios where taller=$nombre");
$busquedaTurno->execute();
foreach ($busquedaTurno as $turnoT) {
    $turnoTaller = $turnoT[0];
    if (strcmp($turno, $turnoTaller) === 0) {

        $insertar = $db->connect()->prepare(" UPDATE `horarios` SET `lunes` = '$lunes',`martes` = '$martes',`miercoles` = '$miercoles', `jueves` = '$jueves',`viernes` = '$viernes', `sabado` = '$sabado',`domingo` = '$domingo' WHERE `horarios`.`taller` = $nombre and `horarios`.`turno`='$turno' ;");
        $insertar->execute();
        echo '<script type="text/javascript">
        alert("Horario editado con éxito ⊂(▀¯▀⊂)");
        window.location.href="../admin_horarios.php"; </script>';
    } else {
        echo '<script type="text/javascript">
  alert("No hay taller registrado en ese turno (╯°□°）╯︵ ( . 0 .)");
  window.location.href="../admin_horarios.php"; </script>';
    }
}




require_once('../admin_horarios.php');
