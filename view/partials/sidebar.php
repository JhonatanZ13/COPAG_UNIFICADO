<?php
include_once '../lib/helpers.php';

include_once '../controller/Access/AccessController.php';
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
                <h2><?= $_SESSION['nameUser'] . " " . $_SESSION['surnameUser'] ?></h2><br><strong class="text-white"><?= $_SESSION['rolUser']; ?></strong>
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

                    <?php
                        if (($_SESSION['rolUser'] == 'Administrador' || $_SESSION['rolUser'] == 'Aprendiz' ) && ($_SESSION['areaUser'] == 'Costos' || $_SESSION['areaUser'] == 'Produccion' || $_SESSION['areaUser'] == 'Control') || ($_SESSION['rolUser'] == 'Funcionario') && ($_SESSION['areaUser'] == 'Produccion' || $_SESSION['areaUser'] == 'Costos')) {
                    ?>
                        <li>
                            <a>
                                <i class="fa fa-money"></i> Costos
                                <span class="fa fa-chevron-down"></span>
                            </a>
                        
                            <ul class="nav child_menu">
                            <?php
                                if ( (($_SESSION['rolUser'] == 'Administrador') && ($_SESSION['areaUser'] == 'Control' || $_SESSION['areaUser'] == 'Costos' || $_SESSION['areaUser'] == 'Produccion' )) || (($_SESSION['rolUser'] == 'Funcionario') && ($_SESSION['areaUser'] == 'Produccion' || $_SESSION['areaUser'] == 'Costos')) ) {
                            ?>
                                <li>
                                    <a href="<?php echo getUrl("costos", "compras", "consult"); ?>">Compra</a>
                                </li>
                            <?php   
                                }

                                if (($_SESSION['rolUser'] == 'Aprendiz' &&  $_SESSION['areaUser'] == 'Costos') || ($_SESSION['rolUser'] == 'Aprendiz' &&  $_SESSION['areaUser'] == 'Produccion') || $_SESSION['rolUser'] == 'Funcionario' || $_SESSION['rolUser'] == 'Administrador') {
                            ?>
                                <li>
                                    <a href="<?php echo getUrl("costos", "cotizacion", "consult"); ?>">Cotizacion</a>
                                </li>
                            <?php   
                                }

                                if (($_SESSION['rolUser'] == 'Aprendiz' &&  $_SESSION['areaUser'] == 'Costos') || ($_SESSION['rolUser'] == 'Aprendiz' &&  $_SESSION['areaUser'] == 'Produccion') || $_SESSION['rolUser'] == 'Funcionario' || $_SESSION['rolUser'] == 'Administrador') {
                            ?>
                                <li>
                                    <a href="<?php echo getUrl("costos", "solicitud", "consult"); ?>">Solicitud</a>
                                </li>
                            <?php   
                                }

                                if (($_SESSION['rolUser'] == 'Aprendiz' &&  $_SESSION['areaUser'] == 'Costos') || ($_SESSION['rolUser'] == 'Aprendiz' &&  $_SESSION['areaUser'] == 'Produccion') || $_SESSION['rolUser'] == 'Funcionario' || $_SESSION['rolUser'] == 'Administrador') {
                            ?>
                                <li>
                                    <a href="<?php echo getUrl("costos", "reporte", "consult"); ?>">Reporte</a>
                                </li>
                            <?php
                                }
                            ?>
                            </ul>
                        </li>

                    <?php
                        }
                    ?>

                    <?php
                        if (($_SESSION['rolUser'] == 'Administrador') && ($_SESSION['areaUser'] == 'Control' || $_SESSION['areaUser'] == 'Mantenimiento' || $_SESSION['areaUser'] == 'Inventario' || $_SESSION['areaUser'] == 'Produccion') || ($_SESSION['rolUser'] == 'Funcionario') && ($_SESSION['areaUser'] == 'Mantenimiento' || $_SESSION['areaUser'] == 'Inventario' || $_SESSION['areaUser'] == 'Produccion') || ($_SESSION['rolUser'] == 'Aprendiz') && ($_SESSION['areaUser'] == 'Mantenimiento' || $_SESSION['areaUser'] == 'Inventario' || $_SESSION['areaUser'] == 'Produccion')) {
                    ?>

                        <li>
                            <a>
                                <i class="fa fa-folder-open"></i>Inventario
                                <span class="fa fa-chevron-down"></span>
                            </a>

                            <ul class="nav child_menu">
                            <?php
                                if (($_SESSION['rolUser'] == 'Administrador' || $_SESSION['rolUser'] == 'Funcionario') && ($_SESSION['areaUser'] == 'Inventario' || $_SESSION['areaUser'] == 'Control') || ($_SESSION['rolUser'] == 'Aprendiz' &&  $_SESSION['areaUser'] == 'Inventario')) {
                            ?>
                                <li>
                                    <a href="<?php echo getUrl("Entrada", "Entrada", "getEntrada"); ?>">Entrada de Bodega</a>
                                </li>
                            <?php
                                }
                            ?>
                            <?php
                                if (($_SESSION['rolUser'] == 'Administrador' || $_SESSION['rolUser'] == 'Funcionario') && ($_SESSION['areaUser'] == 'Inventario' || $_SESSION['areaUser'] == 'Control') ) {
                            ?>
                                <li>
                                    <a href="<?php echo getUrl("Salida", "Salida", "getSalidaMasiva"); ?>">Salida de Bodega</a>
                                </li>
                            <?php
                                }
                            ?>
                            <?php
                                if ((($_SESSION['rolUser'] == 'Aprendiz') && ($_SESSION['areaUser'] == 'Inventario' || $_SESSION['areaUser'] == 'Produccion')) || ($_SESSION['rolUser'] == 'Funcionario' && $_SESSION['areaUser'] == 'Produccion' || $_SESSION['areaUser'] == 'Inventario') || ($_SESSION['rolUser'] == 'Aministrador' && $_SESSION['areaUser'] == 'Inventario' || $_SESSION['areaUser'] == 'Produccion' || $_SESSION['areaUser'] == 'Control' || $_SESSION['areaUser'] == 'Mantenimiento') ) {
                            ?>
                                <li>
                                    <a href="<?php echo getUrl("Control", "Control", "getControl"); ?>">Control Stock</a>
                                </li>
                            <?php
                                }
                            ?>
                            <?php
                                if (($_SESSION['rolUser'] == 'Administrador' || $_SESSION['rolUser'] == 'Funcionario' || ($_SESSION['rolUser'] == 'Aprendiz') && ($_SESSION['areaUser'] == 'Control' || $_SESSION['areaUser'] == 'Costos' || $_SESSION['areaUser'] == 'Inventario' ))) {
                            ?>
                                <li>
                                    <a href="<?php echo getUrl("Reportes", "Reportes", "getReporte"); ?>">Reporte</a>
                                </li>
                            <?php
                                }
                            ?>

                            </ul>
                        </li>
                    <?php } ?>

                    <?php
                        if (($_SESSION['rolUser'] == 'Aprendiz' || $_SESSION['rolUser'] == 'Administrador' || $_SESSION['rolUser'] == 'Funcionario') && ($_SESSION['areaUser'] == 'Mantenimiento' || $_SESSION['areaUser'] == 'Control')) {
                    ?>
                        <li>
                            <a>
                                <i class="fa fa-wrench"></i>
                                Mantenimiento <span class="fa fa-chevron-down"></span>
                            </a>

                            <ul class="nav child_menu">
                            <?php
                                if (($_SESSION['rolUser'] == 'Aprendiz' || $_SESSION['rolUser'] == 'Administrador' || $_SESSION['rolUser'] == 'Funcionario') && ($_SESSION['areaUser'] == 'Mantenimiento' || $_SESSION['areaUser'] == 'Control')) {
                            ?>
                                <li>
                                    <a href="<?php echo getUrl("Mantenimiento", "Gestion", "consult"); ?>">Gestionar Maquina</a>
                                </li>
                            <?php
                                }
                            ?>
                            <?php
                                if (($_SESSION['rolUser'] == 'Administrador' || $_SESSION['rolUser'] == 'Funcionario') && ($_SESSION['areaUser'] == 'Mantenimiento' || $_SESSION['areaUser'] == 'Control')) {
                            ?>
                                <li>
                                    <a href="<?php echo getUrl("Mantenimiento", "Orden", "consult"); ?>">Gestionar Orden</a>
                                </li>
                            <?php
                                }
                            ?>
                            <?php
                                if (($_SESSION['rolUser'] == 'Aprendiz' || $_SESSION['rolUser'] == 'Administrador' || $_SESSION['rolUser'] == 'Funcionario') && ($_SESSION['areaUser'] == 'Mantenimiento' || $_SESSION['areaUser'] == 'Control')) {
                            ?>
                                <li>
                                    <a href="<?php echo getUrl("Mantenimiento", "Procesos", "consult"); ?>">Procesos</a>
                                </li>

                                <li>
                                    <a href="<?php echo getUrl("Mantenimiento", "Tareas", "consult"); ?>">Tareas</a>
                                </li>

                                <li>
                                    <a href="<?php echo getUrl("Mantenimiento", "Reporte", "consult"); ?>">Reporte</a>
                                </li>
                            <?php
                                }
                            ?>
                            </ul>
                        </li>

                    <?php } ?>

                    <?php
                        if ($_SESSION['areaUser'] == 'Control' || $_SESSION['rolUser'] == 'Administrador' || $_SESSION['rolUser'] == 'Funcionario') {
                    ?>

                        <li>
                            <a>
                                <i class="fa fa-gears"></i> Panel de Control
                                <span class="fa fa-chevron-down"></span>
                            </a>

                            <ul class="nav child_menu">
                            <?php 
                                if (($_SESSION['rolUser'] == 'Administrador' || $_SESSION['rolUser'] == 'Funcionario') && ($_SESSION['areaUser'] == 'Inventario' || $_SESSION['areaUser'] == 'Control' )) {
                            ?>
                                <li>
                                    <a href="<?php echo getUrl("PanelDeControl", "Article", "consultArticles"); ?>">Gestionar Articulo</a>
                                </li>
                            <?php 
                                }
                            ?>

                            <?php 
                                if (($_SESSION['rolUser'] == 'Administrador' || $_SESSION['rolUser'] == 'Funcionario') && ($_SESSION['areaUser'] == 'Control' || $_SESSION['areaUser'] == 'Costos' || $_SESSION['areaUser'] == 'Produccion')) {
                            ?>
                                <li>
                                    <a href="<?php echo getUrl("PanelDeControl", "Company", "consultCompanies"); ?>">Gestionar Empresa</a>
                                </li>
                            <?php
                                }
                            ?>

                            <?php 
                                if (($_SESSION['rolUser'] == 'Administrador' || $_SESSION['rolUser'] == 'Funcionario') && ($_SESSION['areaUser'] == 'Control' || $_SESSION['areaUser'] == 'Inventario')) {
                            ?>
                                <li>
                                    <a href="<?php echo getUrl("PanelDeControl", "Tool", "consultTools"); ?>">Gestionar Herramienta</a>
                                </li>
                            <?php
                                }
                            ?>

                            <?php 
                                if (($_SESSION['rolUser'] == 'Administrador' || $_SESSION['rolUser'] == 'Funcionario') && ($_SESSION['areaUser'] == 'Control' || $_SESSION['areaUser'] == 'Inventario' || $_SESSION['areaUser'] == 'Mantenimiento')) {
                            ?>
                                <li>
                                    <a href="<?php echo getUrl("PanelDeControl", "Machine", "consultMachines"); ?>">Gestionar Maquina</a>
                                </li>
                            <?php
                                }
                            ?>

                            <?php 
                                if (($_SESSION['rolUser'] == 'Administrador' || $_SESSION['rolUser'] == 'Funcionario') && ($_SESSION['areaUser'] == 'Control' || $_SESSION['areaUser'] == 'Costos' || $_SESSION['areaUser'] == 'Inventario' || $_SESSION['areaUser'] == 'Mantenimiento' || $_SESSION['areaUser'] == 'Produccion') || ($_SESSION['rolUser'] == 'Funcionario') && ($_SESSION['areaUser'] == 'Costos')) {
                            ?>
                                <li>
                                    <a href="<?php echo getUrl("PanelDeControl", "User", "consultUsers"); ?>">Gestionar Usuario</a>
                                </li>
                            <?php
                                }
                            ?>

                            </ul>
                        </li>

                    <?php } ?>


                    <?php
                        if ($_SESSION['areaUser'] == 'Produccion' || $_SESSION['areaUser'] == 'Control' || $_SESSION['areaUser'] == 'Costos') {
                    ?>
                        <li>
                            <a>
                                <i class="fa fa-line-chart"></i> Produccion
                                <span class="fa fa-chevron-down"></span>
                            </a>
                            
                            <ul class="nav child_menu">
                            <?php
                                if (($_SESSION['rolUser'] == 'Administrador') && ($_SESSION['areaUser'] == 'Control' || $_SESSION['areaUser'] == 'Produccion' || $_SESSION['areaUser'] == 'Costos') || ($_SESSION['rolUser'] == 'Funcionario') && ($_SESSION['areaUser'] == 'Produccion' || $_SESSION['areaUser'] == 'Costos') || ($_SESSION['rolUser'] == 'Aprendiz') && ($_SESSION['areaUser'] == 'Produccion')){ 
                            ?>
                                <li><a href="<?php echo getUrl("Produccion", "Produccion", "getMain"); ?>">Orden Produccion</a></li>
                            <?php
                                }
                            ?>
                            <?php   
                                if (($_SESSION['rolUser'] == 'Aprendiz') && ($_SESSION['areaUser'] == 'Produccion' || $_SESSION['areaUser'] == 'Costos') || ($_SESSION['rolUser'] == 'Funcionario') && ($_SESSION['areaUser'] == 'Produccion' || $_SESSION['areaUser'] == 'Costos') || ($_SESSION['rolUser'] == 'Administrador') && ($_SESSION['areaUser'] == 'Produccion' || $_SESSION['areaUser'] == 'Control' || $_SESSION['areaUser'] == 'Costos' )
                                ) {  
                            ?>
                                <li><a href="<?php echo getUrl("Produccion", "Reporte", "getMainReporte"); ?>">Reporte produccion</a></li>
                            <?php
                                }
                            ?>
                            </ul>
                        </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>