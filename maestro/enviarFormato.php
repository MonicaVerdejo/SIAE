<?php
include_once '../db.php';
session_start();
ob_start();
$db = new DB();
$mtro=$_SESSION['nombre'];
//datos del arhivo
$nombreArchivo = $_FILES['userfile']['name'];
$tipo_archivo = $_FILES['userfile']['type'];
$tamano_archivo = $_FILES['userfile']['size'];
$fileNameCmps = explode(".", $nombreArchivo);
$extensionArchivo = strtolower(end($fileNameCmps));
$nuevoNombre = $mtro . "  ". date("Y-m-d") . '.' . $extensionArchivo;

    //$_FILES['userfile']['name']=$mtro." ".date("Y-m-d").".$tipo_archivo";
    $carpeta_destino = './documentos/instrumentacion/' . $nuevoNombre;
    //$archivo = $carpeta_destino . $_FILES['userfile']['name'];
    if (move_uploaded_file($_FILES['userfile']['tmp_name'],  $carpeta_destino)) {

        $id = $_SESSION['id_mtro'];
        $taller = $_POST['taller'];
        $busquedataller = $db->connect()->prepare("SELECT id FROM `talleres` WHERE taller='$taller'");
        $busquedataller->execute();
        foreach ($busquedataller  as $row) {
            $taller_id = $row[0];
        }

            
            $sentencia = "INSERT INTO `documentos` (`id`, `maestro_id`, `taller_id`, `alumno_id`, `categoria`, `documento`,`fecha`) 
            VALUES ('', '$id', '$taller_id', '0', 'instrumentacionD', :documento,NOW());";
            $statement = $db->connect()->prepare($sentencia);
            $statement->execute(array(':documento' => $nuevoNombre));

            echo '<script type="text/javascript">
            alert("El archivo ha sido cargado correctamente");
            window.location.href="../maestro.php"; </script>';
    
    } else {
        echo '<script type="text/javascript">
            alert("Hubo un error al cargar el fichero, intente más tarde");
            window.location.href="../maestro.php"; </script>';
    }
    
ob_end_flush();
