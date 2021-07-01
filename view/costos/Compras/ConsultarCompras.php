<div class="x_title">
    <h2>Gestionar Compras</h2>

    <div class="clearfix"></div>
</div>
<div class="x_content">

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
        <div class="x_title">
                <h2>Consultar</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <a href="<?php

echo getUrl("costos","compras","getInsert");?>">
                      <button class="btn btn-success btn-sm">Crear solicitud compra<i
                                    class="fas fa-plus-square pl-3"></i></button>
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
                                        <th>Fecha de solicitud</th>
                                        <th>Cantidad de insumos</th>
                                        <th>acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                               foreach($compras as $comp){
                                echo "<tr>";     
                                echo "<td>".$comp['Soc_id']."</td>";
                                echo "<td>".$comp['Soc_fecha']."</td>";
                                echo "<td>".$comp['continsumos']."</td>";  
                                echo "<td>
                                <a href='".getUrl("costos", "compras","getUpdate",array("Soc_id"=>$comp['Soc_id']))."'>
                                <button class='btn btn-success btn-sm' data-toggle='tooltip' data-placement='bottom' title='Editar'><i class='fa fa-pencil'></i></button></a> 
                                <a href='".getUrl("costos", "compras","getVisualize",array("Soc_id"=>$comp['Soc_id']))."'>
                                <button class='btn btn-success btn-sm' data-toggle='tooltip' data-placement='bottom' title='Visualizar'><i class='fa fa-eye'></i></button></a>      
                                </a>
                                <a href='" . getUrl("Costos", "Excel", "postExcel",array("Soc_id"=>$comp['Soc_id']) , 'ajax') . "' target='_blank'><button class='btn btn-sm btn-success' data-toggle='tooltip' data-placement='bottom' title='Descargar'><i class='fa fa-file-excel-o'></i></button>
                                </a>
                              
                                <button value='Eliminar solicitud de compras' data-id='".$comp['Soc_id']."' data-toggle='tooltip' data-placement='bottom' title='Eliminar' class='btn btn-danger btn-sm botonModal'
                                 data-url='".getUrl("costos","compras","postDelete",false,"ajax")."' >
                                 <i class='fa fa-close'></i></button></a>
                               </td>";  
                                echo "</tr>";
                            }
                                ?>
                                </tbody>
                            </table>
                    <?php

                    


?>
                        </div>
                    </div>
                </div>
            </div>
      </div>
       
    </div>
