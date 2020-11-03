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
    <link rel="stylesheet" href="../css/tablas.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/styles2.css">
</head>
<body>
    <main class="container mt-3">
        <div class="row">
            <div class="col-sm-6 col-md-4 wow blurIn" data-wow-delay=".2s" id="registrarM">
                <article class=""><img src="../img/logos/acreditar.png" alt="" width="100" height="100" />
                    <div class="">
                        <div>
                            <h4 class=""><a href="#">Asignar al alumno</a></h4>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-md-4 wow blurIn" data-wow-delay=".2s" id="registrarM">
                <article class=""><img src="../img/logos/imprimir.png" alt="" width="100" height="100" />
                    <div class="">
                        <div>
                            <h4 class=""><a href="creditoPDF.php">Imprimir</a></h4>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-12 col-xs-12" style="background-color: white;">
            <div>
                <div class="row text-center">
                    <div class="col-md-6 col-sm-6 ">
                        <img src="../img/logos/educacionLogo.png" height="50" alt="Educacion-Logo">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <img src="../img/logos/Logo-TecNM.png" height="50" width="150" alt="TecNM-Logo">
                    </div>
                </div>
                <div class="text-center">
                    <h5 class="mt-5">ANEXO XVI. CONSTANCIA DE CUMPLIMIENTO DE ACTIVIDAD
                        COMPLEMENTARIA
                    </h5>
                    <small>“Hoja membretada oficial”</small>
                </div>
                <div class="text-left mt-5">
                    <p>C. <u><?php echo $jefeDepEscolares; ?></u></p>
                    <small>Jefe(a) del Departamento de servicios escolares o su equivalente en los Institutos Tecnológicos Descentralizados</small>
                </div>
                <!-- /.Body del doc -->
                <div class="container text-justify" style="width: 850px;height:auto; margin-top:40px;">
                    <p>El que suscribe Ing. Fernando Enrique Vela Leon, por este medio se permite hacer de su conocimiento
                        que el estudiante <?php echo $nombreAlumno; ?> con número de control
                        <?php echo $matricula; ?> de la carrera de <?php echo $carrera;  ?> ha cumplido su
                        actividad complementaria con el nivel de desempeño <?php echo $nivelDesempeño; ?> y un valor numérico
                        de <?php echo $valorN; ?>, durante el periodo escolar <?php echo $periodo; ?> con un valor curricular de <?php echo $valorCurricular; ?>
                        créditos.</p>
                    <p>Se extiende la presente en Champotón, Campeche a los ____ días de ____________ de 20__.</p>
                </div>
                <div class="text-center mt-5">
                    <p>ATENTAMENTE</p>
                </div>
                <div class="row text-center" style="margin-top:100px ;">
                    <div class="col-md-6">
                        <p>_<u><?php echo $maestroAsignado; ?></u>_</p>
                        <p>Nombre y firma del (de la) <br> Profesor(a) responsable</p>
                    </div>
                    <div class="col-md-6">
                        <p>_<u>Fernando Enrique Vela Leon</u>_</p>
                        <p>Vo. Bo. Del Jefe(a) del <br>Departamento de Vinculación Académica.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script src="../js/js.js" type="text/javascript"></script>