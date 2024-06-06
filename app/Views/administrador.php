<!DOCTYPE html>
<html lang="es">

<head>

    <title>Administrador</title>
    <?= view('components/HeadAdmin.php'); ?>
</head>

<body style="background-image: url('images/FONDO.jpg')">

    <?= view('components/NavbarAdmin.php'); ?>

    <div class="container" style="margin-top: 30vh;">
        <div class="row">
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-body" style="height: 70vh;">
                        <div id="chartContainer"></div>

                    </div>
                </div>
            </div>
        </div>


        <div class=" container" id="visitas">
            <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            <div class="head">
                                <h1 class="text-primary">Visitas</h1>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableVisitas" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Página</th>
                                            <th>Visitas</th>
                                            <th>Última Visita</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($visitas as $visita) : ?>
                                            <tr>
                                                <td><?= $visita['id']; ?></td>
                                                <td><?= $visita['nombre_pagina']; ?></td>
                                                <td><?= $visita['visitas']; ?></td>
                                                <td><?= $visita['ultima_visita']; ?></td>
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



        <!--Tabl de busqueda-->
        <div class=" container">
            <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="head">
                                <h1 class="text-primary">Lista de usuarios</h1>
                                <a type="button" id="agregarUsuario" class="btn btn-success" href="<?= base_url('crear_cuenta'); ?>"">Agregar
                Usuario</a>
                                    </div>
                                </div>
                                <div class=" card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTableUsuarios" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre</th>
                                                    <th>Apellidos</th>
                                                    <th>Correo</th>
                                                    <th>Telefono</th>
                                                    <th>Usuario</th>
                                                    <th>Contraseña</th>
                                                    <th>Estatus</th>
                                                    <th>Fecha modificación</th>
                                                    <th>Editar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($datos as $user) : ?>
                                                    <tr>
                                                        <td><?= $user['id_user']; ?></td>
                                                        <td><?= $user['nombre']; ?></td>
                                                        <td><?= $user['apellidos']; ?></td>
                                                        <td><?= $user['correo']; ?></td>
                                                        <td><?= $user['telefono']; ?></td>
                                                        <td><?= $user['usuario']; ?></td>
                                                        <td><?= $user['contrasena']; ?></td>
                                                        <th><?php if ($user['estatus'] == 'A') : ?>
                                                                <h5><span class="badge text-bg-success">Activo
                                                                    <?php endif ?></span></h5>
                                                                <?php if ($user['estatus'] == 'B') : ?>
                                                                    <h5><span class="badge text-bg-danger">Inactivo
                                                                        <?php endif ?></span></h5>
                                                        </th>
                                                        <td><?= $user['fecha_modificacion']; ?></td>
                                                        <th><a href="<?= base_url('administradorEdit/obtener/' . $user['id_user']); ?>"><img width="40" height="40" class="edit" src="images/icons/edit.svg"></a></th>
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

            <div class="container" id="search">
                <div class="row">
                    <div class="container-fluid">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="head">
                                    <h1 class="text-primary">Configuraciones Interfaz</h1>
                                    <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                        <!-- <button type="button" id="agregarConfig" class="btn btn-success" data-toggle="modal" data-target="#agregarConfigModal">
                                            Agregar Configuración
                                        </button> -->
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Auxiliar</th>
                                                <th>Archivo</th>
                                                <th>Estatus</th>
                                                <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                    <th>Editar</th>
                                                <?php endif; ?>
                                                <th>Archivo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($interfaz == !null) : ?>
                                                <?php
                                                foreach ($interfaz as $arc) : ?>
                                                    <tr>
                                                        <td><?= $arc['id_config'] ?>
                                                        <td><?= $arc['nombre']; ?></th>
                                                        <td><?= $arc['auxiliar']; ?></th>
                                                        <td><?= $arc['archivo']; ?></th>
                                                        <td><?php if ($arc['estatus'] == 'A') : ?>
                                                                <h5><span class="badge text-bg-success">Activo
                                                                    <?php endif ?></span></h5>
                                                                <?php if ($arc['estatus'] == 'B') : ?>
                                                                    <h5><span class="badge text-bg-danger">Inactivo
                                                                        <?php endif ?></span></h5>
                                                        </td>
                                                        <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                                            <td><a href="<?= base_url('/configs/editConfig/' . $arc['id_config']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a></td>
                                                        <?php endif ?>
                                                        <td><?php if ($arc['archivo'] == !null) : ?><a href="<?php echo base_url('interfaz/' . $arc['id_config'] . '/' . $arc['archivo']) ?>" download="<?php $arc['archivo'] ?>" class="btn btn-success btn-sm">
                                                                    Descargar</a></td>
                                                    <?php endif; ?>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!--Tabl de busqueda-->
            <div class="container">
                <div class="row">
                    <div class="container-fluid">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="head">
                                    <h1 class="text-primary">Lista de Propuestas de acción</h1>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTablePropuestas" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre Completo</th>
                                                <th>Sexo</th>
                                                <th>Edad</th>
                                                <th>Actividad</th>
                                                <th>Correo</th>
                                                <th>Municipio</th>
                                                <th>Zona</th>
                                                <th>Detalle propuesta</th>
                                                <th>Justificación propuesta</th>
                                                <th>Necesidades para propuesta</th>
                                                <th>Fecha de registro</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($propuesta as $p) : ?>
                                                <tr>
                                                    <td><?= $p['id_propuesta'] ?>
                                                    <td><?= $p['nombreC']; ?></td>
                                                    <td><?= $p['sexo']; ?></td>
                                                    <td><?= $p['edad']; ?></td>
                                                    <td><?= $p['actividad']; ?></td>
                                                    <td><?= $p['correo']; ?></td>
                                                    <td><?= $p['nombre']; ?></td>
                                                    <td><?= $p['zona']; ?></td>
                                                    <td><?= $p['detalle']; ?></td>
                                                    <td><?= $p['justificacion']; ?></td>
                                                    <td><?= $p['necesidades']; ?></td>
                                                    <td><?= $p['fecha_registro']; ?></td>
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
        </div>



        <form method="POST" action="<?php echo base_url('apoyosAdmin/createDependencia') ?>" enctype="multipart/form-data">
            <div class="modal fade" id="agregarConfigModal" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="publicacionTitle">Agregar Dependencia</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-form-label">Nombre:</label>
                                <input type="text" maxlength="200" class="form-control" name="nombre" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Auxiliar:</label>
                                <input type="text" maxlength="200" class="form-control" name="auxiliar" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Seleccione el estatus:</label>
                                <select class="form-select form-control" name="estatusDependencia">
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
            new DataTable('#dataTableVisitas');
            new DataTable('#dataTableUsuarios');
            new DataTable('#dataTablePropuestas');
        </script>

        <script>
            window.onload = function() {
                let jsArray = <?php echo json_encode($visitas); ?>;
                console.log(jsArray);
                let dataColumn = []
                jsArray.forEach((i) => {
                    if (i.nombre_pagina !== 'Inicio') {
                        dataColumn.push({
                            'y': i.visitas,
                            'label': i.nombre_pagina
                        })
                    }
                })
                let graficaVisitas = {
                    animationEnabled: true,
                    theme: "light2", // "light1", "light2", "dark1", "dark2"
                    title: {
                        text: 'Visitas de las páginas'
                    },
                    axisY: {
                        title: 'Número de visitas'
                    },
                    data: [{
                        type: "column",
                        showInLegend: true,
                        legendMarkerColor: "grey",
                        legendText: "Página",
                        dataPoints: dataColumn
                    }]
                }



                var chart = new CanvasJS.Chart("chartContainer", graficaVisitas);
                chart.render();
            }
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
                swal('', 'Registro Creado Correctamente', 'success');
            } else if (mensaje == '18') {
                swal('', 'Registro Actualizado Correctamente', 'success');
            }
        </script>
</body>

</html>