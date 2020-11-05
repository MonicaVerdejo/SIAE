<?php
//include_once '../admin_cms.php';
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

        $image = getimagesize($_FILES['file']['tmp_name']);
        //Definir un tamaño en pixeles para la imagen...
        $minimum = array(
            'width' => '500',
            'height' => '500'
        );

        $maximum = array(
            'width' => '500',
            'height' => '500'
        );

        $image_width = $image[0];
        $image_height = $image[1];


        if ($image_width < $minimum['width'] || $image_height < $minimum['height']) {
            //$file['error'] = $too_small;
            //return $file;
            echo '<script type="text/javascript">
            alert("La imagen que seleccionaste es muy pequeña, para preservar la estética de la páagina forzosamente requerimos una imagen de 500x500 pixeles");
            window.location.href="../admin_cms.php"; </script>';
        } elseif ($image_width > $maximum['width'] || $image_height > $maximum['height']) {
            //$file['error'] = $too_large;
            //return $file;
            echo '<script type="text/javascript">
            alert("La imagen que seleccionaste es demasiado grande, para preservar la estética de la páagina forzosamente requerimos una imagen de 500x500 pixeles");
            window.location.href="../admin_cms.php"; </script>';
        } else {
            $check = @getimagesize($_FILES['file']['tmp_name']);
            $_FILES['file']['name'] = 'slider3.jpg';
            if ($check !== false) {
                $carpeta_destino = '../img/img_portada/slider/';
                $archivo = $carpeta_destino . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $archivo);
            }
            $sql = "UPDATE cms SET slider3=:slider3 where id=1";
            $statement = $db->connect()->prepare($sql);
            $statement->execute(array(':slider3' => $_FILES['file']['name']));
            //$_SESSION['imagen_profile']=$VARIABLE_HOST;

            echo "<script>location.href='../admin_cms.php';</script>";
        }
    }
}
ob_end_flush();
