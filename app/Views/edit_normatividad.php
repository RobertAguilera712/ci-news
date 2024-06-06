<?php 
    $id_normatividad = $datos[0]['id_normatividad'];
    $descripcion_N = $datos[0]['descripcion_N'];
    $estatus_N = $datos[0]['estatus_N'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Normatividad</title>
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
                    <form method="POST" id="editar" action="<?php echo base_url("apoyosAdmin/updateNormatividad/")?>" method="POST" enctype="multipart/form-data" class="signup-form">
                        <h2 class="form-title">Editar Normatividad</h2>
                        <input type="text" id="id_normatividad" name="id_normatividad" hidden="" 
                            value="<?php echo $id_normatividad ?>">
                        <div class="form-group">
                        <label class="col-form-label">Descripción:</label> 
                            <input type="text" class="form-control" name="descripcion_N" id="descripcion_N" value="<?php echo $descripcion_N?>"/>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Seleccione el estatus:</label>
                        <select class="form-select form-control" id="estatus_N" name="estatus_N">
                        <?php if($estatus_N =='A'):?>
                            <option selected><?php echo $estatus_N?></option>
                            <option value="B">Inactivo</option>
                        <?php endif ?>
                        <?php if($estatus_N == 'B'):?>
                            <option selected><?php echo $estatus_N?></option>
                            <option value="A">Activo</option>
                            <?php endif ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="editar" id="editar" class="form-submit" value="Editar"/>
                        </div>
                        <center><a class="txt1" href="<?php echo base_url('/apoyosAdmin') ?>">
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
