<?php
include_once '../db.php';
$db = new DB();

if ((($_POST['taller'])!="No asignado") && (($_POST['mtro'])!="Sin Asignar")) {
    $id_mtro = $_POST['mtro'];
    $taller = $_POST['taller'];
    $telefono = $_POST['telefono'];
    //Borramos el taller que tenga asignado ese maestro
    $editTblmtro = $db->connect()->prepare("UPDATE `talleres` set 
    `mtro_asignado`=1 WHERE `mtro_asignado` = '$id_mtro';");
    $editTblmtro->execute();


    //Si algun otro mtro tiene ese id entonces lo borramos
    $editTblmtro = $db->connect()->prepare("UPDATE `maestro` set 
    `taller_asignado`=1 WHERE `maestro`.`taller_asignado` = '$taller';");
    $editTblmtro->execute();

    //Insertar los datos en la bd
    $editmtro = $db->connect()->prepare("UPDATE `maestro` set 
    `taller_asignado`='$taller', `telefono`='$telefono' WHERE `maestro`.`id` = '$id_mtro';");
    $editmtro->execute();

    //Insertar los datos en la bd
    $editTblTaller = $db->connect()->prepare("UPDATE `talleres` set 
    `mtro_asignado`='$id_mtro' WHERE `talleres`.`id` = '$taller';");
    $editTblTaller->execute();
    echo '<script type="text/javascript">
    alert("Maestro actualizado correctamente (ﾉ◕ヮ◕)ﾉ*:･ﾟ✧");
    window.location.href="../admin_mtro.php"; </script>';
} else {
    echo '<script type="text/javascript">
  alert("No has seleccionado todos los datos o ha ocurrido algun error interno, intenta otra vez.");
  window.location.href="../admin_mtro.php"; </script>';
}
require_once('../admin_mtro.php');
