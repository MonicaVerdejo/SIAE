<?php
require '../db.php';
$db = new DB();
if (array_key_exists("token", $_GET)) {
	$consulta = $db->connect()->prepare('SELECT id, correo FROM maestro WHERE Token = :token');
	$consulta->bindParam(':token', $_GET['token']);
	$consulta->execute();

	if ($resultado = $consulta->fetch(PDO::FETCH_ASSOC)) {
		$consulta = "UPDATE maestro SET Token = NULL WHERE id = '{$resultado['id']}'";
		$db->connect()->exec($consulta);
	}
} else if (array_key_exists("uid", $_POST)) {

	$newpassword = password_hash($_POST['newPass'], PASSWORD_BCRYPT);
	$consulta = $db->connect()->prepare("UPDATE maestro SET password = '$newpassword' WHERE id ='{$_POST['uid']}'");
	$consulta->execute();
	echo 'Contraseña cambiada';
	header("Location: ../perfiles.html");
}

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,  initial-scale=1.0">
	<title>Recuperación</title>
	<link rel="stylesheet" href="../css/styles3.css">
	<link rel="stylesheet" href="../css/responsive.css">
	<!-- Site Icons -->
	<link rel="icon" href="../img/logos/tecnm_champoton.svg" type="image/x-icon">
</head>

<body  style="background-color: #dfdfd9;">
	<section class="content-seccion">

		<div class="content-img2">
		</div>

		<div class="content-form">
			<div class="content-logo">
				<img src="../img/logos/Logo-TecNM.png" alt="ITESCHAM">
			</div>

			<form method="post" action="cambia_password.php" name="signup">
				<h5>Ingrese su nueva contraseña</h5>
				<input type="hidden" class="email-rec" value="<?php echo $resultado['id']; ?>" name="uid">
				<div class="user">
					<input type="password" name="newPass" placeholder="Contraseña" required pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,20}$" oninvalid="this.setCustomValidity('La contraseña debe tener entre 8 y 20 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.')" oninput="this.setCustomValidity('')" />
				</div>

				<div class="boton">
					<button id="btn" class="btn bot" type="submit">Enviar</button>
					<div class="btn2"></div>
				</div>

				<div class="regresar">
					<a href="../perfiles.html">Regresar</a>
				</div>

			</form>
		</div>

	</section>
</body>

</html>