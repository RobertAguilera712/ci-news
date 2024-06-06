<!DOCTYPE html>
<html lang="es">

<head>
    <title>Gráficas</title>
    <?= view('components/HeadAdmin.php'); ?>
</head>

<body style="background-image: url('images/FONDO.jpg');  ">

    <?= view('components/NavbarAdmin.php'); ?>

    <section style=" margin-top: 30vh;">

    </section>

    <form method="POST" action="<?php echo base_url('graficas-admin/crearGrafica') ?>" enctype="multipart/form-data">
        <div class="modal fade" id="agregarGrafica" tabindex="-1" role="dialog" aria-labelledby="publicacionTitle">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="publicacionTitle">Agregar Grafica</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label">Título:</label>
                            <input type="text" class="form-control" maxlength="400" name="titulo" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tipo de gráfica:</label>
                            <select onchange="loadOptions(this, event)" class="form-select form-control" name="tipo" id="tipo-grafica">
                                <option selected disabled>Seleccione un tipo</option>
                                <option value="column">Barras</option>
                                <option value="area">Área</option>
                                <option value="pie">Pastel</option>
                                <option value="line">Líneas</option>
                            </select>
                        </div>

                        <div id="less-pie" style="display: none;">
                            <div class="form-group">
                                <label class="col-form-label">Leyenda Eje Y:</label>
                                <input type="text" class="form-control" name="leyenda_y" />
                            </div>
                        </div>

                        <div id="tipo-column" style="display: none;">
                            <div class="form-group">
                                <label class="col-form-label">Leyenda Eje X:</label>
                                <input type="text" class="form-control" name="leyenda_x" />
                            </div>
                        </div>

                        <div id="tipo-area" style="display: none;">
                            <div class="form-group">
                                <label class="col-form-label">Fecha Inicio:</label>
                                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Fecha Fin:</label>
                                <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Incluir Cero:</label>
                                <select class="form-select form-control" name="incluir_cero">
                                    <option selected disabled>Seleccione</option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Prefijo Eje Y:</label>
                                <input type="text" maxlength="10" class="form-control" name="prefijo" placeholder="Unidad de los datos del eje Y" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Seleccione el estatus:</label>
                            <select class="form-select form-control" name="estatus">
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


    <!-- Testimonios-->
    <div class="container" id="search">
        <div class="row">
            <div class="container-fluid">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="head">
                            <h1 class="text-primary">Lista de Gráficas</h1>
                            <?php if ($_SESSION['usuario'] !== 'investigador') : ?>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarGrafica">Agregar Gráfica</button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Título</th>
                                        <th>Tipo</th>
                                        <th>Leyenda X</th>
                                        <th>Leyenda Y</th>
                                        <th>Incluir Cero</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Estatus</th>
                                        <th>Fecha última modificación</th>
                                        <th>Editar</th>
                                        <th>Editar Datos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($graficas as $g) : ?>
                                        <tr>
                                            <td><?= $g['id_grafica'] ?></td>
                                            <td><?= $g['titulo']; ?></td>
                                            <td>
                                                <?php switch ($g['tipo']):
                                                    case 'column': ?>
                                                        Barras
                                                        <?php break; ?>
                                                    <?php
                                                    case 'area': ?>
                                                        Área
                                                        <?php break; ?>
                                                    <?php
                                                    case 'pie': ?>
                                                        Pastel
                                                        <?php break; ?>
                                                    <?php
                                                    case 'line': ?>
                                                        Líneas
                                                        <?php break; ?>
                                                <?php endswitch; ?>
                                            </td>
                                            <td>
                                                <?php if ($g['tipo'] !== 'column') : ?>
                                                    N/A
                                                <?php else : ?>
                                                    <?= $g['leyenda_x']; ?>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <?php if ($g['tipo'] === 'pie') : ?>
                                                    N/A
                                                <?php else : ?>
                                                    <?= $g['leyenda_y']; ?>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <?php if ($g['tipo'] !== 'area') : ?>
                                                    N/A
                                                <?php else : ?>
                                                    <?= $g['incluir_cero']; ?>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <?php if ($g['tipo'] !== 'area') : ?>
                                                    N/A
                                                <?php else : ?>
                                                    <?= $g['fecha_inicio']; ?>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <?php if ($g['tipo'] !== 'area') : ?>
                                                    N/A
                                                <?php else : ?>
                                                    <?= $g['fecha_fin']; ?>
                                                <?php endif ?>
                                            </td>
                                            <th><?php if ($g['estatus'] == 'A') : ?>
                                                    <h5><span class="badge text-bg-success">Activo
                                                        <?php endif ?></span></h5>
                                                    <?php if ($g['estatus'] == 'B') : ?>
                                                        <h5><span class="badge text-bg-danger">Inactivo
                                                            <?php endif ?></span></h5>
                                            </th>
                                            <td><?= $g['fecha_modificacion']; ?></th>
                                            <th><a href="<?= base_url('graficas-admin/editarGrafica/' . $g['id_grafica']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a>
                                            <th><a href="<?= base_url('/graficas-admin/editarDatosGrafica/' . $g['id_grafica']); ?>"><img width="40" height="40" class="edit" data-toggle="modal" data-target="#modalEditar" src="images/icons/edit.svg"></a>
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


    <!-- Gráficas-->
    <div class="container">
        <div class="row">
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="head">
                            <h1 class="text-primary">Gráficas</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row" id="charts" style="background-color: white; margin-bottom: 100px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
        let mensaje = '<?php echo $mensaje ?>';
        if (mensaje == '1') {
            swal('', 'Gráfica agregada con éxito', 'success');
        } else if (mensaje == '2') {
            swal('', 'Gráfica actualizada con éxito', 'success');
        } else if (mensaje == '3') {
            swal('', 'Estatus es requerido', 'error');
        } else if (mensaje == '4') {
            swal('', 'Ya existe una gráfica con el mismo nombre', 'error');
        } else if (mensaje == '5') {
            swal('', "<?php echo session()->getFlashdata('message') ?>", 'success');
        } else if (mensaje == '6') {
            swal('', 'No se pudo importar el archivo 1', 'error');
        } else if (mensaje == '7') {
            swal('', 'No se pudo importar el archivo 2', 'error');
        } else if (mensaje == '8') {
            swal('', 'Datos actualizados', 'success');
        }
    </script>
    <script>
        new DataTable('#dataTable');
    </script>

    <script>
        let jsArray = <?php echo json_encode($graficas); ?>;

        let graficasData = []

        jsArray.forEach(grafica => {
            switch (grafica.tipo) {
                case 'column':
                    let dataColumn = []
                    grafica.data.forEach((i) => {
                        dataColumn.push({
                            'y': i.dato_y,
                            'label': i.label
                        })
                    })
                    graficasData.push({
                        animationEnabled: true,
                        theme: "light2", // "light1", "light2", "dark1", "dark2"
                        title: {
                            text: grafica.titulo
                        },
                        axisY: {
                            title: grafica.leyenda_y
                        },
                        data: [{
                            type: "column",
                            showInLegend: true,
                            legendMarkerColor: "grey",
                            legendText: grafica.leyenda_x,
                            dataPoints: dataColumn
                        }]
                    })
                    break;
                case 'area':
                    let dataArea = []
                    grafica.data.forEach((i) => {
                        dataArea.push({
                            'x': new Date(i.dato_x_fecha),
                            'y': i.dato_y,
                            'label': i.label
                        })
                    })
                    graficasData.push({
                        animationEnabled: true,
                        title: {
                            text: grafica.titulo
                        },
                        axisX: {
                            minimum: new Date(grafica.fecha_inicio),
                            maximum: new Date(grafica.fecha_fin),
                            valueFormatString: "MMM YY"
                        },
                        axisY: {
                            title: grafica.leyenda_y,
                            titleFontColor: "#4F81BC",
                            includeZero: grafica.incluir_cero,
                            suffix: grafica.prefijo
                        },
                        data: [{
                            indexLabelFontColor: "darkSlateGray",
                            name: "views",
                            type: grafica.tipo,
                            yValueFormatString: "#,##0.0mn",
                            dataPoints: dataArea
                        }]
                    }, )
                    break;
                case 'line':
                    let dataLine = []
                    grafica.data.forEach((i) => {
                        dataLine.push({
                            'y': i.dato_y,
                            'label': i.label
                        })
                    })
                    graficasData.push({
                        animationEnabled: true,
                        theme: "light2",
                        title: {
                            text: grafica.titulo
                        },
                        axisY: {
                            title: grafica.leyenda_y,
                            titleFontColor: "#4F81BC"
                        },
                        data: [{
                            type: "line",
                            indexLabelFontSize: 16,
                            dataPoints: dataLine
                        }]
                    })
                    break;
                case 'pie':
                    let data = []
                    grafica.data.forEach((i) => {
                        data.push({
                            'y': i.dato_y,
                            'label': i.label
                        })
                    })
                    graficasData.push({
                        animationEnabled: true,
                        title: {
                            text: grafica.titulo
                        },
                        data: [{
                            type: "pie",
                            startAngle: 240,
                            yValueFormatString: "##0.00\"%\"",
                            indexLabel: "{label} {y}",
                            dataPoints: data
                        }]
                    })
                    break;

            }
        });

        window.onload = function() {
            for (let index = 0; index < graficasData.length; index++) {
                var newDiv = document.createElement("div");
                newDiv.id = "chartContainer" + index;
                newDiv.style.height = "150px";
                newDiv.style.width = "50%";
                newDiv.style.margin = "20px auto 20px auto";
                newDiv.style.class = "col";

                var chartsDiv = document.getElementById("charts");
                chartsDiv.appendChild(newDiv);

                var element = graficasData[index];
                var chart = new CanvasJS.Chart("chartContainer" + index, element);
                chart.render();
            }
        }
    </script>

    <script>
        function loadOptions(params) {
            var selectBox = document.getElementById('tipo-grafica');
            var area = document.getElementById('tipo-area');
            var column = document.getElementById('tipo-column');
            var lessPie = document.getElementById('less-pie');

            switch (selectBox.value) {
                case 'column':
                    area.style.display = 'none';
                    lessPie.style.display = 'block';
                    column.style.display = 'block';
                    break;
                case 'area':
                    area.style.display = 'block';
                    lessPie.style.display = 'block';
                    column.style.display = 'none';
                    break;
                case 'line':
                    area.style.display = 'none';
                    lessPie.style.display = 'block';
                    column.style.display = 'none';
                    break;
                case 'pie':
                    area.style.display = 'none';
                    lessPie.style.display = 'none';
                    column.style.display = 'none';
                    break;

                default:
                    break;
            }
        }
    </script>

</body>


</html>