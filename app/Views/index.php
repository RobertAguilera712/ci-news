<?php
if (!function_exists('base_url')) {
    // Load the URL helper
    helper('url');
}
?>
<!DOCTYPE html>
<html class="no-js">

<head>
    <title>Sistema de Atención a las Juventudes del Estado de Guanajuato</title>

    <?= view('components/Head.php'); ?>

</head>

<body>

    <?= view('components/Topbar.php'); ?>
    <?= view('components/Navbar.php',  ['interfazConfig' => $_SESSION['interfazConfig']]); ?>
    <?= view('components/ContadorFlotante.php', ['visitas' => $_SESSION['visitas'][0]]); ?>

    <?php $fecha_actual = strtotime(date('y-m-d', time())); ?>


    <!-- ENCUESTAS LARGAS -->
    <section id="questions" style=" z-index: 1; margin-top: 1%;" class="animate__animated animate__fadeIn">
        <div class="row" style="margin-top: 13vh;">
            <div class="col mx-3 my-5">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <!-- <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div> -->
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="background-color: black;">
                            <video autoplay controls muted src="https://juventudesgto.guanajuato.gob.mx/files/archivos_excedidos/video_index.mp4" class="d-block w-100" style="z-index: 99999999;"></video>
                            <!-- <img style=" opacity: 35%;" src="" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="animate__animated animate__backInDown">Inscríbete en Nuestra Convocatoria</h1>
                                <p>
                                    <a class="nav-link animate__animated animate__bounce" href="https://juventudesgto.guanajuato.gob.mx/index.php/convocatorias/" id="navbarDropdown" role="button" style="color: white;" target="_blank" aria-haspopup="true" aria-expanded="false">
                                        Conoce Nuestras Convocatorias
                                    </a>
                                </p>
                            </div> -->
                        </div>

                        <!-- <div class="carousel-item" style="background-color: black;">
                            <img style=" opacity: 35%;" src="<?php echo base_url('images/slider2.jpg') ?>" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="animate__animated animate__backInDown">Inscríbete en Nuestra Convocatoria</h1>
                                <p>
                                    <a class="nav-link animate__animated animate__bounce" href="https://juventudesgto.guanajuato.gob.mx/index.php/convocatorias/" id="navbarDropdown" role="button" style="color: white;" target="_blank" aria-haspopup="true" aria-expanded="false">
                                        Conoce Nuestras Convocatorias
                                    </a>
                                </p>
                            </div>
                        </div> -->
                        <!-- <div class="carousel-item" style="background-color: black;">
                            <img style=" opacity: 35%;" src="<?php echo base_url('images/slider3.png') ?>" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="animate__animated animate__backInDown">Inscríbete en Nuestra Convocatoria</h1>
                                <p>
                                    <a class="nav-link animate__animated animate__bounce" href="https://juventudesgto.guanajuato.gob.mx/index.php/convocatorias/" id="navbarDropdown" role="button" style="color: white;" target="_blank" aria-haspopup="true" aria-expanded="false">
                                        Conoce Nuestras Convocatorias
                                    </a>
                                </p>
                            </div>
                        </div> -->
                    </div>
                    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button> -->
                </div>
            </div>
            <!-- <div class="col col-auto my-5 mx-3">
                <div class="list-group list-group-flush">
                    <h4 style="color:#000F9F; margin-right:100px; font-size: xx-large; background-color: white; padding: 0; border-radius: 50px;">
                        Información recurrente:
                    </h4>
                    <a class="list-group-item list-group-item-action" href="<?php echo base_url('/revistas') ?>">
                        <h4>
                            Revista Voces Emergentes
                        </h4>
                    </a>
                    <a class="list-group-item list-group-item-action" href="<?php echo base_url('/investigaciones') ?>">
                    <h4>
                        Estudios JuventudEsGTO
                    </h4>
                    </a>
                    <a class="list-group-item list-group-item-action" href="<?php echo base_url('/centro-documental') ?>">
                        <h4>
                            Centro documental
                        </h4>
                    </a>
                    <a class="list-group-item list-group-item-action" href="http://curso.juventudesgto.com:8080/plataforma/" target="_blank">
                        <h4>
                            Cursos JuventudEsGTO
                        </h4>
                    </a>
                </div>
            </div> -->
        </div>
        <div class="container">
            <div class="row" style="backdrop-filter: blur(3px);">
                <?= view('components/ClmnTestimonios.php'); ?>
            </div>
            <div class="row">
                <?= view('components/ClmnEncuestasCortas.php', ['fecha_actual' => $fecha_actual]); ?>
                <?= view('components/ClmnEncuestasLargas.php', ['fecha_actual' => $fecha_actual]); ?>
            </div>
            <div class="row">
                <?= view('components/ClmnPropuestas.php'); ?>
                <?= view('components/ClmnTemasInteres.php'); ?>
            </div>
        </div>
    </section>


    <?= view('components/BotonFlotante.php'); ?>
    <?= view('components/BotonContactanos.php'); ?>

    <!-- Testimonios -->
    <!--Modal Enviar Testimonio-->
    <form method="POST" action="<?php echo base_url('encuesta/createTestimonio') ?>" enctype="multipart/form-data">
        <div class="modal fade" id="agregarNTestimonio" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="publicacionTitle">Agregar Testimonio
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label">Nombre Completo:</label>
                            <input type="text" class="form-control" name="nombreT" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Correo:</label>
                            <input type="email" class="form-control" name="correo" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Teléfono:</label>
                            <input type="numeric" maxlength="10" class="form-control" name="telefono" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Descripción:</label>
                            <textarea required maxlength="431" type="text" name="descripcionT" class="form-control" rows="10" cols="50" placeholder="Describe aquí tus experiencias positivas relacionadas con JuventudEsGto, puede ser sobre cualquier tipo de programa, evento, ayuda o tu participación en las actividades de alguna de las redes juveniles."></textarea>

                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Municipio:</label>
                            <option selected disabled value="">Seleccione un opción</option required>
                            <select class="form-select form-control" name="municipioT" required>
                                <?php foreach ($municipio as $m) : ?>
                                    <option value="<?= $m['id_municipio']; ?>"><?= $m['nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Subir Imagen:</label>
                            <input class="form-control" name="imagenT" type="file" style="color:#4469C5;" required /><br />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Enviar Testimonio</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <?= view('components/Footer.php'); ?>

    <?= view('components/FondoAnimadoCuadros.php'); ?>


    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';
        if (mensaje == '1') {
            swal('', '¡Gracias por responder!', 'success');
        } else if (mensaje == '2') {
            swal('', 'Llene los campos deseados a buscar ', 'error');
        } else if (mensaje == '3') {
            swal('', 'No hay investigación con el tema seleccionado ', 'error');
        } else if (mensaje == '4') {
            swal('', '¡Gracias por envíar tu testimonio! Se revisará antes de ser mostrado', 'success');
        }
    </script>
    <script>
        new DataTable('#dataTable');
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            var height = $(window).height();

            $('#fondo').height(height);
        });
    </script>

</body>

</html>