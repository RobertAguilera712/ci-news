<?php 
    $id_documento = $datos[0]['id_documento'];
    $nombre_documento = $datos[0]['nombre_documento'];
    $descripcion_documento = $datos[0]['descripcion_documento'];
    $fecha_documento = $datos[0]['fecha_documento'];
    $id_categoria_cendoc = $datos[0]['id_categoria_cendoc'];
    $nombre_categoria_cendoc = $datos[0]['nombre_categoria_cendoc'];
    $archivo_documento = $datos[0]['archivo_documento'];
    $estatus_documento = $datos[0]['estatus_documento'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Investigación</title>
    <link rel="icon" href="<?php echo base_url('images/gto2.png')?>">
    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url('css/registrate.css');?>">
    <link rel="stylesheet" href="<?= base_url('plugins/bootstrap/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('fonts/material-icon/css/material-design-iconic-font.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('css/footer.css');?>">
</head>
<body>
    

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt="juventud"> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="editar" action="<?php echo base_url("cendoc/updateDoc/")?>" method="POST" enctype="multipart/form-data" class="signup-form">
                        <h2 class="form-title">Editar Documento</h2>
                        <input type="text" id="id_documento" name="id_documento" hidden="" 
                            value="<?php echo $id_documento ?>">
                        <div class="form-group">
                        <label class="col-form-label">Nombre:</label> 
                            <input type="text" class="form-input" name="nombre_documento" id="nombre_documento" value="<?php echo $nombre_documento?>"/>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Fecha:</label> 
                            <input type="date"class="form-input" name="fecha_documento" id="fecha_documento" value="<?php echo $fecha_documento?>"/>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Seleccione el tema:</label> 
                            <select class="form-select form-control form-input" name="id_categoria_cendoc"  value="<?= $id_categoria_cendoc ?>" required>
                                <option disabled value="<?= $id_categoria_cendoc ?>"  ><?php echo $nombre_categoria_cendoc?></option>
                                <?php foreach($tema as $t):?>
                                    <option value="<?=$t['id_categoria_cendoc'];?>"><?=$t['nombre_categoria_cendoc'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Descripción:</label> 
                            <input type="text" class="form-control" name="descripcion_documento" id="descripcion_documento" value="<?php echo $descripcion_documento?>"/>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Subir Archivo/Estudio:</label>
                            <input class="form-control" name="archivo_documento" id="archivo_documento" type="file" value="<?php echo $archivo_documento?>" style="color:#4469C5;" /><br />
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Seleccione el estatus_documento:</label>
                        <select class="form-select form-control" id="estatus_documento" name="estatus_documento"">
                        <?php if($estatus_documento =='A'):?>
                            <option selected value="A">Activo</option>
                            <option value="B">Inactivo</option>
                        <?php endif ?>
                        <?php if($estatus_documento == 'B'):?>
                            <option selected value="B">Inactivo</option>
                            <option value="A">Activo</option>
                            <?php endif ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="editar" id="editar" class="form-submit" value="Editar"/>
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
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';
        if(mensaje =='2'){
            swal('','Fallo al actualizar, seleccione un documento JPG,JPEG,PNG','error');
        }else if (mensaje == '3'){
            swal('','Fallo al actualizar, seleccione un documento PDF, DOCX','error');
        }else if (mensaje == '4'){
            swal('','Fallo al crear, seleccione un documento PDF, DOCX','error');
        }else if (mensaje == '5'){
            swal('','Fallo al crear, seleccione un documento PDF, DOCX','error');
        }
    </script>
</body>
</html>
