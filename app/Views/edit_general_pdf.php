<?php
$id_general = $datos[0]['id_general'];
$nombre = $datos[0]['nombre'];
$id_pdfs = $datos[0]['id_pdfs'];
$pdf = $datos[0]['pdf'];
$estatus = $datos[0]['estatusPdf'];

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar PDF Consejo</title>
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
                    <form method="POST" id="editar" action="<?php echo base_url("administradorSAJG/updateSAJGPDF/") ?>" method="POST" enctype="multipart/form-data" class="signup-form">
                        <h2 class="form-title">Editar PDF Consejo</h2>
                        <input type="text" id="id_pdfs" name="id_pdfs" hidden="" value="<?php echo $id_pdfs ?>">
                        <div class="form-group">
                            <label class="col-form-label">Seleccione el objetivo:</label>
                            <select class="form-select form-control " name="id_general" value="<?php echo $id_general ?>">
                                <?php foreach ($general as $t) : ?>
                                    <option value="<?= $t['id_general']; ?>"><?= $t['obejtivoC']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Nombre:</label>
                            <input class="form-control" name="nombre" type="text" value="<?php echo $nombre ?>" />
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Agregar PDF del Consejo Estatal:</label>
                            <input class="form-control" name="pdf" type="file" style="color:#4469C5;" value="<?php echo $pdf ?>" /><br />
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
                                <?php if ($estatus != 'A' && $estatus != 'B') : ?>
                                    <option selected disabled>Seleccione un estatus</option>
                                    <option value="A">Activo</option>
                                    <option value="B">Inactivo</option>
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
            swal('', 'Fallo al crear, seleccione un documento JPG,JPEG,PNG', 'error');
        } else if (mensaje == '16') {
            swal('', 'Fallo al actualizar, seleccione un documento PDF, DOCX', 'error');
        }
    </script>
</body>

</html>