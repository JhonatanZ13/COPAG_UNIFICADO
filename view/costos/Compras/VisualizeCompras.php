<div class="x_title ">
    <h2>Visualizar Solicitud Compras N° <?php echo $Soc_id;?> </h2>
    <div class="clearfix"></div>
</div>


<form>

    <div class="item form-group">
        <label class="col-form-label col-md-2 col-sm-2 label-align">
            <h6> fecha:</h6>
        </label>
        <div class="col-md-3 col-sm-6 ">
            <?php

foreach ($solicitud as $soli){


?>
            <input readonly="readonly" id="birthday" class="date-picker form-control" name="Soc_fecha"
                value="<?php echo $soli['Soc_fecha']; ?>" placeholder="dd-mm-aaa" type="text" required="required"
                type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'"
                onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
            <script>
            function timeFunctionLong(input) {
                setTimeout(function() {
                    input.type = 'text';
                }, 60000);
            }
            </script>
        </div>
        <label class="col-form-label col-md-4 col-sm-2 label-align">
            <h6> Regional:</h6> <span class="required"></span>
        </label>

        <div class="col-md-3 col-sm-6 ">
            <select  disabled   name="Reg_id" class="form-control"  id="selectRegio" data-url="<?php echo 
                        getUrl("Costos","Compras","selectCompras",false,"ajax")?>">
                <option value="">Seleccione...</option>
                <?php

                        foreach ($Regionales as $regio){
                            if($regio['Reg_id']==$soli['Reg_id']){
                               $select="selected";
                            }else{
                                $select="";
                            }
                            echo "<option value='".$regio['Reg_id']."'$select>".$regio['Reg_descripcion']."</option>";
                        }
                    ?>
            </select>

        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-2 col-sm-2 label-align">
            <h6>Área:</h6> <span class="required"></span>
        </label>
        <div class="col-md-3 col-sm-7 ">
            <input readonly="readonly" class="date-picker form-control" type="text" name="Soc_area"
                value="<?php echo $soli['Soc_area']; ?>" size="15" maxlength="30">
        </div>
        <label class="col-form-label col-md-4 col-sm-2 label-align">
            <h6> Centro:</h6> <span class="required"></span>
        </label>

        <div class="col-md-3 col-sm-6 ">
        <select disabled name="Cen_id" id="selectCentro"  class="form-control">
                <?php

                            foreach ($Centros as $cen){
                                if($cen['Cen_id']==$comp['Cen_id']){
                                $select="selected";
                                }else{
                                    $select="";
                                }
                                echo "<option value='".$cen['Cen_id']."'$select>".$cen['Cen_nombre']."</option>";
                            }
                        ?>
            </select>
        </div>

    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-2 col-sm-2 label-align">
            <h6>Coordinador de área:</h6> <span class="required"></span>
        </label>
        <div class="col-md-3 col-sm-7 ">
            <input readonly="readonly" class="date-picker form-control" type="text" name="Soc_nom_je"
                value="<?php echo $soli['Soc_nom_je']; ?>">
        </div>
        <label class="col-form-label col-md-4 col-sm-2 label-align">
            <h6>No.Documento:</h6> <span class="required"></span>
        </label>
        <div class="col-md-3 col-sm-7 ">
            <input readonly="readonly" class="date-picker form-control" type="number" name="Soc_DNI_jefeOficina"
                value="<?php echo $soli['Soc_DNI_jefeOficina']; ?>" size="15" maxlength="30">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-mb-3 col-sm-2 label-align">
            <h6>Nombre de servidor publico:</h6> <span class="required"></span>
        </label>
        <div class="col-md-3 col-sm-7 ">
            <input readonly="readonly" class="date-picker form-control" type="text" name="Soc_servidorp"
                value="<?php echo $soli['Soc_servidorp']; ?>" size="15" maxlength="30">
        </div>
        <label class="col-form-label col-md-4 col-sm-2 label-align">
            <h6>No.Documento:</h6> <span class="required"></span>
        </label>
        <div class="col-md-3 col-sm-7 ">
            <input readonly="readonly" class="date-picker form-control" type="number" name="Soc_DNI_servidorPublico"
                type="number" value="<?php echo $soli['Soc_DNI_servidorPublico']; ?>" size="10" maxlength="20">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-mb-3 col-sm-2 label-align">
            <h6>Ficha de caracterización:</h6> <span class="required"></span>
        </label>
        <div class="col-md-3 col-sm-4 ">
            <input readonly="readonly" class="date-picker form-control" type="number" name="Soc_ficha"
                value="<?php  echo $soli['Soc_ficha']; ?>" size="15" maxlength="30">
        </div>
    </div>

    <?php
            

}

?>


    <br>

    <fieldset disabled>
        <div class="container mt-5 mb-5">
            <div class="form-row ml-6 " name="com_NoItem" id="com_NoItem">
                <div class="form-group col-md-12 ml-5" id="contenedor">
                    <div class=" col-md-12 row ml-5 ">

                        <div class="form-control col-3" style="background-color:#17A481; color:#fff;"><label
                                for="disabledSelect">Descripcion de
                                bien</label></div>
                        <div class="form-control col-2" style="background-color:#17A481; color:#fff;">U. Medida
                        </div>
                        <div class="form-control col-2" style="background-color:#17A481; color:#fff;">Cantidad</div>
                        <div class="form-control col-2" style="background-color:#17A481; color:#fff;">Observaciones
                        </div>

                        <div class="col-2" name="com_NoItem" id="com_Noitem"></div>
                    </div>

                    <?php  
                   $contador=1;
                foreach ($compras as $comp){ 
                    
                    ?>

                    <div class="form col-md-12 row ml-5" id="clon">
                        <select id="disabledSelect" name="Arti_id[]" id="Arti_id" class="form-control col-3">
                            <option value="">Seleccione...</option>
                            <?php

                    foreach ($Articulos as $arti){
                        if($arti['Arti_id']==$comp['Arti_id']){
                        $select="selected";
                        }else{
                            $select="";
                        }
                        echo "<option value='".$arti['Arti_id']."'$select>".$arti['Arti_nombre']."</option>";
                    }
                        ?>
                        </select>
                        <select readonly="readonly" name="Med_id[]" id="Med_id" class="form-control col-2">
                            <option value="">Seleccione...</option>
                            <?php

                    foreach ($Medidas as $med){
                        if($med['Med_id']==$comp['Med_id']){
                        $select="selected";
                        }else{
                            $select="";
                        }
                        echo "<option   value='".$med['Med_id']."'$select>".$med['Med_descripcion']."</option>";
                    }
                        ?>
                        </select>

                        <input type="text" readonly="readonly" value="<?php echo $comp['com_Cantidad']; ?>"
                            id="com_Cantidad" name="com_Cantidad[]" class="form-control col-2 " placeholder="">
                        <input type="text" readonly="readonly" value="<?php echo $comp['com_Observaciones']; ?>"
                            id="com_Observaciones" name="com_Observaciones[]"
                            class="form-control col-2 validar producto" rows="1" cols="50" placeholder="Observacion...">

                    </div>

                    <?php   }  ?>
                </div>
            </div>
        </div>
    </fieldset>



    <div class="ln_solid"></div>
    <div class="col-md-6 col-sm-6 offset-md-5">
        <a href="<?php echo getUrl("costos","compras","consult");?>"><button type='button'
                class="btn btn-primary">Cancelar</button></a>
    </div>

</form>