<?php

require_once '../model/mantenimiento/OrdenModel.php';

class OrdenController
{
 //ESTA FUNCION SE UTILIZARA PARA CONSULTAR LOS DATOS QUE SON FK EN LA TABLA tblordenmanto
    public function consult()
    {
        $obj=new OrdenModel();
        $sql = "SELECT * FROM tblusuario where Rol_id=1 ";
        $Usuario = $obj->consult($sql);
        $sql = "SELECT * FROM tblmaquina";
        $Maquina = $obj->consult($sql);
        $sql = "SELECT * FROM tblempresa where Tempr_id=6";
        $Empresa = $obj->consult($sql);
        $sql = "SELECT * FROM tblsubtipogeneral where Tge_id=6";
        $Manto = $obj->consult($sql);
        $sql = "SELECT * FROM tbltarea";
        $tareas = $obj->consult($sql);

        $sql = "SELECT * FROM tblarticulo where Tart_id=2";
        $Articulo = $obj->consult($sql);
        
    include_once '../view/Mantenimiento/orden/consult.php';
        
    }
//controller dinamico de procesos  
public function procesosdinamicos(){
  $obj=new OrdenModel();
  $id_tareas=json_decode(stripslashes($_POST['data']));
  $seleccionados=array();
  $yaesta=array();
  $sql="SELECT Pro_id FROM tblproceso";
  $ejecutarsql=$obj->consult($sql);
  //todo los procesos que hay
  foreach($ejecutarsql as $ejecu){
    array_push($seleccionados,$ejecu["Pro_id"]);
    array_push($yaesta,0);
  }
  //todos los seleccionados
  foreach($id_tareas as $id_tarea){
  $sql="SELECT * FROM tbltareaproceso AS TTP,tblproceso AS TP WHERE  TTP.Tar_id=$id_tarea AND TTP.Pro_id=TP.Pro_id";
  $procesosbox=$obj->consult($sql);
  //los que estan en la tabla relaccionados
  foreach($procesosbox as $pro){
    //evaluando que no este repetido
    for($i=0; $i<count($seleccionados);$i++){
      if($seleccionados[$i]==$pro["Pro_id"] && $yaesta[$i]==0){
        $yaesta[$i]=1;
        echo "<div class='col-md-3'><input name='Pro_id[]' type='checkbox' value='".$pro['Pro_id']."' checked><label>".$pro['Pro_nombre']."</label></div>";
      }
    }

    
  }
}
}  
//controler dinamico de herramientas
public function herramientasdinamicas(){
  $obj=new OrdenModel();
  $id_tareas=json_decode(stripslashes($_POST['data']));
  $seleccionados=array();
  $yaesta=array();
  $sql="SELECT Her_id FROM tblherramienta";
  $ejecutarsql=$obj->consult($sql);
  //todo las herramientas que hay
  foreach($ejecutarsql as $ejecu){
    array_push($seleccionados,$ejecu["Her_id"]);
    array_push($yaesta,0);
  }
  //todos los seleccionados
  foreach($id_tareas as $id_tarea){
  $sql="SELECT * FROM tbltareaherramienta AS TTH,tblherramienta AS TH WHERE  TTH.Tar_id=$id_tarea AND TTH.Her_id=TH.Her_id";
  $herramientasbox=$obj->consult($sql);
  //los que estan en la tabla relaccionados
  foreach($herramientasbox as $herr){
    //evaluando que no este repetido
    for($i=0; $i<count($seleccionados);$i++){
      if($seleccionados[$i]==$herr["Her_id"] && $yaesta[$i]==0){
        $yaesta[$i]=1;
        echo "<div class='col-md-3'><input name='Her_id[]' type='checkbox' value='".$herr['Her_id']."' checked><label>".$herr['Her_nombre']."</label></div>";
      }
    }

    
  }
} 
}

