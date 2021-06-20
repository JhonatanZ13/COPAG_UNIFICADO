<?php

require_once '../model/Costos/SolicitudModel.php';

class SolicitudController { 
 
    public function consult(){
        $obj=new SolicitudModel();
        $sql="SELECT tblpedido.Ped_id,tblempresa.Emp_razonSocial,tblestado.Est_nombre,tbltipoempresa.Tempr_descripcion,tblpedido.Ped_fecha 
        FROM tblpedido,tblestado,tblempresa,tbltipoempresa
        WHERE tblpedido.Est_id=tblestado.Est_id 
        AND tbltipoempresa.Tempr_id=tblpedido.Tempr_id 
        AND tblpedido.Est_id=3";
        $solicitudP=$obj->consult($sql);
     
        include_once '../view/costos/solicitud/consultar.php';
    }
    
    public function getInsert(){

        if (isset($_POST['TipoS'])){
        $TipoS=$_POST['TipoS'];
    }else {$TipoS=$_GET['TipoS'];}
        $cont=0;
        if (isset($_POST['TipoS']) or isset($_GET['TipoS']) ){
        if ($TipoS==0){
            $cont++;
          $_SESSION['error']["TipoS"]="Tipo de solicitud invalido. ";     
        }
    }
        if($cont>0){
            redirect(getUrl("costos","solicitud","consult"));

        }else{
        $obj=new SolicitudModel();
            $sql="SELECT * FROM Tblcentro";
            $centro=$obj->consult($sql);
            $sql="SELECT  tblproductobase.Pba_id,tblproductobase.Pba_descripcion
            FROM tblproductobase";
            $pbase=$obj->consult($sql);

            $sql="SELECT * FROM tblempresa";
            $empresa=$obj->consult($sql);

            $sql="SELECT * FROM Tbldepartamento";
            $departamento=$obj->consult($sql);

            $sql="SELECT * FROM Tblmunicipio";
            $municipio=$obj->consult($sql);

            $sql="SELECT tblusuario.Usu_id,tblusuario.Usu_primerNombre,tblusuario.Usu_segundoNombre,tblusuario.Usu_primerApellido,tblusuario.Usu_segundoApellido,tblusuario.Usu_email FROM tblusuario";
            $usuario=$obj->consult($sql);

            $sql="SELECT * FROM tbltiposolicitud";
         $tipoS=$obj->consult($sql);

            date_default_timezone_set ("America/Bogota") ;

            

           include_once '../view/costos/solicitud/insertar.php';
          
        }
           
    }

