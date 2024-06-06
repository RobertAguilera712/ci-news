<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Documental</title>
    <link rel="icon" href="images/gto2.png">
    <link rel="stylesheet" href="<?php echo base_url('plugins/bootstrap/bootstrap.min.css')?>">
    <link rel="stylesheet" href="public/plugins/animate-css/animate.css">
    <link rel="stylesheet" href="public/plugins/ionicons/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url('css/style.css') ?>">

</head>
<style>
#particles-js {
    width: 100vw;
    height: 100%;
    position: fixed;
    z-index: -1;
}
</style>

<body>
    <div id="particles-js"> </div>

    <?= view('components/Topbar.php'); ?>
    <?= view('components/Navbar.php',  ['interfazConfig' => $_SESSION['interfazConfig']]); ?> 
    <?= view('components/BotonFlotante.php'); ?>
    <?= view('components/BotonContactanos.php'); ?>


    <div class="container">
                            <div class="container" >
                                <nav class=" navbar navbar-light bg-light">
                                    <a class="navbar-brand">Búsqueda de Documentos</a>
                                    <form class="form-inline" method="POST" action="<?php echo base_url('/centro-documental-busqueda')?>">
                                        <input class="form-control mr-sm-2" type="input" name="nombre" id="nombre" placeholder="Nombre"
                                            aria-label="Nombre">
                                            
                                        <select class="form-select form-control mr-sm-2" placeholder="Tema" name="id_categoria_cendoc">
                                            <option disabled selected>Seleccione la categoría</option>
                                            <?php foreach($categorias as $cat):?>
                                            <option value="<?=$cat['id_categoria_cendoc'];?>"><?=$cat['nombre_categoria_cendoc'];?></option>
                                            <?php endforeach;?>
                                        </select>

                                        <button class="btn btn-primary" style="color: white;" type="submit">Buscar</button>
                                        
                                    </form>
                                    <form class="form-inline" method="GET" action="<?php echo base_url('/centro-documental')?>">
                                            <button class="btn btn-primary" style="color: white;" type="submit">Ver Todo</button>
                                    </form>

                                </nav>
                            </div>

                            <div class="container" style="margin-top: 30px;z-index: 99; margin-bottom:50px;">
                                <?php foreach($documentos as $item):?>
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    <?=$item['nombre_categoria_cendoc'];?>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class=row>
                                                            <h1 class="text-primary" style="font-size: 15px;">
                                                                <?= $item['nombre_documento'] ?>

                                                            </h1>
                                                        </div>
                                                        <div class=row style="font-size:14px;">
                                                            <?php  $fecha = $item['fecha_documento']; 
                                                                if ($fecha ==! NULL){$nuevaFecha = date("d-m-Y", strtotime($fecha));  
                                                            echo $nuevaFecha;}
                                                                else{echo "Sin fecha";}
                                                                ?>
                                                        </div>
                                                        <div class=row style="font-size:13px; color: lightslategray;">
                                                            <?= $item['autor_documento'] ?>
                                                            
                                                        </div>
                                                        <div class=row style="margin-top:15px; font-size:15px; text-align:justify;">
                                                            <?= $item['descripcion_documento'] ?>
                                                        </div>
                                                    </div>
                                                    <div class="col" >

                                                        <?php if($item['archivo_documento'] == !null):?>
                                                        <a href="<?php echo base_url('documentos_cendoc/'.$item['id_documento'].'/'.$item['archivo_documento'])?>"
                                                            target="_blank" class="btn-success btn-lg" style="margin: 5px; font-size: .9rem;">Ver documento</a>
                                                        <?php endif?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>


    <?= view('components/Footer.php'); ?>



    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/popper.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    
    <script src="<?php echo base_url('js/particles.js')?>"> </script>
    <script src="<?php echo base_url('js/particulas.js')?>"> </script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    
    <script type="text/javascript">
    let mensaje = ' <?php echo $mensaje ?>';
    if (mensaje == '1') {
        swal('', 'Nombre del documento no encontrado ', 'error ');
    } else if (mensaje == '2 ') {
        swal('', 'Llene los campos deseados a buscar ', 'error ');
    } else if (mensaje == '3 ') {
        swal('', 'No hay documento con el tema seleccionado ', 'error ');
    }
    </script>


</body>

</html>