<nav class="navbar navbar-expand-lg bg-body-primary" style="box-shadow: 0 10px 10px rgba(182, 182, 182, 0.75); 
        z-index: 99; position: fixed; top:0; margin-top: 40px; background-color: white; width: 100vw;">
    <div class="container-fluid">
    <?php if ($interfazConfig[0]['estatus'] !== 'B') : ?>
        <a class="navbar-brand animate__bounceIn" href="<?php echo base_url('/index') ?>">
            <img class="logo" src="<?php echo
                                    base_url('interfaz/' . $interfazConfig[0]['id_config'] . '/' . $interfazConfig[0]['archivo']) ?>" alt="juventudesgto" style="max-width: 80px; margin-right: 10px; margin-top: -10px;">
        </a>
        <?php endif; ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sistema JuventudEsGTO
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo base_url('/consejo#sajg') ?>">¿Qué es?</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('/consejo#consejo') ?>">Consejo Estatal de Juventud</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('/consejo#programa') ?>">Programa Estatal</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?php echo base_url('/red-investigadores') ?>">Red de Investigadores</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo base_url('/estadisticas') ?>">Estadísticas, Estudios e
                        Indicadores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo base_url('/revistas') ?>">Revista Voces Emergentes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo base_url('/centro-documental') ?>">
                        Centro Documental
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Información de Interés
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo base_url('/apoyos_servicios') ?>">Apoyos y Servicios</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('/directorio') ?>">Directorios</a></li>
                        <!-- <li><a class="dropdown-item"href="<?php echo base_url('/temasView') ?>">Temas de Interés</a></li> -->
                    </ul>
                </li>
            </ul>
        </div>
        <?php if ($interfazConfig[1]['estatus'] !== 'B') : ?>
            <a class="navbar-brand animate__bounceIn" href="<?php echo base_url('/index') ?>">
                <img class="logo" src="<?php echo base_url('interfaz/' . $interfazConfig[1]['id_config'] . '/' . $interfazConfig[1]['archivo']) ?>" alt="juventudesgto" style="max-width: 60px; margin-top: -5px;">
            </a>
        <?php endif; ?>
    </div>
</nav>