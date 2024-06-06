<!DOCTYPE html>
<html lang="es">

<head>
    <title>Apoyos y Servicios</title>
    <?= view('components/HeadAdmin.php'); ?>

</head>

<body style="background-image: url('images/FONDO.jpg')">

    <?= view('components/NavbarAdmin.php'); ?>

    <section style="margin-top: 30vh;">

        <!--Apoyos y Servicios-->
        <form method="POST" action="<?php echo base_url('apoyosAdmin/createApoyo') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarPublicacionN" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar Apoyo y Servicios</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Orden de gobierno:</label>
                                <input type="text" maxlength="200" class="form-control" name="orden" id="orden" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Derecho:</label>
                                <select class="form-select form-control" name="id_derecho">
                                    <?php foreach ($derechoOrdenado as $d) : ?>
                                        <option value="<?= $d['id_derecho']; ?>"><?= $d['descripcion']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Tema:</label>
                                <select class="form-select form-control" name="tema">
                                    <?php foreach ($temaOrdenado as $t) : ?>
                                        <option value="<?= $t['id_tema']; ?>"><?= $t['descripcionTema']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Dependencia:</label>
                                <select class="form-select form-control" name="dependencia">
                                    <?php foreach ($dependenciaOrdenado as $d) : ?>
                                        <option value="<?= $d['id_dependencia']; ?>"><?= $d['descripcion_D']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Programa Social:</label>
                                <input class="form-control" maxlength="555" name="programa" type="text" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estatus:</label>
                                <select class="form-select form-control" id="estatus" name="estatus">
                                    <option selected disabled>Seleccione un estatus</option>
                                    <option value="A">Activo</option>
                                    <option value="B">Inactivo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Año:</label>
                                <input class="form-control" name="año" maxlength="4" minlength="4" type="number" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Objetivo General del Programa Social:</label>
                                <input class="form-control" maxlength="555" name="objetivo_general" type="text" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Rango de edad para acceder al apoyo:</label>
                                <input class="form-control" maxlength="255" name="rango" type="text" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Población Objetivo:</label>
                                <input class="form-control" maxlength="555" name="poblacion" type="text" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Tipo de apoyo:</label>
                                <select class="form-select form-control" name="apoyo">
                                    <?php foreach ($apoyoOrdenado as $d) : ?>
                                        <option value="<?= $d['id_tipo_apoyo']; ?>"><?= $d['descripcion_A']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Monto anual del apoyo económico:</label>
                                <input class="form-control" min="1" name="monto" type="number" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Presupuesto:</label>
                                <input class="form-control" min="1" name="presupuesto" type="number" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Responsable o Enlace del programa:</label>
                                <input class="form-control" maxlength="555" name="responsable" type="text" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Teléfono:</label>
                                <input class="form-control" min="1" maxlength="10" minlength="10" name="telefono" type="number" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Correo:</label>
                                <input class="form-control" name="correo" type="email" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Página web al programa:</label>
                                <input class="form-control" name="pagina" type="text" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Normatividad:</label>

                                <select class="form-select form-control" name="normatividad">
                                    <?php foreach ($normatividadOrdenado as $n) : ?>
                                        <option value="<?= $n['id_normatividad']; ?>"><?= $n['descripcion_N']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Link a la normatividad:</label>
                                <input class="form-control" name="link" type="text" />
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>



        <!--Tabl de busqueda-->
        <div class="container">
            <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Lista de Apoyos y Servicios</h1>
                                <?php if ($_SESSION['usuario'] !== 'investigador') : ?>

                                    <button type="button" id="agregarPublicacion" class="btn btn-success" data-toggle="modal" data-target="#agregarPublicacionN">Agregar apoyo y servicio</button>

                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableApoyos" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Orden de gobierno</th>
                                            <th>Derecho</th>
                                            <th>Tema</th>
                                            <th>Dependencia</th>
                                            <th>Programa Social</th>
                                            <th>Estatus</th>
                                            <th>Año</th>
                                            <th>Objetivo General del Programa Social</th>
                                            <th>Población Objetivo</th>
                                            <th>Rango de edad para acceder al apoyo</th>
                                            <th>Tipo de apoyo</th>
                                            <th>Monto anual del apoyo económico</th>
                                            <th>Presupuesto</th>
                                            <th>Responsable o Enlace del programa</th>
                                            <th>Teléfono</th>
                                            <th>Correo</th>
                                            <th>Página web al programa</th>
                                            <th>Normatividad</th>
                                            <th>Link a la normativid</th>
                                            <th>Fecha última modificación</th>
                                            <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th>Editar</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($datos as $d) : ?>
                                            <tr>
                                                <td><?= $d['id_apoyos'] ?>
                                                <td><?= $d['orden_gobierno']; ?></th>
                                                <td><?= $d['descripcion']; ?></th>
                                                <td><?= $d['descripcionTema']; ?></th>
                                                <td><?= $d['descripcion_D'] ?></th>
                                                <td><?= $d['programa_Social'] ?>
                                                <th><?php if ($d['estatus_apoyo'] == 'A') : ?>
                                                        <h5><span class="badge text-bg-success">Activo
                                                            <?php endif ?></span></h5>
                                                        <?php if ($d['estatus_apoyo'] == 'B') : ?>
                                                            <h5><span class="badge text-bg-danger">Inactivo
                                                                <?php endif ?></span></h5>
                                                </th>
                                                <td><?= $d['año']; ?></th>
                                                <td><?= $d['objetivo_General']; ?></th>
                                                <td><?= $d['poblacion_Objetivo']; ?></th>
                                                <td><?= $d['rango_Edad'] ?></th>
                                                <td><?= $d['descripcion_A']; ?></th>
                                                <td><?= $d['monto_Anual']; ?></th>
                                                <td><?= $d['presupuesto']; ?></th>
                                                <td><?= $d['responsable'] ?></th>
                                                <td><?= $d['telefono']; ?></th>
                                                <td><?= $d['correo']; ?></th>
                                                <th><?php if ($d['pagina_Web'] == !null) : ?><a href="<?= $d['pagina_Web']; ?>" target="_blank" class="btn btn-success btn-sm">
                                                            Ver página web</a><?php endif ?></th>
                                                <td><?= $d['descripcion_N']; ?></th>
                                                <th><?php if ($d['link_normartividad'] == !null) : ?><a href="<?= $d['link_normartividad']; ?>" target="_blank" class="btn btn-success btn-sm">
                                                            Ver normatividad</a><?php endif ?></th>
                                                <td><?= $d['fecha_modificacion_AP']; ?></th>
                                                    <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th><a href="<?= base_url('apoyosAdmin/editApoyo/' . $d['id_apoyos']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a>
                                                </th>
                                            <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Derechos -->

        <form method="POST" action="<?php echo base_url('apoyosAdmin/createDerecho') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarDerechoN" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar Derecho</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Descripción:</label>
                                <input type="text" maxlength="200" class="form-control" name="descripcionDerecho" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estatus:</label>
                                <select class="form-select form-control" name="estatusDerecho">
                                    <option selected disabled>Seleccione un estatus</option>
                                    <option value="A">Activo</option>
                                    <option value="B">Inactivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>

        <div class="container">
            <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Lista de Derechos</h1>
                                <?php if ($_SESSION['usuario'] !== 'investigador') : ?>

                                    <button type="button" id="agregarDerecho" class="btn btn-success" data-toggle="modal" data-target="#agregarDerechoN">Agregar Derecho</button>

                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableDerechos" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descripción</th>
                                            <th>Estatus</th>
                                            <th>Fecha última modificación</th>
                                            <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th>Editar</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($derecho as $d) : ?>
                                            <tr>
                                                <td><?= $d['id_derecho'] ?>
                                                <td><?= $d['descripcion']; ?></th>
                                                <th><?php if ($d['estatus'] == 'A') : ?>
                                                        <h5><span class="badge text-bg-success">Activo
                                                            <?php endif ?></span></h5>
                                                        <?php if ($d['estatus'] == 'B') : ?>
                                                            <h5><span class="badge text-bg-danger">Inactivo
                                                                <?php endif ?></span></h5>
                                                </th>
                                                <td><?= $d['fecha_modificacion']; ?></th>
                                                    <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th><a href="<?= base_url('apoyosAdmin/editDerecho/' . $d['id_derecho']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a>
                                                </th>
                                            <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- Dependencias -->
        <form method="POST" action="<?php echo base_url('apoyosAdmin/createDependencia') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarDependenciaN" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar Dependencia</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Descripción:</label>
                                <input type="text" maxlength="200" class="form-control" name="descripcionDependencia" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estatus:</label>
                                <select class="form-select form-control" name="estatusDependencia">
                                    <option selected disabled>Seleccione un estatus</option>
                                    <option value="A">Activo</option>
                                    <option value="B">Inactivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>

        <div class="container">
            <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Lista de Dependencias</h1>
                                <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                    <button type="button" id="agregarDerecho" class="btn btn-success" data-toggle="modal" data-target="#agregarDependenciaN">Agregar Dependencia</button>

                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableDependencias" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descripción</th>
                                            <th>Estatus</th>
                                            <th>Fecha última modificación</th>
                                            <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th>Editar</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($dependencia as $d) : ?>
                                            <tr>
                                                <td><?= $d['id_dependencia'] ?>
                                                <td><?= $d['descripcion_D']; ?></th>
                                                <th><?php if ($d['estatus_D'] == 'A') : ?>
                                                        <h5><span class="badge text-bg-success">Activo
                                                            <?php endif ?></span></h5>
                                                        <?php if ($d['estatus_D'] == 'B') : ?>
                                                            <h5><span class="badge text-bg-danger">Inactivo
                                                                <?php endif ?></span></h5>
                                                </th>
                                                <td><?= $d['fecha_modificacion_D']; ?></th>
                                                    <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th><a href="<?= base_url('apoyosAdmin/editDependencia/' . $d['id_dependencia']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a>
                                                </th>
                                            <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>


                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <form method="POST" action="<?php echo base_url('apoyosAdmin/createTipoApoyo') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarApoyoN" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar Tipo de Apoyo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Descripción:</label>
                                <input type="text" maxlength="200" class="form-control" name="descripcionApoyo" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estatus:</label>
                                <select class="form-select form-control" name="estatusApoyo">
                                    <option selected disabled>Seleccione un estatus</option>
                                    <option value="A">Activo</option>
                                    <option value="B">Inactivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>

        <div class="container">
            <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Lista de Tipo de Apoyo</h1>
                                <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                    <button type="button" id="agregarDerecho" class="btn btn-success" data-toggle="modal" data-target="#agregarApoyoN">Agregar Tipo de Apoyo</button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableTipo" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descripción</th>
                                            <th>Estatus</th>
                                            <th>Fecha última modificación</th>
                                            <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th>Editar</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($apoyo as $a) : ?>
                                            <tr>
                                                <td><?= $a['id_tipo_apoyo'] ?>
                                                <td><?= $a['descripcion_A']; ?></th>
                                                <th><?php if ($a['estatus_A'] == 'A') : ?>
                                                        <h5><span class="badge text-bg-success">Activo
                                                            <?php endif ?></span></h5>
                                                        <?php if ($a['estatus_A'] == 'B') : ?>
                                                            <h5><span class="badge text-bg-danger">Inactivo
                                                                <?php endif ?></span></h5>
                                                </th>
                                                <td><?= $a['fecha_modificacion_A']; ?></th>
                                                    <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th><a href="<?= base_url('apoyosAdmin/editTApoyo/' . $a['id_tipo_apoyo']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a>
                                                </th>
                                            <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- Normatividad -->

        <form method="POST" action="<?php echo base_url('apoyosAdmin/createNormatividad') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarNormatividad" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar Normatividad</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Descripción:</label>
                                <input type="text" maxlength="200" class="form-control" name="descripcion_N" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estatus:</label>
                                <select class="form-select form-control" id="estatus" name="estatus_N">
                                    <option selected disabled>Seleccione un estatus</option>
                                    <option value="A">Activo</option>
                                    <option value="B">Inactivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>

        <div class="container">
            <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Lista de Normatividad</h1>
                                <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                    <button type="button" id="agregarDerecho" class="btn btn-success" data-toggle="modal" data-target="#agregarNormatividad">Agregar Normatividad</button>

                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableNormatividad" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descripción</th>
                                            <th>Estatus</th>
                                            <th>Fecha última modificación</th>
                                            <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th>Editar</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($normatividad as $n) : ?>
                                            <tr>
                                                <td><?= $n['id_normatividad'] ?>
                                                <td><?= $n['descripcion_N']; ?></th>
                                                <th><?php if ($n['estatus_N'] == 'A') : ?>
                                                        <h5><span class="badge text-bg-success">Activo
                                                            <?php endif ?></span></h5>
                                                        <?php if ($n['estatus_N'] == 'B') : ?>
                                                            <h5><span class="badge text-bg-danger">Inactivo
                                                                <?php endif ?></span></h5>
                                                </th>
                                                <td><?= $n['fecha_modificacion_N']; ?></th>
                                                    <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th><a href="<?= base_url('apoyosAdmin/editNormatividad/' . $n['id_normatividad']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a>
                                                </th>
                                            <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <?= view('components/Footer.php'); ?>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    <script src="<?php echo base_url('js/dashboard.js') ?>"></script>
    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';
        if (mensaje == '1') {
            swal('', 'Apoyo y Servicio actualizado con éxito', 'success');
        } else if (mensaje == '2') {
            swal('', 'Apoyo y Servicio creado con éxito', 'success');
        } else if (mensaje == '3') {
            swal('', 'El estatus es requerido', 'error');
        } else if (mensaje == '4') {
            swal('', 'Investigación eliminada correctamente', 'success');
        } else if (mensaje == '5') {
            swal('', 'Derecho creado con éxito', 'success');
        } else if (mensaje == '6') {
            swal('', 'El estatus del derecho es requerido', 'error');
        } else if (mensaje == '7') {
            swal('', 'Dependencia creada con éxito', 'success');
        } else if (mensaje == '8') {
            swal('', 'El estatus de la dependencia es requerido', 'error');
        } else if (mensaje == '9') {
            swal('', 'Tipo de apoyo creado con éxito', 'success');
        } else if (mensaje == '10') {
            swal('', 'El estatus del tipo de apoyo es requerido', 'error');
        } else if (mensaje == '12') {
            swal('', 'Dependencia eliminada correctamente', 'success');
        } else if (mensaje == '13') {
            swal('', 'Tipo de Apoyo eliminado correctamente', 'success');
        } else if (mensaje == '14') {
            swal('', 'Tipo de Apoyo actualizado con éxito', 'success');
        } else if (mensaje == '15') {
            swal('', 'Dependencia actualizada con éxito', 'success');
        } else if (mensaje == '16') {
            swal('', 'Derecho actualizado con éxito', 'success');
        } else if (mensaje == '17') {
            swal('', 'Apoyo y Servicio eliminado con éxito', 'success');
        } else if (mensaje == '18') {
            swal('', 'Normatividad actualizada con éxito', 'success');
        } else if (mensaje == '19') {
            swal('', 'Normatividad creada con éxito', 'success');
        } else if (mensaje == '20') {
            swal('', 'El estatus de la normatividad es requerido', 'error');
        } else if (mensaje == '21') {
            swal('', 'Apoyo y Servicio actualizado con éxito', 'success');
        } else if (mensaje == '22') {
            swal('', 'Organización creada con éxito', 'success');
        } else if (mensaje == '23') {
            swal('', 'El estatus de la organización es requerido', 'error');
        } else if (mensaje == '24') {
            swal('', 'Organización actualizada con éxito', 'success');
        } else if (mensaje == '25') {
            swal('', 'Derecho ya se encuentra registrado', 'error');
        } else if (mensaje == '26') {
            swal('', 'Dependencia ya se encuentra registrada', 'error');
        } else if (mensaje == '27') {
            swal('', 'Tipo de Apoyo ya se encuentra registrado', 'error');
        } else if (mensaje == '28') {
            swal('', 'Normatividad ya se encuentra registrada', 'error');
        }
    </script>
    <script>
        new DataTable('#dataTable');
        new DataTable('#dataTableDerechos');
        new DataTable('#dataTableDependencias');
        new DataTable('#dataTableTipo');
        new DataTable('#dataTableNormatividad');
    </script>
</body>


</html>