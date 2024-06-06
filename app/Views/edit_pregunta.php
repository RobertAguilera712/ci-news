<?php 
    $id_pregunta = $datos[0]['id_pregunta'];
    $pregunta = $datos[0]['pregunta'];
    $estatus = $datos[0]['estatusP'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Pregunta</title>
    <link rel="icon" href="<?php echo base_url('images/gto2.png')?>">
    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url('css/registrate.css');?>">
    <link rel="stylesheet" href="<?= base_url('plugins/bootstrap/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('fonts/material-icon/css/material-design-iconic-font.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('css/footer.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/ionicons/ionicons.min.css')?>">
</head>

<body>


    <div class="main">

        <section class="signup">
            <!-- <img src="images/FONDO.jpg" alt="juventud"> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="editar" action="<?php echo base_url("encuesta/updatePregunta/")?>" method="POST"
                        class="signup-form">
                        <h2 class="form-title">Editar Pregunta</h2>
                        <input type="text" id="id_pregunta" name="id_pregunta" hidden=""
                            value="<?php echo $id_pregunta ?>">
                        <div class="form-group">
                            <label class="col-form-label">Pregunta:</label>
                            <input type="text" class="form-control" name="pregunta" id="nombre"
                                value="<?php echo $pregunta?>" requred />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Seleccione el estatus:</label>
                            <select class="form-select form-control" id="estatus" name="estatus"">
                        <?php if($estatus =='A'):?>
                            <option selected><?php echo $estatus?></option>
                            <option value='B'>Inactivo</option>
                                <?php endif ?>
                                <?php if($estatus == 'B'):?>
                                <option selected><?php echo $estatus?></option>
                                <option value='A'>Activo</option>
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
                        <center><a class="txt1" href="<?php echo base_url('/encuestas-admin') ?>">
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
        swal('', 'Fallo al crear,  la comision seleccione un documento JPG,JPEG,PNG', 'error');
    }
    </script>
</body>

</html>