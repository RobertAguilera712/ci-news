<!DOCTYPE html>
<html lang="es">

<head>
    <title>Directorio de oficinas en el extranjero</title>
    <?= view('components/Head.php'); ?>
</head>


<body>
    <?= view('components/FondoAnimadoCuadros.php'); ?>
    <?= view('components/Topbar.php'); ?>
    <?= view('components/Navbar.php',  ['interfazConfig' => $_SESSION['interfazConfig']]); ?>
    <?= view('components/BotonFlotante.php'); ?>
    <?= view('components/BotonContactanos.php'); ?>


    <section id="tabla" class="animate__animated animate__fadeIn" style="margin: 22vh;">
        <div class="container">
            <div class="row" style="margin-top:80px;">
                <?php foreach ($datos as $d) : ?>
                    <div class="col mx-auto">
                        <div class="list-group">
                            <a href="<?php echo base_url('documentos_directorio/' . $d['id_directorio'] . '/' . $d['link']) ?>" class="list-group-item list-group-item-action list-group-item-primary">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><?= $d['descripcion']; ?></h5>
                                </div>
                                <p class="mb-1"><?= $d['descripcionMas']; ?></p>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?= view('components/Footer.php'); ?>


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
    <script src="<?php echo base_url('js/particles.js') ?>"> </script>
    <script src="<?php echo base_url('js/particulas.js') ?>"> </script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js">
    </script>


    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';
        if (mensaje == '1') {
            swal('', 'No hay apoyo relacionado al derecho seleccionado', 'error');
        } else if (mensaje == '2') {
            swal('', 'No hay apoyo relacionado la dependencia seleccionada', 'error');
        } else if (mensaje == '3') {
            swal('', 'No hay apoyo con ese tema', 'error');
        } else if (mensaje == '4') {
            swal('', 'No hay apoyo con el campo seleccionado', 'error');
        } else if (mensaje == '5') {
            swal('', 'Seleccione algún campo', 'error');
        } else if (mensaje == '6') {
            swal('', 'No hay apoyo con el año seleccionado', 'error');
        }
    </script>

</body>

</html>