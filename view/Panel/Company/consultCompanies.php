<?php
if (($_SESSION['rolUser'] != 'Aprendiz')) {
?>

    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <a href="<?php echo getUrl("PanelDeControl", "Company", "getInsert"); ?>"><button class="btn btn-success">Registrar</button></a>
            </div>

            <div class="x_content">
                <h1>Empresa</h1>

                <div class="table-responsive">
                    <table class="table table-striped jambo_table" id="table">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Id</th>
                                <th class="column-title">NIT</th>
                                <th class="column-title">Razon Social</th>
                                <th class="column-title">Tipo de empresa</th>
                                <th class="column-title">Estado</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($empresas as $emp) {
                                if ($_SESSION['rolUser'] == 'Administrador') {
                            ?>

                                    <tr class='even pointer'>
                                        <td><?= $emp['Emp_id']; ?></td>
                                        <td><?= $emp['Emp_NIT']; ?></td>
                                        <td><?= $emp['Emp_razonSocial']; ?></td>
                                        <td><?= $emp['Tempr_descripcion']; ?></td>
                                        <td><?= $emp['Est_nombre']; ?></td>
                                        <td>
                                            <a class='btn btn-info btn-sm' href='<?php echo getUrl("PanelDeControl", "Company", "viewCompany", array("Emp_id" => $emp['Emp_id'])); ?>'>
                                                <i class='text-white fa fa-eye' aria-hidden='true'></i>
                                            </a>

                                            <a class='btn btn-primary btn-sm' href='<?php echo getUrl("PanelDeControl", "Company", "getUpdate", array("Emp_id" => $emp['Emp_id'])); ?>'>
                                                <i class='fa fa-pencil' aria-hidden='true'></i>
                                            </a>

                                            <?php
                                            if ($emp["Est_id"] == 1) {
                                                echo "<button class='iconLong btn btn-danger btn-sm' id='inhabilitarPanel' value='Inhabilitar' data-objeto='Empresa' data-name='Emp_id' data-id='" . $emp['Emp_id'] . "' data-url='" . getUrl('PanelDeControl', 'Company', 'postDelete', array('Est_id' => $emp['Est_id']), 'ajax') . "'><i class='fa fa-lock' aria-hidden='true'></i></button>";
                                            } else {
                                                echo "<button class='iconLong btn btn-success btn-sm' id='inhabilitarPanel' value='Habilitar' data-objeto='Empresa' data-name='Emp_id' data-id='" . $emp['Emp_id'] . "' data-url='" . getUrl("PanelDeControl", "Company", "postDelete", array("Est_id" => $emp['Est_id']), "ajax") . "'><i class='fa fa-unlock' aria-hidden='true'></i></button>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php } elseif ($_SESSION['rolUser'] == 'Funcionario' && $emp["Est_id"] == 1) { ?>
                                    <tr class='even pointer'>
                                        <td><?= $emp['Emp_id']; ?></td>
                                        <td><?= $emp['Emp_NIT']; ?></td>
                                        <td><?= $emp['Emp_razonSocial']; ?></td>
                                        <td><?= $emp['Tempr_descripcion']; ?></td>
                                        <td><?= $emp['Est_nombre']; ?></td>
                                        <td>
                                            <a class='btn btn-info btn-sm' href='<?php echo getUrl("PanelDeControl", "Company", "viewCompany", array("Emp_id" => $emp['Emp_id'])); ?>'>
                                                <i class='text-white fa fa-eye' aria-hidden='true'></i>
                                            </a>

                                            <a class='btn btn-primary btn-sm' href='<?php echo getUrl("PanelDeControl", "Company", "getUpdate", array("Emp_id" => $emp['Emp_id'])); ?>'>
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
} else {
    include_once '../view/partials/page404.php';
}
?>