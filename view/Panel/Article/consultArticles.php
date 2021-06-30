<?php
if (($_SESSION['rolUser'] != 'Aprendiz')) {
?>

    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <a href="<?php echo getUrl("PanelDeControl", "Article", "getInsert"); ?>">
                    <button class="btn btn-success">Registrar</button>
                </a>
            </div>

            <div class="x_content">
                <h1>Articulo</h1>

                <div class="table-responsive">
                    <table class="table table-striped jambo_table" id="table">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Id</th>
                                <th class="column-title">Nombre del Articulo </th>
                                <th class="column-title">Tipo de Articulo</th>
                                <th class="column-title">Medida</th>
                                <th class="column-title">Estado</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($articulos as $articulo) {
                                if ($_SESSION['rolUser'] == 'Administrador') {
                            ?>

                                    <tr class='even pointer'>
                                        <td><?= $articulo['Arti_id']; ?></td>
                                        <td><?= $articulo['Arti_nombre']; ?></td>
                                        <td><?= $articulo['Tart_descripcion']; ?></td>
                                        <td><?= $articulo['Arti_medida'] . " " . $articulo['Med_descripcion']; ?></td>
                                        <td><?= $articulo['Est_nombre']; ?></td>
                                        <td>
                                            <a class='btn btn-info btn-sm' href='<?php echo getUrl("PanelDeControl", "Article", "viewArticle", array("Arti_id" => $articulo['Arti_id'])); ?>'>
                                                <i class='text-secundary fa fa-eye' aria-hidden='true'></i>
                                            </a>

                                            <a class='btn btn-primary btn-sm' href='<?php echo getUrl("PanelDeControl", "Article", "getUpdate", array("Arti_id" => $articulo['Arti_id'])); ?>'>
                                                <i class='fa fa-pencil' aria-hidden='true'></i>
                                            </a>

                                            <?php
                                            if ($articulo["Est_id"] == 1) {
                                                echo "<button class='iconLong btn btn-danger btn-sm' id='inhabilitarPanel' value='Habilitar' data-objeto='Articulo' data-name='Arti_id' data-id='" . $articulo['Arti_id'] . "' data-url='" . getUrl('PanelDeControl', 'Article', 'postDelete', array('Est_id' => $articulo['Est_id']), 'ajax') . "'><i class='fa fa-lock' aria-hidden='true'></i></button>";
                                            } else {
                                                echo "<button class='iconLong btn btn-success btn-sm' id='inhabilitarPanel' value='Inhabilitar' data-objeto='Articulo' data-name='Arti_id' data-id='" . $articulo['Arti_id'] . "' data-url='" . getUrl("PanelDeControl", "Article", "postDelete", array("Est_id" => $articulo['Est_id']), "ajax") . "'><i class='fa fa-unlock' aria-hidden='true'></i></button>";
                                            }
                                            ?>

                                        </td>
                                    </tr>

                                <?php
                                } elseif ($_SESSION['rolUser'] == 'Funcionario' && $articulo["Est_id"] == 1) {
                                ?>
                                    <tr class='even pointer'>
                                        <td><?= $articulo['Arti_id']; ?></td>
                                        <td><?= $articulo['Arti_nombre']; ?></td>
                                        <td><?= $articulo['Tart_descripcion']; ?></td>
                                        <td><?= $articulo['Arti_medida'] . " " . $articulo['Med_descripcion']; ?></td>
                                        <td><?= $articulo['Est_nombre']; ?></td>
                                        <td>
                                            <a class='btn btn-info btn-sm' href='<?php echo getUrl("PanelDeControl", "Article", "viewArticle", array("Arti_id" => $articulo['Arti_id'])); ?>'>
                                                <i class='text-secundary fa fa-eye' aria-hidden='true'></i>
                                            </a>

                                            <a class='btn btn-primary btn-sm' href='<?php echo getUrl("PanelDeControl", "Article", "getUpdate", array("Arti_id" => $articulo['Arti_id'])); ?>'>
                                                <i class='fa fa-pencil' aria-hidden='true'></i>
                                            </a>
                                        </td>
                                    </tr>
                            <?php      
                                }
                            } ?>
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