<?php 
    $id_revista = $revista[0]['id_revista'];
    $volumen = $revista[0]['volumen'];
    $descripcion = $revista[0]['descripcion'];
    $fecha = $revista[0]['fecha'];
    $numero_year = $revista[0]['numero_year'];
    $archivo = $revista[0]['archivo'];
    $estatus = $revista[0]['estatus'];
?>
<!DOCTYPE html>
<html lang="es">
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
            <!-- <img src="images/FONDO.jpg" alt="juventud"> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="editar" action="<?php echo base_url("revistas-admin/actualizarRevista/")?>" method="POST" enctype="multipart/form-data" class="signup-form">
                        <h2 class="form-title">Editar Revista</h2>
                        <input type="text" id="id_revista" name="id_revista" hidden="" 
                            value="<?php echo $id_revista ?>">
                        <div class="form-group">
                        <label class="col-form-label">Volumen:</label> 
                            <input type="number" min="1" maxlength="3" class="form-input" name="volumen" id="volumen" value="<?php echo $volumen?>"/>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Número de Año:</label> 
                            <input type="number" min="1" maxlength="3" class="form-input" name="numero_year" id="numero_year" value="<?php echo $numero_year?>"/>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Fecha:</label> 
                            <input type="date"class="form-input" name="fecha" id="fecha" value="<?php echo $fecha?>"/>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Descripción:</label> 
                            <textarea maxlength="250" class="form-control" name="descripcion" id="descripcion"><?php echo $descripcion?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Subir Portada:</label>
                            <input class="form-control" name="portada" id="portada" type="file" style="color:#4469C5;" /><br />
                            <span id="file-error" style="color:red;"></span>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Subir Archivo:</label>
                            <input class="form-control" name="archivo" id="archivo" type="file" value="<?php echo $archivo?>" style="color:#4469C5;" /><br />
                            <span id="file-error" style="color:red;"></span>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Seleccione el estatus:</label>
                        <select class="form-select form-control" id="estatus" name="estatus"">
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
        const portadaInput = document.getElementById('portada');
        const archivoInput = document.getElementById('archivo');
        const fileError = document.getElementById('file-error');

        portadaInput.addEventListener('change', function() {
            const file = this.files[0];
            const maxSize = 4 * 1024 * 1024; // 4MB in bytes

            if (file && file.size > maxSize) {
                fileError.textContent = 'Tamaño debe ser menor a 4MB.';
                this.value = ''; // Clear the input
            } else {
                fileError.textContent = '';
            }
        });
        archivoInput.addEventListener('change', function() {
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
