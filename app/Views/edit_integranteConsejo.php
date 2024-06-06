<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Integrante</title>
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
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="editar" action="<?php echo base_url("administradorIntegrante/updateIntegrante/") ?>" method="POST" enctype="multipart/form-data" class="signup-form">
                        <h2 class="form-title">Editar Integrante</h2>
                        <input type="text" id="id_integrante" name="id_integrante" hidden value="<?= $integrante->id_integrante ?>">
                        <div class="form-group">
                            <label class="col-form-label">Nombre:</label>
                            <input type="text" class="form-input" name="nombre" id="nombre" value="<?= $integrante->nombre ?>" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Cargo:</label>
<<<<<<< HEAD
                            <input type="text" class="form-input" name="cargo" id="cargo" value="<?= $integrante->cargo ?>" />
=======
                            <input type="text" class="form-control" maxlength="800" id="cargo" name="cargo" value="<?= $integrante->cargo ?>" required></input>
>>>>>>> 81887ee7fab11282fcb26a2a3b80edd02381bf75
                        </div>
                        <!-- <div class="form-group">
                            <label class="col-form-label" for="cargo">Cargo:</label>
                            <select class="form-control" id="cargo" name="cargo" required>
                                <option value="" selected disabled>Seleccione el cargo</option>
                                <option value="Gobernador del Estado">Gobernador del Estado</option>
                                <option value="Director General de JuventudEsGTO">Director General de JuventudEsGTO</option>
                                <option value="Presidente del Consejo Directivo de JuventudEsGTO">Presidente del Consejo Directivo de JuventudEsGTO</option>
                                <option value="Titular de la Secretaría de Gobierno">Titular de la Secretaría de Gobierno</option>
                                <option value="Titular de la Secretaría de Desarrollo Económico Sustentable">Titular de la Secretaría de Desarrollo Económico Sustentable</option>
                                <option value="Titular de la Secretaría de Salud">Titular de la Secretaría de Salud</option>
                                <option value="Titular de la Secretaría de Educación">Titular de la Secretaría de Educación</option>
                                <option value="Director General de la Comisión de Deporte del Estado">Director General de la Comisión de Deporte del Estado</option>
                                <option value="Representante Municipal">Representante Municipal</option>
                                <option value="Representante de la Comisión Estatal para la Planeación de la Educación Media Superior">Representante de la Comisión Estatal para la Planeación de la Educación Media Superior</option>
                                <option value="Representante de la Comisión Estatal para la Planeación de la Educación Superior">Representante de la Comisión Estatal para la Planeación de la Educación Superior</option>
                                <option value="Representante de Organización Juvenil">Representante de Organización Juvenil</option>
                                <option value="Representante del Sector Económico y Productivo">Representante del Sector Económico y Productivo</option>
                                <option value="Representante de Organismo de la Sociedad">Representante de Organismo de la Sociedad</option>
                                <option value="Joven Destacado">Joven Destacado</option>
                            </select>
                        </div> -->

                        <div class="form-group">
                            <label class="col-form-label" for="cargo">Cargo Consejo:</label>
                            <select class="form-control" id="cargo_consejo" name="cargo_consejo" required>
                                <option value="" selected disabled>Seleccione el cargo en el consejo</option>
                                <option value="Presidente">Presidente</option>
                                <option value="Secretario Técnico">Secretario Técnico</option>
                                <option value="Consejero">Consejero</option>
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="importancia">Importancia:</label>
                            <select class="form-control" id="importancia" name="importancia" required>
                                <option value="" selected disabled>Seleccione nivel de importancia</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Subir Imagen que hace referencia al integrante:</label>
                            <input class="form-control" name="imagen" id="imagen" type="file" value="<?= $integrante->imagen ?>" style="color:#4469C5;" /><br />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Seleccione el estatus:</label>
                            <select class="form-select form-control" id="estatus" name="estatus">
                                <?php if ($integrante->estatus == 'A') : ?>
                                    <option selected value="<?= $integrante->estatus ?>">Activo</option>
                                    <option value="B">Inactivo</option>
                                <?php endif ?>
                                <?php if ($integrante->estatus == 'B') : ?>
                                    <option selected value="<?= $integrante->estatus ?>">Inactivo</option>
                                    <option value="A">Activo</option>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="editar" id="editar" class="form-submit" value="Editar" />
                        </div>
                        <center><a class="txt1" href="<?php echo base_url('/sajgAdmin') ?>">
                                <i class="zmdi zmdi-arrow-left"></i> Volver
                            </a></center>
                    </form>
                </div>
            </div>
        </section>

    </div>
    <?= view('components/Footer.php'); ?>


    <!-- JS -->

    

    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';
        if (mensaje == '1') {
            swal('', 'Fallo al crear,  integrante seleccione un documento JPG,JPEG,PNG', 'error');
        }
    </script>
</body>

</html>