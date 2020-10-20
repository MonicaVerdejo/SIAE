<?php
include_once 'db.php';
require_once 'maestro.php';
$db = new DB();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['taller']) && !empty($_POST['mensaje'])) {
    
    $mensaje = $_POST['mensaje'];
    $mtro_id = $_POST['mtro_id'];
    $taller = $_POST['taller'];
    $busquedataller = $db->connect()->prepare("SELECT id FROM `talleres` WHERE taller='$taller'");
    $busquedataller->execute();
    foreach ($busquedataller  as $row) {$taller_id= $row[0];}
    
    if (!empty($busquedataller)) {
       
        $query = $db->connect()->prepare("INSERT INTO mensajemaestro (mensaje,fecha,estado,mtro_id,taller_id) 
                                      VALUES('$mensaje', now(), 0 ,'$mtro_id', '$taller_id');");
        $query->execute();

    }
}

echo "<script>location.href='maestro.php';</script>";