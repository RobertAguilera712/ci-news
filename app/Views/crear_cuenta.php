<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar nuevo usuario</title>
    <link rel="icon" href="<?php echo base_url('images/gto2.png')?>">
    <!-- Font Icon -->
    <link rel="stylesheet" href="public/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="public/css/registrate.css">
    <link rel="stylesheet" href="public/css/footer.css">
</head>

<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/FONDO.jpg" alt="juventud"> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="crearcuenta" action="<?php echo base_url("/guardar")?>" method="POST"
                        class="signup-form">
                        <h2 class="form-title">Crear Cuenta</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="nombre" id="nombre" placeholder="Nombre(s)..."
                                required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="apellidos" id="apellidos"
                                placeholder="Apellidos..." required />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="usuario">Tipo usuario:</label>
                            <select class="form-input" id="usuario" name="usuario" required>
                                <option value="" selected disabled>Selecciona un usuario</option>
                                <option value="investigador">investigador</option>
                                <option value="administrador">administrador</option>
                                <!-- <option value="encuestas">encuestas</option>
                                <option value="apoyos y servicios">apoyos y servicios</option>
                                <option value="evaluaciones">evaluaciones</option>
                                <option value="estadisticas e indicadores">estadisticas e indicadores</option>
                                <option value="organizaciones">organizaciones</option>
                                <option value="testimonios">testimonios</option> -->
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="number" maxlength="10" class="form-input" name="telefono" id="telefono"
                                placeholder="Telefono..." required />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="correo" id="correo" placeholder="Correo..."
                                required />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="contrasena" id="contrasena"
                                placeholder="Contraseña..." required />
                        </div>
                        <div class="form-group">
                            <select class="form-select form-input" id="estatus" name="estatus">
                                <option selected disabled>Seleccione un estatus</option>
                                <option value="A">Activo</option>
                                <option value="B">Inactivo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="crear" id="crear" class="form-submit" value="Crear" />
                        </div>
                        <center><a class="txt1" href="<?php echo base_url('/administrador') ?>">
                                <i class="zmdi zmdi-arrow-left"></i> Volver
                            </a></center>

                    </form>
                </div>
            </div>
        </section>

    </div>
    <footer id="footer">
        <div class="container">
            <a href="https://www.guanajuato.gob.mx/igualdad-laboral.php"><img
                    src="<?php echo base_url('images/logo-Igualdad.svg')?>" alt="Igualdad" width="60px"></a>
            <p> FRAY MARTÍN DE VALENCIA 102 FRACC. SANTO DOMINGO, CP 37557, LEÓN, GTO.</p>
            <p>TEL: 477 7103400</p>
            <p>CALL CENTER 01 800 841 73 50 Y 01 800 832 62 72</p>
            <p>© 2022 JuventudEsGTO, Derechos reservados</p>
            <a href="https://juventudesgto.guanajuato.gob.mx/">Aviso de Privacidad</a>

            <!-- Social Media -->
            <ul class="social text-center text-md-right text-lg-right">
                <li>
                    <a href="https://www.facebook.com/JuventudEsGto" target="_blank " class=Facebook">
                        <i class="ion-social-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/JuventudEsGto" target="_blank " class=Twitter">
                        <i class="ion-social-twitter"></i>
                    </a>
                </li>
               
                <li>
                    <a href="ion-social-instagram-outline" target="_blank" class="Google Plus">
                        <i class="ion-social-instagram-outline"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/channel/UCNxjn155hP-SHqu1m4C4w4w" target="_blank"
                        class="Google Plus">
                        <i class="ion-social-youtube"></i>
                    </a>
                </li>
            </ul>
        </div>
    
        <?= view('components/Footer.php'); ?>

    <!-- JS -->
    
    <script type="text/javascript">
    let mensaje = '<?php echo $mensaje ?>';
    </script>
    <script src="public/js/jquery.min.js"></script>
    
    <script>
    var input = document.getElementById('telefono');
    input.addEventListener('input', function() {
        if (this.value.length > 10)
            this.value = this.value.slice(0, 10);
    })
    </script>
</body>

</html>