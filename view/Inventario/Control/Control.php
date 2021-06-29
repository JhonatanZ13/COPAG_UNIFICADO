<!-- Visualizacion del inventario de artes graficas -->
<div class="x_title">
    <h2>CONTROL DE STOCK</h2>
    <div class="clearfix"></div>
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
                                <th class="column-title">ID</th>
                                <th class="column-title">Nombre</th>
                                <th class="column-title">Tipo articulo</th>
                                <th class="column-title">Descripcion</th>
                                <th class="column-title">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                          foreach ($Control as $con){
                            echo "<tr>";
                            echo "<td>" . $con['Arti_id'] . "</td>";
                            echo "<td>" . $con['Arti_nombre'] . "</td>";
                            echo "<td>" . $con['Tart_descripcion'] . "</td>";
                            echo "<td>" . $con['Arti_descripcion'] . "</td>";
                            echo "<td>" . $con['Arti_cantidad'] . "</td>";
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