<!DOCTYPE html>
<html lang="es">

<head>

    <title>Banco de datos</title>
    <?= view('components/HeadAdmin.php'); ?>
</head>

<body style="background-image: url('images/FONDO.jpg');  ">

    <?= view('components/NavbarAdmin.php'); ?>

    <section style="margin-top: 30vh;">


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
                                <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                    <div class="row">
                                        <div class="col">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarCategoria">Agregar Categoría</button>
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
                                                <td><?= $cat['fecha_modificacion']; ?></th>
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
        let mensaje = '<?= session()->getFlashdata('mensaje') ?>';
        let type = '<?= session()->getFlashdata('type') ?>';
        if (mensaje.length > 0) {
            swal('', mensaje, type);
        }
        // if (mensaje == '1') {
        // } else if (mensaje == '2') {
        //     swal('', 'Categoría agregada con éxito', 'success');
        // } else if (mensaje == '3') {
        //     swal('', 'Estatus es requerido', 'error');
        // } else if (mensaje == '4') {
        //     swal('', 'Ya existe una gráfica con el mismo nombre', 'error');
        // } else if (mensaje == '5') {
        //     swal('', "<?php echo session()->getFlashdata('message') ?>", 'success');
        // } else if (mensaje == '6') {
        //     swal('', 'Archivo es requerido o excede los 3 Mb', 'error');
        // } else if (mensaje == '7') {
        //     swal('', 'Portada es requerida o excede los 3 Mb', 'error');
        // } else if (mensaje == '8') {
        //     swal('', 'Datos actualizados', 'success');
        // } else if (mensaje == '9') {
        //     swal('', 'Artículo agregado con éxito', 'success');
        // } else if (mensaje == '10') {
        //     swal('', 'Artículo actualizado con éxito', 'success');
        // } else if (mensaje == '11') {
        //     swal('', 'Imagen es requerida o excede los 3 Mb', 'error');
        // }
    </script>
    <script>
        // new DataTable('#dataTable');
        // new DataTable('#dataTableArticulos');
    </script>


</body>


</html>