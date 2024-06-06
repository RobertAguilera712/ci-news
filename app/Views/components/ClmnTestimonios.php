<div class="rowwow animated  animate__fadeInUpBig box1" data-bs-theme="dark">
    <div class="container">
        <div class="text-center">
            <div class="row">
                <h4 style="color:#000F9F; margin: 0 auto 2% auto; font-size: x-large; padding: 0; border-radius: 50px;">
                    Compártenos tu experiencia con JuventudEsGto
                </h4>
            </div>
            <div class="row">
                <button type="button" class="btn" style="background:#0082FF; width: fit-content; color:aliceblue; margin: 0 auto 2% auto;" data-toggle="modal" data-target="#agregarNTestimonio">Aquí</button>
            </div>
        </div>
        <div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
            <?php foreach ($testimonios as $key => $t) : ?>
                        <?php if ($key == 0) : ?>
                            <div class="carousel-item active">
                                <div class="testimonial-item">
                                    <div class="testimonial-client" style="width: fit-content; margin: 0 auto 0 auto;">
                                        <center>
                                            <img class="card-img-top" src="<?php echo base_url('images_testimonios/' . $t['id_testimonios'] . '/' . $t['imagenT']) ?>" alt="JuventudEsGTO">
                                        </center>
                                        <p class="client-name" style="background-color: white; padding: 0; border-radius: 50px;">
                                            <?= $t['nombreM'] ?>
                                        </p>
                                    </div>
                                    <div class="testimonial-text" style="background-color: white; padding: 0; border-radius: 50px;">
                                        <p style="text-align: justify; font-size: medium;">
                                            <?= $t['descripcion'] ?>
                                        </p>
                                    </div>
                                    <div class="testimonial-client" style="width: fit-content; margin: 0 auto 0 auto;">
                                        <p class="client-name" style="background-color: white; padding: 0; border-radius: 50px;">
                                            Municipio de <?= $t['nombre'] ?>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        <?php else : ?>
                            <div class="carousel-item">
                                <div class="testimonial-item">
                                    <div class="testimonial-client" style="width: fit-content; margin: 0 auto 0 auto;">
                                        <center>
                                            <img class="card-img-top" src="<?php echo base_url('images_testimonios/' . $t['id_testimonios'] . '/' . $t['imagenT']) ?>" alt="JuventudEsGTO">
                                        </center>
                                        <p class="client-name" style="background-color: white; padding: 0; border-radius: 50px;"><?= $t['nombreM'] ?></p>
                                    </div>
                                    <div class="testimonial-text" style="background-color: white; padding: 0; border-radius: 50px;">
                                        <p style="text-align: justify; font-size: medium;">
                                            <?= $t['descripcion'] ?>
                                        </p>
                                    </div>
                                    <div class="testimonial-client" style="width: fit-content; margin: 0 auto 0 auto;">
                                        <p class="client-name" style="background-color: white; padding: 0; border-radius: 50px;">
                                            Municipio de <?= $t['nombre'] ?>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


    </div>
</div>