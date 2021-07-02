<?php
include_once '../model/Cpanel/UserModel.php';


class UserController
{

    public function consultUsers()
    {

        $obj = new UserModel();

        $sql = "SELECT tu.Usu_id,  tu.Usu_primerNombre,  tu.Usu_segundoNombre,  tu.Usu_primerApellido,  tu.Usu_segundoApellido,  tu.Usu_numeroDocumento,  tu.Usu_telefono, tr.Rol_nombre, te.Est_id, te.Est_nombre FROM TblUsuario AS tu, TblRol AS tr, TblEstado AS te WHERE tr.Rol_id=tu.Rol_id AND te.Est_id=tu.Est_id";

        $usuarios = $obj->consult($sql);

        include_once '../view/Panel/User/consultUsers.php';
    }

    public function getInsert()
    {
        $obj = new UserModel();

        $sql_rol = "SELECT * FROM TblRol ORDER BY (Rol_nombre)";
        $roles = $obj->consult($sql_rol);

        $sql_tdoc = "SELECT * FROM TblSubtipogeneral WHERE Tge_id='0' ORDER BY (Stg_nombre)";
        $tipodocumento = $obj->consult($sql_tdoc);

        $sql_gen = "SELECT * FROM TblGenero ORDER BY (Gen_descripcion)";
        $genero = $obj->consult($sql_gen);

        $sql = "SELECT * FROM TblArea ORDER BY (Area_nombre)";
        $areas = $obj->consult($sql);

        include_once '../view/Panel/User/insertUser.php';
    }

    public function postInsert()
    {
        $obj = new UserModel();

        $Usu_id = $obj->autoIncrement("TblUsuario", "Usu_id");
        $Usu_primerNombre = $_POST['Usu_primerNombre'];
        $Usu_segundoNombre = $_POST['Usu_segundoNombre'];
        $Usu_primerApellido = $_POST['Usu_primerApellido'];
        $Usu_segundoApellido = $_POST['Usu_segundoApellido'];
        $Stg_id = $_POST['Stg_id'];
        $Usu_numeroDocumento = $_POST['Usu_numeroDocumento'];
        $Usu_telefono = $_POST['Usu_telefono'];
        $Gen_id = $_POST['Gen_id'];
        $Usu_email = $_POST['Usu_email'];
        $Usu_password = $_POST['Usu_numeroDocumento'];
        $Rol_id = $_POST['Rol_id'];
        $Est_id = 1;
        $Area_id = $_POST['Area_id'];

        $sql_insert = "INSERT INTO TblUsuario VALUES($Usu_id, '" . $Usu_primerNombre . "','" . $Usu_segundoNombre . "','" . $Usu_primerApellido . "','" . $Usu_segundoApellido . "','" . $Stg_id . "','" . $Usu_numeroDocumento . "','" . $Usu_telefono . "','" . $Usu_email . "','" . $Usu_password . "','" . $Rol_id . "','" . $Gen_id . "' , '$Est_id', '$Area_id', '" . $Usu_numeroDocumento . "')";

        $execution = $obj->insert($sql_insert);

        if ($execution) {
            redirect(getUrl("PanelDeControl", "User", "consultUsers"));
        } else {
            echo "Ups ocurrio un error";
        }
    }

    public function getUpdate()
    {

        $obj = new UserModel();

        $sql_rol = "SELECT * FROM TblRol";
        $roles = $obj->consult($sql_rol);

        $sql_tdoc = "SELECT * FROM TblSubtipogeneral WHERE Tge_id='0' ORDER BY (Stg_nombre)";
        $tipodocumento = $obj->consult($sql_tdoc);

        $sql_gen = "SELECT * FROM TblGenero";
        $genero = $obj->consult($sql_gen);

        $sql = "SELECT * FROM TblArea";
        $areas = $obj->consult($sql);

        $Usu_id = $_GET['Usu_id'];

        $sql = "SELECT Usu_id, Usu_primerNombre, Usu_segundoNombre, Usu_primerApellido, Usu_segundoApellido, Usu_numeroDocumento, Usu_telefono, rol_id, Est_id, Stg_id, Gen_id, Usu_email, Usu_password, Area_id FROM tblusuario natural join tblarea natural join tblrol natural join tblestado 
            WHERE Usu_id='" . $Usu_id . "'";

        $usuarios = $obj->consult($sql);

        include_once '../view/Panel/User/updateUser.php';
    }

