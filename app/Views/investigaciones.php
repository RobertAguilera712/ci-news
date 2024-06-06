<!DOCTYPE html>
<html lang="es">

<head>
    <title>Investigaciones JuventudEsGTO</title>

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
            <h1><span class="badge bg-primary">Estudios JuventudEsGto</span></h1>
        </center>
    </div>

    <div class="container mt-5 mb-3 animate__animated animate__fadeIn">
        <table id="estudios" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($investigaciones as $item) : ?>
                    <tr>
                        <td>
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <?= $item['nombre_tema']; ?>
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">

                                                    <img src="<?php echo base_url('images_investigaciones/' . $item['id_investigacion'] . '/' . $item['informe']) ?>" width="300" alt="juventud">
                                                </div>
                                                <div class="col">
                                                    <div class=row>

                                                        <h1 class="text-primary" style="font-size: 15px;">
                                                            <?= $item['nombre'] ?>

                                                        </h1>

                                                    </div>
                                                    <div class=row style="font-size:15px;">
                                                        <?php $fecha = $item['fecha_investigacion'];
                                                        if ($fecha == !NULL) {
                                                            $nuevaFecha = date("d-m-Y", strtotime($fecha));
                                                            echo $nuevaFecha;
                                                        } else {
                                                            echo "Sin fecha";
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class=row style="margin-top:15px; font-size:15px; text-align:justify;">
                                                        <?= $item['descripcion'] ?>
                                                    </div>

                                                </div>
                                                <div class="col" style="margin-top: 50px; margin-left:100px;">

                                                    <?php if ($item['archivo'] == !null) : ?>
                                                        <a href="<?php echo base_url('documentos_investigaciones/' . $item['id_investigacion'] . '/' . $item['archivo']) ?>" target="_blank" class="btn btn-primary btn-lg" style="margin: 5px">Ver documento</a>
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



    <script type="text/javascript">
        let mensaje = ' <?php echo $mensaje ?>';
        if (mensaje == '1') {
            swal('', 'Nombre de la investigación no encontrado ', 'error ');
        } else if (mensaje == '2 ') {
            swal('', 'Llene los campos deseados a buscar ', 'error ');
        } else if (mensaje == '3 ') {
            swal('', 'No hay investigación con el tema seleccionado ', 'error ');
        }

        new DataTable('#estudios');
    </script>


</body>

</html>