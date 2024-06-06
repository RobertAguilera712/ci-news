<?php 
    $id_testimonios = $datos[0]['id_testimonios'];
    $imagenT = $datos[0]['imagenT'];
    $nombreT = $datos[0]['nombreM'];
    $descripcion =$datos[0]['descripcion'];
    $id_municipio = $datos[0]['id_municipio'];
    $nombre = $municipio[0]['nombre'];
    $correo = $datos[0]['correo'];
    $telefono = $datos[0]['telefono'];
    $estatus = $datos[0]['estatus'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Testimonio</title>
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
                    <form method="POST" id="editar" action="<?php echo base_url("encuesta/updateTestimonio/")?>"
                        method="POST" enctype="multipart/form-data" class="signup-form">
                        <h2 class="form-title">Editar Testimonio</h2>
                        <input type="text" id="id_testimonios" name="id_testimonios" hidden=""
                            value="<?php echo $id_testimonios ?>">
                        <div class="form-group">
                            <label class="col-form-label">Nombre Completo:</label>
                            <input type="text" class="form-control" name="nombreT" value="<?php echo $nombreT ?>"
                                required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Correo:</label>
                            <input type="email" value="<?php echo $correo ?>" class="form-control" name="correo" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Teléfono:</label>
                            <input type="numeric" maxlength="10" value="<?php echo $telefono ?>" class="form-control" name="telefono" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Descripción:</label>
                            <textarea required type="text" name="descripcionT" class="form-control" rows="10"
                                cols="50"><?php echo $descripcion ?></textarea>

                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Seleccione un Municipio:</label>
                            <select class="form-select form-control form-input" name="municipioId" required>
                                <option selected value="<?= $id_municipio ?>"><?php echo $nombre?></option>
                                <?php foreach($municipios as $t):?>
                                <option value="<?=$t['id_municipio'];?>"><?=$t['nombre'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Subir Imagen:</label>
                            <input class="form-control" name="imagenT" type="file" value="<?php echo $imagenT?>"
                                style="color:#4469C5;" /><br />
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Seleccione el estatus:</label>
                        <select class="form-select form-control" name="estatus">
                        <?php if($estatus =='A'):?>
                            <option selected value="A">Activo</option>
                            <option value="B">Inactivo</option>
                        <?php endif ?>
                        <?php if($estatus == 'B'):?>
                            <option selected value="B">Inactivo</option>
                            <option value="A">Activo</option>
                            <?php endif ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="editar" id="editar" class="form-submit" value="Editar" />
                        </div>
                        <center><a class="txt1" href="<?php echo base_url('/testimoniosAdmin') ?>">
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
        swal('', 'Fallo al crear,  el testimonio seleccione un documento JPG,JPEG,PNG', 'error');
    }
    </script>
</body>

</html>