    public function postUpdate()
    {
        $obj = new UserModel();

        $Usu_id = $_POST['Usu_id'];
        $Usu_primerNombre = $_POST['Usu_primerNombre'];
        $Usu_segundoNombre = $_POST['Usu_segundoNombre'];
        $Usu_primerApellido = $_POST['Usu_primerApellido'];
        $Usu_segundoApellido = $_POST['Usu_segundoApellido'];
        $Usu_numeroDocumento = $_POST['Usu_numeroDocumento'];
        $Usu_telefono = $_POST['Usu_telefono'];
        $Gen_id = $_POST['Gen_id'];
        $Usu_email = $_POST['Usu_email'];
        $Rol_id = $_POST['Rol_id'];
        $Area_id = $_POST['Area_id'];

        if ($_SESSION['idUser'] != $Usu_id) {

            $sql = "UPDATE TblUsuario SET Usu_id=$Usu_id, Usu_primerNombre='$Usu_primerNombre', Usu_segundoNombre='$Usu_segundoNombre', Usu_primerApellido='$Usu_primerApellido', Usu_segundoApellido='$Usu_segundoApellido', Usu_numeroDocumento='$Usu_numeroDocumento', Usu_telefono='$Usu_telefono', Gen_id=$Gen_id, Usu_email='$Usu_email', Rol_id=$Rol_id, Area_id='$Area_id' WHERE Usu_id=$Usu_id";

            $execution = $obj->update($sql);
        } else {
            // esta session cambia las variables de sesion cuando se modifica algo de ellas
            $_SESSION['nameUser'] = $Usu_primerNombre = $_POST['Usu_primerNombre'];
            $_SESSION['surnameUser'] = $Usu_primerApellido = $_POST['Usu_primerApellido'];

            $sql_rol = "SELECT * FROM TblRol WHERE Rol_id=$Rol_id";
            $roles = $obj->consult($sql_rol);

            foreach ($roles as $rol) {
                $_SESSION['rolUser'] = $rol['Rol_nombre'];
            }

            $sql_rol = "SELECT * FROM TblArea WHERE Area_id=$Area_id";
            $areas = $obj->consult($sql_rol);

            foreach ($areas as $area) {
                $_SESSION['areaUser'] = $area['Area_nombre'];
            }
            // fin de la parte variables de sesion

            $sql = "UPDATE TblUsuario SET Usu_id=$Usu_id, Usu_primerNombre='$Usu_primerNombre', Usu_segundoNombre='$Usu_segundoNombre', Usu_primerApellido='$Usu_primerApellido', Usu_segundoApellido='$Usu_segundoApellido', Usu_numeroDocumento='$Usu_numeroDocumento', Usu_telefono='$Usu_telefono', Gen_id=$Gen_id, Usu_email='$Usu_email', Rol_id=$Rol_id, Area_id='$Area_id' WHERE Usu_id=$Usu_id";
            $execution = $obj->update($sql);
        }

        if ($execution) {
            redirect(getUrl("PanelDeControl", "User", "consultUsers"));
        } else {
            echo "Ups ocurrio un error";
        }
    }

    public function postDelete()
    {
        $obj = new UserModel();

        $Est_id = $_GET['Est_id'];
        extract($_POST);

        if ($Est_id == 1) {
            $sql = "UPDATE TblUsuario SET Est_id=0 WHERE Usu_id=$Usu_id";
        } else {
            $sql = "UPDATE TblUsuario SET Est_id=1 WHERE Usu_id=$Usu_id";
        }

        $execution = $obj->delete($sql);

        if ($execution) {
            echo '<div class="alert alert-success alert-dismissible" role="alert">registrado <a href="#" class="alert-link">registrado
              </div>';
            redirect(getUrl("PanelDeControl", "User", "consultUsers"));
        } else {
            echo "Ups ocurrio un error";
        }
    }

