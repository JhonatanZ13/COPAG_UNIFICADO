<div class="x_title" class="divTitulo">
    <small class="xc_color">Procesos</small>
</div>

<div class="col-md-12 col-sm-10 ">
    <div class="x_panel">
        <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <button class="btn btn-success btn-sm" id="botonModal" value="Registrar" data-url="<?php echo getUrl("Mantenimiento", "Procesos", "ModalInsert", false, "ajax"); ?>"><i class="pl-1">Registrar</i></button>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <table id="datatable-responsive"  class="table table-striped table-hover orange" style="width:100%">
                            <thead style="background-color: #17A481;; color:#fff;">
                                <tr>
                                    <th class='text-center ' >Id</th>
                                    <th class='text-center '>Nombre</th>
                                    <th id="th_desc"class='text-center '>Descripcion</th>
                                    <th class='text-center ' >Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($procesos as $pro) {
                                    echo  "<tr>";
                                    echo   "<td>" . $pro['Pro_id'] . "</td>";
                                    echo   "<td>" . $pro['Pro_nombre'] . "</td>";
                                    echo   "<td>" . $pro['Pro_descripcion'] . "</td>";
                                    echo "<td>
                                    <button type='buttom' title='Editar' value='Editar' class='btn btn-primary btn-sm' <a id='botonModal' data-url='" . getUrl("Mantenimiento", "Procesos", "ModalUpdate", array("Pro_id" => $pro['Pro_id']), "ajax") . "'><i class='fa fa-pencil'></i></a></button>
                                    <button id='AlertDelete' data-id='".$pro['Pro_id']."' data-url='" . getUrl("Mantenimiento", "Procesos", "DeleteModal",false, "ajax") . "' 
                                    class='btn btn-sm btn-danger' data-toggle='tooltip' data-placement='bottom' title='Eliminar'><i class='fa fa-trash-o'></i></button>
                                    </td>";



                                    echo  "</tr>";
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