<!DOCTYPE html>
<html lang="es">

<head>
    <title>Consejo</title>

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
            <h1><span class="badge bg-primary">Sistema juventudEsGto</span></h1>
        </center>
    </div>

    <section id="sajg" class="mb-5 animate__animated animate__fadeIn">
        
        <div class="container" style="margin-top: 5vh;">
            <div class="accordion" id="accordionPanelsStayOpenExample">

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" style="font-weight: bolder;" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            SISTEMA PARA EL DESARROLLO Y ATENCIÓN A LAS JUVENTUDES DEL ESTADO GUANAJUATO
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body row">
                            <div class=" col-lg-6 col-md-6 col-xl-6 col-sm-auto">
                                <strong>¿Qué es?</strong>
                                <br>
                                <?php echo $general[0]['significado'] ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-auto">
                                <strong>¿Cual es el objetivo?</strong>
                                <br>
                                <?php echo $general[0]['objetivoS'] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item" id="informacion">
                    <h2 class="accordion-header">
                        <button class="accordion-button" style="font-weight: bolder;" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            SISTEMA DE INFORMACIÓN E INVESTIGACIÓN PARA EL DESARROLLO Y ATENCIÓN A LAS JUVENTUDES DEL ESTADO DE GUANAJUATO.
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
                        <div class="accordion-body row">

                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-auto">
                                <strong>¿Qué es?</strong>
                                <?php foreach (explode(";", $general[0]['significadoSI']) as $item) : ?>
                                    <p>
                                        <?= $item ?>
                                    </p>
                                <?php endforeach; ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-auto">
                                <strong>¿Cual es el objetivo?</strong>
                                <br>
                                <?php echo $general[0]['objetivoSI'] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item" id="consejo">
                    <h2 class="accordion-header">
                        <button class="accordion-button" style="font-weight: bolder;" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            CONSEJO ESTATAL PARA APOYOS, ATENCIÓN E INFORMACIÓN PARA LAS JUVENTUDES DEL ESTADO DE GUANAJUATO
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <strong>Objetivo</strong>
                            <?php foreach (explode(".", $general[0]['obejtivoC']) as $item) : ?>
                                <p>
                                    <?= $item ?>
                                </p>
                            <?php endforeach; ?>
                            <div class="row">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="button" class="btn btn-primary btn-lg" style="margin: 10px auto 10px auto;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Sesiones Ordinarias
                                    </button>

                                </div>
                            </div>
                            <div class="row">
                                <img src="<?php echo base_url('images_sajg/' . $general[0]['id_general'] . '/' . $general[0]['imagenConsejo']) ?>">
                            </div>
                            <hr class="my-4">
                            <div class="row">
                                <div class="row">
                                    <h5 class="display-6">Integrantes del Consejo</h5>
                                    <p class="lead">El Consejo Estatal es un órgano colegiado de deliberación, consulta,
                                        asesoría y participación social, con carácter interinstitucional, coadyuvante
                                        en el diseño, planeación, programación, instrumentación y evaluación de la
                                        política estatal de atención y desarrollo de las juventudes.</p>
                                    <div>
                                        <p class="lead">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table style="margin: 0 auto 0 auto; background-color: white;" class="table table-bordered" id="dataTable" width="75%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Foto</th>
                                                            <th>Nombre</th>
                                                            <th>Cargo Institucional</th>
                                                            <th>Cargo Consejo</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($integrantes as $int) : ?>
                                                            <tr>
                                                                <td><img class="img-fluid" style="max-width: 7vw;" src="<?php echo base_url('images_integrantesconsejo/' . $int['id_integrante'] . '/' . $int['imagen']) ?>" alt="<?= $int['cargo'] ?>" title="<?= $int['nombre'] ?>"></td>
                                                                <td style="font-size: large; max-width: 7vw;"><?= $int['nombre']; ?></td>
                                                                <td style="font-size: large; max-width: 10vw;"><?= $int['cargo']; ?></td>
                                                                <td style="font-size: large; max-width: 7vw;"><?= $int['cargo_consejo']; ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item" id="programa">
                    <h2 class="accordion-header">
                        <button class="accordion-button" style="font-weight: bolder;" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                            Programa Estatal para el Desarrollo y Atención a las Juventudes del Estado de Guanajuato
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show">
                        <div class="row accordion-body">

                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-auto">
                                <strong>¿Qué es?</strong>
                                <br>
                                <?php echo $general[0]['objetivoP'] ?>
                                <center class="my-3">
                                    <img style="max-width: 30vw;" src="<?php echo base_url('images_sajg/' . $general[0]['id_general'] . '/' . $general[0]['imagenPrograma']) ?>">
                                </center>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-auto">
                                <strong>¿Cómo se construyó?</strong>
                                <br>
                                <?php foreach (explode(";", $general[0]['contruccion']) as $item) : ?>
                                    <p>
                                        <?= $item ?>
                                    </p>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="accordion-item" id="apoyo">
                    <h2 class="accordion-header">
                        <button class="accordion-button" style="font-weight: bolder;" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                            SISTEMA ÚNICO DE BECAS
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show">
                        <div class="row accordion-body">
                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-auto">
                                <strong>¿Qué es?</strong>
                                <br>
                                <?php echo $general[0]['significadoAF'] ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-auto">
                                <strong>¿Cual es el objetivo?</strong>
                                <br>
                                <?php echo $general[0]['objetivoAF'] ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <!-- Modal PDFS -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sesiones Ordinarias</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php foreach ($generalPDF as $gp) : ?>
                        <center>
                            <div class="list-group" style=" margin-top:10px;">
                                <a target="_blank" href="<?php echo base_url('documentos_sajg_pdf/' . $gp['id_pdfs'] . '/' . $gp['pdf']) ?>" class="list-group-item list-group-item-action list-group-item-primary">
                                    <i class="ion-document-text" style="font-size: 20px; margin-right:7px;"></i> <i style="font-size: 20px;"><?= $gp['nombre'] ?></i>
                                </a>
                            </div>
                        </center>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>



    <?= view('components/Footer.php'); ?>

</body>

</html>