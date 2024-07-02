<!DOCTYPE html>
<html lang="es">

<head>
    <title>Administrador</title>

    <?= view('components/HeadAdmin.php'); ?>

</head>

<body style="background-image: url('images/FONDO.jpg')">

    <?= view('components/NavbarAdmin.php'); ?>



    <section style="margin-top: 30vh;">
        <form method="POST" action="<?php echo base_url('administrador/createSajg') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarNSAJG" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar información del sistema juventudEsGto
                            </h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Objetivo del Sistema de desarrollo y atencion a las
                                    juventudes del Estado
                                    de Guanajuato:</label>
                                <textarea type="text" class="form-control" maxlength="800" name="objetivoS" cols="30" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">¿Qué es el Sistema de desarrollo y atencion a las
                                    juventudes del Estado
                                    de Guanajuato?:</label>
                                <textarea type="text" class="form-control" maxlength="800" name="significado" cols="30" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Objetivo del Consejo Estatal:</label>
                                <textarea type="text" class="form-control" maxlength="800" name="objetivoC" cols="30" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Agregar Imagen del Consejo Estatal:</label>
                                <input class="form-control" name="imagenConsejo" type="file" style="color:#4469C5;" /><br />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Objetivo del programa estatal para el desarrollo y
                                    atención al as juventudes del Estado Guanajuato:</label>
                                <textarea type="text" maxlength="800" class="form-control" name="objetivoP" cols="30" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">¿Cómo se construyo el Programa Estatal?:</label>
                                <textarea type="text" maxlength="800" class="form-control" name="contruccion" cols="30" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Agregar Imagen del Programa Estatal:</label>
                                <input class="form-control" name="imagenPrograma" type="file" style="color:#4469C5;" /><br />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">¿Qué es el Sistema de Información e Investigación para el Desarrollo y Atención a las
                                    Juventudes del Estado de Guanajuato?:</label>
                                <textarea type="text" maxlength="800" class="form-control" name="significadoSI" cols="30" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Objetivo del Sistema de Información e Investigación para el Desarrollo y Atención a las
                                    Juventudes del Estado de Guanajuato:</label>
                                <textarea type="text" maxlength="800" class="form-control" name="objetivoSI" cols="30" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">¿Qué es el Sistema Único de Becas?:</label>
                                <textarea type="text" maxlength="800" class="form-control" name="significadoAF" cols="30" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Objetivo del Sistema Único de Becas:</label>
                                <textarea type="text" maxlength="800" class="form-control" name="objetivoAF" cols="30" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estatus:</label>
                                <select class="form-select form-control" id="estatus" name="estatusSA">
                                    <option selected disabled>Seleccione un estatus</option>
                                    <option value="A">Activo</option>
                                    <option value="B">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>



        <!--Tabl de busqueda-->
        <div class="container" id="">
            <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Lista de sistema JuventudesGto</h1>
                                <button type="button" id="agregarPublicacion" class="btn btn-success" data-toggle="modal" data-target="#agregarNSAJG">Agregar Información del sistema juventudEsGto</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Objetivo sistema JuventudesGto</th>
                                            <th>¿Qué es es el sistema JuventudesGto?</th>
                                            <th>Objetivo del Consejo Estatal</th>
                                            <th>Imagen del Consejo Estatal</th>
                                            <th>Objetivo Programa Estatal</th>
                                            <th>¿Cómo se contruyo el Programa Estatal</th>
                                            <th>Imagen Programa Estatal</th>
                                            <th>¿Qué es es el sistema de información?</th>
                                            <th>Objetivo del sistema de información</th>
                                            <th>¿Qué es es el sistema único de becas?</th>
                                            <th>Objetivo del sistema único de becas</th>
                                            <th>Estatus</th>
                                            <th>Fecha última modificación</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($general as $s) : ?>
                                            <tr>
                                                <td><?= $s['id_general'] ?>
                                                <td><?= $s['objetivoS']; ?></td>
                                                <td><?= $s['significado']; ?></td>
                                                <td><?= $s['obejtivoC']; ?></td>
                                                <td><img src="<?php echo base_url('images_sajg/' . $s['id_general'] . '/' . $s['imagenConsejo']) ?>" width="100" alt="juventud"></td>
                                                <td><?= $s['objetivoP']; ?></td>
                                                <td><?= $s['contruccion']; ?></td>
                                                <td><img src="<?php echo base_url('images_sajg/' . $s['id_general'] . '/' . $s['imagenPrograma']) ?>" width="100" alt="juventud"></td>
                                                <td><?= $s['objetivoSI']; ?></td>
                                                <td><?= $s['significadoSI']; ?></td>
                                                <td><?= $s['objetivoAF']; ?></td>
                                                <td><?= $s['significadoAF']; ?></td>
                                                <th>
                                                    <?php if ($s['estatus'] == 'A') : ?>
                                                        <h5>
                                                            <span class="badge badge-success">Activo
                                                            </span>
                                                        </h5>
                                                    <?php endif ?>
                                                    <?php if ($s['estatus'] == 'B') : ?>
                                                        <h5><span class="badge badge-danger">Inactivo
                                                            </span></h5>
                                                    <?php endif ?>
                                                </th>
                                                <td><?= $s['fecha_modificacion']; ?></th>
                                                <th><a href="<?= base_url('administradorSAJG/edit/' . $s['id_general']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a>
                                                </th>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <form method="POST" action="<?php echo base_url('administrador/createSajgPDF') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarNSAJGPDF" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar PDF de Consejo</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el objetivo:</label>
                                <select class="form-select form-control " name="id_general">
                                    <?php foreach ($general as $t) : ?>
                                        <option value="<?= $t['id_general']; ?>"><?= $t['obejtivoC']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Nombre:</label>
                                <input id="nombre" class="form-control" name="nombre" type="text" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Agregar PDF del Consejo Estatal:</label>
                                <input class="form-control" name="pdf" type="file" style="color:#4469C5;" /><br />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estatus:</label>
                                <select id="estatus" class="form-select form-control" name="estatus">
                                    <option selected disabled>Seleccione un estatus</option>
                                    <option value="A">Activo</option>
                                    <option value="B">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>



        <div class="container" id="">
            <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Lista de PDF de Consejo</h1>
                                <button type="button" id="agregarPublicacion" class="btn btn-success" data-toggle="modal" data-target="#agregarNSAJGPDF">Agregar PDF del Consejo</button>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTablePdfs" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Objetivo</th>
                                            <th>PDF</th>
                                            <th>Estatus</th>
                                            <th>Fecha última modificación</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($generalPdf as $sg) : ?>
                                            <tr>
                                                <td><?= $sg['id_pdfs'] ?>
                                                <td><?= $sg['nombre']; ?></th>
                                                <td style="font-size: 0.5rem;"><?= $sg['obejtivoC']; ?></th>
                                                <td><?php if ($sg['pdf'] !== null) : ?><a href="<?php echo base_url('documentos_sajg_pdf/' . $sg['id_pdfs'] . '/' . $sg['pdf']) ?>" download="<?php $sg['pdf'] ?>" class="btn btn-success btn-sm">
                                                            Descargar</a><?php endif ?></td>
                                                <th><?php if ($sg['estatusPdf'] == 'A') : ?>
                                                        <h5><span class="badge badge-success">Activo
                                                            <?php endif ?></span></h5>
                                                        <?php if ($sg['estatusPdf'] == 'B') : ?>
                                                            <h5><span class="badge badge-danger">Inactivo
                                                                <?php endif ?></span></h5>
                                                </th>
                                                <td><?= $sg['fecha_modificacion']; ?></th>
                                                <th><a href="<?= base_url('/administradorSAJGPDF/editPDF/' . $sg['id_pdfs']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a>
                                                </th>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- TABLA INTEGRANTES -->
        <div class="container" id="integrantes">
            <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Integrantes del consejo estatal</h1>
                                <button type="button" id="btnAgregarIntegrante" class="btn btn-success" data-toggle="modal" data-target="#agregarIntegrante">Agregar Integrante</button>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableIntegrantes" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Cargo</th>
                                            <th>Cargo Consejo</th>
                                            <th>Importancia</th>
                                            <th>Imagen</th>
                                            <th>Estatus</th>
                                            <th>Fecha última modificación</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($integrantes as $i) : ?>
                                            <tr>
                                                <td><?= $i['id_integrante'] ?>
                                                <td><?= $i['nombre']; ?></th>
                                                <td><?= $i['cargo']; ?></th>
                                                <td><?= $i['cargo_consejo']; ?></th>
                                                <td><?= $i['importancia']; ?></th>
                                                <th><?php if ($i['imagen'] == '') : ?>
                                                        Sin imagen
                                                    <?php else : ?>
                                                        <img src="<?php echo base_url('images_integrantesConsejo/' . $i['id_integrante'] . '/' . $i['imagen']) ?>" width="100" alt="juventud">
                                                    <?php endif ?>
                                                </th>

                                                <th><?php if ($i['estatus'] == 'A') : ?>
                                                        <h5><span class="badge badge-success">Activo
                                                            <?php endif ?></span></h5>
                                                        <?php if ($i['estatus'] == 'B') : ?>
                                                            <h5><span class="badge badge-danger">Inactivo
                                                                <?php endif ?></span></h5>
                                                </th>
                                                <td><?= $i['fecha_modificacion']; ?></th>
                                                <th><a href="<?= base_url('administradorIntegrante/edit/' . $i['id_integrante']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a>
                                                </th>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- MODAL AGREGAR INTEGRANTE -->
        <form method="POST" action="<?php echo base_url('administrador/createIntegrante') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarIntegrante" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar integrante del consejo
                            </h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" maxlength="800" id="nombre" name="nombre" required></input>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Cargo:</label>
                                <input type="text" class="form-control" maxlength="800" id="cargo" name="cargo" required></input>
                            </div>
                            
                            <!-- <div class="form-group">
                                <label class="col-form-label" for="cargo">Cargo:</label>
                                <select class="form-control" id="cargo" name="cargo" required>
                                    <option value="" selected disabled>Selecciona un cargo</option>
                                    <option value="Gobernador del Estado">Gobernador del Estado</option>
                                    <option value="Director General de JuventudEsGTO">Director General de JuventudEsGTO</option>
                                    <option value="Presidente del Consejo Directivo de JuventudEsGTO">Presidente del Consejo Directivo de JuventudEsGTO</option>
                                    <option value="Titular de la Secretaría de Gobierno">Titular de la Secretaría de Gobierno</option>
                                    <option value="Titular de la Secretaría de Desarrollo Económico Sustentable">Titular de la Secretaría de Desarrollo Económico Sustentable</option>
                                    <option value="Titular de la Secretaría de Salud">Titular de la Secretaría de Salud</option>
                                    <option value="Titular de la Secretaría de Educación">Titular de la Secretaría de Educación</option>
                                    <option value="Director General de la Comisión de Deporte del Estado">Director General de la Comisión de Deporte del Estado</option>
                                    <option value="Representante Municipal">Representante Municipal</option>
                                    <option value="Representante de la Comisión Estatal para la Planeación de la Educación Media Superior">Representante de la Comisión Estatal para la Planeación de la Educación Media Superior</option>
                                    <option value="Representante de la Comisión Estatal para la Planeación de la Educación Superior">Representante de la Comisión Estatal para la Planeación de la Educación Superior</option>
                                    <option value="Representante de Organización Juvenil">Representante de Organización Juvenil</option>
                                    <option value="Representante del Sector Económico y Productivo">Representante del Sector Económico y Productivo</option>
                                    <option value="Representante de Organismo de la Sociedad">Representante de Organismo de la Sociedad</option>
                                    <option value="Joven Destacado">Joven Destacado</option>
                                </select>
                            </div> -->

                            <div class="form-group">
                                <label class="col-form-label" for="cargo">Cargo Consejo:</label>
                                <select class="form-control" id="cargo_consejo" name="cargo_consejo" required>
                                    <option value="" selected disabled>Selecciona un cargo de consejo</option>
                                    <option value="Presidente">Presidente</option>
                                    <option value="Secretario Técnico">Secretario Técnico</option>
                                    <option value="Consejero">Consejero</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="importancia">Importancia:</label>
                                <select class="form-control" id="importancia" name="importancia" required>
                                    <option value="" selected disabled>Selecciona nivel de importancia</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Agregar Imagen del integrante:</label>
                                <input class="form-control" id="imagen" name="imagen" type="file" style="color:#4469C5;" /><br />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estatus:</label>
                                <select class="form-select form-control" id="estatus" name="estatus">
                                    <option selected disabled>Seleccione un estatus</option>
                                    <option value="A">Activo</option>
                                    <option value="B">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>


    </section>


    <?= view('components/Footer.php'); ?>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    <script>
        new DataTable('#dataTable');
        new DataTable('#dataTablePdfs');
        new DataTable('#dataTableIntegrantes');
    </script>

    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';
        if (mensaje == '1') {
            swal('', 'Usuario agregado con éxito', 'success');
        } else if (mensaje == '0') {
            swal('', 'Fallo al agregar!', 'error');
        } else if (mensaje == '2') {
            swal('', 'Usuario Actualizado', 'success');
        } else if (mensaje == '3') {
            swal('', 'Fallo al Actualizar!', 'error');
        } else if (mensaje == '4') {
            swal('', 'Usurio eliminado correctamente', 'success');
        } else if (mensaje == '5') {
            swal('', 'Slider creado con éxito', 'success');
        } else if (mensaje == '6') {
            swal('', 'El estatus t la descripción del slider es requerido', 'error');
        } else if (mensaje == '7') {
            swal('', 'Slider eliminado correctamente', 'success');
        } else if (mensaje == '8') {
            swal('', 'Slider actualizado con éxito', 'success');
        } else if (mensaje == '9') {
            swal('', 'Informarción general del sistema JUVENTUDESGTO creada con éxito', 'success');
        } else if (mensaje == '10') {
            swal('', 'El estatus es requerido', 'error');
        } else if (mensaje == '11') {
            swal('', 'Fallo al crear,  la informción general seleccione un documento JPG,JPEG,PNG', 'error');
        } else if (mensaje == '12') {
            swal('', 'Fallo al crear, seleccione un documento PDF, DOCX', 'error');
        } else if (mensaje == '13') {
            swal('', 'Información del SAJG eliminada correctamente', 'success');
        } else if (mensaje == '14') {
            swal('', 'Información del sistema JUVENTUDESGTO actualizada correctamente', 'success');
        } else if (mensaje == '15') {
            swal('', 'PDF creado con éxito', 'success');
        } else if (mensaje == '16') {
            swal('', 'PDF actualizado correctamente', 'success');
        } else if (mensaje == '17') {
            swal('', 'Integrante del consejo agregado correctamente', 'success');
        } else if (mensaje == '18') {
            swal('', 'Integrante del consejo actualizado correctamente', 'success');
        } else if (mensaje == '19') {
            swal('', 'Fallo al crear, por favor seleccione una imagen JPG,JPEG,PNG', 'error');
        }
    </script>
</body>

</html>