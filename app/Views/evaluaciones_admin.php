<!DOCTYPE html>
<html lang="es">

<head>
    
    <title>Evaluaciones</title>
    <?= view('components/HeadAdmin.php'); ?>

</head>

<body style="background-image: url('images/FONDO.jpg');  ">

    <?= view('components/NavbarAdmin.php'); ?>

    <div class="container" style=" margin-top: 30vh;  margin-left: 104px; margin-bottom: 20px;">
        <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
            <div class="row">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarEvaluaciones">Agregar Evaluación</button>
            </div>
        <?php endif; ?>
    </div>

    <form method="POST" action="<?php echo base_url('evaluacionAdmin/createEvaluacion') ?>" enctype="multipart/form-data">
        <div class="modal fade" id="agregarEvaluaciones" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="publicacionTitle">Agregar Evaluación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label">Nombre de la evaluación:</label>
                            <input type="text" class="form-control" maxlength="400" name="nombre_evaluacion" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Año:</label>
                            <input type="number" maxlength="4" class="form-control" name="año" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tipo:</label>
                            <input type="text" maxlength="255" class="form-control" name="tipo" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Evaluador:</label>
                            <input type="text" maxlength="255" class="form-control" name="evaluador" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Informe:</label>
                            <input class="form-control" name="informe" type="file" style="color:#4469C5;" /><br />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Seleccione el estatus:</label>
                            <select class="form-select form-control" name="estatus">
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


    <!-- Testimonios-->
    <div class="container" id="search">
        <div class="row">
            <div class="container-fluid">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="head">
                            <h1 class="text-primary">Lista de Evaluaciones</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre de la Evaluación</th>
                                        <th>Año</th>
                                        <th>Tipo</th>
                                        <th>Evaluador</th>
                                        <th>Informe</th>
                                        <th>Estatus</th>
                                        <th>Fecha última modificación</th>
                                        <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                            <th>Editar</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($evaluacion as $e) : ?>
                                        <tr>
                                            <td><?= $e['id_evaluacion'] ?></th>
                                            <td><?= $e['nombre_evaluacion']; ?></th>
                                            <td><?= $e['año']; ?></th>
                                            <td><?= $e['tipo']; ?></th>
                                            <td><?= $e['evaluador']; ?></th>
                                            <th><?php if ($e['informe'] == !null) : ?><a href="<?php echo base_url('documentos_evaluaciones/' . $e['id_evaluacion'] . '/' . $e['informe']) ?>" download="<?php $e['informe'] ?>" class="btn btn-success btn-sm">
                                                        Ver documento</a><?php endif ?></th>
                                            <th><?php if ($e['estatus'] == 'A') : ?>
                                                    <h5><span class="badge text-bg-success">Activo
                                                        <?php endif ?></span></h5>
                                                    <?php if ($e['estatus'] == 'B') : ?>
                                                        <h5><span class="badge text-bg-danger">Inactivo
                                                            <?php endif ?></span></h5>
                                            </th>
                                            <td><?= $e['fecha_modificacion']; ?></th>
                                                <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                            <th><a href="<?= base_url('evaluacionAdmin/editEvaluacion/' . $e['id_evaluacion']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a></th>
                                        <?php endif ?>
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
    
    
    <script src="<?php echo base_url('js/dashboard.js') ?>"></script>
    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';
        if (mensaje == '1') {
            swal('', 'Evaluación agregada con éxito', 'success');
        } else if (mensaje == '2') {
            swal('', 'Evaluación actualizada con éxito', 'success');
        }
    </script>
    <script>
        new DataTable('#dataTable');
    </script>


</body>


</html>