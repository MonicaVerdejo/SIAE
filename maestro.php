<?php
require_once 'db.php';
$db = new DB();
session_start();

if (!isset($_SESSION['rol'])) {
    header('location: perfiles.html');
} else {
    if ($_SESSION['rol'] != 3) {
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
                        <a href="#">Maestro</a>
                        <div id="close-sidebar">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div class="sidebar-menu">
                        <ul>
                            <li class="header-menu">
                                <span>General</span>
                            </li>
                            <li id="alumno_horario">
                                <a href="#horario">
                                    <i class="fas fa-calendar"></i>
                                    <span>Horario</span>
                                </a>
                            </li>

                            <li class="sidebar-dropdown">
                                <a href="#">
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
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                    <span>Talleres</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <?php
                                            $mtro_id = $_SESSION['id_mtro'];

                                            $sentencia = $db->connect()->prepare('SELECT taller FROM `talleres` WHERE mtro_asignado=:mtro_id');
                                            $sentencia->execute(['mtro_id' => $mtro_id]);
                                            foreach ($sentencia as $row) {
                                            ?>
                                                <form class="text-center" action="" method="POST">
                                                    <input type="submit" id="nombreTaller" name="nombreTaller" class="btn btn-outline-info btn-sm mt-1 mb-1" value="<?php echo $row[0]; ?>"></input>
                                                </form>
                                            <?php
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li id="mtro_evaluacion">
                                <a href="#mtro_evaluacion">
                                    <i class="fa fa-hourglass" aria-hidden="true"></i>
                                    <span>Instrumentación Didáctica</span>
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
                <div id="Bienvenido">
                    <div class="container-fluid">
                        <img src="img/logos/tecnm.svg" alt="">

                    </div>
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


                <!--Mensajes Recibidos-->
                <section id="mensajesR" style="display: none;">

                    <div class="container-fluid">
                        <div class="col-12 card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    Mensajes Recibidos</h3>
                            </div>
                        </div>

                        <div>
                            <div class="col-lg-12 col-xs-12">
                                <div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered table-hover" style="border-radius: 3%;">
                                            <tbody>
                                                <?php
                                                $busqueda = $db->connect()->prepare('select fecha, mensaje from mensajeadmin order by fecha desc');
                                                $busqueda->execute();
                                                foreach ($busqueda as $fila) {
                                                ?>
                                                    <tr>
                                                        <td style="background-color: lightblue; ">
                                                            <img class="" src="img/mensajes.png" width="50" height="50" alt="Mensajes"> <br><br>
                                                            <br>
                                                            Administrador
                                                            <br>
                                                            <?php echo $fila[0]; ?>
                                                        </td>
                                                        <td><?php echo $fila[1]; ?></td>
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

                <!--Mensajes Enviados-->
                <section id="mensajesE" style="display: none;">

                    <div class="container-fluid">
                        <div class="col-12 card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    Mensajes Enviados </h3>
                            </div>
                        </div>

                        <div>
                            <div class="col-lg-12 col-xs-12">
                                <div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered table-hover" style="border-radius: 3%;">
                                            <tbody>
                                                <?php
                                                $mtro_id = $_SESSION['id_mtro'];

                                                $sentencia = $db->connect()->prepare("select fecha, maestro.nombre, mensaje from maestro join mensajemaestro join talleres
                            on mensajemaestro.taller_id= talleres.id and talleres.id = maestro.taller_asignado and talleres.mtro_asignado=mensajemaestro.mtro_id 
                            where mensajemaestro.mtro_id=:mtro_id");
                                                $sentencia->execute(['mtro_id' => $mtro_id]);
                                                $sentencia->execute();
                                                $busqueda = $db->connect()->prepare('select fecha, mensaje from mensajeadmin order by fecha desc');
                                                $sentencia->execute();
                                                foreach ($sentencia as $fila) {
                                                ?>
                                                    <tr>
                                                        <td style="background-color:lightblue">
                                                            <img class="" src="img/mensajes.png" width="50" height="50" alt="Mensajes"> <br><br>
                                                            <br>
                                                            <?php echo $fila[1]; ?>
                                                            <br>
                                                            <?php echo $fila[0]; ?>
                                                        </td>
                                                        <td><?php echo $fila[2]; ?></td>
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


                <!--Mensajes Nuevos-->
                <section class="mensajesN container" id="mensajesN" style="display: none;">
                    <div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-10"><label for="talleres">Tus talleres son:</label></div>
                                <div class="col-2"><img src="img/mensajes.png" alt="mensajes" width="50" height="50"></div>
                            </div>
                            <?php
                            $sentencia = $db->connect()->prepare('SELECT taller FROM `talleres` WHERE mtro_asignado=:mtro_id');
                            $sentencia->execute(['mtro_id' => $mtro_id]);
                            foreach ($sentencia as $row) {
                            ?>
                                <button id="talleres" name="talleres" class="btn btn-outline-info btn-sm mt-1 mb-1" value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></button>
                            <?php } ?>
                        </div>
                        <form action="mensajeMtro.php" method="POST">
                            <div class="form-group sr-only ">
                                <input type="text" class="form-control" name="mtro_id" id="mtro_id" value="<?php echo $mtro_id; ?>">
                            </div>
                            <div class="form-group" title="Advertencia" data-toggle="popover" data-trigger="hover" data-content="Escoge sólo un taller">
                                <label for="taller">Confirma el taller destinatario del mensaje:</label>
                                <textarea class="form-control" name="taller" id="taller" rows="1"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="mensaje">Redacta tu mensaje:</label>
                                <textarea class="form-control" name="mensaje" id="mensaje" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <button title="Advertencia" data-toggle="popover" data-trigger="hover" data-content="Recuerda que una vez enviado no podrás eliminarlo" type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </section>


                <!-------------------------------INSTRUMENTACION DIDACTICA---------------------------------------->
                <section id="Ebimestral" style="display:none;" class="mt-4 section-form bg-default container">
                    <h4>INSTRUMENTACIÓN DIDÁCTICA</h4>

                    <?php
                    if (isset($_SESSION['message']) && $_SESSION['message']) {
                        printf('<b>%s</b>', $_SESSION['message']);
                        unset($_SESSION['message']);
                    }
                    ?>



                    <div class="envio-descargar mt-5">
                        <div class="row ">
                            <div class="col-sm-4 col-xs-12">
                                <h3>Descargar Formato</h3>
                                <a download="Instrumentacion didactica" href="pdf/Formato_Instrumentación_Didáctica_para_Ingreso.docx">
                                    <img src="img/descargar.png" width="100" height="100" alt="Descargar Formato de Instrumentacion Didáctica"></a>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <h3>Instrucciones de llenado</h3>
                                <a href="pdf/Instrucciones para la Instrumentación Didáctica.pdf" target="blank"><img src="img/editar.png" width="100" height="100" alt="Instrucciones de llenado"></a>
                            </div>
                            <div class="col-sm-4 col-xs-12" data-toggle="modal" data-target="#enviarModal">
                                <h3>Enviar Formato</h3>
                                <img src="img/agregar.png" width="100" height="100" alt="Enviar Formato de Instrumentación">
                            </div>
                        </div>
                    </div>


                    <!--Modal envio-->
                    <div class="modal fade" id="enviarModal" tabindex="-1" role="dialog" aria-labelledby="enviarModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="inicioModalLabel">Enviar instrumentación didáctica</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <div class="form-group">
                                        <div class="row text-left">
                                            <div class="col-10"><label for="talleres">Tus talleres son:</label></div>
                                        </div>
                                        <?php
                                        $sentencia = $db->connect()->prepare('SELECT taller FROM `talleres` WHERE mtro_asignado=:mtro_id');
                                        $sentencia->execute(['mtro_id' => $mtro_id]);
                                        foreach ($sentencia as $row) {
                                        ?>
                                            <button id="talleres" name="talleres" class="btn btn-outline-info btn-sm mb-1" value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></button>
                                        <?php } ?>
                                    </div>

                                    <form class="mt-3" method="POST" action="maestro/enviarFormato.php" enctype="multipart/form-data">
                                        <div class="form-group sr-only ">
                                            <input type="text" class="form-control" name="mtro_id" id="mtro_id" value="<?php echo $mtro_id; ?>">
                                        </div>
                                        <div class="form-group" title="Advertencia" data-toggle="popover" data-trigger="hover" data-content="Escoge sólo un taller">
                                            <label for="taller">Confirma el taller al que pertenece la instrumentación:</label>
                                            <textarea class="form-control" name="taller" id="taller" rows="1"></textarea>
                                        </div>
                                        <img src="img/logos/adjuntar.png" width="100px" alt="Portada Inicio">
                                        <div class="form-group mt-2">
                                            <span>Cargar archivo:</span>
                                            <input type="file" name="userfile" />
                                        </div>
                                        <br>
                                        <input class="btn btn-info" type="submit" name="uploadBtn" value="Subir" />
                                    </form>
                                    <span>Recuerda que una vez enviado no podrás eliminarlo</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-------------------------------TALLERES---------------------------------------->
                <section class="container">
                    <?php
                    $sentencia = $db->connect()->prepare('SELECT id, taller FROM `talleres` WHERE mtro_asignado=:mtro_id');
                    $sentencia->execute(['mtro_id' => $mtro_id]);
                    foreach ($sentencia as $row) {
                        $tallerNombre = $row[1];
                        $tallerid=$row[0];
                    }
                    ?>
                    <h3> <?php echo $tallerNombre;  ?> </h3>
                    <!--Tabla de alumnos dados de alta en el taller-->
                    <div>
                        <div class="col-lg-12 col-xs-12">
                            <div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered table-hover">
                                        <thead style="background-color:steelblue;">
                                            <th>Nombre</th>
                                            <th>Matrícula</th>
                                            <th>Carrera</th>
                                            <th>Semestre</th>
                                            <th>Sexo</th>
                                            <th>Representativo</th>
                                            <th>Evaluacion</th>
                                        </thead>
                                        <tbody style="background-color:  #f7f5f3;">
                                            <?php
                                            $busqueda = $db->connect()->prepare("SELECT nombre, matricula,carrera, semestre, sexo, representativo, evaluacion FROM `alumnos` WHERE taller_id='$tallerid'");
                                            $busqueda->execute();
                                            foreach ($busqueda as $fila) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $fila[0]; ?></td>
                                                    <td><?php echo $fila[1]; ?></td>
                                                    <td><?php echo $fila[2]; ?></td>
                                                    <td><?php echo $fila[3]; ?></td>
                                                    <td><?php echo $fila[4]; ?></td>
                                                    <td><?php echo $fila[5]; ?>
                                                
                                                
                                                </td>
                                                    <td><?php echo $fila[6]; ?></td>
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
                    <!--Fin tabla-->

                    <?php


                    if (!empty($_POST['nombreTaller'])) {
                        $taller = $_POST['nombreTaller'];
                        
                    } else {
                        echo "PUTA LA QUE TE REPARIO";
                        //echo $hotel;
                    }

                    ?>
                </section>

            </main>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                $("#mensajesN").hide();
                return false;
            });
            $("#mensajesRecibidos").on('click', function() {
                $("#horario").hide();
                $("#inicio").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#mensajesR").show();
                return false;
            });
            $("#mensajesEnviados").on('click', function() {
                $("#horario").hide();
                $("#inicio").hide();
                $("#mensajesN").hide();
                $("#mensajesR").hide();
                $("#mensajesE").show();
                return false;
            });
            $("#mensajesNuevos").on('click', function() {
                $("#horario").hide();
                $("#inicio").hide();
                $("#mensajesR").hide();
                $("#mensajesE").hide();
                $("#mensajesN").show();
                return false;
            });
            $("#mtro_evaluacion").on('click', function() {
                $("#horario").hide();
                $("#mensajesR").hide();
                $("#mensajesE").hide();
                $("#mensajesN").hide();
                $("#Ebimestral").show();
                $("#Bienvenido").hide();

                return false;
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover();
        });
    </script>


</body>

</html>