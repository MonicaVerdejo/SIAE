<?php
include_once 'db.php';
require_once 'administrativo.php';
$db = new DB();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['mensaje'])) {
    $mensaje = $_POST['mensaje'];
    $admin_id = $_POST['admin_id'];


    $query = $db->connect()->prepare("INSERT INTO mensajeadmin (mensaje,fecha,estado,admin_id) 
                                      VALUES('$mensaje', now(), 0 ,'$admin_id');");
    $query->execute();
}
