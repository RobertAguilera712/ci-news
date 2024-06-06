<!DOCTYPE html>
<html lang="es">

<head>

    <title>Revista Voces Emergentes</title>
    <?= view('components/HeadAdmin.php'); ?>
</head>

<body style="background-image: url('images/FONDO.jpg');  ">

    <?= view('components/NavbarAdmin.php'); ?>

    <section style="margin-top: 30vh;">
        <form method="POST" action="<?php echo base_url('revistas-admin/crearRevista') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarRevista" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar Revista</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Volumen:</label>
                                <input type="number" min="1" class="form-control" maxlength="3" name="volumen" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Número de Año:</label>
                                <input type="number" min="1" class="form-control" maxlength="2" name="numero_year" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Descripción:</label>
                                <textarea type="text" class="form-control" maxlength="250" name="descripcion" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Fecha de publicación:</label>
                                <input type="date" class="form-control" name="fecha" id="fecha" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Subir Portada:</label>
                                <input class="form-control" name="portada" id="portada" type="file" style="color:#4469C5;" required /><br />
                                <span id="file-error" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Subir Archivo:</label>
                                <input class="form-control" name="archivo" id="archivo" type="file" style="color:#4469C5;" /><br />
                                <span id="file-error" style="color:red;"></span>
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

        <!-- Modal Artículos -->

        <form method="POST" action="<?php echo base_url('revistas-admin/crearArticuloRevista') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarArticulo" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar Artículo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el volumen:</label>
                                <select class="form-select form-control" id="id_revista" name="id_revista">
                                    <option selected disabled>Seleccione un volumen</option>
                                    <?php foreach ($revistas as $rev) : ?>
                                        <option value="<?= $rev['id_revista'] ?>"><?= $rev['volumen'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Título:</label>
                                <input type="text" class="form-control" maxlength="255" name="titulo" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Autor:</label>
                                <input type="text" class="form-control" maxlength="255" name="autor" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Contenido:</label>
                                <textarea type="text" class="form-control" name="contenido" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Subir Imagen:</label>
                                <input class="form-control" name="imagen" id="imagen" type="file" style="color:#4469C5;" required /><br />
                                <span id="file-error" style="color:red;"></span>
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

        <!-- Revistas-->
        <div class="container" id="search">
            <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Lista de Revistas</h1>
                                <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                    <div class="row">
                                        <div class="col">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarRevista">Agregar Revista</button>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarArticulo">Agregar Artículo</button>
                                        </div>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Volumen</th>
                                            <th>Número Año</th>
                                            <th>Descripción</th>
                                            <th>Fecha de Publicación</th>
                                            <th>Portada</th>
                                            <th>Archivo</th>
                                            <th>Estatus</th>
                                            <th>Fecha última modificación</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($revistas as $rev) : ?>
                                            <tr>
                                                <td><?= $rev['id_revista'] ?></td>
                                                <td><?= $rev['volumen']; ?></td>
                                                <td><?= $rev['numero_year']; ?></td>
                                                <td style="font-size: x-small;"><?= $rev['descripcion']; ?></td>
                                                <td><?= $rev['fecha']; ?></td>
                                                <td><img src="<?php echo base_url('images_revistas/' . $rev['id_revista'] . '/' . $rev['portada']) ?>" width="100" alt="juventud"></td>
                                                <td>
                                                    <?php if ($rev['archivo'] == !null) : ?>
                                                        <a href="<?php echo base_url('revistas/' . $rev['id_revista'] . '/' . $rev['archivo']) ?>" download="<?php $rev['archivo'] ?>" class="btn btn-success btn-sm">
                                                            Descargar</a>
                                                    <?php endif ?>
                                                </td>
                                                <td><?php if ($rev['estatus'] == 'A') : ?>
                                                        <h5><span class="badge text-bg-success">Activo
                                                            <?php endif ?></span></h5>
                                                        <?php if ($rev['estatus'] == 'B') : ?>
                                                            <h5><span class="badge text-bg-danger">Inactivo
                                                                <?php endif ?></span></h5>
                                                </td>
                                                <td><?= $rev['fecha_modificacion']; ?></th>
                                                <td><a href="<?= base_url('revistas-admin/editarRevista/' . $rev['id_revista']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a>
                                                </td>

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


        <!-- Articulos-->
        <div class="container" id="articulos">
            <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Lista de Artículos</h1>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableArticulos" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ID Revista</th>
                                            <th>Título</th>
                                            <th>Autor</th>
                                            <th>Contenido</th>
                                            <th>Imagen</th>
                                            <th>Estatus</th>
                                            <th>Fecha última modificación</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($articulos as $art) : ?>
                                            <tr>
                                                <td><?= $art['id_articulo'] ?></td>
                                                <td><?= $art['id_revista'] ?></td>
                                                <td style="font-size: small;"><?= $art['titulo']; ?></td>
                                                <td style="font-size: small;"><?= $art['autor']; ?></td>
                                                <td style="font-size: x-small;"><?= $art['contenido']; ?></td>
                                                <td><img src="<?php echo base_url('images_articulosrevistas/' . $art['id_articulo'] . '/' . $art['imagen']) ?>" width="100" alt="juventud"></td>
                                                <td><?php if ($art['estatus'] == 'A') : ?>
                                                        <h5><span class="badge text-bg-success">Activo
                                                            <?php endif ?></span></h5>
                                                        <?php if ($art['estatus'] == 'B') : ?>
                                                            <h5><span class="badge text-bg-danger">Inactivo
                                                                <?php endif ?></span></h5>
                                                </td>
                                                <td><?= $art['fecha_modificacion']; ?></th>
                                                <td><a href="<?= base_url('revistas-admin/editarArticuloRevista/' . $art['id_articulo']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a>
                                                </td>

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
            swal('', 'Revista agregada con éxito', 'success');
        } else if (mensaje == '2') {
            swal('', 'Revista actualizada con éxito', 'success');
        } else if (mensaje == '3') {
            swal('', 'Estatus es requerido', 'error');
        } else if (mensaje == '4') {
            swal('', 'Ya existe una gráfica con el mismo nombre', 'error');
        } else if (mensaje == '5') {
            swal('', "<?php echo session()->getFlashdata('message') ?>", 'success');
        } else if (mensaje == '6') {
            swal('', 'Archivo es requerido o excede los 3 Mb', 'error');
        } else if (mensaje == '7') {
            swal('', 'Portada es requerida o excede los 3 Mb', 'error');
        } else if (mensaje == '8') {
            swal('', 'Datos actualizados', 'success');
        } else if (mensaje == '9') {
            swal('', 'Artículo agregado con éxito', 'success');
        } else if (mensaje == '10') {
            swal('', 'Artículo actualizado con éxito', 'success');
        } else if (mensaje == '11') {
            swal('', 'Imagen es requerida o excede los 3 Mb', 'error');
        }
    </script>
    <script>
        new DataTable('#dataTable');
        new DataTable('#dataTableArticulos');
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