<?php
    $id_evaluacion = $datos[0]['id_evaluacion']; 
    $nombre_evaluacion = $datos[0]['nombre_evaluacion'];
    $año = $datos[0]['año'];
    $tipo = $datos[0]['tipo'];
    $informe = $datos[0]['informe'];
    $evaluador = $datos[0]['evaluador'];
    $estatus = $datos[0]['estatus'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Evaluación</title>
    <link rel="icon" href="<?= base_url("images/gto2.png")?>">
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
            <!-- <img src="images/signup-bg.jpg" alt="juventud"> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="editar" action="<?php echo base_url("evaluacionAdmin/updateEvaluacion")?>" method="POST" enctype="multipart/form-data" class="signup-form">
                        <h2 class="form-title">Editar Evaluación</h2>
                        <input type="text" id="id_evaluacion" name="id_evaluacion" hidden="" 
                            value="<?php echo $id_evaluacion ?>">
                        <div class="form-group">
                        <label class="col-form-label">Nombre de la evalución:</label> 
                            <input type="text" class="form-control" name="nombre_evaluacion" id="nombre_evaluacion" value="<?php echo $nombre_evaluacion?>" required/>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Año:</label>
                            <input type="numeric" maxlength="4" class="form-control" name="año" value="<?php echo $año?>"required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tipo:</label>
                            <input type="text" class="form-control" name="tipo" value="<?php echo $tipo?>" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Evaluador:</label>
                            <input type="text" class="form-control" name="evaluador" value="<?php echo $evaluador?>" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Informe:</label>
                            <input class="form-control" name="informe"  value="<?php echo $informe?>" type="file"
                                style="color:#4469C5;" /><br />
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Seleccione el estatus:</label>
                        <select class="form-select form-control" id="estatus" name="estatus">
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
                            <input type="submit" name="editar" id="editar" class="form-submit" value="Editar"/>
                        </div>
                        <center><a class="txt1" href="<?php echo base_url('/evaluacionAdmin') ?>">
                        <i class="zmdi zmdi-arrow-left"></i> Volver  
						</a></center>
                    </form>
                </div>
            </div>
        </section>

    </div>

    <?= view('components/Footer.php'); ?>


    <!-- JS -->
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
    let mensaje = '<?php echo $mensaje ?>';
    if (mensaje == '1') {
        swal('', 'Fallo al actualizar, seleccione un documento PDF, DOCX', 'error');
    } 
    </script>


</body>
</html>
