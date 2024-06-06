<?php if (count($encuestasLargas) > 0) : ?>
<?php if (($fecha_actual <= strtotime($encuestasLargas[0]['fecha_fin'])) )  : ?>
    <div class="col-md-6 wow animated  animate__fadeInUpBig box1 carousel slide" data-wow-delay="0.2s" id="largas" data-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($encuestasLargas as $index => $el) : ?>
                <?php if (($fecha_actual >= strtotime($el['fecha_inicio'])) && ($fecha_actual <= strtotime($el['fecha_fin']))) : ?>
                    <?php if ($index == 0) : ?>
                        <div class="carousel-item active">
                        <?php else : ?>
                            <div class="carousel-item">
                            <?php endif ?>
                            <h5 style="color:#FF5AC8"><?= $el['descripcion'] ?></h5>
                            <center><a class="txt1" href="<?= $el['enlace'] ?>" target="_blank " style="color:#000F9F">
                                    Para contestar selecciona la imagen <i class="zmdi zmdi-long-arrow-down" style="color:#000F9F"></i>
                                </a>
                                <a href="<?= $el['enlace'] ?>" target="_blank ">
                                    <img src="<?php echo base_url('images_propuesta/' . $el['id_encuestasL'] . '/' . $el['imagen']) ?>" width="400px" height="300px" alt="juventud">
                                </a>
                            </center>

                            </div>
                        <?php endif; ?>
                    <?php endforeach ?>
                        </div>
                        <a class="carousel-control-prev" href="#largas" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#largas" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
        </div>
    </div>

<?php endif; ?>
<?php endif; ?>