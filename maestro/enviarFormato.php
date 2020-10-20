<?php
include_once '../maestro.php';
include_once '../db.php';
ob_start();
$db = new DB();

//datos del arhivo
$tipo_archivo = $_FILES['userfile']['type'];
$tamano_archivo = $_FILES['userfile']['size'];

//compruebo si las características del archivo son las que deseo, solo aceptara pdf y word
if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "doc")))) {
    echo "La extensión de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li></td></tr></table>";
} else {
    $carpeta_destino = 'documentos/';
    $archivo = $carpeta_destino . $_FILES['userfile']['name'];
    if (move_uploaded_file($_FILES['userfile']['tmp_name'],  $archivo)) {

        $id = $_SESSION['id_mtro'];
        $taller = $_POST['taller'];
        $busquedataller = $db->connect()->prepare("SELECT id FROM `talleres` WHERE taller='$taller'");
        $busquedataller->execute();
        foreach ($busquedataller  as $row) {
            $taller_id = $row[0];
        }

        if ($sentencia == True) {
            # code...
            $sentencia = "INSERT INTO `documentos` (`id`, `maestro_id`, `taller_id`, `alumno_id`, `categoria`, `documento`) 
            VALUES ('', '$id', '$taller_id', '0', 'instrumentacionD', :documento);";
            $statement = $db->connect()->prepare($sentencia);
            $statement->execute(array(':documento' => $_FILES['userfile']['name']));

            echo "El archivo ha sido cargado correctamente.";
        }


    } else {
        echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
    }
}

echo "<script>location.href='../maestro.php';</script>";


ob_end_flush();
