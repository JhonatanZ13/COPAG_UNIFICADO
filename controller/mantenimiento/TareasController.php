<?php

require_once '../model/mantenimiento/TareasModel.php';

class TareasController
{
    //FUNCION PARA CONSULTAR DATOS INGRESADOS EN LA TABLA PROCESOS
    public function consult()
    {
        $obj = new TareasModel();
        $sql = "SELECT * FROM tbltarea";

        $Tareas = $obj->consult($sql);
        
        
        include_once '../view/Mantenimiento/Tareas/consult.php';
    }
      public function FormView()
      
      {

        $Tar_id = $_GET['Tar_id'];
        $obj = new TareasModel();
        $sql = "SELECT * FROM tbltarea where Tar_id=$Tar_id";
        $Tareas=$obj->consult($sql);
        $sql="SELECT * FROM tbltareaproceso where Tar_id=$Tar_id";
        $Tareaproceso=$obj->consult($sql);
        $sql = "SELECT * FROM tblproceso";
        $Procesos = $obj->consult($sql);
        $sql = "SELECT * FROM tblherramienta";
        $Herra = $obj->consult($sql);
        $sql="SELECT * FROM tbltareaherramienta where Tar_id=$Tar_id";
        $Tareaherramienta=$obj->consult($sql);
        include_once '../view/Mantenimiento/Tareas/FormView.php';





      }


    

       //FUNCION PARA CONSULTAR CAMPOS PARA INSERTAR DE LA TABLA TAREAS Y EXPLOSIONES
       public function FormInsert()
       {
   
           $obj = new TareasModel();
           $sql = "SELECT * FROM tbltarea";
           $Tareas = $obj->consult($sql);
           $sql = "SELECT * FROM tblproceso";
           $Procesos = $obj->consult($sql);
           $sql = "SELECT * FROM tblherramienta";
           $Herra = $obj->consult($sql);
           include_once '../view/Mantenimiento/Tareas/FormInsert.php';
       }

     //FUNCION FORM PARA INSERTAR DATOS EN LA TABLA TAREAS Y EXPLOSIONES

     public function InsertForm()
     {
         $obj = new TareasModel();
         $id = $obj->autoIncrement("tbltarea", "Tar_id");
         $Tar_nombre = $_POST['Tar_nombre'];
         $Tar_descripcion = $_POST['Tar_descripcion'];
         $Procesos=$_POST['Procesos'];
         $Herramientas=$_POST['Herramientas'];
 
         $sql = "INSERT INTO tbltarea VALUES ($id,'" . $Tar_nombre . "','" . $Tar_descripcion . "')";
         $ejecutar = $obj->insert($sql);
         
         if ($ejecutar ==true) {
             
            
            for($i=0;$i<count($Procesos);$i++){
            
                $idtpr=$obj->autoIncrement("tbltareaproceso","Tpr_id");
                $sqltpr="INSERT INTO tbltareaproceso VALUES ($idtpr,$Procesos[$i],$id)";
                $ejecutartareaproceso=$obj->insert($sqltpr);

                
               
            }
           
        } if($ejecutartareaproceso == true){
            for($j=0;$j<count($Herramientas);$j++){
            
                $idthe=$obj->autoIncrement("tbltareaherramienta","The_id");
                $sqlthe="INSERT INTO tbltareaherramienta VALUES ($idthe,$id,$Herramientas[$j])";
                $ejecutartareaherramienta=$obj->insert($sqlthe);

                
               
            }
            
        }if($ejecutartareaherramienta){
            redirect(getUrl("Mantenimiento","Tareas","consult"));

        }

        
    }  

