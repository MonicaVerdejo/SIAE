<?php
require_once 'db.php';
$db = new DB();
session_start();

if (!isset($_SESSION['rol'])) {
    header('location: perfiles.html');
} else {
    if ($_SESSION['rol'] != 1) {
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

                        <a href="#">Administrador</a>
                        <div id="close-sidebar">
                            <i class="fas fa-times"></i>
                        </div>

                        <hr>

                    </div>
                    <div class="text-center">
                        <?php if ((isset($_SESSION['rol'])) && ($_SESSION['rol'] != "")) { ?>

                            <div class="user-img"> <img height="40" width="40" src="img/img_profile/<?php echo  $_SESSION['img_profile']; ?>" alt=""></div>


                            <div id="cambiarp">
                                <img width="20" height="20" src="img/editar.png" alt="">
                                <label for="file">Cambiar avatar</label>
                            </div>

                            <!---->
                            <form class="col-12" id="perfil" style="display:none;" action="upload.php" method="post" enctype="multipart/form-data">

                                <input type="file" lass="form-control" name="file" id="file">
                                <p class=" mt-4 center "><input class="btn btn-secondary" name="enviar" type="submit" value="Enviar"></p>
                            </form>

                            <!---->

                        <?php } ?>
                    </div>

                    <div class="sidebar-menu">
                        <ul>
                            <li class="header-menu">
                                <span>General</span>
                            </li>
                            <li id="alumno_horario">
                                <a href="#horario">
                                    <i class="fa fa-desktop" aria-hidden="true"></i>
                                    <span>Administrar inicio</span>
                                </a>
                            </li>
                            <li id="mtro_tablas">
                                <a href="#mtro_tablas">
                                    <i class="fas fa-table"></i>
                                    <span>Maestros</span>
                                </a>
                            </li>
                            <li id="mtro_tablas">
                                <a href="#mtro_tablas">
                                    <i class="fas fa-table"></i>
                                    <span>Alumnos</span>
                                </a>

                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#mtro_mensajes">
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                    <span>Mensajes</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul style="text-align: center;">
                                        <li style="text-align: left;" class="btn btn-outline-info btn-sm mt-1 mb-1" id="mensajesEnviados">
                                            <i class="fa fa-archive" aria-hidden="true"></i>Enviados
                                        </li> <br>
                                        <li class="btn btn-outline-info btn-sm mt-1 mb-1" id="mensajesRecibidos">
                                            <i class="fa fa-envelope" aria-hidden="true"></i> Recibidos
                                        </li> <br>
                                        <li class="btn btn-outline-info btn-sm mt-1 mb-1" id="mensajesNuevos">
                                            <i class="fas fa-edit"></i>Nuevo
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                    <span>Talleres</span>
                                </a>
                                
                            </li>
                            <li id="mtro_evaluacion">
                                <a href="#mtro_evaluacion">
                                    <i class="fa fa-hourglass" aria-hidden="true"></i>
                                    <span>Evaluación bimestral</span>
                                </a>
                            </li>
                            <li class="header-menu">
                                <span>Sistema</span>
                            </li>

                            <li class="sidebar-dropdown" id="opciones">
                                <a href="#opciones">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    <span>Opciones</span>
                                </a>
                                <div class="sidebar-submenu">

                                    <a href="#opcionespass">
                                    <i class="fas fa-edit "></i>
                                        <span>Cambiar contraseña</span>
                                    </a>

                                    <a href="#opcionesadmin">
                                        <i class="fa fa-user-circle" ></i>
                                        <span>Administrativos</span>
                                    </a>
                                </div>
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
                    <h2>SIAE</h2>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $("#cambiarp").on('click', function() {
                $("#perfil").show();
                //$("#perfiloculto").hide();
                // $("#element5").show();  
                return false;
            });
        });
    </script>


</body>

</html>