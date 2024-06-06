<!DOCTYPE html>
<html lang="es">

<head>
    
    <title>CENDOC</title>
    <!-- Mobile Specific Metas
            ================================================== -->
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="public/plugins/bootstrap/bootstrap.min.css">
    <!-- Ionicons Fonts Css -->
    <link rel="stylesheet" href="public/plugins/ionicons/ionicons.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="public/plugins/animate-css/animate.css">
    <!-- Hero area slider css-->
    <link rel="stylesheet" href="public/plugins/slider/slider.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="public/plugins/slick/slick.css">
    <!-- Fancybox -->
    <link rel="stylesheet" href="public/plugins/facncybox/jquery.fancybox.css">
    <!-- hover -->
    <link rel="stylesheet" href="public/plugins/hover/hover-min.css">

    <!-- template main css file -->
    <link rel="stylesheet" href="public/css/style.css">

</head>

<body style="background-image: url('images/FONDO.jpg')">

    <?= view('components/NavbarAdmin.php'); ?>

    <!-- ================================= MUNICIPIOS ===================================================== -->

    <!-- VER MUNICIPIOS -->
    <div class="container" style="margin-top: 30vh;" id="search">
        <div class="row">
            <div class="container-fluid">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="head">
                            <h1 class="text-primary">Lista de Municipios</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>PDF General</th>
                                        <th>Fecha última modificación</th>
                                        <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                            <th>Editar</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($municipio as $m) : ?>
                                        <tr>
                                            <td><?= $m['id_municipio'] ?></th>
                                            <td><?= $m['nombre']; ?></th>
                                            <th><?php if ($m['pdf'] == !null) : ?><a href="<?php echo base_url('documentos_municipios/' . $m['id_municipio'] . '/' . $m['pdf']) ?>" download="<?php $m['pdf'] ?>" class="btn btn-success btn-sm">
                                                        Descargar</a><?php endif ?></th>
                                            <td><?= $m['Fecha_Captura']; ?></th>
                                                <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                            <th><a href="<?= base_url('estadisticas/edit/' . $m['id_municipio']); ?>"><img width="40" height="40" class="edit" src="images/icons/edit.svg"></a>
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
            swal('', 'Municipio actualizado con éxito', 'success');
        } else if (mensaje == '2') {
            swal('', 'Municipio creado con éxito', 'success');
        } else if (mensaje == '3') {
            swal('', 'El estatus es requerido', 'error');
        } else if (mensaje == '4') {
            swal('', 'Municipio eliminado correctamente', 'success');
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