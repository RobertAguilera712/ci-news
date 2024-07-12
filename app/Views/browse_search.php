<?php
$fileIcons = [
    'pdf' => base_url('images/icons/pdf.png'),
    'docx' => base_url('images/icons/docx.png'),
    'doc' => base_url('images/icons/docx.png'),
    'xlsx' => base_url('images/icons/xls.png'),
    'xls' => base_url('images/icons/xls.png'),
    'csv' => base_url('images/icons/xls.png')
];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Banco de datos | Buscar</title>
    <?= view('components/HeadAdmin.php'); ?>
</head>

<body>

    <?= view('components/NavbarAdmin.php'); ?>

    <section style="margin-top: 10vh;" class="container">
        <h2>Banco de datos Busqueda</h2>

        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#buscarDoc">Buscar documento</button>

        <form method="GET" action="" enctype="multipart/form-data">
            <div class="modal fade" id="buscarDoc" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Buscar documento</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" maxlength="255" name="nombre" value="<?= $searchData['nombre'] ?>" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Autor:</label>
                                <input type="text" class="form-control" maxlength="255" name="autor" value="<?= $searchData['autor'] ?>" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Dependencia:</label>
                                <input type="text" class="form-control" maxlength="255" name="dependencia" value="<?= $searchData['dependencia'] ?>" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">País:</label>
                                <input type="text" class="form-control" maxlength="255" name="pais" value="<?= $searchData['pais'] ?>" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Palabras clave:</label>
                                <input type="text" class="form-control" maxlength="255" name="palabras_clave" value="<?= $searchData['palabras_clave'] ?>" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Fecha:</label>
                                <input type="date" class="form-control" name="fecha" value="<?= $searchData['fecha'] ?>" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Día:</label>
                                <input type="number" class="form-control" name="dia" value="<?= $searchData['dia'] ?>" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Mes:</label>
                                <input type="number" class="form-control" name="mes" value="<?= $searchData['mes'] ?>" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Año</label>
                                <input type="number" class="form-control" name="anio" value="<?= $searchData['anio'] ?>" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccionar categoría:</label>
                                <select class="form-select form-control" id="id_categoria" name="id_categoria" hx-get="/banco-datos/get-subcategorias" hx-target="#id_subcategoria" hx-trigger="change">
                                    <option value="" selected>Seleccionar categoría</option>
                                    <?php foreach ($categorias as $cat) : ?>
                                        <?php if ($cat['estatus'] == 'A') : ?>
                                            <option <?php echo $cat["id"] == $searchData['id_categoria'] ? "selected" : ""; ?> value="<?= $cat['id'] ?>"><?= $cat['nombre'] ?></option>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccionar subcategoría:</label>
                                <select class="form-select form-control" id="id_subcategoria" name="id_subcategoria">

                                    <option value="">Seleccionar subcategoría</option>
                                    <?php foreach ($subcategorias as $sub) : ?>
                                        <?php if ($sub->estatus == 'A') : ?>

                                            <?php if (!empty($searchData['id_subcategoria'])) : ?>
                                                <option <?php echo $sub->id == $searchData['id_subcategoria'] ? "selected" : ""; ?> value="<?= $sub->id ?>"><?= $sub->nombre ?></option>
                                            <?php endif ?>
                                            <?php if (empty($searchData['id_subcategoria'])) : ?>
                                                <option value="<?= $sub->id ?>"><?= $sub->nombre ?></option>
                                            <?php endif ?>

                                        <?php endif ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Seleccionar municipio:</label>
                                <select class="form-select form-control" id="id_municipio" name="id_municipio">
                                    <label class="col-form-label">Seleccionar municipio</label>
                                    <option value="" selected>Seleccionar municipio</option>
                                    <?php foreach ($municipios as $mun) : ?>
                                        <option <?php echo $mun["id_municipio"] == $searchData['id_municipio'] ? "selected" : ""; ?> value="<?= $mun['id_municipio'] ?>"><?= $mun['nombre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Seleccionar región:</label>
                                <select class="form-select form-control" id="id_region" name="id_region">
                                    <label class="col-form-label">Seleccionar región</label>
                                    <option value="" selected>Seleccionar region</option>
                                    <?php foreach ($regiones as $reg) : ?>
                                        <option <?php echo $reg->id == $searchData['id_region'] ? "selected" : ""; ?> value="<?= $reg->id ?>"><?= $reg->nombre ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Seleccionar estado:</label>
                                <select class="form-select form-control" id="id_estado" name="id_estado">
                                    <option value="" selected>Seleccionar estado</option>
                                    <?php foreach ($estados as $est) : ?>
                                        <option <?php echo $est["id_estado"] == $searchData['id_estado'] ? "selected" : ""; ?> value="<?= $est['id_estado'] ?>"><?= $est['nombre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="modal fade" id="detallesDoc" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="publicacionTitle">Detalles documento</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body" id="detallesBody">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($docs as $doc) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch">
                    <a href="<?php echo base_url('documentos_banco/' . $doc['id'] . '/' . $doc['archivo']) ?>" download="<?php $doc['archivo'] ?>" style="text-decoration: none; color: inherit;">
                        <section class="card mx-auto mb-3 px-3">
                            <?php
                            // Example file extension saved in the variable
                            $fileType = $doc["tipo"]; // Assuming $document is an object with the 'tipo' attribute

                            // Default icon if file type is not found
                            $iconPath = base_url('images/icons/folder.png');

                            if (array_key_exists($fileType, $fileIcons)) {
                                $iconPath = $fileIcons[$fileType];
                            }
                            ?>
                            <img src="<?= $iconPath ?>" class="card-img-top">
                            <div class="card-body p-0">
                                <h5 class="card-title text-center"><?= $doc["nombre"] ?></h5>
                            </div>
                            <div class="card-footer">
                                <a hx-get="/banco-datos/get-doc-details?id_doc=<?= $doc['id'] ?>" hx-target="#detallesBody" hx-trigger="click" role="button" data-toggle="modal" data-target="#detallesDoc" class="btn btn-outline-primary d-block" rel="noopener"><i class="bi bi-info-circle"></i> Detalles</a>
                            </div>
                        </section>
                    </a>

                </div>
            <?php endforeach; ?>

        </div>
    </section>

    <?= view('components/Footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    <script src="<?php echo base_url('js/dashboard.js') ?>"></script>
    <script type="text/javascript">
        let mensaje = '<?= session()->getFlashdata('mensaje') ?>';
        let type = '<?= session()->getFlashdata('type') ?>';
        if (mensaje.length > 0) {
            swal({
                text: mensaje,
                icon: type,
            });
        }
    </script>
    <script>
        new DataTable('#dataTable');
        new DataTable('#dataTableSub');
    </script>


</body>


</html>