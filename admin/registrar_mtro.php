<?php
include_once '../db.php';
$db = new DB();

if (isset($_POST['taller'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $curp = $_POST['curp'];
    $taller = $_POST['taller'];
    $telefono = $_POST['telefono'];
    $sexo = $_POST['sexo'];
    $password = password_hash($_POST['curp'], PASSWORD_BCRYPT);
    
    //Insertar los datos en la bd
    $newteacher = $db->connect()->prepare("INSERT INTO `maestro` (`id`, `nombre`, `correo`, `password`, `taller_asignado`, `curp`, `telefono`, `sexo`, `Token`, `rol_id`) 
                                                        VALUES ('', '$nombre', '$correo', '$password', '$taller', '$curp', '$telefono', '$sexo', '', '3');");
    $newteacher->execute();
    
    #Consultar el id del maestro que acabamos de registrar

    $id = $db->connect()->prepare("SELECT `id`, `nombre`, `curp` FROM  `maestro` WHERE 
    `nombre`='$nombre' and `curp`='$curp'");
    $id->execute();

    foreach ($id as $row) {
        echo $row[0];
        
   #Actualizar el campo maestro_asignado en tabla talleres
   $sql = "UPDATE `talleres` set `mtro_asignado`='$row[0]' WHERE 
   `id`='$taller'";
   $statement = $db->connect()->prepare($sql);
   $statement->execute();
    }





    header('Location: ../administrativo.php');
} else {
    echo 'no esta registrando';
}
require_once('../administrativo.php');
