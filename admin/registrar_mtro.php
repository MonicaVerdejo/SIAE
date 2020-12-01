<?php
include_once '../db.php';
$db = new DB();
$taller = $_POST['taller'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$curp = $_POST['curp'];

$telefono = $_POST['telefono'];
$sexo = $_POST['sexo'];

if ((($_POST['taller']) != "No asignado")) {
   



    if (strpos($correo, 'outlook.com') || strpos($correo, '@gmail.com') || strpos($correo, '@hotmail.com') || strpos($correo, '@yahoo.es') !== false) {
        #check email register on bd
        $stmtCorreosRegistrados = $db->connect()->prepare('SELECT correo FROM maestro WHERE correo = :correo');
        $stmtCorreosRegistrados->bindParam(':correo', $_POST['correo']);
        $stmtCorreosRegistrados->execute();
        #check curp register on bd
        $stmtCurpRegistrados = $db->connect()->prepare('SELECT curp FROM maestro WHERE curp = :curp');
        $stmtCurpRegistrados->bindParam(':curp', $_POST['curp']);
        $stmtCurpRegistrados->execute();

        if (($stmtCorreosRegistrados->rowCount() > 0) || ($stmtCurpRegistrados->rowCount() > 0)) {
            echo '<script type="text/javascript">
             alert("El correo o CURP que has proporcionado ya se encuentra registrado con otra cuenta, por favor intenta con otro");
             window.location.href="../admin_mtro.php";
             </script>';
        } else {
             //Si algun otro mtro tiene ese id entonces lo borramos
             $editTblmtro = $db->connect()->prepare("UPDATE `maestro` set 
             `taller_asignado`=1 WHERE `maestro`.`taller_asignado` = '$taller';");
              $editTblmtro->execute();
            #code register
            $password = password_hash($_POST['curp'], PASSWORD_BCRYPT);
            //Insertar los datos en la bd
            $newteacher = $db->connect()->prepare("INSERT INTO `maestro` (`id`, `nombre`, `correo`, `password`, `taller_asignado`, `curp`, `telefono`, `sexo`, `Token`, `rol_id`) 
                                                                VALUES ('', '$nombre', '$correo', '$password', '$taller', '$curp', '$telefono', '$sexo', '', '3');");
            $newteacher->execute();

            #Consultar el id del maestro que acabamos de registrar
            $id = $db->connect()->prepare("SELECT `id`, `nombre`, `curp` FROM  `maestro` WHERE 
            `nombre`='$nombre' and `curp`='$curp'");
            $id->execute();

            foreach ($id as $row) {
                echo $row[0];
                #Actualizar el campo maestro_asignado en tabla talleres
                $sql = "UPDATE `talleres` set `mtro_asignado`='$row[0]' WHERE 
           `id`='$taller'";
                $statement = $db->connect()->prepare($sql);
                $statement->execute();
            }
            echo '<script type="text/javascript">
            alert("Maestro registrado correctamente (ﾉ◕ヮ◕)ﾉ*:･ﾟ✧");
            window.location.href="../admin_mtro.php"; </script>';
        }
    } else {
        echo '<script type="text/javascript">
        alert("El correo no es de una credencial válida, intenta con @outlook.com, @gmail.com, @hotmail.com o @yahoo.es");
        window.location.href="../admin_mtro.php";
        </script>';
    }
} else {
    echo '<script type="text/javascript">
    alert("No se esta ejecutando la consulta (◞‸◟；) verifica hayas ingresado todos los datos");
    window.location.href="../admin_mtro.php"; </script>';
}
require_once('../admin_mtro.php');
