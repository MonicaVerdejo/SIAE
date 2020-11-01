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
talleres.categoria, talleres.direccion, maestro.nombre, talleres.img1 FROM `talleres` join maestro 
on talleres.mtro_asignado=maestro.id and talleres.id=maestro.taller_asignado where talleres.id=$Tallerstd");
$taller->execute();
$row = $taller->fetch(PDO::FETCH_NUM);
    $nombreRepresentativo=$row[0];
    $descripcion=$row[1];
    $categoria=$row[2];
    $direccion=$row[3];
    $mtro_asignado=$row[4];
    $imgTaller=$row[5];



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////TABLA REGISTROS////////////////////////////////////////////////// 


$salida = "";



$sentencia = $db->connect()->prepare("SELECT talleres.taller, alumnos.nombre, alumnos.matricula, alumnos.estatus, alumnos.semestre, alumnos.evaluacion, alumnos.representativo FROM `talleres` join alumnos on talleres.id=alumnos.taller_id where talleres.id=$Tallerstd");

$sentencia->execute();



if ($sentencia->rowCount() > 0) {

  $salida .= "
      
      <thead>
      <tr>
      <th>Alumno</th>
      <th>Matricula</th>
      <th>Estatus</th>
      <th>Semestre</th>
      <th>Evaluacion</th>
      <th>Representativo</th>
      <th>Asignar</th>
     
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
          <td>" . $row['evaluacion'] . "</td>
          <td>" . $row['representativo'] . "</td>
          <td>Vacio</td>
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
      <th>Evaluacion</th>
      <th>Representativo</th>
      <th>Asignar</th>
  </tr>
      </tfoot>
      <tbody>";
} else {
  $salida .= "No existen coincidencias";
}


require_once 'Tallerstd.php';

?>