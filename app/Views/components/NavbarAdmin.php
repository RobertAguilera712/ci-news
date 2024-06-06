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

                            <li class="nav-item w-auto p-1 h-auto dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Investigaciones y Evaluaciones
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo base_url('/cendoc')?>">
                                       Centro Documental
                                    </a>
                                    <a class="dropdown-item" href="<?php echo base_url('/investigadores')?>">
                                        Estudios JuventudEsGTO
                                    </a>
                                    <a class="dropdown-item" href="<?php echo base_url('/evaluacionAdmin')?>">
                                        Evaluaciones
                                    </a>
                                    <a class="dropdown-item"
                                        href="<?php echo base_url('/revistas-admin')?>">Revistas</a>
                                    <a class="dropdown-item"
                                        href="<?php echo base_url('/graficas-admin')?>">Gráficas</a>
                                </div>
                            </li>

                            <li class="nav-item w-auto p-1 h-auto dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Información de interés para las Juventudes
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo base_url('/apoyosAdmin')?>">Apoyos y
                                        servicios</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/directoriosAdmin')?>">Directorios</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/temas')?>">Temas de
                                        interés</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo session('nombre')?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="nav-link" href="<?php echo base_url('login/salir')?>">
                                        Cerrar Sesión
                                    </a>
                                </div>
                            </li>
                            
                            <li class="nav-item w-auto m-auto p-2 h-auto dropdown">
                                <a class="navbar-brand animate__bounceIn" href="<?php echo base_url('/index')?>" style="color: orangered;">
                                <img class="logo" src="<?php echo base_url('public/images/LOGO.png')?>" alt="juventudesgto" style="max-width: 90px;">
                                </a>
                            </li>
                        </ul>
                        
                    </div>
                    
                </nav>
            </div>
        </div>
        <a class="navbar-brand animate__bounceIn" href="<?php echo base_url('/index') ?>">
            <img class="logo" src="<?php echo base_url('public/images/gto.png') ?>" alt="juventudesgto" style="max-width: 60px; margin-left: 1vw; margin-top: -5px;">
        </a>
    </div>
</nav>