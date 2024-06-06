<!DOCTYPE html>
<html lang="es">

<head>

    <title>Encuestas</title>
    <?= view('components/HeadAdmin.php'); ?>
</head>

<body style="background-image: url('images/FONDO.jpg');  ">

    <?= view('components/NavbarAdmin.php'); ?>

    <section style="margin-top: 30vh;">
        <!--Modal Agregar nueva encuesta-->
        <form method="POST" action="<?php echo base_url('encuesta/create') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarNPublicacion" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar Encuesta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Seleccione la pregunta:</label>
                                <select class="form-select form-control" name="id_pregunta">
                                    <?php foreach ($pregunta as $p) : ?>
                                        <option value="<?= $p['id_pregunta']; ?>"><?= $p['pregunta']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Respuesta No° 1:</label>
                                <input type="text" maxlength="255" class="form-control" name="respuesta1" id="nombre" requred />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Respuesta No° 2:</label>
                                <input type="text" maxlength="255" class="form-control" name="respuesta2" id="nombre" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Respuesta No° 3:</label>
                                <input type="text" maxlength="255" class="form-control" name="respuesta3" id="nombre" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Respuesta No° 4:</label>
                                <input type="text" maxlength="255" class="form-control" name="respuesta4" id="nombre" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Fecha Inicio:</label>
                                <input type="date" maxlength="255" class="form-control" name="fecha_inicio" id="año" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Fecha Fin:</label>
                                <input type="date" class="form-control" name="fecha_fin" id="año" required />
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

        <!--Tabl de busqueda-->
        <div class="container" id="search">
            <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Lista de Encuestas Cortas</h1>
                                <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                    <button type="button" id="agregarPublicacion" class="btn btn-success" data-toggle="modal" data-target="#agregarNPublicacion">Agregar Encuesta Corta</button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTableCortas" class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Pregunta</th>
                                            <th>Respuesta N° 1</th>
                                            <th>Respuesta N° 2</th>
                                            <th>Respuesta N° 3</th>
                                            <th>Respuesta N° 4</th>
                                            <th>Votos respuesta N° 1</th>
                                            <th>Votos respuesta N° 2</th>
                                            <th>Votos respuesta N° 3</th>
                                            <th>Votos respuesta N° 4</th>
                                            <th>Fecha Inicio</th>
                                            <th>Feha Final</th>
                                            <th>Estatus</th>
                                            <th>Fecha última modificación</th>
                                            <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th>Editar</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($encuestas as $e) : ?>
                                            <tr>
                                                <td><?= $e['id_encuestasC'] ?>
                                                <td><?= $e['pregunta']; ?></th>
                                                <td><?= $e['respuesta1']; ?></th>
                                                <td><?= $e['respuesta2']; ?></th>
                                                <td><?= $e['respuesta3']; ?></th>
                                                <td><?= $e['respuesta4']; ?></th>
                                                <td><?= $e['votos1']; ?></th>
                                                <td><?= $e['votos2']; ?></th>
                                                <td><?= $e['votos3']; ?></th>
                                                <td><?= $e['votos4']; ?></th>
                                                <td><?= $e['fecha_inicio']; ?></th>
                                                <td><?= $e['fecha_fin']; ?></th>
                                                <th><?php if ($e['estatus'] == 'A') : ?>
                                                        <h5><span class="badge text-bg-success">Activo
                                                            <?php endif ?></span></h5>
                                                        <?php if ($e['estatus'] == 'B') : ?>
                                                            <h5><span class="badge text-bg-danger">Inactivo
                                                                <?php endif ?></span></h5>
                                                </th>
                                                <td><?= $e['fecha_modificacion']; ?></th>
                                                    <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th><a href="<?= base_url('encuesta/edit/' . $e['id_encuestasC']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a>
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


        <!--Modal Agregar nueva encuesta-->
        <form method="POST" action="<?php echo base_url('encuesta/createPregunta') ?>">
            <div class="modal fade" id="agregarNPregunta" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar Pregunta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Pregunta:</label>
                                <input type="text" maxlength="500" class="form-control" name="pregunta" id="nombre" requred />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estatus:</label>
                                <select class="form-select form-control" id="estatus" name="estatusP">
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
                                <h1 class="text-primary">Lista de Preguntas</h1>
                                <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                    <button type="button" id="agregarPublicacion" class="btn btn-success" data-toggle="modal" data-target="#agregarNPregunta">Agregar Pregunta</button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTablePreguntas" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Pregunta</th>
                                            <th>Estatus</th>
                                            <th>Fecha última modificación</th>
                                            <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th>Editar</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($preguntas as $e) : ?>
                                            <tr>
                                                <td><?= $e['id_pregunta'] ?>
                                                <td><?= $e['pregunta']; ?></th>
                                                <th><?php if ($e['estatusP'] == 'A') : ?>
                                                        <h5><span class="badge text-bg-success">Activo
                                                            <?php endif ?></span></h5>
                                                        <?php if ($e['estatusP'] == 'B') : ?>
                                                            <h5><span class="badge text-bg-danger">Inactivo
                                                                <?php endif ?></span></h5>
                                                </th>
                                                <td><?= $e['fecha_modificacion']; ?></th>
                                                    <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th><a href="<?= base_url('encuesta/editPregunta/' . $e['id_pregunta']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a>
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


        <!--Modal Agregar nueva encuesta-->
        <form method="POST" action="<?php echo base_url('encuesta/createEncuestaL') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarNEncuestaL" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar Encuesta Larga</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Descripción:</label>
                                <input type="text" maxlength="555" class="form-control" name="descripcionL" id="descripcionL" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Enlace:</label>
                                <input type="text" class="form-control" name="enlace" id="enlace" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Fecha Inicio:</label>
                                <input type="date" class="form-control" name="fecha_inicioL" id="fecha_inicioL" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Fecha Fin:</label>
                                <input type="date" class="form-control" name="fecha_finL" id="fecha_finL" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Subir Imagen:</label>
                                <input class="form-control" name="imagen" id="imgen" type="file" style="color:#4469C5;" required /><br />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estatus:</label>
                                <select class="form-select form-control" id="estatus" name="estatusL" required>
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
                                <h1 class="text-primary">Lista de Encuestas Largas</h1>
                                <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                    <button type="button" id="agregarPublicacion" class="btn btn-success" data-toggle="modal" data-target="#agregarNEncuestaL">Agregar
                                        encuesta larga</button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableLargas" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descripcion</th>
                                            <th>Enlace</th>
                                            <th>Fecha Inicio</th>
                                            <th>Feha Final</th>
                                            <th>Imagen</th>
                                            <th>Estatus</th>
                                            <th>Fecha última modificación</th>
                                            <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th>Editar</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($encuestasL as $el) : ?>
                                            <tr>
                                                <td><?= $el['id_encuestasL'] ?></th>
                                                <td><?= $el['descripcion']; ?></th>
                                                <th><?php if ($el['enlace'] == !null) : ?>
                                                        <a href="<?= $el['enlace'] ?>" target="_blank" class="btn btn-success" style="margin: 5px">Ver más</a><?php endif ?>
                                                </th>
                                                <td><?= $el['fecha_inicio']; ?></th>
                                                <td><?= $el['fecha_fin']; ?></th>
                                                <th><img src="<?php echo base_url('images_propuesta/' . $el['id_encuestasL'] . '/' . $el['imagen']) ?>" width="100" alt="juventud"></th>
                                                <th><?php if ($el['estatus'] == 'A') : ?>
                                                        <h5><span class="badge text-bg-success">Activo
                                                            <?php endif ?></span></h5>
                                                        <?php if ($el['estatus'] == 'B') : ?>
                                                            <h5><span class="badge text-bg-danger">Inactivo
                                                                <?php endif ?></span></h5>
                                                </th>
                                                <td><?= $el['fecha_modificacion']; ?></th>
                                                    <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th><a href="<?= base_url('encuesta/editEncuestaLarga/' . $el['id_encuestasL']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a>
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




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';
        if (mensaje == '1') {
            swal('', 'Encuesta actualizada con éxito', 'success');
        } else if (mensaje == '2') {
            swal('', 'Encuesta creada con éxito', 'success');
        } else if (mensaje == '3') {
            swal('', 'El estatus de la encuesta es requerido', 'error');
        } else if (mensaje == '5') {
            swal('', 'Pregunta actualizada con éxito', 'success');
        } else if (mensaje == '6') {
            swal('', 'Pregunta creada con éxito', 'success');
        } else if (mensaje == '7') {
            swal('', 'El estatus de la pregunta es requerido', 'error');
        } else if (mensaje == '9') {
            swal('', 'Encuesta larga actualizada con éxito', 'success');
        } else if (mensaje == '10') {
            swal('', 'Encuesta larga creada con éxito', 'success');
        } else if (mensaje == '11') {
            swal('', 'El estatus de la encuesta larga es requerido', 'error');
        } else if (mensaje == '13') {
            swal('', 'Elija una imagen', 'error');
        } else if (mensaje == '14') {
            swal('', 'Testimonio eliminado', 'success');
        } else if (mensaje == '15') {
            swal('', 'Testimonio actualizado', 'success');
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url('plugins/wow-js/wow.min.js') ?>  "></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                lengthChange: false,
                scrollX: true,
                buttons: ['excel']
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        new DataTable('#dataTableLargas');
        new DataTable('#dataTableCortas');
        new DataTable('#dataTablePreguntas');
    </script>
</body>


</html>