    public function postInsert(){

      //  dd($_POST);

            extract($_POST);
        //   echo  count($producto)-1;
        // $producto= $_POST['producto'];
        // $cantidad= $_POST['cantidad'];
        // $desc= $_POST['desc'];

        // $ped_fecha = $_POST['ped_fecha'];
        // $subdirector = $_POST['subdirector'];
        // $centro = $_POST['centro'];
        // $municipio = $_POST['municipio'];
        // $dep = $_POST['dep'];
        // $asunto = $_POST['asunto'];
        // $objeto = $_POST['objeto'];
        // $pj = $_POST['pj'];
        // $lj = $_POST['lj'];

       
        //desision que asigna las variables de sena proveedor sena
        if($tipoS==4){
            $centro=1;
            $cliente=2;  
            $dep=1;
            $municipio=1;
        }
        //desision que asigna las variables de sena cliente externo editando el sql
        if($tipoS==5){
            $centron=" ";
            $centro=" ";
        }else {
            $centro=",'".$centro."'";
            
            $centron=",`Cen_id`";
        }
      
        $cont=0;
        $obj=new SolicitudModel();

        // if (empty($subdirector)==true){
        //     $cont++;
        //   $_SESSION['error']["subdirector"]="El campo subdirector no puede estar vacio. ";     
        // }else if (validarcaracteres($cliente)==true){
        //     $cont++;
        //     $_SESSION['error']["cliente"]="El campo cliente no puede tener caracteres especiales. ";

        // }

        // ----
        if (empty($objeto)==true){
            $cont++;
          $_SESSION['error']["objeto"]="El campo objeto no puede estar vacio. ";     
        }


        if ($cont>0){

            redirect(getUrl("costos","solicitud","getInsert",array("TipoS"=>$tipoS)));
                         }else{  

        $Ped_id = $obj->autoIncrement("tblpedido","Ped_id");

      

        $sql="INSERT INTO `tblpedido` (`Ped_id`, `Ped_fecha`, `destinatario`, `Ped_objetivo`, `Ped_plazoEjecucionDias`,`Ped_plazoEjecucionMeses`, `Ped_lugarEjecucionCiu`,`Ped_lugarEjecucionCen`, `Est_id`".$centron.",`Emp_id`,`Dep_id`,`Mun_id`,`Tempr_id`)
        VALUES ('".$Ped_id."','".$ped_fecha."','".$destinatario."','".$objeto."','".$pjd."','".$pjm."','".$ljciu."','".$ljcen."', '3'".$centro.",'".$cliente."','".$dep."','".$municipio."','".$tipoS."')";
       

        $ejecutar=$obj->insert($sql);
        
        if($ejecutar){

            $sql="SELECT tblpedido.Ped_id
            FROM tblpedido ORDER BY Ped_id DESC LIMIT 1";
                $id=$obj->consult($sql);

                $Ped_id=mysqli_fetch_row($id);
                $Ped_id=$Ped_id[0];
                   
                for($i=0; $i <count($productoS)-1; $i++){  
                    if ($producto[$i]!="" || $cantidad[$i]!=""){
                    $Dpe_id = $obj->autoIncrement("tbldetallepedido","Dpe_id");
                    $sql="INSERT INTO tbldetallepedido (`Dpe_id`, `Pba_id`, `Dep_descripcion`, `Dpe_cantidad`,`Ped_id`)
                    VALUES ('".$Dpe_id."','".$productoS[$i]."','".$desc[$i]."','".$cantidad[$i]."','".$Ped_id."')";
                    $ejecutar=$obj->insert($sql); 
                    }
                }
                if ($ejecutar){
                   redirect(getUrl("costos","solicitud","consult"));
                }else{ echo "Ups ocurrio--".$sql;}
                
        }else{ echo "Ups ocurrio un error 1---".$sql;}

    }
    }

    public function getUpdateSolicitud(){

        extract($_GET);     
        $obj=new SolicitudModel();
      
         $sql="SELECT * FROM tblpedido WHERE Ped_id=$Ped_id";
         $pedido=$obj->consult($sql);
        
         $sql="SELECT * FROM Tbldepartamento";
         $departamento=$obj->consult($sql);

         $sql="SELECT * FROM Tblmunicipio";
         $municipio=$obj->consult($sql);

         $sql="SELECT * FROM Tblcentro";
         $centro=$obj->consult($sql);

         $sql="SELECT  tblproductobase.Pba_id,tblproductobase.Pba_descripcion
         FROM tblproductobase";
         $pbase=$obj->consult($sql);

         $sql="SELECT tbldetallepedido.Pba_id,tbldetallepedido.Dpe_cantidad,tbldetallepedido.Dep_descripcion,tblproductobase.Pba_descripcion 
         FROM tbldetallepedido,tblproductobase
         WHERE tblproductobase.Pba_id=tbldetallepedido.Pba_id
         AND Ped_id=$Ped_id";
         $tproducto=$obj->consult($sql); 

         $sql="SELECT tblusuario.Usu_id,tblusuario.Usu_primerNombre,tblusuario.Usu_segundoNombre,tblusuario.Usu_primerApellido,tblusuario.Usu_segundoApellido,tblusuario.Usu_email FROM tblusuario";
         $usuario=$obj->consult($sql);

         $sql="SELECT * FROM tblempresa";
         $empresa=$obj->consult($sql);

        //  $sql="SELECT * FROM tbltiposolicitud";
        //  $tipoS=$obj->consult($sql);

       
         
    include_once '../view/costos/solicitud/updateSolicitud.php';
    }

