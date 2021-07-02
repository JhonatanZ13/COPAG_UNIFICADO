<div class="x_title ">
    <h2>Editar Solicitud Cotizacion de Productos N° <?php echo $Ped_id;?> </h2>

    <div class="clearfix"></div>
</div>
<form action="<?php echo getUrl("costos","solicitud","postUpdate");?>" method="post" class="" id="solicitudC">
<div class="x_panel mt-1 mb-3 mr-4">

<div class="x_title">

    <h2>Dirigido a:</h2>

    <div class="clearfix"></div>
</div>


<div class="col-sm-12">
    <div class="card-box table-responsive">
        <div class="x_content row">
            <div class="form-group col-9"></div>
            <div class="form-group col-3">

            <label for="">Fecha de solicitud </label>
            <?php   foreach ($pedido as  $ped) {?>
                <input type="hidden" name="tipoS" value="<?php echo $ped['Tempr_id']; $TipoS=$ped['Tempr_id'];?>">
            <input type="hidden" name="Ped_id" value="<?php echo $ped['Ped_id']?>">
            <input type="date" name="ped_fecha" class="form-control" value="<?php echo $ped['Ped_fecha']?>">

            </div>
        <div class="form-group col-6">
        <label for="">Destinatario</label>
        <select class='display-5 form-control' name="destinatario" id="destinaId">
                     <?php  foreach ($usuario as $usu){
                                if($usu['Usu_id']==$ped['destinatario']){
                                    echo"<option value='".$usu['Usu_id']."'selected>".$usu['Usu_primerNombre'].'&nbsp;'.$usu['Usu_segundoNombre'].'&nbsp;'.$usu['Usu_primerApellido'].'&nbsp;'.$usu['Usu_primerApellido']."</option>";
                                }else{
                                echo "<option value='".$usu['Usu_id']."'>".$usu['Usu_primerNombre'].'&nbsp;'.$usu['Usu_segundoNombre'].'&nbsp;'.$usu['Usu_primerApellido'].'&nbsp;'.$usu['Usu_primerApellido']."</option>";}
                            
                            }
                            ?>

                
            </select>
            </div>           

        </div>
    </div>

</div>
</div>
    <div class="x_content">
        <!-- inicio Datos personales  -->
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Datos del Cliente</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content row">

                 
                <?php if ($TipoS==3 || $TipoS==5){ ?>
                <div class="form-group col-6">
                        <label for="">Cliente</label>

                        <select class='display-5 form-control' name="cliente" id="empreS">
                            <?php  foreach ($empresa as $emp){
                                if($emp['Emp_id']==$ped['Emp_id']){
                                    echo"<option value='".$emp['Emp_id']."'selected>".$emp['Emp_razonSocial']."</option>";
                                }else{
                                echo "<option value='".$emp['Emp_id']."'>".$emp['Emp_razonSocial']."</option>";}
                            
                            }
                            ?>
                        </select>
                    </div>
                  
                    <?php }?>
                   
                    <?php 
                     if ($TipoS==3){ ?>
                    <div class="form-group col-6">
                        <label for="">Seleccione</label>
                        <select class='display-5 form-control' name="centro" id="centroS">

                            <?php  foreach ($centro as $cen){
                                if($cen['Cen_id']==$ped['Cen_id']){
                                    echo"<option value='".$cen['Cen_id']."'selected>".$cen['Cen_nombre']."</option>";
                                }else{
                                echo "<option value='".$cen['Cen_id']."'>".$cen['Cen_nombre']."</option>";}          
                            }
                            ?>

                        </select>
                    </div>
                    <?php   } ?>
                   <?php if ($TipoS==3 || $TipoS==5){ ?>

                    <div class="form-group col-6">
                        <label for="">Seleccione</label>


                        <select class='display-5 form-control' name="dep" id="depId" data-url="<?=getUrl("costos","solicitud","selectDinamico",false,"ajax")?>">
                            <?php  foreach ($departamento as $depto){
                                if($depto['Dep_id']==$ped['Dep_id']){
                                    echo"<option value='".$depto['Dep_id']."'selected>".utf8_encode($depto['Dep_nombre'])."</option>";
                                }else{
                                echo "<option value='".$depto['Dep_id']."'>".$depto['Dep_nombre']."</option>";}
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-6">
                        <label for="">Seleccione</label>

                        <select class='display-5 form-control' name="municipio" id="munId" >

                            <?php  foreach ($municipio as $mun){
                                if($mun['Mun_id']==$ped['Mun_id']){
                                    echo "<option id='opte' value='".$mun['Mun_id']."'selected>".$mun['Mun_nombre']."</option>";
                                }
                              else{
                               echo "<option value='".$mun['Mun_id']."'>".$mun['Mun_nombre']."</option>";
                            }
                            
                            }
                            ?>

                        </select>
                    </div>
                   
                    <?php   } ?>
                    <?php }?>
                    <div class="form-group col-6">
                        <label for="">objeto</label>
                        <input type="text" name="objeto" class="form-control validar" id="objetoS"
                            placeholder="Escriba tipo de producto que desea adquirir..." 
                            value="<?php echo $ped['Ped_objetivo']?>">

                    </div>
                 
                    <!-- tabla productos -->
                    <?php include_once '../view/costos/solicitud/tablaProductos.php';?>



                    <div class="form-group col-6 ">
                        <label for="">Plazo de ejecucion</label><br>
                        <label class="ml-2">Dias</label>
                        <input type="number" name="pjd" class="form-control validar" placeholder="Dias..." id="pjdId" min="1" max="30" maxlength="2"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                            value="<?php echo $ped['Ped_plazoEjecucionDias']?>" >
                    </div>


                    <div class="form-group col-6 mt-n3 "><br>
                        <label for="">Lugar de ejecucion</label><br>
                        <label class="ml-2">Ciudad</label>
                        <select class='form-control' name="ljciu" id="ljcId">

                            <?php  foreach ($municipio as $mun){
                                
                                if($mun['Mun_id']==$ped['Ped_lugarEjecucionCiu']){
                                    echo"<option value='".$mun['Mun_id']."'selected>".$mun['Mun_nombre']."</option>";
                                }else{
                                echo "<option value='".$mun['Mun_id']."'>".$mun['Mun_nombre']."</option>";}
                            
                            }
                            ?>
                        </select>
                        <!-- <input type="text" name="lj" class="form-control" id="validationCustom02"
                            placeholder="Breve descripción del lugar de entrega del producto..."  required> -->
                    </div>



                    <div class="form-group col-6 ">
                        <label for="">.</label><br>
                        <label class="ml-2">Meses</label>
                        <input type="number" name="pjm" class="form-control validar" placeholder="Meses..." min="0" max="12" maxlength="2"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                            value="<?php echo $ped['Ped_plazoEjecucionMeses']?>" id="pjmId">
                    </div>




                    <div class="form-group col-6 mt-n3 "><br>
                        <label for="">.</label><br>
                        <label class="ml-2">Centro</label>
                        <select class=' form-control' name="ljcen" id="ljcenId">

                            <?php  foreach ($centro as $cen){
                                if($cen['Cen_id']==$ped['Ped_lugarEjecucionCen']){
                                    echo"<option value='".$cen['Cen_id']."'selected>".$cen['Cen_nombre']."</option>";
                                }else{
                                echo "<option value='".$cen['Cen_id']."'>".$cen['Cen_nombre']."</option>";}
                            
                            }
                            ?>
                        </select>
                        <!-- <input type="text" name="lj" class="form-control" id="validationCustom02"
                            placeholder="Breve descripción del lugar de entrega del producto..."  required> -->
                    </div>

                    <div class="col-12" id="contentAlertSolicitud">
                  
                  </div>


                    <div class="col-12 d-flex justify-content-end mb-5">
                        <a href="<?php echo getUrl("costos","solicitud","consult");?>"><button type='button'
                                class="btn btn-danger mt-5">Cancelar</button></a>
                        <input type="submit" name="registrarse" value="Guardar cambios" class="btn btn-primary  mt-5">

                    </div>
                </div>
            </div>
        </div>
        <!-- fin datos personales  -->
    </div>
</form>