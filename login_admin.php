<?php
include_once 'db.php';
$db = new DB();
session_start();

if (!empty($_POST['correo']) && !empty($_POST['password'])) {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $query = $db->connect()->prepare('SELECT * FROM administrador WHERE correo = :correo');
    $query->execute(['correo' => $correo]);

    $row = $query->fetch(PDO::FETCH_NUM); //transforma a un arreglo que puedo usar

    if (($row == true) && password_verify($_POST['password'], $row[3])) { //si existe contenido valida el rol
        $rol = $row[7];
        $_SESSION['rol'] = $rol;
        $_SESSION['nombre'] = $row[1];
        $_SESSION['id_admin'] = $row[0];
        $_SESSION['img_profile']=$row[5];
        $_SESSION['correo']=$row[2];
        
       
        switch ($rol) {
            case 1:
                header('location: administrativo.php');
                break;
            default:
        }
    } else {
    
        echo '<script type="text/javascript">
        alert("Usuario o contraseña incorrectos");
        window.location.href="perfiles.html"; </script>';
    }
}
