<?php
use Dompdf\Dompdf;
require_once '../db.php';
require_once '../dompdf/autoload.inc.php';

$db = new DB();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$nombreTaller = $_POST['taller'];
$maestroTaller =  $_POST['mtroTaller'];
$fecha = date("d-m-Y");

$html = <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
</head>
<body>
    <div class="container">
        <div class="row" style="display: flex;">
            <div class="col-6" style="text-align: left;">
                <img src="http://localhost/SIAE2/img/logos/educacionLogo.png" height="50">
            </div>
            <div class="col-6" style="text-align: right;">
                <img src="http://localhost/SIAE2/img/logos/Logo-TecNM.png" height="50" width="150">
            </div>
        </div>
        <div class="row" style="text-align: center;">
            <h2>Horario de $nombreTaller</h2>
        </div>
    </div>

    <div class="container">
    <div class="row">
    <table width="100%" style="text-align: center; background-color:white;" cellpadding="0" cellspacing="0" style="">
        <thead style="background-color:steelblue;">
            <tr>
                <th>Turno</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miercoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sabado</th>
                <th>Domingo</th>
            </tr>
        </thead>
        <tbody style="background-color: #f7f5f3;">
HTML;   

$busqueda = $db->connect()->prepare("SELECT turno,lunes,martes,miercoles,jueves,viernes,sabado,domingo from horarios WHERE taller=$maestroTaller");
$busqueda->execute();

foreach ($busqueda as $fila) {
    $turno = $fila[0];
    $lunes = $fila[1];
    $martes = $fila[2];
    $miercoles = $fila[3];
    $jueves = $fila[4];
    $viernes = $fila[5];
    $sabado = $fila[6];
    $domingo = $fila[7];
}

$html.=<<<HTML
    <tr>
        <td>$turno</td>
        <td>$lunes</td>
        <td>$martes</td>
        <td>$miercoles</td>
        <td>$jueves</td>
        <td>$viernes</td>
        <td>$sabado</td>
        <td>$domingo</td>
    </tr>
HTML;

$html .= <<<HTML
        </tbody>

        </table>
        </div>
        </div>
        <div class="row" style="margin-top: 400px">
            <div class="col">
                <p style="margin-top:50px; margin-left:50px;"><b>$fecha</b></p>
            </div>
        </div>
        
</body>
</html>
HTML; 

}else{
    echo '<script type="text/javascript">
    alert("Ocurrio un error al imprimir archivo");
    window.location.href="maestro.php";
    </script>';
}

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new Dompdf(array('enable_remote' => true));

// Define el tamaño y orientación del papel.
$pdf->set_paper("letter", "landscape");

// Carga el contenido HTML.
$pdf->load_html($html, 'UTF-8');

// Renderiza el documento PDF.
$pdf->render();

$nombreArchivo = "Horario";
// Enviamos el fichero PDF al navegador.
$pdf->stream($nombreArchivo."_".$nombreTaller.'.pdf');

?>