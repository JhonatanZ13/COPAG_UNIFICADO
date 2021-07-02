<div class="x_title">
    <h2>Gestionar Solicitud</h2>

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
                <h2>Pendientes<small>para aprobacion.</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><button class="btn btn-success btn-sm collapse-link">Solicitudes pendientes<i
                                class="fa fa-chevron-up pl-3"></i></button></li>

                    <a href="<?php echo getUrl("costos","solicitud","consult");?>">
                        <li><button class="btn btn-success btn-sm">Volver<i
                                    class="fas fa-plus-square pl-3"></i></button></li>
                    </a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="table"
                                class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                width="100%">
                                <thead style="background-color:#17A481; color:#fff;">
                                    <tr>
                                        <th cope="col">Codigo</th>
                                        <th>Estado</th>
                                        <th>Nombre</th>
                                        <th>Centro/empresa</th>
                                        <th>Fecha de solicitud</th>
                                        <!-- <th>Costo</th> -->
                                        <th>acciones</th>
                                    </tr>
                                <tbody>

                                    <?php
                                foreach ($consultPedido as $pedi) {
                                    echo "<tr>";
                                    echo "<td>".$pedi['Ped_id']."</td>";
                                    echo "<td>".$pedi['Est_nombre']."</td>";
                                    echo "<td>".$pedi['Emp_nombre']."</td>";
                                    echo "<td>".$pedi['Emp_razonSocial']."</td>";
                                    echo "<td>".$pedi['Ped_fecha']."</td>";
                                    
                                    echo "<td>
                                    
                                        <button titlemodal='Aprobar Solicitud'
                                            class='btn btn-primary btn-sm botonModalSolicitud' data-toggle='tooltip' data-placement='bottom' title='Aprobar Solicitud' data-url='".getUrl("costos","solicitud","aprobarSolicitudModal",array('Ped_id'=>$pedi['Ped_id']),"ajax")."'><i
                                                class='fa fa-check'></i></button>
                                    
                                                <a target='_blank' href='".$pedi['Ped_ruta_pdf']."'>
                                                <button class='btn btn-sm btn-danger' data-toggle='tooltip' data-placement='bottom' title='Ver PDF'><i class='fa fa-file-pdf-o'></i>
                                            </button></a> 

                                        <a href='".getUrl("costos","solicitud","aprobarSolicitudConsult",array('Ped_id'=>$pedi['Ped_id']))."'>
                                            <button class='btn btn-success btn-sm' data-toggle='tooltip' data-placement='bottom' title='Ver solicitud' ><i class='fa fa-eye'></i></button>
                                        </a>


                                        
                                        <button titlemodal='Rechazar Solicitud' title='Rechazar Solicitud' data-toggle='tooltip' data-placement='bottom'
                                        class='btn btn-danger btn-sm botonModalSolicitud' data-url='".getUrl("costos","solicitud","modalCancelar",array('Ped_id'=>$pedi['Ped_id']),"ajax")."'><i
                                            class='fa fa-close'></i></button>
                                        

                                    </td>";

                                    echo "</tr>";
                                }
                                
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<!-- fin segunda tabla -->



</div>