<!-- Inicio Bloque Terminados -->
<div class="x_panel">
    <div class="x_title">
        <h2>Terminados:</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><button type="button" class="btn btn-success btn-sm collapse-link">Desplegar
                    <i class="fa fa-chevron-up pl-3"></i></button></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- Inicio Bloque Terminados -->
    <div class="x_content">
        <!-- Inicio Terminado -->
        <?php
        $contadorTerminados=0;
                    foreach ($capturaDetalleTerminado as $cdter) {
                    ?>
        <div id="contenedorTerminado">
            <div class="x_panel">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-6 " id="copyTerminadoCabecera1">
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Terminado:</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="terminado[]" class="form-control selectTerminado">
                                        <option value="0">Seleccione...</option>
                                        <?php
                                                    foreach($terminado as $ter){
                                                        if($ter['Ter_id'] == $cdter['Ter_id']){
                                                            echo "<option value='".$ter['Ter_id']."' selected>".$ter['Ter_descripcion']."</option>";
                                                        }else{
                                                            echo "<option value='".$ter['Ter_id']."'>".$ter['Ter_descripcion']."</option>";
                                                        }
                                                        
                                                    }
                                                ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 " id="copyTerminadoCabecera2">
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Maquinaria:</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="maquinaTerminado[]" class="form-control ">
                                        <option value="0">Seleccione...</option>
                                        <?php
                                                    foreach($maquina as $m){
                                                        if($m['Maq_id'] == $cdter['Maq_id']){
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
                        <div class="col-md-1 d-flex justify-content-end">

                        <?php
                    
                    if($contadorTerminados==0){
                        ?>
                        <button type="button" class="btn btn-success" id="agregarTerminado"><i
                                    class="fas fa-plus-square"></i></button>
                        <?php
                    }else{
                        ?>
                        <button type="button" class="btn btn-danger eliminarTerminado"><i 
                                class="fas fa-trash-alt" aria-hidden="true"></i></button>
                        <?php
                    }
                    
                    ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 " id="copyTerminado">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Cantidad Horas:</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="number" name="cantidadHorasTerminado[]" readonly="readonly"
                                        class="form-control cantidadHoraTerminados" placeholder=""
                                        value="<?php echo $cdter['Dpt_cantidadHorasTerminado']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row col-md-6">
                            <label class="control-label col-md-3 col-sm-3 ">Costo Unitario:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" name="costoUnitarioTerminado[]" readonly="readonly"
                                    class="form-control costoUnitarioTerminados" placeholder="$"
                                    value="<?php echo $cdter['Dpt_costoUnitarioTerminado']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 "><strong>Valor
                                    Subtotal:</strong></label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" name="subtotalTerminado[]" class="form-control subtotalTerminados"
                                    readonly="readonly" placeholder="$"
                                    value="<?php echo $cdter['Dpt_subtotalTerminado']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Copiar despues de aqui -->
            <!-- inicio eliminar terminado -->
        </div>
        <?php 
    $contadorTerminados++;    
    }
        
        if($contadorTerminados==0){

            //Si no hay datos

            ?>
        <div id="contenedorTerminado">
            <div class="x_panel">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-6 " id="copyTerminadoCabecera1">
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Terminado:</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="terminado[]" class="form-control selectTerminado">
                                        <option value="0">Seleccione...</option>
                                        <?php
                                                    foreach($terminado as $ter){
                                                        
                                                        echo "<option value='".$ter['Ter_id']."'>".$ter['Ter_descripcion']."</option>";
                                                          
                                                    }
                                                ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 " id="copyTerminadoCabecera2">
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Maquinaria:</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="maquinaTerminado[]" class="form-control">
                                        <option value="0">Seleccione...</option>
                                        <?php
                                                    foreach($maquina as $m){
                                                        
                                                        echo "<option value='".$m['Maq_id']."'>".$m['Maq_nombre']."</option>";
                                                        
                                                    }
                                                    ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 d-flex justify-content-end">
                            <button type="button" class="btn btn-success" id="agregarTerminado"><i
                                    class="fas fa-plus-square"></i></button>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 " id="copyTerminado">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Cantidad Horas:</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="number" name="cantidadHorasTerminado[]"
                                        class="form-control cantidadHoraTerminados" placeholder=""
                                        value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row col-md-6">
                            <label class="control-label col-md-3 col-sm-3 ">Costo Unitario:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" name="costoUnitarioTerminado[]"
                                    class="form-control costoUnitarioTerminados" placeholder="$"
                                    value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 "><strong>Valor
                                    Subtotal:</strong></label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" name="subtotalTerminado[]" class="form-control subtotalTerminados"
                                    readonly="readonly" placeholder="$"
                                    value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Copiar despues de aqui -->
            <!-- inicio eliminar terminado -->
        </div>

        <?php

            //
        }
            ?>
        <!-- Fin Terminado -->
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 "><strong>Valor total:</strong></label>
                <div class="col-md-9 col-sm-9 ">
                    <input type="number" name="valorTomadoTerminado" class="form-control" id="totalTerminados"
                        readonly="readonly" placeholder="$" value="">
                </div>
            </div>
        </div>
    </div>
</div>