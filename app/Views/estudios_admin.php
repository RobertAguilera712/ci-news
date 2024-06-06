<!DOCTYPE html>
<html lang="es">

<head>
    
    <title>Estudios JuventudEsGto</title>
    <?= view('components/HeadAdmin.php'); ?>
</head>

<body style="background-image: url('images/FONDO.jpg')">

    <?= view('components/NavbarAdmin.php'); ?>

    <div class="container" id="nuevo" style="margin-top: 30vh;">
        <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
            <div class="row">
                <button type="button" id="agregarPublicacion" class="btn btn-success" data-toggle="modal" data-target="#agregarNPublicacion">Agregar Investigación</button>
            </div>
        <?php endif; ?>
    </div>
    <!-- Button trigger modal -->

    <!--Modal Agregar nueva publicación-->
    <form method="POST" action="<?php echo base_url('investigadores/createInv') ?>" enctype="multipart/form-data">
        <div class="modal fade" id="agregarNPublicacion" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="publicacionTitle">Agregar Investigación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label">Nombre de la investigación/estudio:</label>
                            <input type="text" maxlength="255" class="form-control" name="nombre" id="nombre" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Fecha:</label>
                            <input type="date" class="form-control" name="fecha_investigacion" id="fecha_investigacion" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Seleccione el tema:</label>
                            <select class="form-select form-control " name="id_tema">
                                <?php foreach ($tema as $t) : ?>
                                    <option value="<?= $t['id_tema']; ?>"><?= $t['nombre_tema']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Descripción:</label>
                            <textarea name="descripcion" maxlength="555" class="form-control" id="descripcion" cols="30" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Subir Imagen que hace referencia al estudio:</label>
                            <input id="elegirImagen" class="form-control" name="informe" id="informe" type="file" style="color:#4469C5;" /><br />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Subir Archivo/Estudio:</label>
                            <input id="elegiraArchivo" class="form-control" name="archivo" id="archivo" type="file" style="color:#4469C5;" /><br />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Seleccione el estatus:</label>
                            <select class="form-select form-control " id="estatus" name="estatus">
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
                            <h1 class="text-primary">Lista de Investigaciones</h1>
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
                                        <th>Fecha</th>
                                        <th>Tema</th>
                                        <th>Archivo</th>
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
                                    foreach ($datos as $d) : ?>
                                        <tr>
                                            <td><?= $d['id_investigacion'] ?>
                                            <td><?= $d['nombre']; ?></th>
                                            <td><?= $d['descripcion']; ?></th>
                                            <th>
                                                <?php $fecha = $d['fecha_investigacion'];
                                                if ($fecha == !NULL) {
                                                    $nuevaFecha = date("d-m-Y", strtotime($fecha));
                                                    echo $nuevaFecha;
                                                } else {
                                                    echo "Sin fecha";
                                                }
                                                ?>
                                            </th>
                                            <td><?= $d['nombre_tema'] ?></th>
                                            <th><?php if ($d['archivo'] == !null) : ?><a href="<?php echo base_url('documentos_investigaciones/' . $d['id_investigacion'] . '/' . $d['archivo']) ?>" download="<?php $d['archivo'] ?>" class="btn btn-success btn-sm">
                                                        Descargar</a><?php endif ?></th>
                                            <th><img src="<?php echo base_url('images_investigaciones/' . $d['id_investigacion'] . '/' . $d['informe']) ?>" width="100" alt="juventud"></th>
                                            <th><?php if ($d['estatus'] == 'A') : ?>
                                                    <h5><span class="badge text-bg-success">Activo
                                                        <?php endif ?></span></h5>
                                                    <?php if ($d['estatus'] == 'B') : ?>
                                                        <h5><span class="badge text-bg-danger">Inactivo
                                                            <?php endif ?></span></h5>
                                            </th>
                                            <td><?= $d['fecha_modificacion']; ?></th>
                                            <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                            <th><a href="<?= base_url('estudios/edit/' . $d['id_investigacion']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a></th>
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


    <div class="container">
        <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
            <div class="row">
                <button type="button" id="agregarPublicacion" class="btn btn-success" data-toggle="modal" data-target="#agregarTemaInv">
                    AgregarTema de investigación
                </button>
            </div>
        <?php endif; ?>
    </div>

    <form method="POST" action="<?php echo base_url('investigadores/createTemaInv') ?>" enctype="multipart/form-data">
        <div class="modal fade" id="agregarTemaInv" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="publicacionTitle">Agregar Tema Investigación</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label">Nombre del tema de investigación:</label>
                            <input type="text" maxlength="255" class="form-control" name="nombre_tema" id="nombre" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Seleccione el estatus:</label>
                            <select class="form-select form-control " id="estatus" name="estatus_tema">
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
                            <h1 class="text-primary">Lista de Temas de Investigación</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTableTemas" class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Estatus</th>
                                        <th>Fecha última modificación</th>
                                        <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                            <th>Editar</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($temasinvestigacion as $e) : ?>
                                        <tr>
                                            <td><?= $e['id_tema'] ?>
                                            <td><?= $e['nombre_tema']; ?></th>
                                            <th><?php if ($e['estatus'] == 'A') : ?>
                                                    <h5><span class="badge text-bg-success">Activo
                                                        <?php endif ?></span></h5>
                                                    <?php if ($e['estatus'] == 'B') : ?>
                                                        <h5><span class="badge text-bg-danger">Inactivo
                                                            <?php endif ?></span></h5>
                                            </th>
                                            <td><?= $e['fecha_modificacion']; ?></th>
                                                <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                            <th><a href="<?= base_url('investigadores/editTemaInvestigaciones/' . $e['id_tema']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a>
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
    
    

    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';
        if (mensaje == '1') {
            swal('', 'Documento actualizado con éxito', 'success');
        } else if (mensaje == '2') {
            swal('', 'Documento creado con éxito', 'success');
        } else if (mensaje == '3') {
            swal('', 'El estatus es requerido', 'error');
        } else if (mensaje == '4') {
            swal('', 'Documento eliminado correctamente', 'success');
        } else if (mensaje == '5') {
            swal('', 'Categoría de documento creada con éxito', 'success');
        } else if (mensaje == '6') {
            swal('', 'Categoría de documento actualizada con éxito', 'success');
        }
    </script>
    <script>
        new DataTable('#dataTable');
        $(document).ready(function() {
            $('#dataTableTemas').DataTable({
                pagingType: 'simple'
            });
        });
        $(document).ready(function() {
            $('#dataTableEncuestasC').DataTable({
                pagingType: 'simple'
            });
        });
        $(document).ready(function() {
            $('#dataTablePreguntas').DataTable({
                pagingType: 'simple'
            });
        });
        $(document).ready(function() {
            $('#dataTableEncuestasL').DataTable({
                pagingType: 'simple'
            });
        });
    </script>
</body>


</html>