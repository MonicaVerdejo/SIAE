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
                                <a href="admin_inicio.php">
                                    <i class="fa fa-tachometer-alt"></i>
                                    <span>Inicio</span>
                                </a>
                            </li>

                            <li>
                                <a href="admin_tablas.php">
                                    <i class="fas fa-table"></i>
                                    <span>Tablas</span>
                                </a>

                            </li>

                            <li>
                                <a href="admin_graficas.php">
                                    <i class="fas fa-chart-pie"></i>
                                    <span>Graficas</span>
                                </a>
                            </li>

                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-h-square"></i>
                                    <span>Hoteles</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <?php
                                            $sentencia = $db->connect()->prepare("SELECT usuario FROM usuario");
                                            $sentencia->execute();

                                            foreach ($sentencia as $row) {

                                            ?>
                                                <form class="text-center" action="buscar_id.php" method="POST">

                                                    <input type="submit" id="hotel" name="hotel" class="btn btn-outline-info btn-sm mt-1 mb-1" <?php

                                                                                                                                                if ($row[0] != 'Administrador') {
                                                                                                                                                ?> value="<?php echo $row[0]; ?>"><?php

                                                                                                                                                                                } else {
                                                                                                                                                                                    ?> style="display: none;" > <?php
                                                                                                                                                                                }
                                                                                                                                                                                    ?></input>
                                                </form>
                                            <?php
                                            }
                                            ?>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                            <li>
                                <a href="admin_becarios.php">
                                    <i class="fas fa-graduation-cap"></i>
                                    <span>Becarios</span>
                                </a>
                            </li>
                            <li class="header-menu">
                                <span>Sistema</span>
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
                    <h2>Tabla de registros</h2>
                </div>

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