<!DOCTYPE html>
<html lang="es">

<head>

    <title>CENDOC</title>
    <?= view('components/HeadAdmin.php'); ?>

</head>

<body style="background-image: url('images/FONDO.jpg')">

    <?= view('components/NavbarAdmin.php'); ?>

    <!-- BOTON DE AGREGAR DOCUMENTO -->
    <section style="margin-top: 30vh;">
        <!-- AGREGAR DOCUMENTO-->
        <form method="POST" action="<?php echo base_url('cendoc/createDoc') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarDocumentoModal" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Nuevo Documento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Nombre:</label>
                                <input type="text" maxlength="255" class="form-control" name="nombre" id="nombre" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Autor:</label>
                                <input type="text" maxlength="255" class="form-control" name="autor" id="autor" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Fecha del documento:</label>
                                <input type="date" class="form-control" name="fecha" id="fecha" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione la categoría:</label>
                                <select class="form-select form-control " name="id_categoria" id="id_categoria">
                                    <?php foreach ($categorias as $cat) : ?>
                                        <option value="<?= $cat['id_categoria_cendoc']; ?>"><?= $cat['nombre_categoria_cendoc']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Descripción:</label>
                                <textarea name="descripcion" maxlength="555" class="form-control" id="descripcion" cols="30" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Subir Archivo:</label>
                                <input class="form-control" name="archivo_documento" id="archivo_documento" type="file" style="color:#4469C5;" /><br />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estatus:</label>
                                <select class="form-select form-control " id="estatus_documento" name="estatus_documento">
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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Lista de Documentos Digitales</h1>
                                <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                    <button type="button" id="agregarPublicacion" class="btn btn-success" data-toggle="modal" data-target="#agregarDocumentoModal">Agregar Documento</button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Autor</th>
                                            <th>Descripción</th>
                                            <th>Fecha</th>
                                            <th>Categoría</th>
                                            <th>Archivo</th>
                                            <th>Estatus</th>
                                            <th>Fecha última modificación</th>
                                            <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th>Editar</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($documentos as $d) : ?>
                                            <tr>
                                                <td><?= $d['id_documento'] ?>
                                                <td><?= $d['nombre_documento']; ?></th>
                                                <td><?= $d['autor_documento']; ?></th>
                                                <td><?= $d['descripcion_documento']; ?></th>
                                                <td><?= $d['fecha_documento']; ?></th>
                                                <td><?= $d['nombre_categoria_cendoc']; ?></th>
                                                <th><?php if ($d['archivo_documento'] == !null) : ?><a href="<?php echo base_url('documentos_cendoc/' . $d['id_documento'] . '/' . $d['archivo_documento']) ?>" download="<?php $d['archivo_documento'] ?>" class="btn btn-success btn-sm">
                                                            Descargar</a><?php endif ?></th>
                                                <th><?php if ($d['estatus_documento'] == 'A') : ?>
                                                        <h5><span class="badge text-bg-success">Activo
                                                            <?php endif ?></span></h5>
                                                        <?php if ($d['estatus_documento'] == 'B') : ?>
                                                            <h5><span class="badge text-bg-danger">Inactivo
                                                                <?php endif ?></span></h5>
                                                </th>
                                                <td><?= $d['fecha_modificacion']; ?></th>
                                                    <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th><a href="<?= base_url('cendoc/editDoc/' . $d['id_documento']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a></th>
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

        <!-- ================================= DOCUMENTO FISICO ===================================================== -->
        <!-- BOTON DE AGREGAR DOCUMENTO FISICO -->

        <!-- MODAL AGREGAR DOCUMENTO FISICO  -->
        <form method="POST" action="<?php echo base_url('cendoc/createDocFisico') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarDocumentoFisico" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar documento físico</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Titulo:</label>
                                <input type="text" required class="form-control" name="titulo" id="titulo" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Clave:</label>
                                <input type="text" class="form-control" name="clave" id="clave" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Editorial:</label>
                                <input type="text" class="form-control" name="editorial" id="editorial" />
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Seleccione el tipo:</label>
                                <select class="form-select form-control" id="tipo" name="tipo" required>
                                    <option selected disabled value="">Seleccione una opción</option>
                                    <option value="Libro">Libro</option>
                                    <option value="Revista">Revista</option>
                                    <option value="Articulo">Articulo</option>
                                    <option value="Manual">Manual</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Ejemplares:</label>
                                <input type="number" min="0" class="form-control" required="ejemplares" id="ejemplares" />
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estatus:</label>
                                <select class="form-select form-control" id="estatus" name="estatus">
                                    <option value="A">Disponible</option>
                                    <option value="B">No disponible</option>
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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Lista de Documentos Físicos</h1>
                                <div class="container">
                                    <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                        <button type="button" id="agregarDocumento" class="btn btn-success" data-toggle="modal" data-target="#agregarDocumentoFisico">Agregar Documento Físico</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableFisicos" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Clave</th>
                                            <th>Titulo</th>
                                            <th>Editorial</th>
                                            <th>Tipo</th>
                                            <th>Ejemplares</th>
                                            <th>Estatus</th>
                                            <th>Fecha última modificación</th>
                                            <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th>Editar</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($documentosFisicos as $d) : ?>
                                            <tr>
                                                <td><?= $d['id_documento'] ?>
                                                <td><?= $d['clave']; ?></th>
                                                <td style="text-transform: capitalize;"><?= $d['titulo']; ?></th>
                                                <td><?= $d['editorial']; ?></th>
                                                <td><?= $d['tipo']; ?></th>
                                                <td><?= $d['ejemplares']; ?></th>
                                                <th><?php if ($d['estatus'] == 'A') : ?>
                                                        <h5><span class="badge text-bg-success">Disponible
                                                            <?php endif ?></span></h5>
                                                        <?php if ($d['estatus'] == 'B') : ?>
                                                            <h5><span class="badge text-bg-danger">No disponible
                                                                <?php endif ?></span></h5>
                                                </th>
                                                <td><?= $d['fecha_modificacion']; ?></th>
                                                    <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th><a href="<?= base_url('cendoc/editDocFisico/' . $d['id_documento']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a></th>
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


        <!-- ================================= CATEGORIAS ===================================================== -->
        <!-- BOTON DE AGREGAR CATEGORIA -->

        <!-- MODAL AGREGAR CATEGORIA  -->
        <form method="POST" action="<?php echo base_url('cendoc/createCategoriaDoc') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarTemaInv" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar categoría</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Nombre de la categoría:</label>
                                <input type="text" maxlength="255" class="form-control" name="nombre_categoria" id="nombre_categoria" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estatus:</label>
                                <select class="form-select form-control " id="estatus_categoria" name="estatus_categoria">
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

        <!-- VER CATEGRORIAS -->
        <div class="container" id="search">
            <div class="row">
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Categorías</h1>
                                <div class="container">
                                    <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                        <button type="button" id="agregarPublicacion" class="btn btn-success" data-toggle="modal" data-target="#agregarTemaInv">Agregar categoría</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTableCategorias" class="table table-bordered" width="100%" cellspacing="0">
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
                                        foreach ($categorias as $cat) : ?>
                                            <tr>
                                                <td><?= $cat['id_categoria_cendoc'] ?>
                                                <td><?= $cat['nombre_categoria_cendoc']; ?></th>
                                                <th><?php if ($cat['estatus_categoria_cendoc'] == 'A') : ?>
                                                        <h5><span class="badge text-bg-success">Activo
                                                            <?php endif ?></span></h5>
                                                        <?php if ($cat['estatus_categoria_cendoc'] == 'B') : ?>
                                                            <h5><span class="badge text-bg-danger">Inactivo
                                                                <?php endif ?></span></h5>
                                                </th>
                                                <td><?= $cat['fecha_modificacion']; ?></th>
                                                    <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th><a href="<?= base_url('cendoc/editCategoriaCendoc/' . $cat['id_categoria_cendoc']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a></th>
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
            swal('', 'Categoría de Documento creada con éxito', 'success');
        } else if (mensaje == '6') {
            swal('', 'Categoría de Documento actualizada con éxito', 'success');
        } else if (mensaje == '7') {
            swal('', 'Documento editado correctamente', 'success');
        } else if (mensaje == '8') {
            swal('', 'Documento agregado correctamente', 'success');
        } else if (mensaje == '9') {
            swal('', 'Documento ya se encuentra registrado', 'error');
        } else if (mensaje == '10') {
            swal('', 'Ya existe un documento con la misma clave', 'error');
        } else if (mensaje == '11') {
            swal('', 'Ya existe la categoría', 'error');
        } else if (mensaje == '12') {
            swal('', 'Seleccione un tipo de documento', 'error');
        }
    </script>
    <script>
        new DataTable('#dataTable');
        new DataTable('#dataTableFisicos');
        new DataTable('#dataTableCategorias');
    </script>
</body>


</html>