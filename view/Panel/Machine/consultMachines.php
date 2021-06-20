<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <a href="<?php echo getUrl("PanelDeControl", "Machine", "getInsert");?>"><button class="btn btn-success">Registrar</button></a>
        </div>

        <div class="x_content">
            <h1>Maquina</h1>

            <div class="table-responsive">
                <table class="table table-striped jambo_table" id="table">
                    <thead>
                        <th class="column-title">Id</th>
                        <th class="column-title">Nombre Maquina</th>
                        <th class="column-title">Tipo de Maquina</th>
                        <th class="column-title">Estado</th>
                        <th class="column-title">Action</th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                        </tr>
                    </thead>
 
                    <tbody>
                    <?php
                    foreach ($maquinas as $maq){
                    ?>
                        <tr>
                            <td><?= $maq['Maq_id']; ?></td>
                            <td><?= $maq['Maq_nombre']; ?></td>
                            <td><?= $maq['Stg_nombre']; ?></td>
                            <td><?= $maq['Est_nombre']; ?></td>
                            <td>
                                <a class='btn btn-info btn-sm' href='<?php echo getUrl("PanelDeControl", "Machine", "viewMachine", array("Maq_id"=>$maq['Maq_id'])); ?>'>
                                    <i class='text-secundary fa fa-eye' aria-hidden='true'></i>
                                </a>

                                <a class='btn btn-primary btn-sm' href='<?php echo getUrl("PanelDeControl", "Machine", "getUpdate", array("Maq_id"=>$maq['Maq_id'])); ?>'>
                                    <i class='fa fa-pencil' aria-hidden='true'></i>
                                </a>

                                <?php
                                    if ($maq["Est_id"] == 1) {
                                        echo "<button class='iconLong btn btn-danger btn-sm' id='botonModal' value='Habilitar o Inhabilitar' data-id='".$maq['Maq_id']."' data-url='".getUrl('PanelDeControl','Machine','getDelete',array('Maq_id'=>$maq['Maq_id']),'ajax')."'><i class='fa fa-lock' aria-hidden='true'></i></button>";
                                    } else {
                                        echo "<button class='iconLong btn btn-success btn-sm' id='botonModal' value='Habilitar o Inhabilitar' data-id='".$maq['Maq_id']."' data-url='".getUrl("PanelDeControl","Machine","getDelete",array("Maq_id"=>$maq['Maq_id']),"ajax")."'><i class='fa fa-unlock' aria-hidden='true'></i></button>";
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