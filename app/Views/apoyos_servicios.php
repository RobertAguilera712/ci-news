<!DOCTYPE html>
<html lang="es">

<head>
    <title>Apoyos y Servicios</title>

    <?= view('components/Head.php'); ?>

</head>

<body>
    <?= view('components/FondoAnimadoCuadros.php'); ?>

    <?= view('components/Topbar.php'); ?>
    <?= view('components/Navbar.php',  ['interfazConfig' => $_SESSION['interfazConfig']]); ?>
    <?= view('components/BotonFlotante.php'); ?>
    <?= view('components/BotonContactanos.php'); ?>

    <div class="container">
        <center style="margin: 22vh auto 1vh auto;" class="animate__animated animate__fadeInDown">
            <h1><span class="badge bg-primary">Apoyos y Servicios</span></h1>
            <div class="btn btn-primary btn-lg heartbeat" style="margin: 5% auto 0 auto;">
                <a class="nav-link" href="https://juventudesgto.guanajuato.gob.mx/index.php/convocatorias/" id="navbarDropdown" role="button" style="color: white;" target="_blank" aria-haspopup="true" aria-expanded="false">
                    Convocatorias Activas
                </a>
            </div>
        </center>
    </div>

    <!-- <section class="animate__animated animate__fadeIn">
        <div class="container" style=" color: #000000; ">
            <nav class="" style="z-index: 1;">
                <form class="form-inline" method="POST" action="<?php echo base_url('apoyos/buscar') ?>">
                    <div class="container" style="margin-top: 30px;">
                        <div class="row  mb-3">
                            <div class="col">
                                <select class="form-select form-control" name="tema">
                                    <option disabled selected>Tema</option>
                                    <?php foreach ($datosT as $t) : ?>
                                        <option value="<?= $t['id_tema']; ?>"><?= $t['descripcionTema']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select form-control" name="derecho">
                                    <option disabled selected>Derecho social</option>
                                    <?php foreach ($datosDS as $ds) : ?>
                                        <option value="<?= $ds['id_derecho']; ?>"><?= $ds['descripcion']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select form-control" name="dependencia">
                                    <option disabled selected>Dependencia</option>
                                    <?php foreach ($datosD as $d) : ?>
                                        <option value="<?= $d['id_dependencia']; ?>"><?= $d['descripcion_D']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select form-control mr-sm-2" name="apoyo">
                                    <option disabled selected>Tipo de Apoyo</option>
                                    <?php foreach ($datosTS as $ts) : ?>
                                        <option value="<?= $ts['id_tipo_apoyo']; ?>"><?= $ts['descripcion_A']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col">
                                <input class="form-control mr-sm-2" type="input" name="año" placeholder="Año" aria-label="Año">
                            </div>
                            <div class="col">
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </nav>
        </div>
    </section>
    <section id="tabla" class="animate__animated animate__fadeIn" data-wow-delay="0.5s">
        <div class="container">
            <table id="example" class="table table-striped table-bordered" style="width:100%;">
                <thead>
                    <tr>
                        <th>Orden de gobierno</th>
                        <th>Dependencia</th>
                        <th>Programa Social</th>
                        <th>Estatus</th>
                        <th>Año</th>
                        <th>Objetivo General</th>
                        <th>Población Objetivo</th>
                        <th>Limite de edad</th>
                        <th>Tipo de apoyo</th>
                        <th>Monto anual del apoyo económico</th>
                        <th>Responsable/Enlace del programa</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Página web</th>
                        <th>Normatividad</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($todosApoyoS as $a) : ?>
                        <tr>
                            <td><?= $a['orden_gobierno']; ?></th>
                            <td><?= $a['descripcion_D']; ?></th>
                            <td><?= $a['programa_Social']; ?></th>
                            <th>
                                <?php if ($a['estatus_apoyo'] == 'A') : ?>
                                    <h5><span class="badge text-bg-success">Activo<?php endif ?></span></h5>
                                    <?php if ($a['estatus_apoyo'] == 'B') : ?>
                                        <h5><span class="badge text-bg-danger">Inactivo<?php endif ?></span></h5>
                            </th>
                            <td><?= $a['año'] ?></th>
                            <td><?= $a['objetivo_General']; ?></th>
                            <td><?= $a['poblacion_Objetivo'] ?></th>
                            <td><?= $a['rango_Edad']; ?></th>
                            <td><?= $a['descripcion_A'] ?></th>
                            <td><?= $a['monto_Anual']; ?></th>
                            <td><?= $a['responsable'] ?></th>
                            <td><?= $a['telefono']; ?></th>
                            <td><?= $a['correo']; ?></th>
                            <th><?php if ($a['pagina_Web'] == !null) : ?><a href="<?= $a['pagina_Web']; ?>" target="_blank" class="btn btn-success btn-sm" value="<?php echo $a['pagina_Web']; ?>">
                                        Ver página web</a><?php endif ?></th>
                            <th><?php if ($a['link_normartividad'] == !null) : ?><a href="<?= $a['link_normartividad']; ?>" target="_blank" class="btn btn-success btn-sm">
                                        Ver normatividad</a><?php endif ?></th>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </section> -->

    <div class="container my-5">

        <img src="https://juventudesgto.guanajuato.gob.mx/wp-content/uploads/convocatorias-copia.jpg" class="img-fluid" alt="...">
    </div>

    <section style="margin-top: 40px;">

        <?= view('components/Footer.php'); ?>
    </section>


    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                lengthChange: false,
                scrollX: true,
                buttons: [{
                    extend: 'collection',
                    className: "btn btn-success",
                    text: 'Exportar',
                    buttons: [{
                    extend: 'copy',
                    className: "btn btn-success",
                    text: 'Portapapeles'
                },
                {
                    extend: 'pdf',
                    className: "btn btn-success",
                },
                {
                    extend: 'excel',
                    className: "btn btn-success",
                }]
                }]
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
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

    <!-- Animación Heartbeat -->
    <style>
        .heartbeat {
            -webkit-animation: heartbeat 1.5s ease-in-out infinite both;
            animation: heartbeat 1.5s ease-in-out infinite both
        }

        /* ----------------------------------------------
 * Generated by Animista on 2024-1-31 10:59:5
 * Licensed under FreeBSD License.
 * See http://animista.net/license for more info. 
 * w: http://animista.net, t: @cssanimista
 * ---------------------------------------------- */

        @-webkit-keyframes heartbeat {
            from {
                -webkit-transform: scale(1);
                transform: scale(1);
                -webkit-transform-origin: center center;
                transform-origin: center center;
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out
            }

            10% {
                -webkit-transform: scale(.91);
                transform: scale(.91);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in
            }

            17% {
                -webkit-transform: scale(.98);
                transform: scale(.98);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out
            }

            33% {
                -webkit-transform: scale(.87);
                transform: scale(.87);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in
            }

            45% {
                -webkit-transform: scale(1);
                transform: scale(1);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out
            }
        }

        @keyframes heartbeat {
            from {
                -webkit-transform: scale(1);
                transform: scale(1);
                -webkit-transform-origin: center center;
                transform-origin: center center;
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out
            }

            10% {
                -webkit-transform: scale(.91);
                transform: scale(.91);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in
            }

            17% {
                -webkit-transform: scale(.98);
                transform: scale(.98);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out
            }

            33% {
                -webkit-transform: scale(.87);
                transform: scale(.87);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in
            }

            45% {
                -webkit-transform: scale(1);
                transform: scale(1);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out
            }
        }
    </style>
</body>

</html>