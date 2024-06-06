<!DOCTYPE html>
<html lang="es">

<head>
    <title>Acceso Denegado</title>
    <?= view('components/HeadAdmin.php'); ?>
</head>

<body>

    <?= view('components/NavbarAdmin.php'); ?>
    <?= view('components/BotonFlotante.php'); ?>
    <?= view('components/BotonContactanos.php'); ?>

    <div class="wrap" style="margin-top: 15%;">
        <body class="app flex-row align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="clearfix">
                            <img class="float-left" style="max-width: 10vw;" src="https://clipart-library.com/image_gallery2/Blocked-PNG-Image.png" alt="">
                            <h4 class="pt-3" style="color: black;">Oops! No puede acceder.</h4>
                            <p class="text-muted">Su usuario no tiene permitido el acceso.</p>
                        </div>
                    </div>
                </div>
                <!-- <p>
            <?php if (!empty($message) && $message !== '(null)') : ?>
                <?= nl2br(esc($message)) ?>
            <?php else : ?>
                Sorry! Cannot seem to find the page you were looking for.
            <?php endif ?>
        </p> -->
            </div>
        </body>

</html>