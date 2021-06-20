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
                                <select name="material[]" class="form-control selectMaterial" data-url="<?php echo getUrl("costos","cotizacion","getConsultarUnidadMedida",false,"ajax");?>">
                                    <option value="0">Seleccione...</option>
                                    <?php
                                                    foreach($material as $mt){
                                                        if($mt['Arti_id'] == $cdm['Arti_id']){
                                                            echo "<option value='".$mt['Arti_id']."' selected>".$mt['Arti_nombre']."</option>";
                                                        }else{
                                                            echo "<option value='".$mt['Arti_id']."'>".$mt['Arti_nombre']."</option>";
                                                        }
                                                    }
                                                ?>
                                </select>
                            </div>
                            <div class="col-md-5 col-sm-5 ">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Unidad:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" readonly="readonly" placeholder=""
                                            value="<?php echo $cdm['Med_descripcion']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-1 d-flex justify-content-end">
                        <?php
                    
                    if($contadorMaterial==0){
                        ?>
                        <button type="button" class="btn btn-success" id="agregarMaterial"><i
                                class="fas fa-plus-square"></i></button>
                        <?php
                    }else{
                        ?>
                        <button type="button" class="btn btn-danger eliminarMaterial"><i class="fas fa-trash-alt"
                                aria-hidden="true"></i></button>
                        <?php
                    }
                    
                    ?>



                    </div>
                </div>

                <div id="copyMaterial">
                    <div class="col-md-12">
                        <!-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 ">Tamaño:</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="number" name="tamanoMaterial[]" class="form-control"
                                            value="<?php echo $cdm['Dpm_tamanoMaterial']; ?>">
                                    </div>
                                    <div class="col-md-4 col-sm-4 ">
                                        <select name="unidadTamanoMaterial[]" class="form-control">

                                            <?php
                                                        $unidadTM = array('M','Cm','Mm');
                                                        for($i=0;$i<count($unidadTM);$i++){
                                                            if($unidadTM[$i]==$cdm['Dpm_unidadTamanoMaterial']){
                                                                echo "<option value='$unidadTM[$i]' selected>$unidadTM[$i]</option>";
                                                            }else{
                                                                echo "<option value='$unidadTM[$i]'>$unidadTM[$i]</option>";
                                                            }
                                                        }
                                                    ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 ">Gramaje:</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="number" name="gramajeMaterial[]" class="form-control"
                                            value="<?php //echo $cdm['Dpm_gramajeMaterial']; ?>">
                                    </div>
                                    <div class="col-md-4 col-sm-4 ">
                                        <select name="unidadGramajeMaterial[]" class="form-control">
                                            <?php
                                                        // $unidadTM = array('Kg','g','Mg');
                                                        // for($i=0;$i<count($unidadTM);$i++){
                                                        //     if($unidadTM[$i]==$cdm['Dpm_unidadGramajeMaterial']){
                                                        //         echo "<option value='$unidadTM[$i]' selected>$unidadTM[$i]</option>";
                                                        //     }else{
                                                        //         echo "<option value='$unidadTM[$i]'>$unidadTM[$i]</option>";
                                                        //     }
                                                        // }
                                                    ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Cantidad:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="number" name="cantidadMaterial[]"
                                            class="form-control cantidadMaterial"
                                            value="<?php echo $cdm['Dpm_cantidad']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Costo Unitario:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="number" name="costoUnitarioMaterial[]"
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
                                <input type="number" name="subtotalMaterial[]" class="form-control subtotalMaterial"
                                    readonly="readonly" placeholder="$" value="<?php echo $cdm['Dpm_valorTotal']; ?>">
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

        <!-- <div id="contenedorMaterial">
            <div class="x_panel">
                <div class="row">
                    <div class="col-md-6" id="copyCabeceraMaterial">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Material:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="material[]" class="form-control">
                                    <option value="0">Seleccione...</option>
                                    <?php
                                                    foreach($material as $mt){
                                                        
                                                        echo "<option value='".$mt['Arti_id']."'>".$mt['Arti_nombre']."</option>";
                                                        
                                                    }
                                                ?>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <button type="button" class="btn btn-success" id="agregarMaterial"><i
                                class="fas fa-plus-square"></i></button>
                    </div>
                </div>

                <div id="copyMaterial">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 ">Tamaño:</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="number" name="tamanoMaterial[]" class="form-control" value="">
                                    </div>
                                    <div class="col-md-4 col-sm-4 ">
                                        <select name="unidadTamanoMaterial[]" class="form-control">

                                            <?php
                                                        $unidadTM = array('M','Cm','Mm');
                                                        for($i=0;$i<count($unidadTM);$i++){
                                                            
                                                            echo "<option value='$unidadTM[$i]'>$unidadTM[$i]</option>";
                                                            
                                                        }
                                                    ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 ">Gramaje:</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="number" name="gramajeMaterial[]" class="form-control" value="">
                                    </div>
                                    <div class="col-md-4 col-sm-4 ">
                                        <select name="unidadGramajeMaterial[]" class="form-control">
                                            <?php
                                                        $unidadTM = array('Kg','g','Mg');
                                                        for($i=0;$i<count($unidadTM);$i++){
                                                            
                                                            echo "<option value='$unidadTM[$i]'>$unidadTM[$i]</option>";
                                                            
                                                        }
                                                    ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Cantidad:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="number" name="cantidadMaterial[]"
                                            class="form-control cantidadMaterial" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Costo Unitario:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="number" name="costoUnitarioMaterial[]"
                                            class="form-control costoUnitarioMaterial" placeholder="$" value="">
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
        </div> -->

        
        <div id="contenedorMaterial">
                        <div class="x_panel">
                            <div class="row">
                                <div class="col-md-11" id="copyCabeceraMaterial">
                                    <div class="form-group row">
                                        <label class="control-label col-md-2 col-sm-2 ">Material:</label>
                                        <div class="col-md-5 col-sm-5 ">
                                            <select name="material[]" class="form-control selectMaterial"
                                                data-url="<?php echo getUrl("costos","cotizacion","getConsultarUnidadMedida",false,"ajax");?>">
                                                <option value="0">Seleccione...</option>
                                                <?php
                                                    foreach($material as $mt){
                                                        echo "<option value='".$mt['Arti_id']."'>".$mt['Arti_nombre']."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-5 col-sm-5 ">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 ">Unidad:</label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" class="form-control" readonly="readonly"
                                                        placeholder="" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-9 col-sm-9 ">
                                            <select name="material[]" class="form-control">
                                                <option value="0">Seleccione...</option>
                                                <?php
                                                    // foreach($material as $mt){
                                                    //     echo "<option value='".$mt['Arti_id']."'>".$mt['Arti_nombre']."</option>";
                                                    // }
                                                ?>
                                            </select>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-md-1 d-flex justify-content-end">
                                    <button type="button" class="btn btn-success" id="agregarMaterial"><i
                                            class="fas fa-plus-square"></i></button>
                                </div>
                            </div>

                            <div id="copyMaterial">
                                <div class="col-md-12">
                                    <div class="row">
                                        <!-- <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label col-md-2 col-sm-2 ">Tamaño:</label>
                                                <div class="col-md-5 col-sm-5">
                                                    <input type="number" name="tamanoMaterial[]" class="form-control">
                                                </div>
                                                <div class="col-md-4 col-sm-4 ">
                                                    <select name="unidadTamanoMaterial[]" class="form-control">
                                                        <option value="M">M</option>
                                                        <option value="Cm">Cm</option>
                                                        <option value="Mm">MM</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label col-md-2 col-sm-2 ">Gramaje:</label>
                                                <div class="col-md-5 col-sm-5">
                                                    <input type="number" name="gramajeMaterial[]" class="form-control">
                                                </div>
                                                <div class="col-md-4 col-sm-4 ">
                                                    <select name="unidadGramajeMaterial[]" class="form-control">
                                                        <option value="Kg">Kg</option>
                                                        <option value="g">g</option>
                                                        <option value="Mg">Mg</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 ">Cantidad:</label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="number" name="cantidadMaterial[]"
                                                        class="form-control cantidadMaterial">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 ">Costo Unitario:</label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="number" name="costoUnitarioMaterial[]"
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
                                            <input type="number" name="subtotalMaterial[]"
                                                class="form-control subtotalMaterial" readonly="readonly"
                                                placeholder="$" value="">
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