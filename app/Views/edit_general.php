<?php 
    $id_general = $datos[0]['id_general'];
    $objetivoS = $datos[0]['objetivoS'];
    $significado = $datos[0]['significado'];
    $objetivoSI = $datos[0]['objetivoSI'];
    $significadoSI = $datos[0]['significadoSI'];
    $objetivoAF = $datos[0]['objetivoAF'];
    $significadoAF = $datos[0]['significadoAF'];
    $obejtivoC = $datos[0]['obejtivoC'];
    $objetivoP = $datos[0]['objetivoP'];
    $contruccion = $datos[0]['contruccion'];
    $estatus = $datos[0]['estatus'];
    $imagenPrograma = $datos[0]['imagenPrograma'];
    $imagenConsejo = $datos[0]['imagenConsejo'];

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Información General</title>
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
                    <form method="POST" id="editar" action="<?php echo base_url("administradorSAJG/updateSAJG/")?>"
                        method="POST" enctype="multipart/form-data" class="signup-form">
                        <h2 class="form-title">Editar Información General</h2>
                        <input type="text" id="id_general" name="id_general" hidden=""
                            value="<?php echo $id_general ?>">
                        <div class="form-group">
                            <label class="col-form-label">Objetivo del Sistema de desarrollo y atencion a las
                                juventudes del Estado
                                de Guanajuato:</label>
                            <input type="text" class="form-control" name="objetivoS" value="<?php echo $objetivoS?>"
                                required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">¿Qué es el Sistema de desarrollo y atencion a las juventudes
                                del Estado
                                de Guanajuato:</label>
                            <input type="text" class="form-control" name="significado" cols="30" rows="3"
                                value="<?php echo $significado?>" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Objetivo del Consejo Estatal:</label>
                            <input type="text" class="form-control" name="objetivoC" cols="30" rows="3"
                                value="<?php echo $obejtivoC?>" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Agregar Imagen del Consejo Estatal:</label>
                            <input class="form-control" name="imagenConsejo" type="file" style="color:#4469C5;"
                                value="<?php echo $imagenConsejo?>" /><br />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Objetivo del programa estatal para el desarrollo y atención al
                                as juventudes del estado guanajuato:</label>
                            <input type="text" class="form-control" name="objetivoP" cols="30" rows="3"
                                value="<?php echo $objetivoP?>" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">¿Cómo se construyo el Programa Estatal?:</label>
                            <input type="text" class="form-control" name="contruccion" cols="30" rows="3"
                                value="<?php echo $contruccion?>" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Agregar Imagen del Programa Estatal:</label>
                            <input class="form-control" name="imagenPrograma" type="file"
                                value="<?php echo $imagenPrograma?>" style="color:#4469C5;" /><br />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">¿Qué es el Sistema de Información e Investigación para el Desarrollo y Atención a las
                                    Juventudes del Estado de Guanajuato?:</label>
                            <input type="text" class="form-control" name="significadoSI" cols="30" rows="3"
                                value="<?php echo $significadoSI?>" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Objetivo del Sistema de Información e Investigación para el Desarrollo y Atención a las
                                    Juventudes del Estado de Guanajuato:</label>
                            <input type="text" class="form-control" name="objetivoSI" cols="30" rows="3"
                                value="<?php echo $objetivoSI?>" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">¿Qué es el Sistema Único de Becas?:</label>
                            <input type="text" class="form-control" name="significadoAF" cols="30" rows="3"
                                value="<?php echo $significadoAF?>" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Objetivo del Sistema Único de Becas:</label>
                            <input type="text" class="form-control" name="objetivoAF" cols="30" rows="3"
                                value="<?php echo $objetivoAF?>" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Seleccione el estatus:</label>
                            <select class="form-select form-control" id="estatus" name="estatus">
                                <?php if($estatus =='A'):?>
                                <option selected><?php echo $estatus?></option>
                                <option value="B">Inactivo</option>
                                <?php endif ?>
                                <?php if($estatus == 'B'):?>
                                <option selected><?php echo $estatus?></option>
                                <option value="A">Activo</option>
                                <?php endif ?>
                                <?php if ($estatus != 'A' && $estatus != 'B') : ?>
                                    <option selected disabled>Seleccione un estatus</option>
                                    <option value="A">Activo</option>
                                    <option value="B">Inactivo</option>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="editar" id="editar" class="form-submit" value="Editar" />
                        </div>
                        <center><a class="txt1" href="<?php echo base_url('/sajgAdmin') ?>">
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
    if (mensaje == '1') {
        swal('', 'Fallo al crear,  integrante seleccione un documento JPG,JPEG,PNG', 'error');
    } else if (mensaje == '15') {
        swal('', 'Fallo al actualizar, la informción general seleccione un documento JPG,JPEG,PNG', 'error');
    } else if (mensaje == '16') {
        swal('', 'Fallo al actualizar, seleccione un documento PDF, DOCX', 'error');
    }
    </script>
</body>

</html>