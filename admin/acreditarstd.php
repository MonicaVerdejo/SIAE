<?php
// Inicializar sesión solo si no se ha iniciado
include_once '../db.php';
$db = new DB();
if(isset ($_SESSION)) {
    
}else{
session_start();
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    // Si se va a procesar el formulario
    $matricula = $_POST['matricula'];
    $nivelD = $_POST['nivelD'];
    $valorN = $_POST['valorN'];
    $periodo = $_POST['periodo'];
    $valorCurricular = $_POST['valorCurricular'];
    $jefeDepEscolares = $_POST['jefeDepEscolares'];
    $mtroA = $_POST['mtroA'];
    //buscar datos del alumno
    $sql = "SELECT nombre, carrera FROM alumnos where matricula=$matricula";
    $statement = $db->connect()->prepare($sql);
    $statement->execute();
    foreach ($statement as $row) {
        $nombreA = $row[0];
        $carrera = $row[1];
    
    }
      // Crear variable de sesión para que se pueda generar el PDF
      $_SESSION['pdf'] = [
        'matricula' => $matricula,
        'nivelD' => $nivelD,
        'valorN' => $valorN,
        'periodo' => $periodo,
        'valorCurricular' => $valorCurricular,
        'jefeDepEscolares' => $jefeDepEscolares,
        'mtroA' => $mtroA,
        'nombreA' => $nombreA,
        'carrera' => $carrera
        
    ];
    // Enlace de descarga solo si se procesa formulario
    $descarga = '<a class="btn btn-primary" href="creditoPdf.php"><i class="fa fa-download"></i> Descargar archivo PDF</a>';
} elseif(isset($_SESSION['pdf'])) {
    // Se va a crear el PDF
    $matricula = $_SESSION['pdf']['matricula'];
    $nivelD = $_SESSION['pdf']['nivelD'];
    $valorN = $_SESSION['pdf']['valorN'];
    $periodo = $_SESSION['pdf']['periodo'];
    $valorCurricular = $_SESSION['pdf']['valorCurricular'];
    $jefeDepEscolares = $_SESSION['pdf']['jefeDepEscolares'];
    $mtroA = $_SESSION['pdf']['mtroA'];
    $nombreA = $_SESSION['pdf']['nombreA'];
    $carrera = $_SESSION['pdf']['carrera'];
    
    // No hay enlace de descarga al crear PDF
    $descarga = '';
    
} else {
    die('No hay datos para procesar.');
}

// Salida con sintaxis HEREDOC
echo <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constancia de acreditación</title>
    <link rel="shortcut icon" href="../img/logos/tecnm_champoton.svg" type="image/x-icon">
</head>
<body>
    <table style="margin:auto; background-color:white; " cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th style="width: 300px;">
                    <img style="margin-top:2%;" src="http://localhost/SIAE2/img/logos/educacionLogo.png" height="50">
                </th>
                <th style="width: 300px;">
                    <img style="margin-top:2%;" src="http://localhost/SIAE2/img/logos/Logo-TecNM.png" height="50" width="150">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr style="text-align:center;">
                <td COLSPAN="2" style="height:200px;">ANEXO XVI. CONSTANCIA DE CUMPLIMIENTO DE ACTIVIDAD COMPLEMENTARIA</td>
            </tr>
            <tr style="text-align:center;">
                <td COLSPAN="2"><small>“Hoja membretada oficial”</small></td>               
            </tr>
            <tr>
                <td>
                    <p style="margin-left:5%; margin-right:5%;">C. <u> $jefeDepEscolares</u></p>
                    <small style="margin-left:5%;">Jefe(a) del Departamento de servicios escolares</small>
                </td>
            </tr>
            <tr style="text-align:justify;">
                <td colspan="2" style="height: 250px;">
                    <p style="margin-left:10%; margin-right:10%;">El que suscribe Ing. Fernando Enrique Vela Leon, por este medio se permite hacer de su conocimiento
                        que el estudiante  $nombreA  con número de control
                        $matricula de la carrera de  $carrera ha cumplido su
                        actividad complementaria con el nivel de desempeño  $nivelD y un valor numérico
                        de  $valorN, durante el periodo escolar $periodo con un valor curricular de $valorCurricular
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
                <td>
                    <p style="margin-top:150px;margin-left:50px;">_<u>$mtroA</u>_</p>
                    <p style="margin-left:50px;">Nombre y firma del (de la) <br> Profesor(a) responsable</p>
                </td>
                <td>
                    <p style="margin-top:150px; margin-left:50px;">_<u>Fernando Enrique Vela Leon</u>_</p>
                    <p style="margin-left:50px;">Vo. Bo. Del Jefe(a) del <br>Departamento de Vinculación Académica.</p>
                </td>
            </tr>
        </tfoot>
    </table>
    <div>
        $descarga
    </div>
</body>
</html>
HTML; // Esta línea debe estar en la primera columna o va a generar error
