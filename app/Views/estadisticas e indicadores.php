<?php
$id_municipio46 = $municipio[46]['id_municipio'];
$pdfG = $municipio[46]['pdf'];
$pdf = $municipio[46]['pdf'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Estadisticas e Indicadores</title>

    <?= view('components/Head.php'); ?>
</head>
<style>
    div.mapadiv svg g a path:hover {
        fill: #FF5AC8;
    }

    .mapadiv path {
        fill: #0066FF;
        fill-opacity: 1;
        stroke: #ffffff;
        stroke-width: 1.1883862;
    }

    @media screen and (min-width: 0px) and (max-width: 991px) {
        .map {
            display: none;
        }

        /* show it on small screens */
    }

    @media screen and (min-width: 992px) and (max-width: 2024px) {
        .map {
            display: block;
        }

        /* hide it elsewhere */
    }

    .grow {
        transition: all .2s ease-in-out;
    }

    .grow:hover {
        transform: scale(1.2);
    }
</style>

<body>
    <?= view('components/Topbar.php'); ?>

    <?= view('components/FondoAnimadoCuadros.php'); ?>
    <?= view('components/Navbar.php',  ['interfazConfig' => $_SESSION['interfazConfig']]); ?>
    <?= view('components/BotonFlotante.php'); ?>
    <?= view('components/BotonContactanos.php'); ?>

    <div class="container">
        <center style="margin: 22vh auto 1vh auto;" class="animate__animated animate__fadeInDown">
            <h1><span class="badge bg-primary">Estadísticas de las Juventudes</span></h1>
        </center>
    </div>

    <section>

        <div class="container mt-5">
            <div class="d-flex justify-content-between">
            <p class="d-inline-flex gap-1">
                <button class="btn btn-light" type="button" data-bs-toggle="collapse" onclick="toggleCollapse('collapseMunicipio', 'collapseTemas')" data-bs-target="#collapseMunicipio" aria-expanded="false" aria-controls="collapseMunicipio">
                    Información por Zona
                </button>
                <button class="btn btn-light" type="button" onclick="toggleCollapse('collapseTemas', 'collapseMunicipio')" data-bs-toggle="collapse" data-bs-target="#collapseTemas" aria-expanded="false" aria-controls="collapseTemas">
                    Información por Categoría
                </button>
            </p>
            <div>
                <form method="POST" action="<?php echo base_url('/estadisticasBusqueda') ?>">
                    <div class="d-flex">
                            <input class="form-control me-2 " type="input" name="texto" id="texto" placeholder="Buscar" aria-label="Buscar">
                            <button class="btn btn-primary d-inline-block" style="color: white;" type="submit"><i class="bi bi-search"></i></button>
                    </div>

                </form>

            </div>
            </div>
           
            
            <div style="margin-top: -15px;">
                <div class="collapse collapse-horizontal mb-5" id="collapseMunicipio">
                    <div class="card card-body" style="width: 100%; background-color: transparent;">
                        <div class="row">
                            <center class="row">
                                <div class="col">
                                    <button type="button" style="margin: 20px;" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#entidades">
                                        Entidades Federativas
                                    </button>
                                </div>
                                <div class="col">
                                    <?php foreach ($municipio as $item) : ?>
                                        <?php
                                        switch ($item['id_municipio']) {
                                            case ('47'):
                                                echo '<a class="btn btn-primary btn-lg" style="margin: 20px;"
                                            href="' . base_url('estadisticasMunicipio/' . $item['id_municipio']) . '" target="_blank" type="button">
                                            ' . $item['nombre'] . '</a>';
                                                break;
                                            default:
                                                break;
                                        } ?>
                                    <?php endforeach; ?>
                                </div>
                                <div class="col">
                                    <button type="button" style="margin: 20px;" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#municipios">
                                        Municipios de Gto.
                                    </button>
                                </div>
                            </center>
                            <div class="container map">
                                <?= view('components/MapaGto.php', ['municipio' => $municipio]); ?>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="collapse collapse-horizontal mb-5" id="collapseTemas">
                    <div class="card card-body" style="width: 100%; background-color: transparent;">
                        <div class="row">
                            <div class="col-sm-2 my-3">
                                <a target="_blank" style="text-decoration: none;" href="<?php echo base_url('estadisticasCategoria/Derechos Humanos') ?>">
                                    <div class="card animate__rubberBand animate__animated">
                                        <div class="card-body btn grow" style="background-color: #FF5AC8;">
                                            <h5 class="card-title text-center">Derechos Humanos</h5>
                                            <h1 class="text-center"><i class="bi bi-person-wheelchair"></i></h1>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <div class="col-sm-2 my-3">
                                <a target="_blank" style="text-decoration: none;" href="<?php echo base_url('estadisticasCategoria/Economía') ?>">
                                    <div class="card animate__rubberBand animate__animated">
                                        <div class="card-body btn grow" style="background-color: #fff700;">
                                            <h5 class="card-title text-center">Economía</h5>
                                            <h1 class="text-center"><i class="bi bi-cash-coin"></i></h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-2 my-3">
                                <a target="_blank" style="text-decoration: none;" href="<?php echo base_url('estadisticasCategoria/Educación') ?>">
                                    <div class="card animate__rubberBand animate__animated">
                                        <div class="card-body btn grow" style="background-color: lightgreen;">
                                            <h5 class="card-title text-center">Educación</h5>
                                            <h1 class="text-center"><i class="bi bi-backpack2-fill"></i></h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-2 my-3">
                                <a target="_blank" style="text-decoration: none;" href="<?php echo base_url('estadisticasCategoria/Empleo') ?>">
                                    <div class="card animate__rubberBand animate__animated">
                                        <div class="card-body btn grow" style="background-color: orange;">
                                            <h5 class="card-title text-center">Empleo</h5>
                                            <h1 class="text-center"><i class="bi bi-building-fill-gear"></i></h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-2 my-3">
                                <a target="_blank" style="text-decoration: none;" href="<?php echo base_url('estadisticasCategoria/Familia') ?>">
                                    <div class="card animate__rubberBand animate__animated">
                                        <div class="card-body btn grow" style="background-color: lightpink;">
                                            <h5 class="card-title text-center">Familia</h5>
                                            <h1 class="text-center"><i class="bi bi-person-hearts"></i></h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-2 my-3">
                                <a target="_blank" style="text-decoration: none;" href="<?php echo base_url('estadisticasCategoria/Gobernanza') ?>">
                                    <div class="card animate__rubberBand animate__animated">
                                        <div class="card-body btn grow" style="background-color: lightcoral;">
                                            <h5 class="card-title text-center">Gobernanza</h5>
                                            <h1 class="text-center"><i class="bi bi-bank"></i></h1>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <div class="col-sm-2 my-3">
                                <a target="_blank" style="text-decoration: none;" href="<?php echo base_url('estadisticasCategoria/Población') ?>">
                                    <div class="card animate__rubberBand animate__animated">
                                        <div class="card-body btn grow" style="background-color: bisque;">
                                            <h5 class="card-title text-center">Población</h5>
                                            <h1 class="text-center"><i class="bi bi-people-fill"></i></h1>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <div class="col-sm-2 my-3">
                                <a target="_blank" style="text-decoration: none;" href="<?php echo base_url('estadisticasCategoria/Salud') ?>">
                                    <div class="card animate__rubberBand animate__animated">
                                        <div class="card-body btn grow" style="background-color: tomato;">
                                            <h5 class="card-title text-center">Salud</h5>
                                            <h1 class="text-center"><i class="bi bi-heart-pulse-fill"></i></h1>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <div class="col-sm-2 my-3">
                                <a target="_blank" style="text-decoration: none;" href="<?php echo base_url('estadisticasCategoria/Seguridad') ?>">
                                    <div class="card animate__rubberBand animate__animated">
                                        <div class="card-body btn grow" style="background-color: lightblue;">
                                            <h5 class="card-title text-center">Seguridad</h5>
                                            <h1 class="text-center"><i class="bi bi-shield-fill-check"></i></h1>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <div class="col-sm-2 my-3">
                                <a target="_blank" style="text-decoration: none;" href="<?php echo base_url('estadisticasCategoria/Tecnología') ?>">
                                    <div class="card animate__rubberBand animate__animated">
                                        <div class="card-body btn grow" style="background-color: white;">
                                            <h5 class="card-title text-center">Tecnología</h5>
                                            <h1 class="text-center"><i class="bi bi-cpu"></i></h1>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Entidades Federativas -->
    <div class="modal fade" id="entidades" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lista de Entidades Federativas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php foreach ($estados as $item) : ?>
                    <?php echo '<a class="btn btn-primary animate__bounceIn" href="' . base_url('estadisticasEstado/' . $item['id_estado']) . '" target="_blank" type="button" style="margin: 10px;">
                                    ' . $item['nombre'] . '</a>'; ?>
                <?php endforeach; ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Municipios -->
    <div class="modal fade" id="municipios" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lista de Municipios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php foreach ($municipio as $item) : ?>
                    <?php
                    switch ($item['id_municipio']) {
                        case ('47'):
                            break;
                        default:
                            echo '<a class="btn btn-primary animate__bounceIn" href="' . base_url('estadisticasMunicipio/' . $item['id_municipio']) . '" target="_blank" type="button" style="margin: 10px;">
                                    ' . $item['nombre'] . '</a>';
                            break;
                    } ?>
                <?php endforeach; ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>



    <?= view('components/Footer.php'); ?>

    <script src="<?php echo base_url('js/particles.js') ?>"> </script>
    <script src="<?php echo base_url('js/particulas.js') ?>"> </script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    <!-- bootstrap js -->
    <script src="public/plugins/bootstrap/bootstrap.min.js"></script>


    <script src="<?php echo base_url('plugins/wow-js/wow.min.js') ?>  "></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        $(`#collapseMunicipio`).collapse('show');

        function toggleCollapse(showId, hideId) {
            $(`#${hideId}`).collapse('hide');
            $(`#${showId}`).collapse('show');
        }
    </script>


</body>

</html>