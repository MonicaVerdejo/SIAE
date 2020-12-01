<?php
include_once '../db.php';
$db = new DB();

if (isset($_POST['mtro'])) {
    $id_mtro = $_POST['mtro'];
  //Antes de eliminar al maestro debere asignar un maestro null a la tabla talleres
  $editTaller = $db->connect()->prepare("UPDATE `talleres` SET `mtro_asignado` = '1' WHERE `talleres`.`mtro_asignado` =$id_mtro;");
  $editTaller->execute();

    //Eliminar los datos en la bd
    $eliminar = $db->connect()->prepare("DELETE FROM maestro WHERE id='$id_mtro'");
    $eliminar->execute();

    echo '<script type="text/javascript">
    alert("Maestro eliminado con éxito ⊂(▀¯▀⊂)");
    window.location.href="../admin_mtro.php"; </script>';
} else {
  echo '<script type="text/javascript">
  alert("Error ( ຈ ﹏ ຈ )");
  window.location.href="../admin_mtro.php"; </script>';
}
require_once('../admin_mtro.php');
