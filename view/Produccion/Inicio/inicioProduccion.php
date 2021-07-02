<div class="container">
    <div class="page-title">
        <div class="x_panel col-md-12">
            <h3>Inicio de Produccion</h3>
        </div>
    </div>

    <!-- <a href="<?php //echo getUrl("Produccion", "Produccion", "formInsertOrden"); 
                    ?>" class="btn btn-app m-0"><i class="fa fa-plus"></i>Crear Orden de Produccion</a>
    <a href="<?php //echo getUrl("Produccion", "Produccion", "formInsertOrden"); 
            ?>" class="btn btn-app m-0"><i class="fa fa-share-square"></i>Generar Orden de Produccion</a> -->

    <div class="x_panel mt-2">
        <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-file"></i> Total ordenes creadas</span>
                <div class="count green">
                    <?php
                    foreach ($cantidadOrdenesCreadas as $res) {
                        echo $res['cantidad'];
                    }
                    ?>
                </div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-check"></i> Ordenes aprobadas</span>
                <div class="count">
                <?php
                    foreach ($cantidadOrdenesAprovadas as $res) {
                        echo $res['cantidad'];
                    }
                    ?>
                </div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-close"></i> Ordenes rechazadas</span>
                <div class="count red">
                <?php
                    foreach ($cantidadOrdenesRechazadas as $res) {
                        echo $res['cantidad'];
                    }
                    ?>
                </div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-exclamation"></i> Ordenes Pendientes</span>
                <div class="count text-warning">
                <?php
                    foreach ($cantidadOrdenesPendientes as $res) {
                        echo $res['cantidad'];
                    }
                    ?>
                </div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
        </div>
        
    </div>

    <!-- Tabla de consulta Ordenes de Producción -->
    <div class="x_panel">
    <a href="<?php echo getUrl("Produccion", "Produccion", "formInsertOrden");?>"><button class="btn btn-success">Crear Orden de Produccion <i class="fa fa-plus"></i></button></a>

<?php 
    if ($_SESSION['rolUser'] != 'Aprendiz') {
?>
    <a href="<?php echo getUrl("Produccion", "Produccion", "getMainAdmin");?>">
        <button class="btn btn-success">Administrar Ordenes Pendientes
            <i class="glyphicon glyphicon-cog"></i>
        </button>
    </a>
<?php 
    }
?>
    </div>
    <div class="x_panel mt-1">

        <?php if(isset($_SESSION['mensaje'])){ ?>
            <div class="alert alert-<?=$_SESSION['tipo']?> alert-dismissible " role="alert" id="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>
                <?php 
                    echo $_SESSION['mensaje'];
                    unset($_SESSION['mensaje']);
                    unset($_SESSION['tipo']);
                ?>
                </strong>
            </div>
        <?php }?>

        <div class="tab-content mt-3" id="myTabContent1">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="x_content">

                    <table class="table table-striped jambo_table" id="tablaordenproduccion">
                        <thead class="headings">
                            <tr>
                                <th>Codigo</th>
                                <th>Cliente</th>
                                <th>Producto</th>
                                <th>Encargado</th>
                                <th>Fecha de Creacion</th>
                                <th>Fecha de entrega</th>
                                <th>Estado</th>
                                <th class="">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($ordenes as $or) {
                            ?>

                            <tr class='even pointer'>
                                <td><?= $or['Odp_id']; ?></td>
                                <td><?= $or['Emp_razonSocial']; ?></td>
                                <td><?= $or['Pba_descripcion']; ?></td>
                                <td><?= $or['Usu_primerNombre'] .' '. $or['Usu_primerApellido']; ?></td>
                                <td><?= $or['Odp_fechaCreacion']; ?></td>
                                <td><?= $or['Odp_fechaEntrega']; ?></td>
                                <td> <strong><?= $or['Est_nombre']; ?></strong></td>
                                <td class='row'>
                                <?php if($or['Odp_Estado'] == 2 || $or['Odp_Estado'] == 3){ ?>
                                <a target='_blank' href='<?= getUrl("Produccion", "Produccion", "getOrdenPdf", array("Odp_id" => $or['Odp_id']), "ajax");?>'>
                                    <button class='btn btn-sm btn-danger' data-toggle='tooltip' data-placement='bottom' title='Descargar PDF'><i class='fa fa-file-pdf-o'></i>
                                </button></a> 
                                <?php
                                }else{
                                    ?>
                                    <button disabled class='btn btn-sm btn-danger' data-toggle='tooltip' data-placement='bottom' title='Opcion no disponible'><i class='fa fa-file-pdf-o'></i>
                                    <?php
                                }
                                ?>
                                <a href='<?= getUrl("Produccion", "Produccion", "getConsult", array("Odp_id" => $or['Odp_id'])); ?>'>
                                    <button class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='bottom' title='Visualizar'><i class='fa fa-eye'></i>
                                    </button>
                                </a> 
                            <?php
                                if ($_SESSION['rolUser'] != 'Aprendiz') {
                            ?>         
                                <a  href='<?= getUrl("Produccion", "Produccion", "formUpdateOrden", array("Odp_id" => $or['Odp_id'])); ?>'>
                                    <button class='btn btn-sm btn-primary' data-toggle='tooltip' data-placement='bottom' title='Editar'><i class='fa fa-edit'></i></button>
                                </a>
                                <?php
                                }
                            ?>
                            <?php
                                if ($_SESSION['rolUser'] != 'Aprendiz') {
                            ?>
                                <button id='modalEliminar' data-id='<?= $or['Odp_id']; ?>' data-url='<?= getUrl("Produccion", "Produccion", "postDelete", array("Odp_id" => $or['Odp_id']), "ajax"); ?>' 
                                class='btn btn-sm btn-danger' data-toggle='tooltip' data-placement='bottom' title='Eliminar'><i class='fa fa-trash-o'></i></button>

                                </td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>