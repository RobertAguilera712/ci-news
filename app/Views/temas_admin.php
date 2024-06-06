<!DOCTYPE html>
<html lang="es">

<head>
    <title>Temas</title>
    <?= view('components/HeadAdmin.php'); ?>
</head>

<body style="background-image: url('images/FONDO.jpg')">

    <?= view('components/NavbarAdmin.php'); ?>


    <section style="margin-top: 30vh;">
        <!--Modal Agregar nuevo tema-->
        <form method="POST" action="<?php echo base_url('temas/createTema') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarTemaN" tabindex="-1" role="dialog" aria-labelledby="temaTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="temaTitle">Agregar Tema</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Nombre:</label>
                                <input name="nombre" maxlength="255" class="form-control" id="nombre" cols="30" rows="3" required>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Link:</label>
                                <input name="link" class="form-control" id="link" cols="30" rows="3" required>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Descripcion:</label>
                                <textarea name="descripcion" maxlength="500" class="form-control" id="descripcion" cols="30" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Subir Imagen que hace referencia al tema:</label>
                                <input class="form-control" name="imagen" id="imagen" type="file" style="color:#4469C5;" /><br />
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


        <!--Tabla de tema-->
        <div class="container" id="search">
            <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Lista de Temas</h1>
                                <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                    <button type="button" id="agregarTema" class="btn btn-success" data-toggle="modal" data-target="#agregarTemaN">Agregar Tema</button>

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
                                            <th>Descripcion</th>
                                            <th>Imagen</th>
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
                                        foreach ($datos as $t) : ?>
                                            <tr>
                                                <td><?= $t['id_tema'] ?></th>
                                                <td><?= $t['descripcionTema']; ?></th>
                                                <td><?= $t['descripcionMas']; ?></th>
                                                <th><img src="<?php echo base_url('images_temas/' . $t['id_tema'] . '/' . $t['imagen']) ?>" width="100" alt="juventud"></th>
                                                <th><?php if ($t['link'] == !null) : ?>
                                                        <a href="<?= $t['link'] ?>" target="_blank" class="btn btn-success" style="margin: 5px">Ver más</a><?php endif ?>
                                                </th>
                                                <th><?php if ($t['estatusTema'] == 'A') : ?>
                                                        <h5><span class="badge text-bg-success">Activo
                                                            <?php endif ?></span></h5>
                                                        <?php if ($t['estatusTema'] == 'B') : ?>
                                                            <h5><span class="badge text-bg-danger">Inactivo
                                                                <?php endif ?></span></h5>
                                                </th>
                                                <td><?= $t['fecha_modificacionTema']; ?></th>
                                                    <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                <th><a href="<?= base_url('temas/edit/' . $t['id_tema']); ?>"><img width="40" height="40" class="edit" src="images/icons/edit.svg"></a>
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
    <!-- Button trigger modal -->


    <?= view('components/Footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>



    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';
        if (mensaje == '1') {
            swal('', 'Tema actualizado con éxito', 'success');
        } else if (mensaje == '2') {
            swal('', 'Tema creado con éxito', 'success');
        } else if (mensaje == '3') {
            swal('', 'El estatus es requerido', 'error');
        } else if (mensaje == '4') {
            swal('', 'Tema eliminado con éxito', 'success');
        }
    </script>
    <script>
        new DataTable('#dataTable');
    </script>
</body>


</html>