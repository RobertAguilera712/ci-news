<?php 
    $id_revista = $articulo[0]['id_revista'];
    $id_articulo = $articulo[0]['id_articulo'];
    $titulo = $articulo[0]['titulo'];
    $contenido = $articulo[0]['contenido'];
    $autor = $articulo[0]['autor'];
    $imagen = $articulo[0]['imagen'];
    $estatus = $articulo[0]['estatus'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Artículo</title>
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
            <!-- <img src="images/FONDO.jpg" alt="juventud"> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="editar" action="<?php echo base_url("revistas-admin/actualizarArticuloRevista/")?>" method="POST" enctype="multipart/form-data" class="signup-form">
                        <h2 class="form-title">Editar Artículo</h2>
                        <input type="text" id="id_articulo" name="id_articulo" hidden="" 
                            value="<?php echo $id_articulo ?>">
                        <div class="form-group">
                        <label class="col-form-label">Título:</label> 
                            <input type="text" maxlength="255" class="form-input" name="titulo" id="titulo" value="<?php echo $titulo?>"/>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Autor:</label> 
                            <input type="text"class="form-input" name="autor" id="autor" value="<?php echo $autor?>"/>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Contenido:</label> 
                            <textarea class="form-control" name="contenido" id="contenido"><?php echo $contenido?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Subir Imagen:</label>
                            <input class="form-control" name="imagen" id="imagen" type="file" value="<?php echo $imagen?>" style="color:#4469C5;" /><br />
                            <span id="file-error" style="color:red;"></span>
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
                        <center><a class="txt1" href="<?php echo base_url('/revistas-admin') ?>">
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
        if(mensaje =='2'){
            swal('','Fallo al actualizar, seleccione una imagen JPG,JPEG,PNG','error');
        }else if (mensaje == '3'){
            swal('','Fallo al actualizar, seleccione un documento PDF, DOCX','error');
        }
    </script>

<script>
        const imagenInput = document.getElementById('imagen');
        const fileError = document.getElementById('file-error');

        imagenInput.addEventListener('change', function() {
            const file = this.files[0];
            const maxSize = 4 * 1024 * 1024; // 4MB in bytes

            if (file && file.size > maxSize) {
                fileError.textContent = 'Tamaño debe ser menor a 4MB.';
                this.value = ''; // Clear the input
            } else {
                fileError.textContent = '';
            }
        });
    </script>
</body>
</html>
