<?php

require_once '../model/Costos/ComprasModel.php';

class comprasController {

    public function consult(){
        $obj=new ComprasModel();
        
        
        $sql=" SELECT tblcomprasinsumos.com_NoItem,tblsolicitudecompra.Soc_fecha, count(tblcomprasinsumos.Soc_id)
        FROM tblsolicitudecompra,tblcomprasinsumos
        WHERE tblsolicitudecompra.Soc_id=tblcomprasinsumos.Soc_id
        GROUP BY tblsolicitudecompra.Soc_id";

        $compras=$obj->consult($sql);

        include_once '../view/costos/compras/ConsultarCompras.php';
    }

    public function getInsert(){

        $obj=new ComprasModel();
       
        $sql ="SELECT * FROM tbsolicitudecompra";
        $solicitud= $obj-> consult($sql);
        
      
        $sql="SELECT * FROM tblcomprasinsumos";
        $compras=$obj->consult($sql);
       

        $sql= "SELECT * FROM tblregional";
        $Regionales=$obj->consult($sql);
        
       

        include_once '../view/costos/compras/InsertarCompras.php';
    }


     public function postInsert(){
       
        $obj=new ComprasModel();

        extract($_POST);
        $id=$obj->autoIncrement("tblsolicitudecompra","Soc_id");
        $sql="INSERT INTO tblsolicitudecompra VALUES ('$id','".$Soc_fecha."','".$Soc_DNI_jefeOficina."','".$Soc_DNI_servidorPublico."','".$Soc_servidorp."','".$Soc_ficha."','".$Soc_area."','".$Reg_id."','".$Soc_nom_je."')";    
        $ejecutar=$obj->insert($sql); 
        
        if($ejecutar){

            $sql="SELECT * FROM tblsolicitudecompra";

            $solicitud=$obj->consult($sql);
           
            foreach($solicitud as $soli){
                $Soc_id = $soli['Soc_id'];
            }

        for ($i=0;$i<count($com_CodigoSena);$i++) {

            $id=$obj->autoIncrement("tblcomprasinsumos","com_NoItem"); 
            
            $sql="INSERT INTO tblcomprasinsumos VALUES ( '$id','".$com_CodigoSena[$i]."','".$com_Descripcionb[$i]."','".$com_UMedida[$i]."','".$com_Cantidad[$i]."','".$com_Observaciones[$i]."','".$Soc_id."')";
            $ejecutar2=$obj->insert($sql);
        }
            
        redirect(getUrl("costos","compras","consult"));

         
        }else{
            echo $sql;
            echo "Ups :(, ocurrio un error";

        }

     
    }

    public function getUpdate(){

            $obj=new ComprasModel();
        
           extract($_GET);

            $sql ="SELECT * FROM tblcomprasinsumos WHERE com_NoItem= $com_NoItem";
            $compras=$obj->consult($sql);
           
    
    
            $sql = "SELECT * FROM tblsolicitudecompra WHERE Soc_id=$com_NoItem";
            $solicitud=$obj->consult($sql);

            

    
            $sql= "SELECT * FROM tblregional";
            $Regionales=$obj->consult($sql); 


            
            include_once '../view/costos/compras/UpdateCompras.php';
    


            

    }


  
    public function postUpdate(){

        $obj=new ComprasModel();
        
        extract($_POST);

        $sql="UPDATE tblsolicitudecompra SET Soc_fecha='".$Soc_fecha."', Soc_area='".$Soc_area."', Soc_nom_je='".$Soc_nom_je."', 
        Soc_DNI_jefeOficina='".$Soc_DNI_jefeOficina."', Soc_servidorp='".$Soc_servidorp."', Soc_DNI_servidorPublico='".$Soc_DNI_servidorPublico."', Soc_ficha='".$Soc_ficha."', Reg_id=$Reg_id WHERE Soc_id=$com_NoItem";
       
        
        $ejecutar=$obj->update($sql);
        
        if ($ejecutar){

            $sql="DELETE FROM tblcomprasinsumos";
            $ejecutar2=$obj->delete($sql);
            

            if ($ejecutar2){
             
                $sql="SELECT * FROM tblsolicitudecompra";

                $solicitud=$obj->consult($sql);
               
                foreach($solicitud as $soli){
                    $Soc_id = $soli['Soc_id'];
                }
    
            for ($i=0;$i<count($com_CodigoSena);$i++) {
    
                $id=$obj->autoIncrement("tblcomprasinsumos","com_NoItem"); 
                
                $sql="INSERT INTO tblcomprasinsumos VALUES ( '$id','".$com_CodigoSena[$i]."','".$com_Descripcionb[$i]."','".$com_UMedida[$i]."','".$com_Cantidad[$i]."','".$com_Observaciones[$i]."','".$Soc_id."')";
                $ejecutar2=$obj->insert($sql);
            }
            }

            redirect(getUrl("costos","compras","consult"));

        }else{
        
          echo "Ups :(, ocurrio un error ";


          
         


        }


    }



