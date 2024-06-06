<!DOCTYPE html>
<html lang="es">

<head>
    <title>Red de investigadores</title>

    <?= view('components/Head.php'); ?>
</head>

<body>
    <?= view('components/FondoAnimadoCuadros.php'); ?>

    <?= view('components/Topbar.php'); ?>
    <?= view('components/Navbar.php',  ['interfazConfig' => $_SESSION['interfazConfig']]); ?>
    <?= view('components/BotonFlotante.php'); ?>
    <?= view('components/BotonContactanos.php'); ?>

    <div class="container">
        <center style="margin: 22vh auto 1vh auto;" class="animate__animated animate__fadeInDown">
            <h1><span class="badge bg-primary">Red de Investigadores</span></h1>
        </center>
    </div>

    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <h4 class="text-center animate__animated animate__fadeIn" style="text-transform: none; margin: auto;">
                    Proponer estrategias sólidas a fin de consolidar el Sistema Estatal para el Desarrollo y Atención a las
                    Juventudes a través de un plan de trabajo que permita la colaboración transversal entre las distintas
                    autoridades de los tres niveles de atención en los ámbitos local, nacional e internacional.
                </h4>
            </div>
            <br>
            <section>
                <h1 class="subtitle text-center animate__animated animate__fadeInDown" id="objetivos" style="text-transform: none; font-size: 30px; color:#000F9F;" data-wow-duration="500ms">
                    Objetivos para el plan de trabajo</h1>
                <div class="container-fluid">
                    <div class="row">
                        <?php foreach ($objetivos as $o) : ?>
                            <div class="col-lg-3 col-md-6 col-xl-3 col-sm-auto">
                                <div class="text-center animate__animated animate__fadeIn">
                                    <p>
                                        <?= $o['descripcion'] ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <div class="container">
                <?php foreach ($datos as $d) : ?>
                    <div class="card col-md-3 col-sm-6">
                        <img class="card-img-top img-fluid" src="<?php echo base_url('images_integrantes/' . $d['id_investigadores'] . '/' . $d['imagen']) ?>" alt="JuventudEsGto">
                        <div class="card-body">
                            <h5><?= $d['nombre'] ?></h5>
                            <p class="card-text"><?= $d['descripcion'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>




    <?= view('components/Footer.php'); ?>

    <script src="<?php echo base_url('js/particles.js') ?>"> </script>
    <script src="<?php echo base_url('js/particulas.js') ?>"> </script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>


    <!-- Form Validation -->
    <script src="public/plugins/form-validation/jquery.form.js"></script>
    <script src="public/plugins/form-validation/jquery.validate.min.js"></script>
    <!-- slick slider -->

    <!-- bootstrap js -->
    <script src="public/plugins/bootstrap/bootstrap.min.js"></script>
    <!-- wow js -->
    <script src="public/plugins/wow-js/wow.min.js"></script>
    <!-- slider js -->
    <script src="public/plugins/slider/slider.js"></script>
    <!-- Fancybox -->
    <script src="public/plugins/facncybox/jquery.fancybox.js"></script>



</body>

</html>