    public function FormUpdate()
    {
        $Tar_id = $_GET['Tar_id'];
        $obj = new TareasModel();
        $sql = "SELECT * FROM tbltarea where Tar_id=$Tar_id";
        $Tareas=$obj->consult($sql);
        $sql="SELECT * FROM tbltareaproceso where Tar_id=$Tar_id";
        $Tareaproceso=$obj->consult($sql);
        $sql = "SELECT * FROM tblproceso";
        $Procesos = $obj->consult($sql);
        $sql = "SELECT * FROM tblherramienta";
        $Herra = $obj->consult($sql);
        $sql="SELECT * FROM tbltareaherramienta where Tar_id=$Tar_id";
        $Tareaherramienta=$obj->consult($sql);

        //$sql="SELECT TT.Tar_id,TP.Pro_id,TP.Tar_nombre,TTP.Pro_id,TTP.Tar_id FROM tbltarea as TT, tblproceso as TP,tbltareaproceso as TTP where TT.Tar_id=TTP.Tar_id;
        include_once '../view/Mantenimiento/Tareas/FormUpdate.php';
        


    }


    public function UpdateForm()

    {
        $obj = new TareasModel();
        $Tar_id=$_POST['Tar_id'];
        $Tar_nombre=$_POST['Tar_nombre'];
        $Tar_descripcion=$_POST['Tar_descripcion'];
        $Procesos=$_POST['Procesos'];
        $Herramientas=$_POST['Herramientas'];
        $sql = "UPDATE tbltarea SET Tar_nombre ='" . $Tar_nombre . "',Tar_descripcion='" . $Tar_descripcion . "' WHERE Tar_id = $Tar_id";
        $ejecutar=$obj->delete($sql);

       
             
        $sql="DELETE FROM tbltareaproceso WHERE Tar_id=$Tar_id ";
        $ejecutartareaproceso=$obj->delete($sql);
        $sql = "DELETE FROM tbltareaherramienta WHERE Tar_id=$Tar_id";
        $ejecutartareaherramienta = $obj->delete($sql);
        if($ejecutar==true){
            for($i=0;$i<count($Procesos);$i++){
            
                $idtpr=$obj->autoIncrement("tbltareaproceso","Tpr_id");
                $sqltpr="INSERT INTO tbltareaproceso VALUES ($idtpr,$Procesos[$i],$Tar_id)";
                $ejecutartareaproceso=$obj->insert($sqltpr);
                }
           
         
            for($j=0;$j<count($Herramientas);$j++){
            
                $idthe=$obj->autoIncrement("tbltareaherramienta","The_id");
                $sqlthe="INSERT INTO tbltareaherramienta VALUES ($idthe,$Tar_id,$Herramientas[$j])";
                $ejecutartareaherramienta=$obj->insert($sqlthe);
            }
        }if($ejecutar==true) {

            redirect(getUrl("Mantenimiento", "Tareas", "consult"));
            
            
            
        }
           

            

           
            

        

    }

  Public function ModalDelete()
    {

        $Tar_id = $_POST['Tar_id'];
        $obj = new TareasModel();
        $sql = "SELECT * FROM tbltarea where Tar_id=$Tar_id";
        $Tareas=$obj->consult($sql);
  
   
       // include_once '../view/Mantenimiento/Tareas/ModalDelete.php';

    }



    
    public function DeleteModal()
    {

        
        $obj = new TareasModel();
        $Tar_id=$_POST['Tar_id'];
        //$idtpr=$_POST['Tpr_id'];
        $sqltpr="DELETE FROM tbltareaproceso WHERE Tar_id=$Tar_id ";
        $ejecutartareaproceso=$obj->delete($sqltpr);
        echo $sqltpr;

       

        if ($ejecutartareaproceso==true) {

            $sql = "DELETE FROM tbltareaherramienta WHERE Tar_id=$Tar_id";
            $ejecutar = $obj->delete($sql);
            echo $sql;
       } if($ejecutar==true){

        $sql = "DELETE FROM tbltarea WHERE Tar_id=$Tar_id";
        $ejecutar = $obj->delete($sql);

        echo $sql;

         }if($ejecutar==true) {
  
            
            

           // redirect(getUrl("Mantenimiento", "Tareas", "consult"));
            
            
            
        }
    }
  
}