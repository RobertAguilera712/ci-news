<!DOCTYPE html>
<html class="no-js">

<head>
    
    <title>Revista</title>

    <?= view('components/Head.php'); ?>
</head>

<body>
    <?= view('components/FondoAnimadoCuadros.php'); ?>

    <?= view('components/Topbar.php'); ?>
    <?= view('components/Navbar.php',  ['interfazConfig' => $_SESSION['interfazConfig']]); ?>
    <?= view('components/BotonFlotante.php'); ?>
    <?= view('components/BotonContactanos.php'); ?>






    <div id="fondo">
        <div class="ripple-background">
            <div class="circle xxlarge shade1"></div>
            <div class="circle xlarge shade2"></div>
            <div class="circle large shade3"></div>
            <div class="circle mediun shade4"></div>
            <div class="circle small shade5"></div>
        </div>
    </div>

    <section style="margin-top: 8vh; min-height: 80vh;  background-color: transparent; backdrop-filter: blur(5px); ">
        <div class="container">
            <div class="row" style="margin: 0px 0 40px 0; ">
                <div class="col" style="margin: 3% 0 auto 3%; height: 70vh; background-color: white; 
                border-radius: 10px; border: 0.5px; border-style: ridge; border-color: lightgray;">
                    <div style="margin: 5%;">
                        <h2>Revista Voces Emergentes</h2>
                        <p>Volumen: <?= $revista[0]['volumen']; ?></p>
                        <p>No° de Año: <?= $revista[0]['numero_year']; ?></p>
                        <p><?= $revista[0]['descripcion']; ?></p>
                        <?php if ($revista[0]['archivo'] == !null) : ?>
                            <a class="btn btn-primary animate__bounceIn" href="<?php echo base_url('revistas/' . $revista[0]['id_revista'] . '/' . $revista[0]['archivo']) ?>" target="_blank" type="button">
                                Abrir PDF
                            </a>
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-4" style="margin: 3% 0 auto 10%;">
                    <img class="img-fluid shadow-lg" style="max-height: 30em;" src="<?php echo base_url('images_revistas/' . $revista[0]['id_revista'] . '/' . $revista[0]['portada']) ?>" alt="Second slide">

                </div>
            </div>
        </div>

    </section>

    <section style="min-height: 75vh; background-color: white; backdrop-filter: blur(5px);">
        <div class="container">

        <div class="container">
        <center style="margin: 8vh auto 5vh auto;">
            <h1><span class="badge bg-primary">Artículos</span></h1>
        </center>
    </div>
            <div class="row" style="margin: 0px 0 40px 0;">
                <?php if (count($articulos) > 0) : ?>
                    <?php foreach ($articulos as $art) : ?>
                        <div class="col" style="margin: 10px 0 10px 0;">
                            <div class="card shadow-lg" style="width: 100%; min-width: 28vw;">
                                <div class="card-body">
                                    <div class="row" style="margin-bottom: 10px;">
                                        <div class="col-4">
                                            <img class="img-fluid shadow-lg img-revista" style="max-width: 100%; min-width: 100%;" src="<?php echo base_url('images_articulosrevistas/' . $art['id_articulo'] . '/' . $art['imagen']) ?>" alt="JuventudEsGto">
                                        </div>
                                        <div class="col-8">
                                            <h5 class="card-title"><?= $art['titulo']; ?></h5>
                                            <p class="card-text"><?= $art['autor']; ?></p>
                                            <p style="font-size: small; text-align: justify;"><?= $art['contenido']; ?></p>
                                            <?php if ($revista[0]['archivo'] == !null) : ?>
                                                <a class="btn btn-primary animate__bounceIn" href="<?php echo base_url('revistas/' . $revista[0]['id_revista'] . '/' . $revista[0]['archivo']) ?>" target="_blank" type="button">
                                                    Artículo completo
                                                </a>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <h1 style="margin: auto;">No hay articulos</h1>
                <?php endif; ?>

            </div>
        </div>

    </section>

    <section style="min-height: 25vh; background-color: white; margin-top: 5%;">
        <div class="container">
            <div class="row">
                <div class="sp-column">
                    <span class="sp-copyright">
                        <hr>
<<<<<<< HEAD
                        <small class="text-center">
=======
                        <small>
>>>>>>> 81887ee7fab11282fcb26a2a3b80edd02381bf75
                            <p>Revista Voces Emergentes, Año <?= $revista[0]['numero_year']; ?>,
                                Volumen No. <?= $revista[0]['volumen']; ?>, es una publicación cuatrimestral, distribuida y editada por
                                JuventudEsGto.</p>
                            <p>Las opiniones expresadas por los autores no necesariamente reflejan la postura del editor de la publicación ni del instituto. Los textos publicados en el Sistema de Información e Investigación para el Desarrollo y Atención a las Juventudes del Estado de Guanajuato se encuentran bajo una licencia</p>
                        </small>
                        <center>
                            <small><a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/" target="_blank"><img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png"></a>
                                <br>Licencia Creative Commons Atribución-NoComercial-SinDerivar 4.0 Internacional.
                                <p>Se autoriza la reproducción total o parcial de los textos aquí publicados siempre y cuando se cite la fuente completa.</p>

<<<<<<< HEAD
                            </small>
                        </center>
=======
                            </small></center>
>>>>>>> 81887ee7fab11282fcb26a2a3b80edd02381bf75
                    </span></div>
            </div>
        </div>

    </section>

    <?= view('components/Footer.php'); ?>

    <style>
        .img-revista:hover {
            transform: scale(1.1);
            -webkit-transition: all .5s;
            -moz-transition: all .5s;
            transition: all .5s;
        }

        .btn-primary:hover {
            animation: pulse;
            animation-duration: 1s;
        }
    </style>


    
    
    <!-- Form Validation -->
    <script src="public/plugins/form-validation/jquery.form.js"></script>
    <script src="public/plugins/form-validation/jquery.validate.min.js"></script>

    
    </script>
    <script src="<?php echo base_url('js/jqcloud.min.js'); ?>"></script>

    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';
        if (mensaje == '1') {
            swal('', '¡Gracias por responder!', 'success');
        } else if (mensaje == '2') {
            swal('', 'Llene los campos deseados a buscar ', 'error');
        } else if (mensaje == '3') {
            swal('', 'No hay investigación con el tema seleccionado ', 'error');
        } else if (mensaje == '4') {
            swal('', '¡Gracias por envíar tu testimonio! Se revisará antes de ser mostrado', 'success');
        }
    </script>
    <script>
        new DataTable('#dataTable');
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            var height = $(window).height();

            $('#fondo').height(height);
        });
    </script>

</body>

</html>