    public function viewUser()
    {

        $obj = new UserModel();

        $Usu_id = $_GET['Usu_id'];

        $sql = "SELECT Usu_id, Usu_primerNombre, Usu_segundoNombre, Usu_primerApellido, Usu_segundoApellido, Usu_numeroDocumento, Usu_telefono, Rol_nombre, Est_nombre, Stg_nombre, Gen_descripcion, Usu_email, Area_nombre
            FROM tblusuario natural join tblrol natural join tblestado natural join TblSubTipoGeneral natural join TblGenero natural join TblArea
            WHERE Usu_id=$Usu_id";

        $usuarios = $obj->consult($sql);

        include_once '../view/Panel/User/viewUser.php';
    }

    public function getProfile()
    {
        $obj = new UserModel();

        $sql_rol = "SELECT * FROM TblRol";
        $roles = $obj->consult($sql_rol);

        $sql_tdoc = "SELECT * FROM TblSubtipogeneral WHERE Tge_id='0' ORDER BY (Stg_nombre)";
        $tipodocumento = $obj->consult($sql_tdoc);

        $sql_gen = "SELECT * FROM TblGenero";
        $genero = $obj->consult($sql_gen);

        $sql = "SELECT * FROM TblArea";
        $areas = $obj->consult($sql);

        $Usu_id = $_GET['Usu_id'];

        $sql = "SELECT Usu_id, Usu_primerNombre, Usu_segundoNombre, Usu_primerApellido, Usu_segundoApellido, Usu_numeroDocumento, Usu_telefono, rol_id, Est_id, Stg_id, Stg_nombre, Gen_id, Usu_email, Usu_password, Area_id FROM tblusuario natural join tblarea natural join tblrol natural join tblestado natural join TblSubTipoGeneral
            WHERE Usu_id='" . $Usu_id . "'";

        $usuarios = $obj->consult($sql);

        include_once '../Controller/Access/AccessController.php';

        $manager = "../web/images/manager.png";
        $functionary = "../web/images/functionary.png";
        $learner = "../web/images/learner.png";

        include_once '../view/Panel/User/profileUser.php';
    }

    public function postProfile()
    {
        $obj = new UserModel();

        $Usu_id = $_POST['Usu_id'];
        $Usu_primerNombre = $_POST['Usu_primerNombre'];
        $Usu_segundoNombre = $_POST['Usu_segundoNombre'];
        $Usu_primerApellido = $_POST['Usu_primerApellido'];
        $Usu_segundoApellido = $_POST['Usu_segundoApellido'];
        $Usu_password = $_POST['Usu_password'];
        $Usu_telefono = $_POST['Usu_telefono'];
        $Gen_id = $_POST['Gen_id'];

        if (!empty($Usu_password)) {
            $_SESSION['nameUser'] = $Usu_primerNombre = $_POST['Usu_primerNombre'];
            $_SESSION['surnameUser'] = $Usu_primerApellido = $_POST['Usu_primerApellido'];

            $sql = "UPDATE TblUsuario SET Usu_id=$Usu_id, Usu_primerNombre='$Usu_primerNombre', Usu_segundoNombre='$Usu_segundoNombre', Usu_primerApellido='$Usu_primerApellido', Usu_segundoApellido='$Usu_segundoApellido', Usu_telefono='$Usu_telefono', Gen_id=$Gen_id, Usu_password='$Usu_password' WHERE Usu_id=$Usu_id";

            $execution = $obj->update($sql);
        }else {
            $_SESSION['nameUser'] = $Usu_primerNombre = $_POST['Usu_primerNombre'];
            $_SESSION['surnameUser'] = $Usu_primerApellido = $_POST['Usu_primerApellido'];

            $sql = "UPDATE TblUsuario SET Usu_id=$Usu_id, Usu_primerNombre='$Usu_primerNombre', Usu_segundoNombre='$Usu_segundoNombre', Usu_primerApellido='$Usu_primerApellido', Usu_segundoApellido='$Usu_segundoApellido', Usu_telefono='$Usu_telefono', Gen_id=$Gen_id WHERE Usu_id=$Usu_id";

            $execution = $obj->update($sql);
        }

        if ($execution) {
            redirect('index.php');
        } else {
            echo "Ups ocurrio un error";
        }
    }

    public function getIndex()
    {
        redirect('index.php');
    }
}
