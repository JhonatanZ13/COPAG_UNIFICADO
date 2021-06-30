<?php
    if(($_SESSION['rolUser'] != 'Aprendiz')){
?>

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
                            if($_SESSION['rolUser'] == 'Administrador'){
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
                                
                                    if ($maq["Est_id"] == 1 || $maq["Est_id"] == 14) {
                                        echo "<button class='iconLong btn btn-danger btn-sm' id='inhabilitarPanel' value='Inhabilitar' data-objeto='Maquina' data-name='Maq_id' data-id='".$maq['Maq_id']."' data-url='".getUrl('PanelDeControl','Machine','postDelete',array('Est_id'=>$maq['Est_id']),'ajax')."'><i class='fa fa-lock' aria-hidden='true'></i></button>";
                                    }else if($maq["Est_id"] == 0){
                                        echo "<button class='iconLong btn btn-success btn-sm' id='inhabilitarPanel' value='Habilitar' data-objeto='Maquina' data-name='Maq_id' data-id='".$maq['Maq_id']."' data-url='".getUrl("PanelDeControl","Machine","postDelete",array("Est_id"=>$maq['Est_id']),"ajax")."'><i class='fa fa-unlock' aria-hidden='true'></i></button>";
                                    }
                                
                                ?>
                            </td>
                        </tr>

                    <?php   }elseif($_SESSION['rolUser'] == 'Funcionario' && ($maq["Est_id"] == 1 || $maq["Est_id"] == 11 || $maq["Est_id"] == 13 || $maq["Est_id"] == 14)){  ?>
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
                            </td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
    }else{
        include_once '../view/partials/page404.php';
    }
?>