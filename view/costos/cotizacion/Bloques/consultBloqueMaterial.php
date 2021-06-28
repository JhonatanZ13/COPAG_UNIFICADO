<!-- Inicio Bloque material -->

<div class="x_panel">
    <div class="x_title">
        <h2>Material:</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><button type="button" class="btn btn-success btn-sm collapse-link">Desplegar
                    <i class="fa fa-chevron-up pl-3"></i></button></li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <!-- Inicio Bloque Material -->
    <div class="x_content">
        <!-- Inicio Material -->
        <?php
        $contadorMaterial=0;
                    foreach ($capturarDetalleMaterial as $cdm) {
                    
                    ?>
        <div id="contenedorMaterial">
            <div class="x_panel">
                <div class="row">
                    <div class="col-md-11" id="copyCabeceraMaterial">
                        <div class="form-group row">
                            <label class="control-label col-md-2 col-sm-2 ">Material:</label>
                            <div class="col-md-5 col-sm-5 ">
                                

                                <?php
                                    $seleccionado = false;
                                    foreach($material as $mt){
                                        if($mt['Arti_id'] == $cdm['Arti_id']){
                                            // echo "<input type='hidden' readonly='readonly' class='' value='".$mt['Arti_id']."'>";
                                            echo "<input type='text' readonly='readonly' class='form-control' value='".$mt['Arti_nombre']."'>";
                                            $seleccionado = true;
                                        }
                                    }
                                    
                                    if(!$seleccionado){
                                        echo "<input type='hidden' readonly='readonly' class='selectMaterial' value='0'>";
                                        echo "<input type='text' readonly='readonly' class='form-control' value='No Seleccionado'>";
                                    }
                                    ?>

                            </div>
                            <div class="col-md-5 col-sm-5 ">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Unidad:</label>
                                    <div class="p"></div>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" readonly="readonly" placeholder=""
                                            value="<?php echo $cdm['Med_descripcion']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-1 d-flex justify-content-end">




                    </div>
                </div>

                <div id="copyMaterial">
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Cantidad:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="number" readonly="readonly" name="cantidadMaterial[]"
                                            class="form-control cantidadMaterial"
                                            value="<?php echo $cdm['Dpm_cantidad']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Costo Unitario:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="number" readonly="readonly" name="costoUnitarioMaterial[]"
                                            class="form-control costoUnitarioMaterial" placeholder="$"
                                            value="<?php echo $cdm['Dpm_precioUnitario']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 "><strong>Valor
                                    Subtotal:</strong></label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" readonly="readonly" name="subtotalMaterial[]"
                                    class="form-control subtotalMaterial" readonly="readonly" placeholder="$"
                                    value="<?php echo $cdm['Dpm_valorTotal']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        $contadorMaterial++;    
        
    }
        
        if($contadorMaterial==0){
            //Si no hay campos
            ?>




        <div id="contenedorMaterial">
            <div class="x_panel">
                <div class="row">
                    <div class="col-md-11" id="copyCabeceraMaterial">
                        <div class="form-group row">
                            <label class="control-label col-md-2 col-sm-2 ">Material:</label>
                            <div class="col-md-5 col-sm-5 ">

                                <?php
                                    $seleccionado = false;
                                    
                                    
                                    if(!$seleccionado){
                                        echo "<input type='hidden' readonly='readonly' class='selectMaterial' value='0'>";
                                        echo "<input type='text' readonly='readonly' class='form-control' value='No Seleccionado'>";
                                    }
                                    ?>

                            </div>
                            <div class="col-md-5 col-sm-5 ">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Unidad:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" readonly="readonly" class="form-control" readonly="readonly"
                                            placeholder="" value="">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div id="copyMaterial">
                    <div class="col-md-12">
                        <div class="row">

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Cantidad:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="number" readonly="readonly" name="cantidadMaterial[]"
                                            class="form-control cantidadMaterial">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Costo Unitario:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="number" readonly="readonly" name="costoUnitarioMaterial[]"
                                            class="form-control costoUnitarioMaterial" placeholder="$">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 "><strong>Valor
                                    Subtotal:</strong></label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" name="subtotalMaterial[]" class="form-control subtotalMaterial"
                                    readonly="readonly" placeholder="$" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            //
        }
        
        ?>
        <!-- Fin Material -->

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 "><strong>Valor total:</strong></label>
                <div class="col-md-9 col-sm-9 ">
                    <input type="number" class="form-control" name="valorTotalMaterial" id="totalMaterial"
                        readonly="readonly" placeholder="$" value="">
                </div>
            </div>
        </div>
    </div>
</div>