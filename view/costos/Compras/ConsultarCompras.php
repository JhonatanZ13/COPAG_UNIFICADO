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
                            <table id="datatable-responsive-costos-cotizacion-pendiente"
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
                                echo "<td>".$comp['com_NoItem']."</td>";
                                echo "<td>".$comp['Soc_fecha']."</td>";
                                echo "<td>".$comp['com_NoItem']."</td>";
                                
                                echo "<td>
                                <a href='".getUrl("costos", "compras","getUpdate",array("com_NoItem"=>$comp['com_NoItem']))."'>
                                <button class='btn btn-success'><i class='fa fa-pencil'></i></button></a> 
                                <a href='".getUrl("costos", "compras","getVisualize",array("com_NoItem"=>$comp['com_NoItem']))."'>
                                <button class='btn btn-success'><i class='fa fa-eye'></i></button></a>
                                <abbr title='Eliminar compra'>
                                <button value='Eliminar Solicitud de Compra' data-url='".getUrl("costos","compras","modalDelete",false,"ajax")."' data-id='".$comp['com_NoItem']."' class='btn btn-danger botonModal'  id='botonModal' value='Eliminar' ><i class='fa fa-close'></i></button></a>
                                </abbr></td>";  
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
