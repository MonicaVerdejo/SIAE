<?php
include_once 'hotel_principal.php';
include_once 'db.php';
ob_start();
$db = new DB();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    # code...
    $check = @getimagesize($_FILES['file']['tmp_name']);
    if ($check !== false) {
        $carpeta_destino = 'public/img_profile/';
        $archivo = $carpeta_destino . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $archivo);
    }
    

    $id = $_SESSION['id_user'];

    $sql = "UPDATE usuario SET imagen_profile=:imagen_profile WHERE id=$id";
    $statement = $db->connect()->prepare($sql);
       $statement->execute(array(':imagen_profile' => $_FILES['file']['name']));
    //$_SESSION['imagen_profile']=$VARIABLE_HOST;
    
    $_SESSION['imagen_profile'] = $statement; 

    $query = $db->connect()->prepare('SELECT * FROM usuario WHERE correo = :correo');
    $query->execute(['correo' => $_SESSION['correo']]);

    $row = $query->fetch(PDO::FETCH_NUM);

    //session_destroy('imagen_profile');
    //session_start();
    $_SESSION['imagen_profile'] = $row[6];
    echo "<script>location.href='hotel_principal.php';</script>";

     
    

}
ob_end_flush();
?>

