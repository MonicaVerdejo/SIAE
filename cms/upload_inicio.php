<?php 
include_once '../administrativo.php';
include_once '../db.php';
ob_start();
$db = new DB();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    # code...

    $nombre='inicio.jpg';
    $check = @getimagesize($_FILES['file']['tmp_name']);
    $_FILES['file']['name']='inicio.jpg';
    if ($check !== false) {
        $carpeta_destino = '../img/img_portada/inicio/';
        $archivo = $carpeta_destino . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $archivo);
        
    }
    
   
    $sql = "UPDATE cms SET img_index=:img_index where id=1";
    $statement = $db->connect()->prepare($sql);
    $statement->execute(array(':img_index' => $_FILES['file']['name']));
    //$_SESSION['imagen_profile']=$VARIABLE_HOST;
    
    echo "<script>location.href='../administrativo.php';</script>";

}
ob_end_flush();


?>


