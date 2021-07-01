<?php
    if(($_SESSION['rolUser'] != 'Aprendiz')){
?>

<div class="col-md-12 col-sm-12  "> 
    <div class="x_panel">
        <div class="x_title">
            <a href="<?php echo getUrl("PanelDeControl", "Tool", "getInsert"); ?>">
                <button class="btn btn-success">Registrar</button>
            </a>
        </div>
 
        <div class="x_content">
            <h1>Herramientas</h1>
            <div class="table-responsive">
                <table class="table table-striped jambo_table" id="table">
                    <thead>
                        <tr class="headings">
                            <th class="column-title">ID</th>
                            <th class="column-title">Nombre</th>
                            <th class="column-title">Tipo de Herramienta</th>
                            <th class="column-title">Estado</th>
                            <th class="column-title no-link last">Accion</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            foreach ($tools as $tool) {
                                if($_SESSION['rolUser'] == 'Administrador'){
                        ?>
                        <tr>
                            <td><?= $tool['Her_id']; ?></td>
                            <td><?= $tool['Her_nombre']; ?></td>
                            <td><?= $tool['Stg_nombre']; ?></td>  
                            <td><?= $tool['Est_nombre']; ?></td>  
                            <td>
                                <a class='btn btn-info btn-sm' href='<?php echo getUrl("PanelDeControl", "Tool", "viewTool", array("Her_id"=>$tool['Her_id'])); ?>'>
                                    <i class='text-secundary fa fa-eye' aria-hidden='true'></i>
                                </a>

                                <a class='btn btn-primary btn-sm' href='<?php echo getUrl("PanelDeControl", "Tool", "getUpdate", array("Her_id"=>$tool['Her_id'])); ?>'>
                                    <i class='fa fa-pencil' aria-hidden='true'></i>
                                </a>

                                <?php
                                    if ($tool["Est_id"] == 1) {
                                        echo "<button class='iconLong btn btn-danger btn-sm' id='inhabilitarPanel' value='Inhabilitar' data-objeto='Herramienta' data-name='Her_id' data-id='".$tool['Her_id']."' data-url='".getUrl('PanelDeControl','Tool','PostDelete',array('Est_id'=>$tool['Est_id']),'ajax')."'><i class='fa fa-lock' aria-hidden='true'></i></button>";
                                    } else {
                                        echo "<button class='iconLong btn btn-success btn-sm' id='inhabilitarPanel' value='Habilitar' data-objeto='Herramienta' data-name='Her_id' data-id='".$tool['Her_id']."' data-url='".getUrl("PanelDeControl","Tool","PostDelete",array("Est_id"=>$tool['Est_id']),"ajax")."'><i class='fa fa-unlock' aria-hidden='true'></i></button>";
                                    }
                                ?>
                            </td>
                        </tr>
                        
                        <?php   }elseif($_SESSION['rolUser'] == 'Funcionario' && $tool["Est_id"] == 1){  ?>
                                <tr>
                                <td><?= $tool['Her_id']; ?></td>
                            <td><?= $tool['Her_nombre']; ?></td>
                            <td><?= $tool['Stg_nombre']; ?></td>  
                            <td><?= $tool['Est_nombre']; ?></td>  
                            <td>
                                <a class='btn btn-info btn-sm' href='<?php echo getUrl("PanelDeControl", "Tool", "viewTool", array("Her_id"=>$tool['Her_id'])); ?>'>
                                    <i class='text-secundary fa fa-eye' aria-hidden='true'></i>
                                </a>

                                <a class='btn btn-primary btn-sm' href='<?php echo getUrl("PanelDeControl", "Tool", "getUpdate", array("Her_id"=>$tool['Her_id'])); ?>'>
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