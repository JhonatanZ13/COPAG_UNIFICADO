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
}
?>
    <!-- inicio tabla  -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Pendientes<small>para aprobacion.</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><button class="btn btn-success btn-sm collapse-link">Solicitudes pendientes<i
                                class="fa fa-chevron-up pl-3"></i></button></li> 
  
                        <li><button class="btn btn-success btn-sm botonModal" value="Tipo de solicitud." data-url= "<?php echo getUrl("costos","solicitud","modalTipoS",false,"ajax")?>">Crear Solicitud<i
                                    class="fas fa-plus-square pl-3"></i></button></li>
                  
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                        <table id="datatable-responsive" class="table table-striped table-bordered" style="width:100%">
                 
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
            <abbr title="Aprobar solicitud">
           
            <button value="Aprobar Solicitud de Cotización" class="btn btn-primary btn btn-sm botonModal" data-url="'.getUrl("costos","solicitud","modalAprobar",array("Ped_id"=>$solid['Ped_id']),"ajax").'"><i class="fa fa-check"></i></button>
           
            </abbr>
             <abbr title="Mostrar solicitud">
              <a target="_black" href="'.getUrl("costos","pdf","postSolicitudPdf",array("Ped_id"=>$solid['Ped_id']),"ajax").'">
              <button class="btn btn-success btn btn-sm"><i class="fa fa-eye"></i></button>
              </a>
             </abbr>
             <abbr title="Editar solicitud">
              <a id="editS" href="'.getUrl("costos","solicitud","getUpdateSolicitud",array("Ped_id"=>$solid['Ped_id'])).'">
              <button  class="btn btn-success btn btn-sm" ><i class="fa fa-pencil"></i></button>
              </a>
             </abbr>
              <abbr title="Cancelar solicitud">
              
              <button  value="Cancelar Solicitud de Cotización" class="btn btn-danger btn btn-sm botonModal" data-url="'.getUrl("costos","solicitud","modalCancelar",array("Ped_id"=>$solid['Ped_id']),"ajax").'"><i class="fa fa-close"></i></button>
             
              </abbr>
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
            
               

            

                