  <div class="x_title">
    <h2>Gestionar Solicitudes</h2>

    <div class="clearfix"></div>
</div>
<div class="x_content">
<?php 
if (isset($_SESSION['error'])){
 echo "<div class='alert alert-danger'>";
  foreach ($_SESSION['error'] as $error){
    echo $error;
  }

 echo "</div>";

 unset($_SESSION['error']); 
}else if (isset($_SESSION['success'])){
    echo "<div class='alert  alert-primary'>";
    foreach ($_SESSION['success'] as $success){
      echo $success;
    }
  
   echo "</div>";
  
   unset($_SESSION['success']);
}
?>
    <!-- inicio tabla  -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Pendientes<small>para envio.</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><button class="btn btn-success btn-sm collapse-link">Solicitudes pendientes<i
                                class="fa fa-chevron-up pl-3"></i></button></li> 
                               <?php if($this->esDiferenteAprendiz()){?>
                         <a href="<?php echo getUrl("costos","solicitud","consultarSolicitudAprobacion");?>"><button class="btn btn-success btn-sm ">Administrar Solicitudes<i
                                    class="fas fa-plus-square pl-3 "></i></button></a>
                                    <?php }?>
                        <li><button class="btn btn-success btn-sm botonModal2" title="Tipo de solicitud." data-url= "<?php echo getUrl("costos","solicitud","modalTipoS",false,"ajax")?>">Crear Solicitud<i
                                    class="fas fa-plus-square pl-3"></i></button></li>
                        
                  
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                        <table id="table" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed" style="width:100%">
                 
                 <thead style="background-color:#17A481; color:#fff;">
                     <tr>
                         <th>Codigo</th>
                         <th>cliente</th>

                         <th>Tipo de solicitud</th>
                         <!-- <th>Asunto</th> -->
                        
                         <th>Fecha de solicitud</th>
                         <th>acciones</th>
                     </tr>
                 </thead>
                 <tbody>
                 <?php  setlocale(LC_ALL, "spanish");
            foreach($solicitudP as $solid){
            echo "<tr>";
            echo "<td>".$solid['Ped_id']."</td>";
            echo "<td>".$solid['Emp_razonSocial']."</td>";
            echo "<td>".$solid['Tempr_descripcion']."</td>";

           // echo "<td>".$solid['Ped_asunto']."</td>";
            echo "<td>".ucwords(strftime("%d de %B de %Y",strtotime($solid['Ped_fecha'])))."</td>";
           
            echo '<td>
            
           
            <button  id="modalAprobarEnvio" data-id="'.$solid['Ped_id'].'" 
            class="btn btn-primary btn btn-sm " data-toggle="tooltip" data-placement="bottom" title="Aprobar envio" 
            data-url="'.getUrl("costos","solicitud","modalAprobarEnvio",array("Ped_id"=>$solid['Ped_id']),"ajax").'"><i class="fa fa-check"></i></button>
           
           
             
            <a href="'.getUrl("costos","solicitud","getconsultSolicitud",array('Ped_id'=>$solid['Ped_id'])).'">
                                            <button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ver solicitud" ><i class="fa fa-eye"></i></button>
                                        </a>
            
              <a id="editS" href="'.getUrl("costos","solicitud","getUpdateSolicitud",array("Ped_id"=>$solid['Ped_id'])).'">
              <button  class="btn btn-success btn btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-pencil"></i></button>
              </a>
         
             
              
              <button id="modalcancelarS" data-id="'.$solid['Ped_id'].'" class="btn btn-danger btn btn-sm " data-toggle="tooltip" data-placement="bottom" title="Cancelar solicitud" data-url="'.getUrl("costos","solicitud","modalCancelarPost",array("Ped_id"=>$solid['Ped_id']),"ajax").'"><i class="fa fa-trash-o"></i></button>
             
             
              </td>';  
             
            echo "</tr>"; } ?>                        
                  
                 </tbody>
             </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
               

            

                