<?php
include_once '../maestro.php';
include_once '../db.php';
ob_start();
$db = new DB();

//busco las coincidencias con la matricula del alumno y el taller
$matricula = $_POST['matricula'];
$taller = $_POST['taller_id'];


echo $matricula;
echo $taller;


header('location: ../maestro.php');

/*


//para cada una de las matriculas:
foreach ($busqueda  as $row) {
    $matricula = $row[0];
    
    if ($matricula == $_POST['matricula']) {
        #si las matriculas coinciden entonces puedo subir el archivo
        if (!empty($_POST['matricula'])) {
            

            //datos del arhivo
            $tipo_archivo = $_FILES['userfile']['type'];
            $tamano_archivo = $_FILES['userfile']['size'];

            //compruebo si las características del archivo son las que deseo, solo aceptara pdf y word
            if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "doc")))) {
                echo '<script type="text/javascript">
                alert("La extensión de los archivos no es correcta. <br><br> Sólo se permiten archivos con extensión .doc o .pdf");
                window.location.href="../maestro.php"; </script>';
            } else {
                $carpeta_destino = 'documentos/evaluacion/';
                $archivo = $carpeta_destino . $_FILES['userfile']['name'];
                if (move_uploaded_file($_FILES['userfile']['tmp_name'],  $archivo)) {
                    $id = $_SESSION['id_mtro'];
                   
                    if ($sentencia == True) {
                        # code...
                        $sentencia = "INSERT INTO `documentos` (`id`, `maestro_id`, `taller_id`, `alumno_id`, `categoria`, `documento`) 
                                     VALUES ('', '$id', '$taller', '$matricula', 'evaluacionB', :documento);";
                        $statement = $db->connect()->prepare($sentencia);
                        $statement->execute(array(':documento' => $_FILES['userfile']['name']));

                        echo "El archivo ha sido cargado correctamente.";
                    }
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }


        } else {
            $var = "No esta registrando";
            echo "<script>alert('" . $var . "');</script>";
            header('Location: ../maestro.php');
        }
    } else {
        #si las matriculas no coinciden dile al usuario amablemente que no hay coincidencias
        echo '<script type="text/javascript">
        alert("No seas pendejo ese no es tu alumno");
        window.location.href="../maestro.php"; </script>';
    }
}

*/






ob_end_flush();
