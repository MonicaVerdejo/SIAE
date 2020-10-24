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
    <!--MODAL BOOTSTRAP-->
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
                            <li id="page-Course">
                                <a href="#">
                                    <i class="fas fa-table"></i>
                                    <span>Talleres</span>
                                </a>
                            </li>
                            <li id="page-schedule">
                                <a href="#">
                                    <i class="fas fa-calendar-alt    "></i>
                                    <span>Horarios</span>
                                </a>
                            </li>
                            <li id="page-mtro">
                                <a href="#">
                                    <i class="fas fa-table"></i>
                                    <span>Maestros</span>
                                </a>
                            </li>

                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                    <span>Alumnos</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul style="text-align: center;">
                                        <li id="page-std" style="text-align: left;" class="btn btn-outline-info btn-sm mt-1 mb-1" id="mensajesEnviados">
                                            <i class="fa fa-archive" aria-hidden="true"></i>Administrar
                                        </li> <br>
                                        <p style="color: white; text-align: left; margin-left:15px;">Listas/Evaluar:</p>
                                        <li>
                                            <?php
                                            $sentencia = $db->connect()->prepare("SELECT taller FROM talleres");
                                            $sentencia->execute();

                                            foreach ($sentencia as $row) {

                                            ?>
                                                <form class="text-center" action="buscar_id.php" method="POST">

                                                    <input <?php if ($row[0] == "No asignado") { ?> style="display: none;" <?php } else { ?> type="submit" id="hotel" name="hotel" class="btn btn-outline-info btn-sm mt-1 mb-1" value="<?php echo $row[0];
                                                                                                                                                                                                                                    } ?>">
                                                    </input>
                                                </form>
                                            <?php } ?>




                                        </li>
                                    </ul>
                                </div>
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

                                        <li class="btn btn-outline-info btn-sm mt-1 mb-1" id="mensajesNuevos">
                                            <i class="fas fa-edit"></i>Nuevo
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li id="mtro_evaluacion">
                                <a href="">
                                    <i class="fa fa-hourglass" aria-hidden="true"></i>
                                    <span>Evaluación bimestral</span>
                                </a>
                            </li>
                            <li id="mtro_instrumentacion">
                                <a href="">
                                    <i class="fa fa-hourglass" aria-hidden="true"></i>
                                    <span>Instrumentación didáctica</span>
                                </a>
                            </li>
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
                <div class="container-fluid">
                    <h2>SIAE</h2>
                </div>

                <!-------------------------------------------------------------SECCIÓN DE CMS------------------------------------------------->

                <section class="section bg-default text-md-center">
                    <div class="container " id="cms" style="display:none;">
                        <h4 style="color:black">TABLERO DE EDICIÓN</h4>
                        <div class="base-cms mt-5">
                            <br>
                            <h5 class="mt-1">Nueva experiencia de edición</h5>
                            <hr>
                            <div class="row">
                                <div class="col-4 ">
                                    <div class="img-div-1 btn btn-default btn-rounded" data-toggle="modal" data-target="#inicioModal">
                                        <p class="font-weight-bold">INICIO</p>
                                        <img src="img/muestra.png" height="150px" alt="Edit image index">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="img-div-2 btn btn-default btn-rounded" data-toggle="modal" data-target="#civicoModal">
                                        <p class="font-weight-bold">CIVICO</p>
                                        <img src="img/image.png" height="150px" alt="Edit image civico">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="img-div-3 btn btn-default btn-rounded" data-toggle="modal" data-target="#culturalModal">
                                        <p class="font-weight-bold">CULTURAL</p>
                                        <img src="img/galeria.png" height="150px" alt="Edit image cultural">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 ">
                                    <div class="img-div-1 btn btn-default btn-rounded" data-toggle="modal" data-target="#deportivoModal">
                                        <p class="font-weight-bold">DEPORTIVO</p>
                                        <img src="img/img.png" height="150px" alt="Edit image index">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="img-div-2 btn btn-default btn-rounded" data-toggle="modal" data-target="#slider1Modal">
                                        <p class="font-weight-bold">SLIDER 1</p>
                                        <img src="img/galeriaa.png" height="150px" alt="Edit image civico">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="img-div-3 btn btn-default btn-rounded" data-toggle="modal" data-target="#slider2Modal">
                                        <p class="font-weight-bold">SLIDER 2</p>
                                        <img src="img/imagen.png" height="150px" alt="Edit image cultural">
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <div class="img-div-1 btn btn-default btn-rounded" data-toggle="modal" data-target="#slider3Modal">
                                        <p class="font-weight-bold">SLIDER 3</p>
                                        <img src="img/gallery.png" height="150px" alt="Edit image cultural">
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div>
                                <label>
                                    En esta sección podrás editar las imágenes que deseas destaquen en tu página sin necesidad de acudir al técnico del sistema.
                                    <br> Recuerda que es primordial te acates a las dimensiones específicadas si deseas que no haya desbordes en la misma.
                                </label>
                                <div class="col-12">
                                    <div class="">
                                        <img src="img/CMS.png" height="150px" alt="CMS">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>
                    </div>
                </section>

                <!--Modal Form Index-->
                <div class="modal fade" id="inicioModal" tabindex="-1" role="dialog" aria-labelledby="inicioModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="inicioModalLabel">Cambiar imagen de Inicio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">

                                <img src="img/img_edit/bg-image-1-1920x800.jpg" width="400px" alt="Portada Inicio">

                                <form class="col-12" action="cms/upload_inicio.php" method="post" enctype="multipart/form-data">
                                    <br>
                                    <input type="file" lass="form-control" name="file" id="file">
                                    <p class=" mt-4 center "><input class="btn btn-secondary" name="enviar" type="submit" value="Enviar"></p>
                                </form>
                                <span>Recuerda verificar las dimensiones requeridas antes de asignar la foto</span>
                            </div>


                        </div>
                    </div>
                </div>

                <!--Modal Form Civico-->
                <div class="modal fade" id="civicoModal" tabindex="-1" role="dialog" aria-labelledby="civicoModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="civicoModalLabel">Cambiar imagen de Civico</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">

                                <img src="img/img_edit/bg-image-1-1920x800.jpg" width="400px" alt="Portada Inicio">

                                <form class="col-12" action="cms/upload_civico.php" method="post" enctype="multipart/form-data">
                                    <br>
                                    <input type="file" lass="form-control" name="file" id="file">
                                    <p class=" mt-4 center "><input class="btn btn-secondary" name="enviar" type="submit" value="Enviar"></p>
                                </form>
                                <span>Recuerda verificar las dimensiones requeridas antes de asignar la foto</span>
                            </div>


                        </div>
                    </div>
                </div>

                <!--Modal Form Cultural-->
                <div class="modal fade" id="culturalModal" tabindex="-1" role="dialog" aria-labelledby="culturalModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="culturalModalLabel">Cambiar imagen de Cultural</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="img/img_edit/bg-image-1-1920x800.jpg" width="400px" alt="Portada Inicio">
                                <form class="col-12" action="cms/upload_cultural.php" method="post" enctype="multipart/form-data">
                                    <br>
                                    <input type="file" lass="form-control" name="file" id="file">
                                    <p class=" mt-4 center "><input class="btn btn-secondary" name="enviar" type="submit" value="Enviar"></p>
                                </form>
                                <span>Recuerda verificar las dimensiones requeridas antes de asignar la foto</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal Form Deportivo-->
                <div class="modal fade" id="deportivoModal" tabindex="-1" role="dialog" aria-labelledby="deportivoModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deportivoModalLabel">Cambiar imagen de Deportivo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="img/img_edit/bg-image-1-1920x800.jpg" width="400px" alt="Portada Inicio">
                                <form class="col-12" action="cms/upload_deportivo.php" method="post" enctype="multipart/form-data">
                                    <br>
                                    <input type="file" lass="form-control" name="file" id="file">
                                    <p class=" mt-4 center "><input class="btn btn-secondary" name="enviar" type="submit" value="Enviar"></p>
                                </form>
                                <span>Recuerda verificar las dimensiones requeridas antes de asignar la foto</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal Form Slider1-->
                <div class="modal fade" id="slider1Modal" tabindex="-1" role="dialog" aria-labelledby="slider1ModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="slider1ModalLabel">Cambiar la imagen 1 del carrusel que se presenta en el módulo de Inicio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="img/img_edit/index-1-618x614.jpg" height="250px" alt="Portada Inicio">
                                <form class="col-12" action="cms/upload_slider1.php" method="post" enctype="multipart/form-data">
                                    <br>
                                    <input type="file" lass="form-control" name="file" id="file">
                                    <p class=" mt-4 center "><input class="btn btn-secondary" name="enviar" type="submit" value="Enviar"></p>
                                </form>
                                <span>Recuerda verificar las dimensiones requeridas antes de asignar la foto</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal Form Slider2-->
                <div class="modal fade" id="slider2Modal" tabindex="-1" role="dialog" aria-labelledby="slider2ModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="slider2ModalLabel">Cambiar la imagen 2 del carrusel que se presenta en el módulo de Inicio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="img/img_edit/index-1-618x614.jpg" height="250px" alt="Portada Inicio">
                                <form class="col-12" action="cms/upload_slider2.php" method="post" enctype="multipart/form-data">
                                    <br>
                                    <input type="file" lass="form-control" name="file" id="file">
                                    <p class=" mt-4 center "><input class="btn btn-secondary" name="enviar" type="submit" value="Enviar"></p>
                                </form>
                                <span>Recuerda verificar las dimensiones requeridas antes de asignar la foto</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal Form Slider3-->
                <div class="modal fade" id="slider3Modal" tabindex="-1" role="dialog" aria-labelledby="slider3ModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="slider3ModalLabel">Cambiar la imagen 2 del carrusel que se presenta en el módulo de Inicio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="img/img_edit/index-1-618x614.jpg" height="250px" alt="Portada Inicio">
                                <form class="col-12" action="cms/upload_slider3.php" method="post" enctype="multipart/form-data">
                                    <br>
                                    <input type="file" lass="form-control" name="file" id="file">
                                    <p class=" mt-4 center "><input class="btn btn-secondary" name="enviar" type="submit" value="Enviar"></p>
                                </form>
                                <span>Recuerda verificar las dimensiones requeridas antes de asignar la foto</span>
                            </div>
                        </div>
                    </div>
                </div>



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
                    <section class="section-form bg-default mt-4" id="form-Tregister" style="display: none;">
                        <div id="base">
                            <div id="titulo">Agregar Maestro</div>
                            <div id="form">
                                <form method="POST" action="admin/registrar_mtro.php">
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
                                    $taller = $db->connect()->prepare("SELECT id, taller FROM `talleres` WHERE 1");
                                    $taller->execute();
                                    ?>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="taller">Taller</label>
                                        </div>
                                        <select class="custom-select" name="taller" id="taller" required="true">
                                            <?php foreach ($taller as $row) {
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
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono">Telefono</label>
                                        <input id="telefono" class="form-control" type="text" name="telefono" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="sexo">Sexo</label>
                                        <select id="sexo" class="form-control" name="sexo" required="true">
                                            <option>M</option>
                                            <option>F</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </section>

                    <!--Form-edit-maestro-->
                    <section class="mt-4 section-form bg-default" style="display:none" id="form-Tedit">
                        <div id="base">
                            <div id="triangle"></div>
                            <div id="titulo">Editar Maestro</div>
                            <div id="form">
                                <form method="POST" action="admin/edit_mtro.php">
                                    <?php
                                    $taller = $db->connect()->prepare("SELECT id, nombre FROM `maestro` WHERE 1");
                                    $taller->execute();
                                    ?>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="mtro">Maestro</label>
                                        </div>
                                        <select class="custom-select" name="mtro" id="mtro" required="true">
                                            <?php foreach ($taller as $row) {
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
                                    </div>
                                    <div class="form-group">
                                        <label for="correo">Correo</label>
                                        <input id="correo" class="form-control" type="email" name="correo" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input id="password" class="form-control" type="password" name="password" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="curp">Curp</label>
                                        <input id="curp" class="form-control" type="text" name="curp" required="true">
                                    </div>
                                    <?php
                                    $taller = $db->connect()->prepare("SELECT id, taller FROM `talleres` WHERE 1");
                                    $taller->execute();
                                    ?>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="taller">Taller</label>
                                        </div>
                                        <select class="custom-select" name="taller" id="taller" required="true">
                                            <?php foreach ($taller as $row) {
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
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono">Telefono</label>
                                        <input id="telefono" class="form-control" type="text" name="telefono" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="sexo">Sexo</label>
                                        <select id="sexo" class="form-control" name="sexo" required="true">
                                            <option>M</option>
                                            <option>F</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </section>

                    <!--Form-eliminar-maestro-->
                    <section class="mt-4 section-form bg-default" style="display:none" id="form-Tdelete">
                        <div id="base">
                            <div id="triangle"></div>
                            <div id="titulo">Eliminar maestro</div>

                            <img src="img/logos/recycle-bin.png" width="100px" alt="Borrar">
                            <div class="mt-4" id="form">
                                <form method="POST" action="admin/delete_mtro.php">
                                    <?php
                                    $taller = $db->connect()->prepare("SELECT id, nombre FROM `maestro` WHERE 1");
                                    $taller->execute();
                                    ?>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="mtro">Maestro</label>
                                        </div>
                                        <select class="custom-select" name="mtro" id="mtro" required="true">
                                            <?php foreach ($taller as $row) {
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
                                    </div>

                                    <input class="btn btn-info" type="submit" value="Enviar" title="Advertencia" data-trigger="hover" data-content="Recuerda que una vez eliminado no podrás recuperarlo" data-toggle="popover">

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
                                                <table class="table table-bordered table-hover table-responsive" style="width:80%;margin-left:12%;">
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

                <section class="section  section-xl bg-default text-md-center">
                    <!--Page alumnos-->
                    <div class="container" style="display:none;" id="student-options">
                        <h4>ALUMNOS</h4>
                        <div class="row row-lg row-30">

                            <div class="col-sm-6 col-md-4 wow blurIn" data-wow-delay=".2s" id="registrarA">
                                <article class=""><img src="img/logos/new-user.png" alt="" width="100" height="100" />
                                    <div class="">
                                        <div>
                                            <h4 class=""><a href="#">Registrar</a></h4>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6 col-md-4 wow blurIn" data-wow-delay=".2s" id="editA">

                                <article class=""><img src="img/logos/edit-user.png" alt="" width="100" height="100" />
                                    <div class="">
                                        <div>
                                            <h4 class=""><a href="#">Editar</a></h4>

                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6 col-md-4 wow blurIn" data-wow-delay=".1s" id="deleteA">

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

                    <!--Form-registrar-alumno-->
                    <section class="section-form bg-default mt-4 mb-4" id="form-Aregister" style="display: none;">
                        <div id="base">
                            <div id="titulo">Agregar Alumno</div>
                            <div id="form">
                                <form method="POST" action="admin/registrar_std.php">
                                    <div class="form-group">
                                        <label for="nombre">Nombre completo</label>
                                        <input id="nombre" class="form-control" type="text" name="nombre" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="matricula">Matricula</label>
                                        <input id="matricula" class="form-control" type="text" name="matricula" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="year">Año de nacimiento</label>
                                        <input id="year" class="form-control" type="text" name="year" required="true">
                                    </div>
                                    <?php
                                    $taller = $db->connect()->prepare("SELECT id, taller FROM `talleres` WHERE 1");
                                    $taller->execute();
                                    ?>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="taller">Taller</label>
                                        </div>
                                        <select class="custom-select" name="taller" id="taller" required="true">
                                            <?php foreach ($taller as $row) {
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
                                    </div>
                                    <div class="form-group">
                                        <label for="representativo">Representativo</label>
                                        <select id="representativo" class="form-control" name="representativo" required="true">
                                            <option>Sí</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="carrera">Carrera</label>
                                        <select id="carrera" class="form-control" name="carrera" required="true">
                                            <option>Ingeniería en Sistemas Computacionales</option>
                                            <option>Ingeniería Ambiental</option>
                                            <option>Ingeniería Electromecánica</option>
                                            <option>Ingeniería en Gestion Empresarial</option>
                                            <option>Ingeniería en Logística</option>
                                            <option>Ingeniería en Administración</option>
                                            <option>Licenciatura en Turismo</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="semestre">Semestre</label>
                                        <select id="semestre" class="form-control" name="semestre" required="true">
                                            <option>Primero</option>
                                            <option>Segundo</option>
                                            <option>Tercero</option>
                                            <option>Cuarto</option>
                                            <option>Quinto</option>
                                            <option>Sexto</option>
                                            <option>Séptimo</option>
                                            <option>Octavo</option>
                                            <option>Noveno</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sexo">Sexo</label>
                                        <select id="sexo" class="form-control" name="sexo" required="true">
                                            <option>M</option>
                                            <option>F</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </section>

                    <!--Form-edit-alumno-->
                    <section class="mt-4 mb-4 section-form bg-default" style="display:none" id="form-Aedit">
                        <div id="base">
                            <div id="triangle"></div>
                            <div id="titulo">Editar Alumno</div>
                            <div id="form">
                                <form method="POST" action="admin/edit_std.php">
                                    <div class="form-group">
                                        <label for="matricula">Matricula</label>
                                        <input id="matricula" class="form-control" type="text" name="matricula" required="true">
                                    </div>
                                    <?php
                                    $taller = $db->connect()->prepare("SELECT id, taller FROM `talleres` WHERE 1");
                                    $taller->execute();
                                    ?>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="taller">Taller</label>
                                        </div>
                                        <select class="custom-select" name="taller" id="taller" required="true">
                                            <?php foreach ($taller as $row) {
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
                                    </div>
                                    <div class="form-group">
                                        <label for="representativo">Representativo</label>
                                        <select id="representativo" class="form-control" name="representativo" required="true">
                                            <option>Sí</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Estatus del curso</label>
                                        <select id="status" class="form-control" name="status" required="true">
                                            <option>Cursando</option>
                                            <option>Aprobado</option>
                                            <option>Reprobado</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="semestre">Semestre</label>
                                        <select id="semestre" class="form-control" name="semestre" required="true">
                                            <option>Primero</option>
                                            <option>Segundo</option>
                                            <option>Tercero</option>
                                            <option>Cuarto</option>
                                            <option>Quinto</option>
                                            <option>Sexto</option>
                                            <option>Séptimo</option>
                                            <option>Octavo</option>
                                            <option>Noveno</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </section>

                    <!--Form-eliminar-alumno-->
                    <section class="mt-4 mb-4 section-form bg-default" style="display:none" id="form-Adelete">
                        <div id="base">
                            <div id="triangle"></div>
                            <div id="titulo">Eliminar Alumno</div>
                            <div id="form">

                                <img src="img/logos/recycle-bin.png" width="100px" alt="Borrar">

                                <form class="col-12" action="admin/delete_std.php" method="post">
                                    <br>
                                    <div class="form-group">
                                        <label for="matricula">Ingresa la Matricula</label>
                                        <input id="matricula" class="form-control" type="text" name="matricula" required=>
                                    </div>
                                    <button type="submit" class="btn btn-secondary" title="Advertencia" data-trigger="hover" data-content="Recuerda que una vez eliminado no podrás recuperarlo" data-toggle="popover">Enviar</button>
                                </form>



                            </div>
                        </div>
                    </section>

                    <!--End-alumnos_section-->

                </section>

                <!-------------------------------------------------------------SECCIÓN DE MENSAJES-------------------------------------------->
                <!--Mensajes Enviados-->
                <section id="mensajesE" style="display: none;">
                    <div class="container-fluid">
                        <div class="col-12 card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    Historial de mensajes</h3>
                            </div>
                        </div>
                        <div>
                            <div class="col-lg-12 col-xs-12">
                                <div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered table-hover">
                                            <thead style="background-color:steelblue;">
                                                <th>Fecha de envío</th>
                                                <th>Mensaje enviado</th>

                                            </thead>
                                            <tbody style="background-color:  #f7f5f3;">
                                                <?php
                                                $busqueda = $db->connect()->prepare('SELECT fecha, mensaje FROM `mensajeadmin` order by fecha desc');
                                                $busqueda->execute();
                                                foreach ($busqueda as $fila) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $fila[0]; ?></td>
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

                <!-------------------------------------------------------------SECCIÓN DE TALLERES------------------------------------------------->
                <section class="section bg-default text-md-center">
                    <div id="options_T" style="display: none;">
                        <div>
                            <h3>TALLERES</h3>
                            <img src="img/talleres.png" width="250" height="200" alt="cms_Talleres">
                        </div>
                        <!--Options-Talleres-->
                        <div class="row row-lg row-30 mt-5">
                            <div class="col-sm-6 col-md-3 wow blurIn" data-wow-delay=".2s" id="registrarTaller">
                                <article class=""><img src="img/logos/newT.png" alt="" width="100" height="100" />
                                    <div class="">
                                        <div>
                                            <h4 class=""><a href="#">Registrar</a></h4>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6 col-md-3 wow blurIn" data-wow-delay=".2s" id="editTaller">
                                <article class=""><img src="img/logos/editT.png" alt="" width="100" height="100" />
                                    <div class="">
                                        <div>
                                            <h4 class=""><a href="#">Editar</a></h4>

                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6 col-md-3 wow blurIn" data-wow-delay=".1s" id="deleteTaller">
                                <article class=""><img src="img/logos/deleteT.png" alt="" width="100" height="100" />
                                    <div class="">
                                        <div>
                                            <h4 class=""><a href="#">Eliminar</a></h4>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6 col-md-3 wow blurIn" data-wow-delay=".1s" id="mostrarTaller">
                                <article class=""><img src="img/logos/show-listado.png" alt="" width="100" height="100" />
                                    <div class="">
                                        <div>
                                            <h4 class=""><a href="#">Mostrar talleres</a></h4>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>

                        <!--Form-registrar-Taller-->
                        <section class="section-form bg-default mt-4" id="form-Courseregister" style="display: none;">
                            <div id="base">
                                <div id="titulo">Agregar Taller</div>
                                <div id="form">
                                    <form method="POST" action="admin/registrar_Taller.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="nombre">Nombre del Taller</label>
                                            <input placeholder="Volleyball" id="nombre" class="form-control" type="text" name="nombre" required="true">
                                        </div>
                                        <div class="form-group">
                                            <label for="nombreR">Nombre grupo representativo</label>
                                            <input placeholder="Los halcones del Itescham" id="nombreR" class="form-control" type="text" name="nombreR" required="true">
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <textarea placeholder="En este taller aprenderás todo lo necesario para ser una estrella en el volleyball." id="descripcion" class="form-control" name="descripcion" rows="5" required="true"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="categoria">Categoria</label>
                                            <select id="categoria" class="form-control" name="categoria" required="true">
                                                <option>Civico</option>
                                                <option>Cultural</option>
                                                <option selected>Deportivo</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            <textarea placeholder="Unidad deportiva 'Ulises Sansores'" id="direccion" class="form-control" name="direccion" rows="2" required="true"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="file">Imagen representativa</label>
                                            <input type="file" lass="form-control" name="file" id="file" required="true">
                                        </div>
                                        <button type="submit" class="btn btn-secondary">Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </section>

                        <!--Form-edit-Taller-->
                        <section class="mt-4 section-form bg-default" style="display:none" id="form-Courseedit">
                            <div id="base">
                                <div id="triangle"></div>
                                <div id="titulo">Editar Taller</div>
                                <div id="form">
                                    <form method="POST" action="admin/edit_taller.php" enctype="multipart/form-data">
                                        <?php
                                        $taller = $db->connect()->prepare("SELECT id, taller FROM `talleres` WHERE 1");
                                        $taller->execute();
                                        ?>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="nombre">Taller</label>
                                            </div>
                                            <select class="custom-select" name="nombre" id="nombre" required="true">
                                                <?php foreach ($taller as $row) {
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
                                        </div>
                                        <div class="form-group">
                                            <label for="nombreR">Nombre grupo representativo</label>
                                            <input placeholder="Los halcones del Itescham" id="nombreR" class="form-control" type="text" name="nombreR" required="true">
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <textarea placeholder="En este taller aprenderás todo lo necesario para ser una estrella en el volleyball." id="descripcion" class="form-control" name="descripcion" rows="5" required="true"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="categoria">Categoria</label>
                                            <select id="categoria" class="form-control" name="categoria" required="true">
                                                <option>Civico</option>
                                                <option>Cultural</option>
                                                <option selected>Deportivo</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            <textarea placeholder="Unidad deportiva 'Ulises Sansores'" id="direccion" class="form-control" name="direccion" rows="2" required="true"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="file">Imagen representativa</label>
                                            <input type="file" lass="form-control" name="file" id="file" required="true">
                                        </div>

                                        <button type="submit" class="btn btn-secondary">Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </section>

                        <!--Form-eliminar-Taller-->
                        <section class="mt-4 section-form bg-default" style="display:none" id="form-Coursedelete">
                            <div id="base">
                                <div id="triangle"></div>
                                <div id="titulo">Eliminar taller</div>

                                <img src="img/logos/recycle-bin.png" width="100px" alt="Borrar">
                                <div class="mt-4" id="form">

                                    <form method="POST" action="admin/delete_taller.php">
                                        <?php
                                        $taller = $db->connect()->prepare("SELECT id, taller FROM `talleres` WHERE 1");
                                        $taller->execute();
                                        ?>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="taller">Taller</label>
                                            </div>
                                            <select class="custom-select" name="taller" id="taller" required="true">
                                                <?php foreach ($taller as $row) {
                                                ?>
                                                    <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <input class="btn btn-info" type="submit" value="Enviar" title="Advertencia" data-trigger="hover" data-content="Recuerda que una vez eliminado no podrás recuperarlo" data-toggle="popover">

                                    </form>
                                </div>
                            </div>
                        </section>


                        <!--Tabla de talleres dados de alta-->
                        <div class="container mt-5" style="display:none;" id="table-talleres">
                            <section>
                                <div class="container-fluid">
                                    <div class="col-12 card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="fa fa-address-book" aria-hidden="true"></i>
                                                Talleres dados de alta en el sistema </h3>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="col-lg-12 col-xs-12">
                                            <div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <table class="table table-bordered table-hover table-responsive" style="width:100%;margin-left:1%;">
                                                        <thead style="background-color:steelblue;">
                                                            <th>Taller</th>
                                                            <th>Nombre del representativo</th>
                                                            <th>Descripción</th>
                                                            <th>Maestro Asignado</th>
                                                            <th>Horario</th>
                                                            <th>Categoria</th>
                                                            <th>Dirección</th>
                                                        </thead>
                                                        <tbody style="background-color:  #f7f5f3;">
                                                            <?php
                                                            $busqueda = $db->connect()->prepare('SELECT taller, talleres.nombre,descripcion, maestro.nombre, horario, categoria,direccion FROM `talleres` join maestro on talleres.mtro_asignado=maestro.id');
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
                                    <!-- /.row -->
                                </div>
                                <!-- /.container-fluid -->
                            </section>
                        </div>



                        <footer class="container-fluid mt-4">
                            <div class="col-12 card " style="background-color: slategray;">
                                <div class="card-header">
                                    <span class="">
                                        Recuerda que ésta sección esta enlazada con el inicio de la página oficial, por lo que todos los talleres que registres serán visibles para todos los usuarios.
                                    </span>
                                </div>
                            </div>
                        </footer>

                    </div>

                </section>
                <!-------------------------------------------------------------SECCIÓN DE EVALUACION BIMESTRAL------------------------------------------------->




                <!-------------------------------------------------------------INSTRUMENTACION DIDACTICA--------------------------------------------->

                <section>
                    <div style="display:none;" id="instrumentacionD">
                        <div class="container">
                            <!--Tabla de instrumentacion didactica -->
                            <div class="col-12 card mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fa fa-address-book" aria-hidden="true"></i>
                                        Instrumentación didáctica del curso</h3>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xs-12 mt-2">
                                <div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered table-hover">
                                            <thead style="background-color:steelblue;">
                                                <th>Nombre</th>
                                                <th>Taller</th>
                                                <th>Fecha</th>
                                                <th>Documento</th>

                                            </thead>
                                            <tbody style="background-color:  #f7f5f3;">
                                                <?php
                                                $busqueda = $db->connect()->prepare('SELECT maestro.nombre, taller,fecha, documento FROM `maestro` join documentos join talleres on maestro.id=documentos.maestro_id and talleres.id=maestro.taller_asignado WHERE documentos.categoria="instrumentacionD"');
                                                $busqueda->execute();
                                                foreach ($busqueda as $fila) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $fila[0]; ?></td>
                                                        <td><?php echo $fila[1]; ?></td>
                                                        <td><?php echo $fila[2]; ?></td>
                                                        <td>

                                                            <a download="Instrumentacion didactica" href="maestro/documentos/instrumentacion/<?php echo $fila[3]; ?>">
                                                                <img src="img/descargar.png" width="60" height="60" alt="Descargar Formato de Instrumentacion Didáctica"></a>

                                                        </td>
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
                    </div>
                </section>


                <!-------------------------------------------------------------SECCIÓN DE HORARIOS------------------------------------------------->
                <section class="section bg-default text-md-center">
                    <div id="options_Hr" style="display: none;">
                        <div>
                            <h3>HORARIOS</h3>
                            <img src="img/logos/schedule.png" width="250" height="200" alt="cms_Talleres">
                        </div>
                        <!--Options-Talleres-->
                        <div class="row row-lg row-30 mt-5 mb-5" style="margin:auto;">

                            <div class="col-sm-6 col-md-3 wow blurIn" data-wow-delay=".2s" id="registrarHorario">
                                <article class=""><img src="img/logos/editHr.png" alt="" width="100" height="100" />
                                    <div class="">
                                        <div>
                                            <h4 class=""><a href="#">Asignar horario</a></h4>

                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6 col-md-3 wow blurIn" data-wow-delay=".2s" id="editarHorario">
                                <article class=""><img src="img/logos/editT.png" alt="" width="100" height="100" />
                                    <div class="">
                                        <div>
                                            <h4 class=""><a href="#">Editar horario</a></h4>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6 col-md-3 wow blurIn" data-wow-delay=".1s" id="eliminarHorario">
                                <article class=""><img src="img/logos/recycle-bin.png" alt="" width="100" height="100" />
                                    <div class="">
                                        <div>
                                            <h4 class=""><a href="#">Eliminar horarios</a></h4>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6 col-md-3 wow blurIn" data-wow-delay=".1s" id="mostrarHorario">
                                <article class=""><img src="img/logos/show-listado.png" alt="" width="100" height="100" />
                                    <div class="">
                                        <div>
                                            <h4 class=""><a href="#">Mostrar horarios</a></h4>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>


                        <!--Form-registrar-Horario-->
                        <section class="mt-4 section-form bg-default" style="display:none" id="form-registrarHr">
                            <div id="base">
                                <div id="triangle"></div>
                                <div id="titulo">Asignar Horario</div>
                                <div id="form">
                                    <form method="POST" action="admin/registrar_horario.php" enctype="multipart/form-data">
                                        <?php
                                        $taller = $db->connect()->prepare("SELECT id, taller FROM `talleres` WHERE 1");
                                        $taller->execute();
                                        ?>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="nombre">Taller</label>
                                            </div>
                                            <select class="custom-select" name="nombre" id="nombre" required="true">
                                                <?php foreach ($taller as $row) {
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
                                        </div>

                                        <div class="form-group">
                                            <label for="turno">Turno</label>
                                            <select id="turno" class="form-control" name="turno" required="true">
                                                <option selected value="matutino">Matutino</option>
                                                <option value="vespertino">Vespertino</option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="lunes">Lunes:</label>
                                            <input type="text" name="lunes" id="" class="form-control" placeholder="12:00pm - 1:30pm" aria-describedby="helpId" required="True">
                                        </div>

                                        <div class="form-group">
                                            <label for="martes">Martes:</label>
                                            <input type="text" name="martes" id="" class="form-control" placeholder="1:30pm - 2:30pm" aria-describedby="helpId" required="True">
                                        </div>

                                        <div class="form-group">
                                            <label for="miercoles">Miércoles:</label>
                                            <input type="text" name="miercoles" id="" class="form-control" placeholder="10:00am - 12:30pm" aria-describedby="helpId" required="True">
                                        </div>

                                        <div class="form-group">
                                            <label for="jueves">Jueves:</label>
                                            <input type="text" name="jueves" id="" class="form-control" placeholder="12:00pm - 1:30pm" aria-describedby="helpId" required="True">
                                        </div>

                                        <div class="form-group">
                                            <label for="viernes">Viernes:</label>
                                            <input type="text" name="viernes" id="" class="form-control" placeholder="2:00pm - 3:30pm" aria-describedby="helpId" required="True">
                                        </div>

                                        <div class="form-group">
                                            <label for="sabado">Sábado:</label>
                                            <input type="text" name="sabado" id="" class="form-control" placeholder="7:00pm - 8:30pm" aria-describedby="helpId" required="True">
                                        </div>

                                        <div class="form-group">
                                            <label for="domingo">Domingo:</label>
                                            <input type="text" name="domingo" id="" class="form-control" placeholder="10:00am - 11:30am" aria-describedby="helpId" required="True">
                                        </div>

                                        <button type="submit" class="btn btn-secondary">Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </section>

                        <!--Form-editar-Horario-->
                        <section class="mt-4 section-form bg-default" style="display:none" id="form-editarHr">
                            <div id="base">
                                <div id="triangle"></div>
                                <div id="titulo">Editar Horario</div>
                                <div id="form">
                                    <form method="POST" action="admin/edit_horario.php" enctype="multipart/form-data">
                                        <?php
                                        $taller = $db->connect()->prepare("SELECT id, taller FROM `talleres` WHERE 1");
                                        $taller->execute();
                                        ?>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="nombre">Taller</label>
                                            </div>
                                            <select class="custom-select" name="nombre" id="nombre" required="true">
                                                <?php foreach ($taller as $row) {
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
                                        </div>

                                        <div class="form-group">
                                            <label for="turno">Turno</label>
                                            <select id="turno" class="form-control" name="turno" required="true">
                                                <option selected value="matutino">Matutino</option>
                                                <option value="vespertino">Vespertino</option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="lunes">Lunes:</label>
                                            <input type="text" name="lunes" id="" class="form-control" placeholder="12:00pm - 1:30pm" aria-describedby="helpId" required="True">
                                        </div>

                                        <div class="form-group">
                                            <label for="martes">Martes:</label>
                                            <input type="text" name="martes" id="" class="form-control" placeholder="1:30pm - 2:30pm" aria-describedby="helpId" required="True">
                                        </div>

                                        <div class="form-group">
                                            <label for="miercoles">Miércoles:</label>
                                            <input type="text" name="miercoles" id="" class="form-control" placeholder="10:00am - 12:30pm" aria-describedby="helpId" required="True">
                                        </div>

                                        <div class="form-group">
                                            <label for="jueves">Jueves:</label>
                                            <input type="text" name="jueves" id="" class="form-control" placeholder="12:00pm - 1:30pm" aria-describedby="helpId" required="True">
                                        </div>

                                        <div class="form-group">
                                            <label for="viernes">Viernes:</label>
                                            <input type="text" name="viernes" id="" class="form-control" placeholder="2:00pm - 3:30pm" aria-describedby="helpId" required="True">
                                        </div>

                                        <div class="form-group">
                                            <label for="sabado">Sábado:</label>
                                            <input type="text" name="sabado" id="" class="form-control" placeholder="7:00pm - 8:30pm" aria-describedby="helpId" required="True">
                                        </div>

                                        <div class="form-group">
                                            <label for="domingo">Domingo:</label>
                                            <input type="text" name="domingo" id="" class="form-control" placeholder="10:00am - 11:30am" aria-describedby="helpId" required="True">
                                        </div>

                                        <button type="submit" class="btn btn-secondary">Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </section>

                        <!--Form-eliminar-Horario-->
                        <section class="mt-4 section-form bg-default" style="display:none" id="form-eliminarHr">
                            <div id="base">
                                <div id="triangle"></div>
                                <div id="titulo">Eliminar Horario</div>
                                <div id="form">
                                    <form method="POST" action="admin/delete_horario.php" enctype="multipart/form-data">
                                        <?php
                                        $taller = $db->connect()->prepare("SELECT id, taller FROM `talleres` WHERE 1");
                                        $taller->execute();
                                        ?>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="nombre">Taller</label>
                                            </div>
                                            <select class="custom-select" name="nombre" id="nombre" required="true">
                                                <?php foreach ($taller as $row) {
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
                                        </div>
                                        <div class="form-group">
                                            <label for="turno">Turno</label>
                                            <select id="turno" class="form-control" name="turno" required="true">
                                                <option selected value="matutino">Matutino</option>
                                                <option value="vespertino">Vespertino</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-secondary">Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </section>



                        <!--Horario-->

                        <div id="horario" style="display: none;">
                            <div class="row">
                                <div class="col-6">
                                    <img src="img/logos/horarios.png" width="200" height="auto" alt="Horario asignado">
                                </div>
                                <div class="col-6 ">
                                    <div class="card">
                                        <div class="card-header" style="margin:auto">
                                            <h1 class="card-title">HORARIOS ASIGNADOS</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $busqueda = $db->connect()->prepare("SELECT turno, lunes, martes,miercoles,jueves,viernes,sabado,domingo, talleres.taller FROM `horarios` join talleres on talleres.id=horarios.taller where 1");
                            $busqueda->execute();
                            foreach ($busqueda as $fila) {

                            ?>
                                <div class="container">
                                    <section id="tabla_resultado" class="content">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12 mt-3">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="mr-5 card-title text-center" style="text-transform: uppercase;"><?php echo $fila[8]; ?></h3>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <table class="mt-3 text-center table  table-hover table-responsive" style=" width: 70%; background-color: white;">
                                                                <thead style="background-color: lightslategray;">
                                                                    <th>Turno</th>
                                                                    <th>Lunes</th>
                                                                    <th>Martes</th>
                                                                    <th>Miercoles</th>
                                                                    <th>Jueves</th>
                                                                    <th>Viernes</th>
                                                                    <th>Sabado</th>
                                                                    <th>Domingo</th>
                                                                </thead>
                                                                <tbody>
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
                                                                </tbody>
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
                            <?php }

                            ?>
                        </div>









                        <footer class="container-fluid mt-4">
                            <div class="col-12 card " style="background-color: slategray;">
                                <div class="card-header">
                                    <span class="">
                                        Recuerda que todos los cambios que hagas en los horarios de los talleres serán visibles para todos los usuarios.
                                    </span>
                                </div>
                            </div>
                        </footer>

                    </div>

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
                                <form class="col-12" action="admin/changePass_Admin.php" method="post" enctype="multipart/form-data">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $("#cambiarp").on('click', function() {
                $("#perfil").show();
                return false;
            });
            //Seccion de CMS
            $("#inicio-cms").on('click', function() {
                $("#cms").show();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#teach-options").hide();
                $("#student-options").hide();
                $("#options_T").hide();
                $("#table-mtro").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#options_Hr").hide();
                return false;
            });
            //seccion de mensajes
            $("#mensajesEnviados").on('click', function() {
                $("#cms").hide();
                $("#mensajesE").show();
                $("#mensajesN").hide();
                $("#teach-options").hide();
                $("#student-options").hide();
                $("#options_T").hide();
                $("#table-mtro").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#form-Aedit").hide();
                $("#form-Aregister").hide();
                $("#form-Adelete").hide();
                $("#options_Hr").hide();
                return false;
            });
            $("#mensajesNuevos").on('click', function() {
                $("#cms").hide();
                $("#mensajesN").show();
                $("#mensajesE").hide();
                $("#teach-options").hide();
                $("#student-options").hide();
                $("#options_T").hide();
                $("#table-mtro").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#form-Aedit").hide();
                $("#form-Aregister").hide();
                $("#form-Adelete").hide();
                $("#options_Hr").hide();
                return false;
            });
            //seccion de maestro
            $("#page-mtro").on('click', function() {
                $("#cms").hide();
                $("#teach-options").show();
                $("#student-options").hide();
                $("#options_T").hide();
                $("#table-mtro").show();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#form-Adelete").hide();
                $("#form-Aedit").hide();
                $("#form-Aregister").hide();
                $("#options_Hr").hide();
                return false;
            });
            $("#registrarM").on('click', function() {
                $("#cms").hide();
                $("#form-Tregister").show();
                $("#form-Tedit").hide();
                $("#form-Tdelete").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                return false;
            });
            $("#editM").on('click', function() {
                $("#cms").hide();
                $("#form-Tedit").show();
                $("#form-Tregister").hide();
                $("#form-Tdelete").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                return false;
            });
            $("#deleteM").on('click', function() {
                $("#cms").hide();
                $("#form-Tdelete").show();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                return false;
            });
            //seccion de alumno
            $("#page-std").on('click', function() {
                $("#cms").hide();
                $("#student-options").show();
                $("#teach-options").hide();
                $("#options_T").hide();
                $("#table-mtro").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#options_Hr").hide();
                return false;
            });

            $("#registrarA").on('click', function() {
                $("#cms").hide();
                $("#form-Aregister").show();
                $("#form-Aedit").hide();
                $("#form-Adelete").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();

                return false;
            });
            $("#editA").on('click', function() {
                $("#cms").hide();
                $("#form-Aedit").show();
                $("#form-Aregister").hide();
                $("#form-Adelete").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();

                return false;
            });
            $("#deleteA").on('click', function() {
                $("#cms").hide();
                $("#form-Adelete").show();
                $("#form-Aedit").hide();
                $("#form-Aregister").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();

                return false;
            });
            //SECCION TALLERES
            $("#page-Course").on('click', function() {
                $("#cms").hide();
                $("#options_T").show();
                $("#student-options").hide();
                $("#teach-options").hide();
                $("#table-mtro").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#table-talleres").hide();
                $("#form-Adelete").hide();
                $("#form-Aedit").hide();
                $("#form-Aregister").hide();
                $("#form-Courseedit").hide();
                $("#form-Coursedelete").hide();
                $("#form-Courseregister").hide();
                $("#options_Hr").hide();
                return false;
            });
            $("#registrarTaller").on('click', function() {
                $("#cms").hide();
                $("#form-Aregister").hide();
                $("#form-Aedit").hide();
                $("#form-Adelete").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#table-talleres").hide();
                $("#form-Courseedit").hide();
                $("#form-Coursedelete").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#form-Courseregister").show();
                return false;
            });
            $("#editTaller").on('click', function() {
                $("#cms").hide();
                $("#table-talleres").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#form-Aedit").hide();
                $("#form-Aregister").hide();
                $("#form-Adelete").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#form-Courseregister").hide();
                $("#form-Coursedelete").hide();
                $("#form-Courseedit").show();
                return false;
            });
            $("#deleteTaller").on('click', function() {
                $("#cms").hide();
                $("#form-Adelete").hide();
                $("#form-Aedit").hide();
                $("#form-Aregister").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#form-Courseregister").hide();
                $("#form-Courseedit").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#table-talleres").hide();
                $("#form-Coursedelete").show();

                return false;
            });
            $("#mostrarTaller").on('click', function() {
                $("#cms").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#form-Adelete").hide();
                $("#form-Aedit").hide();
                $("#form-Aregister").hide();
                $("#form-Courseedit").hide();
                $("#form-Coursedelete").hide();
                $("#form-Courseregister").hide();
                $("#table-talleres").show();
                return false;
            });
            //INSTRUMENTACION DIDACTICA
            $("#mtro_instrumentacion").on('click', function() {
                $("#cms").hide();
                $("#options_T").hide();
                $("#student-options").hide();
                $("#teach-options").hide();
                $("#table-mtro").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#table-talleres").hide();
                $("#form-Adelete").hide();
                $("#form-Aedit").hide();
                $("#form-Aregister").hide();
                $("#form-Courseedit").hide();
                $("#form-Coursedelete").hide();
                $("#form-Courseregister").hide();
                $("#options_Hr").hide();
                $("#instrumentacionD").show();
                return false;
            });

            //HORARIOS
            $("#page-schedule").on('click', function() {
                $("#cms").hide();
                $("#options_T").hide();
                $("#student-options").hide();
                $("#teach-options").hide();
                $("#table-mtro").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#table-talleres").hide();
                $("#form-Adelete").hide();
                $("#form-Aedit").hide();
                $("#form-Aregister").hide();
                $("#form-Courseedit").hide();
                $("#form-Coursedelete").hide();
                $("#form-Courseregister").hide();
                $("#instrumentacionD").hide();
                $("#options_Hr").show();

                return false;
            });

            $("#registrarHorario").on('click', function() {
                $("#cms").hide();
                $("#options_T").hide();
                $("#student-options").hide();
                $("#teach-options").hide();
                $("#table-mtro").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#table-talleres").hide();
                $("#form-Adelete").hide();
                $("#form-Aedit").hide();
                $("#form-Aregister").hide();
                $("#form-Courseedit").hide();
                $("#form-Coursedelete").hide();
                $("#form-Courseregister").hide();
                $("#instrumentacionD").hide();
                $("#options_Hr").show();
                $("#form-eliminarHr").hide();
                $("#form-editarHr").hide();
                $("#form-registrarHr").show();
                return false;
            });

            $("#editarHorario").on('click', function() {
                $("#cms").hide();
                $("#options_T").hide();
                $("#student-options").hide();
                $("#teach-options").hide();
                $("#table-mtro").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#table-talleres").hide();
                $("#form-Adelete").hide();
                $("#form-Aedit").hide();
                $("#form-Aregister").hide();
                $("#form-Courseedit").hide();
                $("#form-Coursedelete").hide();
                $("#form-Courseregister").hide();
                $("#instrumentacionD").hide();
                $("#options_Hr").show();
                $("#form-registrarHr").hide();
                $("#form-eliminarHr").hide();
                $("#form-editarHr").show();
                return false;
            });
            $("#eliminarHorario").on('click', function() {
                $("#cms").hide();
                $("#options_T").hide();
                $("#student-options").hide();
                $("#teach-options").hide();
                $("#table-mtro").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#table-talleres").hide();
                $("#form-Adelete").hide();
                $("#form-Aedit").hide();
                $("#form-Aregister").hide();
                $("#form-Courseedit").hide();
                $("#form-Coursedelete").hide();
                $("#form-Courseregister").hide();
                $("#instrumentacionD").hide();
                $("#options_Hr").show();
                $("#form-registrarHr").hide();
                $("#form-editarHr").hide();
                $("#horario").hide();
                $("#form-eliminarHr").show();
                return false;
            });
            $("#mostrarHorario").on('click', function() {
                $("#cms").hide();
                $("#options_T").hide();
                $("#student-options").hide();
                $("#teach-options").hide();
                $("#table-mtro").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#table-talleres").hide();
                $("#form-Adelete").hide();
                $("#form-Aedit").hide();
                $("#form-Aregister").hide();
                $("#form-Courseedit").hide();
                $("#form-Coursedelete").hide();
                $("#form-Courseregister").hide();
                $("#instrumentacionD").hide();
                $("#options_Hr").show();
                $("#form-registrarHr").hide();
                $("#form-editarHr").hide();
                $("#form-eliminarHr").hide();
                $("#horario").show();
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