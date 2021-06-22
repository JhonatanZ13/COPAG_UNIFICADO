<div class="x_title ">
    <h2>Editar solicitud de compra</h2>

    <div class="clearfix"></div>
</div>

<form action="<?php echo getUrl("costos","compras","postUpdate")?>" method="post">
    <div class="item form-group">
        <label class="col-form-label col-md-2 col-sm-2 label-align">
            <h6> fecha:</h6>
        </label>
        <div class="col-md-3 col-sm-6 ">
            <?php

foreach ($solicitud as $soli){


?>
            <input name="Soc_fecha" type="hidden" value="<?php echo $soli['Soc_id']; ?>">
            <input id="birthday" class="date-picker form-control" readonly="readonly" name="Soc_fecha"
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
            <h6> Centro:</h6> <span class="required"></span>
        </label>

        <div class="col-md-3 col-sm-6 ">
            <?php

                        foreach ($Centros as $cen){
                        ?>
            <input name="Cen_nombre" type="hidden" value="<?php echo $cen['Cen_id']; ?>">
            <input class="date-picker form-control" type="text" readonly="readonly" name="Cen_nombre"
                value="<?php echo $cen['Cen_nombre']; ?>" size="15" maxlength="30">

            <?php
                        }
                    ?>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-2 col-sm-2 label-align">
            <h6>Área:</h6> <span class="required"></span>
        </label>
        <div class="col-md-3 col-sm-7 ">
            <input name="Soc_area" type="hidden" value="<?php echo $soli['Soc_id']; ?>">
            <input class="date-picker form-control" type="text" readonly="readonly" name="Soc_area"
                value="<?php echo $soli['Soc_area']; ?>" size="15" maxlength="30">
        </div>
        <label class="col-form-label col-md-4 col-sm-2 label-align">
            <h6> Regional:</h6> <span class="required"></span>
        </label>
        <div class="col-md-3 col-sm-6 ">
            <?php

                        foreach ($Regionales as $regio){
                           ?>

            <input name="Reg_descripcion" type="hidden" value="<?php echo $regio['Reg_id']; ?>">
            <input class="date-picker form-control" type="text" readonly="readonly" name="Soc_descripcion"
                value="<?php echo $regio['Reg_descripcion']; ?>" size="15" maxlength="30">


            <?php
                        }
                    ?>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-2 col-sm-2 label-align">
            <h6>Coordinador de área:</h6> <span class="required"></span>
        </label>
        <div class="col-md-3 col-sm-7 ">
            <input name="Soc_nom_je" type="hidden" value="<?php echo $soli['Soc_id']; ?>">
            <input class="date-picker form-control" type="text" readonly="readonly" name="Soc_nom_je"
                value="<?php echo $soli['Soc_nom_je']; ?>">
        </div>
        <label class="col-form-label col-md-4 col-sm-2 label-align">
            <h6>No.Documento:</h6> <span class="required"></span>
        </label>
        <div class="col-md-2 col-sm-7 ">
            <input name="Soc_DNI_jefeOficina" type="hidden" value="<?php echo $soli['Soc_id']; ?>">
            <input class="date-picker form-control" type="number" readonly="readonly" name="Soc_DNI_jefeOficina"
                value="<?php echo $soli['Soc_DNI_jefeOficina']; ?>" size="15" maxlength="30">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-mb-3 col-sm-2 label-align">
            <h6>Nombre de servidor publico a quien se le asignara el bien:</h6> <span class="required"></span>
        </label>
        <div class="col-md-4 col-sm-7 ">
            <input name="Soc_servidorp" type="hidden" value="<?php echo $soli['Soc_id']; ?>">
            <input class="date-picker form-control" type="text" readonly="readonly" name="Soc_servidorp"
                value="<?php echo $soli['Soc_servidorp']; ?>" size="15" maxlength="30">
        </div>
        <label class="col-form-label col-md-3 col-sm-2 label-align">
            <h6>No.Documento:</h6> <span class="required"></span>
        </label>
        <div class="col-md-2 col-sm-5 ">
            <input name="Soc_DNI_servidorPublico" type="hidden" value="<?php echo $soli['Soc_id']; ?>">
            <input class="date-picker form-control" type="number" readonly="readonly" name="Soc_DNI_servidorPublico"
                type="number" value="<?php echo $soli['Soc_DNI_servidorPublico']; ?>" size="10" maxlength="20">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-mb-3 col-sm-2 label-align">
            <h6>Ficha de caracterización:</h6> <span class="required"></span>
        </label>
        <div class="col-md-3 col-sm-4 ">
            <input name="Soc_ficha" type="hidden" value="<?php  echo $soli['Soc_id']; ?>">
            <input class="date-picker form-control" type="number" readonly="readonly" name="Soc_ficha"
                value="<?php  echo $soli['Soc_ficha']; ?>" size="15" maxlength="30">
        </div>
    </div>
    <?php
 }

?>
    <br>

    <div class="container mt-5 mb-5">
        <div class="form-row ml-6 " name="com_NoItem" id="com_NoItem">
            <div class="form-group col-md-12 ml-5" id="contenedor">
                <div class=" col-md-12 row ml-5 ">
                    <div class="form-control col-3" style="background-color:#17A481; color:#fff;">Descripcion de
                        bien</div>
                    <div class="form-control col-2" style="background-color:#17A481; color:#fff;">U. Medida
                    </div>
                    <div class="form-control col-2" style="background-color:#17A481; color:#fff;">Cantidad</div>
                    <div class="form-control col-2" style="background-color:#17A481; color:#fff;">Observaciones
                    </div>

                    <div class="col-2" name="com_NoItem" id="com_Noitem"></div>
                </div>

                <?php  
            
                foreach ($compras as $comp){ 
                    
                    ?>

                <div class="form col-md-12 row ml-5" id="clon">
                    <?php

                    foreach ($productoBase as $pro){

                    ?>
                    <input class="form-control col-3" type="text" readonly="readonly" name="Pba_descripcion"
                        value="<?php echo $pro['Pba_descripcion']; ?>" size="15" maxlength="30">

                    <?php
                        }
                            ?>
                                            <?php

                        foreach ($Medidas as $med){

                        ?>
                    <input class="form-control col-2" type="text" readonly="readonly" name="Med_descripcion"
                        value="<?php echo $med['Med_descripcion']; ?>" size="15" maxlength="30">

                    <?php
                        }
                        ?>
                    <input type="text" readonly="readonly" value="<?php echo $comp['com_Cantidad']; ?>"
                        id="com_Cantidad" name="com_Cantidad[]" class="form-control col-2 " placeholder="">
                     <input type="text" readonly="readonly" value="<?php echo $comp['com_Observaciones']; ?>"
                        id="com_Observaciones" name="com_Observaciones[]" class="form-control col-2" rows="1" cols="50"
                        placeholder="Observacion...">
                   
                    <?php }  ?>

            </div>
        </div>
    </div>

    <div class="ln_solid"></div>
    <div class="col-md-6 col-sm-6 offset-md-5">
        <a href="<?php echo getUrl("costos","compras","consult");?>"><button type='button'
                class="btn btn-primary">Cancelar</button></a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>

</form>