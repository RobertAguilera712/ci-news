<!DOCTYPE html>
<html lang="es">

<head>

    <title>Estadísticas e Indicadores</title>
    <?= view('components/HeadAdmin.php'); ?>
</head>

<body style="background-image: url('images/FONDO.jpg')">

    <?= view('components/NavbarAdmin.php'); ?>

    <section style="margin-top: 30vh;">
        <!-- AGREGAR ARCHIVO-->
        <form method="POST" action="<?php echo base_url('/estadisticas-admin/createMunicipioArchivo') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarDocumentoModal" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Nuevo Archivo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Nombre:</label>
                                <p style="color: red;">Escriba un nombre descriptivo, ya que este será mostrado al usuario.</p>
                                <input type="text" maxlength="255" class="form-control" name="nombre" id="nombre" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Fecha del documento:</label>
                                <input type="date" class="form-control" name="fecha" id="fecha" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el tipo:</label>
                                <select class="form-select form-control " id="tipo_archivo" name="tipo_archivo">
                                    <option value="Mapa">Mapa</option>
                                    <option value="Tabla">Tabla</option>
                                    <option value="Gráfica">Gráfica</option>
                                    <option value="Infografía">Infografía</option>
                                    <option value="Resultados">Resultados</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Palabras clave:</label>
                                <p style="color: red;">Escriba 3 palabras clave que ayuden a localizar e identificar el archivo.</p>
                                <input type="text" maxlength="55" class="form-control" name="palabras_clave" id="palabras_clave" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione la categoría:</label>
                                <select class="form-select form-control " id="categoria_archivo" name="categoria_archivo">
                                    <option value="Derechos Humanos">Derechos Humanos</option>
                                    <option value="Economía">Economía</option>
                                    <option value="Educación">Educación</option>
                                    <option value="Empleo">Empleo</option>
                                    <option value="Familia">Familia</option>
                                    <option value="Gobernanza">Gobernanza</option>
                                    <option value="Población">Población</option>
                                    <option value="Salud">Salud</option>
                                    <option value="Seguridad">Seguridad</option>
                                    <option value="Tecnología">Tecnología</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el municipio:</label>
                                <select class="form-select form-control " id="id_municipio" name="id_municipio">
                                    <?php foreach ($municipio as $mun) : ?>
                                        <option value="<?= $mun['id_municipio']; ?>"><?= $mun['nombre']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Subir Archivo:</label>
                                <input id="elegiraArchivo" class="form-control" name="archivo" id="archivo" type="file" style="color:#4469C5;" /><br />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estatus:</label>
                                <select class="form-select form-control " id="estatus_archivo" name="estatus_archivo">
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
                                <h1 class="text-primary">Archivos Municipios</h1>
                                <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                    <button type="button" id="agregarPublicacion" class="btn btn-success" data-toggle="modal" data-target="#agregarDocumentoModal">Agregar Archivo</button>

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
                                            <th>Fecha</th>
                                            <th>Municipio</th>
                                            <th>Tipo</th>
                                            <th>Categoría</th>
                                            <th>Palabras Clave</th>
                                            <th>Estatus</th>
                                            <th>Fecha última modificación</th>
                                            <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th>Editar</th>
                                            <?php endif; ?>
                                            <th>Archivo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($archivos == !null) : ?>
                                            <?php
                                            foreach ($archivos as $arc) : ?>
                                                <tr>
                                                    <td><?= $arc['id_archivo'] ?>
                                                    <td><?= $arc['nombre_archivo']; ?></th>
                                                    <td><?= $arc['fecha_archivo']; ?></th>
                                                    <td><?= $arc['nombre']; ?></th>
                                                    <td><?= $arc['categoria_archivo']; ?></th>
                                                    <td><?= $arc['tipo_archivo']; ?></th>
                                                    <td><?= $arc['palabras_clave']; ?></td>
                                                    <td><?php if ($arc['estatus_archivo'] == 'A') : ?>
                                                            <h5><span class="badge text-bg-success">Activo
                                                                <?php endif ?></span></h5>
                                                            <?php if ($arc['estatus_archivo'] == 'B') : ?>
                                                                <h5><span class="badge text-bg-danger">Inactivo
                                                                    <?php endif ?></span></h5>
                                                    </td>
                                                    <td><?= $arc['fecha_modificacion']; ?></th>
                                                        <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                    <td><a href="<?= base_url('/municipios-admin/editArchivo/' . $arc['id_archivo']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a></td>
                                                <?php endif ?>
                                                <td><?php if ($arc['archivo'] == !null) : ?><a href="<?php echo base_url('documentos_municipios/' . $arc['id_municipio'] . '/' . $arc['archivo']) ?>" download="<?php $arc['archivo'] ?>" class="btn btn-success btn-sm">
                                                            Descargar</a></td>
                                            <?php endif; ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <section>
        <!-- AGREGAR ARCHIVO-->
        <form method="POST" action="<?php echo base_url('/estadisticas-admin/createEstadoArchivo') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarDocEstado" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Nuevo Archivo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Nombre:</label>
                                <p style="color: red;">Escriba un nombre descriptivo, ya que este será mostrado al usuario.</p>
                                <input type="text" maxlength="255" class="form-control" name="nombre" id="nombre" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Fecha del documento:</label>
                                <input type="date" class="form-control" name="fecha" id="fecha" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el tipo:</label>
                                <select class="form-select form-control " id="tipo_archivo" name="tipo_archivo">
                                    <option value="Mapa">Mapa</option>
                                    <option value="Tabla">Tabla</option>
                                    <option value="Gráfica">Gráfica</option>
                                    <option value="Infografía">Infografía</option>
                                    <option value="Resultados">Resultados</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Palabras clave:</label>
                                <p style="color: red;">Escriba 3 palabras clave que ayuden a localizar e identificar el archivo.</p>
                                <input type="text" maxlength="55" class="form-control" name="palabras_clave" id="palabras_clave" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione la categoría:</label>
                                <select class="form-select form-control " id="categoria_archivo" name="categoria_archivo">
                                    <option value="Derechos Humanos">Derechos Humanos</option>
                                    <option value="Economía">Economía</option>
                                    <option value="Educación">Educación</option>
                                    <option value="Empleo">Empleo</option>
                                    <option value="Familia">Familia</option>
                                    <option value="Gobernanza">Gobernanza</option>
                                    <option value="Población">Población</option>
                                    <option value="Salud">Salud</option>
                                    <option value="Seguridad">Seguridad</option>
                                    <option value="Tecnología">Tecnología</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estado:</label>
                                <select class="form-select form-control " id="id_estado" name="id_estado">
                                    <?php foreach ($estado as $mun) : ?>
                                        <option value="<?= $mun['id_estado']; ?>"><?= $mun['nombre']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Subir Archivo:</label>
                                <input id="elegiraArchivo" class="form-control" name="archivo" id="archivo" type="file" style="color:#4469C5;" /><br />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estatus:</label>
                                <select class="form-select form-control " id="estatus_archivo" name="estatus_archivo">
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
                                <h1 class="text-primary">Archivos Entidades Federativas</h1>
                                <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarDocEstado">Agregar Archivo</button>

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
                                            <th>Fecha</th>
                                            <th>Municipio</th>
                                            <th>Tipo</th>
                                            <th>Categoría</th>
                                            <th>Palabras Clave</th>
                                            <th>Estatus</th>
                                            <th>Fecha última modificación</th>
                                            <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th>Editar</th>
                                            <?php endif; ?>
                                            <th>Archivo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($archivosEstado == !null) : ?>
                                            <?php
                                            foreach ($archivosEstado as $arc) : ?>
                                                <tr>
                                                    <td><?= $arc['id_archivo'] ?>
                                                    <td><?= $arc['nombre_archivo']; ?></th>
                                                    <td><?= $arc['fecha_archivo']; ?></th>
                                                    <td><?= $arc['nombre']; ?></th>
                                                    <td><?= $arc['categoria_archivo']; ?></th>
                                                    <td><?= $arc['tipo_archivo']; ?></th>
                                                    <td><?= $arc['palabras_clave']; ?></td>
                                                    <td><?php if ($arc['estatus_archivo'] == 'A') : ?>
                                                            <h5><span class="badge text-bg-success">Activo
                                                                <?php endif ?></span></h5>
                                                            <?php if ($arc['estatus_archivo'] == 'B') : ?>
                                                                <h5><span class="badge text-bg-danger">Inactivo
                                                                    <?php endif ?></span></h5>
                                                    </td>
                                                    <td><?= $arc['fecha_modificacion']; ?></th>
                                                        <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                    <td><a href="<?= base_url('/municipios-admin/editArchivoEstado/' . $arc['id_archivo']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a></td>
                                                <?php endif ?>
                                                <?php if ($arc['archivo'] == !null) : ?>
                                                    <td><a href="<?php echo base_url('documentos_estados/' . $arc['id_estado'] . '/' . $arc['archivo']) ?>" download="<?php $arc['archivo'] ?>" class="btn btn-success btn-sm">
                                                            Descargar</a></td>
                                                <?php endif; ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif ?>
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
            swal('', 'Archivo actualizado con éxito', 'success');
        } else if (mensaje == '2') {
            swal('', 'Archivo creado con éxito', 'success');
        } else if (mensaje == '3') {
            swal('', 'El estatus es requerido', 'error');
        } else if (mensaje == '4') {
            swal('', 'Archivo eliminado correctamente', 'success');
        } else if (mensaje == '5') {
            swal('', 'Tema de municipio creado con éxito', 'success');
        } else if (mensaje == '6') {
            swal('', 'Tema de municipio actualizado con éxito', 'success');
        }
    </script>
    <script>
        new DataTable('#dataTable');
    </script>
</body>


</html>