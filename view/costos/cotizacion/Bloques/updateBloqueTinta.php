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
                <label class="col-md-4 col-sm-4 ">Color:</label>
                <div class="col-md-8 col-sm-8">
                    <div class="radio">
                        <label>

                            <?php if($cdt['Dpti_colorTinta']=='No aplica'){ 
                                        echo '<input type="radio" class="flat" checked name="colorTintaBasica" value="No aplica">';
                                    }else{
                                        echo '<input type="radio" class="flat" name="colorTintaBasica" value="No aplica">';
                                     } ?>
                            No aplica
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <?php if($cdt['Dpti_colorTinta']=='CMYK'){ 
                                        echo '<input type="radio" class="flat" checked name="colorTintaBasica" value="CMYK">';
                                    }else{
                                        echo '<input type="radio" class="flat" name="colorTintaBasica" value="CMYK">';
                                     } ?>
                            CMYK
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <?php 
                            if($cdt['Dpti_colorTinta']=='K'){ 
                                        echo '<input type="radio" class="flat" checked name="colorTintaBasica" value="K">';
                                    }else{
                                        echo '<input type="radio" class="flat" name="colorTintaBasica" value="K">';
                                     } ?>
                            K
                        </label>
                    </div>

                </div>
            </div>
            <!-- <label class="col-md-1 col-sm-1 "></label> -->
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 ">Cantidad:</label>
                <div class="col-md-5 col-sm-5">
                    <input type="number" name="cantidadTintaBasica" id="cantidadTintaBasica" class="form-control"
                        value="<?php echo $cdt['Dpti_cantidadTinta']; ?>">
                </div>
                <div class="col-md-4 col-sm-4 ">
                    <select name="unidadCantidadTintaBasica" class="form-control">
                        <?php
                                    $unidadCTB = array('Und','Kg','M','Ml');

                                    for($i=0;$i<count($unidadCTB);$i++){
                                        if($unidadCTB[$i]==$cdt['Dpti_unidadCantidad']){
                                            echo "<option value='$unidadCTB[$i]' selected>$unidadCTB[$i]</option>";
                                        }else{
                                            echo "<option value='$unidadCTB[$i]'>$unidadCTB[$i]</option>";
                                        }
                                        
                                    }
                                ?>
                    </select>
                </div>
            </div>
            <div class="form-group ">
                <label class="col-form-label col-md-3 col-sm-3 "><strong>Costo Unitario:</strong></label>
                <div class="col-md-8 col-sm-8 ">
                    <input type="number" class="form-control" name="costoUnitarioTintaBasica"
                        id="costoUnitarioTintaBasica" placeholder="$" value="<?php echo $cdt['Dpti_costoUnitario']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 "><strong>Subtotal:</strong></label>
                <div class="col-md-8 col-sm-8 ">
                    <input type="number" class="form-control" name="subtotalTintaBasica" id="subTotalTintaBasica"
                        readonly="readonly" placeholder="$" value="<?php echo $cdt['Dpti_subTotal'];?>">
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
                    <div class="radio">
                        <label>
                            <input type="radio" class="flat" name="colorTintaBasica" value="CMYK">
                            CMYK
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" class="flat" name="colorTintaBasica" value="K"> K
                        </label>
                    </div>

                </div>
            </div>
            <!-- <label class="col-md-1 col-sm-1 "></label> -->
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 ">Cantidad:</label>
                <div class="col-md-5 col-sm-5">
                    <input type="number" name="cantidadTintaBasica" id="cantidadTintaBasica" class="form-control">
                </div>
                <div class="col-md-4 col-sm-4 ">
                    <select name="unidadCantidadTintaBasica" class="form-control">
                        <option value="und">Und</option>
                        <option value="Kg">Kg</option>
                        <option value="M">M</option>
                        <option value="Ml">Ml</option>
                    </select>
                </div>
            </div>
            <div class="form-group ">
                <label class="col-form-label col-md-3 col-sm-3 "><strong>Costo Unitario:</strong></label>
                <div class="col-md-8 col-sm-8 ">
                    <input type="number" class="form-control" name="costoUnitarioTintaBasica"
                        id="costoUnitarioTintaBasica" placeholder="$">
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 "><strong>Subtotal:</strong></label>
                <div class="col-md-8 col-sm-8 ">
                    <input type="number" class="form-control" name="subtotalTintaBasica" id="subTotalTintaBasica"
                        readonly="readonly" placeholder="$">
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
                                <input type="text" name="colorTintaEspecial[]" class="form-control codigoColorTintaEspecial"
                                    placeholder="Ingrese tinta." value="<?php echo $cdt['Dpti_colorTinta']; ?>">
                            </div>
                        </div>
                        <!-- <label class="col-md-1 col-sm-1 "></label> -->
                        <div class="col-md-6 form-group" id="cabeceraTintaEspecial2">
                            <label class="control-label col-md-2 col-sm-2 ">Cantidad:</label>
                            <div class="col-md-5 col-sm-5">
                                <input type="number" name="cantidadTintaEspecial[]"
                                    class="form-control cantidadTintaEspecial"
                                    value="<?php echo $cdt['Dpti_cantidadTinta']; ?>">
                            </div>
                            <div class="col-md-5 col-sm-5 ">
                                <select name="unidadCantidadTintaEspecial[]" class="form-control">
                                    <?php
                                                $unidadCTE = array('Und','Kg','M','Ml');
                                                for($i=0;$i<count($unidadCTE);$i++){
                                                    if($unidadCTE[$i]==$cdt['Dpti_unidadCantidad']){
                                                        echo "<option value='$unidadCTE[$i]' selected>$unidadCTE[$i]</option>";
                                                    }else{
                                                        echo "<option value='$unidadCTE[$i]'>$unidadCTE[$i]</option>";
                                                    }
                                                }
                                            ?>
                                </select>
                                <!-- <input type="text"
                                        class="form-control" readonly="readonly" placeholder=""
                                        value="<?php //echo $cdt['Med_descripcion']; ?>"> -->
                            </div>
                        </div>
                        <div class="col-md-1 d-flex justify-content-end">

                            <?php
                    
                    if($contadorTintasEspeciales==0){
                        ?>
                            <button type="button" class="btn btn-success" id="agregarTintaEspecial"><i
                                    class="fas fa-plus-square"></i></button>
                            <?php
                    }else{
                        ?>
                            <button type='button' class='btn btn-danger eliminarTintaEspecial'><i
                                    class='fas fa-trash-alt'></i></button>
                            <?php
                    }
                    
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
                                    <input type="number" name="costoUnitarioTintaEspecial[]"
                                        class="form-control costoUnitarioTintaEspecial" placeholder="$"
                                        value="<?php echo $cdt['Dpti_costoUnitario']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="col-form-label col-md-3 col-sm-3 "><strong>Subtotal:</strong></label>
                                <div class="col-md-8 col-sm-8 ">
                                    <input type="number" name="subtotalTintaEspecial[]"
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
                                <input type="text" name="colorTintaEspecial[]" class="form-control codigoColorTintaEspecial"
                                    placeholder="Ingrese tinta.">
                            </div>
                        </div>
                        <!-- <label class="col-md-1 col-sm-1 "></label> -->
                        <div class="col-md-6 form-group" id="cabeceraTintaEspecial2">
                            <label class="control-label col-md-2 col-sm-2 ">Cantidad:</label>
                            <div class="col-md-5 col-sm-5">
                                <input type="number" name="cantidadTintaEspecial[]"
                                    class="form-control cantidadTintaEspecial">
                            </div>
                            <div class="col-md-4 col-sm-4 ">
                                <select name="unidadCantidadTintaEspecial[]" class="form-control">
                                    <option value="und">Und</option>
                                    <option value="Kg">Kg</option>
                                    <option value="M">M</option>
                                    <option value="Ml">Ml</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1 d-flex justify-content-end">
                            <button type="button" class="btn btn-success" id="agregarTintaEspecial"><i
                                    class="fas fa-plus-square"></i></button>
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
                                    <input type="number" name="costoUnitarioTintaEspecial[]"
                                        class="form-control costoUnitarioTintaEspecial" placeholder="$" value="">
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="col-form-label col-md-3 col-sm-3 "><strong>Subtotal:</strong></label>
                                <div class="col-md-8 col-sm-8 ">
                                    <input type="number" name="subtotalTintaEspecial[]"
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