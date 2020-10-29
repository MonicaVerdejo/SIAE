<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,  initial-scale=1.0">
  <title>He olvidado mi contraseña</title>
  <link rel="stylesheet" href="../../css/styles3.css">
  <link rel="stylesheet" href="../../css/responsive.css">
  <!-- Site Icons -->
  <link rel="icon" href="../../img/logos/tecnm_champoton.svg" type="image/x-icon">
</head>

<body style="background-color: #f8f8df;">
  <section class="content-seccion">

    <div class="content-img3">
    </div>

    <div class="content-form">
      <div class="content-logo">
        <img src="../../img/logos/Logo-TecNM.png" alt="Logo TecNM">
      </div>

      <form action="recuperaPassAdmin.php" method="post">
        <div class="user">
          <input type="email" name="email2" id="email2" placeholder="Correo electronico" required>
        </div>

        <div class="boton">

          <button class="btn bot" type="submit">Enviar link de recuperación</button>
          <div class="btn2"></div>
        </div>

        <div class="regresar">
          <a href="../../perfiles.html">Regresar</a>
        </div>

      </form>

    </div>

  </section>
</body>

</html>