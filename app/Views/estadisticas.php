<?php
    $id_municipio46 = $municipio[46]['id_municipio'];
    $pdfG = $municipio[46]['pdf'];
    $pdf = $municipio[46]['pdf'];
    ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('images/gto2.png')?>">
    <title>Estadisticas e Indicadores</title>

    <link rel="stylesheet" href="<?= base_url("plugins/bootstrap/bootstrap.min.css");?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/animate-css/animate.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/testimonios.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('sss/sss.css') ?>">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('css/hexagono.css') ?>">
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
    <?= view('components/Topbar.php'); ?>
    <?= view('components/Navbar.php',  ['interfazConfig' => $_SESSION['interfazConfig']]); ?> 
    <?= view('components/BotonFlotante.php'); ?>
    <?= view('components/BotonContactanos.php'); ?>

    <div class="ribbon3" style="margin-top: 180px;">
        Estadísticas de las juventudes
        <i></i>
        <i></i>
        <i></i>
        <i></i>
    </div>


    <section>
        <div class="container" style="margin-top: 100px;">
            <div class="row">
                <div class="col-md-6">
                    <div class="container">
                        <?= view('components/MapaGto.php', ['municipio'=>$municipio]); ?>
                    </div>
                    <div class="wow animated animate__fadeInLeft box1"
                        style="margin-top: 50px; margin-bottom: 50px; margin-left: 10px; animation-duration: 3s;">
                        <button type="button" style="margin-left: 153px;" class="btn btn-primary btn"
                            data-toggle="modal" data-target="#PdfGeneral">Ver documento general del
                            Estado de Guanajuato</button>
                    </div>
                </div>
                <div class="col">
                    <div class="wow animated animate__fadeInRight box1" style="animation-duration: 3s;">
 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <form method="" action="" enctype="multipart/form-data">
        <div class="modal fade " id="PdfGeneral" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="publicacionTitle">Estado de Guanajuato</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <embed
                            src="<?php echo base_url('documentos_municipios/' . $id_municipio46. '/' . $pdfG) ?>"
                            width="100%" height="500px">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <section>
        <div class="wow animated animate__fadeInLeft box1" style="animation-duration: 3s;">
            <?php foreach ($datos as $d) : ?>
            <?php if($d['pdf']!==null):?>
            <embed src="<?php echo base_url('documentos_municipios/' . $d['id_municipio'] . '/' . $d['pdf']) ?>"
                style="margin-left: 110px;" width="80%" height="650px">
            <?php endif;?>
            <?php endforeach; ?>
        </div>
    </section>


    <?= view('components/Footer.php'); ?>
    <script src="<?php echo base_url('js/particles.js')?>"> </script>
    <script src="<?php echo base_url('js/particulas.js')?>"> </script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="<?php echo base_url(' public/plugins/jQurey/jquery.min.js')?>"></script>
    <!-- bootstrap js -->
    <script src=" <?php echo base_url('plugins/bootstrap/bootstrap.min.js')?>"></script>
    
    <script src="<?php echo base_url('js/main.js')?>"></script>
    <script src="<?php echo base_url('plugins/wow-js/wow.min.js')?>  "></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
    AOS.init();
    </script>
    <script>
    new WOW().init();
    </script>
    <script src="<?php echo base_url('sss/sss.js')?>"></script>
    <script>
    jQuery(function($) {
        $('.slider-testimonial').sss({
            slideShow: true,
            speed: 3500
        });
    });
    </script>
    <script type="text/javascript">
    let mensaje = '<?php echo $mensaje ?>';
    if (mensaje == '1') {
        swal('', '¡Gracias por envíar tu testimonio!', 'success');
    }
    </script>

</body>

</html>