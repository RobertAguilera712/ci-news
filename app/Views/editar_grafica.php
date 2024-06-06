<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Gráfica</title>
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
                    <h2 class="form-title">Editar Gráfica</h2>
                    <form method="POST" id="editar" action="<?php echo base_url("graficas-admin/actualizarGrafica") ?>" method="POST" enctype="multipart/form-data" class="signup-form">
                        <input type="text" id="id_grafica" name="id_grafica" hidden="" value="<?php echo $grafica[0]["id_grafica"] ?>">
                        <div class="form-group">
                            <label class="col-form-label">Título:</label>
                            <input type="text" class="form-control" maxlength="400" name="titulo" required value="<?php echo $grafica[0]["titulo"] ?>"/>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tipo de gráfica:</label>
                            <select onchange="loadOptions(this, event)" class="form-select form-control" name="tipo" id="tipo-grafica" required>
                                <option selected disabled>Seleccione un tipo</option>
                                <option value="column">Barras</option>
                                <option value="area">Área</option>
                                <option value="pie">Pastel</option>
                                <option value="line">Líneas</option>
                            </select>
                        </div>

                        <div id="less-pie" style="display: none;">
                            <div class="form-group">
                                <label class="col-form-label">Leyenda Eje Y:</label>
                                <input type="text" class="form-control" name="leyenda_y" value="<?php echo $grafica[0]["leyenda_y"] ?>"/>
                            </div>
                        </div>

                        <div id="tipo-column" style="display: none;">
                            <div class="form-group">
                                <label class="col-form-label">Leyenda Eje X:</label>
                                <input type="text" class="form-control" name="leyenda_x" value="<?php echo $grafica[0]["leyenda_x"] ?>"/>
                            </div>
                        </div>

                        <div id="tipo-area" style="display: none;">
                            <div class="form-group">
                                <label class="col-form-label">Fecha Inicio:</label>
                                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Fecha Fin:</label>
                                <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Incluir Cero:</label>
                                <select class="form-select form-control" name="incluir_cero">
                                    <option selected disabled>Seleccione</option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Prefijo Eje Y:</label>
                                <input type="text" maxlength="10" class="form-control" name="prefijo" placeholder="Unidad de los datos del eje Y" value="<?php echo $grafica[0]["prefijo"] ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Seleccione el estatus:</label>
                            <select class="form-select form-control" name="estatus" required>
                                <option selected disabled>Seleccione un estatus</option>
                                <option value="A">Activo</option>
                                <option value="B">Inactivo</option>
                            </select>
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
        }else if(mensaje == '2'){
            swal('', 'No se pudo actualizar la gráfica', 'error');
        }
    </script>
    <script>
        function loadOptions(params) {
            var selectBox = document.getElementById('tipo-grafica');
            var area = document.getElementById('tipo-area');
            var column = document.getElementById('tipo-column');
            var lessPie = document.getElementById('less-pie');

            switch (selectBox.value) {
                case 'column':
                    area.style.display = 'none';
                    lessPie.style.display = 'block';
                    column.style.display = 'block';
                    break;
                case 'area':
                    area.style.display = 'block';
                    lessPie.style.display = 'block';
                    column.style.display = 'none';
                    break;
                case 'line':
                    area.style.display = 'none';
                    lessPie.style.display = 'block';
                    column.style.display = 'none';
                    break;
                case 'pie':
                    area.style.display = 'none';
                    lessPie.style.display = 'none';
                    column.style.display = 'none';
                    break;

                default:
                    break;
            }
        }
    </script>
</body>

</html>