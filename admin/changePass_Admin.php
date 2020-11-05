<?php
require '../db.php';
session_start();
$db = new DB();
$idAdmin = $_SESSION['id_admin'];

if (!empty($_POST['oldPass']) && !empty($_POST['newPass'])) {
    $consulta = $db->connect()->prepare("SELECT `password` FROM `administrador` WHERE id=$idAdmin");
    $consulta->execute();
    foreach ($consulta as $password) {
        $oldpassword = $password[0];
    }
    $password = $_POST['oldPass'];

    if (password_verify($password, $oldpassword)) {
        $newpassword = password_hash($_POST['newPass'], PASSWORD_BCRYPT);
        $cambiarPass = $db->connect()->prepare("UPDATE administrador SET password = '$newpassword' WHERE id =$idAdmin");
        $cambiarPass->execute();
        echo '<script type="text/javascript">
        alert("La contraseña fue cambiada con éxito, reinicia tu sesión.");
        window.location.href="../perfiles.html"; </script>';
        session_destroy();
    } else {
        echo '<script type="text/javascript">
            alert("Tu contraseña actual no coincide con la registrada");
            window.location.href="../administrativo.php"; </script>';
    }
} else {
    echo '<script type="text/javascript">
            alert("Error. No se han enviado correctamente los datos");
            window.location.href="../administrativo.php"; </script>';
}
