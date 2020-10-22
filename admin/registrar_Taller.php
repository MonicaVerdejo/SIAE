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
    if (strcmp($categoria, $civico) === 0) {
       # echo ("civico");

        if (!empty($_FILES)) {
            # code...
            $check = @getimagesize($_FILES['file']['tmp_name']);
            if ($check !== false) {
                $carpeta_destino = '../img/civico/taller/';
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
                $carpeta_destino = '../img/deporte/taller/';
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
                $carpeta_destino = '../img/cultura/taller/';
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

    echo "<script>location.href='../administrativo.php';</script>";
} else {
    echo "Error, no se está ejecutando la consulta";
}

require_once('../administrativo.php');
