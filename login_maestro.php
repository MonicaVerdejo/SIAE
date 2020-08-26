<?php
include_once 'db.php';
$db = new DB();
session_start();

if (!empty($_POST['correo']) && !empty($_POST['password'])) {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $query = $db->connect()->prepare('SELECT * FROM maestro WHERE correo = :correo');
    $query->execute(['correo' => $correo]);

    $row = $query->fetch(PDO::FETCH_NUM); //transforma a un arreglo que puedo usar

    if (($row == true) && password_verify($_POST['password'], $row[3])) { //si existe contenido valida el rol
        $rol = $row[9];
        $_SESSION['rol'] = $rol;
        $_SESSION['nombre'] = $row[1];
        $_SESSION['id_mtro'] = $row[0];
        $_SESSION['sexo']= $row[7];
        switch ($rol) {
            case 3:
                header('location: maestro.php');
                break;
            default:
        }
    } else {
        // no existe el usuario
        echo '<script type="text/javascript">alert("Usuario o contraseña incorrectos")</script>';
        header('location: perfiles.html');
    }
}
