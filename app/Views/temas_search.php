<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temas</title>
    <link rel="icon" href="<?php echo base_url("images/gto2.png")?>">

    <link rel="stylesheet" href="<?= base_url("plugins/bootstrap/bootstrap.min.css");?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/animate-css/animate.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('css/style.css') ?>">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url("plugins/ionicons/ionicons.min.css");?>">

</head>
<style>
#particles-js {
    width: 100vw;
    position: fixed;
    z-index: -1;
}
</style>

<body>
    <div id="particles-js"> </div>
    <section class="top-bar animated-header">
        <div class="top-bar-header animated-header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="col">

                            </div>
                            <div class="col">
                                <div class="container">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item" style="margin-right: 20px ;">
                                            <a id="blanco" href="<?php echo base_url('/contactanos');?>"
                                                class="nav-link">(477)7103400
                                            </a>
                                        </li>
                                        <li class="nav-item" style="margin-right: 20px ;">
                                            <a id="blanco" href="<?php echo base_url('/contactanos');?>"
                                                class="nav-link">
                                                Contactanos
                                            </a>
                                        </li>
                                        <li>
                                            <a id="blanco" href="https://www.facebook.com/JuventudEsGto"
                                                style="margin: 20px" target="_blank " class="Facebook">
                                                <i class="ion-social-facebook   fa-lg"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a id="blanco" href="https://twitter.com/JuventudEsGto" target="_blank "
                                                style="margin: 20px" class="Twitter">
                                                <i class="ion-social-twitter   fa-lg"></i>
                                            </a>
                                        </li>
                                       
                                        <li>
                                            <a id="blanco" href="ion-social-instagram-outline" target="_blank"
                                                style="margin: 20px" class="Google Plus">
                                                <i class="ion-social-instagram-outline  fa-lg"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a id="blanco"
                                                href="https://www.youtube.com/channel/UCNxjn155hP-SHqu1m4C4w4w"
                                                target="_blank" style="margin: 20px" class="Google Plus">
                                                <i class="ion-social-youtube  fa-lg"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light" id="headercolor">
                    <a class="navbar-brand" href="<?php echo base_url('/index')?>"style="margin-left:100px;">
                        <img class="logo" src="<?php echo base_url('images/LOGO.png')?>" alt="juventudesgto">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('/index')?>">Inicio
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sistema JUVENTUDESGTO
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo base_url('/consejo#sajg')?>">¿Qué
                                        es?</a>
                                    <a class="dropdown-item"
                                        href="<?php echo base_url('/consejo#consejo')?>">Consejo</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/consejo#programa')?>">Programa
                                        Estatal</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('/estadisticas')?>">Estadísticas e
                                    Indicadores</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Información de interés para las Juventudes
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo base_url('/apoyos_servicios')?>">Apoyos y
                                        servicios</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/directorio')?>">Directorios</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/temasView')?>">Temas de interés</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Investigaciones y Evaluaciones
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo base_url('/centro-documental')?>">Centro
                                        documental</a>
                                    <a class="dropdown-item"
                                        href="<?php echo base_url('/evaluacion')?>">Evaluaciones</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/red-investigadores')?>">Red
                                        de Investigadores</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url() ?>/login">Iniciar Sesión</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

    </section>
    <div class="container" style=" margin-top: 200px; color: #000000 ">
        <nav class=" navbar navbar-light bg-light">
            <a class="navbar-brand">Búsqueda</a>
            <form class="form-inline" method="POST" action="<?php echo base_url('temasView/Search')?>">
                <select class="form-select form-control mr-sm-2" placeholder="Tema" name="descripcionTema">
                    <option disabled selected>Seleccione el tema</option>
                    <?php foreach($datosT as $t):?>
                    <option><?=$t['descripcionTema'];?></option>
                    <?php endforeach;?>
                </select>

                <button class="btn" style="color: #286ea7" type="submit">Buscar</button>
                <form action="<?php echo base_url('temasView')?>">
                    <button class="btn" style="color: #286ea7; margin: 5px">Todas</button>
                </form>
            </form>

        </nav>
    </div>

    <section class="section" style="margin-top:30px">
        <div class="container">
            <div class="row">
                <?php foreach($buscarTema as $td):?>
                <div class="card col-md-3 wow animated  animate__bounceIn box1" data-wow-delay="0.2s"" style=" margin:
                    25px">
                    <img class="card-img-top "
                        src="<?php echo base_url('images_temas/'.$td['id_tema'].'/'.$td['imagen'])?>"
                        style="height: 150px;" alt="JuventudEsGto">
                    <div class="center wow animated bounceInLeft box1" data-wow-delay="0.2s">
                        <hr style="color: #0056b2;" />
                        <h5 style="text-align:center"><?= $td['descripcionTema'] ?></h1>
                        <hr style="color: #0056b2;" />
                        <p class="card-text" style="text-align:justify"><?= $td['descripcionMas']?> </p>
                    </div>
                    <a href="<?= $td['link']?>" target="_blank" class="btn btn-primary">Ver más</a>
                </div>
                <?php endforeach;?>
            </div>


        </div>
    </section>
    <?= view('components/Footer.php'); ?>
    <script src="public/plugins/jQurey/jquery.min.js"></script>
    <!-- bootstrap js -->
    <script src="public/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url('js/particles.js')?>"> </script>
    <script src="<?php echo base_url('js/particulas.js')?>"> </script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <!-- template main js -->
    <script src="public/js/main.js"></script>
    <script src="<?php echo base_url('plugins/wow-js/wow.min.js')?>  "></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
    <script>
    new WOW().init();
    </script>
</body>

</html>