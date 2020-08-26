<?php
include_once 'db.php';
$db = new DB();

$salida = "";
$sentencia = $db->connect()->prepare("select fecha, maestro.nombre, mensaje from maestro join mensajemaestro join talleres
on mensajemaestro.taller_id= talleres.id and talleres.id = maestro.taller_asignado and talleres.mtro_asignado=mensajemaestro.mtro_id 
where mensajemaestro.mtro_id=:mtro_id");
$sentencia->execute(['mtro_id' => $mtro_id]);
$sentencia->execute();


if (!empty($_POST['consulta'])) {

    $q = $_POST['consulta'];

    $sentencia = $db->connect()->prepare("select fecha, maestro.nombre, mensaje from maestro join mensajemaestro join talleres
    on mensajemaestro.taller_id= talleres.id and talleres.id = maestro.taller_asignado and talleres.mtro_asignado=mensajemaestro.mtro_id 
    where mensajemaestro.mtro_id=:mtro_id and fecha LIKE '%" . $q . "%' OR mensaje LIKE '%" . $q . "%'
OR talleres.nombre LIKE '%" . $q . "%' ");
    $sentencia->execute();
}


if ($sentencia->rowCount() > 0) {

    $salida .= "
    
    <thead>
    <tr>
    <th>Fecha</th>
    <th>Mensaje</th>
</tr>
    </thead>
    <tbody>";

    while ($row = $sentencia->fetch(PDO::FETCH_ASSOC)) {
        $salida .= "
      
                <tr>
                    <td>
                        <img  src="."img/mensajes.png"." width="."50"." height="."50"." alt="."Mensajes".">
                        <br>
                        <?php echo $row[0]; ?>
                        <br>
                        <?php echo $row[1]; ?>
                    </td>
                    <td><?php echo $row[2]; ?></td>
                </tr>
                        
        ";
    }
    
  
} else {
    $salida .= "No existen coincidencias";
}


echo $salida;
