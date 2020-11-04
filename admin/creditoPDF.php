<?php

// Iniciar sesión
session_start();
// Verificar que existe la variable de sesión
if(!isset($_SESSION['pdf'])) {
    die('Primero debes enviar el formulario, para que obtengamos los datos solicitados e imprimamos tu acuse.');
}

// Definir constante para no duplicar inicio de sesión
define('SESSION_STARTED', 1);

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Inicializar buffer de salida
ob_start();

// Incluir script que genera HTML
include 'acreditarstd.php';

// Obtener HTML y limpiar buffer
$html = ob_get_clean();

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new Dompdf(array('enable_remote' => true)); 


// Define el tamaño y orientación del papel.
$pdf->set_paper("letter", "portrait");
$pdf->set_paper(array(0, 0, 595.28, 841.89));

// Carga el contenido HTML.
$pdf->load_html($html, 'UTF-8');

// Renderiza el documento PDF.
$pdf->render();

// Enviamos el fichero PDF al navegador.
$pdf->stream('Constancia.pdf');

// Eliminar variable de sesión
unset($_SESSION['pdf']);