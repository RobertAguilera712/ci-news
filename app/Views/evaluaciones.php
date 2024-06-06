<!DOCTYPE html>
<html lang="es">

<head>

    <title>Evaluaciones</title>

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
            <h1><span class="badge bg-primary">Estadísticas de las Juventudes</span></h1>
        </center>
        <div class="row">
            <div class="btn btn-primary btn-lg animate__animated animate__fadeIn" style="max-width: 25%; margin: 5% auto 0 auto;">
                <a class="nav-link" href="https://juventudesgto.guanajuato.gob.mx/index.php/transparencia-2/" id="navbarDropdown" role="button" style="color: white;" target="_blank" aria-haspopup="true" aria-expanded="false">
                    Transparencia
                </a>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-3 animate__animated animate__fadeIn">
        <table id="estudios" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $d) : ?>
                    <tr>
                        <td>
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <?= $d['nombre_evaluacion']; ?>
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col" style="margin-left: 30px;">
                                                    <div class=row>
                                                        <?= $d['año'] ?>
                                                    </div>
                                                    <div class=row>
                                                        <?= $d['tipo'] ?>
                                                    </div>
                                                    <div class=row>
                                                        <?= $d['evaluador'] ?>
                                                    </div>

                                                </div>
                                                <div class="col" style="margin-top: 15px; margin-left:100px;">
                                                    <?php if ($d['informe'] == !null) : ?>
                                                        <a href="<?php echo base_url('documentos_evaluaciones/' . $d['id_evaluacion'] . '/' . $d['informe']) ?>" target="_blank" class="btn btn-primary btn-lg" style="margin: 5px">
                                                            Ver documento
                                                        </a>
                                                    <?php endif ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= view('components/Footer.php'); ?>


    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/popper.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url('js/particles.js') ?>"> </script>
    <script src="<?php echo base_url('js/particulas.js') ?>"> </script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    <script type="text/javascript">
        let mensaje = ' <?php echo $mensaje ?>';
        if (mensaje == '1') {
            swal('', 'Nombre de la investigación no encontrado', 'error');
        } else if (mensaje == '2') {
            swal('', 'Llene los campos deseados a buscar ', 'error');
        } else if (mensaje == '3') {
            swal('', 'No hay investigación con el tema seleccionado ', 'error');
        }

        new DataTable('#estudios');
    </script>

</body>

</html>