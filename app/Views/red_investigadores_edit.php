<!DOCTYPE html>
<html lang="es">

<head>
    <title>Red de investigadores</title>

    <?= view('components/HeadAdmin.php'); ?>
</head>

<body style="background-image: url('images/FONDO.jpg')">

    <?= view('components/NavbarAdmin.php'); ?>

    <section style="margin-top: 30vh;">


        <form method="POST" action="<?php echo base_url('integrantes-investigadores/createInv') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarNInvestigador" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar Integrantes</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Nombre:</label>
                                <input type="text" maxlength="255" class="form-control" name="nombre" id="nombre" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Descripcion:</label>
                                <textarea name="descripcion" maxlength="255" class="form-control" id="descripcion" cols="30" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Subir Imagen que hace referencia al integrante:</label>
                                <input id="elegirImagen" class="form-control" name="imagen" id="imagen" type="file" style="color:#4469C5;" /><br />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estatus:</label>
                                <select class="form-select form-control " id="estatusInvestigador" name="estatusInvestigador">
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


        <!--Tabl de busqueda-->
        <div class="container" id="search">
            <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Lista de Investigadores</h1>
                                <button type="button" id="agregarInvestigador" class="btn btn-success" data-toggle="modal" data-target="#agregarNInvestigador">Agregar
                                    Investigador</button>
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
                                            <th>Imagen</th>
                                            <th>Estatus</th>
                                            <th>Fecha última modificación</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($datos as $d) : ?>
                                            <tr>
                                                <td><?= $d['id_investigadores'] ?>
                                                <td><?= $d['nombre']; ?></th>
                                                <td><?= $d['descripcion']; ?></th>
                                                <th><img src="<?php echo base_url('images_integrantes/' . $d['id_investigadores'] . '/' . $d['imagen']) ?>" width="100" alt="juventud"></th>
                                                <th><?php if ($d['estatus'] == 'A') : ?>
                                                        <h5><span class="badge text-bg-success">Activo
                                                            <?php endif ?></span></h5>
                                                        <?php if ($d['estatus'] == 'B') : ?>
                                                            <h5><span class="badge text-bg-danger">Inactivo
                                                                <?php endif ?></span></h5>
                                                </th>
                                                <td><?= $d['fecha_modificacion']; ?></th>
                                                <th><a href="<?= base_url('integrantes-investigadores/edit/' . $d['id_investigadores']); ?>"><img width="40" height="40" class="edit" src="images/icons/edit.svg"></a>
                                                </th>

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



        <form method="POST" action="<?php echo base_url('objetivos-investigadores/createObj') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarNObjetivo" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar Objetivo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Descripcion:</label>
                                <textarea name="descripcionO" maxlength="555" class="form-control" id="descripcionO" cols="30" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estatus:</label>
                                <select class="form-select form-control" id="estatusO" name="estatusO">
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

        <!--Tabl de busqueda-->
        <div class="container" id="search">
            <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Lista de Objetivos</h1>
                                <button type="button" id="agregarObjetivo" class="btn btn-success" data-toggle="modal" data-target="#agregarNObjetivo">Agregar
                                    objetivo</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableObjetivos" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descripción</th>
                                            <th>Estatus</th>
                                            <th>Fecha última modificación</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($data as $o) : ?>
                                            <tr>
                                                <td><?= $o['id_objetivos'] ?>
                                                <td><?= $o['descripcion']; ?></th>
                                                <th><?php if ($o['estatus'] == 'A') : ?>
                                                        <h5><span class="badge text-bg-success">Activo
                                                            <?php endif ?></span></h5>
                                                        <?php if ($o['estatus'] == 'B') : ?>
                                                            <h5><span class="badge text-bg-danger">Inactivo
                                                                <?php endif ?></span></h5>
                                                </th>
                                                <td><?= $o['fecha_modificacion']; ?></th>
                                                <th><a href="<?= base_url('objetivos-investigadores/edit/' . $o['id_objetivos']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a>
                                                </th>

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


        <form method="POST" action="<?php echo base_url('comisiones-investigadores/createComTrab') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarNComTrabajo" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar Comisiones</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Descripcion:</label>
                                <textarea name="descripcionComisiones" maxlength="555" class="form-control" id="descripcionO" cols="30" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Subir Imagen que hace referencia a la comision:</label>
                                <input id="elegirImagen" class="form-control" name="imagenComisiones" id="imagenComisiones" type="file" style="color:#4469C5;" /><br />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estatus:</label>
                                <select class="form-select form-control" id="estatusComisiones" name="estatusComisiones">
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

        <div class="container" id="search">
            <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Lista de Comisiones</h1>
                                <button type="button" id="agregarComTrabajo" class="btn btn-success" data-toggle="modal" data-target="#agregarNComTrabajo">Agregar
                                    Comisiones</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableComisiones" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Imagen</th>
                                            <th>Descripción</th>
                                            <th>Estatus</th>
                                            <th>Fecha última modificación</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($info as $c) : ?>
                                            <tr>
                                                <td><?= $c['id_comisiones'] ?>
                                                <th><img src="<?php echo base_url('images_comisiones/' . $c['id_comisiones'] . '/' . $c['imagen']) ?>" width="100" alt="juventud"></th>
                                                <td><?= $c['descripcion']; ?></th>
                                                <th><?php if ($c['estatus'] == 'A') : ?>
                                                        <h5><span class="badge text-bg-success">Activo
                                                            <?php endif ?></span></h5>
                                                        <?php if ($c['estatus'] == 'B') : ?>
                                                            <h5><span class="badge text-bg-danger">Inactivo
                                                                <?php endif ?></span></h5>
                                                </th>
                                                <td><?= $c['fecha_modificacion']; ?></th>
                                                <th><a href="<?= base_url('comisiones-investigadores/edit/' . $c['id_comisiones']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a>
                                                </th>

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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';
        if (mensaje == '1') {
            swal('', 'Integrante actualizado con éxito', 'success');
        } else if (mensaje == '2') {
            swal('', 'Integrante creado con éxito', 'success');
        } else if (mensaje == '3') {
            swal('', 'El estatus es requerido', 'error');
        } else if (mensaje == '4') {
            swal('', 'Integrante elimado correctamente', 'success');
        } else if (mensaje == '5') {
            swal('', 'Fallo al actualizar, seleccione un documento JPG,JPEG,PNG', 'error');
        } else if (mensaje == '6') {
            swal('', 'El estatus del objetivo es requerido', 'error');
        } else if (mensaje == '7') {
            swal('', 'Objetivo creado con éxito', 'success');
        } else if (mensaje == '8') {
            swal('', 'Objetivo actualizado con éxito', 'success');
        } else if (mensaje == '9') {
            swal('', 'Objetivo eliminado con éxito', 'success');
        } else if (mensaje == '10') {
            swal('', 'Comisión creada con éxito', 'success');
        } else if (mensaje == '11') {
            swal('', 'Comisión actualizada con éxito', 'success');
        } else if (mensaje == '12') {
            swal('', 'Comisión eliminada con éxito', 'success');
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#dataTableObjetivos').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#dataTableComisiones').DataTable();
        });
    </script>
</body>

</html>