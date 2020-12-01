<?php
include_once '../db.php';
$db = new DB();

if (isset($_POST['matricula'])) {
    $matricula = $_POST['matricula'];
    $eliminarstd = $db->connect()->prepare("DELETE FROM alumnos WHERE matricula='$matricula'");
    $eliminarstd->execute();
    echo '<script type="text/javascript">
    alert("Alumno eliminado con éxito ⊂(▀¯▀⊂)");
    window.location.href="../admin_std.php"; </script>';
} else {
    echo '<script type="text/javascript">
  alert("Error ( ຈ ﹏ ຈ )");
  window.location.href="../admin_std.php"; </script>';
}
require_once('../admin_std.php');
?>