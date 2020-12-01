<?php
include_once '../db.php';
$db = new DB();

if (!empty($_POST['nombre']) ) {
    $id_admin = $_POST['nombre'];
    
    //Eliminar los datos en la bd
    $eliminar = $db->connect()->prepare("DELETE FROM administrador WHERE id='$id_admin'");
    $eliminar->execute();
    echo '<script type="text/javascript">
    alert("Administrador eliminado con éxito ヽ〳 ՞ ᗜ ՞ 〵ง");
    window.location.href="../administrativo.php"; </script>';
} else {
    echo '<script type="text/javascript">
    alert("Error. No se pudo eliminar ( ຈ ﹏ ຈ )");
    window.location.href="../administrativo.php"; </script>';
}
require_once('../administrativo.php');
?>