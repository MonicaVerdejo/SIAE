<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No encontrada</title>
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
        left: 0;
        min-height: 100%;
        min-width: 100%;
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
        background-color: #2E4E8F;
        color: white;
        font-size: 20px;
        cursor: pointer;
    }


    .perritu{
     left: 0;
        right: 0;
        margin-left: auto;
        margin-right: auto;
        margin-top: 40px;
        position: absolute;    
        color: white;
        font-size: 20px;
       
    }
</style>

<body>

    <div  id="video-bg-elem">
        <img class="background-wrap" src="img/img_errores/fondo.jpg">
    </div>


    <div class="content text-center">
        
        <img class="perritu" width="300" height="300" src="img/img_errores/perritobailando.gif">
  
        <h1 class="mt-1" style="font-size: 100px; font-weight: bold;">400</h1>

        <p>Error de conexión.</p>
        <p> Tuturututuru</p>
        <p> Intenta reiniciando jejeje</p>
        <a href="index.php"><button class="boton">Ir a página principal</button></a>
    </div>


</body>

</html>