<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Datos</title>
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
                    <h2 class="form-title">Editar Datos Gráfica</h2>
                    <br>
                    <h5 class="form-title"><?php echo $grafica[0]["titulo"] ?></h5>
                    <h5 class="form-title">
                        <?php switch ($grafica[0]['tipo']):
                            case 'column': ?>
                                Barras
                                <?php break; ?>
                            <?php
                            case 'area': ?>
                                Área
                                <?php break; ?>
                            <?php
                            case 'pie': ?>
                                Pastel
                                <?php break; ?>
                            <?php
                            case 'line': ?>
                                Líneas
                                <?php break; ?>
                        <?php endswitch; ?>
                    </h5>
                    <h5 class="form-title"><?php echo $grafica[0]["leyenda_x"] ?></h5>
                    <h5 class="form-title"><?php echo $grafica[0]["leyenda_x"] ?></h5>
                    <h5 class="form-title"><?php echo $grafica[0]["prefijo"] ?></h5>
                    <h5 class="form-title">
                        <?php if ($grafica[0]["incluir_cero"] == '0') : ?>
                            No
                        <?php endif ?>
                        <?php if ($grafica[0]["incluir_cero"] == '1') : ?>
                            Si
                        <?php endif ?>
                    </h5>
                    <h5 class="form-title"><?php echo $grafica[0]["fecha_inicio"] ?></h5>
                    <h5 class="form-title"><?php echo $grafica[0]["fecha_fin"] ?></h5>
                    <h5 class="form-title">
                        <?php if ($grafica[0]["estatus"] == 'A') : ?>
                            Activo
                        <?php endif ?>
                        <?php if ($grafica[0]["estatus"] == 'B') : ?>
                            Inactivo
                        <?php endif ?>
                    </h5>
                    <p style="color: red;">Antes de subir el archivo, asegúrese de que el archivo se de extensión csv, que no contenga encabezados y que el orden de las columnas sea el siguiente:</p>
                    <?php if ($grafica[0]["tipo"] == 'area') : ?>
                        <p style="color: red;">Dato X(aaa-mm-dd), Dato Y, Texto</p>
                    <?php else : ?>
                        <p style="color: red;"> Dato Y, Texto</p>
                    <?php endif ?>

                    <form method="POST" id="editar" action="<?php echo base_url("graficas-admin/actualizarDatosGrafica") ?>" method="POST" enctype="multipart/form-data" class="signup-form">
                        <input type="text" id="id_grafica" name="id_grafica" hidden="" value="<?php echo $grafica[0]["id_grafica"] ?>">
                        <div class="form-group">
                            <label class="col-form-label">Subir Archivo CSV:</label>
                            <input class="form-control" name="archivo" id="archivo" type="file" style="color:#4469C5;" /><br />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="editar" id="editar" class="form-submit" value="Agregar Datos" />
                        </div>
                    </form>
                    <center><a class="txt1" href="<?php echo base_url('/graficas-admin') ?>">
                            <i class="zmdi zmdi-arrow-left"></i> Volver
                        </a></center>
                </div>
            </div>
        </section>


    </div>

    <?= view('components/Footer.php'); ?>

    <!-- JS -->

    

    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';
        if (mensaje == '1') {
            swal('', 'Gráfica agregada con éxito', 'success');
        } else if (mensaje == '2') {
            swal('', 'No se actualizaron los datos', 'error');
        }
    </script>
</body>

</html>