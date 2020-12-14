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
                             <div class="col-sm-6 col-md-3 wow blurIn text-center" data-wow-delay=".2s">
                                 <div class="row ml-3">
                                     <article class=""> <img src="img/logos/acreditar.png" width="150" height="auto" alt="Acreditar alumno">
                                         <div class="" data-toggle="modal" data-target="#acreditarModal">
                                             <div>
                                                 <h4 class=""><a href="#">Acreditar alumno</a></h4>
                                             </div>
                                         </div>
                                     </article>
                                 </div>
                                 <div class="row mt-3">
                                     <article class=""> <img src="img/logos/aprobar.png" width="150" height="auto" alt="Aprobar/Reprobar alumno">
                                         <div class="" data-toggle="modal" data-target="#aprobarModal">
                                             <div>
                                                 <h4 class=""><a href="#">Aprobar/Reprobar Alumno</a></h4>
                                             </div>
                                         </div>
                                     </article>
                                 </div>
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
                                                     <label for="mtroA">Mtro asignado</label>
                                                     <input id="mtroA" class="form-control" type="text" name="mtroA" value="<?php echo $mtroA; ?>">
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
                                                             #TODO:if(($buscarAlumno->rowCount()) > 0) //No hay alumnos registrados en este taller
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
                                                     <input id="nivelDesempeño" class="form-control" type="text" name="nivelD" placeholder="Excelente" required>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="valorN">Valor numérico adquirido:</label>
                                                     <input id="valorN" class="form-control" type="text" name="valorN" placeholder="4" required pattern="^\d+$" oninvalid="this.setCustomValidity('El valor numérico sólo acepta ingreses un número')" oninput="this.setCustomValidity('')">
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="periodo">Periodo escolar:</label>
                                                     <input id="periodo" class="form-control" type="text" name="periodo" placeholder="Agosto-Diciembre 2020" required>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="valorCurricular">Valor curricular adquirido:</label>
                                                     <input id="valorCurricular" class="form-control" type="text" name="valorCurricular" required pattern="^\d+$" oninvalid="this.setCustomValidity('En el valor curricular sólo se acepta ingreses un número, correspondiente a los créditos adquiridos por el alumno.')" oninput="this.setCustomValidity('')">
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

                             <!--Modal aprobar alumno-->
                             <div class="modal fade" id="aprobarModal" tabindex="-1" role="dialog" aria-labelledby="aprobarModalLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="aprobarModalLabel">Aprobar ó Reprobar alumno</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                             </button>
                                         </div>
                                         <div class="modal-body text-center">
                                             <img src="img/logos/credito.png" width="200px" alt="Acreditar alumno">

                                             <form class="col-12" action="admin/aprobarStd.php" method="post">
                                                 <br>

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
                                                     <label for="estatus">Estatus</label>
                                                     <select id="estatus" class="form-control" name="estatus">
                                                         <option>Aprobado</option>
                                                         <option>Reprobado</option>
                                                     </select>
                                                 </div>

                                                 <p class=" mt-4 center "><input class="btn btn-secondary" name="enviar" type="submit" value="Enviar"></p>
                                             </form>
                                             <span>Se cambiará el estado de cursando, según lo asignado, al estudiante que corresponda.</span>
                                         </div>
                                     </div>
                                 </div>
                             </div>

                         </div>
                     </div>
                 </section>

                 <section class="section section-xl bg-default text-md-center container">
                     <div class="col-md-12 col-sm-12">
                         <div class="card">
                             <div class="card-header" style="margin:auto">
                                 <h1 class="card-title">CONSTANCIAS DE ACREDITACIÓN ASIGNADAS</h1>
                             </div>
                             <div class="card-body">
                                 <table class="tablaEstudiantes mt-3 text-center table  table-hover table-responsive" style=" width: 70%; background-color: white; margin:auto;">
                                     <?php echo $tablestdAcreditados; ?>
                                 </table>
                             </div>
                         </div>
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