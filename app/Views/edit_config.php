<?php
    $id = $interfaz[0]['id_config'];
    $nombre = $interfaz[0]['nombre'];
    $archivo = $interfaz[0]['archivo'];
    $estatus = $interfaz[0]['estatus'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Configuración</title>
    <link rel="icon" href="<?php echo base_url('images/gto.png')?>">
    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url('css/registrate.css');?>">
    <link rel="stylesheet" href="<?= base_url('plugins/bootstrap/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('fonts/material-icon/css/material-design-iconic-font.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('css/footer.css');?>">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    

    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="editar" action="<?php echo base_url("configs/updateConfig/")?>" method="POST" enctype="multipart/form-data" class="signup-form">
                        <h2 class="form-title">Editar Archivo</h2>
                        <input type="text" id="id" name="id" hidden="" 
                            value="<?php echo $id ?>">
                        <div class="form-group">
                        <label class="col-form-label">Nombre:</label> 
                            <input type="text" class="form-input" name="nombre" id="nombre" value="<?php echo $nombre?>"/>
                        </div>
                        

                        <div class="form-group">
                            <label class="col-form-label">Subir Archivo:</label>
                            <input class="form-control" name="archivo" id="archivo" type="file" value="<?php echo $archivo?>" style="color:#4469C5;" /><br />
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
                        <center><a class="txt1" href="<?php echo base_url('/administrador') ?>">
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
        if(mensaje =='1'){
            swal('','Fallo al actualizar, seleccione un documento JPG,JPEG,PNG','error');
        }else if (mensaje == '2'){
            swal('','Fallo al actualizar, seleccione un documento PDF, DOCX','error');
        }else if (mensaje == '3'){
            swal('','Fallo al crear, seleccione un documento PDF, DOCX','error');
        }else if (mensaje == '4'){
            swal('','Fallo al crear, seleccione un documento PDF, DOCX','error');
        }
    </script>
</body>
</html>
