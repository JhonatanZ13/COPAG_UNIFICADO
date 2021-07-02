<div class="x_title">
    <h2>Gestionar Cotizaciones</h2>

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
                    <li><button class="btn btn-success btn-sm collapse-link">Cotizaciones pendientes<i
                                class="fa fa-chevron-up pl-3"></i></button></li>

                    <a href="<?php echo getUrl("costos","cotizacion","consult");?>">
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
                                    
                                        <button title='Aprobar Cotización' value='".$pedi['Ped_id']."'
                                            class='btn btn-primary btn-sm botonModal2' data-url='".getUrl("costos","cotizacion","aprobarCotizacionModal","","ajax")."'><i
                                                class='fa fa-check'></i></button>
                                    
                                        <a href='".getUrl("costos","cotizacion","consultAprobacionOrden",array('Ped_id'=>$pedi['Ped_id']))."'>
                                            <button class='btn btn-success btn-sm'><i class='fa fa-eye'></i></button>
                                        </a>

                                       
                                        
                                        <button title='Rechazar Cotización' value='".$pedi['Ped_id']."'
                                        class='btn btn-danger btn-sm botonModal2' data-url='".getUrl("costos","cotizacion","rechazarModal","","ajax")."'><i
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