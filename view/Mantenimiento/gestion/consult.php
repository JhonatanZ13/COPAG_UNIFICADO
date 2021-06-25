<div class="x_title">
    <h2>Administracion de Maquinas</h2>
    <div class="clearfix"></div>
</div>
<div class="x_title">
    <small class="xc_color">Aqui podras consultar y Editar la Administracion de las maquinas </small>
</div>
<div class="col-md-12 col-sm-11 ">
    <div class="x_panel">
        
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <table id="datatable-responsive" class="table table-striped table-bordered" style="width:100%">
                            <thead style="background-color: #17A481;; color:#fff;">
                                <tr>
                                    <th>Id</th>
                                    <th>Maquina</th>
                                    <th>Ficha Tecnica</th>
                                    <th>Manual Maquina</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                          foreach ($maquinas as $maq){
                           echo "<tr>";
                           echo "<div readonly id='LecturaEstado'>";
                           echo "<td>".$maq['maq_id']."</td>";
                           echo "<td>".$maq['maq_nombre']."</td>";
                           echo "<td>"."</td>";
                           echo "<td>"."</td>";
                           echo "<td>".$maq['est_nombre'];
                           echo "</td>";
                           echo "<td>";
                           echo "<button title='Editar' value='Editar' id='botonModal' data-url='" . getUrl("Mantenimiento", "gestion", "ModalUpdate",array("maq_id"=>$maq['maq_id']), "ajax") . "' 
                           class='btn btn-sm btn-primary' data-toggle='tooltip' data-placement='bottom' title='Eliminar'><i class='fa fa-pencil'></i></button> ";  
                           echo "</div>";  
                           //echo "<a   id=botonModal data-url='".getUrl("Mantenimiento","gestion","ModalUpdate",array("maq_id"=>$maq['maq_id']),"ajax")."'><button title='Editar' value='Editar' class='btn btn-primary btn-sm'><i class='fa fa-pencil ' ></i></button></a>"; 
                           if($maq['est_nombre']=='Mantenimiento') 
                           {
                           echo "<button title='Editar' value='Editar' id='habilitarEstado' class='btn btn-sm btn-primary' data-toggle='tooltip' data-placement='bottom' title='Eliminar'><i class='fa fa-check'></i></button> ";   
                           } 

                          
                         
                                             
                           echo "</td>";
                           echo "</tr>";

                           } ?>  



                            </tbody>
                        
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>                      
                       
                       




                        
                        
                        

                        


