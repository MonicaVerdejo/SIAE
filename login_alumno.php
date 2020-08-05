<?php
include_once 'db.php';
$db = new DB();
session_start();

if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $query = $db->connect()->prepare('SELECT * FROM usuario WHERE usuario = :usuario');
    $query->execute(['usuario' => $usuario]);

    $row = $query->fetch(PDO::FETCH_NUM); //transforma a un arreglo que puedo usar

    if (($row == true) && password_verify($_POST['password'], $row[3])) { //si existe contenido valida el rol
        $rol = $row[5];
        $_SESSION['rol'] = $rol;
        $_SESSION['usuario'] = $row[1];
        $_SESSION['imagen_profile'] = $row[6];
        $_SESSION['id_user'] = $row[0];
        $_SESSION['usuario'] = $usuario;


        switch ($rol) {
            case 2:
                header('location: alumno.php');
                break;
            default:
        }
    } else {
        // no existe el usuario
        echo '<script type="text/javascript">alert("Usuario o contraseña incorrectos")</script>';
    }
}
