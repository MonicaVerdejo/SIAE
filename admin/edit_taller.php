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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && (($_POST['nombre'])!="No asignado")) {
    $tipo_archivo = $_FILES['file']['type'];
    //$tamano_archivo = $_FILES['file']['size'];   por si deseo darle un tamaño especifico

    //compruebo si las características del archivo son las que deseo, solo aceptara pdf y word
    if (!((strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png")))) {
        echo '<script type="text/javascript">
         alert("Selecciona una imagen por favor, las extensiones aceptadas son: jpeg, jpg y png.");
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
     $sql = "UPDATE `talleres` set `nombre`='$nombreR', `descripcion`='$descripcion', 
     `categoria`='$categoria', `direccion`='$direccion', `img1`=:img1 where id='$nombre'";
     $statement = $db->connect()->prepare($sql);
     $statement->execute(array(':img1' => $_FILES['file']['name']));
     echo '<script type="text/javascript">
     alert("Taller actualizado correctamente (ﾉ◕ヮ◕)ﾉ*:･ﾟ✧");
     window.location.href="../admin_taller.php"; </script>';
    }

} else {
    echo '<script type="text/javascript">
    alert("No se esta ejecutando la consulta (◞‸◟；) verifica hayas ingresado todos los datos");
    window.location.href="../admin_std.php"; </script>';
}

require_once('../admin_taller.php');
