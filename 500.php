<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No encontrada</title>
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
</head>

<style type="text/css">
       * {
        margin: 0;
        padding: 0;

    }

    body {
        font-family: Calibri, sans-serif;
    }

    .background-wrap {
        position: fixed;
        z-index: -1000;
        width: 100%;
        height: 100%;
        overflow: hidden;
        top: 0;
        left: 0;

    }

    #video-bg-elem {
        position: absolute;
        top: 0;
        left: 18%;
       
        min-height: 100%;
    
    }


    .content {
        position: absolute;
        width: 100%;
        min-height: 100%;
        z-index: 1000;
        background-color: rgba(0, 0, 0, 0.6);
    }

    .content h1 {
        text-align: center;
        font-size: 65px;
        text-transform: uppercase;
        font-weight: 300;
        color: #fff;
        padding-top: 15%;
        margin-bottom: 10px;
    }

    .content p {
        text-align: center;
        font-size: 20px;
        letter-spacing: 3px;
        color: #aaa;
    }

    .boton {
        left: 0;
        right: 0;
        margin-left: auto;
        margin-right: auto;
        border-radius: 1px;
        margin-top: 40px;
        position: absolute;
        width: 300px;
        height: 50px;
        background-color: cadetblue;
        color: white;
        font-size: 20px;
        cursor: pointer;
    }
</style>

<body>
 
    <div class="background-wrap">
        <video  id="video-bg-elem" preload="auto" autoplay="true" loop="loop" class="video">
            <source src="videos/pat.mp4" type="video/mp4">
            No se pudo cargar el video
        </video>
    </div>


    <div class="content">
        <h1 style="font-size: 100px; font-weight: bold;">500</h1>
        <p>Internal server error</p>
        <p> Tranquilo bob esponja</p>
        <p> Tenemos T E C N O L O G Í A</p>
        <a href="index.php"><button class="boton">Ir a página principal</button></a>
    </div>


</body>

</html>