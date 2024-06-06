<?php
$id_documento = $documento[0]['id_documento'];
$titulo = $documento[0]['titulo'];
$clave = $documento[0]['clave'];
$editorial = $documento[0]['editorial'];
$ejemplares = $documento[0]['ejemplares'];
$tipo = $documento[0]['tipo'];
$estatus = $documento[0]['estatus'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Documento Físico</title>
    <link rel="icon" href="<?php echo base_url('images/gto2.png') ?>">
    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url('css/registrate.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/bootstrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('fonts/material-icon/css/material-design-iconic-font.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/footer.css'); ?>">
</head>

<body>


    <div class="main">

        <section class="signup">
            <!-- <img src="images/FONDO.jpg" alt="juventud"> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="editar" action="<?php echo base_url("cendoc/updateDocFisico/") ?>" method="POST" enctype="multipart/form-data" class="signup-form">
                        <h2 class="form-title">Editar Documento</h2>
                        <input type="text" id="id_documento" name="id_documento" hidden="" value="<?php echo $id_documento ?>">
                        <div class="form-group">
                            <label class="col-form-label">Titulo:</label>
                            <input type="text" class="form-input" required name="titulo" id="titulo" value="<?php echo $titulo ?>" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Clave:</label>
                            <input type="text" class="form-control" name="clave" id="clave" value="<?php echo $clave ?>" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Editorial:</label>
                            <input type="text" class="form-control" name="editorial" id="editorial" value="<?php echo $editorial ?>" />
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Seleccione el tipo:</label>
                            <select class="form-select form-control" id="tipo" name="tipo" required>
                                <?php if ($tipo == '') : ?>
                                    <option selected disabled value="">Seleccione una opción</option>
                                <?php endif ?>
                                <option value="Libro">Libro</option>
                                <option value="Revista">Revista</option>
                                <option value="Articulo">Articulo</option>
                                <option value="Manual">Manual</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Ejemplares:</label>
                            <input type="number" min="0" class="form-control" required name="ejemplares" id="ejemplares" value="<?php echo $ejemplares ?>" />
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Seleccione el estatus:</label>
                            <select class="form-select form-control" id="estatus" name="estatus">
                            <?php if ($estatus == 'A') : ?>
                                <option selected value="A">Disponible</option>
                                <option value="B">No disponible</option>
                            <?php endif ?>
                            <?php if ($estatus == 'B') : ?>
                                <option selected value="B">No disponible</option>
                                <option value="A">Disponible</option>
                            <?php endif ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="editar" id="editar" class="form-submit" value="Editar" />
                        </div>
                        <center><a class="txt1" href="<?php echo base_url('/cendoc') ?>">
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
        if (mensaje == '2') {
            swal('', 'Fallo al actualizar, seleccione un documento JPG,JPEG,PNG', 'error');
        } else if (mensaje == '3') {
            swal('', 'Fallo al actualizar, seleccione un documento PDF, DOCX', 'error');
        } else if (mensaje == '4') {
            swal('', 'Fallo al crear, seleccione un documento PDF, DOCX', 'error');
        } else if (mensaje == '5') {
            swal('', 'Fallo al crear, seleccione un documento PDF, DOCX', 'error');
        } else if (mensaje == '6') {
            swal('', 'Fallo al crear, seleccione un tipo de documento', 'error');
        }
    </script>
</body>

</html>