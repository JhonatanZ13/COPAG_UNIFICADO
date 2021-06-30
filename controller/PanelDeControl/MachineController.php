<?php
     
    include_once '../model/Cpanel/MachineModel.php';

    class MachineController{
        public function consultMachines(){
            $obj=new MachineModel();
            $sql="SELECT Maq_id, Maq_nombre, Maq_serial, Stg_id, Stg_nombre,
                  Est_id, Est_nombre FROM tblmaquina NATURAL JOIN tblsubtipogeneral natural join TblEstado";
            
            $maquinas=$obj->consult($sql);

            include_once '../view/Panel/Machine/consultMachines.php';
        }

        public function getInsert(){
            $obj=new MachineModel();

            $sql="SELECT * from tblsubtipogeneral WHERE Tge_id=2";
            $tmaquina=$obj->consult($sql);

            include_once '../view/Panel/Machine/insertMachine.php';
        }
 
        public function postInsert(){
            $obj=new MachineModel();

            $id=$obj->autoIncrement("tblmaquina","Maq_id");
            $Maq_nombre=$_POST['Maq_nombre'];
            $Stg_id =$_POST['Stg_id'];
            $Maq_serial=$_POST['Maq_serial'];
            $Maq_imagen =$_FILES['Maq_imagen']['name'];
            $Maq_fichaTecnica=$_FILES['Maq_fichaTecnica']['name'];
            $Maq_manual=$_FILES['Maq_manual']['name'];
            $ruta="../web/images/Maquina/".$Maq_imagen;
            $rutaficha="../web/images/Maquina/Ficha/".$Maq_fichaTecnica;
            $rutamanual="../web/images/Maquina/Manual/".$Maq_manual;
            move_uploaded_file($_FILES['Maq_imagen']['tmp_name'],$ruta);
            move_uploaded_file($_FILES['Maq_fichaTecnica']['tmp_name'],$rutaficha);
            move_uploaded_file($_FILES['Maq_manual']['tmp_name'],$rutamanual);
            $Maq_descripcion=$_POST['Maq_descripcion'];

            if (empty($Maq_imagen)) {
                $ruta="../web/images/maquinaPredeterminada.jpg";
            }
            if (empty($Maq_fichaTecnica)) {
                $rutaficha="../web/images/Maquina/Ficha/";
            }
            if (empty($Maq_manual)) {
                $rutamanual="../web/images/Maquina/Manual/";
            }

            $sql="INSERT INTO TblMaquina VALUE($id,'".$Maq_nombre."', '".$Maq_serial."', '".$Maq_descripcion."', '".$ruta."', 1,1,'".$Stg_id."','".$rutaficha."','".$rutamanual."')";
            $ejecutar=$obj->insert($sql);

            if($ejecutar){
                redirect(getUrl("PanelDeControl","Machine","consultMachines"));
            }else {
                echo "Ups ocurrio un error";
            }
        }

        public function getUpdate(){
            $obj=new MachineModel();

            $Maq_id=$_GET['Maq_id'];

            $sql="SELECT Maq_id, Maq_nombre, Stg_id, Stg_nombre, Maq_serial, Maq_fichaTecnica, Maq_manual, Maq_imagen, Maq_descripcion FROM tblmaquina natural join tblsubtipogeneral WHERE Maq_id=$Maq_id";

            $maquina=$obj->consult($sql);

            $sql="SELECT * from tblsubtipogeneral WHERE Tge_id=2";
            $tmaquina=$obj->consult($sql);

            include_once '../view/Panel/Machine/updateMachine.php';
        }
 
        public function postUpdate(){
            $obj=new MachineModel();

            $Maq_id=$_POST['Maq_id'];
            $Maq_nombre=$_POST['Maq_nombre'];
            $Stg_id =$_POST['Stg_id'];
            $Maq_serial=$_POST['Maq_serial'];
            $Maq_imagen =$_FILES['Maq_imagen']['name'];
            $Maq_fichaTecnica=$_FILES['Maq_fichaTecnica']['name'];
            $Maq_manual=$_FILES['Maq_manual']['name'];
            $ruta="../web/images/Maquina/".$Maq_imagen;
            $rutaficha="../web/images/Maquina/Ficha/".$Maq_fichaTecnica;
            $rutamanual="../web/images/Maquina/Manual/".$Maq_manual;
            move_uploaded_file($_FILES['Maq_imagen']['tmp_name'],$ruta);
            move_uploaded_file($_FILES['Maq_fichaTecnica']['tmp_name'],$rutaficha);
            move_uploaded_file($_FILES['Maq_manual']['tmp_name'],$rutamanual);
            $Maq_descripcion=$_POST['Maq_descripcion'];
            $imagenVieja=$_POST['imagenVieja'];
            $fichaVieja=$_POST['fichaVieja'];
            $manualViejo=$_POST['manualViejo'];


            if($Maq_imagen){
                $sql="UPDATE tblmaquina SET Maq_imagen='".$ruta."'
                      WHERE Maq_id=$Maq_id";
                @unlink($imagenVieja);
                $ejecutar=$obj->insert($sql);  
            }
            if($Maq_fichaTecnica){
                $sql="UPDATE tblmaquina SET Maq_fichaTecnica='$rutaficha'
                      WHERE Maq_id=$Maq_id";
                @unlink($fichaVieja);
                $ejecutar=$obj->insert($sql);
            }
            if($Maq_manual){
                $sql="UPDATE tblmaquina SET Maq_manual='$rutamanual'
                      WHERE Maq_id=$Maq_id";
                @unlink($manualViejo);
                $ejecutar=$obj->insert($sql);
            }

            $sql="UPDATE tblmaquina SET Maq_nombre='$Maq_nombre', Maq_serial='$Maq_serial',
                  Maq_descripcion='$Maq_descripcion', Stg_id=$Stg_id
                  WHERE Maq_id=$Maq_id";

            $ejecutar=$obj->insert($sql);

            if($ejecutar){
                redirect(getUrl("PanelDeControl","Machine","consultMachines"));
            }else {
                echo "Ups ocurrio un error ";
    
            }      
        }

        public function postDelete(){
            $obj=new MachineModel();

            $Maq_id=$_POST['Maq_id'];
            $Est_id=$_GET['Est_id'];


                if($Est_id==1){
                    $sql="UPDATE tblmaquina SET Est_id=0 WHERE Maq_id='$Maq_id'";
                }else {
                    $sql="UPDATE tblmaquina SET Est_id=1 WHERE Maq_id='$Maq_id'";
                }

                $ejecutar=$obj->insert($sql);

                if($ejecutar){
                    redirect(getUrl("PanelDeControl","Machine","consultMachines"));
                }else {
                    echo "Ups ocurrio un error ";
                }
            
        }

        public function viewMachine(){
            $obj=new MachineModel();

            $Maq_id=$_GET['Maq_id'];

            $sql="SELECT Maq_id, Maq_nombre, Stg_id, Stg_nombre, Maq_serial, Maq_imagen, Maq_descripcion, Maq_fichaTecnica, Maq_manual FROM tblmaquina natural join tblsubtipogeneral WHERE Maq_id=$Maq_id";

            $maquina=$obj->consult($sql);

            $sql="SELECT * from tblsubtipogeneral WHERE Tge_id=2";
            $tmaquina=$obj->consult($sql);

            include_once '../view/Panel/Machine/viewMachine.php';
        }

        public function viewPdfFicha(){
            $obj=new MachineModel();
            $Maq_fichaTecnica=$_GET['Maq_fichaTecnica'];
  
            header("Content-type:application/pdf");
            header("Content-Disposition: inline; filename=fichaTecnica.pdf");
            readfile("$Maq_fichaTecnica");
        }
        
        public function viewPdfManual(){
            $obj=new MachineModel();
            $Maq_manual=$_GET['Maq_manual'];
  
            header("Content-type:application/pdf");
            header("Content-Disposition: inline; filename=Manual.pdf");
            readfile("$Maq_manual");
        }
    }
?>