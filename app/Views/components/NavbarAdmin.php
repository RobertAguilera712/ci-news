<nav class="navbar navbar-expand-lg bg-body-primary" style="z-index: 99; position: fixed; top:0; background-color: white; width: 100vw;">
    <div class="container-fluid">
        <a class="navbar-brand animate__bounceIn" href="<?php echo base_url('/index') ?>">
            <img class="logo" src="<?php echo base_url('public/images/LOGO_4.png') ?>" alt="juventudesgto" style="max-width: 80px; margin-right: 10px; margin-top: -10px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Inicio
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo base_url('/administrador') ?>">Usuarios y Propuestas</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('/testimoniosAdmin') ?>">Testimonios</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('/encuestas-admin') ?>">Encuestas</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('/graficas-admin') ?>">Gráficas</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sistema JuventudEsGTO
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo base_url('/sajgAdmin') ?>">Info, Consejo y Programa Estatal</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?php echo base_url('/red-investigadores-edit') ?>">Red de Investigadores</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo base_url('/archivos-admin') ?>">
                        Estadísticas, Estudios e Indicadores</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo base_url('/revistas-admin') ?>">Revista Voces Emergentes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo base_url('/cendoc') ?>">
                    Centro Documental
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Información de Interés
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo base_url('/apoyosAdmin') ?>">Apoyos y Servicios</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('/directoriosAdmin') ?>">Directorios</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('/temas') ?>">Temas de Interés</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo base_url('/login/salir') ?>">
                        Salir <i class="bi bi-box-arrow-right"></i></a>
                </li>
            </ul>
        </div>
        <a class="navbar-brand animate__bounceIn" href="<?php echo base_url('/index') ?>">
            <img class="logo" src="<?php echo base_url('public/images/gto.png') ?>" alt="juventudesgto" style="max-width: 60px; margin-left: 1vw; margin-top: -5px;">
        </a>
    </div>
</nav>