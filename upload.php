<?php
include_once 'administrativo.php';
include_once 'db.php';
ob_start();
$db = new DB();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    # code...
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
    $_SESSION['img_profile'] = $row[6];
    echo "<script>location.href='administrativo.php';</script>";

     
    

}
ob_end_flush();
?>

