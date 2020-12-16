<!doctype html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <title>Sergio´s2.0</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/all.min.css">
    <?php
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php","",$archivo);
        if($pagina == 'invitados' || $pagina == 'index'){
            echo '<link href="css/colorbox.css" rel="stylesheet" />';
        }
        else if($pagina == 'conferencia'){
            echo '<link href="css/lightbox.css" rel="stylesheet" />';

        }
    ?>
    <link href="css/lightbox.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/15792a9123.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <link rel="stylesheet" href="css/main.css">

    <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina;?>">
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <!-- Add your site or application content here -->
    <header class="site-header">
        <div class="hero">
            <div class="contenido-hero">
                <nav class="redes">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </nav>
                <div class="informacion-evento">
                    <div class="fecha-ubicacion">
                        <p><i class="far fa-calendar-alt"></i>10-12 dic</p>
                        <p><i class="fas fa-map-marker-alt"></i>guadalajara,mx</p>
                    </div>
                    <h1 class="letras-header">Gdlwebcamp</h1>
                    <p>la mejor conferencia de <span>diseño web</span></p>
                </div>
            </div>
            <!--contenido-->
        </div>
        <!--hero-->
    </header>
    <!--site-header-->
    <div class="barra">
        <div class="contenedor">
            <div class="contenido ">
                <div class="logo">
                    <a href="index.php">
                        <img src="img - web/logo.svg" alt="imagen del logo">
                    </a>
                </div>
                <div class="menu-movil">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="menu-barra">
                    <nav>
                        <a href="conferencia.php">coferencia</a>
                        <a href="calendario.php">calendario</a>
                        <a href="invitados.php">invitados</a>
                        <a href="reservaciones.php">reservaciones</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!---Barra-->
 
