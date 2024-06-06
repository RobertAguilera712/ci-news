<!DOCTYPE html>
<html lang="es">

<head>
    <title>Iniciar Sesión</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" href="<?php echo base_url('images/gto2.png')?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('plugins/bootstrap/bootstrap.min.css')?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/LOGGIN.jpg');">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="<?php echo base_url("/entrar")?>" method="POST">
                    <span class="login100-form-logo">
                        
                        <i> <img src="images/LOGO.png"  style="height:65px; margin-left:5px; margin-bottom:20px;" alt="juventud"> </i>
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        Iniciar Sesión
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Correo">
                        <input class="input100" id="correo" type="email" name="correo" placeholder="nombre@gmail.com"
                            required>
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Contraseña">
                        <input class="input100" id="contrasena" type="password" name="contrasena"
                            placeholder="Contraseña" required>
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
                    <div class="container-login100-form-btn">

                        <button class="login100-form-btn">
                            Entrar
                        </button>


                    </div>

                    <div class="text-center p-t-90">
                        <a class="txt1" href="#" data-toggle="modal" data-target="#contraseña">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>
                    <div class="text-center p-t-90">
                        <center><a class="txt1" href="<?php echo base_url('/index') ?>">
                                <i class="zmdi zmdi-arrow-left"></i> Inicio
                            </a></center>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <form method="POST" action="<?php echo base_url('Contactanos/EnviarCorreo')?>">
        <div class="modal fade" id="contraseña" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="publicacionTitle">Recuperar Contraseña</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label">Introduce tu correo:</label>
                            <input type="text" class="form-control" name="correo" id="correo" required />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </div>

                </div>
            </div>
        </div>
    </form>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="public/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="public/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="public/vendor/bootstrap/js/popper.js"></script>
    <script src="public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="public/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="public/vendor/daterangepicker/moment.min.js"></script>
    <script src="public/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="public/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
     
    

    <script type="text/javascript">
    let mensaje = '<?php echo $mensaje ?>';
    if (mensaje == '1') {
        swal('', 'Se ha envíado con éxito', 'success');
    } else if (mensaje == '0') {
        swal('', 'Error al enviar el correo. Verifique su conexión o reporte a TI', 'error');
    }else if (mensaje == '2') {
        swal('', 'No éxiste el correo registrado', 'error');
    }
    </script>

</body>

</html>