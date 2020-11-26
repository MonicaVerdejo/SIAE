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
                                    <span>Inicio</span>
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
                            <hr>

                            <li class="header-menu">
                                <span>Sistema</span>
                            </li>
                            <li class="sidebar-dropdown" id="opciones">
                                <a href="#">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    <span>Opciones</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <a href="#" data-toggle="modal" data-target="#changePModal">
                                        <i class="fas fa-edit "></i>
                                        <span>Cambiar contraseña</span>
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
                <div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="img/logos/tecnm.svg" alt="">

                            </div>
                            <div class="col-sm-9 mt-2 text-center">
                                <h1>Sistema Integral para Actividades Extraescolares</h1>
                            </div>
                        </div>
                    </div>
                    <div id="Bienvenido" class="section section-lg">
                        <hr>
                        <h3 class="text-center">
                            <?php
                            if ($_SESSION['sexo'] == 'F') {
                            ?> Bienvenida <?php echo ($_SESSION['nombre']);
                                        } else {
                                            ?> Bienvenido <?php echo ($_SESSION['nombre']);
                                                        }

                                                            ?>
                        </h3>
                    </div>
                </div>


                <!--Horario-->
                <div class="container" id="horario">
                    <section>
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <img src="img/logos/schedule.png" width="100" height="100" alt="Horario asignado">
                                </div>
                                <div class="col-6 ">
                                    <div class="card">
                                        <div class="card-header ">
                                            <h1 class="card-title" style="margin-left: 150px;">HORARIO ASIGNADO</h1>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <table class="table table-bordered table-hover">
                                <h3 class="mr-5"><?php
                                                    $mtro_id = $_SESSION['id_mtro'];

                                                    $sentencia = $db->connect()->prepare('SELECT taller FROM `talleres` WHERE mtro_asignado=:mtro_id');
                                                    $sentencia->execute(['mtro_id' => $mtro_id]);
                                                    foreach ($sentencia as $row) {
                                                        echo $row[0];
                                                    }

                                                    ?></h3>
                                <thead style="background-color:steelblue;">
                                    <th>Turno</th>
                                    <th>Lunes</th>
                                    <th>Martes</th>
                                    <th>Miercoles</th>
                                    <th>Jueves</th>
                                    <th>Viernes</th>
                                    <th>Sabado</th>
                                    <th>Domingo</th>
                                </thead>
                                <tbody style="background-color:  #f7f5f3;">
                                    <?php
                                    $mtroTaller = $_SESSION['id_tallerMtro'];
                                    $busqueda = $db->connect()->prepare("SELECT turno,lunes,martes,miercoles,jueves,viernes,sabado,domingo from horarios WHERE taller=$mtroTaller");
                                    $busqueda->execute();
                                    foreach ($busqueda as $fila) {
                                    ?>
                                        <tr>
                                            <td><?php echo $fila[0]; ?></td>
                                            <td><?php echo $fila[1]; ?></td>
                                            <td><?php echo $fila[2]; ?></td>
                                            <td><?php echo $fila[3]; ?></td>
                                            <td><?php echo $fila[4]; ?></td>
                                            <td><?php echo $fila[5]; ?></td>
                                            <td><?php echo $fila[6]; ?></td>
                                            <td><?php echo $fila[7]; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="row mt-5">
                                <div class="col-6 ">
                                    <div class="card">
                                        <div class="card-header ">
                                            <h1 class="card-title" style="margin-left: 150px;">ESTADISTICAS DE MIS ALUMNOS</h1>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <img src="img/logos/icon_alumnos.png" width="100" height="100" alt="Horario asignado">
                                </div>
                            </div>
                            <div>
                                aqui va algo mamalon sobre sus reprobados y aprobados, los que estan cursando tambien
                            </div>
                        </div>
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
                <section id="mensajesN" style="display: none;">
                    <div class="col-12 card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                Envía un nuevo mensaje a tus alumnos </h3>
                        </div>
                    </div>
                    <div class="mensajesN container">
                        <form action="mensajeMtro.php" method="POST">
                            <div class="form-group sr-only ">
                                <input type="text" class="form-control" name="mtro_id" id="mtro_id" value="<?php echo $mtro_id; ?>">
                            </div>
                            <div>
                                <label for="taller">Taller:</label>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <select class="custom-select col-8 ml-3" name="taller" id="taller" required="true">
                                        <?php
                                        $sentencia = $db->connect()->prepare('SELECT taller FROM `talleres` WHERE mtro_asignado=:mtro_id');
                                        $sentencia->execute(['mtro_id' => $mtro_id]);
                                        foreach ($sentencia as $row) {
                                        ?>
                                            <option <?php
                                                    if ($row[0] == 1) {
                                                        # code...
                                                    ?> style="display: none;" <?php
                                                                            } else {
                                                                                # code...
                                                                                ?> value="<?php echo $row[0]; ?>" <?php
                                                                                                                }

                                                                                                                    ?>><?php echo $row[0]; ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="col-2"><img src="img/mensajes.png" alt="mensajes" width="50" height="50"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mensaje">Redacta tu mensaje:</label>
                                <textarea class="form-control" name="mensaje" id="mensaje" rows="3" required="true"></textarea>
                            </div>
                            <div class="form-group">
                                <button title="Advertencia" data-toggle="popover" data-trigger="hover" data-content="Recuerda que una vez enviado no podrás eliminarlo" type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </section>


                <!-------------------------------INSTRUMENTACION DIDACTICA---------------------------------------->
                <section id="instrumentacionD" style="display:none;" class="mt-4 section-form bg-default container">

                    <div class="col-12 card">
                        <div class="card-header">
                            <h3 class="card-title" style="margin-left:400px;">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                INSTRUMENTACIÓN DIDÁCTICA </h3>
                        </div>
                    </div>
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
                                <a download="Instrumentacion didactica" href="maestro/documentos/formatos/Formato_Instrumentación_Didáctica_para_Ingreso.docx">
                                    <img src="img/descargar.png" width="100" height="100" alt="Descargar Formato de Instrumentacion Didáctica"></a>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <h3>Instrucciones de llenado</h3>
                                <a href="maestro/documentos/formatos/Instrucciones para la Instrumentación Didáctica.pdf" target="blank"><img src="img/editar.png" width="100" height="100" alt="Instrucciones de llenado"></a>
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
                                    <form class="mt-3" method="POST" action="maestro/enviarFormato.php" enctype="multipart/form-data">
                                        <div class="form-group sr-only ">
                                            <input type="text" class="form-control" name="mtro_id" id="mtro_id" value="<?php echo $mtro_id; ?>">
                                        </div>
                                        <select class="custom-select col-8 ml-3" name="taller" id="taller" required="true">
                                            <?php
                                            $sentencia = $db->connect()->prepare('SELECT taller FROM `talleres` WHERE mtro_asignado=:mtro_id');
                                            $sentencia->execute(['mtro_id' => $mtro_id]);
                                            foreach ($sentencia as $row) {
                                            ?>
                                                <option <?php
                                                        if ($row[0] == 1) {
                                                            # code...
                                                        ?> style="display: none;" <?php
                                                                                } else {
                                                                                    # code...
                                                                                    ?> value="<?php echo $row[0]; ?>" <?php
                                                                                                                }

                                                                                                                    ?>><?php echo $row[0]; ?></option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <img src="img/logos/adjuntar.png" width="100px" alt="Portada Inicio">
                                        <div class="form-group mt-2">
                                            <span>Cargar archivo:</span>
                                            <input type="file" name="userfile" required="true" />
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
                <section>
                    <?php
                    if (!empty($_POST['nombreTaller'])) {
                        $taller = $_POST['nombreTaller'];
                    } else {
                    }

                    ?>

                    <!--Opciones para listas de alumnos-->
                    <div class="container" style="display:none; text-align:center;" id="std-options">
                        <?php
                        $sentencia = $db->connect()->prepare('SELECT id, taller FROM `talleres` WHERE mtro_asignado=:mtro_id');
                        $sentencia->execute(['mtro_id' => $mtro_id]);
                        foreach ($sentencia as $row) {
                            $tallerNombre = $row[1];
                            $tallerid = $row[0];
                        }
                        ?>

                        <div class="col-12 card">
                            <div class="card-header">
                                <h5 class="text-left" style="text-transform: uppercase;">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    <?php echo $tallerNombre;  ?> </h5>

                            </div>
                        </div>

                        <h4 class="mt-5 text-center">ALUMNOS</h4> <br>
                        <div class="row">

                            <div class="col-sm-4 col-md-4 wow blurIn" data-wow-delay=".2s" id="verLista">
                                <article class=""><img src="img/logos/show-listado.png" alt="" width="100" height="100" />
                                    <div class="">
                                        <div>
                                            <h4 class=""><a href="#">Ver lista</a></h4>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-4 col-md-4 wow blurIn" data-wow-delay=".2s" id="editRepresentativo">

                                <article class=""><img src="img/logos/representativo.png" alt="" width="100" height="100" />
                                    <div class="">
                                        <div>
                                            <h4 class=""><a href="#">Representativos</a></h4>

                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-4 col-md-4 wow blurIn" data-wow-delay=".1s" id="evaluarA">

                                <article class=""><img src="img/logos/evaluar.png" alt="" width="100" height="100" />
                                    <div class="">
                                        <div>
                                            <h4 class=""><a href="#">Evaluar</a></h4>
                                        </div>
                                    </div>
                                </article>

                            </div>
                        </div>
                    </div>


                    <!--Tabla de alumnos dados de alta en el taller-->
                    <div style="display: none;" class="text-center container" id="ListaA">
                        <div class="col-12 card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa fa-address-book" aria-hidden="true"></i>
                                    Alumnos suscritos en el taller</h3>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xs-12 mt-2">
                            <div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered table-hover table-responsive" style="width:80%;margin-left:12%;">
                                        <thead style="background-color:steelblue;">
                                            <th>Nombre</th>
                                            <th>Matrícula</th>
                                            <th>Carrera</th>
                                            <th>Semestre</th>
                                            <th>Sexo</th>
                                            <th>Estatus</th>
                                            <th>Representativo</th>

                                        </thead>
                                        <tbody style="background-color:  #f7f5f3;">
                                            <?php
                                            $busqueda = $db->connect()->prepare("SELECT nombre, matricula,carrera, semestre, sexo, estatus, representativo FROM `alumnos` WHERE taller_id='$tallerid'");
                                            $busqueda->execute();
                                            foreach ($busqueda as $fila) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $fila[0]; ?></td>
                                                    <td><?php echo $fila[1]; ?></td>
                                                    <td><?php echo $fila[2]; ?></td>
                                                    <td><?php echo $fila[3]; ?></td>
                                                    <td><?php echo $fila[4]; ?></td>
                                                    <td><?php echo $fila[5]; ?></td>
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
                    <!--Fin tabla-->

                    <!--Form-edit-alumnoRepresentativo-->
                    <section class="mt-4 mb-4 section-form bg-default" style="display:none" id="form-Aedit">
                        <?php
                        $sentencia = $db->connect()->prepare('SELECT id FROM `talleres` WHERE mtro_asignado=:mtro_id');
                        $sentencia->execute(['mtro_id' => $mtro_id]);
                        foreach ($sentencia as $row) {
                            $tallerid = $row[0];
                        }
                        ?>
                        <div id="base">
                            <div id="triangle"></div>
                            <div id="titulo">Designar representativo</div>
                            <div id="form">
                                <form method="POST" action="maestro/edit_stdR.php">

                                    <div class="form-group sr-only ">
                                        <input type="text" class="form-control" name="taller_id" id="taller_id" value="<?php echo $tallerid; ?>">
                                    </div>
                                    <select class="custom-select" name="matricula" id="matricula" required="true">
                                        <?php
                                        $buscarAlumno = $db->connect()->prepare("SELECT matricula, nombre FROM alumnos WHERE taller_id=$tallerid and estatus='Cursando'");
                                        $buscarAlumno->execute();
                                        foreach ($buscarAlumno as $row) {
                                        ?>
                                            <option <?php
                                                    if ($row[0] == 1) {
                                                        # code...
                                                    ?> style="display: none;" <?php
                                                                                                } else {
                                                                                                    # code...
                                                                                                    ?> value="<?php echo $row[0]; ?>" <?php
                                                                                                                                    }

                                                                                                                                        ?>><?php echo $row[1]; ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>




                                    <?php
                                    $taller = $db->connect()->prepare("SELECT id, taller FROM `talleres` WHERE 1");
                                    $taller->execute();
                                    ?>

                                    <div class="form-group">
                                        <label for="representativo">Representativo</label>
                                        <select id="representativo" class="form-control" name="representativo" required="true">
                                            <option>Sí</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                    <!--
                                       ~~~ Siento que el maestro debe poder evaluar al alumno, no solo el administrador
                                        <div class="form-group">
                                        <label for="status">Estatus del curso</label>
                                        <select id="status" class="form-control" name="status" required="true">
                                            <option>Cursando</option>
                                            <option>Aprobado</option>
                                            <option>Reprobado</option>
                                        </select>
                                    </div>
                                    -->
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </section>


                    <!--Form-evaluarAlumno-->
                    <section class="mt-4 mb-4 section-form bg-default" style="display:none" id="form-evaluarA">
                        <?php
                        $sentencia = $db->connect()->prepare('SELECT id FROM `talleres` WHERE mtro_asignado=:mtro_id');
                        $sentencia->execute(['mtro_id' => $mtro_id]);
                        foreach ($sentencia as $row) {
                            $tallerid = $row[0];
                        }
                        ?>
                        <div id="base">
                            <div id="triangle"></div>
                            <div id="titulo">Asignar evaluacion</div>
                            <div id="form">
                                <form method="POST" action="maestro/enviarEvaluacion.php" enctype="multipart/form-data">
                                    <div class="form-group sr-only ">
                                        <input type="text" class="form-control" name="taller_id" id="taller_id" value="<?php echo $tallerid; ?>">
                                    </div>
                                    <select class="custom-select" name="matricula" id="matricula" required="true">
                                        <?php
                                        $buscarAlumno = $db->connect()->prepare("SELECT matricula, nombre FROM alumnos WHERE taller_id=$tallerid and estatus='Cursando'");
                                        $buscarAlumno->execute();
                                        foreach ($buscarAlumno as $row) {
                                        ?>
                                            <option <?php
                                                    if ($row[0] == 1) {
                                                        # code...
                                                    ?> style="display: none;" <?php
                                                                                                } else {
                                                                                                    # code...
                                                                                                    ?> value="<?php echo $row[0]; ?>" <?php
                                                                                                                                    }

                                                                                                                                        ?>><?php echo $row[1]; ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <img src="img/logos/adjuntar.png" width="100px" alt="Portada Inicio">
                                    <div class="form-group mt-2">
                                        <span>Cargar archivo:</span>
                                        <input type="file" name="userfile" required="true" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </section>

                </section>



                <!-------------------------------------------------------------CHANGE PASSWORD SECTION------------------------------------------------->
                <div class="modal fade" id="changePModal" tabindex="-1" role="dialog" aria-labelledby="changePModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="changePModalLabel">Cambiar la contraseña de usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="img/logos/changePass.png" height="150px" alt="Portada Inicio">
                                <form class="col-12" action="maestro/changePass_Mtro.php" method="post" enctype="multipart/form-data">
                                    <br>
                                    <div class="form-group">
                                        <label for="oldPass">Contraseña Actual</label>
                                        <input type="password" class="form-control" name="oldPass" id="oldPass" placeholder="" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="newPass">Nueva contraseña</label>
                                        <input type="password" class="form-control" name="newPass" id="newPass" placeholder="" required="true" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,20}$" oninvalid="this.setCustomValidity('La contraseña debe tener entre 8 y 20 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.')" oninput="this.setCustomValidity('')" />
                                    </div>
                                    <p class=" mt-4 center "><input class="btn btn-secondary" name="enviar" type="submit" value="Enviar"></p>
                                </form>
                                <span>Recuerda siempre cuidar la seguridad de tus datos de inicio de sesión.</span>
                            </div>
                        </div>
                    </div>
                </div>

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
                $("#Bienvenido").show();
                $("#inicio").hide();
                $("#mensajesR").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#std-options").hide();
                $("#form-Aedit").hide();
                $("#form-evaluarA").hide();
                $("#ListaA").hide();
                $("#instrumentacionD").hide();
                $("#horario").show();
                return false;
            });
            $("#mensajesRecibidos").on('click', function() {
                $("#Bienvenido").hide();
                $("#horario").hide();
                $("#inicio").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#std-options").hide();
                $("#form-Aedit").hide();
                $("#form-evaluarA").hide();
                $("#ListaA").hide();
                $("#instrumentacionD").hide();
                $("#mensajesR").show();

                return false;
            });
            $("#mensajesEnviados").on('click', function() {
                $("#Bienvenido").hide();
                $("#horario").hide();
                $("#inicio").hide();
                $("#mensajesN").hide();
                $("#mensajesR").hide();
                $("#std-options").hide();
                $("#form-Aedit").hide();
                $("#form-evaluarA").hide();
                $("#ListaA").hide();
                $("#instrumentacionD").hide();
                $("#mensajesE").show();

                return false;
            });
            $("#mensajesNuevos").on('click', function() {
                $("#Bienvenido").hide();
                $("#horario").hide();
                $("#inicio").hide();
                $("#mensajesR").hide();
                $("#mensajesE").hide();
                $("#instrumentacionD").hide();
                $("#std-options").hide();
                $("#form-Aedit").hide();
                $("#form-evaluarA").hide();
                $("#ListaA").hide();
                $("#mensajesN").show();
                return false;
            });
            $("#mtro_evaluacion").on('click', function() {
                $("#Bienvenido").hide();
                $("#horario").hide();
                $("#mensajesR").hide();
                $("#mensajesE").hide();
                $("#mensajesN").hide();

                $("#std-options").hide();
                $("#form-Aedit").hide();
                $("#form-evaluarA").hide();
                $("#ListaA").hide();
                $("#instrumentacionD").show();
                return false;
            });
            //seccion de maestro
            $("#nombreTaller").on('click', function() {
                $("#Bienvenido").hide();
                $("#horario").hide();
                $("#mensajesR").hide();
                $("#mensajesE").hide();
                $("#mensajesN").hide();
                $("#instrumentacionD").hide();
                $("#std-options").show();
                return false;
            });
            $("#verLista").on('click', function() {
                $("#std-options").show();
                $("#form-evaluarA").hide();
                $("#form-Aedit").hide();
                $("#ListaA").show();

                return false;
            });
            $("#editRepresentativo").on('click', function() {
                $("#std-options").show();
                $("#form-Aedit").show();
                $("#form-evaluarA").hide();
                $("#ListaA").hide();
                return false;
            });
            $("#evaluarA").on('click', function() {
                $("#std-options").show();
                $("#form-evaluarA").show();
                $("#form-Aedit").hide();
                $("#ListaA").hide();
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