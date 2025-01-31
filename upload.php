<?php
include_once 'administrativo.php';
include_once 'db.php';
ob_start();
$db = new DB();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {

    //datos del arhivo
    $tipo_archivo = $_FILES['file']['type'];
    //$tamano_archivo = $_FILES['file']['size'];   por si deseo darle un tamaño especifico

    //compruebo si las características del archivo son las que deseo, solo aceptara pdf y word
    if (!((strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png")))) {
        echo '<script type="text/javascript">
         alert("No seas pendejo, es una imagen lo que debes seleccionar");
         window.location.href="administrativo.php"; </script>';
    } else {

        $image = getimagesize($_FILES['file']['tmp_name']);
        //Definir un tamaño en pixeles para la imagen...
        $minimum = array(
            'width' => '200',
            'height' => '200'
        );

        $maximum = array(
            'width' => '1200',
            'height' => '1200'
        );

        $image_width = $image[0];
        $image_height = $image[1];

       
        if ( $image_width < $minimum['width'] || $image_height < $minimum['height'] ) {
            //$file['error'] = $too_small;
            //return $file;
            echo '<script type="text/javascript">
            alert("La imagen que seleccionaste es muy pequeña, escoge una que sea mayor de 300x300 pixeles y menor de 700x700");
            window.location.href="administrativo.php"; </script>';
        }elseif ( $image_width > $maximum['width'] || $image_height > $maximum['height'] ) {
            //$file['error'] = $too_large;
            //return $file;
            echo '<script type="text/javascript">
            alert("La imagen que seleccionaste es demasiado grande, escoge una que sea mayor de 300x300 pixeles y menor de 700x700");
            window.location.href="administrativo.php"; </script>';
        }else {
            //return $file;
            $check = @getimagesize($_FILES['file']['tmp_name']);
            if ($check !== false) {
                $carpeta_destino = 'img/img_profile/';
                $archivo = $carpeta_destino . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $archivo);
            }


            $id = $_SESSION['id_admin'];

            $sql = "UPDATE administrador SET img_profile=:img_profile WHERE id=$id";
            $statement = $db->connect()->prepare($sql);
            $statement->execute(array(':img_profile' => $_FILES['file']['name']));
            //$_SESSION['imagen_profile']=$VARIABLE_HOST;

            $_SESSION['img_profile'] = $statement;

            $query = $db->connect()->prepare('SELECT * FROM administrador WHERE correo = :correo');
            $query->execute(['correo' => $_SESSION['correo']]);

            $row = $query->fetch(PDO::FETCH_NUM);

            //session_destroy('imagen_profile');
            //session_start();
            $_SESSION['img_profile'] = $row[5];
            echo "<script>location.href='administrativo.php';</script>";
        }


    }
}
ob_end_flush();
