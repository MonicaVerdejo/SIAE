<?php
include_once 'db.php';
$db = new DB();
session_start();

if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $query = $db->connect()->prepare('SELECT * FROM alumnos WHERE matricula = :usuario');
    $query->execute(['usuario' => $usuario]);

    $row = $query->fetch(PDO::FETCH_NUM); //transforma a un arreglo que puedo usar

    if (($row == true) && password_verify($_POST['password'], $row[3])) { //si existe contenido valida el rol
        $rol = $row[11];
        $_SESSION['rol'] = $rol;
        $_SESSION['nombre'] = $row[1];
        $_SESSION['id_user'] = $row[0];
        $_SESSION['estatus'] = $row[7];
        $_SESSION['sexo'] = $row[10];
        $_SESSION['matricula'] = $row[2];
        $_SESSION['carrera'] = $row[6];
        $_SESSION['semestre'] = $row[8];
        $_SESSION['taller_id'] = $row[4];
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
