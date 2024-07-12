<!DOCTYPE html>
<html lang="es">

<head>
    <title>Banco de datos | Subcategorías</title>
    <?= view('components/HeadAdmin.php'); ?>
</head>

<body>

    <?= view('components/NavbarAdmin.php'); ?>

    <section style="margin-top: 10vh;" class="container">
        <h2>Banco de datos</h2>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url("banco-datos/browse")?>">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $category["nombre"]?> / Subcategorías</li>
            </ol>
        </nav>

        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#buscarDoc">Buscar documento</button>

        <form method="GET" action="<?php echo base_url('/banco-datos/browse/search') ?>" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" maxlength="255" name="nombre" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Autor:</label>
                                <input type="text" class="form-control" maxlength="255" name="autor"  />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Dependencia:</label>
                                <input type="text" class="form-control" maxlength="255" name="dependencia"  />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">País:</label>
                                <input type="text" class="form-control" maxlength="255" name="pais"  />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Palabras clave:</label>
                                <input type="text" class="form-control" maxlength="255" name="palabras_clave"  />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Fecha:</label>
                                <input type="date" class="form-control" name="fecha"  />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Día:</label>
                                <input type="number" class="form-control" name="dia"  />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Mes:</label>
                                <input type="number" class="form-control" name="mes"  />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Año</label>
                                <input type="number" class="form-control" name="anio"  />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccionar categoría:</label>
                                <select class="form-select form-control" id="id_categoria" name="id_categoria"  hx-get="/banco-datos/get-subcategorias" hx-target="#id_subcategoria" hx-trigger="change">
                                    <option value="" selected>Seleccionar categoría</option>
                                    <?php foreach ($categorias as $cat) : ?>
                                        <?php if ($cat['estatus'] == 'A') : ?>
                                            <option value="<?= $cat['id'] ?>"><?= $cat['nombre'] ?></option>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccionar subcategoría:</label>
                                <select class="form-select form-control" id="id_subcategoria" name="id_subcategoria" >
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Seleccionar municipio:</label>
                                <select class="form-select form-control" id="id_municipio" name="id_municipio">
                                    <label class="col-form-label">Seleccionar municipio</label>
                                    <option value="" selected>Seleccionar municipio</option>
                                    <?php foreach ($municipios as $mun) : ?>
                                        <option value="<?= $mun['id_municipio'] ?>"><?= $mun['nombre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Seleccionar región:</label>
                                <select class="form-select form-control" id="id_region" name="id_region">
                                    <label class="col-form-label">Seleccionar región</label>
                                    <option value="" selected>Seleccionar region</option>
                                    <?php foreach ($regiones as $reg) : ?>
                                        <option value="<?= $reg->id ?>"><?= $reg->nombre ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Seleccionar estado:</label>
                                <select class="form-select form-control" id="id_estado" name="id_estado">
                                    <option value="" selected>Seleccionar estado</option>
                                    <?php foreach ($estados as $est) : ?>
                                        <option value="<?= $est['id_estado'] ?>"><?= $est['nombre'] ?></option>
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

        <div class="row">
            <?php
            foreach ($subcategorias_browse as $sub) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch">
                    <a href="<?= base_url('banco-datos/browse/subcategorias/' . $sub->id); ?>" style="text-decoration: none;">
                        <section class="card mx-auto mb-3 px-3">
                            <img src="<?= base_url('images/icons/folder.png'); ?>" class="card-img-top">
                            <div class="card-body p-0">
                                <h5 class="card-title text-center"><?= $sub->nombre ?></h5>
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