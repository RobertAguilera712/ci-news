<div class="col-md-6" style="margin-bottom: 30px;">
    <center>
        <h3 style="color:#000F9F;">Temas de Interés</h3>
        <div class="row" style="margin-top: 0;">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
               
                </ol>
                <div id="carouselTemas" class="carousel slide" data-bs-theme="dark">
                    <div class="carousel-inner">
                        <?php foreach ($temas as $key => $td) : ?>
                            <?php if ($key == 0) : ?>
                                <div class="carousel-item active">
                                    <a href="<?= $td['link'] ?>" target="_blank" style="text-decoration: none;">
                                        <div class="col" style="padding: 10%; min-width: 40vw; max-width: 40vw; 
                                                min-height: 50vh; max-height: 50vh;">
                                            <img class="card-img-top img-fluid" style="max-width: 50%; margin: 0 auto 0 auto;" src="<?php echo base_url('images_temas/' . $td['id_tema'] . '/' . $td['imagen']) ?>" alt="JuventudEsGTO">
                                            <div class="center box1">
                                                <hr style="color: #0056b2;" />
                                                <h5 style="text-align:center;"><?= $td['descripcionTema'] ?></h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php else : ?>
                                <div class="carousel-item">
                                    <a href="<?= $td['link'] ?>" target="_blank" style="text-decoration: none;">
                                        <div class="col" style="padding: 10%; min-width: 40vw; max-width: 40vw; 
                                                min-height: 50vh; max-height: 50vh;">
                                            <img class="card-img-top img-fluid" style="max-width: 50%; margin: 0 auto 0 auto;" src="<?php echo base_url('images_temas/' . $td['id_tema'] . '/' . $td['imagen']) ?>" alt="JuventudEsGTO">
                                            <div class="center box1">
                                                <hr style="color: #0056b2;" />
                                                <h5 style="text-align:center"><?= $td['descripcionTema'] ?></h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselTemas" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselTemas" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <br>
            <a href="<?php echo base_url('/temasView') ?>" class="btn btn-primary" style="margin: -20px auto 0 auto; width: fit-content;">
                Ver todos los temas
            </a>
        </div>
    </center>
</div>