<form action="<?php echo getUrl("costos","solicitud","getInsert");?>" method="post" class="m-auto" id="tipoSmodal">
    <div class="modal-body">
    <label for="">Seleccione el tipo de solicitud</label>
                        <select class='display-5 form-control vSelect' name="TipoS" id="TipoSId">
                            <option value="0" hidden selected >Tipo solicitud</option>
                            <?php foreach ($tipoS as $ts){
                                // if ($ts['tiposolic_id']=1){
                                    echo "<option class='form-control'  value=".$ts['Tempr_id']." >".$ts['Tempr_descripcion']."</option>"; 

                                // }else{
                                   // echo "<option class='form-control'  value=".$ts['tiposolic_id'].">".$ts['tiposolic_desc']."</option>"; 
                                // }
                            }    
                         ?>
                        </select>

                        <div class="" id="contentAlertSolicitud">

    </div>
    <div class="modal-footer">
       <button type="submit" class="btn btn-success" >Aceptar</button>
       <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
    </div>
</form>