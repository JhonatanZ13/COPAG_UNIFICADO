<form action="<?php echo getUrl("costos","compras","postInsert");?>" enctype="multipart/form-data" method="post">
<?php 
        foreach ($compras as $comp){

        
?>

<div class="item form-group">
            <label class="col-form-label col-md-2 col-sm-2 label-align"><h6> Versión:</h6> <span class="required"></span>
            </label>
            <div class="col-md-3 col-sm-7 ">
             <input class="date-picker form-control" name="Soc_version"  type="hidden" size="15" maxlength="30" value="<?php $com['Soc_version']; ?>">
    
    </div>
            <label class="col-form-label col-md-4 col-sm-2 label-align"><h6> fecha:</h6> 
            </label>
            <div class="col-md-3 col-sm-6 ">
                <input id="birthday" class="date-picker form-control" name="Soc_fecha" placeholder="dd-mm-aaa" type="hidden"  value="<?php $com['Soc_fecha']; ?>" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                <script>
                    function timeFunctionLong(input) {
                        setTimeout(function() {
                            input.type = 'text';
                        }, 60000);
                    }
                </script>
            </div>
        </div>
    <div class="item form-group">
            <label class="col-form-label col-md-2 col-sm-2 label-align"><h6>Área:</h6> <span class="required"></span>
            </label>
            <div class="col-md-3 col-sm-7 ">
             <input class="date-picker form-control" name="Soc_area" type="hidden"  value="<?php $com['Soc_area']; ?>" size="15" maxlength="30">
            </div>
             <label class="col-form-label col-md-4 col-sm-2 label-align"><h6> Regional:</h6> <span class="required"></span>
            </label>
            <div class="col-md-3 col-sm-6 ">
            <select name="Reg_id" id="Reg_id" class="form-control" type="hidden"  value="<?php $com['Reg_id']; ?>">
                    <option value="">Seleccione...</option>
                    <?php

                        foreach ($Regionales as $regio){
                            echo "<option value='".$regio['Reg_id']."'>".$regio['Reg_descripcion']."</option>";
                        }
                    ?>
            </select>
            </div>
    </div>
    <div class="item form-group">
            <label class="col-form-label col-md-2 col-sm-2 label-align"><h6>Coordinador de área:</h6> <span class="required"></span>
            </label>
            <div class="col-md-3 col-sm-7 ">
             <input class="date-picker form-control" name="Soc_nom_je" type="hidden"  value="<?php $com['Soc_nom_je']; ?>" size="15" maxlength="30">
            </div>
            <label class="col-form-label col-md-4 col-sm-2 label-align"><h6>No.Documento:</h6> <span class="required"></span>
            </label>
            <div class="col-md-2 col-sm-7 ">
             <input class="date-picker form-control" name="Soc_DNI_jefeOficina" type="hidden"  value="<?php $com['Soc_DNI_jefeOficina']; ?>" size="15" maxlength="30">
            </div>
    </div>
    <div class="item form-group">
            <label class="col-form-label col-mb-3 col-sm-2 label-align"><h6>Nombre de servidor publico a quien se le asignara el bien:</h6> <span class="required"></span>
            </label>
            <div class="col-md-4 col-sm-7 ">
             <input class="date-picker form-control" name="Soc_servidorp"   type="hidden"  value="<?php $com['Soc_servidorp']; ?>" size="15" maxlength="30">
            </div>
            <label class="col-form-label col-md-3 col-sm-2 label-align"><h6>No.Documento:</h6> <span class="required"></span>
            </label>
            <div class="col-md-2 col-sm-5 ">
             <input class="date-picker form-control" name="Soc_DNI_servidorPublico" type="hidden"  value="<?php $com['Soc_DNI_servidorPublico']; ?>" size="10" maxlength="20">
            </div>
    </div>
    <div class="item form-group">
    <label class="col-form-label col-mb-3 col-sm-2 label-align"><h6>Ficha de caracterización:</h6> <span class="required"></span>
            </label>
            <div class="col-md-3 col-sm-4 ">
             <input class="date-picker form-control" name="Soc_ficha"  type="hidden"  value="<?php $com['Soc_ficha']; ?>" size="15" maxlength="30">
            </div>
    </div>
    <br>
    <div class="container mt-5 mb-5">
    <div class="form-row ml-6 ">
        <div class="form-group col-md-10 ml-5" id="contenedor">
            <div class=" col-12 row ml-5 ">
                
               
                <div class="form-control col-2" style="background-color:#17A481; color:#fff;">Codigo Sena</div>
                <div class="form-control col-3" style="background-color:#17A481; color:#fff;">Descripcion de bien</div>
                <div class="form-control col-2" style="background-color:#17A481; color:#fff;">U. Medida</div>
                <div class="form-control col-2" style="background-color:#17A481; color:#fff;">Cantidad</div>
                <div class="form-control col-2" style="background-color:#17A481; color:#fff;">Observaciones</div>
               
                
                <div class="col-2"></div>
            </div>
            <div class=" form col-12 row ml-5" id="clon">  
                 <input type="hidden"  value="<?php $com['com_CodigoSena']; ?>"  id="com_CodigoSena" name="com_CodigoSena[]" class="form-control col-2 validar producto">
                <textarea type="hidden"  value="<?php $com['com_Descripcionb']; ?>" class="form-control col-3" id="com_Descripcionb" name="com_Descripcionb[]" rows="1" cols="50"
                    placeholder="Descripcion del bien.."></textarea>
                    <input type="hidden"  value="<?php $com['com_UMedida']; ?>" id="com_UMedida" name="com_UMedida[]" class="form-control col-2 " placeholder="">
                    <input type="hidden"  value="<?php $com['com_Cantidad']; ?>" id="com_Cantidad" name="com_Cantidad[]" class="form-control col-2 " placeholder="">
                    <textarea type="hidden"  value="<?php $com['com_Observaciones']; ?>" id="com_Observaciones" name="com_Observaciones[]" class="form-control col-2"  rows="1" cols="50"
                    placeholder="Observacion..."></textarea>
                </div>
            
            </div>
        </div>
    </div>
    
    <br>
    <div class="item form-group">
    <label class="col-form-label col-md-1 col-sm-2 label-align"><h6>Nombre:</h6> <span class="required"></span>
            </label>
            <div class="col-md-3 col-sm-4 ">
             <input class="date-picker form-control" name="Soc_nombre" type="hidden"  value="<?php $com['Soc_nombre']; ?>" size="15" maxlength="30">
            </div>
    </div>
    <div class="item form-group">
    <label class="col-form-label col-md-1 col-sm-2 label-align"><h6>Cargo:</h6> <span class="required"></span>
            </label>
            <div class="col-md-3 col-sm-4 ">
             <input class="date-picker form-control" name="Soc_cargo" type="hidden"  value="<?php $com['']; ?>" size="15" maxlength="30">
            </div>
    </div>


    <div class="ln_solid"></div>
    <div class="col-md-6 col-sm-6 offset-md-5">
    <button type="submit" class="btn btn-primary ">Cancelar</button>
    <button type="submit" class="btn btn-success">Guardar</button>
    </div>
    <?php

                    }

    ?>
</form>
</div>
</div>
</div>
