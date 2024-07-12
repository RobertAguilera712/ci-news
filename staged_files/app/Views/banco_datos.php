<!DOCTYPE html>
<html lang="es">

<head>

    <title>Banco de datos</title>
    <?= view('components/HeadAdmin.php'); ?>
</head>

<body style="background-image: url('images/FONDO.jpg');  ">

    <?= view('components/NavbarAdmin.php'); ?>

    <section style="margin-top: 30vh;">

        <!-- Modal agregar documento banco  -->
        <form method="POST" action="<?php echo base_url('/banco-datos/create-doc') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarDocBanco" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar documento banco de datos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" maxlength="255" name="nombre" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Autor:</label>
                                <input type="text" class="form-control" maxlength="255" name="autor" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Dependencia:</label>
                                <input type="text" class="form-control" maxlength="255" name="dependencia" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">País:</label>
                                <input type="text" class="form-control" maxlength="255" name="pais" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Palabras clave:</label>
                                <input type="text" class="form-control" maxlength="255" name="palabras_clave" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Fecha:</label>
                                <input type="date" class="form-control" name="fecha" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Día:</label>
                                <input type="number" class="form-control" name="dia" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Mes:</label>
                                <input type="number" class="form-control" name="mes" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Año:</label>
                                <input type="number" class="form-control" name="anio" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccionar categoría:</label>
                                <select class="form-select form-control" id="id_categoria" name="id_categoria" required hx-get="/banco-datos/get-subcategorias" hx-target="#id_subcategoria" hx-trigger="change">
                                    <option value="" selected>Seleccionar categoría</option>
                                    <?php foreach ($categorias as $cat) : ?>
                                        <?php if ($cat['estatus'] == 'A') : ?>
                                            <option value="<?= $cat['id'] ?>"><?= $cat['nombre'] ?></option>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccionar subcategoría:</label>
                                <select class="form-select form-control" id="id_subcategoria" name="id_subcategoria" required>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Seleccionar municipio:</label>
                                <select class="form-select form-control" id="id_municipio" name="id_municipio">
                                    <label class="col-form-label">Seleccionar municipio</label>
                                    <option value="" selected>Seleccionar municipio</option>
                                    <?php foreach ($municipios as $mun) : ?>
                                        <option value="<?= $mun['id_municipio'] ?>"><?= $mun['nombre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Seleccionar región:</label>
                                <select class="form-select form-control" id="id_region" name="id_region">
                                    <label class="col-form-label">Seleccionar región</label>
                                    <option value="" selected>Seleccionar region</option>
                                    <?php foreach ($regiones as $reg) : ?>
                                        <option value="<?= $reg->id ?>"><?= $reg->nombre ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Seleccionar estado:</label>
                                <select class="form-select form-control" id="id_estado" name="id_estado">
                                    <option value="" selected>Seleccionar estado</option>
                                    <?php foreach ($estados as $est) : ?>
                                        <option value="<?= $est['id_estado'] ?>"><?= $est['nombre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Subir Archivo:</label>
                                <input class="form-control" name="archivo_documento" id="archivo_documento" type="file" style="color:#4469C5;" /><br />
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Documentos banco de datos -->
        <div class="container" id="search">
            <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Lista de documentos</h1>
                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarDocBanco">Agregar documento</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTableDocs" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Autor</th>
                                                <th>Fecha</th>
                                                <th>Día</th>
                                                <th>Mes</th>
                                                <th>Año</th>
                                                <th>Categoría</th>
                                                <th>Subcategoría</th>
                                                <th>Dependencia</th>
                                                <th>Municipio</th>
                                                <th>Estado</th>
                                                <th>Región</th>
                                                <th>País</th>
                                                <th>Tipo</th>
                                                <th>Palabras clave</th>
                                                <th>Archivo</th>
                                                <th>Estatus</th>
                                                <th>Fecha última modificación</th>
                                                <th>Editar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($documentos as $doc) : ?>
                                                <tr>
                                                    <td><?= $doc['id'] ?></td>
                                                    <td><?= $doc['nombre']; ?></td>
                                                    <td><?= $doc['autor']; ?></td>
                                                    <td><?= $doc['fecha']; ?></td>
                                                    <td><?= $doc['dia']; ?></td>
                                                    <td><?= $doc['mes']; ?></td>
                                                    <td><?= $doc['anio']; ?></td>
                                                    <td><?= $doc['nombre_categoria']; ?></td>
                                                    <td><?= $doc['nombre_subcategoria']; ?></td>
                                                    <td><?= $doc['dependencia']; ?></td>
                                                    <td><?= $doc['nombre_municipio']; ?></td>
                                                    <td><?= $doc['nombre_estado']; ?></td>
                                                    <td><?= $doc['nombre_region']; ?></td>
                                                    <td><?= $doc['pais']; ?></td>
                                                    <td><?= $doc['tipo']; ?></td>
                                                    <td><?= $doc['palabras_clave']; ?></td>

                                                    <td><?php if ($doc['archivo'] == !null) : ?><a href="<?php echo base_url('documentos_banco/' . $doc['id'] . '/' . $doc['archivo']) ?>" download="<?php $doc['archivo'] ?>" class="btn btn-success btn-sm">
                                                                Descargar</a><?php endif ?></td>
                                                    <td><?php if ($doc['estatus'] == 'A') : ?>
                                                            <h5><span class="badge text-bg-success">Activo
                                                                <?php endif ?></span></h5>
                                                            <?php if ($doc['estatus'] == 'B') : ?>
                                                                <h5><span class="badge text-bg-danger">Inactivo
                                                                    <?php endif ?></span></h5>
                                                    </td>
                                                    <td><?= $doc['fecha_modificacion']; ?></td>
                                                    <td><a href="<?= base_url('banco-datos/editar-doc/' . $doc['id']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" src="images/icons/edit.svg"></a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>

                                    </table>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
            <!-- Modal agregar Categoría -->
            <form method="POST" action="<?php echo base_url('/banco-datos/create-categoria') ?>" enctype="multipart/form-data">
                <div class="modal fade" id="agregarCategoria" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="publicacionTitle">Agregar categoría Banco de datos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" maxlength="255" name="nombre" required />
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Categorías -->
            <div class="container" id="search">
                <div class="row">
                    <div class="container-fluid">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="head">
                                    <h1 class="text-primary">Lista de Categorías</h1>
                                    <div class="row">
                                        <div class="col">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarCategoria">Agregar Categoría</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Estatus</th>
                                                <th>Fecha última modificación</th>
                                                <th>Editar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($categorias as $cat) : ?>
                                                <tr>
                                                    <td><?= $cat['id'] ?></td>
                                                    <td><?= $cat['nombre']; ?></td>
                                                    <td><?php if ($cat['estatus'] == 'A') : ?>
                                                            <h5><span class="badge text-bg-success">Activo
                                                                <?php endif ?></span></h5>
                                                            <?php if ($cat['estatus'] == 'B') : ?>
                                                                <h5><span class="badge text-bg-danger">Inactivo
                                                                    <?php endif ?></span></h5>
                                                    </td>
                                                    <td><?= $cat['fecha_modificacion']; ?></td>
                                                    <td><a href="<?= base_url('banco-datos/editar-categoria/' . $cat['id']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" src="images/icons/edit.svg"></a></td>
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

            <!-- Modal agregar subcategoría -->
            <form method="POST" action="<?php echo base_url('/banco-datos/create-subcategoria') ?>" enctype="multipart/form-data">
                <div class="modal fade" id="agregarSubcategoria" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="publicacionTitle">Agregar subcategoría Banco de datos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" maxlength="255" name="nombre" required />
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Seleccionar categoría:</label>
                                    <select class="form-select form-control" id="id_categoria_banco_datos" name="id_categoria_banco_datos" required>
                                        <?php foreach ($categorias as $cat) : ?>
                                            <?php if ($cat['estatus'] == 'A') : ?>
                                                <option value="<?= $cat['id'] ?>"><?= $cat['nombre'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Subcategorias -->
            <div class="container" id="search">
                <div class="row">
                    <div class="container-fluid">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="head">
                                    <h1 class="text-primary">Lista de subcategorías</h1>
                                    <div class="row">
                                        <div class="col">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarSubcategoria">Agregar subcategoría</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTableSub" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>categoría</th>
                                                <th>Estatus</th>
                                                <th>Fecha última modificación</th>
                                                <th>Editar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($subcategorias as $sub) : ?>
                                                <tr>
                                                    <td><?= $sub['id'] ?></td>
                                                    <td><?= $sub['nombre']; ?></td>
                                                    <td><?= $sub['categoria_nombre']; ?></td>
                                                    <td><?php if ($sub['estatus'] == 'A') : ?>
                                                            <h5><span class="badge text-bg-success">Activo
                                                                <?php endif ?></span></h5>
                                                            <?php if ($sub['estatus'] == 'B') : ?>
                                                                <h5><span class="badge text-bg-danger">Inactivo
                                                                    <?php endif ?></span></h5>
                                                    </td>
                                                    <td><?= $sub['fecha_modificacion']; ?></td>
                                                    <td><a href="<?= base_url('banco-datos/editar-subcategoria/' . $sub['id']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" src="images/icons/edit.svg"></a></td>
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


            <!-- Modal agregar región -->
            <form method="POST" action="<?php echo base_url('/banco-datos/create-region') ?>" enctype="multipart/form-data">
                <div class="modal fade" id="agregarRegion" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="publicacionTitle">Agregar región</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" maxlength="255" name="nombre" required />
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Seleccionar municipios:</label>
                                    <select multiple class="form-select form-control" id="municipios" name="municipios[]" required>
                                        <?php foreach ($municipios as $mun) : ?>
                                            <option value="<?= $mun['id_municipio'] ?>"><?= $mun['nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Regiones -->
            <div class="container" id="search">
                <div class="row">
                    <div class="container-fluid">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="head">
                                    <h1 class="text-primary">Lista de regiones</h1>
                                    <div class="row">
                                        <div class="col">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarRegion">Agregar región</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTableReg" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Municipios</th>
                                                <th>Estatus</th>
                                                <th>Fecha última modificación</th>
                                                <th>Editar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($regiones as $reg) : ?>
                                                <tr>
                                                    <td><?= $reg->id ?></td>
                                                    <td><?= $reg->nombre ?></td>
                                                    <td><?= $reg->municipios ?></td>
                                                    <td><?php if ($reg->estatus == 'A') : ?>
                                                            <h5><span class="badge text-bg-success">Activo
                                                                <?php endif ?></span></h5>
                                                            <?php if ($reg->estatus == 'B') : ?>
                                                                <h5><span class="badge text-bg-danger">Inactivo
                                                                    <?php endif ?></span></h5>
                                                    </td>
                                                    <td><?= $reg->fecha_modificacion ?></td>
                                                    <td><a href="<?= base_url('banco-datos/editar-region/' . $reg->id); ?>"><img width="40" height="40" class="edit" data-toggle="modal" src="images/icons/edit.svg"></a></td>
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
        <?php endif; ?>


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
        let mensaje = '<?= session()->getFlashdata('mensaje') ?>';
        let type = '<?= session()->getFlashdata('type') ?>';
        if (mensaje.length > 0) {
            swal({
                text: mensaje,
                icon: type,
            });
        }
    </script>
    <script>
        new DataTable('#dataTable');
        new DataTable('#dataTableSub');
        new DataTable('#dataTableDocs');
        new DataTable('#dataTableReg');
    </script>


</body>


</html>