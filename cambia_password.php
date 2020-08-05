<?php
require 'db.php';
$db = new DB();
if (array_key_exists("token", $_GET)) {
	$consulta = $db->connect()->prepare('SELECT id, correo FROM usuario WHERE Token = :token');
	$consulta->bindParam(':token', $_GET['token']);
	$consulta->execute();

	if ($resultado = $consulta->fetch(PDO::FETCH_ASSOC)) {
		$consulta = "UPDATE usuario SET Token = NULL WHERE id = '{$resultado['id']}'";
		$db->connect()->exec($consulta);
	}
} else if (array_key_exists("uid", $_POST)) {

	$newpassword = password_hash($_POST['newPass'], PASSWORD_BCRYPT);
	$consulta = $db->connect()->prepare("UPDATE usuario SET password = '$newpassword' WHERE id ='{$_POST['uid']}'");
	$consulta->execute();
	echo 'Contraseña cambiada';
	header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Recuperación</title>

	<link rel="stylesheet" href="public/css/styles3.css">
	<link rel="stylesheet" href="public/css/respon.css">
	<!-- Site Icons -->
	<link rel="shortcut icon" href="public/img/cropped-logom3-1.png" type="image/x-icon">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>

<body>




	<section class="content-seccion">

		<div class="content-img3">
		</div>

		<div class="content-form">
			<div class="content-logo">
				<img src="public/img/cropped-logom3-1.png" alt="H Ayuntamiento de Champotón">
			</div>

			<form method="post" action="cambia_password.php" name="signup">
				<h5>Ingrese su nueva contraseña</h5>
				<input type="hidden" class="email-rec" value="<?php echo $resultado['id']; ?>" name="uid">
				<div class="user">
					<input type="password" name="newPass" placeholder="Contraseña" required pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,20}$" 
						oninvalid="this.setCustomValidity('La contraseña debe tener entre 8 y 20 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.')" 
						oninput="this.setCustomValidity('')"/>
				</div>

				<div class="boton">
					<button id="btn" class="btn bot" type="submit">Enviar</button>
					<div class="btn2"></div>
				</div>

				<div class="regresar">
					<a href="index.php">Regresar</a>
				</div>

			</form>
		</div>

	</section>
</body>

</html>