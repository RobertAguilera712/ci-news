
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Encuestas</title>
    <link rel="icon" href="images/gto2.png">
    <link rel="stylesheet" href="<?= base_url("plugins/ionicons/ionicons.min.css");?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>

<?php 
    $pregunta = $encuestas[0]['pregunta'];
    $id_encuestaC = $encuestas[0]['id_encuestasC'];
    $votos = $votos[0]['votos_totales'];
    $fecha_inicio = strtotime($encuestas[0]['fecha_inicio']);
    $fecha_actual = strtotime(date('y-m-d', time()));  
    $fecha_fin= strtotime($encuestas[0]['fecha_fin']);
?>

<div class="container" id="search">
        <div class="row">
            <div class="container-fluid">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="head">
                            <h1 class="text-primary">Lista de Preguntas</h1>
                            
                            <span>Total de votos: </span>
                            <h2 class="mt-4"><?php echo $votos?></h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Pregunta</th>
                                        <th>Respuesta</th>
                                        <th>Votos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach($preguntas as $t):?>
                                    <tr>
                                        <td><?=$t['pregunta'];?></th>
                                        <td><?=$t['opcion'];?></th>
                                        <td><?=$t['votos'];?></th>
                                    </tr>

                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
    </script>
    
</body>
</html>
