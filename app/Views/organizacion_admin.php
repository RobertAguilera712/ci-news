<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" href="images/gto2.png">
    <title>Organizaciones</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="public/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="public/plugins/ionicons/ionicons.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="<?= base_url('libs/sweet2/dist/sweetalert2.min.css') ?>">

</head>

<body style="background-image: url('images/FONDO.jpg')">
    <?= view('components/NavbarAdmin.php'); ?>

    <div class="container" style=" margin-top: 200px;  margin-left: 104px; margin-bottom: 20px;">
        <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
            <div class="row">
                <button type="button" id="agregarDerecho" class="btn btn-success" data-toggle="modal" data-target="#agregarOrganizacion">Agregar Organización</button>
            </div>
        <?php endif; ?>
    </div>

    <form method="POST" action="<?php echo base_url('organizacionesAdmin/createOrganizacion') ?>" enctype="multipart/form-data">
        <div class="modal fade" id="agregarOrganizacion" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="publicacionTitle">Agregar Organización</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label">Nombre:</label>
                            <input type="text" maxlength="200" class="form-control" name="descripcion" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Descripción:</label>
                            <input type="text" maxlength="555" class="form-control" name="descripcionMas" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Subir PDF:</label>
                            <input id="elegiraArchivo" class="form-control" name="link" id="archivo" type="file" style="color:#4469C5;" /><br />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Seleccione el estatus:</label>
                            <select class="form-select form-control" id="estatus" name="estatus">
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


    <div class="container" id="">
        <div class="row">
            <div class="container-fluid">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="head">
                            <h1 class="text-primary">Lista de Organizaciones</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Link</th>
                                        <th>Estatus</th>
                                        <th>Fecha última modificación</th>
                                        <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                            <th>Editar</th>
                                            <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($directorio as $d) : ?>
                                        <tr>
                                            <td><?= $d['id_directorio'] ?>
                                            <td><?= $d['descripcion']; ?></th>
                                            <td><?= $d['descripcionMas']; ?></th>
                                            <th><?php if ($d['link'] == !null) : ?><a href="<?php echo base_url('documentos_directorio/' . $d['id_directorio'] . '/' . $d['link']) ?>" download="<?php $d['link'] ?>" class="btn btn-success btn-sm">
                                                        Ver documento</a><?php endif ?></th>
                                            <th><?php if ($d['estatus'] == 'A') : ?>
                                                    <h5><span class="badge badge-success">Activo
                                                        <?php endif ?></span></h5>
                                                    <?php if ($d['estatus'] == 'B') : ?>
                                                        <h5><span class="badge badge-danger">Inactivo
                                                            <?php endif ?></span></h5>
                                            </th>
                                            <td><?= $d['fecha_modificacion']; ?></th>
                                            <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th><a href="<?= base_url('organizacionesAdmin/editOrganizacion/' . $d['id_directorio']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a>
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



    <?= view('components/Footer.php'); ?>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</body>


</html>