<?php 
    $id_apoyos = $datos[0]['id_apoyos'];
    $orden_gobierno = $datos[0]['orden_gobierno'];
    $id_derecho = $datos[0]['id_derecho'];
    $id_tema = $datos[0]['id_tema'];
    $id_dependencia = $datos[0]['id_dependencia'];
    $programa_Social = $datos[0]['programa_Social'];
    $estatus_apoyo = $datos[0]['estatus_apoyo'];
    $año = $datos[0]['año'];
    $objetivo_general = $datos[0]['objetivo_General'];
    $rango_edad = $datos[0]['rango_Edad'];
    $id_tipo_apoyo = $datos[0]['id_tipo_apoyo'];
    $monto_Anual = $datos[0]['monto_Anual'];
    $presupuesto = $datos[0]['presupuesto'];
    $responsable = $datos[0]['responsable'];
    $telefono = $datos[0]['telefono'];
    $pagina_Web = $datos[0]['pagina_Web'];
    $id_normatividad= $datos[0]['id_normatividad'];
    $link_normatividad= $datos[0]['link_normartividad'];
    $poblacion_Objetivo= $datos[0]['poblacion_Objetivo'];
    $correo= $datos[0]['correo'];

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Apoyo y Servicio</title>
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
                    <form method="POST" id="editar" action="<?php echo base_url("apoyosAdmin/updateApoyo/")?>"
                        method="POST" enctype="multipart/form-data" class="signup-form">
                        <h2 class="form-title">Editar Apoyo y Servicio</h2>
                        <input type="text" id="id_apoyos" name="id_apoyos" hidden="" value="<?php echo $id_apoyos ?>">
                        <div class="form-group">
                            <label class="col-form-label">Orden de gobierno:</label>
                            <input type="text" class="form-control" name="orden" id="orden" value="<?php echo $orden_gobierno ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Derecho:</label>
                            <select class="form-select form-control" name="id_derecho" value="<?php echo $id_derecho ?>">
                                <?php foreach($derechoOrdenado as $d):?>
                                <option value="<?=$d['id_derecho'];?>"><?=$d['descripcion'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tema:</label>
                            <select class="form-select form-control" name="tema" value="<?php echo $id_tema ?>">
                                <?php foreach($temaOrdenado as $t):?>
                                <option value="<?=$t['id_tema'];?>"><?=$t['descripcionTema'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Dependencia:</label>
                            <select class="form-select form-control" name="dependencia" value="<?php echo $id_dependencia ?>">
                                <?php foreach($dependenciaOrdenado as $d):?>
                                <option value="<?=$d['id_dependencia'];?>"><?=$d['descripcion_D'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Programa Social:</label>
                            <input class="form-control" name="programa" type="text" value="<?php echo $programa_Social ?>" required />
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Seleccione el estatus:</label>
                        <select class="form-select form-control" id="estatus" name="estatus" value="<?php echo $estatus_apoyo ?>">
                        <?php if($estatus_apoyo =='A'):?>
                            <option selected><?php echo $estatus_apoyo?></option>
                            <option value="B">Inactivo</option>
                        <?php endif ?>
                        <?php if($estatus_apoyo == 'B'):?>
                            <option selected><?php echo $estatus_apoyo?></option>
                            <option value="A">Activo</option>
                            <?php endif ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Año:</label>
                            <input class="form-control" name="año" type="number" value="<?php echo $año ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Objetivo General del Programa Social:</label>
                            <input class="form-control" name="objetivo_general" type="text" value="<?php echo $objetivo_general ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Rango de edad para acceder al apoyo:</label>
                            <input class="form-control" name="rango" type="text"  value="<?php echo $rango_edad ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Población Objetivo:</label>
                            <input class="form-control" name="poblacion" type="text" value="<?php echo $poblacion_Objetivo ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tipo de apoyo:</label>
                            <select class="form-select form-control" name="apoyo" value="<?php echo $id_tipo_apoyo ?>">
                                <?php foreach($apoyoOrdenado as $d):?>
                                <option value="<?=$d['id_tipo_apoyo'];?>"><?=$d['descripcion_A'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Monto anual del apoyo económico:</label>
                            <input class="form-control" name="monto" type="number" value="<?php echo $monto_Anual ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Presupuesto:</label>
                            <input class="form-control" name="presupuesto" type="number" value="<?php echo $presupuesto ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Responsable o Enlace del programa:</label>
                            <input class="form-control" name="responsable" type="text" value="<?php echo $responsable ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Teléfono:</label>
                            <input class="form-control" maxlength="10" name="telefono" value="<?php echo $telefono ?>" type="text" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Correo:</label>
                            <input class="form-control" name="correo" type="email" value="<?php echo $correo ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Página web al programa:</label>
                            <input class="form-control" name="pagina" type="text" value="<?php echo $pagina_Web ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Normatividad:</label>

                            <select class="form-select form-control" name="normatividad" value="<?php echo $id_normatividad ?>">
                                <?php foreach($normatividadOrdenado as $n):?>
                                <option value="<?=$n['id_normatividad'];?>"><?=$n['descripcion_N'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Link a la normatividad:</label>
                            <input class="form-control" name="link" type="text"  value="<?php echo $link_normatividad ?>" required />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="editar" id="editar" class="form-submit" value="Editar" />
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