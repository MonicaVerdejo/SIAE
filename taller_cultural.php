<?php
include_once 'db.php';
$db = new DB();
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title>SIAE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="img/logos/tecnm_champoton.svg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:300%7CQuestrial">
    <!-- fonts -->
    <link rel="stylesheet" href="css/fonts.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Responsive -->
    <link rel="stylesheet" href="css/responsive.css">
    <!--estilo-->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-spinner"><span class="cssload-cube cssload-cube0"></span><span class="cssload-cube cssload-cube1"></span><span class="cssload-cube cssload-cube2"></span><span class="cssload-cube cssload-cube3"></span><span class="cssload-cube cssload-cube4"></span><span class="cssload-cube cssload-cube5"></span><span class="cssload-cube cssload-cube6"></span><span class="cssload-cube cssload-cube7"></span><span class="cssload-cube cssload-cube8"></span><span class="cssload-cube cssload-cube9"></span><span class="cssload-cube cssload-cube10"></span><span class="cssload-cube cssload-cube11"></span><span class="cssload-cube cssload-cube12"></span><span class="cssload-cube cssload-cube13"></span><span class="cssload-cube cssload-cube14"></span><span class="cssload-cube cssload-cube15"></span>
            </div>
            <h2 class="preloader-title">SIAE</h2>
        </div>
    </div>
    <div class="page">

        <!-- Page Header-->
        <header class="page-header">
            <!-- RD Navbar-->
            <div class="rd-navbar-wrap position-relative">
                <nav class="rd-navbar" data-layout="rd-navbar-sidebar" data-device-layout="rd-navbar-sidebar" data-sm-layout="rd-navbar-sidebar" data-sm-device-layout="rd-navbar-sidebar" data-md-layout="rd-navbar-sidebar" data-md-device-layout="rd-navbar-sidebar" data-lg-layout="rd-navbar-sidebar" data-lg-device-layout="rd-navbar-sidebar" data-xl-layout="rd-navbar-sidebar" data-xl-device-layout="rd-navbar-sidebar" data-xxl-layout="rd-navbar-sidebar" data-xxl-device-layout="rd-navbar-sidebar" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true" data-auto-height="false" data-sm-auto-height="false" data-md-auto-height="false" data-lg-auto-height="false" data-xl-auto-height="false" data-xxl-auto-height="false">
                    <div class="rd-navbar-main-outer">
                        <div class="rd-navbar-main">
                            <!-- RD Navbar Panel-->
                            <div class="rd-navbar-panel">
                                <!-- RD Navbar Toggle-->
                                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                                <!-- RD Navbar Brand-->
                                <div class="rd-navbar-brand"><a class="brand" href="index.html"><img class="brand-logo-desktop" src="img/logos/logo-default.svg" alt="" width="192" height="94" /><img class="brand-logo-mobile" src="img/logos/logo-default.svg" alt="" width="192" height="65" /></a>
                                </div>
                            </div>
                            <div class="rd-navbar-nav-wrap">
                                <div class="rd-navbar-nav-container">
                                    <!-- RD Navbar Nav-->
                                    <ul class="rd-navbar-nav">
                                        <li class="rd-nav-item active"><a class="rd-nav-link" href="index.html">Inicio</a>
                                        </li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="taller_cultural.php">Talleres culturales</a>
                                        </li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="taller_deportivo.php">Talleres deportivos</a>
                                        </li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="taller_civico.php">Talleres civicos</a>
                                        </li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="contacto.html">Contacto</a>
                                        </li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="perfiles.html">Perfiles</a>
                                        </li>
                                    </ul>
                                    <ul class="contacts-classic">
                                        <li>
                                            <div class="contacts-classic-title">Teléfono:</div><a href="tel:+54(982)127-6466">+54 (982)
                                                127-6466</a>
                                        </li>
                                        <li>
                                            <div class="contacts-classic-title">Correo:</div><a href="mailTo:#">info@vinculacion.org</a>
                                        </li>
                                        <li>
                                            <div class="contacts-classic-title">Síguenos:</div>
                                            <ul class="list-inline list-social list-inline-sm">
                                                <a href="http://champoton.tecnm.mx/portal/" target="_blank"><i class="fa fa-internet-explorer" aria-hidden="true"></i></a>

                                                <li><a class="icon fa fa-twitter" href="https://twitter.com/ITESCHAM" target="_blank"></a></li>
                                                <li><a class="icon fa fa-facebook" href="https://m.facebook.com/ITESCHAM/" target="_blank"></a></li>
                                                <li><a class="icon fa fa-instagram" href="https://www.instagram.com/itescham/" target="_blank"></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </nav>
            </div>
        </header>
        <section class="section section-inset-1 bg-default text-center bg-image background-position-1" id="home" 
        style="background-image: url(img/img_portada/cultural/cultural.jpg)">
            <div class="container">
                <div class="title-style-1-wrap">
                    <div class="oh-desktop wow slideInLeft">
                        <h1 class="title-style-1 wow slideInRight">Talleres culturales</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Talleres-->

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center mt-5">
                        <h1>NUESTRA GALERIA</h1>
                        <p>Todos nuestros talleres a la distancia de un clic.</p>
                    </div>
                </div>
            </div>
            <!--seccion de talleres civicos-->
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="special-menu text-center">
                        <a class="btn btn-dark" style="color:white;">CULTURA</a>
                    </div>
                </div>
            </div>
            <!--CATEGORIA CULTURAL-->
            <div>
                <main class="container">
                    <?php
                    $response = json_decode(file_get_contents('http://localhost/SIAE2/galeria/api-talleres.php?categoria=Cultural'), true);
                    if ($response['statuscode'] == 200) {
                        foreach ($response['items'] as $item) {
                            include('items.php');
                        }
                    } else {
                        echo $response['response'];
                    }
                    ?>
                </main>
            </div>
            <!--FIN seccion de talleres civicos-->
        </div>


        <!---->




        <!-- Page Footer-->
        <footer class="section footer-classic section-full section-full-1 section-sm section-inset-2 bg-gray-3 context-dark text-md-center" id="contacts">
         <img class="mb-3" src="img/img_portada/slider/comunidadDigital.jpg" alt="comunidad Digital">
            <div class="container">
                <div class="footer-classic-list-social wow fadeInUp">
                    <ul class="list-inline list-social list-inline-sm">
                        <li><a class="icon fa fa-twitter" href="https://twitter.com/ITESCHAM" target="_blank"></a></li>
                        <li><a class="icon fa fa-facebook" href="https://m.facebook.com/ITESCHAM/" target="_blank"></a></li>
                        <li><a class="icon fa fa-instagram" href="https://www.instagram.com/itescham/" target="_blank"></a></li>
                    </ul>
                </div>
                <p class="rights wow fadeInUp"><span>&copy;&nbsp; </span>
                    <span class="copyright-year"></span><span>&nbsp;</span>
                    <span>SIAE</span><span>.&nbsp;</span>
                    <span>Todos los derechos reservados.</span><br />Diseñado&nbsp;por&nbsp;<a href="#">Softup</a></p>
            </div>
        </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>