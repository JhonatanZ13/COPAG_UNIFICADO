<?php

    $manager = "../web/images/manager.png";
    $functionary = "../web/images/functionary.png";
    $learner = "../web/images/learner.png";
    
    include_once '../model/Access/AccessModel.php';

    class AccessController{
        public function login(){

            $obj=new AccessModel();

            $Usu_email=$_POST['Usu_email'];
            $Usu_password=$_POST['Usu_password'];
 
            $sqlUser="SELECT Usu_id, Usu_primerNombre, Usu_primerApellido, Area_nombre, Rol_nombre, Usu_email, Usu_password FROM TblUsuario, TblRol, TblArea WHERE TblUsuario.Rol_id=TblRol.Rol_id AND TblArea.Area_id=TblUsuario.Area_id AND Usu_email='".$Usu_email."' AND Usu_password='".$Usu_password."' ";

            $usuario=$obj->consult($sqlUser);

            if(mysqli_num_rows($usuario)>0){
                foreach ($usuario as $user) {
                    $_SESSION['nameUser']=$user['Usu_primerNombre'];
                    $_SESSION['surnameUser']=$user['Usu_primerApellido'];
                    $_SESSION['rolUser']=$user['Rol_nombre'];
                    $_SESSION['idUser']=$user['Usu_id'];
                    $_SESSION['areaUser']=$user['Area_nombre'];
                    $_SESSION['auth']="ok";

                }
                redirect("index.php");
            }else {
                redirect('login.php');
            }
        }

        public function logOut(){
            session_destroy();
            redirect('login.php');
        }

    }
