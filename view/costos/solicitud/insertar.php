<div class="x_title ">
    <h2>Solicitud Cotizacion de Productos</h2>
    <div class="clearfix"></div>
</div>
<?php 
if (isset($_SESSION['error'])){
 echo "<div class='alert alert-danger'>";
  foreach ($_SESSION['error'] as $error){
    echo $error;
  }

 echo "</div>";

 unset($_SESSION['error']); 
}
?>
<form id="solicitudC" action="<?php echo getUrl("costos","solicitud","postInsert");?>" method="post" class="">
    <div class="x_panel mt-1 mb-3 mr-4">

        <div class="x_title">

            <h2>Dirigido a:</h2>

            <div class="clearfix"></div>
        </div>


        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <div class="x_content row">
                                     
                    <div class="form-group col-6">
                        <label for="">Destinatario</label>
                        <select class='display-5 form-control vSelect' name="destinatario" id="destinaId">
                            <option value="0" hidden selected >Destinatario (aprobador)</option>
                            <?php foreach ($usuario as $usu){
                         echo "<option class='form-control'  value=".$usu['Usu_id'].">".$usu['Usu_primerNombre'].'&nbsp;'.$usu['Usu_segundoNombre'].'&nbsp;'.$usu['Usu_primerApellido'].'&nbsp;'.$usu['Usu_primerApellido']."</option>"; } ?>
                        </select>
                    </div>  
                     <div class="form-group col-3"></div> 
                     <div class="form-group col-3">
                        <label for="">Fecha de solicitud </label>

                        <input type="date" name="ped_fecha" class="form-control" value="<?php  echo date("o-m-d");?>">

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
             <input type="hidden" name="tipoS" value="<?php echo $TipoS;?>">
                <?php if ($TipoS==3 || $TipoS==5){ ?>
                    <div class="form-group col-4">

                        <label for="">Cliente</label>             
                        <select class='display-5 form-control vSelect' name="cliente" id="empreS">
                            <option  value="0" hidden selected>Cliente</option>
                            <?php foreach ($empresa as $emp){
                        echo "<option class='form-control'  value=".$emp['Emp_id'].">".$emp['Emp_razonSocial']."</option>";
                        } ?>
                        </select>

                    </div>
                    
                      <div class="form-group col-2 ">
                      <label for="" class="mt-1">Crear cliente</label><br>
                        <a href="<?php echo getUrl("PanelDeControl", "Company", "getInsert");?>">
                    <button class="btn btn-success btn-sm" type="button"><i
                                    class="fa fa-plus-square "></i></button></a>
                   
                    </div>
                    <?php }?>
                    <?php 
                     if ($TipoS==3){ ?>

                   
                    <div class="form-group col-6">
                        <label for="">Seleccione</label>


                        <select class='display-5 form-control vSelect' name="centro" id="centroS">
                            <option  value="0" hidden selected>Centro de formación</option>
                            <?php foreach ($centro as $cen){
    echo "<option class='form-control'  value=".$cen['Cen_id'].">".$cen['Cen_nombre']."</option>";
} ?>
                        </select>
                    </div>
                   <?php   } ?>
                   <?php if ($TipoS==3 || $TipoS==5){ ?>
                    <div class="form-group col-6">
                        <label for="">Departamento</label>


                        <select class='display-5 form-control vSelect' name="dep" id="depId" data-url="<?=getUrl("costos","solicitud","selectDinamico",false,"ajax")?>">
                            <option  value="0" hidden selected>Departamento </option>
                            <?php foreach ($departamento as $dep){
    echo "<option class='form-control'  value=".$dep['Dep_id'].">".$dep['Dep_nombre']."</option>";
} ?>
                        </select>
                    </div>
                    <div class="form-group col-6">                                                   
                        <label for="">Municipio</label>
                        <select class='display-5 form-control vSelect' name="municipio" id="munId" disabled>                       
                        </select>                        
                    </div>
                   
                    <?php   } ?>
                    <div class="form-group col-6">
                        <label for="">objeto</label>
                        <input type="text" id="objetoS" name="objeto" class="form-control validar" 
                            placeholder="Escriba tipo de producto que desea adquirir..." >

                    </div>
                    <!-- tabla productos -->


                    <?php include_once '../view/costos/solicitud/tablaProductos.php';?>

                    <div class="form-group col-6 ">
                        <label for="">Plazo de ejecucion</label><br>
                        <label class="ml-2">Dias</label>
                        <input type="number" id="pjdId" name="pjd" class="form-control validar" placeholder="Dias..." min="1" max="30" maxlength="2"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
                    </div>


                    <div class="form-group col-6 mt-n3 "><br>
                        <label for="">Lugar de ejecucion</label><br>
                        <label class="ml-2">Ciudad</label>
                        <select class=' form-control vSelect' name="ljciu" id="ljcId">
                            <option value="0" hidden selected>Ciudad</option>
                            <?php foreach ($municipio as $mun){
                     echo "<option class='form-control'  value=".$mun['Mun_id'].">".$mun['Mun_nombre']."</option>";} ?>
                        </select>
                        <!-- <input type="text" name="lj" class="form-control" id="validationCustom02"
                            placeholder="Breve descripción del lugar de entrega del producto..."  required> -->
                    </div>



                    <div class="form-group col-6 ">
                        <label for="">.</label><br>
                        <label class="ml-2">Meses</label>
                        <input type="number" id="pjmId" name="pjm" class="form-control validar " placeholder="Meses..." min="0" max="12" maxlength="2"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>




                    <div class="form-group col-6 mt-n3 "><br>
                        <label for="">.</label><br>
                        <label class="ml-2">Centro</label>
                        <select class=' form-control vSelect' name="ljcen" id="ljcenId">
                            <option value="0" hidden selected>Centro</option>
                            <?php foreach ($centro as $cen){

                     echo "<option class='form-control mt-1'  value=".$cen['Cen_id'].">".$cen['Cen_nombre']."</option></abbr>";} ?>
                        </select>
                        <!-- <input type="text" name="lj" class="form-control" id="validationCustom02"
                            placeholder="Breve descripción del lugar de entrega del producto..."  required> -->
                    </div>

                    <div class="col-12" id="contentAlertSolicitud">
                  
                  </div>
                </div>
         
                <div class="col-12 d-flex justify-content-end mb-5">
                <input type="submit" id="sibmSolicitud" name="registrarse" value="Registrar"
                        class="btn btn-success  mt-5">
                    <a href="<?php echo getUrl("costos","solicitud","consult");?>"><button type='button'
                            class="btn btn-danger mt-5">Cancelar</button></a>
                  

                </div>

            </div>

        </div>
        <!-- fin datos personales  -->
    </div>



</form>