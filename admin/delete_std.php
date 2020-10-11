<?php
include_once '../db.php';
$db = new DB();

if (isset($_POST['matricula'])) {
    $matricula = $_POST['matricula'];
 
    $eliminarstd = $db->connect()->prepare("DELETE FROM alumnos WHERE matricula='$matricula'");
    $eliminarstd->execute();

    header('Location: ../administrativo.php');
} else {
    echo 'no esta registrando';
}
require_once('../administrativo.php');
?>