<?php
include_once '../db.php';
session_start();
ob_start();
$db = new DB();
$mtro=$_SESSION['nombre'];
//datos del arhivo
$tipo_archivo = $_FILES['userfile']['type'];
$tamano_archivo = $_FILES['userfile']['size'];

//compruebo si las características del archivo son las que deseo, solo aceptara pdf y word
if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "doc")))) {
    echo '<script type="text/javascript">
    alert("Sólo se permiten archivos con la extension .doc y .pdf");
    window.location.href="../maestro.php"; 
    </script>';
} else if(strpos($tipo_archivo, "pdf")){
    $_FILES['userfile']['name']=$mtro.'.pdf';
    $carpeta_destino = 'documentos/instrumentacion/';
    $archivo = $carpeta_destino . $_FILES['userfile']['name'];
    if (move_uploaded_file($_FILES['userfile']['tmp_name'],  $archivo)) {

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
            $statement->execute(array(':documento' => $_FILES['userfile']['name']));

            echo '<script type="text/javascript">
            alert("El archivo ha sido cargado correctamente");
            window.location.href="../maestro.php"; </script>';
    
    } else {
        echo '<script type="text/javascript">
            alert("Hubo un error al cargar el fichero, intente más tarde");
            window.location.href="../maestro.php"; </script>';
    }
    
}else{
    $_FILES['userfile']['name']=$mtro.'.docx';
    $carpeta_destino = 'documentos/instrumentacion/';
    $archivo = $carpeta_destino . $_FILES['userfile']['name'];
    if (move_uploaded_file($_FILES['userfile']['tmp_name'],  $archivo)) {

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
            $statement->execute(array(':documento' => $_FILES['userfile']['name']));

            echo '<script type="text/javascript">
            alert("El archivo ha sido cargado correctamente");
            window.location.href="../maestro.php"; </script>';
    
    } else {
        echo '<script type="text/javascript">
            alert("Hubo un error al cargar el fichero, intente más tarde");
            window.location.href="../maestro.php"; </script>';
    }
}



ob_end_flush();
