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
     <script src="Chartjs/Chart.min.js" type="text/javascript"></script>
     <script src="public/js/jquery-3.2.1.min.js" type="text/javascript"></script>
     <!--Chartjs-->
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
                                         <p style="color: white; text-align: left; margin-left:15px;">Listas/Evaluar:
                                         </p>
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

                 <section class="section section-xl bg-default text-md-center container">
                     <div class="row">
                         <div class="col-8">

                             <!--GRAFICA DE APROBACION DE ALUMNOS-->
                             <div class="row">
                                 <div class="col-12">
                                     <div class="tabla card">
                                         <h1 class="ml-3 mt-3 card-title">ESTATUS DE LOS ALUMNOS EN EL TALLER

                                         </h1>
                                         <div>
                                             <hr>
                                             <div class="row">
                                                 <div class="resultados col-12">
                                                     <canvas id="grafico" style="width:80%; margin-bottom:10%;"></canvas>
                                                 </div>
                                             </div>
                                             <div class="card-footer">
                                                 <small class="text-muted">Alumnos aprobados, reprobados y que cursan el
                                                     taller.</small>
                                             </div>
                                         </div>

                                         <script>
                                             var contexto = document.getElementById("grafico").getContext("2d");
                                             var grafico = new Chart(contexto, {

                                                 type: "doughnut", //line,bar,pie,bubble,doughnut,polarArea


                                                 data: {
                                                     labels: ['Cursando', 'Aprobados', 'Reprobados'],
                                                     datasets: [{
                                                         label: "Estatus alumnos",
                                                         //backgroundColor: 'rgba(70,228,146,0.6)', //color de la barra
                                                         //backgroundColor: 'transparent',
                                                         //borderColor: 'rgba(57,194,112,0.7)', //color del borde de la barra
                                                         //highlightFill: 'rgba(73,206,180,0.6)', //color hover de la barra
                                                         //highlightStroke: 'rgba(66,196,157,0.7)', //color hover del borde de la barra
                                                         hoverBackgroundColor: '#6185ae',
                                                         hoverBorderColor: 'black',

                                                         backgroundColor: [
                                                             'rgba(113, 128, 132, 0.9)',

                                                             'rgba(15, 73, 143, 0.91)',

                                                             'rgba(167, 57, 57, 0.87)'

                                                         ],
                                                         borderColor: [
                                                             'rgb(113, 128, 132)',


                                                             'rgb(15, 73, 143)',

                                                             'rgb(167, 57, 57)'
                                                         ],
                                                         borderWidth: 2,

                                                         data: [
                                                             <?php
                                                                echo ($cursandoA . "," . $aprobadosA . "," . $reprobadosA); ?>
                                                         ],

                                                     }]

                                                 },

                                                 options: {
                                                     responsive: true,
                                                     scales: {

                                                     }
                                                 }
                                             });
                                         </script>
                                     </div>
                                 </div>
                             </div>
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

                                 <img src="img/<?php echo $categoria; ?>/taller/<?php echo $imgTaller ?>" style="height: 200px; width:auto;" class="card-img-top mt-1 img-responsive" alt="Taller">
                                 <h5 class=" text-center" style="text-transform: uppercase;">
                                     <?php echo $nombreRepresentativo ?></h5>
                                 <div class="text-left ml-3 mr-3">
                                     <small class="card-text text-center"><?php echo $descripcion ?></small>
                                     <hr>
                                     <small class="card-text ml-0">Maestro asignado: <?php echo $mtroA; ?></small>
                                     <br>
                                     <small class="card-text ml-0">Dirección: <?php echo $direccion; ?></small>
                                 </div>

                             </div>
                         </div>
                     </div>

                     <!--LISTA-->

                     <div id="tallerSTD" class="mt-3">
                         <div class="row">
                             <div class="col-12 ">
                                 <div class="card">
                                     <div class="card-header" style="margin:auto">
                                         <h1 class="card-title">ALUMNOS REGISTRADOS</h1>
                                     </div>
                                     <div class="card-body">
                                         <table class="tablaEstudiantes mt-3 text-center table  table-hover table-responsive" style="background-color: white; margin:auto;">
                                             <?php echo $salida; ?>
                                         </table>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </section>

                 <!-----------------------------------------EVALUACION BIMESTRAL ASIGNADA A LOS ALUMNOS------------------------------------------------------>
                 <section class="section section-xl bg-default text-md-center container">

                     <div class="mt-3">
                         <div class="row">
                             <div class="col-md-9 col-sm-12">
                                 <div class="card">
                                     <div class="card-header" style="margin:auto">
                                         <h1 class="card-title">EVALUACIÓN BIMESTRAL DE LOS ALUMNOS</h1>
                                     </div>
                                     <div class="card-body">
                                         <table class="tablaEstudiantes mt-3 text-center table  table-hover table-responsive" style=" width: 70%; background-color: white; margin:auto;">
                                             <?php echo $tableDocument; ?>
                                         </table>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-6 col-md-3 wow blurIn" data-wow-delay=".2s" id="registrarHorario">
                                 <article class=""> <img src="img/logos/acreditar.png" width="150" height="auto" alt="Acreditar alumno">
                                     <div class="" data-toggle="modal" data-target="#acreditarModal">
                                         <div>
                                             <h4 class=""><a href="#">Acreditar alumno</a></h4>
                                         </div>
                                     </div>
                                 </article>
                             </div>

                             <!--Modal acreditar alumno-->
                             <div class="modal fade" id="acreditarModal" tabindex="-1" role="dialog" aria-labelledby="acreditarModalLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="acreditarModalLabel">Acreditar alumno</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                             </button>
                                         </div>
                                         <div class="modal-body text-center">
                                             <img src="img/logos/credito.png" width="200px" alt="Acreditar alumno">

                                             <form class="col-12" action="admin/acreditarstd.php" method="post" target="blank">
                                                 <br>
                                                 <div class="form-group sr-only">
                                                     <label for="mtro">Mtro asignado</label>
                                                     <input id="mtro" class="form-control" type="text" name="mtro" value="<?php echo $mtroA; ?>">
                                                 </div>
                                                 <?php
                                    $buscarAlumno = $db->connect()->prepare("SELECT matricula, nombre FROM alumnos WHERE taller_id=$Tallerstd and estatus='Cursando'");
                                    $buscarAlumno->execute();
                                    ?>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="matricula">Alumno:</label>
                                        </div>
                                        <select class="custom-select" name="matricula" id="matricula" required="true">
                                            <?php foreach ($buscarAlumno as $row) {
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
                                                     <label for="nivelDesempeño">Nivel de desempeño adquirido:</label>
                                                     <input id="nivelDesempeño" class="form-control" type="text" name="nivelDesempeño" placeholder="Excelente" required>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="valorN">Valor numérico adquirido:</label>
                                                     <input id="valorN" class="form-control" type="text" name="valorN" placeholder="4" required pattern="^\d+$" 
                                                     oninvalid="this.setCustomValidity('El valor numérico sólo acepta ingreses un número')" oninput="this.setCustomValidity('')">
                                                 </div>
                                                  <div class="form-group">
                                                     <label for="periodo">Periodo escolar:</label>
                                                     <input id="periodo" class="form-control" type="text" name="periodo" placeholder="Agosto-Diciembre 2020" required>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="valorCurricular">Valor curricular adquirido:</label>
                                                     <input id="valorCurricular" class="form-control" type="text" name="valorCurricular" required pattern="^\d+$" 
                                                     oninvalid="this.setCustomValidity('En el valor curricular sólo se acepta ingreses un número, correspondiente a los créditos adquiridos por el alumno.')" oninput="this.setCustomValidity('')">
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="jefeDepEscolares">Jefe(a) del departamento de servicios escolares:</label>
                                                     <input id="jefeDepEscolares" class="form-control" type="text" name="jefeDepEscolares" required>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="fechaexp">Fecha en que se extiende la constancia:</label>
                                                     <input id="fechaexp" class="form-control" type="date" name="fechaexp" required>
                                                 </div>
                                                 <p class=" mt-4 center "><input class="btn btn-secondary" name="enviar" type="submit" value="Enviar"></p>
                                             </form>
                                             <span>A continuacion te mostraremos una vista previa del documento generado</span>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>

                 </section>
             </main>
         </div>
     </main>
     <!--<script src="js/buscar_taller.js" type="text/javascript"></script>-->
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