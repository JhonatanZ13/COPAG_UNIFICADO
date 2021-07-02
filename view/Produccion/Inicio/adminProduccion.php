<?php  if ($_SESSION['rolUser'] == 'Administrador' || $_SESSION['rolUser'] == 'Funcionario'){ ?>

<div class="container">
    <div class="page-title">
        <div class="title_left">
            <h3>Administrar Ordenes de Produccion</h3>
        </div>
    </div>
    
    <div class="x_panel mt-2">
        <form action="<?php echo getUrl("Produccion","Produccion","postInsertFirma")?>" enctype="multipart/form-data" method="POST">
            <?php
                if(mysqli_num_rows($datosfirma) != 0){
                    foreach ($datosfirma as $res) {
            ?>
                <div class="col-md-8">
                    <input type="hidden" value="<?php echo $_SESSION['idUser'] ?>" name="usu_id">
                    <div class="col-md-10">
                        <div class="form-group row" id="grupoCantidad">
                            <label class="col-form-label col-md-3 col-sm-3">Cargo:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="fir_cargo" value="<?php echo $res['fir_cargo']?>">
                            </div>
                        </div>
                        <div class="form-group row" id="grupoCantidad">
                            <label class="col-form-label col-md-3 col-sm-3">Nombre:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" disabled value="<?php echo $usu_name; ?>">
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row float-right">
                            <img src="<?php echo $res['fir_imagen']; ?>" id="prevfirma" style="width: 340px; height: 100px;">
                            <div class="">
                                <input type="file" id="subirFirma" class="mt-3" placeholder="Imagen" name="fir_imagen" required><br>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                    }
                }else{
                    
            ?>
                <div class="col-md-8">
                    <input type="hidden" value="<?php echo $_SESSION['idUser'] ?>" name="usu_id">
                    <div class="col-md-10">
                        <div class="form-group row" id="grupoCantidad">
                            <label class="col-form-label col-md-3 col-sm-3">Cargo:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="fir_cargo">
                            </div>
                        </div>
                        <div class="form-group row" id="grupoCantidad">
                            <label class="col-form-label col-md-3 col-sm-3">Nombre:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" disabled value="<?php echo $usu_name; ?>">
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row float-right">
                            <img id="prevfirma" style="width: 340px; height: 100px;">
                            <div class="">
                                <input type="file" id="subirFirma" class="mt-3" placeholder="Imagen" name="fir_imagen" /><br>
                            </div>
                        </div>
                    </div>
                </div> 
            <?php
            }
            ?>
            <div class="col-md-3">
                <a href="<?php echo getUrl("Produccion", "Produccion", "getMain"); ?>"><button type="button" class="btn btn-danger">Volver a produccion</button></a>
                <input type="submit" value="Guardar datos" class="btn btn-success">
            </div>
        </form>
    </div>
    <!-- Tabla de consulta Ordenes de Producción -->
    <div class="x_panel mt-2">

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
                                echo "<tr class='even pointer'>";
                                echo "<td>" . $or['Odp_id'] . "</td>";
                                echo "<td>" . $or['Emp_razonSocial'] . "</td>";
                                echo "<td>" . $or['Pba_descripcion'] . "</td>";
                                echo "<td>" . $or['Usu_primerNombre'] . ' ' . $or['Usu_segundoApellido'] . "</td>";
                                echo "<td>" . $or['Odp_fechaCreacion'] . "</td>";
                                echo "<td>" . $or['Odp_fechaEntrega'] . "</td>";
                                echo "<td> <strong>" . $or['Est_nombre'] . "</strong></td>";
                                echo "<td class=''>
                                <button id='modalAprobar' data-id='" . $or['Odp_id'] . "' data-url='" . getUrl("Produccion", "Produccion", "postAprobarOrdenP", array("Odp_id" => $or['Odp_id']), "ajax") . "' 
                                class='btn btn-sm btn-primary' data-toggle='tooltip' data-placement='bottom' title='Aprobar Orden'><i class='fa fa-check'></i></button>

                                <button id='modalRechazar' data-id='" . $or['Odp_id'] . "' data-url='" . getUrl("Produccion", "Produccion", "postRechazarOrdenP", array("Odp_id" => $or['Odp_id']), "ajax") . "' 
                                class='btn btn-sm btn-danger' data-toggle='tooltip' data-placement='bottom' title='Rechazar Orden'><i class='fa fa-times'></i></button>

                                <a href='" . getUrl("Produccion", "Produccion", "getConsult", array("Odp_id" => $or['Odp_id'])) . "'>
                                    <button class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='bottom' title='Visualizar'><i class='fa fa-eye'></i>
                                    </button>
                                </a> 
                                
                                <button id='modalEliminar' data-id='" . $or['Odp_id'] . "' data-url='" . getUrl("Produccion", "Produccion", "postDelete", array("Odp_id" => $or['Odp_id']), "ajax") . "' 
                                class='btn btn-sm btn-danger' data-toggle='tooltip' data-placement='bottom' title='Eliminar'><i class='fa fa-trash-o'></i></button>

                                </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php }else{
    
    echo "<div class='x_panel'>";
    echo "No tienes los permisos necesarios para acceder a esta vista :D <br>";
    echo "<a href='".getUrl("Produccion", "Produccion", "getMain")."'> <button class='btn btn-primary mt-3'> Volver </button> </a>";
    echo "</div>";
} ?>