    public function getDelete(){

       $com_NoItem=$_GET['com_NoItem'];

        $obj=new ComprasModel();


        $sql ="SELECT tblcomprasinsumos.com_NoItem, tblcomprasinsumos.com_CodigoSena, tblcomprasinsumos.com_Descripcionb, tblcomprasinsumos.com_UMedida, tblcomprasinsumos.com_Cantidad, tblcomprasinsumos.com_Observaciones, tblsolicitudecompra.Soc_fecha, tblsolicitudecompra.Soc_area, tblsolicitudecompra.Soc_nom_je,
        tblsolicitudecompra.Soc_id,tblsolicitudecompra.Soc_DNI_jefeOficina, tblsolicitudecompra.Soc_servidorp, tblsolicitudecompra.Soc_DNI_servidorPublico, tblsolicitudecompra.Soc_ficha, tblsolicitudecompra.Reg_id 
        FROM tblcomprasinsumos 
        NATURAL JOIN  tblsolicitudecompra
        WHERE Soc_id=1";

        $compras=$obj->consult($sql);
        
        include_once '../view/costos/compras/ModalDelete.php';
    }


    public function postDelete(){

        $obj=new comprasModel();

        extract($_POST);

        $sql= "DELETE tblcomprasinsumos, tblsolicitudecompra FROM tblcomprasinsumos
        JOIN tblsolicitudecompra ON  tblcomprasinsumos.com_NoItem=tblsolicitudecompra.Soc_id=1";
        $ejecutar=$obj->delete($sql);

            
            if($ejecutar){
              
               
        redirect(getUrl("costos","compras","consult"));



            }else{

                echo"Ups :(, ocurrio un error";

            }
    }


    public function modalDelete(){

        
       $com_NoItem=$_POST['datos'];

        $obj=new ComprasModel();
        
           extract($_GET);

            $sql ="SELECT * FROM tblcomprasinsumos WHERE com_NoItem= $com_NoItem";
            $compras=$obj->consult($sql);
           
    
    
            $sql = "SELECT * FROM tblsolicitudecompra WHERE Soc_id=$com_NoItem";
            $solicitud=$obj->consult($sql);

    
            $sql= "SELECT * FROM tblregional";
            $Regionales=$obj->consult($sql); 
        
        include_once '../view/costos/compras/ModalDelete.php';
        
        

    }



    public function getVisualize(){


        extract($_GET);

        $obj=new ComprasModel();

        
        $sql ="SELECT * FROM tblcomprasinsumos WHERE com_NoItem= $com_NoItem";
        $compras=$obj->consult($sql);



        $sql = "SELECT * FROM tblsolicitudecompra WHERE Soc_id=$com_NoItem";
        $solicitud=$obj->consult($sql);


        $sql= "SELECT * FROM tblregional";
        $Regionales=$obj->consult($sql); 



        include_once '../view/costos/compras/VisualizeCompras.php';
        



    }





}

?>