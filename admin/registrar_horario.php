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
//saber cuantos registros de horario hay para un mismo taller
$vecesTaller = $db->connect()->prepare("SELECT count(Turno) from horarios where taller=$nombre");
$vecesTaller->execute();
$number_of_rows = $vecesTaller->fetchColumn();
#echo $number_of_rows;


if ($number_of_rows > 2) {
    #Si excede no le permitiremos añadir más, ya que solo podemos tener vespertino y matutino
    echo '<script type="text/javascript">
    alert("Ya no puedes registrar más horarios para este taller, intenta modificando alguno de los dos turnos permitidos");
    window.location.href="../admin_horarios.php"; </script>';
} else {


    $busquedaTurno = $db->connect()->prepare("SELECT turno from horarios where taller=$nombre");
    $busquedaTurno->execute();
    foreach ($busquedaTurno as $turnoT) {
        $turnoTaller = $turnoT[0];
    }

    if (strcmp($turno, $turnoTaller) === 0) {
        #echo "pendejo no puedes repetir turnos";
        echo '<script type="text/javascript">
        alert("Ya existe un horario para el turno que escogiste, intenta con otro o modifica el deseado");
        window.location.href="../admin_horarios.php"; </script>';
    } else {
        #echo "el turno no esta dado de alta";
        #Ya que el turno no ha sido dado de alta con anterioridad procederemos a insertar el nuevo registro en la bd
        $insertar = $db->connect()->prepare("INSERT INTO `horarios` (`id`, `taller`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`, `turno`) 
        VALUES (NULL, '$nombre', '$lunes', '$martes', '$miercoles', '$jueves', '$viernes', '$sabado', '$domingo', '$turno');");
        $insertar->execute();
        header('Location: ../admin_horarios.php');

    }
}


require_once('../admin_horarios.php');
