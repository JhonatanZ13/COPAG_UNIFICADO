<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <a href="<?php echo getUrl("PanelDeControl", "User", "getInsert"); ?>">
                <button class="btn btn-success">Registrar</button>
            </a>
        </div>

        <div class="x_content">
            <h1>Usuarios</h1>
            <div class="table-responsive">
                <table class="table table-striped jambo_table" id="table">
                    <thead>
                        <tr class="headings">
                            <th class="column-title">ID</th>
                            <th class="column-title">Numero Documento</th>
                            <th class="column-title">Nombre completo</th>
                            <th class="column-title">Rol</th>
                            <th class="column-title">Estado</th>
                            <th class="column-title no-link last">Accion</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            foreach ($usuarios as $user) {
                        ?>

                        <tr>
                            <td><?= $user['Usu_id']?></td>
                            <td><?=$user['Usu_numeroDocumento']?></td>
                            <td><?= $user['Usu_primerNombre'].' '.$user['Usu_segundoNombre'].' '.$user['Usu_primerApellido'].' '.$user['Usu_segundoApellido']?></td>
                            <td><?= $user['Rol_nombre']?></td>
                            <td><?= $user['Est_nombre']?></td>
                            <td>
                                <a class='btn btn-info btn-sm' href='<?php echo getUrl("PanelDeControl", "User", "viewUser", array('Usu_id' => $user['Usu_id'])); ?>'>
                                    <i class='text-secundary fa fa-eye' aria-hidden='true'></i>
                                </a>

                                <a class='btn btn-primary btn-sm' href='<?php echo getUrl("PanelDeControl", "User", "getUpdate", array('Usu_id' => $user['Usu_id'])); ?>'>
                                    <i class='fa fa-pencil' aria-hidden='true'></i>
                                </a>

                                <?php
                                    if ($user["Est_id"] == 1) {
                                        echo "<button class='iconLong btn btn-danger btn-sm' id='botonModal' value='Habilitar o Inhabilitar' data-id='".$user['Usu_id']."' data-url='".getUrl('PanelDeControl','User','getDelete',array('Usu_id'=>$user['Usu_id']),'ajax')."'><i class='fa fa-lock' aria-hidden='true'></i></button>";
                                    } else {
                                        echo "<button class='iconLong btn btn-success btn-sm' id='botonModal' value='Habilitar o Inhabilitar' data-id='".$user['Usu_id']."' data-url='".getUrl("PanelDeControl","User","getDelete",array("Usu_id"=>$user['Usu_id']),"ajax")."'><i class='fa fa-unlock' aria-hidden='true'></i></button>";
                                    }
                                ?>
                                
                            </td>
                            
                        </tr>
                        
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
