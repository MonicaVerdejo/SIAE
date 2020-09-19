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
                            <li id="inicio-cms">
                                <a href="#">
                                    <i class="fa fa-desktop" aria-hidden="true"></i>
                                    <span>Administrar inicio</span>
                                </a>
                            </li>
                            <li id="page-mtro">
                                <a href="#mtro_tablas">
                                    <i class="fas fa-table"></i>
                                    <span>Maestros</span>
                                </a>
                            </li>
                            <li id="">
                                <a href="#">
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
                                        <i class="fa fa-user-circle"></i>
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
                <!-------------------------------------------------------------SECCIÓN DE CMS------------------------------------------------->

                <!-------------------------------------------------------------SECCIÓN DE MAESTROS--------------------------------------------->
                <section class="section  section-xl bg-default text-md-center">
                    <div class="container" style="display:none;" id="teach-options">
                        <h4>MAESTROS</h4>
                        <div class="row row-lg row-30">

                            <div class="col-sm-6 col-md-4 wow blurIn" data-wow-delay=".2s" id="registrarM">
                                <article class=""><img src="img/logos/new-user.png" alt="" width="100" height="100" />
                                    <div class="">
                                        <div>
                                            <h4 class=""><a href="#">Registrar</a></h4>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6 col-md-4 wow blurIn" data-wow-delay=".2s" id="editM">

                                <article class=""><img src="img/logos/edit-user.png" alt="" width="100" height="100" />
                                    <div class="">
                                        <div>
                                            <h4 class=""><a href="#">Editar</a></h4>

                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6 col-md-4 wow blurIn" data-wow-delay=".1s" id="deleteM">

                                <article class=""><img src="img/logos/delete-user.png" alt="" width="100" height="100" />
                                    <div class="">
                                        <div>
                                            <h4 class=""><a href="#">Eliminar</a></h4>
                                        </div>
                                    </div>
                                </article>

                            </div>
                        </div>
                    </div>

                    <!--Form-registrar-maestro-->
                    <section class="section-form bg-default mt-4" style="display:none" id="form-Tregister">
                        <div id="base">
                            <div id="titulo">Agregar Maestro</div>
                            <div id="form">
                                <form method="POST" action="login_admin.php">
                                    <div class="form-group">
                                        <label for="nombre">Nombre completo</label>
                                        <input id="nombre" class="form-control" type="text" name="nombre" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="correo">Correo</label>
                                        <input id="correo" class="form-control" type="email" name="correo" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="curp">Curp</label>
                                        <input id="curp" class="form-control" type="text" name="curp" required="true">
                                    </div>



                                    <?php

                                    $taller = $db->connect()->prepare("SELECT taller,id FROM `talleres` WHERE 1");
                                    $taller->execute();
                                    
                                    foreach ($taller as $row) {
                                    ?>
                                         <div class="form-group">
                                        <label for="sexo">Sexo</label>
                                        <select id="sexo" class="form-control" name="sexo">
                                            <option><?php echo $row[0]; ?></option>
                                            
                                        </select>
                                    </div>
                                    <?php
                                    }
                                    ?>


                                    <div class="form-group">
                                        <label for="taller_asignado">Taller asignado</label>
                                        <input id="taller_asignado" class="form-control" type="text" name="taller_asignado" required="true">
                                    </div>



                                    <div class="form-group">
                                        <label for="telefono">Telefono</label>
                                        <input id="telefono" class="form-control" type="text" name="telefono" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="sexo">Sexo</label>
                                        <select id="sexo" class="form-control" name="sexo">
                                            <option>M</option>
                                            <option>F</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-dark" type="button">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </section>

                    <!--Form-edit-maestro-->
                    <section class=" section-form bg-default" style="display:none" id="form-Tedit">
                        <div id="base">
                            <div id="triangle"></div>
                            <div id="titulo">Editar Maestro</div>
                            <div id="form">
                                <form method="POST" action="login_alumno.php">
                                    <div class="form-group">
                                        <label for="usuario">Matricula</label>
                                        <input id="usuario" class="form-control" type="text" name="usuario" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">NIP</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="" required="true">
                                    </div>
                                    <input class="btn btn-gray" type="submit" value="Enviar">
                                </form>
                            </div>
                        </div>
                    </section>

                    <!--Form-eliminar-maestro-->
                    <section class="section-form bg-default" style="display:none" id="form-Tdelete">
                        <div id="base">
                            <div id="triangle"></div>
                            <div id="titulo">Iniciar sesion</div>
                            <div id="form">
                                <form method="POST" action="login_maestro.php">
                                    <div class="form-group">
                                        <label for="Correo">Correo</label>
                                        <input id="Correo" class="form-control" type="text" name="correo" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="" required="true">
                                    </div>
                                    <input class="btn btn-gray" type="submit" value="Enviar">
                                </form>
                            </div>
                        </div>
                    </section>

                    <!--Tabla de maestros dados de alta-->
                    <div class="container mt-5" style="display:none;" id="table-mtro">
                        <section>
                            <div class="container-fluid">
                                <div class="col-12 card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fa fa-address-book" aria-hidden="true"></i>
                                            Maestros dados de alta en el sistema </h3>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-lg-12 col-xs-12">
                                        <div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <table class="table table-bordered table-hover">
                                                    <thead style="background-color:steelblue;">
                                                        <th>Nombre</th>
                                                        <th>Correo</th>
                                                        <th>Taller Asignado</th>
                                                        <th>CURP</th>
                                                        <th>Teléfono</th>
                                                    </thead>
                                                    <tbody style="background-color:  #f7f5f3;">
                                                        <?php
                                                        $busqueda = $db->connect()->prepare('SELECT maestro.nombre, correo, talleres.taller, curp, telefono FROM `maestro` join talleres on maestro.taller_asignado=talleres.id order by maestro.nombre asc');
                                                        $busqueda->execute();
                                                        foreach ($busqueda as $fila) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $fila[0]; ?></td>
                                                                <td><?php echo $fila[1]; ?></td>
                                                                <td><?php echo $fila[2]; ?></td>
                                                                <td><?php echo $fila[3]; ?></td>
                                                                <td><?php echo $fila[4]; ?></td>

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
                    </div>
                </section>

                <!-------------------------------------------------------------SECCIÓN DE ALUMNOS--------------------------------------------->

                <!-------------------------------------------------------------SECCIÓN DE MENSAJES-------------------------------------------->
                <!--Mensajes Enviados-->
                <section id="mensajesE" style="display: none;">
                    <form method="POST" class="container mr-0">
                        <div class="row col-5  mt-4">
                            <div class="input-group mb-3">
                                <label for="caja_busqueda" class="mt-1">Buscar:</label>
                                <input type="text" name="caja_busqueda" id="caja_busqueda" class="form-control" placeholder="Busca por taller, fecha, mensaje">
                            </div>
                        </div>
                    </form>

                    <div class="container-fluid">
                        <div class="col-12 card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    Historial de mensajes</h3>
                            </div>
                        </div>
                        <div class="container">

                            <section id="tabla_resultado" class="content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title text-center">ESTADÍSTICA DE LA OCUPACIÓN HOTELERA</h3>
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
                        </div>
                        <!-- /.container-fluid -->
                </section>


                <!--Mensajes Nuevos-->
                <section class="mensajesN container" id="mensajesN" style="display: none;">
                    <div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-10 mt-3"><label for="talleres">Redacta tu mensaje</label></div>
                                <div class="col-2"><img src="img/mensajes.png" alt="mensajes" width="50" height="50"></div>
                            </div>
                        </div>
                        <form action="mensajeAdmin.php" method="POST">
                            <div class="form-group sr-only ">
                                <input type="text" class="form-control" name="admin_id" id="admin_id" value="<?php echo $id_admin; ?>">
                            </div>

                            <div class="form-group">
                                <label for="mensaje"></label>
                                <textarea class="form-control" name="mensaje" id="mensaje" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default" title="Advertencia" data-trigger="hover" data-content="Recuerda que una vez enviado no podrás eliminarlo" data-toggle="popover">Enviar</button>
                            </div>

                        </form>
                    </div>
                </section>





            </main>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="js/popper.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/js.js" type="text/javascript"></script>
    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-30d18ea41045577cdb11c797602d08e0b9c2fa407c8b81058b1c422053ad8041.js" type="text/javascript"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#cambiarp").on('click', function() {
                $("#perfil").show();
                return false;
            });
            //seccion de mensajes
            $("#mensajesEnviados").on('click', function() {
                $("#inicio").hide();
                $("#mensajesN").hide();
                $("#mensajesE").show();
                return false;
            });
            $("#mensajesNuevos").on('click', function() {
                $("#inicio").hide();
                $("#mensajesN").show();
                return false;
            });
            //seccion de maestro
            $("#page-mtro").on('click', function() {
                $("#inicio").hide();
                $("#mensajesN").hide();
                $("#teach-options").show();
                $("#table-mtro").show();
                return false;
            });
            $("#registrarM").on('click', function() {
                $("#inicio").hide();
                $("#form-Tregister").show();
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