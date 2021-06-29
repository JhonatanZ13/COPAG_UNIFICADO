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
                        <table id="table" class="table table-striped table-bordered" style="width:100%">
                            <thead style="background-color: #17A481;; color:#fff;">
                                <tr>
                                    <th>Id</th>
                                    <th>Maquina</th>
                                    <th>Ficha Tecnica</th>
                                    <th>Manual</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                          foreach ($maquinas as $maq){
                           echo "<tr>";
                           echo "<div readonly id='LecturaEstado'>";
                           echo "<td>".$maq['Maq_id']."</td>";
                           echo "<td>".$maq['Maq_nombre']."</td>";

                          echo "<td>";

                          if ($maq['Maq_fichaTecnica']) { 

                            
                         ?>
                                <a href="<?php echo getUrl("PanelDeControl", "Machine", "viewPdfFicha", array("Maq_fichaTecnica" => $maq['Maq_fichaTecnica']), "ajax") ?>"
                                    target="blank">
                                    <button type="button" class="btn-small btn-info btn-sm ">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </button>
                                </a>
                                <?php

                            
                          }

                          "</td>";

                        


                           echo "<td>";
                                   
                           ?>
                                <a href="<?php echo getUrl("PanelDeControl", "Machine", "viewPdfManual", array("Maq_manual" => $maq['Maq_manual']), "ajax") ?>"
                                    target="blank">
                                    <button type="button" class="btn-small btn-info btn-sm">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </button>
                                </a>


                                <?php
                           
                           "</td>";                                    
                           
                        //    echo "<td><img src='".$maq['Maq_fichaTecnica']."'width='100px'></td>";
                        //    echo "<td><img src='".$maq['Maq_manual']."'width='100px'></td>";
                           echo "<td>".$maq['Est_nombre'];
                           echo "</td>";
                           echo "<td>";
                            if($maq['Est_nombre']!='Mantenimiento'){ 
                           echo "<button  title='Editar' value='Editar' id='botonModal' data-url='" . getUrl("Mantenimiento", "gestion", "ModalUpdate",array("Maq_id"=>$maq['Maq_id']), "ajax") . "' 
                           class='btn btn-sm btn-primary' data-toggle='tooltip' data-placement='bottom' title='Eliminar'><i class='fa fa-pencil'></i></button> ";  
                           
                           //echo "<a   id=botonModal data-url='".getUrl("Mantenimiento","gestion","ModalUpdate",array("maq_id"=>$maq['maq_id']),"ajax")."'><button title='Editar' value='Editar' class='btn btn-primary btn-sm'><i class='fa fa-pencil ' ></i></button></a>"; 
                            }else if($maq['Est_nombre']=='Mantenimiento') 
                           
                           {
                            echo "<button style='display: none;' title='Editar' value='Editar' id='botonModal' data-url='" . getUrl("Mantenimiento", "gestion", "ModalUpdate",array("Maq_id"=>$maq['Maq_id']), "ajax") . "' 
                            class='btn btn-sm btn-primary' data-toggle='tooltip' data-placement='bottom' title='Eliminar'><i class='fa fa-pencil'></i></button> ";  
                            echo "<button  title='habilitar' value='Habilitar' id='habilitarEstado' class='btn btn-sm btn-success' data-toggle='tooltip' data-placement='bottom' title='Eliminar'><i class='fa fa-unlock'></i></button> ";   
                            echo "<button style='display:none;' title='inhabilitar' value='Habilitar' id='inhabilitarestado' class='btn btn-sm btn-danger' data-toggle='tooltip' data-placement='bottom' title='Eliminar'><i class='fa fa-lock'></i></button> ";   
                           
                           
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