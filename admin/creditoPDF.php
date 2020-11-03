<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Introducimos HTML de prueba

$pdf = new Dompdf();
$options = $pdf->getOptions();
$options->setDefaultFont('Courier');
$options->set('enable_html5_parser', true);
$pdf->setOptions($options);

$html=file_get_contents_curl("localhost/SIAE2/admin/acreditarstd.php");

//$options->set("isJavascriptEnabled", TRUE);
 
 
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("legal", "landscape");
$pdf->set_paper(array(0,0,1100,950));
 
// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));
 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
$pdf->stream('hichibi.pdf');


function file_get_contents_curl($url) {
	$crl = curl_init();
	$timeout = 5;
	curl_setopt($crl, CURLOPT_URL, $url);
	curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
	$ret = curl_exec($crl);
	curl_close($crl);
	return $ret;
}