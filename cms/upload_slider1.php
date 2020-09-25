<?php 
include_once '../administrativo.php';
include_once '../db.php';
ob_start();
$db = new DB();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    # code...
    $check = @getimagesize($_FILES['file']['tmp_name']);
    $_FILES['file']['name']='slider1.jpg';
    if ($check !== false) {
        $carpeta_destino = '../img/img_portada/slider/';
        $archivo = $carpeta_destino . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $archivo);
        
    }
    
   
    $sql = "UPDATE cms SET slider1=:slider1 where id=1";
    $statement = $db->connect()->prepare($sql);
    $statement->execute(array(':slider1' => $_FILES['file']['name']));
    //$_SESSION['imagen_profile']=$VARIABLE_HOST;
    
    echo "<script>location.href='../administrativo.php';</script>";

}
ob_end_flush();


?>


