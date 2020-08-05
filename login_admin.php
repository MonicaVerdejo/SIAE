<?php
include_once 'db.php';
$db = new DB();
session_start();

if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {
        case 1:
            header('location: administrativo.php');
            break;

        case 3:
            header('location: maestro.php');
            break;

        default:
    }
}

if (!empty($_POST['correo']) && !empty($_POST['password'])) {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $query = $db->connect()->prepare('SELECT * FROM usuario WHERE correo = :correo');
    $query->execute(['correo' => $correo]);

    $row = $query->fetch(PDO::FETCH_NUM); //transforma a un arreglo que puedo usar

    if (($row == true) && password_verify($_POST['password'], $row[3])) { //si existe contenido valida el rol
        $rol = $row[5];
        $_SESSION['rol'] = $rol;
        $_SESSION['usuario'] = $row[1];
        $_SESSION['imagen_profile'] = $row[6];
        $_SESSION['id_user'] = $row[0];
        $_SESSION['correo'] = $correo;


        switch ($rol) {
            case 1:
                header('location: administrativo.php');
                break;
            case 3:
                header('location: maestro.php');
                break;
            default:
        }
    } else {
        // no existe el usuario
        echo '<script type="text/javascript">alert("Usuario o contraseña incorrectos")</script>';
    }
}
