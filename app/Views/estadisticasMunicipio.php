<?php
$id_municipio46 = $municipios[46]['id_municipio'];
$nombreMunicipio = $municipio[0]['nombre'];
$pdfG = $municipios[46]['pdf'];
$pdf = $municipios[46]['pdf'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title><?= $nombreMunicipio ?></title>

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
            <h1 class="display-4" style="margin-top: -50px;"><?= $nombreMunicipio ?></h1>
            <p class="lead">
            <div class="table-responsive">
                <table id="dataTableDocumentos" class="table table-bordered" width="100%">
                    <thead>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Categoría</th>
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
                                <td><?= $arc['categoria_archivo']; ?></th>
                                <td><?= $arc['tipo_archivo']; ?></th>
                                <td><?php if ($arc['archivo'] == !null) : ?>
                                        <a class="btn btn-success btn-sm" style="margin: 0 auto 0 auto;" href="<?php echo base_url('documentos_municipios/' . $idMunicipio . '/' . $arc['archivo']) ?>" target="_blank" type="button" title="<?= $arc['nombre_archivo'] ?>">
                                            <i class="bi bi-folder2-open"></i> Abrir
                                        </a>
                                    <?php endif ?>
                                </td>
                                <td><?= $arc['palabras_clave']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php foreach ($datos as $d) : ?>
                            <tr>
                                <td>Estadísticas generales</th>
                                <td>2021-03-10</th>
                                <td>Población</th>
                                <td>Infografía</th>
                                <td>
                                    <?php if ($d['pdf'] !== null) : ?>
                                        <a class="btn btn-success btn-sm" style="margin: 0 auto 0 auto;" href="<?php echo base_url('documentos_municipios/' . $d['id_municipio'] . '/' . $d['pdf']) ?>" target="_blank" type="button" title="Estadísticas generales">
                                            <i class="bi bi-folder2-open"></i> Abrir
                                        </a>
                                    <?php endif; ?>
                                </td>
                                <td>Demografía, Discapacidad, Familia, Bienes, Educación, Economía, Migración</td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            </p>
        </div>

    </div>
    <!--     
    <section style="margin-top: 5%;">
        <h2 class="card-title" style="margin-left: 110px;">Estadísticas generales</h2>
        <div class="wow animated animate__fadeInLeft box1" style="animation-duration: 2s;">
            <?php foreach ($datos as $d) : ?>
                <?php if ($d['pdf'] !== null) : ?>
                    <embed src="<?php echo base_url('documentos_municipios/' . $d['id_municipio'] . '/' . $d['pdf']) ?>" style="margin-left: 110px;" width="80%" height="650px">
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section> -->
    <br><br><br>




    <?= view('components/Footer.php'); ?>


    <script src="<?php echo base_url(' public/plugins/jQurey/jquery.min.js') ?>"></script>


    <script>
        // new DataTable('#dataTableDocumentos')
        $(document).ready(function() {
            new DataTable('#dataTableDocumentos', {
                "order": [
                    [1, "desc"]
                ]
            });
        });
    </script>
</body>

</html>