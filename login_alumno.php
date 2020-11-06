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

    if (($row == true) && password_verify($_POST['password'], $row[2])) { //si existe contenido valida el rol
        $rol = $row[10];
        $_SESSION['rol'] = $rol;
        $_SESSION['nombre'] = $row[0];
        $_SESSION['estatus'] = $row[6];
        $_SESSION['sexo'] = $row[9];
        $_SESSION['matricula'] = $row[1];
        $_SESSION['carrera'] = $row[5];
        $_SESSION['semestre'] = $row[7];
        $_SESSION['taller_id'] = $row[3];
        $_SESSION['credito'] = $row[8];
        switch ($rol) {
            case 2:
                header('location: alumno.php');
                break;
            default:
        }
    } else {
        echo '<script type="text/javascript">
        alert("Usuario o contraseña incorrectos");
        window.location.href="perfiles.html"; </script>';
    }
}
