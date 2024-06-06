<!DOCTYPE html>
<html lang="es">

<head>
    <title>Centro Documental Físico</title>

    <?= view('components/Head.php'); ?>
</head>
<style>
    #particles-js {
        width: 100%;
        height: 100%;
        position: fixed;
        z-index: -1;
    }
</style>

<body>
    <!-- <div id="particles-js"> </div> -->

    <?= view('components/Topbar.php'); ?>
    <?= view('components/Navbar.php',  ['interfazConfig' => $_SESSION['interfazConfig']]); ?>
    <?= view('components/ToTop.php'); ?>

    <section id="hero-area" style="background-image: url('images/IMAGEN 8.jpg')">

    </section>

    <div class="container" style="width: 35%; margin: 5% auto 0 auto;">
        <div class="row">
            <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#reglamento">
                Ver Reglamento
            </button>

            <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#mapa">
                ¿Cómo llegar?
            </button>

            <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#instrucciones">
                Solicitud
            </button>
        </div>

    </div>



    <section id="table" #table name="table" style="margin-top: 20px;">
        <div class="container" id="search">
            <div class="row">
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Lista de Documentos</h1>
                                <a href="<?php echo base_url('documentos_cendoc/Solicitud_Prestamo.pdf') ?>" download="Solicitud_Prestamo.pdf" class="btn btn-success btn-sm">
                                    Descargar Solicitud
                                </a>

                            </div>
                        </div>
                        <div class="container mt-3">
                            <nav class=" navbar navbar-light bg-light">
                                <form class="form-inline" method="POST" action="<?php echo base_url('/centro-documental-fisico/clave') ?>">
                                    <input class="form-control mr-sm-2" type="input" name="clave" id="clave" placeholder="Clave" aria-label="Nombre">
                                    <button class="btn btn-primary" style="color: white;" type="submit">Buscar</button>
                                </form>
                                <form class="form-inline" method="POST" action="<?php echo base_url('/centro-documental-fisico/nombre') ?>">
                                    <input class="form-control mr-sm-2" type="input" name="nombre" id="nombre" placeholder="Título" aria-label="Nombre">
                                    <button class="btn btn-primary" style="color: white;" type="submit">Buscar</button>
                                </form>
                                <form class="form-inline" method="POST" action="<?php echo base_url('/centro-documental-fisico/editorial') ?>">
                                    <input class="form-control mr-sm-2" type="input" name="editorial" id="editorial" placeholder="Editorial" aria-label="Nombre">
                                    <button class="btn btn-primary" style="color: white;" type="submit">Buscar</button>
                                </form>
                                <form class="form" method="GET" action="<?php echo base_url('/centro-documental-fisico') ?>">
                                    <button class="btn btn-primary" style="color: white;" type="submit">Ver Todo</button>
                                </form>

                            </nav>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Clave</th>
                                            <th>Titulo</th>
                                            <th>Editorial</th>
                                            <th>Tipo</th>
                                            <th>Ejemplares</th>
                                            <th>Estatus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($documentos as $d) : ?>
                                            <tr>
                                                <td><?= $d['clave'] ?>
                                                <td class="text-capitalize"><?= $d['titulo']; ?></th>
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

    <!--Modal mapa -->
    <section>
        <div class="modal fade" id="mapa" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="publicacionTitle">¿Cómo llegar?</h5>
                        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
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
                        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
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
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="publicacionTitle">Solicitud de préstamo</h5>
                        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">X</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="jumbotron text-justify">
                                <h1 class="display-4">Reglamento</h1>
                                <p class="lead">
                                    Con el propósito de reglamentar los servicios que ofrece JuventudEsGTO, la Coordinación de
                                    Política Pública pone a disposición materiales para consulta y construcción del conocimiento en el
                                    ámbito juvenil a través del “Centro Documental de Política Pública”, siendo éstos, libros,
                                    artículos bibliográficos, audiográficos, videográficos y de folletería para optimizar los recursos y
                                    actividades de carácter formativo, de promoción, investigación y política pública, que satisfacen las
                                    necesidades de información sobre la juventud que tenemos en el país y en particular en Guanajuato,
                                    ayudando al personal del Instituto, a la comunidad académica y estudiantil y, al público interesado en
                                    el tema.
                                </p>
                                <p class="lead">
                                    Por consiguiente se considera como usuario interno a los integrantes del JuventudEsGTO y
                                    como usuario externo, al público o instituciones cuyos intereses se relacionen con el área de juventud.
                                </p>
                                <p class="lead">
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



    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/popper.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url('js/particles.js') ?>"> </script>
    <script src="<?php echo base_url('js/particulas.js') ?>"> </script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

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
                text: "Búsqueda exitosa.",
                icon: "success"
            });
        }
    </script>


</body>

</html>