<?php
include_once '../db.php';
$db = new DB();

$matricula = $_POST['matricula'];
$taller = $_POST['taller_id'];
$busqueda = $db->connect()->prepare("SELECT matricula FROM alumnos WHERE taller_id='$taller'");
$busqueda->execute();

foreach ($busqueda  as $row) {
    $matricula = $row[0];

    if ($matricula == $_POST['matricula']) {

        if (!empty($_POST['matricula'])) {
    
            $matricula = $_POST['matricula'];
            $representativo = $_POST['representativo'];
            //Editar los datos de la bd
            $editstd = $db->connect()->prepare("UPDATE `alumnos` SET  `representativo` = '$representativo' WHERE `alumnos`.`matricula` = '$matricula'; ");
            $editstd->execute();
            header('Location: ../maestro.php');
        } else {
           
                    
            $var = "No esta registrando";
        echo "<script>alert('" . $var . "');</script>";
        header('Location: ../maestro.php');
        }
    } else {
        
    
    
        echo'<script type="text/javascript">
    alert("No seas pendejo ese no es tu alumno");
    window.location.href="../maestro.php";
    </script>';
      
    }
}


require_once('../maestro.php');
