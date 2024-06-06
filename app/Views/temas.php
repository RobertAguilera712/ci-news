<!DOCTYPE html>
<html lang="es">

<head>
    <title>Temas de Interés</title>
    <?= view('components/Head.php'); ?>
</head>
<style>

#particles-js {
    width: 100vw;
    position: fixed;
    z-index: -1;

}
</style>

<body>
    <?= view('components/FondoAnimadoCuadros.php'); ?>

    <?= view('components/Topbar.php'); ?>
    <?= view('components/Navbar.php',  ['interfazConfig' => $_SESSION['interfazConfig']]); ?> 
    <?= view('components/BotonFlotante.php'); ?>
    <?= view('components/BotonContactanos.php'); ?>
    
    <section class="section" style="margin:30px auto 0 10vw">
        <div class="container">
            <div class="row">
                <?php foreach($tema as $td):?>
                
                <div class="card col-md-3 wow animated  animate__bounceIn box1" data-wow-delay="0.2s" style=" margin:
                    25px">
                    <a href="<?= $td['link']?>" target="_blank">
                    <img class="card-img-top "
                        src="<?php echo base_url('images_temas/'.$td['id_tema'].'/'.$td['imagen'])?>"
                        style="height: 150px;" alt="JuventudEsGto">
                    </a>
                    <div class="center wow animated bounceInLeft box1" data-wow-delay="0.2s">
                        <hr style="color: #0056b2;" />
                        <h5 style="text-align:center"><?= $td['descripcionTema'] ?></h5>
                    </div>
                </div>
            
                <?php endforeach;?>
            </div>


        </div>
    </section>
    <?= view('components/Footer.php'); ?>
    <script src="<?php echo base_url('js/particles.js')?>"> </script>
    <script src="<?php echo base_url('js/particulas.js')?>"> </script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    
    <!-- bootstrap js -->
    <script src="public/plugins/bootstrap/bootstrap.min.js"></script>
    
    
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