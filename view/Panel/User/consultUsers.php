<?php
if (($_SESSION['rolUser'] != 'Aprendiz')) {
?>

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
                                if ($_SESSION['rolUser'] == 'Administrador') {
                            ?>
                                    <tr>
                                        <td><?= $user['Usu_id'] ?></td>
                                        <td><?= $user['Usu_numeroDocumento'] ?></td>
                                        <td><?= $user['Usu_primerNombre'] . ' ' . $user['Usu_segundoNombre'] . ' ' . $user['Usu_primerApellido'] . ' ' . $user['Usu_segundoApellido'] ?></td>
                                        <td><?= $user['Rol_nombre'] ?></td>
                                        <td><?= $user['Est_nombre'] ?></td>
                                        <td>
                                            <a class='row ml-1 btn btn-info btn-sm' href='<?php echo getUrl("PanelDeControl", "User", "viewUser", array('Usu_id' => $user['Usu_id'])); ?>'>
                                                <i class='text-secundary fa fa-eye' aria-hidden='true'></i>
                                            </a>

                                            <a class='row ml-1 btn btn-primary btn-sm' href='<?php echo getUrl("PanelDeControl", "User", "getUpdate", array('Usu_id' => $user['Usu_id'])); ?>'>
                                                <i class='fa fa-pencil' aria-hidden='true'></i>
                                            </a>

                                            <?php
                                            if ($user["Est_id"] == 1) {
                                                echo "<button class='row ml-1 iconLong btn btn-danger btn-sm' id='inhabilitarPanel' value='Inhabilitar' data-objeto='Usuario' data-name='Usu_id' data-id='" . $user['Usu_id'] . "' data-url='" . getUrl('PanelDeControl', 'User', 'postDelete', array('Est_id' => $user['Est_id']), 'ajax') . "'><i class='fa fa-lock' aria-hidden='true'></i></button>";
                                            } else {
                                                echo "<button class='row ml-1 iconLong btn btn-success btn-sm' id='inhabilitarPanel' value='Habilitar' data-objeto='Usuario' data-name='Usu_id' data-id='" . $user['Usu_id'] . "' data-url='" . getUrl("PanelDeControl", "User", "postDelete", array("Est_id" => $user['Est_id']), "ajax") . "'><i class='fa fa-unlock' aria-hidden='true'></i></button>";
                                            }
                                            ?>

                                        </td>

                                    </tr>

                                <?php   } elseif ($_SESSION['rolUser'] == 'Funcionario' && $user["Est_id"] == 1) {  ?>
                                    <tr>
                                        <td><?= $user['Usu_id'] ?></td>
                                        <td><?= $user['Usu_numeroDocumento'] ?></td>
                                        <td><?= $user['Usu_primerNombre'] . ' ' . $user['Usu_segundoNombre'] . ' ' . $user['Usu_primerApellido'] . ' ' . $user['Usu_segundoApellido'] ?></td>
                                        <td><?= $user['Rol_nombre'] ?></td>
                                        <td><?= $user['Est_nombre'] ?></td>
                                        <td>
                                            <a class='row ml-1 btn btn-info btn-sm' href='<?php echo getUrl("PanelDeControl", "User", "viewUser", array('Usu_id' => $user['Usu_id'])); ?>'>
                                                <i class='text-secundary fa fa-eye' aria-hidden='true'></i>
                                            </a>

                                            <a class='row ml-1 btn btn-primary btn-sm' href='<?php echo getUrl("PanelDeControl", "User", "getUpdate", array('Usu_id' => $user['Usu_id'])); ?>'>
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