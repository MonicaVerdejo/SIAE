<?php
include_once '../db.php';
$db = new DB();
$nombre = $_POST['nombre'];
$nombreR = $_POST['nombreR'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
$direccion = $_POST['direccion'];

$civico = 'Civico';
$deportivo = 'Deportivo';
$cultural = 'Cultural';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $tipo_archivo = $_FILES['file']['type'];
    //$tamano_archivo = $_FILES['file']['size'];   por si deseo darle un tamaño especifico

    //compruebo si las características del archivo son las que deseo, solo aceptara pdf y word
    if (!((strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png")))) {
        echo '<script type="text/javascript">
         alert("No seas pendejo, es una imagen lo que debes seleccionar");
         window.location.href="../admin_taller.php"; </script>';
    } else {
        
        if (strcmp($categoria, $civico) === 0) {
            # echo ("civico");

            if (!empty($_FILES)) {
                # code...
                $check = @getimagesize($_FILES['file']['tmp_name']);
                if ($check !== false) {
                    $carpeta_destino = '../img/Civico/taller/';
                    $archivo = $carpeta_destino . $_FILES['file']['name'];
                    move_uploaded_file($_FILES['file']['tmp_name'], $archivo);
                }
            }
        } else if (strcmp($categoria, $deportivo) === 0) {
            #echo ("deportivo");

            if (!empty($_FILES)) {
                # code...
                $check = @getimagesize($_FILES['file']['tmp_name']);
                if ($check !== false) {
                    $carpeta_destino = '../img/Deportivo/taller/';
                    $archivo = $carpeta_destino . $_FILES['file']['name'];
                    move_uploaded_file($_FILES['file']['tmp_name'], $archivo);
                }
            }
        } else if (strcmp($categoria, $cultural) === 0) {
            # echo ("cultural");

            if (!empty($_FILES)) {
                # code...
                $check = @getimagesize($_FILES['file']['tmp_name']);
                if ($check !== false) {
                    $carpeta_destino = '../img/Cultural/taller/';
                    $archivo = $carpeta_destino . $_FILES['file']['name'];
                    move_uploaded_file($_FILES['file']['tmp_name'], $archivo);
                }
            }
        } else {
            echo ("sin coincidencias");
        }

        #Despues de verificar la categoria para una correcta clasicacion de las imagenes, se ejecuta la consulta 
        $sql = "INSERT INTO `talleres` (`id`, `taller`, `nombre`, `descripcion`, `mtro_asignado`, `categoria`, `direccion`, `img1`)
            VALUES (NULL, '$nombre', '$nombreR','$descripcion','1','$categoria','$direccion',:img1)";
        $statement = $db->connect()->prepare($sql);
        $statement->execute(array(':img1' => $_FILES['file']['name']));

        echo "<script>location.href='../admin_taller.php';</script>";
    }


} else {
    echo "Error, no se está ejecutando la consulta";
}

require_once('../admin_taller.php');
