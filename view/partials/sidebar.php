<?php
include_once '../lib/helpers.php';
?>

<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><img src="images/logo.png" data-estado="1" style="margin-left:15px;" width="140px" alt="logazo" id="logo"></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <?php
                include_once '../controller/PanelDeControl/UserController.php';

                if ($_SESSION['rolUser'] == 'Administrador') {
                    $rolFoto = $manager;
                } elseif ($_SESSION['rolUser'] == 'Funcionario') {
                    $rolFoto = $functionary;
                } elseif ($_SESSION['rolUser'] == 'Aprendiz') {
                    $rolFoto = $learner;
                }
                ?>
                <img src="<?= $rolFoto ?>" alt="..." class="img-circle profile_img">
            </div>

            <div class="profile_info">
                <span class="">Bienvenido,</span>
                <h2><?= $_SESSION['nameUser']; ?></h2><br><strong class="text-white"><?= $_SESSION['rolUser']; ?></strong>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Modulos</h3>

                <ul class="nav side-menu">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-home"></i>Inicio
                        </a>
                    </li>

                    <li>
                        <a>
                            <i class="fa fa-money"></i>Costos
                            <span class="fa fa-chevron-down"></span>
                        </a>

                        <ul class="nav child_menu">
                            <li>
                                <a href="form.html">Compra</a>
                            </li>

                            <li>
                                <a href="form_advanced.html">Cotizacion</a>
                            </li>

                            <li>
                                <a href="form_advanced.html">Solicitud</a>
                            </li>

                            <li>
                                <a href="form_advanced.html">Reporte</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a>
                            <i class="fa fa-folder-open"></i>Inventario
                            <span class="fa fa-chevron-down"></span>
                        </a>

                        <ul class="nav child_menu">
                            <li>
                                <a href="general_elements.html">Control Stock</a>
                            </li>

                            <li>
                                <a href="media_gallery.html">Entrada de Bodega</a>
                            </li>

                            <li>
                                <a href="typography.html">Salida de Bodega</a>
                            </li>

                            <li>
                                <a href="icons.html">Reporte</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a>
                            <i class="fa fa-wrench"></i>
                            Mantenimiento <span class="fa fa-chevron-down"></span>
                        </a>

                        <ul class="nav child_menu">
                            <li>
                                <a href="tables.html">Gestionar Maquina</a>
                            </li>

                            <li>
                                <a href="tables_dynamic.html">Gestionar Orden</a>
                            </li>

                            <li>
                                <a href="tables_dynamic.html">Reporte</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a>
                            <i class="fa fa-gears"></i> Panel de Control
                            <span class="fa fa-chevron-down"></span>
                        </a>

                        <ul class="nav child_menu">
                            <li>
                                <a href="<?php echo getUrl("PanelDeControl", "Article", "consultArticles"); ?>">Gestionar Articulo</a>
                            </li>

                            <li>
                                <a href="<?php echo getUrl("PanelDeControl", "Company", "consultCompanies"); ?>">Gestionar Empresa</a>
                            </li>

                            <li>
                                <a href="<?php echo getUrl("PanelDeControl", "Tool", "consultTools"); ?>">Gestionar Herramienta</a>
                            </li>

                            <li>
                                <a href="<?php echo getUrl("PanelDeControl", "Machine", "consultMachines"); ?>">Gestionar Maquina</a>
                            </li>

                            <li>
                                <a href="<?php echo getUrl("PanelDeControl", "User", "consultUsers"); ?>">Gestionar Usuario</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a>
                            <i class="fa fa-line-chart"></i>Produccion
                            <span class="fa fa-chevron-down"></span>
                        </a>

                        <ul class="nav child_menu">
                            <li><a href="<?php echo getUrl("Produccion", "Produccion", "getMain"); ?>">Orden Produccion</a></li>
                            <li><a href="fixed_footer.html">Reporte</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>