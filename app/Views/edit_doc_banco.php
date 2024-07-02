<?php
$id = $doc['id'];
$id_categoria = $doc['id_categoria'];
$id_subcategoria = $doc['id_subcategoria'];
$id_municipio = $doc['id_municipio'];
$id_estado = $doc['id_estado'];
$id_region = $doc['id_region'];
$nombre = $doc['nombre'];
$palabras_clave = $doc['palabras_clave'];
$autor = $doc['autor'];
$dependencia = $doc['dependencia'];
$pais = $doc['pais'];
$fecha = $doc['fecha'];
$dia = $doc['dia'];
$mes = $doc['mes'];
$anio = $doc['anio'];
$estatus = $doc['estatus'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Documento banco de datos</title>
    <link rel="icon" href="<?php echo base_url('images/gto2.png') ?>">
    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url('css/registrate.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/bootstrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('fonts/material-icon/css/material-design-iconic-font.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/footer.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/ionicons/ionicons.min.css') ?>">

    <!-- htmx -->
    <script src="https://unpkg.com/htmx.org@2.0.0" integrity="sha384-wS5l5IKJBvK6sPTKa2WZ1js3d947pvWXbPJ1OmWfEuxLgeHcEbjUUA5i9V5ZkpCw" crossorigin="anonymous"></script>
</head>

<body>


    <div class="main">

        <section class="signup">
            <!-- <img src="images/FONDO.jpg" alt="juventud"> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="editar" action="" method="POST" enctype="multipart/form-data" class="signup-form">
                        <h2 class="form-title">Editar Categoría Banco Datos</h2>
                        <div class="form-group">
                            <label class="col-form-label">Nombre:</label>
                            <input value="<?= $nombre ?>" type="text" class="form-control" maxlength="255" name="nombre" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Autor:</label>
                            <input value="<?= $autor ?>" type="text" class="form-control" maxlength="255" name="autor" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Dependencia:</label>
                            <input value="<?= $dependencia ?>" type="text" class="form-control" maxlength="255" name="dependencia" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">País:</label>
                            <input value="<?= $pais ?>" type="text" class="form-control" maxlength="255" name="pais" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Palabras clave:</label>
                            <input value="<?= $palabras_clave ?>" type="text" class="form-control" maxlength="255" name="palabras_clave" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Fecha:</label>
                            <input value="<?= $fecha ?>" type="date" class="form-control" name="fecha"/>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Día:</label>
                            <input value="<?= $dia ?>" type="number" class="form-control" name="dia" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Mes:</label>
                            <input value="<?= $mes ?>" type="number" class="form-control" name="mes" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Año:</label>
                            <input value="<?= $anio ?>" type="number" class="form-control" name="anio" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Seleccionar categoría:</label>
                            <select class="form-select form-control" id="id_categoria" name="id_categoria" required hx-get="/banco-datos/get-subcategorias" hx-target="#id_subcategoria" hx-trigger="change">
                                <option value="" selected>Seleccionar categoría</option>
                                <?php foreach ($categorias as $cat) : ?>
                                    <?php if ($cat['estatus'] == 'A') : ?>
                                        <option <?php echo $cat["id"] == $id_categoria ? "selected" : ""; ?> value="<?= $cat['id'] ?>"><?= $cat['nombre'] ?></option>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Seleccionar subcategoría:</label>
                            <select class="form-select form-control" id="id_subcategoria" name="id_subcategoria" required>
                                <?php foreach ($subcategorias as $sub) : ?>
                                    <?php if ($sub->estatus == 'A') : ?>
                                        <option <?php echo $sub->id == $id_subcategoria ? "selected" : ""; ?> value="<?= $sub->id ?>"><?= $sub->nombre ?></option>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Seleccionar municipio:</label>
                            <select class="form-select form-control" id="id_municipio" name="id_municipio">
                                <label class="col-form-label">Seleccionar municipio</label>
                                <option value="" selected>Seleccionar municipio</option>
                                <?php foreach ($municipios as $mun) : ?>
                                    <option <?php echo $mun["id_municipio"] == $id_municipio ? "selected" : ""; ?> value="<?= $mun['id_municipio'] ?>"><?= $mun['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Seleccionar región:</label>
                            <select class="form-select form-control" id="id_region" name="id_region">
                                <label class="col-form-label">Seleccionar región</label>
                                <option value="" selected>Seleccionar region</option>
                                <?php foreach ($regiones as $reg) : ?>
                                    <option <?php echo $reg->id == $id_region ? "selected" : ""; ?> value="<?= $reg->id ?>"><?= $reg->nombre ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Seleccionar estado:</label>
                            <select class="form-select form-control" id="id_estado" name="id_estado">
                                <option value="" selected>Seleccionar estado</option>
                                <?php foreach ($estados as $est) : ?>
                                    <option <?php echo $est["id_estado"] == $id_estado ? "selected" : ""; ?> value="<?= $est['id_estado'] ?>"><?= $est['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Subir Archivo:</label>
                            <input class="form-control" name="archivo_documento" id="archivo_documento" type="file" style="color:#4469C5;" /><br />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Seleccione el estatus:</label>
                            <select class="form-select form-control" id="estatus" name="estatus">
                                <?php if ($estatus == 'A') : ?>
                                    <option selected value="A">Activo</option>
                                    <option value="B">Inactivo</option>
                                <?php endif ?>
                                <?php if ($estatus == 'B') : ?>
                                    <option selected value="B">Inactivo</option>
                                    <option value="A">Activo</option>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="editar" id="editar" class="form-submit" value="Editar" />
                        </div>
                        <center><a class="txt1" href="<?php echo base_url('/banco-datos') ?>">
                                <i class="zmdi zmdi-arrow-left"></i> Volver
                            </a></center>
                    </form>
                </div>
            </div>
        </section>

    </div>

    <?= view('components/Footer.php'); ?>

    <!-- JS -->




</body>

</html>