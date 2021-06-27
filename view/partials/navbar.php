<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle" class="menu"><i class="fa fa-bars text-white" class="menu"></i></a>
        </div>

        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open " style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle " aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <?php 
                        include_once '../controller/Access/AccessController.php';

                        if($_SESSION['rolUser']=='Administrador'){
                            $rolFoto=$manager;
                        }elseif ($_SESSION['rolUser']=='Funcionario') {
                            $rolFoto=$functionary;
                        }elseif ($_SESSION['rolUser']=='Aprendiz') {
                            $rolFoto=$learner;
                        } 
                    ?>
                        <img src="<?= $rolFoto?>" id="imagenCircular" class="img-circle bg-white" alt="">
                        <span class="text-white"><?= $_SESSION['nameUser']." ".$_SESSION['surnameUser']?></span>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" style="color:white;" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= getUrl("PanelDeControl","User","getProfile", array('Usu_id' => $_SESSION['idUser']));?>">Perfil</a>
                        <a class="dropdown-item" href="<?= getUrl("Access","Access","logOut")?>"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesion</a>
                    </div>
                </li>  
            </ul>
        </nav>
    </div>
</div>