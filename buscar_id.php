<?php 
include_once('db.php');

$db = new DB();


if (!empty($_POST['idTaller']) && !empty($_POST['Tallerstd'])) {
  include_once 'Tallerstd.php';
} else {
  echo 'error';
}

  include_once 'Tallerstd.php';
 
 $Tallerstd = $_POST['idTaller'];
 $nameTaller=$_POST['Tallerstd'];
  
//busqueda de datos sobre el taller
$taller = $db->connect()->prepare("SELECT talleres.nombre, talleres.descripcion, 
talleres.categoria, talleres.direccion, talleres.img1 FROM `talleres` where talleres.id=$Tallerstd");
$taller->execute();
$row = $taller->fetch(PDO::FETCH_NUM);
    $nombreRepresentativo=$row[0];
    $descripcion=$row[1];
    $categoria=$row[2];
    $direccion=$row[3];
    $imgTaller=$row[4];
    $porcentajeCero = 0;   

//busqueda mtro que imparte el taller
$maestroAsignado = $db->connect()->prepare("SELECT nombre FROM `maestro` where taller_asignado=$Tallerstd");
$maestroAsignado->execute();
$fila = $maestroAsignado->fetch(PDO::FETCH_NUM);    
$mtroA=$fila[0];



    

////////////////////////////////////////////////////GRAFICA PORCENTAJE DE APROBACION////////////////////////////////////////////////// 

$sentencia = $db->connect()->prepare("SELECT COUNT(nombre) as r FROM `alumnos` where `taller_id`=$Tallerstd and `estatus`='cursando'");
$sentencia->execute();
$alumnosCursando = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT COUNT(nombre) as r FROM `alumnos` where `taller_id`=$Tallerstd and `estatus`='aprobado'");
$sentencia->execute();
$alumnosAprobados = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT COUNT(nombre) as r FROM `alumnos` where `taller_id`=$Tallerstd and `estatus`='reprobado'");
$sentencia->execute();
$alumnosReprobados = $sentencia->fetch(PDO::FETCH_ASSOC);




$data = array(
  0 => round($alumnosCursando['r'] ?? $porcentajeCero, 1),
  1 => round($alumnosAprobados['r'] ?? $porcentajeCero, 1),
  2 => round($alumnosReprobados['r'] ?? $porcentajeCero, 1)
);

$cursandoA = $data[0];
$aprobadosA = $data[1];
$reprobadosA= $data[2];




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////TABLA REGISTROS////////////////////////////////////////////////// 


$salida = "";



$sentencia = $db->connect()->prepare("SELECT alumnos.nombre, alumnos.matricula, alumnos.estatus, alumnos.semestre, alumnos.representativo FROM `talleres` join alumnos on talleres.id=alumnos.taller_id where talleres.id=$Tallerstd and alumnos.estatus='cursando'");

$sentencia->execute();



if ($sentencia->rowCount() > 0) {

  $salida .= "
      
      <thead>
      <tr>
      <th>Alumno</th>
      <th>Matricula</th>
      <th>Estatus</th>
      <th>Semestre</th>
      <th>Representativo</th>
     
  </tr>
      </thead>
      <tbody>";


  while ($row = $sentencia->fetch(PDO::FETCH_ASSOC)) {
    $salida .= "
          <tr>
     
          <td>" . $row['nombre'] . "</td>
          <td>" . $row['matricula'] . "</td>
          <td>" . $row['estatus'] . "</td>
          <td>" . $row['semestre'] . "</td>
          <td>" . $row['representativo'] . "</td>
          
      </tr>
          ";
  }
  $salida .= "</tbody> 
      <tfoot>
      <tr>
      <th>Alumno</th>
      <th>Matricula</th>
      <th>Estatus</th>
      <th>Semestre</th>  
      <th>Representativo</th>
   
  </tr>
      </tfoot>
      <tbody>";
} else {
  $salida .= "No existen coincidencias";
}




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////TABLA ALUMNOS CON EVALUACION ASIGNADA////////////////////////////////////////////////// 


$tableDocument = "";



$sentencia2 = $db->connect()->prepare("SELECT alumnos.nombre, alumnos.matricula,  documentos.documento, documentos.fecha FROM `talleres` join alumnos join documentos on talleres.id=alumnos.taller_id
                                      and documentos.alumno_id=alumnos.matricula where talleres.id=$Tallerstd");

$sentencia2->execute();



if ($sentencia2->rowCount() > 0) {

  $tableDocument  .= "
      
      <thead>
      <tr>
      <th>Alumno</th>
      <th>Matricula</th>
      <th>Evaluación bimestral</th>
      <th>Fecha de entrega</th>
     
  </tr>
      </thead>
      <tbody>";


  while ($row = $sentencia2->fetch(PDO::FETCH_ASSOC)) {
    $tableDocument  .= "
          <tr>
     
          <td>" . $row['nombre'] . "</td>
          <td>" . $row['matricula'] . "</td>
          <td>"." <a download=" . $row['matricula'] . " href="."maestro/documentos/evaluacion/". $row['documento'].">
          <img src="."img/descargar.png"." width="."60"." height="."60"." alt="."Descargar Evaluacion Bimestral"."></a> "."</td>
          <td>" . $row['fecha'] . "</td>
          
      </tr>
          ";
  }
  $tableDocument  .= "</tbody> 
      <tfoot>
      <tr>
      <th>Alumno</th>
      <th>Matricula</th>
      <th>Evaluación bimestral</th>
      <th>Fecha de entrega</th>
  </tr>
      </tfoot>
      <tbody>";
} else {
  $tableDocument  .= "No existen coincidencias";
}





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////TABLA ALUMNOS ACREDITADOS////////////////////////////////////////////////// 


$tablestdAcreditados = "";



$sentencia3 = $db->connect()->prepare("SELECT nombre, matricula, carrera, evaluacion from alumnos where taller_id=$Tallerstd");

$sentencia3->execute();




if ($sentencia3->rowCount() > 0) {
  

  $tablestdAcreditados  .= "
      
      <thead>
      <tr>
      <th>Alumno</th>
      <th>Matricula</th>
      <th>Carrera</th>
      <th>Constancia Asignada</th>
     
  </tr>
      </thead>
      <tbody>";


  while ($row = $sentencia3->fetch(PDO::FETCH_ASSOC)) {
    if ($row['evaluacion']=="") {
      $tablestdAcreditados  .= "<tr class="."sr-only".">";
    } else {
      $tablestdAcreditados  .= "
          <tr>
     
          <td>" . $row['nombre'] . "</td>
          <td>" . $row['matricula'] . "</td>
          <td>" . $row['evaluacion'] . "</td>
          <td>"." <a download=" . $row['matricula'] . " href="."pdf/". $row['evaluacion'].">
          <img src="."img/descargar.png"." width="."60"." height="."60"." alt="."Descargar Constancia de crédito"."></a> "."</td>
          
          
      </tr>
          ";
    }
    



    
  }
  $tablestdAcreditados  .= "</tbody> 
      <tfoot>
      <tr>
      <th>Alumno</th>
      <th>Matricula</th>
      <th>Carrera</th>
      <th>Constancia Asignada</th>
  </tr>
      </tfoot>
      <tbody>";
} else {
  $tablestdAcreditados  .= "No existen coincidencias";
}



require_once 'Tallerstd.php';

?>