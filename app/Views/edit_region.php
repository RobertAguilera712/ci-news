<?php
$id = $region[0]->id;
$nombre = $region[0]->nombre;
$municipios_ids = explode(",", trim($region[0]->municipios));
$estatus = $region[0]->estatus;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Categoría</title>
    <link rel="icon" href="<?php echo base_url('images/gto2.png') ?>">
    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url('css/registrate.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/bootstrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('fonts/material-icon/css/material-design-iconic-font.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/footer.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/ionicons/ionicons.min.css') ?>">
</head>

<body>


    <div class="main">

        <section class="signup">
            <!-- <img src="images/FONDO.jpg" alt="juventud"> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="editar" action="" method="POST" enctype="multipart/form-data" class="signup-form">
                        <h2 class="form-title">Editar Región</h2>
                        <div class="form-group">
                            <label class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre ?>" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Seleccionar municipios:</label>
                            <select multiple class="form-select form-control" id="municipios" name="municipios[]" required>
                                <?php foreach ($municipios as $mun) : ?>
                                    <?php $id_municipio = strval($mun['id_municipio']); ?>
                                    <option <?php echo in_array($id_municipio, $municipios_ids) ? "selected" : ""; ?> value="<?= $id_municipio ?>"><?= $mun['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
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