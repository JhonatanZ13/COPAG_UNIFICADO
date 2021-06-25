<div class="x_title" class="divTitulo">
    <small class="xc_color">Tareas</small>
</div>

<div class="col-md-12 col-sm-10 ">
    <div class="x_panel">
        <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
                <li>

                    <a href="<?php echo getUrl("Mantenimiento", "Tareas", "FormInsert"); ?>">
                        <p class="btn btn-success"> Registrar</p>
                    </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <table id="datatable-responsive" class="table table-striped table-hover" style="width:100%">
                            <thead style="background-color: #17A481;; color:#fff;">
                                <tr>
                                    <th   class='text-center '>Id</th>
                                    <th  class='text-center'>Nombre</th>
                                    <th  id="th_desc" class='text-center'>Descripcion</th>
                                    <th  class='text-center ' >Acciones          </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($Tareas as $Tar) {
                                    echo  "<tr>";
                                    echo   "<td class='text-center'>" . $Tar['Tar_id'] . "</td>";
                                    echo   "<td >" . $Tar['Tar_nombre'] . "</td>";
                                    echo   "<td >" . $Tar['Tar_descripcion'] . "</td>";
                                    echo "<td>
                                   
                                    <a href=".getUrl("Mantenimiento", "Tareas", "FormView",array("Tar_id" => $Tar['Tar_id']))."><button class='btn btn-primary btn-sm '><i class='fa fa-eye ' ></i></button></a>                                      
                                    <a href=".getUrl("Mantenimiento", "Tareas", "FormUpdate",array("Tar_id" => $Tar['Tar_id']))."><button class='btn btn-primary btn-sm '><i class='fa fa-pencil  ' ></i></button></a>

                                    <button id='ModalDelete' data-id='".$Tar['Tar_id']."' data-url='" . getUrl("Mantenimiento", "Tareas", "DeleteModal",false, "ajax") . "' 
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
</div>