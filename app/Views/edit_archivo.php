<?php
$id_archivo = $datos[0]['id_archivo'];
$nombre_archivo = $datos[0]['nombre_archivo'];
$fecha_archivo = $datos[0]['fecha_archivo'];
$id_municipio = $datos[0]['id_municipio'];
$nombre = $datos[0]['nombre'];
$tipo = $datos[0]['tipo_archivo'];
$categoria = $datos[0]['categoria_archivo'];
$palabras = $datos[0]['palabras_clave'];
$archivo = $datos[0]['archivo'];
$estatus_archivo = $datos[0]['estatus_archivo'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Archivo Municipio</title>
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
                    <form method="POST" id="editar" action="<?php echo base_url("municipios-admin/updateArchivo/") ?>" method="POST" enctype="multipart/form-data" class="signup-form">
                        <h2 class="form-title">Editar Archivo</h2>
                        <input type="text" id="id_archivo" name="id_archivo" hidden="" value="<?php echo $id_archivo ?>">
                        <div class="form-group">
                            <label class="col-form-label">Nombre:</label>
                            <p style="color: red;">Escriba un nombre descriptivo, ya que este será mostrado al usuario.</p>
                            <input type="text" class="form-input" name="nombre_archivo" id="nombre_archivo" value="<?php echo $nombre_archivo ?>" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Fecha:</label>
                            <input type="date" class="form-input" name="fecha_archivo" id="fecha_archivo" value="<?php echo $fecha_archivo ?>" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Seleccione el tipo:</label>
                            <select class="form-select form-control " id="tipo_archivo" name="tipo_archivo">
                                <option value="<?php echo $tipo ?>" selected><?php echo $tipo ?></option>
                                <option value="Mapa">Mapa</option>
                                <option value="Tabla">Tabla</option>
                                <option value="Gráfica">Gráfica</option>
                                <option value="Infografía">Infografía</option>
                                <option value="Resultados">Resultados</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Palabras clave:</label>
                            <p style="color: red;">Escriba 3 palabras clave que ayuden a localizar e identificar el archivo.</p>
                            <input value="<?php echo $palabras ?>" type="text" maxlength="55" class="form-control" name="palabras_clave" id="palabras_clave" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Seleccione la categoría:</label>
                            <select class="form-select form-control " id="categoria_archivo" name="categoria_archivo">
                                <option value="<?php echo $categoria ?>" selected><?php echo $categoria ?></option>
                                <option value="Derechos Humanos">Derechos Humanos</option>
                                <option value="Economía">Economía</option>
                                <option value="Educación">Educación</option>
                                <option value="Empleo">Empleo</option>
                                <option value="Familia">Familia</option>
                                <option value="Gobernanza">Gobernanza</option>
                                <option value="Población">Población</option>
                                <option value="Salud">Salud</option>
                                <option value="Seguridad">Seguridad</option>
                                <option value="Tecnología">Tecnología</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Seleccione el municipio:</label>
                            <select class="form-select form-control form-input" name="id_municipio" value="<?= $id_municipio ?>" required>
                                <!-- <option disabled value="<?= $id_municipio ?>"><?php echo $nombre ?></option> -->
                                <?php foreach ($municipios as $t) : ?>
                                    <option  <?php echo $t["id_municipio"] == $id_municipio ? "selected" : ""; ?> value="<?= $t['id_municipio']; ?>"><?= $t['nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Subir Archivo/Estudio:</label>
                            <input class="form-control" name="archivo" id="archivo" type="file" value="<?php echo $archivo ?>" style="color:#4469C5;" /><br />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Seleccione el estatus:</label>
                            <select class="form-select form-control" id="estatus_archivo" name="estatus_archivo">
                                <?php if ($estatus_archivo == 'A') : ?>
                                    <option selected value="A">Activo</option>
                                    <option value="B">Inactivo</option>
                                <?php endif ?>
                                <?php if ($estatus_archivo == 'B') : ?>
                                    <option selected value="B">Inactivo</option>
                                    <option value="A">Activo</option>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="editar" id="editar" class="form-submit" value="Editar" />
                        </div>
                        <center><a class="txt1" href="<?php echo base_url('/municipios-admin') ?>">
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
        }
    </script>
</body>

</html>