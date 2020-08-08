<?php
require_once 'db.php';
$db = new DB();
session_start();

if (!isset($_SESSION['rol'])) {
    header('location: perfiles.html');
} else {
    if ($_SESSION['rol'] != 2) {
        header('location: perfiles.html');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAE</title>
    <link rel="shortcut icon" href="img/logos/tecnm_champoton.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/tablas.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href='https://use.fontawesome.com/releases/v5.0.13/css/all.css' type="text/css">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css">
    <!-- Theme style -->
    <link rel="stylesheet" href="TABLA/dist/css/adminlte.min.css" type="text/css">
    <!-- DataTables -->
    <link rel="stylesheet" href="TABLA/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" type="text/css">
    <link rel="stylesheet" href="TABLA/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" type="text/css">
    <link rel="stylesheet" href="css/styles2.css">
</head>

<body>
    <main>
        <div class="page-wrapper chiller-theme toggled">
            <!--Sidebar-->
            <a id="show-sidebar" style="position:absolute; z-index:3;" class="btn btn-sm btn-dark" href="#">
                <i class="fas fa-bars"></i>
            </a>
            <nav id="sidebar" class="sidebar-wrapper">
                <div class="sidebar-content">
                    <div class="sidebar-brand">
                        <a href="#">Alumno</a>
                        <div id="close-sidebar">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div class="sidebar-menu">
                        <ul>
                            <li class="header-menu">
                                <span>General</span>
                            </li>
                            <li>
                                <a href="alumno.php">
                                    <i class="fa fa-tachometer-alt"></i>
                                    <span>Inicio</span>
                                </a>
                            </li>
                            <li>
                                <a href="alumno_horario.php">
                                    <i class="fas fa-table"></i>
                                    <span>Horario</span>
                                </a>

                            </li>
                            <li>
                                <a href="alumno_mensajes.php">
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                    <span>Mensajes</span>
                                </a>
                            </li>
                            <li>
                                <a href="datos_alumno.php">
                                    <i class="fas fa-graduation-cap"></i>
                                    <span>Datos generales</span>
                                </a>
                            </li>
                            <li>
                                <a href="cerrar.php">
                                    <i class="fa fa-power-off"></i>
                                    <span>Salir</span>
                                </a>
                            </li>

                        </ul>
                        <!-- sidebar-menu  -->
                    </div>
                    <!-- sidebar-content  -->
            </nav>
            <!-- Sidebar end -->

            <main class="page-content">
                <div class="container-fluid">
                    <img src="img/logos/tecnm.svg" alt="">

                </div>
                <!--Inicio-->
                <div class="section section-lg ">
                    <h1>
                        Bienvenido <?php echo ($_SESSION['usuario']); ?>
                    </h1>
                </div>

                <!--Horario-->

                <!--Mensajes-->
                <!--Datos generales-->









            </main>
        </div>
    </main>
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="js/popper.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/js.js" type="text/javascript"></script>
    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-30d18ea41045577cdb11c797602d08e0b9c2fa407c8b81058b1c422053ad8041.js" type="text/javascript"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
</body>

</html>