    public function postUpdate(){
    // dd($_POST);
   
    extract($_POST);

    if($tipoS==4){
        $centro=1;
        $cliente=2;  
        $dep=1;
        $municipio=1;
    }
    if($tipoS==5){
        $centron=" "; 
    }else {       
        $centron=" ,`Cen_id`=".$centro;
    }
    $obj=new SolicitudModel();

    $sql="UPDATE `tblpedido` SET `Ped_fecha`='".$ped_fecha."',`destinatario` ='".$destinatario."'".$centron.",`Dep_id`='".$dep."',`Mun_id`='".$municipio."',
    `Ped_objetivo`='".$objeto."',`Ped_plazoEjecucionDias`='".$pjd."',`Ped_plazoEjecucionMeses`='".$pjm."',`Ped_lugarEjecucionCiu`='".$ljciu."',`Ped_lugarEjecucionCen`='".$ljcen."'
    WHERE `tblpedido`.`Ped_id` = $Ped_id";
    $ejecutar= $obj->update($sql);
    if ($ejecutar){
        $sql="DELETE FROM tbldetallepedido WHERE Ped_id=$Ped_id";
        $eliminar=$obj->delete($sql);
        if($eliminar){          
                   
                for($i=0; $i <count($productoS)-1; $i++){  
                    if ($producto[$i]!="" || $cantidad[$i]!=""){
                    $Dpe_id = $obj->autoIncrement("tbldetallepedido","Dpe_id");
                    $sql="INSERT INTO tbldetallepedido (`Dpe_id`, `Pba_id`, `Dep_descripcion`, `Dpe_cantidad`,`Ped_id`)
                    VALUES ('".$Dpe_id."','".$productoS[$i]."','".$desc[$i]."','".$cantidad[$i]."','".$Ped_id."')";
                    $ejecutar=$obj->insert($sql); 
                    }
                }
                if ($ejecutar){
                   redirect(getUrl("costos","solicitud","consult"));
                }else{ echo "Ups ocurrio--".$sql;}   
  
        }else{echo "eliminar".$sql;}
   
    }else{echo "editar".$centron;}
}
    public function modalCancelar(){
        extract($_GET);
        $obj=new SolicitudModel();
        include_once '../view/costos/solicitud/cancelarModal.php';
    }
    public function modalCancelarPost(){
       extract($_POST);
       $obj=new SolicitudModel();

       $sql="UPDATE `tblpedido` SET `Est_id`=5 WHERE `tblpedido`.`Ped_id` = $Ped_id";
       $ejecutar= $obj->update($sql);

       $sql="UPDATE `tblpedido` SET `Ped_motivo`='".$Ped_motivo."' WHERE `tblpedido`.`Ped_id` = $Ped_id";
       $ejecutar= $obj->update($sql);

       if ($ejecutar){
        redirect(getUrl("costos","solicitud","consult"));
       }
    }
    public function modalAprobarPost(){
        extract($_POST);
        $obj=new SolicitudModel();
        $sql="UPDATE `tblpedido` SET `Est_id`=4 WHERE `tblpedido`.`Ped_id` = $Ped_id";
       $ejecutar= $obj->update($sql);
            // dd($_POST);
    }
    public function modalAprobar(){
        extract($_GET);
        $obj=new SolicitudModel();
        include_once '../view/costos/solicitud/aprobarModal.php';
    }
    public function selectDinamico(){
        $obj=new SolicitudModel();
        $id=$_POST['id'];
       
        $sql="SELECT * FROM Tblmunicipio WHERE Dep_id=$id";
         $municipio=$obj->consult($sql);

        foreach ($municipio as $mun){
           echo " <option  value='0' hidden selected>Departamento </option>";
        echo "<option class='form-control' value=".$mun['Mun_id'].">".$mun['Mun_nombre']."</option>";
        }     
    } 

    public function modalTipoS(){
        extract($_GET);
        $obj=new SolicitudModel();
        $sql="SELECT * FROM tbltipoempresa 
        WHERE Tempr_id=3
        OR Tempr_id=4
        OR Tempr_id=5";
        $tipoS=$obj->consult($sql);
        include_once '../view/costos/solicitud/tipoSModal.php';
    }
   
}

?>