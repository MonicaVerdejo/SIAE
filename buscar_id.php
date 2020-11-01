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



    $porcentajeCero = 0;   
//alumnos que cursan
$cursandoA = $db->connect()->prepare("SELECT COUNT(nombre) FROM `alumnos` where `taller_id`=$Tallerstd and `estatus`='cursando'");
$cursandoA->execute();
//alumnos que reprobaron
$aprobadoA = $db->connect()->prepare("SELECT COUNT(nombre) FROM `alumnos` where `taller_id`=$Tallerstd and `estatus`='aprobado'");
$aprobadoA->execute();
//alumnos que aprobaron
$reprobadoA = $db->connect()->prepare("SELECT COUNT(nombre) FROM `alumnos` where `taller_id`=$Tallerstd and `estatus`='reprobado'");
$reprobadoA->execute();

foreach($cursandoA as $row){
  if(!empty($row[0])){
    $stdCursando=$row[0]  ;
  }else{
    $stdCursando = 0;
  }
}




  

    

////////////////////////////////////////////////////GRAFICA PORCENTAJE DE APROBACION////////////////////////////////////////////////// 

$sentencia = $db->connect()->prepare("SELECT ROUND((habitaciones_ocupadas/dias_vacaciones/num_habitaciones)*100,2) AS r FROM `registro` WHERE MONTH(fecha_inicio)=1 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$enero = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT ROUND((habitaciones_ocupadas/dias_vacaciones/num_habitaciones)*100,2) AS r FROM `registro`WHERE MONTH(fecha_inicio)=2 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$febrero = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT ROUND((habitaciones_ocupadas/dias_vacaciones/num_habitaciones)*100,2) AS r FROM `registro`WHERE MONTH(fecha_inicio)=3 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$marzo = $sentencia->fetch(PDO::FETCH_ASSOC);




$data = array(
  0 => round($enero['r'] ?? $porcentajeCero, 1),
  1 => round($febrero['r'] ?? $porcentajeCero, 1),
  2 => round($marzo['r'] ?? $porcentajeCero, 1)
);

$e3 = $data[0];
$f3 = $data[1];
$m3 = $data[2];




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