<!DOCTYPE html>
<html lang="es">

<head>
    <title>Página no encontrada</title>
<<<<<<< HEAD
=======
    <link rel="icon" href="images/gto2.png">
>>>>>>> 81887ee7fab11282fcb26a2a3b80edd02381bf75

    <?= view('components/Head.php'); ?>

</head>

<body>
    <?= view('components/Navbar.php',  ['interfazConfig' => $_SESSION['interfazConfig']]); ?>
    <?= view('components/BotonFlotante.php'); ?>
    <?= view('components/BotonContactanos.php'); ?>

    <div class="wrap" style="margin-top: 15%;">

        <body class="app flex-row align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="clearfix">
                            <h1 class="float-left display-3 mr-4">404</h1>
                            <h4 class="pt-3">Oops! Estás perdido.</h4>
                            <p class="text-muted">Página no encontrada.</p>
                        </div>
                    </div>
                </div>
            </div>
        </body>

</html>