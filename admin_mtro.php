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
<html lang="es">

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
                            <li>
                                <a href="administrativo.php">
                                    <i class="fa fa-desktop" aria-hidden="true"></i>
                                    <span>Inicio</span>
                                </a>
                            </li>
                            <li>
                                <a href="admin_cms.php">
                                    <i class="fa fa-desktop" aria-hidden="true"></i>
                                    <span>Administrar página</span>
                                </a>
                            </li>
                            <li>
                                <a href="admin_taller.php">
                                    <i class="fas fa-table"></i>
                                    <span>Talleres</span>
                                </a>
                            </li>
                            <li>
                                <a href="admin_horarios.php">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>Horarios</span>
                                </a>
                            </li>
                            <li>
                                <a href="admin_mtro.php">
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
                                    <ul style="text-align: center; list-style:none;">
                                        <li style="text-align: left;  " class="btn btn-outline-info btn-sm mt-1 mb-1">
                                            <i class="fa fa-archive" aria-hidden="true"></i><a href="admin_std.php">Administrar</a>
                                        </li>
                                        <br>
                                        <p style="color: white; text-align: left; margin-left:15px;">Listas/Evaluar:</p>
                                        <li>
                                            <?php
                                            $sentencia = $db->connect()->prepare("SELECT id, taller FROM talleres");
                                            $sentencia->execute();

                                            foreach ($sentencia as $row) {

                                            ?>
                                                <form class="text-center" action="buscar_id.php" method="POST">
                                                    <input type="text" class="sr-only" value="<?php echo $row[0]; ?>" name="idTaller">
                                                    <input <?php if ($row[1] == "No asignado") { ?> style="display: none;" <?php } else { ?> type="submit" id="Tallerstd" name="Tallerstd" class="btn btn-outline-info btn-sm mt-1 mb-1" value="<?php echo $row[1];
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
                            <li>
                                <a href="admin_instrumentacion.php  ">
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
                                    <a href="#" <?php
                                                $adminDios = $_SESSION['id_admin'];
                                                if ($adminDios == 1) {
                                                ?>id="page_editAdmin" <?php
                                                                    } else {
                                                                        ?>data-toggle="modal" data-target="#permisosModal" <?php
                                                                                                                        }

                                                                                                                            ?>>
                                        <i class="fas fa-edit "></i>
                                        <span>Administrativos</span>
                                    </a>
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
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="img/logos/tecnm.svg" alt="">
                        </div>
                        <div class="col-sm-9 mt-2 text-center">
                            <h1>Sistema Integral para Actividades Extraescolares</h1>
                        </div>
                        
                    </div>
                    <hr>
                </div>

                <!-------------------------------------------------------------SECCIÓN DE MAESTROS--------------------------------------------->
                <section class="section  section-xl bg-default text-md-center">
                    <div class="container" id="teach-options">
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
                                        <input id="nombre" class="form-control" type="text" name="nombre" required="true" placeholder="Fernando Enrique Vela Leon">
                                    </div>
                                    <div class="form-group">
                                        <label for="correo">Correo</label>
                                        <input id="correo" class="form-control" type="email" name="correo"  required placeholder="vela97@outlook.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="curp">Curp</label>
                                        <input id="curp" class="form-control" type="text" name="curp" required="true" placeholder="VELF971204HCCLRN07" required pattern="[A-Z][A,E,I,O,U,X][A-Z]{2}[0-9]{2}[0-1][0-9][0-3][0-9][M,H][A-Z]{2}[B,C,D,F,G,H,J,K,L,M,N,Ñ,P,Q,R,S,T,V,W,X,Y,Z]{3}[0-9,A-Z][0-9][0-9]" oninvalid="this.setCustomValidity('Formato de la Clave Única de Registro de Población')" oninput="this.setCustomValidity('')">
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
                                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="9821159667" pattern="[0-9]{10}" oninvalid="this.setCustomValidity('El formato del número de celular es: 9821159667. Hazlo coincidir.')" oninput="this.setCustomValidity('')">
                                    </div>
                                    <div class="form-group">
                                        <label for="telegram">Telegram</label>
                                        <input id="telegram" class="form-control" type="text" name="telegram" placeholder="@desacad_ITESCHAM">
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
                                        <select class="custom-select" name="mtro" id="mtro">
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

                                                                                                                        ?>><?php echo $row[1];?></option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <?php
                                    $taller = $db->connect()->prepare("SELECT id, taller FROM `talleres` WHERE 1");
                                    $taller->execute();
                                    ?>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="taller">Taller</label>
                                        </div>
                                        <select class="custom-select" name="taller" id="taller" >
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
                                        <label for="telefono">Teléfono</label>
                                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="9821159667" pattern="[0-9]{10}" oninvalid="this.setCustomValidity('El formato del número de celular es: 9821159667. Hazlo coincidir.')" oninput="this.setCustomValidity('')">
                                    </div>
                                    <div class="form-group">
                                        <label for="telegram">Telegram</label>
                                        <input id="telegram" class="form-control" type="text" name="telegram" placeholder="@desacad_ITESCHAM">
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
                    <div class="container mt-5" >
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
                                                        <th>Telegram</th>
                                                    </thead>
                                                    <tbody style="background-color:  #f7f5f3;">
                                                        <?php
                                                        $busqueda = $db->connect()->prepare('SELECT maestro.nombre, correo, talleres.taller, curp, telefono, maestro.telegram FROM `maestro` join talleres on maestro.taller_asignado=talleres.id order by maestro.nombre asc');
                                                        $busqueda->execute();

                                                        foreach ($busqueda as $fila) {
                                                            $sinasignar = "No asignado";
                                                            $NoAsignado = $fila[2];
                                                            if (strcmp($sinasignar, $NoAsignado) === 0) {
                                                        ?>
                                                                <tr class="sr-only">
                                                                    <td><?php echo $fila[0]; ?></td>
                                                                    <td><?php echo $fila[1]; ?></td>
                                                                    <td><?php echo $fila[2]; ?></td>
                                                                    <td><?php echo $fila[3]; ?></td>
                                                                    <td><?php echo $fila[4]; ?></td>
                                                                    <td><?php echo $fila[5]; ?></td>

                                                                </tr>

                                                            <?php
                                                            } else {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $fila[0]; ?></td>
                                                                    <td><?php echo $fila[1]; ?></td>
                                                                    <td><?php echo $fila[2]; ?></td>
                                                                    <td><?php echo $fila[3]; ?></td>
                                                                    <td><?php echo $fila[4]; ?></td>
                                                                    <td><?php echo $fila[5]; ?></td>

                                                                </tr>
                                                        <?php
                                                            }
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
                                Envía un nuevo mensaje a tus maestros </h3>
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
                              <input type="text" class="form-control" name="admin_id" id="admin_id" value="<?php echo 0;?>">
                            </div>
                            <div class="form-group">
                                 <?php
                                    $maestros = $db->connect()->prepare("SELECT nombre, correo FROM `maestro`");
                                    $maestros->execute();
                                ?>
                                <label for="destinatario">Destinatario</label>
                                <select class="custom-select" name="destinatario" id="destinatario" required="true">
                                    <option value="Todos">Todos</option>
                                            <?php foreach ($maestros as $row) {
                                            ?>
                                                <option <?php
                                                        if ($row[0] == "Sin Asignar") {
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


                <!-------------------------------------------------------------PERMISOS MODAL------------------------------------------------->
                <div class="modal fade" id="permisosModal" tabindex="-1" role="dialog" aria-labelledby="permisosModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="permisosModalLabel">QUERIDO ADMINISTRADOR</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="img/logos/losentimos.gif" height="150px" alt="Portada Inicio">
                                <h5>Lamentamos informarle que no cuenta con los permisos necesarios para acceder a estas funciones.</h5>
                                <span>Por favor sigue trabajando arduamente con nuestro sistema.</span>
                            </div>
                        </div>
                    </div>
                </div>


                <!-------------------------------------------------------------SECCIÓN DE ADMINISTRATIVOS------------------------------------------------->
                <section class="section bg-default text-md-center">
                    <div id="options_Admin" style="display: none;">
                        <div>
                            <h3>ADMINISTRATIVOS</h3>
                            <img src="img/img_portada/administrativos.jpg" width="350" alt="cms_Talleres">
                        </div>
                        <!--Options-Talleres-->
                        <div class="row row-lg row-30 mt-3 mb-3" style="margin:auto;">
                            <div class="col-sm-4 col-md-4 wow blurIn" data-wow-delay=".2s" id="registrarAdmin">
                                <article class=""><img src="img/logos/administrativo.png" alt="" width="100" height="100" />
                                    <div class="">
                                        <div>
                                            <h4 class=""><a href="#">Agregar Administrador</a></h4>

                                        </div>
                                    </div>
                                </article>
                            </div>

                            <div class="col-sm-4 col-md-4 wow blurIn" data-wow-delay=".1s" id="eliminarAdmin">
                                <article class=""><img src="img/logos/recycle-bin.png" alt="" width="100" height="100" />
                                    <div class="">
                                        <div>
                                            <h4 class=""><a href="#">Eliminar Administrador</a></h4>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-4 col-md-4 wow blurIn" data-wow-delay=".1s" id="mostrarAdmin">
                                <article class=""><img src="img/logos/verAdmin.jpg" alt="" width="100" height="100" />
                                    <div class="">
                                        <div>
                                            <h4 class=""><a href="#">Mostrar Administradores</a></h4>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>


                        <!--Form-registrar-Admin-->
                        <section class="mt-4 section-form bg-default" style="display:none" id="form-registrarAdmin">
                            <div id="base">
                                <div id="triangle"></div>
                                <div id="titulo">Nuevo Administrador</div>
                                <div id="form">
                                    <form method="POST" action="admin/registrar_admin.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" name="nombre" id="" class="form-control" placeholder="Fernando Vela Leon" aria-describedby="helpId" required="True">
                                        </div>
                                        <div class="form-group">
                                            <label for="Correo">Correo:</label>
                                            <input type="email" name="correo" id="" class="form-control" placeholder="vela97@outlook.com" aria-describedby="helpId" required="True">
                                        </div>
                                        <div class="form-group">
                                            <label for="curp">CURP</label>
                                            <input type="text" name="curp" id="" class="form-control" placeholder="VELF971204HCCLRN73" aria-describedby="helpId" required="True" required pattern="[A-Z][A,E,I,O,U,X][A-Z]{2}[0-9]{2}[0-1][0-9][0-3][0-9][M,H][A-Z]{2}[B,C,D,F,G,H,J,K,L,M,N,Ñ,P,Q,R,S,T,V,W,X,Y,Z]{3}[0-9,A-Z][0-9]" oninvalid="this.setCustomValidity('Formato de la Clave Única de Registro de Población')" oninput="this.setCustomValidity('')">
                                        </div>
                                        <div class="form-group">
                                            <label for="sexo">Sexo</label>
                                            <select id="sexo" class="form-control" name="sexo">
                                                <option>F</option>
                                                <option>M</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-secondary">Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </section>



                        <!--Form-eliminar-Admin-->
                        <section class="mt-4 section-form bg-default" style="display:none" id="form-eliminarAdmin">
                            <div id="base">
                                <div id="triangle"></div>
                                <div id="titulo">Eliminar Administrador</div>
                                <div id="form">
                                    <form method="POST" action="admin/delete_admin.php" enctype="multipart/form-data">
                                        <?php
                                        $searchAdmin = $db->connect()->prepare("SELECT id, nombre FROM `administrador` WHERE 1");
                                        $searchAdmin->execute();
                                        ?>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="nombre">Administrador</label>
                                            </div>
                                            <select class="custom-select" name="nombre" id="nombre" required="true">
                                                <?php foreach ($searchAdmin as $row) {
                                                ?>
                                                    <option <?php
                                                            if ($row[0] == 1) {
                                                                # code...
                                                            ?> style="display: none;" <?php
                                                                                    } else {
                                                                                        # code...
                                                                                        ?> value="<?php echo $row[0]; ?>" <?php
                                                                                                                        }

                                                                                                                            ?>><?php
                                                                                                                                if ($row[0] == 1) {
                                                                                                                                ?> Selecciona<?php
                                                                                                                                            } else {
                                                                                                                                                echo $row[1];
                                                                                                                                            }

                                                                                                                                                ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-secondary" title="Advertencia" data-trigger="hover" data-content="Recuerda que en cuanto des click no podrás cancelar el proceso" data-toggle="popover">Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </section>



                        <!--Administrativos-->

                        <div id="lista-mostrarAdmin" style="display: none;">
                            <div class="row">
                                <div class="col-6">
                                    <img src="img/logos/listAdmin.png" width="160" height="auto" alt="Horario asignado">
                                </div>
                                <div class="col-6 ">
                                    <div class="card">
                                        <div class="card-header" style="margin:auto">
                                            <h1 class="card-title">Administradores dados de alta</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $busqueda = $db->connect()->prepare("SELECT nombre,correo,curp FROM `administrador` where 1");
                            $busqueda->execute();


                            ?>
                            <div class="container">
                                <section id="tabla_resultado" class="content">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <div class="card">

                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <table class="mt-3 text-center table  table-hover table-responsive" style=" width: 70%; background-color: white;">
                                                            <thead style="background-color: lightslategray;">
                                                                <th>Nombre</th>
                                                                <th>Correo</th>
                                                                <th>CURP</th>

                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($busqueda as $fila) { ?>
                                                                    <tr>
                                                                        <td><?php echo $fila[0]; ?></td>
                                                                        <td><?php echo $fila[1]; ?></td>
                                                                        <td><?php echo $fila[2]; ?></td>

                                                                    </tr>
                                                                <?php }

                                                                ?>
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

                        </div>

                        <footer class="container-fluid mt-4">
                            <div class="col-12 card " style="background-color: slategray;">
                                <div class="card-header">
                                    <span class="">
                                        El administrativo es quien puede acceder a toda la información que se recaba con el sistema, no le des permisos a cualquiera.
                                    </span>
                                </div>
                            </div>
                        </footer>

                    </div>

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
    <script type="text/javascript">
        $(document).ready(function() {
            $("#cambiarp").on('click', function() {
                $("#perfil").show();
                return false;
            });
            //seccion de maestro
            $("#registrarM").on('click', function() {
                $("#form-Tregister").show();
                $("#form-Tedit").hide();
                $("#form-Tdelete").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                return false;
            });
            $("#editM").on('click', function() {
                $("#form-Tedit").show();
                $("#form-Tregister").hide();
                $("#form-Tdelete").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                return false;
            });
            $("#deleteM").on('click', function() {
                $("#form-Tdelete").show();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                return false;
            });
            //seccion de mensajes
            $("#mensajesEnviados").on('click', function() {
                $("#mensajesE").show();
                $("#mensajesN").hide();
                $("#teach-options").hide();
                $("#table-mtro").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#options_Admin").hide();
                return false;
            });
            $("#mensajesNuevos").on('click', function() {
                $("#mensajesN").show();
                $("#mensajesE").hide();
                $("#teach-options").hide();
                $("#table-mtro").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#options_Admin").hide();
                return false;
            });
            //ADMINISTRATIVE OPTIONS
            $("#page_editAdmin").on('click', function() {
                $("#teach-options").hide();
                $("#table-mtro").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#table-talleres").hide();
                $("#options_Admin").show();
                return false;
            });
            $("#registrarAdmin").on('click', function() {
                $("#teach-options").hide();
                $("#table-mtro").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#table-talleres").hide();
                $("#form-registrarAdmin").show();
                $("#form-eliminarAdmin").hide();
                $("#lista-mostrarAdmin").hide();
                $("#options_Admin").show();
                return false;
            });
            $("#eliminarAdmin").on('click', function() {
                $("#teach-options").hide();
                $("#table-mtro").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#form-registrarAdmin").hide();
                $("#lista-mostrarAdmin").hide();
                $("#form-eliminarAdmin").show();
                $("#options_Admin").show();
                return false;
            });
            $("#mostrarAdmin").on('click', function() {
                $("#teach-options").hide();
                $("#table-mtro").hide();
                $("#mensajesN").hide();
                $("#mensajesE").hide();
                $("#form-Tdelete").hide();
                $("#form-Tedit").hide();
                $("#form-Tregister").hide();
                $("#form-registrarAdmin").hide();
                $("#form-eliminarAdmin").hide();
                $("#lista-mostrarAdmin").show();
                $("#options_Admin").show();
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