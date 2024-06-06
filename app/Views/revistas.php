<!DOCTYPE html>
<html class="no-js">

<head>

    <title>Revista Voces Emergentes</title>

    <?= view('components/Head.php'); ?>

</head>

<body>

    <?= view('components/FondoAnimadoCirculos.php'); ?>


    <?= view('components/Topbar.php'); ?>
    <?= view('components/Navbar.php',  ['interfazConfig' => $_SESSION['interfazConfig']]); ?>
    <?= view('components/BotonFlotante.php'); ?>
    <?= view('components/BotonContactanos.php'); ?>

    <div class="container">
        <center style="margin: 22vh auto 1vh auto;" class="animate__animated animate__fadeInDown">
            <h1><span class="badge bg-primary">"Voces Emergentes"</span></h1>
        </center>
    </div>


    <section class="animate__animated animate__fadeIn" style="min-height: 85vh; background-color: transparent; backdrop-filter: blur(5px);">
        <div class="container mt-5">
            <div class="row" style="margin: 0px 0 40px 0;">

                <?php foreach (array_reverse($revistas) as $rev) : ?>
                    <div class="col-lg-3 col-md-6 col-xl-3 col-sm-auto" style="margin: 10px 0 10px 0;">
                        <div class="card shadow-lg">
                            <a class="btn btn-light" href="<?= base_url('revistas/' . $rev['id_revista']); ?>" target="_blank" type="button">
                                <div class="card-body">
                                    <div class="row" style="margin-bottom: 10px;">
                                        <img class="img-fluid img-revista" style="max-width: 100%; min-width: 100%;" src="<?php echo base_url('images_revistas/' . $rev['id_revista'] . '/' . $rev['portada']) ?>" alt="JuventudEsGto">
                                        <h4 class="card-title">Volumen: <?= $rev['volumen']; ?>
                                            <h5 class="card-title">Fecha: <?= $rev['fecha']; ?>
                                    </div>

                                </div>
                            </a>
                        </div>
                        </a>
                    </div>
                <?php endforeach; ?>

            </div>

    </section>

    <?= view('components/Footer.php'); ?>


    <style>
        .img-revista:hover {
            transform: scale(1.5);
            -webkit-transition: all .5s;
            -moz-transition: all .5s;
            transition: all .5s;
        }

        .btn-primary:hover {
            animation: pulse;
            animation-duration: 1s;
        }
    </style>



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


<section class="animate__animated animate__fadeIn" style="min-height: 85vh; background-color: transparent; backdrop-filter: blur(5px);">
    <div class="container mt-5">
        <div class="row" style="margin: 0px 0 40px 0;">

            <div class="col-lg-3 col-md-6 col-xl-3 col-sm-auto" style="margin: 10px 0 10px 0;">
                <div class="card shadow-lg">
                    <a class="btn btn-light" href="http://atencion.juventudesgto.com:85/revistas/2" target="_blank" type="button">
                        <div class="card-body">
                            <div class="row" style="margin-bottom: 10px;">
                                <img class="img-fluid img-revista" style="max-width: 100%; min-width: 100%;" src="http://atencion.juventudesgto.com:85/images_revistas/2/1714666292_cc44712f6fc0fd63080c.jpg" alt="JuventudEsGto">
                                <h4 class="card-title">Volumen: 2 </h4>
                                <h5 class="card-title">Fecha: 2024-05-02 </h5>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xl-3 col-sm-auto" style="margin: 10px 0 10px 0;">
                <div class="card shadow-lg">
                    <a class="btn btn-light" href="http://atencion.juventudesgto.com:85/revistas/1" target="_blank" type="button">
                        <div class="card-body">
                            <div class="row" style="margin-bottom: 10px;">
                                <img class="img-fluid img-revista" style="max-width: 100%; min-width: 100%;" src="http://atencion.juventudesgto.com:85/images_revistas/1/1706912044_bb8f355621be1a32d944.jpg" alt="JuventudEsGto">
                                <h4 class="card-title">Volumen: 1 </h4>
                                <h5 class="card-title">Fecha: 2024-02-01 </h5>
                            </div>

                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>

</section>