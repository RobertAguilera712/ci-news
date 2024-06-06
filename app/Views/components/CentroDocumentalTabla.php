<section id="table" name="table">
<div class="container" >
        <nav class=" navbar navbar-light bg-light">
            <a class="navbar-brand">Búsqueda de Documentos</a>
            <form class="form-inline" method="POST" action="<?php echo base_url('/estadisticasCendoc#tables')?>">
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
            <form class="form-inline" method="GET" action="<?php echo base_url('/estadisticasCendoc#tables')?>">
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
                                <div class="col" style="margin-top: 95px; margin-left:100px;">

                                    <?php if($item['archivo_documento'] == !null):?>
                                    <a href="<?php echo base_url('documentos_cendoc/'.$item['id_documento'].'/'.$item['archivo_documento'])?>"
                                        target="_blank" class="btn-success btn-lg" style="margin: 5px">Ver documento</a>
                                    <?php endif?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
    </section>