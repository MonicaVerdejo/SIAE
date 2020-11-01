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


    if (!empty($_POST['Tallerstd'])) {
        require 'buscar_id.php';
    } else {
        require 'buscar_id.php';
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
                                 <a href="administrativo.php">
                                     <i class="fa fa-desktop" aria-hidden="true"></i>
                                     <span>Administrar inicio</span>
                                 </a>
                             </li>
                             <li id="page-Course">
                                 <a href="administrativo.php">
                                     <i class="fas fa-table"></i>
                                     <span>Talleres</span>
                                 </a>
                             </li>
                             <li id="page-schedule">
                                 <a href="administrativo.php">
                                     <i class="fas fa-calendar-alt    "></i>
                                     <span>Horarios</span>
                                 </a>
                             </li>
                             <li id="page-mtro">
                                 <a href="administrativo.php">
                                     <i class="fas fa-table"></i>
                                     <span>Maestros</span>
                                 </a>
                             </li>

                             <li class="sidebar-dropdown">
                                 <a href="administrativo.php">
                                     <i class="fa fa-folder-open" aria-hidden="true"></i>
                                     <span>Alumnos</span>
                                 </a>
                                 <div class="sidebar-submenu">
                                     <ul style="text-align: center;">

                                         <li id="page-std" style="text-align: left;" class="btn btn-outline-info btn-sm mt-1 mb-1" id="mensajesEnviados">
                                             <i class="fa fa-archive" aria-hidden="true"></i>Administrar
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
                                 <a href="administrativo.php">
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
                                 <a href="administrativo.php">
                                     <i class="fa fa-hourglass" aria-hidden="true"></i>
                                     <span>Evaluación bimestral</span>
                                 </a>
                             </li>
                             <li id="mtro_instrumentacion">
                                 <a href="administrativo.php">
                                     <i class="fa fa-hourglass" aria-hidden="true"></i>
                                     <span>Instrumentación didáctica</span>
                                 </a>
                             </li>
                             <li class="header-menu">
                                 <span>Sistema</span>
                             </li>

                             <li class="sidebar-dropdown" id="opciones">
                                 <a href="administrativo.php">
                                     <i class="fa fa-cogs" aria-hidden="true"></i>
                                     <span>Opciones</span>
                                 </a>
                                 <div class="sidebar-submenu">
                                     <a href="administrativo.php" <?php
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
                                     <a href="administrativo.php" data-toggle="modal" data-target="#changePModal">
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



                 <!-------------------------------------------------------------TABLAS ALUMNOS-------------------------------------------->

                 <section class="section section-xl bg-default text-md-center container" id="opcion_stdTaller">
                     <div class="row">
                         <div class="col-8">

                             
                         </div>
                         <div class="col-4">
                             <div class="card">
                                 <div class="card-header" style="margin:auto">
                                     <div class="card-title" style="text-transform: uppercase;">
                                         <?php echo $nameTaller; ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="card articulo" style="width: 18rem;  display: inline-block; vertical-align: top;
                                text-align: center;margin-left: 5%; margin-bottom:3%;">

                                 <img src="img/<?php echo $categoria; ?>/taller/<?php echo $imgTaller ?>" style="height: 200px; width:auto;" class="card-img-top mt-1" alt="Taller">
                                 <h5 class=" text-center" style="text-transform: uppercase;"><?php echo $nombreRepresentativo ?></h5>
                                 <small class="card-text text-center"><?php echo $descripcion ?></small>

                             </div>
                         </div>
                     </div>

                     <!--LISTA-->

                     <div id="tallerSTD" class="mt-3">
                         <div class="row">

                             <div class="col-9 ">
                                 <div class="card">
                                     <div class="card-header" style="margin:auto">
                                         <h1 class="card-title">ALUMNOS REGISTRADOS</h1>
                                     </div>
                                     <div class="card-body">
                                         <table class="mt-3 text-center table  table-hover table-responsive" style=" width: 70%; background-color: white; margin-left:5px;">
                                             <?php echo $salida; ?>
                                         </table>
                                     </div>
                                 </div>
                             </div>
                         </div>


                     </div>

                 </section>





             </main>
         </div>
     </main>
     <script src="js/buscar_taller.js" type="text/javascript"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="js/popper.min.js" type="text/javascript"></script>
     <script src="js/bootstrap.min.js" type="text/javascript"></script>
     <script src="js/js.js" type="text/javascript"></script>
     <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-30d18ea41045577cdb11c797602d08e0b9c2fa407c8b81058b1c422053ad8041.js" type="text/javascript"></script>
     <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

     <script>
         $(document).ready(function() {
             $('[data-toggle="popover"]').popover();
         });
     </script>

 </body>

 </html>