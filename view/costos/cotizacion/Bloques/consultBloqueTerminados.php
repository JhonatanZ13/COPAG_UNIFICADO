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
                                    
                                        <?php
                                            $seleccionado = false;
                                                    foreach($terminado as $ter){
                                                        if($ter['Ter_id'] == $cdter['Ter_id']){
                                                            
                                                            echo "<input type='text' readonly='readonly' class='form-control' value='".$ter['Ter_descripcion']."'>";
                                                            $seleccionado = true;
                                                        }
                                                        
                                                    }
                                                    if(!$seleccionado){
                                                        echo "<input type='text' readonly='readonly' class='form-control' value='No Seleccionado'>";
                                                    }
                                                ?>
                                        
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 " id="copyTerminadoCabecera2">
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Maquinaria:</label>
                                <div class="col-md-9 col-sm-9 ">
                                    

<?php
                                            $seleccionado = false;
                                            foreach($maquina as $m){
                                                if($m['Maq_id'] == $cdter['Maq_id']){
                                                            
                                                            echo "<input type='text' readonly='readonly' class='form-control' value='".$m['Maq_nombre']."'>";
                                                            $seleccionado = true;
                                                        }
                                                        
                                                    }
                                                    if(!$seleccionado){
                                                        echo "<input type='text' readonly='readonly' class='form-control' value='No Seleccionado'>";
                                                    }
                                                ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 d-flex justify-content-end">

                        
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
                                    


<?php
                                            $seleccionado = false;
                                                    
                                                    if(!$seleccionado){
                                                        echo "<input type='text' readonly='readonly' class='form-control' value='No Seleccionado'>";
                                                    }
                                                ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 " id="copyTerminadoCabecera2">
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Maquinaria:</label>
                                <div class="col-md-9 col-sm-9 ">
                                    
                                                    <?php
                                            $seleccionado = false;
                                            
                                                    if(!$seleccionado){
                                                        echo "<input type='text' readonly='readonly' class='form-control' value='No Seleccionado'>";
                                                    }
                                                ?>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="col-md-12 " id="copyTerminado">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Cantidad Horas:</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="number" readonly='readonly' name="cantidadHorasTerminado[]"
                                        class="form-control cantidadHoraTerminados" placeholder=""
                                        value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row col-md-6">
                            <label class="control-label col-md-3 col-sm-3 ">Costo Unitario:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" readonly='readonly' name="costoUnitarioTerminado[]"
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
                                <input type="number" readonly='readonly' name="subtotalTerminado[]" class="form-control subtotalTerminados"
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