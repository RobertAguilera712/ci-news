<?php

if (count($votos) > 0) {
    $votos = $votos[0]['votos_totales'];
}
?>

<?php if (count($encuestasCortas) > 0) : ?>
    <div class="col">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" style=" width: 100%; height: 60vh; margin: 10px auto 0px auto;">
                <?php foreach ($encuestasCortas as $index => $e) : ?>

                    <?php if ($index == 0) : ?>
                        <div class="carousel-item active">
                        <?php else : ?>
                            <div class="carousel-item">
                            <?php endif ?>
                            <div class="row">
                                <div class="col-6">
                                    <div class="card" style="width: 100%; min-height: 100%; margin: 10px auto 0 auto;">
                                        <div class="container">
                                            <h5 class="text-muted mt-3">La voz de las Juventudes </h5>
                                            <h6 class="mt-4"><span> Para ti, </span><?= $e['pregunta'] ?></h6>
                                            <?php if (($fecha_actual >= strtotime($e['fecha_inicio'])) && ($fecha_actual <= strtotime($e['fecha_fin']))) : ?>
                                                <form action="<?php echo base_url('index/encuestasCortas') ?>" method="POST">
                                                    <?php if ($e['respuesta1'] !== null && !empty($e['respuesta1'])) : ?>
                                                        <div class="mt-2">
                                                            <input type="radio" style="margin: 5px;" name="respuesta1" value="<?= $e['id_encuestasC'] ?>"><?= $e['respuesta1'] ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($e['respuesta2'] !== null && !empty($e['respuesta2'])) : ?>
                                                        <div class="mt-2">
                                                            <input type="radio" style="margin: 5px;" name="respuesta2" value="<?= $e['id_encuestasC'] ?>"><?= $e['respuesta2'] ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($e['respuesta3'] !== null && !empty($e['respuesta3'])) : ?>
                                                        <div class="mt-2">
                                                            <input type="radio" style="margin: 5px;" name="respuesta3" value="<?= $e['id_encuestasC'] ?>"><?= $e['respuesta3'] ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($e['respuesta4'] !== null && !empty($e['respuesta4'])) : ?>
                                                        <div class="mt-2">
                                                            <input type="radio" style="margin: 5px;" name="respuesta4" value="<?= $e['id_encuestasC'] ?>"><?= $e['respuesta4'] ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <button type="submit" name="voto" class="btn btn-primary btn-block mt-1">Enviar</button>
                                                </form>
                                            <?php else : ?>
                                                <h5 class="text-muted">Esta encuesta finalizó el <?php $date = new DateTime($e['fecha_fin']);
                                                                                                    echo $date->format('d-m-Y'); ?></h5>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card" style="width: 100%; min-height: 100%; margin: 10px auto 0 auto;">
                                        <div class="container">
                                            <h5 class="text-muted mt-3" >Los jóvenes dicen que: </h5>
                                            <!-- Gráficas-->
                                            <style>
                                                .canvasjs-chart-canvas{
                                                    max-width: 100%;
                                                    max-height: 500px;
                                                }
                                            </style>
                                            <div id="charts<?php echo  $index ?>" style="background-color: white;">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                        <?php endforeach ?>
                        </div>
            </div>
        </div>

    <?php endif ?>
    <!-- Fin Encuestas Cortas -->

    <script>
        let encuestas = <?php echo json_encode($encuestasCortas); ?>;
        let graficas = []
        encuestas.forEach((i) => {
            let fontSize = 20;
            if(graficas.length==0){
                fontSize = 8;
            }
            graficas.push({
                animationEnabled: true,
                data: [{
                    indexLabelFontSize: fontSize,
                    type: "pie",
                    startAngle: 240,
                    yValueFormatString: "##0\"%\"",
                    indexLabel: "{label} {y}",
                    dataPoints: [{
                        'label': i.respuesta1,
                        'y': i.votos1 * 100 / 4
                    }, {
                        'label': i.respuesta2,
                        'y': i.votos2 * 100 / 4
                    }, {
                        'label': i.respuesta3,
                        'y': i.votos3 * 100 / 4
                    }, {
                        'label': i.respuesta4,
                        'y': i.votos4 * 100 / 4
                    }]
                }]
            });
        });


        window.onload = function() {
            for (let index = 0; index < graficas.length; index++) {
                var newDiv = document.createElement("div");
                newDiv.id = "chartContainer" + index;
                newDiv.class = "chartContainer";
                newDiv.style.width = "100%";
                if(index === 0 ){
                    newDiv.style.height = "200px";
                    
                }
                newDiv.style.padding = "5px";

                var chartsDiv = document.getElementById("charts" + index);
                chartsDiv.appendChild(newDiv);

                var element = graficas[index];
                var chart = new CanvasJS.Chart("chartContainer" + index, element);
                chart.render();
            }
        }
    </script>