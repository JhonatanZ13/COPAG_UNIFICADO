<div class="col-md-12 col-sm-12 ">

    <h2>Insertar Cotizacion</h2>
    <div class="clearfix"></div>
</div>
<form id="formInsertDetalleCotizacion"
    action="<?php echo getUrl("costos","cotizacion","postUpdateDetalleCotizacion");?>" method="post">

    <input type="hidden" name="Dpe_id" value="<?php echo $Dpe_id; ?>">
    <?php   foreach ($capturarDetalleCotizacion as $cdc ) {
    
?>
    <div class="x_content">
        <!-- Observaciones  -->
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Descripcion del producto:</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><button type="button" class="btn btn-success btn-sm collapse-link">Descripcion
                                <i class="fa fa-chevron-up pl-3"></i></button></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="">
                    <div id="alerts"></div>

                    <div class="form-group">
                        <!-- <label class="control-label col-md-3 col-sm-3 ">Resizable Text area</label> -->
                        <div class="col-md-12 col-sm-12 ">
                            <textarea name="descripcion" class="resizable_textarea form-control"
                                placeholder="Ingrese observaciones generales del producto..."><?php echo $cdc['Dep_descripcion']; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12">

            <div class="x_panel">
                <div class="x_title">
                    <h2>Informacion del producto:</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><button type="button" class="btn btn-success btn-sm collapse-link">Informacion
                                <i class="fa fa-chevron-up pl-3"></i></button></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Tipo de producto:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select class="form-control" name="tipoProducto" id="detalleCotizacionTipoProducto">
                                    <option value="0">Seleccione...</option>
                                    <?php
                                    foreach($productoBase as $producto){
                                        if($producto['Pba_id']==$cdc['Pba_id']){
                                            echo "<option value='".$producto['Pba_id']."' selected>".$producto['Pba_descripcion']."</option>";
                                        }else{
                                            echo "<option value='".$producto['Pba_id']."'>".$producto['Pba_descripcion']."</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Cantidad:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" name="cantidadProducto" id="detalleCotizacionCantidad" min="1"
                                    class="form-control" value="<?php echo $cdc['Dpe_cantidad']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Paginas:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" name="paginasProducto" class="form-control"
                                    value="<?php echo $cdc['Dpe_paginasProducto']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Tamaño abierto:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" name="tamanoAbierto" class="form-control"
                                    value="<?php echo $cdc['Dpe_tamanoAbierto']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Tamaño cerrado:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" name="tamanoCerrado" class="form-control"
                                    value="<?php echo $cdc['Dpe_tamanoCerrado']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 "><strong>Costo
                                            diseño:</strong></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="number" name="costoDiseno" id="totalDiseno" class="form-control"
                                            placeholder="$" value="<?php echo $cdc['Dpe_valorDiseño']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Encargado:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <select name="encargadoDiseno" class="form-control">
                                            <option value="0">Seleccione...</option>
                                            <?php
                                            $encargadoDiseño = array('Funcionario','Aprendiz','No aplica');

                                            for($i=0;$i<count($encargadoDiseño);$i++){

                                                if($encargadoDiseño[$i]==$cdc['Dpe_encargadoDiseno']){
                                                    echo "<option value=$encargadoDiseño[$i] selected>$encargadoDiseño[$i]</option>";
                                                }else{
                                                    echo "<option value=$encargadoDiseño[$i]>$encargadoDiseño[$i]</option>";
                                                }
                                                
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="x_panel">
                <div class="x_title">
                    <h2>Planchas:</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><button type="button" class="btn btn-success btn-sm collapse-link">Informacion
                                <i class="fa fa-chevron-up pl-3"></i></button></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <!-- Inicio Bloque planchas -->
                <div class="x_content">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Maquina:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="maquinaPlancha" id="detalleCotizacionMaquinaPlancha" class="form-control">
                                    <option value="0">Seleccione...</option>
                                    <?php
                                    foreach($maquina as $m){
                                        if($m['Maq_id']==$cdc['Maq_id']){
                                            echo "<option value='".$m['Maq_id']."' selected>".$m['Maq_nombre']."</option>";
                                        }else{
                                            echo "<option value='".$m['Maq_id']."'>".$m['Maq_nombre']."</option>";
                                        }
                                        
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Cantidad:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="number" name="cantidadPlancha"
                                            class="form-control calcularCantidad"
                                            value="<?php echo $cdc['Dpe_cantidadPlancha']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Costo Unitario:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="number" name="costoUnitarioPlancha"
                                            class="form-control calcularCostoUnitario" placeholder="$"
                                            value="<?php echo $cdc['Dpe_valorUnidadPlancha']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 "><strong>Valor total:</strong></label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" name="valorTotalPlancha" class="form-control calcularResultado"
                                    readonly="readonly" placeholder="$" value="<?php echo $cdc['Dpe_totalPlancha']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin Bloque planchas -->
            </div>


            <!-- Bloque de Tintas -->
            <?php
                include_once '../view/costos/cotizacion/Bloques/updateBloqueTinta.php';
            ?>


            <!-- Inicio Bloque material -->
            <?php
                include_once '../view/costos/cotizacion/Bloques/updateBloqueMaterial.php';
            ?>


            <!-- Inicio Bloque Terminados -->
            <?php
                include_once '../view/costos/cotizacion/Bloques/updateBloqueTerminados.php';
            ?>


            <table style="border-collapse:inherit;">
                <tr>
                    <td class="text-center px-4"
                        style="background-color: #238276; color:white; border-top-left-radius: 15px; border-bottom-left-radius: 10px;">
                        <h2>INSUMOS</h2>
                    </td>
                    <td
                        style="background-color:#ced4da; border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
                        <input type="number" name="insumos" class="form-control" id="totalInsumos" readonly="readonly"
                            placeholder="$" value="<?php //echo $cdc['Dpe_insumos']; ?>">
                    </td>
                </tr>
                <tr>
                    <td class="text-center"
                        style="background-color: #238276; color:white; border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                        <h2>PROCESOS</h2>
                    </td>
                    <td
                        style="background-color:#ced4da; border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
                        <input type="number" name="procesos" class="form-control" id="totalProcesos" readonly="readonly"
                            placeholder="$" value="<?php //echo $cdc['Dpe_procesos']; ?>">
                    </td>
                </tr>
                <tr>
                    <td class="text-center"
                        style="background-color: #FC7323; color:white; border-top-left-radius: 10px; border-bottom-left-radius: 15px;">
                        <h2>TOTAL</h2>
                    </td>
                    <td
                        style="background-color:#ced4da; border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
                        <input type="number" name="total" class="form-control" id="totalCotizacion" readonly="readonly"
                            placeholder="$" value="<?php //echo $cdc['Dpe_valorTotal']; ?>">
                    </td>
                </tr>
            </table>

            <div class="ln_solid">
                <div id="contentAlertDetalleCotizacion">
                    <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> mesaje.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->
                </div>
                <div class="form-group mt-3">
                    <div class="col-md-3 offset-md-9">
                        
                        <a href="<?php echo getUrl("costos","cotizacion","updateOrden",array("Ped_id"=>$Ped_id));?>">
                            <button type="button" class="btn btn-danger">Cancelar</button>
                        </a>
                        <button type='submit' class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }  ?>
</form>