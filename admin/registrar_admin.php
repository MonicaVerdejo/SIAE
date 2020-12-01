<?php
include_once '../db.php';
$db = new DB();

if (!empty($_POST['curp']) && !empty($_POST['nombre']) && !empty($_POST['correo'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $curp = $_POST['curp'];
    $sexo = $_POST['sexo'];
   

    if (strpos($correo, 'outlook.com') || strpos($correo, '@gmail.com') || strpos($correo, '@hotmail.com') || strpos($correo, '@yahoo.es') !== false) {
        #check email register on bd
        $stmtCorreosRegistrados = $db->connect()->prepare('SELECT correo FROM administrador WHERE correo = :correo');
        $stmtCorreosRegistrados->bindParam(':correo', $_POST['correo']);
        $stmtCorreosRegistrados->execute();
        #check curp register on bd
        $stmtCurpRegistrados = $db->connect()->prepare('SELECT curp FROM administrador WHERE curp = :curp');
        $stmtCurpRegistrados->bindParam(':curp', $_POST['curp']);
        $stmtCurpRegistrados->execute();

        if (($stmtCorreosRegistrados->rowCount() > 0) || ($stmtCurpRegistrados->rowCount() > 0)) {
            echo '<script type="text/javascript">
             alert("El correo o CURP que has proporcionado ya se encuentra registrado con otra cuenta, por favor intenta con otro");
             window.location.href="../administrativo.php";
             </script>';
        } else {
             
            #code register
            $password = password_hash($_POST['curp'], PASSWORD_BCRYPT);
            //Insertar los datos en la bd
            $newadmin = $db->connect()->prepare("INSERT INTO `administrador` (`id`, `nombre`, `correo`, `password`,  `curp`, `img_profile`, `Token`, `rol_id`, `sexo`) 
                                                                VALUES ('', '$nombre', '$correo', '$password', '$curp', 'default.jpg',  '', '1', '$sexo');");
            $newadmin->execute();

            echo '<script type="text/javascript">
     alert("Administrador registrado con éxito (ﾉ◕ヮ◕)ﾉ*:･ﾟ✧");
     window.location.href="../administrativo.php"; </script>';
        }
    } else {
        echo '<script type="text/javascript">
        alert("El correo no es de una credencial válida, intenta con @outlook.com, @gmail.com, @hotmail.com o @yahoo.es");
        window.location.href="../administrativo.php";
        </script>';
    }
} else {
    echo '<script type="text/javascript">
    alert("No se esta ejecutando la consulta (◞‸◟；) verifica hayas ingresado todos los datos");
    window.location.href="../admin_std.php"; </script>';
}
require_once('../administrativo.php');
