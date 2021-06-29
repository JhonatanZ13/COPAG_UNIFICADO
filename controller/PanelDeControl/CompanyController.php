<?php

    include_once '../model/Cpanel/CompanyModel.php';

    class CompanyController{
        public function consultCompanies(){
            $obj=new CompanyModel();

            $sql="SELECT Emp_id,Emp_NIT, Emp_razonSocial, Dep_nombre, Mun_nombre, Tempr_descripcion, Est_id, Est_nombre FROM TblEmpresa natural join TblMunicipio natural join TblDepartamento natural join TblTipoEmpresa natural join TblEstado";

            $empresas=$obj->consult($sql);

            include_once '../view/Panel/Company/consultCompanies.php';
        }

        public function getInsert(){
            $obj=new CompanyModel();

            $sql="SELECT * from TblTipoEmpresa";
            $tempresa=$obj->consult($sql);

            $sql="SELECT * FROM TblDepartamento";
            $departamentos=$obj->consult($sql);

            $sql="SELECT * FROM TblSubTipogeneral WHERE Tge_id=0";
            $tipodocumento=$obj->consult($sql);

            include_once '../view/Panel/COmpany/insertCompany.php';
        }
 
        public function selectDinamico(){
            $obj=new CompanyModel();
            
            $id=$_POST['id'];

            $sql="SELECT * FROM TblMunicipio WHERE Dep_id=$id";
            $ciudad=$obj->consult($sql);

            foreach ($ciudad as $ciu) {
                echo "<option value='".$ciu['Mun_id']."'>".$ciu['Mun_nombre']."</option>";
            }
        }

        public function postInsert(){
            $obj=new CompanyModel();

            $id=$obj->autoIncrement("tblempresa","Emp_id");
            $Emp_razonSocial=$_POST['Emp_razonSocial'];
            $Emp_NIT=$_POST['Emp_NIT'];
            $Emp_email=$_POST['Emp_email'];
            $Emp_direccion=$_POST['Emp_direccion'];
            $Mun_id=$_POST['Mun_id'];
            $Emp_nombreContacto=$_POST['Emp_nombreContacto'];
            $Emp_apellidoContacto=$_POST['Emp_apellidoContacto'];
            $Stg_id=$_POST['Stg_id'];
            $Tempr_id=$_POST['Tempr_id'];
            $Emp_numeroDocumento=$_POST['Emp_numeroDocumento'];
            $Emp_primerNumeroContacto=$_POST['Emp_primerNumeroContacto'];
            $Emp_segundoNumeroContacto=$_POST['Emp_segundoNumeroContacto'];

            $sql="INSERT INTO tblempresa VALUE($id,'".$Emp_razonSocial."','".$Emp_NIT."','".$Emp_email."', '".$Emp_direccion."','".$Emp_nombreContacto."','".$Emp_apellidoContacto."', '".$Mun_id."','".$Emp_numeroDocumento."','".$Emp_primerNumeroContacto."', '".$Emp_segundoNumeroContacto."', 1,'".$Tempr_id."','".$Stg_id."')";

            $ejecutar=$obj->insert($sql);

            if($ejecutar){
                redirect(getUrl("PanelDeControl","Company","consultCompanies"));
            }else {
                echo "Ups ocurrio un error";
            }
        }

        public function getUpdate(){
            $obj=new CompanyModel();

            $Emp_id=$_GET['Emp_id'];

            $sql="SELECT Emp_id, Emp_razonSocial, Emp_NIT, Emp_email, Emp_direccion, Emp_nombreContacto, Emp_apellidoContacto, Mun_id, Emp_numeroDocumento, Emp_primerNumeroContacto, Emp_segundoNumeroContacto, Tempr_id, Stg_id, Stg_nombre, Mun_nombre, Dep_id, Dep_nombre, Stg_nombre, Tempr_descripcion, Est_id from TblEmpresa NATURAL JOIN TblSubTipoGeneral NATURAL JOIN TblMunicipio NATURAL JOIN TblDepartamento NATURAL JOIN TblTipoEmpresa natural join TblEstado WHERE Emp_id='$Emp_id'";
            $empresas=$obj->consult($sql);

            $sql="SELECT * from TblTipoEmpresa";
            $tempresa=$obj->consult($sql);

            $sql="SELECT * FROM tbldepartamento";
            $departamentos=$obj->consult($sql);

            $sql="SELECT * FROM tblmunicipio";
            $municipio=$obj->consult($sql);

            $sql="SELECT * FROM tblsubtipogeneral WHERE Tge_id=0";
            $tipodocumento=$obj->consult($sql);

            include_once '../view/Panel/Company/updateCompany.php';
        }

        public function postUpdate(){
            $obj=new CompanyModel();
            
            $Emp_id=$_POST['Emp_id'];
            $Emp_razonSocial=$_POST['Emp_razonSocial'];
            $Emp_NIT=$_POST['Emp_NIT'];
            $Emp_email=$_POST['Emp_email'];
            $Emp_direccion=$_POST['Emp_direccion'];
            $Mun_id=$_POST['Mun_id'];
            $Emp_nombreContacto=$_POST['Emp_nombreContacto'];
            $Emp_apellidoContacto=$_POST['Emp_apellidoContacto'];
            $Stg_id=$_POST['Stg_id'];
            $Tempr_id=$_POST['Tempr_id'];
            $Emp_numeroDocumento=$_POST['Emp_numeroDocumento'];
            $Emp_primerNumeroContacto=$_POST['Emp_primerNumeroContacto'];
            $Emp_segundoNumeroContacto=$_POST['Emp_segundoNumeroContacto'];

            $sql="UPDATE tblempresa SET Emp_razonSocial='$Emp_razonSocial', Emp_NIT='$Emp_NIT', Emp_email='$Emp_email', Emp_direccion='$Emp_direccion', Mun_id='$Mun_id', Emp_nombreContacto='$Emp_nombreContacto', Emp_apellidoContacto='$Emp_apellidoContacto', Stg_id='$Stg_id',Emp_numeroDocumento='$Emp_numeroDocumento', Emp_primerNumeroContacto='$Emp_primerNumeroContacto',Emp_segundoNumeroContacto='$Emp_segundoNumeroContacto', Tempr_id='$Tempr_id' WHERE Emp_id='$Emp_id'";

            $ejecutar=$obj->update($sql);

            if($ejecutar){
                redirect(getUrl("PanelDeControl","Company","consultCompanies"));
            }else {
                echo "Ups ocurrio un error";
            }           
        }

        public function postDelete(){
            $obj=new CompanyModel();

            $Emp_id=$_POST['Emp_id'];
            $Est_id=$_GET['Est_id'];

            if($Est_id==1){
                $sql="UPDATE TblEmpresa SET Est_id=0 WHERE Emp_id='$Emp_id'";
            }else {
                $sql="UPDATE TblEmpresa SET Est_id=1 WHERE Emp_id='$Emp_id'";
            }

            $ejecutar=$obj->update($sql);

            if($ejecutar){
                redirect(getUrl("PanelDeControl","Company","consultCompanies"));
            }else {
                echo "Ups ocurrio un error";
            }
        }

        public function viewCompany(){
            $obj=new CompanyModel();

            $Emp_id=$_GET['Emp_id'];

            $sql="SELECT Emp_id, Emp_razonSocial, Emp_NIT, Emp_email, Emp_direccion, Emp_nombreContacto,Emp_apellidoContacto, Mun_id, Emp_numeroDocumento, Emp_primerNumeroContacto, Emp_segundoNumeroContacto,Tempr_id, Est_id, Stg_id, Stg_nombre, Mun_nombre, Dep_id, Dep_nombre, Stg_nombre, Tempr_descripcion from tblempresa NATURAL JOIN tblsubtipogeneral NATURAL JOIN tblmunicipio NATURAL JOIN tbldepartamento NATURAL JOIN TblTipoEmpresa NATURAL JOIN TblEstado WHERE Emp_id='$Emp_id'";
            $empresas=$obj->consult($sql);
            
            include_once '../view/Panel/Company/viewCompany.php';
        }
    }


?>