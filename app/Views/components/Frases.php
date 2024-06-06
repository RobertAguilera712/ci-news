<!-- Carriusel de frases motivacionales -->

<section class="wow animated animate__flipInX box1" data-wow-delay="0.2s" style="min-height: 40vh; max-height: 40vh;">
        <div class="wrapper">
            <div class="slider-testimonial">
                <?php foreach ($slider as $s):?>
                <div class="testimonial-item">
                    <div class="testimonial-text">
                        <p><?=$s['descripcion']?></p>
                    </div>

                </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>