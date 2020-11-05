<?php
//include_once '../administrativo.php';
include_once '../db.php';
ob_start();
$db = new DB();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    # code...
    $tipo_archivo = $_FILES['file']['type'];
    if (!((strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png")))) {
        echo '<script type="text/javascript">
         alert("No seas pendejo, es una imagen lo que debes seleccionar");
         window.location.href="../admin_cms.php"; </script>';
    } else {
        $check = @getimagesize($_FILES['file']['tmp_name']);
        $_FILES['file']['name'] = 'deportivo.jpg';
        if ($check !== false) {
            $carpeta_destino = '../img/img_portada/deportivo/';
            $archivo = $carpeta_destino . $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $archivo);
        }
        $sql = "UPDATE cms SET img_deporte=:img_deportivo where id=1";
        $statement = $db->connect()->prepare($sql);
        $statement->execute(array(':img_deportivo' => $_FILES['file']['name']));
        //$_SESSION['imagen_profile']=$VARIABLE_HOST;

        echo "<script>location.href='../admin_cms.php';</script>";
    }
}
ob_end_flush();