 public function postInsert()
   {
     $obj=new OrdenModel();
     $id=$obj->autoIncrement("tblOrdenmanto","Odm_id");
     $Fecha_Inicio=$_POST['Odm_fechaInicio'];
     $Fecha_Fin=$_POST['Odm_fechaFin'];
     $Hora_Inicio=$_POST['Odm_horainicio'];
     $Hora_Fin=$_POST['Odm_horaFin'];
     $Odm_tecnico=$_POST['Odm_tecnico'];
     $Odm_observaciones=$_POST['Odm_observaciones'];
     $Odm_observacionesFin=$_POST['Odm_observacionesFin'];
     $Stg_id=$_POST['Stg_id'];
     $Maq_id=$_POST['Maq_id'];
     if(isset($_POST['Emp_id'])){
      $Emp_id=$_POST['Emp_id'];
      }else{
        $Emp_id="NULL";
      }
      if(isset($_FILES['Odm_pdf'])){
        $nombrefinal=$_FILES['Odm_pdf']['name'];
        $ruta="../web/pdf/".$nombrefinal;
        move_uploaded_file($_FILES["Odm_pdf"]["tmp_name"],$ruta);
        $Odm_pdf=$ruta;
        }else{
          $Odm_pdf="NULL";
        }
     $Usu_id=$_POST['Usu_id'];

     $pro=$_POST['Pro_id'];

     $tar_id=$_POST['Tar_id'];

     $herr=$_POST['Her_id'];

     $Arti_id=$_POST['Arti_id'];

     $sql="INSERT INTO tblordenmanto(Odm_id,Odm_fechaInicio,Odm_fechaFin,Odm_horainicio,Odm_horaFin,Odm_tecnico,Odm_Observaciones,Odm_ObservacionesFin,Stg_id,Maq_id,Emp_id,Usu_id,Odm_pdf) 
     VALUES($id,'".$Fecha_Inicio."','".$Fecha_Fin."','".$Hora_Inicio."','".$Hora_Fin."','".$Odm_tecnico."','". $Odm_observaciones."','".$Odm_observacionesFin."','". $Stg_id."','".$Maq_id."',$Emp_id,'".$Usu_id."','$Odm_pdf')";

    
    
     $ejecutar=$obj->insert($sql);
     //echo $sql."<br>";
  
  
      for($i=0;$i<count($pro);$i++){
        $Odmde_id=$obj->autoIncrement("tblordenmantodetalle","Odmde_id");
        $sqlfk="INSERT INTO tblordenmantodetalle (Odmde_id,Odm_id,Pro_id) VALUES ($Odmde_id,'".$id."','".$pro[$i]."')";
        $ejecutardetalle=$obj->insert($sqlfk);
        //echo $sqlfk."<br>";
      }
      for($i=0;$i<count($tar_id);$i++){
         $Odmde_id=$obj->autoIncrement("tblordenmantodetalle","Odmde_id");
         $sqlfk="INSERT INTO tblordenmantodetalle (Odmde_id,Odm_id,Tar_id) VALUES ($Odmde_id,'". $id. "' ,'".$tar_id[$i]."')";
         $ejecutardetalle=$obj->insert($sqlfk);
         //echo $sqlfk."<br>";
       }
       for($i=0;$i<count($herr);$i++){
         $Odmde_id=$obj->autoIncrement("tblordenmantodetalle","Odmde_id");
         $sqlfk="INSERT INTO tblordenmantodetalle (Odmde_id,Odm_id,Her_id) VALUES ($Odmde_id,'". $id. "','".$herr[$i]."')";
         $ejecutardetalle=$obj->insert($sqlfk);
         //echo $sqlfk." <br>";
       }
       for($i=0;$i<count($Arti_id);$i++){
         $Odmde_id=$obj->autoIncrement("tblordenmantodetalle","Odmde_id");
         $sqlfk="INSERT INTO tblordenmantodetalle (Odmde_id,Odm_id,Arti_id) VALUES ($Odmde_id,'". $id. "' ,'".$Arti_id[$i]."')";
         $ejecutardetalle=$obj->insert($sqlfk);
         //echo $sqlfk."<br>";
       }
       
      redirect(getUrl("Mantenimiento", "Reporte", "consult"));
   
  
      } 
    





   
}