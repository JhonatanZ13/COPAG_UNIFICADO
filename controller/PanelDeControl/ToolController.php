<?php
    include_once '../model/Cpanel/ToolModel.php';

    class ToolController{

        public function consultTools(){
            
            $obj = new ToolModel();

            $sql = "SELECT Her_id, Her_nombre, Est_id, Est_nombre, Stg_nombre FROM TblHerramienta natural join TblSubTipoGeneral natural join TblEstado";
            
            $tools = $obj->consult($sql);

            include_once '../view/Panel/Tool/consultTools.php';
        }
 
        public function getInsert(){

            $obj = new ToolModel();

            $sql_ther = "SELECT * FROM TblSubtipogeneral WHERE Tge_id=1";
            $tipoherramienta = $obj->consult($sql_ther);

            include_once '../view/Panel/Tool/insertTool.php';
        }

        public function postInsert(){
            $obj = new ToolModel();

            $Her_id = $obj->autoIncrement("Tblherramienta","Her_id");
            $Her_nombre = $_POST['Her_nombre'];
            $Stg_id = $_POST['Stg_id'];
            $Her_descripcion = $_POST['Her_descripcion'];
            $Her_cantidad = 1;
            $Est_id = 1;
            $Her_foto = $_FILES['Her_foto']['name'];
            $ruta = "../web/images/Herramienta/".$Her_foto;
            move_uploaded_file($_FILES['Her_foto']['tmp_name'],$ruta);

            // esta condicion es para que coloque una imagen por defecto en caso de no tenerla en el momento
            if (empty($$Her_foto)) {
                $ruta="../web/images/toolDefault.jpg";
            }

            $sql_insert_tools = "INSERT TblHerramienta VALUE($Her_id,'".$Her_nombre."','".$Her_descripcion."',$Her_cantidad,'".$ruta."', $Stg_id, $Est_id)";

            $execution = $obj->insert($sql_insert_tools);

            if($execution){
                redirect(getUrl("PanelDeControl","Tool","consultTools"));
            }else {
                echo "Ups ocurrio un error";
            }
        }

        public function getUpdate(){
            $obj = new ToolModel();
            extract($_GET);

            //Tge_id con valor de 1 es igual a los tipos de herramienta que existen en la base de datos
            $sql_ther = "SELECT * FROM TblSubtipogeneral WHERE Tge_id=1";
            $tipoherramienta = $obj->consult($sql_ther); 

            $sql = "SELECT Her_id, Her_nombre, Her_descripcion, Her_foto, Stg_id, Stg_nombre FROM TblHerramienta natural join TblSubTipoGeneral natural join TblEstado WHERE Her_id=$Her_id";
            
            $tools = $obj->consult($sql);

            include_once '../view/Panel/Tool/updateTool.php';

        }

        public function postUpdate(){
            $obj = new ToolModel();

            $Her_id = $_POST['Her_id'];
            $Stg_id = $_POST['Stg_id'];
            $Her_nombre = $_POST['Her_nombre'];
            $Her_descripcion = $_POST['Her_descripcion'];
            $Her_foto = $_FILES['Her_foto']['name'];
            $ruta = "../web/images/Herramienta/".$Her_foto;
            move_uploaded_file($_FILES['Her_foto']['tmp_name'],$ruta);
            $oldImage = $_POST['oldImage'];

            if($Her_foto){
                $sql_update_tools = "UPDATE TblHerramienta SET Her_nombre='$Her_nombre', Her_descripcion='$Her_descripcion', Stg_id='$Stg_id', Her_foto='$ruta' WHERE Her_id='$Her_id'";
                @unlink($oldImage);  
            }else {
                $sql_update_tools = "UPDATE TblHerramienta SET Her_nombre='$Her_nombre', Her_descripcion='$Her_descripcion', Stg_id='$Stg_id' WHERE Her_id='$Her_id'";
            }

            $execution = $obj->update($sql_update_tools);

            if($execution){
                redirect(getUrl("PanelDeControl","Tool","consultTools"));
            }else {
                echo "Ups ocurrio un error";
            }

        }

        public function postDelete(){
            $obj=new ToolModel();
            $Est_id=$_GET['Est_id'];
            extract($_POST);

            if($Est_id==1){
                $sql="UPDATE TblHerramienta SET Est_id=0 WHERE Her_id=$Her_id";
            }else {
                $sql="UPDATE TblHerramienta SET Est_id=1 WHERE Her_id=$Her_id";
            }

            $execution = $obj->delete($sql);

            if($execution){
                redirect(getUrl("PanelDeControl","Tool","consultTools"));
            }else {
                echo "Ups ocurrio un error";
            }
        }

        public function viewTool(){
            $obj = new ToolModel();

            extract($_GET);

            $sql = "SELECT th.Her_nombre, th.Her_descripcion, th.Her_foto, stg.Stg_nombre 
            FROM TblHerramienta AS th, TblSubTipoGeneral AS stg WHERE Her_id=$Her_id and th.Stg_id=stg.Stg_id ";

            $tools = $obj->consult($sql);

            include_once '../view/Panel/Tool/viewTool.php';

        }
    }

?>