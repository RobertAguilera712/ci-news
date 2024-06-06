<!DOCTYPE html>
<html lang="es">

<head>

    <title>Centro Documental</title>
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
            <h1><span class="badge bg-primary">Centro Documental</span></h1>
        </center>
    </div>

    <section class="animate__animated animate__fadeIn">

        <div class="container mt-5">
            <h2 class="animate__animated animate__fadeInDown" style="font-size: 25px; text-transform: none; color:#000F9F;">
                <b>¿Qué es el Centro Documental?</b>
            </h2>
            <br>
            <h2 class="animate__animated animate_fadeIn" style="background-color: white; font-size: 15px; text-transform: none; margin-top: -20px;">
                El Centro Documental es la unidad especializada en la recopilación, preservación y
                difusión de información sobre diagnósticos, artículos científicos, investigaciones y
                política pública resultado de actividades realizadas por instituciones públicas y
                privadas locales, nacionales e internacionales, con el objetivo de ser consultadas,
                referenciadas y usadas, para la reflexión o generación de nuevo conocimiento.
                <br>
                El Sistema de Información e Investigación pone a disposición el Cendoc, que
                proporciona información oportuna y actualizada en materia de juventud a todos los
                usuarios interesados en realizar investigación sobre la temática y la realidad de la
                juventud en sus diversos contextos.
            </h2>

        </div>


        <div class="container mb-5 mt-5" style="width: 100%; margin: 0 auto 15% auto;">
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary" style="font-size: 1.5rem; width: 90%; height: 10vh;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDigital" onclick="toggleCollapse('collapseDigital', 'collapseFisico')" aria-expanded="false" aria-controls="collapseDigital">
                        Cendoc Digital
                    </button>
                </div>
                <div class="col">
                    <button class="btn btn-primary" style="font-size: 1.5rem; width: 90%; height: 10vh;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFisico" onclick="toggleCollapse('collapseFisico', 'collapseDigital')" aria-expanded="false" aria-controls="collapseFisico">
                        Cendoc Físico
                    </button>
                </div>
            </div>

            <!-- Tabla Físicos -->
            <div class="collapse mb-5 mt-3" id="collapseFisico">
                <div class="card card-body">
                    <h1 class="text-primary">Físico</h1>
                    <div class="container" style="width: 50%; margin: 0 auto 0 auto;">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#reglamento">
                                    Ver Reglamento
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#mapa">
                                    ¿Cómo llegar?
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#instrucciones">
                                    Solicitud
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="container mt-1">
                        <table id="fisicos" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Clave</th>
                                    <th>Título</th>
                                    <th>Ejemplares</th>
                                    <th>Estatus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($documentosFisicos as $d) : ?>
                                    <tr>
                                        <td><?= $d['clave'] ?></td>
                                        <td class="text-capitalize"><?= $d['titulo']; ?></td>
                                        <td><?= $d['ejemplares']; ?></td>
                                        <td><?php if ($d['estatus'] == 'A') : ?>
                                                <h5><span class="badge text-bg-success">Disponible
                                                    <?php endif ?></span></h5>
                                                <?php if ($d['estatus'] == 'B') : ?>
                                                    <h5><span class="badge text-bg-danger">No disponible
                                                        <?php endif ?></span></h5>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Tabla Digitales -->
            <div class="collapse mb-5 mt-3" id="collapseDigital">
                <div class="card card-body">
                    <h1 class="text-primary">Digital</h1>
                    <div class="container mt-1">
                        <table id="digitales" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Autor</th>
                                    <th>Fecha</th>
                                    <th>Categoría</th>
                                    <th>Archivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($documentos as $item) : ?>
                                    <tr>
                                        <td><?= $item['nombre_documento'] ?></td>
                                        <td><?= $item['descripcion_documento'] ?></td>
                                        <td><?= $item['autor_documento'] ?></td>
                                        <td><?php $fecha = $item['fecha_documento'];
                                            if ($fecha == !NULL) {
                                                $nuevaFecha = date("d-m-Y", strtotime($fecha));
                                                echo $nuevaFecha;
                                            } else {
                                                echo "Sin fecha";
                                            }
                                            ?></td>
                                        <td><?= $item['nombre_categoria_cendoc']; ?></td>
                                        <td><?php if ($item['archivo_documento'] == !null) : ?>
                                                <a href="<?php echo base_url('documentos_cendoc/' . $item['id_documento'] . '/' . $item['archivo_documento']) ?>" target="_blank" class="btn btn-success btn-lg" style="margin: 5px; font-size: .9rem;">Ver documento</a>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Modal mapa -->
    <section>
        <div class="modal fade" id="mapa" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="publicacionTitle">¿Cómo llegar?</h5>
                        <button type="button" class="close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">X</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3722.4657120323905!2d-101.67020922553252!3d21.093991385536476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842bbfeda8d63b17%3A0xe19a4b8fd793a7e3!2sJuventudEsGto!5e0!3m2!1ses!2smx!4v1683220443330!5m2!1ses!2smx" style="border:0; min-width: 100%; min-height: 70vh;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="modal-footer">

                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--Modal Intrucciones -->
    <section>
        <div class="modal fade" id="instrucciones" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="publicacionTitle">Solicitud de préstamo</h5>
                        <button type="button" class="close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">X</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="jumbotron text-justify">
                                <h1 class="display-8">Instrucciones</h1>
                                <p class="lead">
                                    Para poder solicitar el préstamo de un documento, se deben realizar ciertos pasos
                                    bastante sencillos descritos a continuación:
                                </p>

                                <hr class="my-4">
                                <p class="lead">
                                <ol>
                                    <li>Verificar que el documento se encuentre disponible.</li>
                                    <li>Descargar el formato de solicitud de prestamo desde
                                        el botón "Descargar Solicitud" que se encuentra en la tabla de los documentos o
                                        <a href="<?php echo base_url('documentos_cendoc/Solicitud_Prestamo.pdf') ?>" download="Solicitud_Prestamo.pdf">
                                            aquí
                                        </a>.
                                    </li>
                                    <li>Imprimir el formato y llenar a mano los datos personales: Nombre (Completo), Dirección a la que pertenece (Opcional),
                                        Area especifica (Opcional), Correo electrónico, Teléfono celular. </li>
                                    <li>Acudir al instituto JuventudEsGTO con el formato impreso.</li>
                                </ol>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">

                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--Modal Reglamento -->
    <section>
        <div class="modal fade bd-example-modal-lg" id="reglamento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="publicacionTitle">Solicitud de préstamo</h5>
                        <button type="button" class="close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">X</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="text-justify">
                                <h1 class="display-4">Reglamento</h1>
                                <p class="text-justify">
                                    Con el propósito de reglamentar los servicios que ofrece JuventudEsGTO, la Coordinación de
                                    Política Pública pone a disposición materiales para consulta y construcción del conocimiento en el
                                    ámbito juvenil a través del “Centro Documental de Política Pública”, siendo éstos, libros,
                                    artículos bibliográficos, audiográficos, videográficos y de folletería para optimizar los recursos y
                                    actividades de carácter formativo, de promoción, investigación y política pública, que satisfacen las
                                    necesidades de información sobre la juventud que tenemos en el país y en particular en Guanajuato,
                                    ayudando al personal del Instituto, a la comunidad académica y estudiantil y, al público interesado en
                                    el tema.
                                </p>
                                <p class="text-justify">
                                    Por consiguiente se considera como usuario interno a los integrantes del JuventudEsGTO y
                                    como usuario externo, al público o instituciones cuyos intereses se relacionen con el área de juventud.
                                </p>
                                <p class="text-justify">
                                    Los usuarios podrán hacer uso de los servicios del Centro Documental de Política Pública a
                                    través de la Coordinación de Política Pública mediante una solicitud de préstamo y apegándose
                                    a lo siguiente:
                                </p>
                                <hr class="my-4">
                                <p class="lead">
                                <ol>
                                    <li>El préstamo de materiales se realizará durante días hábiles en que se labore en JuventudEsGTO.</li>
                                    <li>Se prestará el material solo al personal del Instituto. Los usuarios externos deberán solicitarlo a través del personal del Instituto, quedando éste como responsable directo del préstamo.</li>
                                    <li>El interesado deberá llenar un formato de solicitud con el visto bueno de la Coordinación de Política Pública. </li>
                                    <li>El material podrá ser prestado hasta por un mes y deberá entregarlo en las mismas condiciones en las que lo recibió. </li>
                                    <li>Pasado el tiempo de préstamo, el interesado deberá realizar nuevamente otra solicitud para renovar su préstamo.</li>
                                    <li>El interesado podrá acceder de 1 a 3 materiales por solicitud.</li>
                                    <li>No se podrán hacer 2 solicitudes por la persona; antes deberá solventar el primer préstamo.</li>
                                    <li>Se deberá evitar poner objetos voluminosos sobre el material didáctico.</li>
                                    <li>Se deberá evitar de cualquier forma señalarlos físicamente con plumas, lápices u otras marcas.</li>
                                    <li>Se deberá evitar transferir los préstamos a terceras personas.</li>
                                    <li>Si el material presentará algún daño cuando sean devueltos (mutilaciones, quemaduras rayaduras u otros), deberá notificarlo a la coordinación y correrá por cuenta del usuario su reparación o reposición bajo los siguientes lineamientos:
                                        <ul>
                                            <li>a) Reponerlo en un plazo máximo de quince días, ya sea con otro ejemplar igual al perdido o cubriendo el valor comercial del mismo.</li>
                                            <li>b) Si la edición estuviera agotada, tendrá que reponerlo con otra del mismo tema o valor que le designará la Coordinación y/o pagará un cargo de similar catalogación del nuevo título.</li>
                                        </ul>
                                    </li>
                                    <li>Cualquier información no contemplada en el presente reglamento, sera informada por la Coordinación de Política Pública .</li>
                                </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <?= view('components/Footer.php'); ?>


    <script>
        $(`#collapseDigital`).collapse('show');

        function toggleCollapse(showId, hideId) {
            $(`#${hideId}`).collapse('hide');
            $(`#${showId}`).collapse('show');
        }
    </script>

    <script type="text/javascript">
        let mensaje = ' <?php echo $mensaje ?>';
        if (mensaje.includes('1')) {
            swal({
                text: "No se encontraron coincidencias.",
                icon: "error"
            });
        } else if (mensaje.includes('2')) {
            swal({
                text: "Llene los campos deseados a buscar.",
                icon: "error"
            });
        } else if (mensaje.includes('3')) {
            swal({
                text: "No hay documento con el tema seleccionado.",
                icon: "error"
            });
        } else if (mensaje.includes('4')) {
            $(document).ready(function() {
                $('#CENDOCDigital').modal('show');
            });
        }
    </script>

    <script>
        new DataTable('#digitales');
        new DataTable('#fisicos');
        $(document).ready(function() {
            $('#CENDOCDigital').on('shown.bs.modal', function() {
                $.ajax({
                    url: '<?= site_url("/cendoc/agregarVisitaCendocDigital") ?>',
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>

</body>

</html>