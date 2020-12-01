<?php
include_once '../db.php';
$db = new DB();

if (!empty($_POST['estatus']) && !empty($_POST['matricula'])) {
    $matricula = $_POST['matricula'];
    $estatus=$_POST['estatus'];

    //Editar los datos de la bd
    $editstd = $db->connect()->prepare("UPDATE `alumnos` SET `estatus` = '$estatus' WHERE `alumnos`.`matricula` = '$matricula'; ");
    $editstd->execute();
    echo '<script type="text/javascript">
    alert("Asignación correcta ヽ〳 ՞ ᗜ ՞ 〵ง");
    window.location.href="../administrativo.php"; </script>';
} else {
    echo '<script type="text/javascript">
               alert("Error, no se proceso correctamente ᕙ( ~ . ~ )ᕗ");
               window.location.href="../administrativo.php"; </script>';
}
require_once('../administrativo.php');
?>