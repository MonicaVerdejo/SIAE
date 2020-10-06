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

$alumno_id=$_SESSION['id_user'];
$query = $db->connect()->prepare("SELECT talleres.taller, talleres.direccion, talleres.mtro_asignado, maestro.nombre FROM talleres 
JOIN maestro join alumnos ON talleres.id = alumnos.taller_id and maestro.taller_asignado = talleres.mtro_asignado
where alumnos.id=$alumno_id;");
$query->execute();

$opcion = $query->fetch(PDO::FETCH_NUM);

//session_destroy('imagen_profile');
//session_start();
$_SESSION['taller'] = $opcion[0];
$direccion = $opcion[1];
$mtroasignado = $opcion[3];

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
                            <li id="alumno_inicio">
                                <a href="alumno.php">
                                    <i class="fa fa-tachometer-alt"></i>
                                    <span>Inicio</span>
                                </a>
                            </li>
                            <li id="alumno_horario">
                                <a href="#horario">
                                    <i class="fas fa-table"></i>
                                    <span>Horario</span>
                                </a>
                            </li>
                            <li id="alumno_mensajes">
                                <a href="#alumno_mensajes">
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                    <span>Mensajes</span>
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
                        <?php
                        if ($_SESSION['sexo'] == 'F') {
                        ?> Bienvenida <?php echo ($_SESSION['nombre']);
                                    } else {
                                        ?> Bienvenido <?php echo ($_SESSION['nombre']);
                                                    }

                                                        ?>
                    </h1>
                </div>

                <div class="row" id="inicio">
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        ESTADO DEL CURSO: <?php echo ($_SESSION['estatus']); ?>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="datosTaller card-1">
                         
                                <li>
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                    Inscrito en: <?php echo $_SESSION['taller']; ?>
                                </li>
                                <li>
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    Matricula: <?php echo $_SESSION['matricula']; ?>
                                </li>
                                <li>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    Carrera: <?php echo $_SESSION['carrera']; ?>
                                    <hr>
                                </li>
                                <li>
                                <i class="fa fa-id-card" aria-hidden="true"></i>
                                    Maestro asignado: <?php echo $mtroasignado; ?>
                                </li>
                                <li>
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                    Ubicación del taller: <?php echo $direccion; ?>
                                    <hr>
                                </li>
                            
                            <span>En caso de dudas consultar en el área de actividades extraescolares. Departamento de vinculación.</span>
                        </div>
                    </div>
                </div>

                <!--Horario-->

                <div class="container" id="horario" style="display: none;">

                    <section id="tabla_resultado" class="content">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title text-center">Horario</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="datos" class="text-center table table-bordered table-hover table-responsive">




                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </section>

                </div>



                <!--Mensajes-->

                <section id="mensajes" style="display: none;">
                    <div class="container-fluid">
                        <div class="col-12 card">
                            <div class="card-header">
                                <h3 class="card-title">
                                <i class="fa fa-envelope" aria-hidden="true"></i>    
                                Mensajes</h3>
                            </div>
                        </div>
                        <div>
                            <div class="col-lg-12 col-xs-12">
                                <div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered table-hover">

                                            <tbody>

                                                <?php
                                                $taller_id = $_SESSION['taller_id'];

                                                $sentencia = $db->connect()->prepare('select  DISTINCTROW fecha, maestro.nombre, mensaje from maestro join mensajemaestro join talleres join alumnos
                                                                                            on mensajemaestro.taller_id= talleres.id and alumnos.taller_id = talleres.id and talleres.id = maestro.taller_asignado 
                                                                                            and talleres.mtro_asignado=mensajemaestro.mtro_id    where talleres.id=:taller_id ');
                                                $sentencia->execute(['taller_id' => $taller_id]);
                                                foreach ($sentencia as $row) {

                                                ?>
                                                    <tr>
                                                        <td>
                                                            <img class="" src="img/mensajes.png" width="50" height="50" alt="Mensajes">
                                                            <br>
                                                            <?php echo $row[0]; ?>
                                                            <br>
                                                            <?php echo $row[1]; ?>
                                                        </td>

                                                        <td><?php echo $row[2]; ?></td>

                                                    </tr>
                                                <?php

                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->

                </section>





            </main>
        </div>
    </main>
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="js/popper.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/js.js" type="text/javascript"></script>
    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-30d18ea41045577cdb11c797602d08e0b9c2fa407c8b81058b1c422053ad8041.js" type="text/javascript"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $("#alumno_horario").on('click', function() {
                $("#horario").show();
                $("#inicio").hide();
                $("#mensajes").hide();
                return false;
            });
            $("#alumno_mensajes").on('click', function() {
                $("#horario").hide();
                $("#inicio").hide();
                $("#mensajes").show();
                return false;
            });
            $("#alumno_inicio").on('click', function() {
                $("#horario").hide();
                $("#inicio").show();
                $("#mensajes").hide();
                return false;
            });
        });
    </script>
</body>

</html>