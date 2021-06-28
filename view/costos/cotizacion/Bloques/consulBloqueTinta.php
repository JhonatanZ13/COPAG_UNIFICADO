<!-- Bloque de Tintas -->
<div class="x_panel">
    <div class="x_title">
        <h2>Tintas:</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><button type="button" class="btn btn-success btn-sm collapse-link">Desplegar
                    <i class="fa fa-chevron-up pl-3"></i></button></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <?php 
        $contadorTintas=0;
        foreach ($capturarDetalleTinta as $cdt) {
                    if(($cdt['Dpti_tipoTinta'] == 'BASICA')){
                ?>

        <input type="hidden" name="Dpti_id" value="<?php echo $cdt['Dpti_id']; ?>">
        <h2>Tintas Basicas:</h2>
        <div class="row">
            <div class="form-group col-md-6">
                <!-- <label class="col-form-label col-md-3 col-sm-3 "><strong>Tinta:</strong></label> -->
                <div class="col-md-8 col-sm-8 ">
                    <!-- <select name="articuloTinta" class="form-control">
                        <option value="0">Seleccione...</option>
                        <?php
                                    
                                        // foreach($tinta as $tin){
                                        //     if( $tin['Arti_id']==$cdt['Arti_id']){
                                        //         echo "<option value='".$tin['Arti_id']."' selected>".$tin['Arti_nombre']."</option>";
                                        //     }else{
                                        //         echo "<option value='".$tin['Arti_id']."'>".$tin['Arti_nombre']."</option>";
                                        //     }
                                            
                                        // }
                                    ?>
                    </select> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-md-4 col-sm-4 ">Color :</label>
                <div class="col-md-8 col-sm-8">

                    <div class="radio">
                        <label>
                            <?php
                        if($cdt['Dpti_colorTinta']=='CMYK'){ 
                            echo '<input type="radio" class="flat" checked name="colorTintaBasica" value="CMYK"> CMYK';
                        }else if($cdt['Dpti_colorTinta']=='K'){ 
                            echo '<input type="radio" class="flat" checked name="colorTintaBasica" value="K"> K';
                        }else if($cdt['Dpti_colorTinta']=='No aplica'){ 
                            echo '<input type="radio" class="flat" checked name="colorTintaBasica" value="No aplica"> No aplica';
                        }

                         
                            ?>
                        </label>
                    </div>

                </div>
            </div>
            <!-- <label class="col-md-1 col-sm-1 "></label> -->
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 ">Cantidad:</label>
                <div class="col-md-5 col-sm-5">
                    <input type="number" name="cantidadTintaBasica" readonly='readonly' id="cantidadTintaBasica"
                        class="form-control" value="<?php echo $cdt['Dpti_cantidadTinta']; ?>">
                </div>
                <div class="col-md-4 col-sm-4 ">

                    <?php
                                    $unidadCTB = array('Und','Kg','M','Ml');

                                    for($i=0;$i<count($unidadCTB);$i++){

                                        $seleccionado = false;
                                        
                                        if($unidadCTB[$i]==$cdt['Dpti_unidadCantidad']){
                                            echo "<input type='text' readonly='readonly' class='form-control' value='".$unidadCTB[$i]."'>";
                                            $seleccionado = true;
                                        }
                                    }
                                        
                                    
                                    if(!$seleccionado){
                                        echo "<input type='text' readonly='readonly' class='form-control' value='No Seleccionado'>";
                                    }

                                ?>

                </div>
            </div>
            <div class="form-group ">
                <label class="col-form-label col-md-3 col-sm-3 "><strong>Costo Unitario:</strong></label>
                <div class="col-md-8 col-sm-8 ">
                    <input type="number" class="form-control" readonly='readonly' name="costoUnitarioTintaBasica"
                        id="costoUnitarioTintaBasica" placeholder="$" value="<?php echo $cdt['Dpti_costoUnitario']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 "><strong>Subtotal:</strong></label>
                <div class="col-md-8 col-sm-8 ">
                    <input type="number" class="form-control" readonly='readonly' name="subtotalTintaBasica"
                        id="subTotalTintaBasica" readonly="readonly" placeholder="$"
                        value="<?php echo $cdt['Dpti_subTotal'];?>">
                </div>
            </div>
        </div>
        <?php 
        $contadorTintas++;    
    }
        }
        
        if($contadorTintas==0) {
            // Si no hay datos - Inicio

            ?>
        <h2>Tintas Basicas:</h2>
        <div class="row">
            <div class="form-group col-md-6">
                <!-- <label class="col-form-label col-md-3 col-sm-3 "><strong>Tinta:</strong></label> -->
                <div class="col-md-8 col-sm-8 ">
                    <!-- <select name="articuloTinta" class="form-control">
                                        <option value="0">Seleccione...</option>
                                        <?php
                                            // foreach($tinta as $tin){
                                            //     echo "<option value='".$tin['Arti_id']."'>".$tin['Arti_nombre']."</option>";
                                            // }
                                        ?>
                                    </select> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">

                <label class="col-md-4 col-sm-4 ">Color:</label>
                <div class="col-md-8 col-sm-8">
                    <div class="radio">
                        <label>
                            <input type="radio" class="flat" checked name="colorTintaBasica" value="No aplica"> No
                            aplica
                        </label>
                    </div>


                </div>
            </div>
            <!-- <label class="col-md-1 col-sm-1 "></label> -->
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 ">Cantidad:</label>
                <div class="col-md-5 col-sm-5">
                    <input type="number" name="cantidadTintaBasica" readonly='readonly' id="cantidadTintaBasica"
                        class="form-control">
                </div>
                <div class="col-md-4 col-sm-4 ">
                    <select name="unidadCantidadTintaBasica" class="form-control">
                        <option value="und">No Seleccionado</option>

                    </select>
                </div>
            </div>
            <div class="form-group ">
                <label class="col-form-label col-md-3 col-sm-3 "><strong>Costo Unitario:</strong></label>
                <div class="col-md-8 col-sm-8 ">
                    <input type="number" class="form-control" readonly='readonly' name="costoUnitarioTintaBasica"
                        id="costoUnitarioTintaBasica" placeholder="$">
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 "><strong>Subtotal:</strong></label>
                <div class="col-md-8 col-sm-8 ">
                    <input type="number" class="form-control" readonly='readonly' name="subtotalTintaBasica"
                        id="subTotalTintaBasica" readonly="readonly" placeholder="$">
                </div>
            </div>
        </div>


        <?php
            //
        }
    
    
     ?>
        <h2>Tintas Especiales:</h2>
        <?php

        $contadorTintasEspeciales=0;
        foreach ($capturarDetalleTinta as $cdt) {
                    if(($cdt['Dpti_tipoTinta'] == 'ESPECIAL')){
                ?>
        <input type="hidden" name="Dpti_idEspecial[]" value="<?php echo $cdt['Dpti_id']; ?>">
        <div id="contenedorTintaEspecial">
            <div class="x_panel">
                <div id="cabeceraTintaEspecial0">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <!-- <label class="col-form-label col-md-3 col-sm-3 "><strong>Tinta:</strong></label> -->
                            <div class="col-md-8 col-sm-8 ">
                                <!-- <select name="articuloTintaEspecial[]" class="form-control">
                                    <option value="0">Seleccione...</option>
                                    <?php
                                                    // foreach($tinta as $tin){
                                                    //     if( $tin['Arti_id']==$cdt['Arti_id']){
                                                    //         echo "<option value='".$tin['Arti_id']."' selected>".$tin['Arti_nombre']."</option>";
                                                    //     }else{
                                                    //         echo "<option value='".$tin['Arti_id']."'>".$tin['Arti_nombre']."</option>";
                                                    //     }
                                                    // }
                                                ?>
                                </select> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-5 form-group" id="cabeceraTintaEspecial1">
                            <label class="col-md-2 col-sm-2 ">Codigo Color:</label>
                            <div class="col-md-10 col-sm-10">
                                <input type="text" name="colorTintaEspecial[]" readonly='readonly'
                                    class="form-control codigoColorTintaEspecial" placeholder="Ninguno."
                                    value="<?php echo $cdt['Dpti_colorTinta']; ?>">
                            </div>
                        </div>
                        <!-- <label class="col-md-1 col-sm-1 "></label> -->
                        <div class="col-md-6 form-group" id="cabeceraTintaEspecial2">
                            <label class="control-label col-md-2 col-sm-2 ">Cantidad:</label>
                            <div class="col-md-5 col-sm-5">
                                <input type="number" readonly='readonly' name="cantidadTintaEspecial[]"
                                    class="form-control cantidadTintaEspecial"
                                    value="<?php echo $cdt['Dpti_cantidadTinta']; ?>">
                            </div>
                            <div class="col-md-5 col-sm-5 ">

                                <?php
                                                $unidadCTB = array('Und','Kg','M','Ml');

                                                for($i=0;$i<count($unidadCTB);$i++){
            
                                                    $seleccionado = false;
                                                    
                                                    if($unidadCTB[$i]==$cdt['Dpti_unidadCantidad']){
                                                        echo "<input type='text' readonly='readonly' class='form-control' value='".$unidadCTB[$i]."'>";
                                                        $seleccionado = true;
                                                    }
                                                }
                                                    
                                                
                                                if(!$seleccionado){
                                                    echo "<input type='text' readonly='readonly' class='form-control' value='No Seleccionado'>";
                                                }
                                            
                                
                                ?>

                                <!-- <input type="text"
                                        class="form-control" readonly="readonly" placeholder=""
                                        value="<?php //echo $cdt['Med_descripcion']; ?>"> -->
                            </div>
                        </div>
                        <div class="col-md-1 d-flex justify-content-end">

                            <?php
                    
                    
                    ?>

                        </div>
                    </div>
                </div>
                <div id="copyTintaEspecial">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <label class="col-md-1 col-sm-1 "></label> -->
                            <div class="col-md-6 form-group">
                                <label class="col-form-label col-md-3 col-sm-3 "><strong>Costo
                                        unitario:</strong></label>
                                <div class="col-md-8 col-sm-8 ">
                                    <input type="number" readonly='readonly' name="costoUnitarioTintaEspecial[]"
                                        class="form-control costoUnitarioTintaEspecial" placeholder="$"
                                        value="<?php echo $cdt['Dpti_costoUnitario']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="col-form-label col-md-3 col-sm-3 "><strong>Subtotal:</strong></label>
                                <div class="col-md-8 col-sm-8 ">
                                    <input type="number" readonly='readonly' name="subtotalTintaEspecial[]"
                                        class="form-control subtotalTintaEspecial" readonly="readonly" placeholder="$"
                                        value="<?php echo $cdt['Dpti_subTotal']; ?>">
                                </div>
                            </div>
                        </diV>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        $contadorTintasEspeciales++;
    }
    
        }
        
        if($contadorTintasEspeciales==0){
            ?>
        <div id="contenedorTintaEspecial">
            <div class="x_panel">
                <div id="cabeceraTintaEspecial0">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <!-- <label class="col-form-label col-md-3 col-sm-3 "><strong>Tinta:</strong></label> -->
                            <div class="col-md-8 col-sm-8 ">
                                <!-- <select name="articuloTintaEspecial[]" class="form-control">
                                                <option value="0">Seleccione...</option>
                                                <?php
                                                    // foreach($tinta as $tin){
                                                    //     echo "<option value='".$tin['Arti_id']."'>".$tin['Arti_nombre']."</option>";
                                                    // }
                                                ?>
                                            </select> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-5 form-group" id="cabeceraTintaEspecial1">
                            <label class="col-md-2 col-sm-2 ">Codigo Color:</label>
                            <div class="col-md-10 col-sm-10">
                                <input type="text" readonly='readonly' name="colorTintaEspecial[]"
                                    class="form-control codigoColorTintaEspecial" placeholder="Ninguno.">
                            </div>
                        </div>
                        <!-- <label class="col-md-1 col-sm-1 "></label> -->
                        <div class="col-md-6 form-group" id="cabeceraTintaEspecial2">
                            <label class="control-label col-md-2 col-sm-2 ">Cantidad:</label>
                            <div class="col-md-5 col-sm-5">
                                <input type="number" readonly='readonly' name="cantidadTintaEspecial[]"
                                    class="form-control cantidadTintaEspecial">
                            </div>
                            <div class="col-md-4 col-sm-4 ">
                                <!-- <select name="unidadCantidadTintaEspecial[]" class="form-control">
                                    <option value="und">Und</option>
                                    <option value="Kg">Kg</option>
                                    <option value="M">M</option>
                                    <option value="Ml">Ml</option>
                                </select> -->
                                <?php
                                                
                                                    
                                                
                                                if(!$seleccionado){
                                                    echo "<input type='text' readonly='readonly' class='form-control' value='No Seleccionado'>";
                                                }
                                            
                                
                                ?>
                            </div>
                        </div>
                        <!-- <div class="col-md-1 d-flex justify-content-end">
                            <button type="button" class="btn btn-success" id="agregarTintaEspecial"><i
                                    class="fas fa-plus-square"></i></button>
                        </div> -->
                    </div>
                </div>
                <div id="copyTintaEspecial">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <label class="col-md-1 col-sm-1 "></label> -->
                            <div class="col-md-6 form-group">
                                <label class="col-form-label col-md-3 col-sm-3 "><strong>Costo
                                        unitario:</strong></label>
                                <div class="col-md-8 col-sm-8 ">
                                    <input type="number" readonly='readonly' name="costoUnitarioTintaEspecial[]"
                                        class="form-control costoUnitarioTintaEspecial" placeholder="$" value="">
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="col-form-label col-md-3 col-sm-3 "><strong>Subtotal:</strong></label>
                                <div class="col-md-8 col-sm-8 ">
                                    <input type="number" readonly='readonly' name="subtotalTintaEspecial[]"
                                        class="form-control subtotalTintaEspecial" readonly="readonly" placeholder="$">
                                </div>
                            </div>
                        </diV>
                    </div>
                </div>
            </div>
        </div>


        <?php


        }
         ?>
        <div class="col-md-6 my-3">
            <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 "><strong>Valor total:</strong></label>
                <div class="col-md-9 col-sm-9 ">
                    <input type="number" name="valorTotalTintas" class="form-control" id="totalTintas"
                        readonly="readonly" placeholder="$" value="">
                </div>
            </div>
        </div>

    </div>
</div>