
<!DOCTYPE html>
<html lang="es">

<head>

    <title><?= $categoria ?></title>

    <?= view('components/Head.php'); ?>
</head>


<body>

    <?= view('components/FondoAnimadoCuadros.php'); ?>
    <?= view('components/Topbar.php'); ?>
    <?= view('components/Navbar.php',  ['interfazConfig' => $_SESSION['interfazConfig']]); ?>
    <?= view('components/BotonFlotante.php'); ?>
    <?= view('components/BotonContactanos.php'); ?>


    <div class="container" style="margin-top: 30vh;">
        <div class="jumbotron">
            <h1 class="display-4" style="margin-top: -50px;"><?= $categoria ?></h1>
            <p class="lead">
            <div class="table-responsive">
                <table id="dataTableDocumentos"  class="table table-bordered" width="100%">
                    <thead>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Municipio</th>
                        <th>Tipo</th>
                        <th>Documento</th>
                        <th>Palabras Clave</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($archivos as $arc) : ?>
                            <tr>
                                <td><?= $arc['nombre_archivo']; ?></th>
                                <td><?= $arc['fecha_archivo']; ?></th>
                                <td><?= $municipios[intval($arc['id_municipio'])-1]['nombre']; ?></th>
                                <td><?= $arc['tipo_archivo']; ?></th>
                                <td><?php if ($arc['archivo'] == !null) : ?>
                                        <a class="btn btn-success btn-sm" style="margin: 0 auto 0 auto;" href="<?php echo base_url('documentos_municipios/' . $arc['id_municipio'] . '/' . $arc['archivo']) ?>" target="_blank" type="button" title="<?= $arc['nombre_archivo'] ?>">
                                        <i class="bi bi-folder2-open"></i> Abrir 
                                        </a>
                                    <?php endif ?>
                                </td>
                                <td><?= $arc['palabras_clave']; ?></th>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            </p>
        </div>

    </div>




    <?= view('components/Footer.php'); ?>


    <script src="<?php echo base_url(' public/plugins/jQurey/jquery.min.js') ?>"></script>


    <script>
        new DataTable('#dataTableDocumentos')
    </script>
</body>

</html>