<?php
require_once '../db.php';
$db = new DB();
session_start();
if (!empty($_POST['matricula'])) {
    $matricula = $_POST['matricula'];
    $nivelDesempeño = $_POST['nivelDesempeño'];
    $valorN = $_POST['valorN'];
    $periodo = $_POST['periodo'];
    $valorCurricular = $_POST['valorCurricular'];
    $jefeDepEscolares = $_POST['jefeDepEscolares'];
    $maestroAsignado = $_POST['mtro'];
    //buscar datos del alumno
    $sql = "SELECT nombre, carrera FROM alumnos where matricula=$matricula ";
    $statement = $db->connect()->prepare($sql);
    $statement->execute();

    foreach ($statement as $row) {
        $nombreAlumno = $row[0];
        $carrera = $row[1];
    }

    
}



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constancia de acreditación</title>
    <link rel="shortcut icon" href="../img/logos/tecnm_champoton.svg" type="image/x-icon">
</head>

<body>

    <table width="90%" style="margin:auto; background-color:white;" cellpadding="0" cellspacing="0">

        <thead >
            <tr >
                <th style="width: 800px;">
                    <img style="margin-top:5%;" src="../img/logos/educacionLogo.png" height="50" alt="Educacion-Logo">
                </th>
                <th style="width: 800px;">
                    <img style="margin-top:5%;" src="../img/logos/Logo-TecNM.png" height="50" width="150" alt="TecNM-Logo">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr style="text-align:center;">
                <td COLSPAN="2" style="height:100px;">ANEXO XVI. CONSTANCIA DE CUMPLIMIENTO DE ACTIVIDAD COMPLEMENTARIA</td>
            </tr>
            <tr style="text-align:center;">
                <td COLSPAN="2"><small>“Hoja membretada oficial”</small></td>
            </tr>
            <tr>
                <td>
                    <p style="margin-left:5%; margin-right:5%;">C. <u><?php echo $jefeDepEscolares; ?></u></p>
                    <small style="margin-left:5%;">Jefe(a) del Departamento de servicios escolares</small>
                </td>
            </tr>
            <tr style="text-align:justify;">
               
                <td colspan="2" style="height: 250px;">
                    <p style="margin-left:10%; margin-right:10%;">El que suscribe Ing. Fernando Enrique Vela Leon, por este medio se permite hacer de su conocimiento
                        que el estudiante <?php echo $nombreAlumno; ?> con número de control
                        <?php echo $matricula; ?> de la carrera de <?php echo $carrera;  ?> ha cumplido su
                        actividad complementaria con el nivel de desempeño <?php echo $nivelDesempeño; ?> y un valor numérico
                        de <?php echo $valorN; ?>, durante el periodo escolar <?php echo $periodo; ?> con un valor curricular de <?php echo $valorCurricular; ?>
                        créditos.</p>
                    <p style="margin-left:10%; margin-right:10%;">Se extiende la presente en Champotón, Campeche a los ____ días de ____________ de 20__.</p>
                </td>
                
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <p>ATENTAMENTE</p>
                </td>
            </tr>
            <tr>
                <td >
                    <p style="margin-left:35%;margin-top:15%;">_<u><?php echo $maestroAsignado; ?></u>_</p>
                    <p style="margin-left:35%;">Nombre y firma del (de la) <br> Profesor(a) responsable</p>
                </td>
                <td>
                    <p style="margin-left:35%;margin-top:15%;">_<u>Fernando Enrique Vela Leon</u>_</p>
                    <p style="margin-left:35%;">Vo. Bo. Del Jefe(a) del <br>Departamento de Vinculación Académica.</p>
                </td>
            </tr>
        </tfoot>
    </table>


</body>

</html>