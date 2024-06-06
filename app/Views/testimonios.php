<!DOCTYPE html>
<html lang="es">

<head>

    <title>Testimonios</title>
    <?= view('components/HeadAdmin.php'); ?>
</head>

<body style="background-image: url('images/FONDO.jpg'); ">

        <?= view('components/NavbarAdmin.php'); ?>

    <!-- Testimonios-->
    <div class="container" id="search" style="margin-top: 30vh;">
        <div class="row">
            <div class="container-fluid">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="head">
                            <h1 class="text-primary">Lista de Testimonios</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTableTestimonios" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre Completo</th>
                                        <th>Testimonio</th>
                                        <th>Imagen</th>
                                        <th>Municipio</th>
                                        <th>Correo</th>
                                        <th>Teléfono:</th>
                                        <th>Estatus</th>
                                        <th>Fecha última modificación</th>
                                        <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                            <th>Editar</th>
                                            <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach($testimonios as $t):?>
                                    <tr>
                                        <td><?=$t['id_testimonios'] ?></th>
                                        <td><?=$t['nombreM'];?></th>
                                        <td style="font-size: 0.7rem;"><?=$t['descripcion'];?></th>
                                        <td><img src="<?php echo base_url('images_testimonios/'.$t['id_testimonios'].'/'.$t['imagenT'])?>"
                                                width="100" alt="juventud"></td>
                                        <td><?=$t['nombre'];?></th>
                                        <td><?=$t['correo'];?></th>
                                        <td><?=$t['telefono'];?></th>
                                        <td><?php if($t['estatus']=='A'): ?>
                                            <h5><span class="badge text-bg-success">Activo
                                                    <?php endif ?></span></h5>
                                            <?php if($t['estatus']=='B'): ?>
                                            <h5><span class="badge text-bg-danger">Inactivo
                                                    <?php endif ?></span></h5>
                                        </td>
                                        <td><?=$t['fecha_modificacion'];?></th>
                                        <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                            <th><a
                                            href="<?= base_url('testimonio/editTestimonio/'.$t['id_testimonios']);?>"><img
                                            width="40" height="40" class="edit" data-toggle="modal"
                                            data-target="#modalEditar" src="images/icons/edit.svg"></a>
                                        </th>
                                        <?php endif; ?>

                                    </tr>
                                    <?php endforeach;?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?= view('components/Footer.php'); ?>


    
    <script type="text/javascript">
    let mensaje = '<?php echo $mensaje ?>';
    if (mensaje == '1') {
        swal('', 'Encuesta actualizada con éxito', 'success');
    } else if (mensaje == '2') {
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
    <script src="<?php echo base_url('plugins/wow-js/wow.min.js')?>  "></script>

    <script>
    new DataTable('#dataTableTestimonios');
    </script>
</body>


</html>