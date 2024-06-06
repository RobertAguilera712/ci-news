<!DOCTYPE html>
<html class="no-js">

<head>
    <title>Contactanos</title>
    <?= view('components/Head.php'); ?>

</head>

<body>


    <?= view('components/Topbar.php'); ?>
    <?= view('components/Navbar.php',  ['interfazConfig' => $_SESSION['interfazConfig']]); ?>
    <?= view('components/BotonFlotante.php'); ?>
    <?= view('components/BotonContactanos.php'); ?>
    <?= view('components/FondoAnimadoCuadros.php'); ?>

    <section style="margin-top: 30vh;">
        <div class="container">
            <div class="row">
                <div class="my-3 col-lg-6 col-md-6 col-xl-6 col-sm-auto animate__animated animate__fadeInLeft">
                    <h1>Contáctanos</h1>
                    <p class="text-center">Hemos detectado retos que nos desafían como jóvenes. <br> <b>¡ Tu voz es esencial !</b><br> ! Compártenos tu opinión y ayúdanos a seguir fomentando el empoderamiento de las juventudes !</p>

                    <form method="POST" id="editar" action="<?php echo base_url("propuesta/contact/") ?>" method="POST" class="signup-form">

                        <div class="form-group">
                            <label class="col-form-label">Cuéntanos:</label>
                            <textarea class="form-control" name="detalle" id="detalle" cols="30" rows="10" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Municipio:</label>
                            <select class="form-select form-control" name="municipio" required>
                                <option selected disabled value="">Seleccione una opción</option>
                                <?php foreach ($municipios as $m) : ?>
                                    <option value="<?= $m['id_municipio']; ?>"><?= $m['nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Género:</label>
                            <select class="form-select form-control" id="sexo" name="sexo" required>
                                <option selected disabled value="">Seleccione una opción</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                                <option value="No Binario">No Binario</option>
                                <option value="Prefiero no decirlo">Prefiero no decirlo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Edad:</label>
                            <input type="numeric" maxlength="2" class="form-control" name="edad" id="edad" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Actividad Principal:</label>
                            <select class="form-select form-control" id="actividad" name="actividad" required>
                                <option selected disabled value="">Seleccione una opción</option>
                                <option value="Investigador">Investigador</option>
                                <option value="Ama de casa">Ama de casa</option>
                                <option value="Estudiante">Estudiante</option>
                                <option value="Empleado">Empleado</option>
                                <option value="Servidor público">Servidor público</option>
                                <option value="Docente">Docente</option>
                                <option value="Ciudadano">Ciudadano</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Correo electrónico:</label>
                            <input type="email" class="form-control" name="correo" id="correo" required />
                        </div>
                        <button type="submit" name="enviar" id="enviar" class="btn btn-primary my-3">
                            Enviar <i class="bi bi-arrow-right"></i></button>
                    </form>
                </div>
                <div class="my-3 col-lg-6 col-md-6 col-xl-6 col-sm-auto">
                    <div class="map-area animate__animated animate__fadeInRight">
                        <h2 class="subtitle">Búscanos
                        </h2>
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3722.4657120323905!2d-101.67020922553252!3d21.093991385536476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842bbfeda8d63b17%3A0xe19a4b8fd793a7e3!2sJuventudEsGto!5e0!3m2!1ses!2smx!4v1683220443330!5m2!1ses!2smx" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>


    <?= view('components/Footer.php'); ?>


    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';
        if (mensaje == '1') {
            swal('', 'Se ha envíado con éxito', 'success');
        } else if (mensaje == '0') {
            swal('', 'Error al enviar el correo. Verifique su conexión o reporte a TI', 'error');
        }
    </script>
</body>

</html>