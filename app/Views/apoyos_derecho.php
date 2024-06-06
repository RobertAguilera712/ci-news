<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apoyos y Servicios</title>
    <link rel="icon" href="<?php echo base_url('images/gto2.png')?>">

    <link rel="stylesheet" href="<?= base_url("plugins/bootstrap/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("plugins/ionicons/ionicons.min.css");?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/animate-css/animate.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('css/style.css') ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?= base_url("plugins/ionicons/ionicons.min.css");?>">


</head>

<style>
#particles-js {
    width: 100vw;
    position: fixed;
    z-index: -1;

}
</style>

<body>
    <div id="particles-js"> </div>
    <section class="top-bar animated-header">
        <div class="top-bar-header animated-header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="col">

                            </div>
                            <div class="col">
                                <div class="container">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item" style="margin-right: 20px ;">
                                            <a id="blanco" href="<?php echo base_url('/contactanos');?>"
                                                class="nav-link">(477)7103400
                                            </a>
                                        </li>
                                        <li class="nav-item" style="margin-right: 20px ;">
                                            <a id="blanco" href="<?php echo base_url('/contactanos');?>"
                                                class="nav-link">
                                                Contactanos
                                            </a>
                                        </li>
                                        <li>
                                            <a id="blanco" href="https://www.facebook.com/JuventudEsGto"
                                                style="margin: 20px" target="_blank " class="Facebook">
                                                <i class="ion-social-facebook   fa-lg"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a id="blanco" href="https://twitter.com/JuventudEsGto" target="_blank "
                                                style="margin: 20px" class="Twitter">
                                                <i class="ion-social-twitter   fa-lg"></i>
                                            </a>
                                        </li>
                                      
                                        <li>
                                            <a id="blanco" href="ion-social-instagram-outline" target="_blank"
                                                style="margin: 20px" class="Google Plus">
                                                <i class="ion-social-instagram-outline  fa-lg"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a id="blanco"
                                                href="https://www.youtube.com/channel/UCNxjn155hP-SHqu1m4C4w4w"
                                                target="_blank" style="margin: 20px" class="Google Plus">
                                                <i class="ion-social-youtube  fa-lg"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light" id="headercolor">
                    <a class="navbar-brand" href="<?php echo base_url('/index')?>"style="margin-left:100px;">
                        <img class="logo" src="<?php echo base_url('images/LOGO.png')?>" alt="juventudesgto">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('/index')?>">Inicio
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sistema JUVENTUDESGTO
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo base_url('/consejo#sajg')?>">¿Qué
                                        es?</a>
                                    <a class="dropdown-item"
                                        href="<?php echo base_url('/consejo#consejo')?>">Consejo</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/consejo#programa')?>">Programa
                                        Estatal</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('/estadisticas')?>">Estadísticas e
                                    Indicadores</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Información de interés para las Juventudes
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo base_url('/apoyos_servicios')?>">Apoyos y
                                        servicios</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/directorio')?>">Directorios</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/temasView')?>">Temas de interés</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Investigaciones y Evaluaciones
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo base_url('/centro-documental')?>">Centro
                                        documental</a>
                                    <a class="dropdown-item"
                                        href="<?php echo base_url('/evaluacion')?>">Evaluaciones</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/red-investigadores')?>">Red
                                        de Investigadores</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url() ?>/login">Iniciar Sesión</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

    </section>

    <section id="botones">
        <div class="container" style=" color: #000000; ">
            <nav class="">
                <form class="form-inline" method="POST" action="<?php echo base_url('apoyos/buscar') ?>">
                    <div class="container" style="margin-top: 190px;">
                        <div class="row  mb-3">
                            <div class="col">
                                <select class="form-select form-control" name="tema">
                                    <option disabled selected>Tema</option>
                                    <?php foreach($datosT as $t):?>
                                    <option value="<?=$t['id_tema'];?>"><?=$t['descripcionTema'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select form-control" name="derecho">
                                    <option disabled selected>Derecho social</option>
                                    <?php foreach($datosDS as $ds):?>
                                    <option value="<?=$ds['id_derecho'];?>"><?=$ds['descripcion'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select form-control" name="dependencia">
                                    <option disabled selected>Dependencia</option>
                                    <?php foreach($datosD as $d):?>
                                    <option value="<?=$d['id_dependencia'];?>"><?=$d['descripcion_D'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select form-control mr-sm-2" name="apoyo">
                                    <option disabled selected>Tipo de Apoyo</option>
                                    <?php foreach($datosTS as $ts):?>
                                    <option value="<?=$ts['id_tipo_apoyo'];?>"><?=$ts['descripcion_A'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col">
                                <input class="form-control mr-sm-2" type="input" name="año" placeholder="Año"
                                    aria-label="Año">
                            </div>
                            <div class="col">
                                <button class="btn" style="color: #286ea7" type="submit">Buscar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </nav>
        </div>
    </section>

    <section id="tabla">
        <div class="container" style="margin-top: 50px;  z-index: 99;">
            <table id="example" class="table table-striped table-bordered" style="width:100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Orden de gobierno</th>
                        <th>Dependencia</th>
                        <th>Programa Social</th>
                        <th>Estatus</th>
                        <th>Año</th>
                        <th>Objetivo General del Programa Social</th>
                        <th>Población Objetivo</th>
                        <th>Rango de edad para acceder al apoyo</th>
                        <th>Tipo de apoyo</th>
                        <th>Monto anual del apoyo económico</th>
                        <th>Responsable o Enlace del programa</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Página web al programa</th>
                        <th>Link a la normatividad</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($buscarDerecho as $b):?>
                    <tr>
                        <td><?=$b['id_apoyos'] ?>
                        <td><?=$b['orden_gobierno'];?></th>
                        <td><?=$b['descripcion_D'];?></th>
                        <td><?=$b['programa_Social'];?></th>
                        <th><?php if($b['estatus_apoyo']=='A'): ?>
                            <h5><span class="badge text-bg-success">Activo
                                    <?php endif ?></span></h5>
                            <?php if($b['estatus_apoyo']=='B'): ?>
                            <h5><span class="badge text-bg-danger">Inactivo
                                    <?php endif ?></span></h5>
                        </th>
                        <td><?=$b['año']?></th>
                        <td><?=$b['objetivo_General'];?></th>
                        <td><?=$b['poblacion_Objetivo']?></th>
                        <td><?=$b['rango_Edad'];?></th>
                        <td><?=$b['descripcion_A']?></th>
                        <td><?=$b['monto_Anual'];?></th>
                        <td><?=$b['responsable']?></th>
                        <td><?=$b['telefono'];?></th>
                        <td><?=$b['correo'];?></th>
                        <th><?php if($b['pagina_Web'] == !null):?><a href="<?=$b['pagina_Web'];?>" target="_blank"
                                class="btn btn-success btn-sm">
                                Ver página web</a><?php endif?></th>
                        <th><?php if($b['link_normartividad'] == !null):?><a href="<?=$b['link_normartividad'];?>"
                                target="_blank" class="btn btn-success btn-sm">
                                Ver normatividad</a><?php endif?></th>

                    </tr>
                    <?php endforeach;?>
                </tbody>

            </table>
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
    <script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            bFilter: false,
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

</body>

</html>