<?php
session_start();
include_once '../db.php';
ob_start();
$db = new DB();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    $tipo_archivo = $_FILES['file']['type'];
    if (!((strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png")))) {
        echo '<script type="text/javascript">
         alert("ᕙ( ~ . ~ )ᕗ Por favor selecciona una imagen, los formatos aceptables son jpeg, jpg y png.");
         window.location.href="../admin_cms.php"; </script>';
    } else {
        $image = getimagesize($_FILES['file']['tmp_name']);
        //Definir un tamaño en pixeles para la imagen...
        $minimum = array(
            'width' => '800',
            'height' => '800'
        );
        $maximum = array(
            'width' => '2000',
            'height' => '2000'
        );
        $image_width = $image[0];
        $image_height = $image[1];
        if ($image_width < $minimum['width'] || $image_height < $minimum['height']) {
            //$file['error'] = $too_small;
            //return $file;
            echo '<script type="text/javascript">
            alert("La imagen que seleccionaste es muy pequeña, escoge una que sea mayor de 800x800 pixeles y menor de 2000x2000");
            window.location.href="../admin_cms.php"; </script>';
        } elseif ($image_width > $maximum['width'] || $image_height > $maximum['height']) {
            echo '<script type="text/javascript">
            alert("La imagen que seleccionaste es demasiado grande, escoge una que sea mayor de 800x800 pixeles y menor de 2000x2000");
            window.location.href="../admin_cms.php"; </script>';
        } else {
            //return $file;
            $nombre = 'inicio.jpg';
            $check = @getimagesize($_FILES['file']['tmp_name']);
            $_FILES['file']['name'] = 'inicio.jpg';
            if ($check !== false) {
                $carpeta_destino = '../img/img_portada/inicio/';
                $archivo = $carpeta_destino . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $archivo);
                $sql = "UPDATE cms SET img_index=:img_index where id=1";
                $statement = $db->connect()->prepare($sql);
                $statement->execute(array(':img_index' => $_FILES['file']['name']));
                echo '<script type="text/javascript">
            alert("Imagen asignada con éxito ヽ〳 ՞ ᗜ ՞ 〵ง");
            window.location.href="../admin_cms.php"; </script>';
            }else{
                echo '<script type="text/javascript">
                alert("La imagen no ha podido ser asignada T.T");
                window.location.href="../admin_cms.php"; </script>';
            }
        }
    }
}
ob_end_flush();
