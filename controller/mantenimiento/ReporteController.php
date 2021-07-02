<?php

require_once '../model/mantenimiento/ReporteModel.php';

class ReporteController
{
//FUNCION PARA CONSULTAR INFORMACION SOBRE ORDENES DE MANTENIMIENTO
public function consult(){

    $obj = new ReporteModel();

    $sql = "SELECT o.Odm_id, Stg.Stg_nombre, o.Odm_fechaInicio, o.Odm_fechaFin, o.Odm_observacionesFin, o.Odm_pdf
    FROM tblordenmanto as o, tblsubtipogeneral as Stg
    WHERE o.Stg_id = Stg.Stg_id"; 
    
    $orden = $obj->consult($sql);
    
    include_once '../view/Mantenimiento/Reporte/consult.php';

}

public function ModalDelete()
{
    $odm_id = $_GET['Odm_id'];
    $obj = new ReporteModel();
    $sql = "SELECT * FROM tblordenmanto WHERE Odm_id=$odm_id ";
    $orden = $obj->consult($sql);
    $sql="SELECT * FROM tblordenmantodetalle";
    $ordendetalle = $obj->consult($sql);
    include_once '../view/Mantenimiento/Reporte/ModalDelete.php';
}

public function DeleteModal()
{
    if ($_SESSION['rolUser'] == 'Funcionario' || $_SESSION['rolUser'] =='Administrador') {
        $obj = new ReporteModel();
        $odm_id = $_POST['Odm_id'];
        $idodmde= $_POST['Odmde_id'];
        $sqlodm = "DELETE FROM tblordenmantodetalle WHERE Odm_id=$odm_id ";
        $ejecutarodmde = $obj->delete($sqlodm);
    
        if ($ejecutarodmde==true) {
    
            $sql = "DELETE FROM tblordenmanto WHERE Odm_id=$odm_id";
            $ejecutar = $obj->delete($sql);
       }   
        if($ejecutar==true){
            redirect(getUrl("Mantenimiento", "Reporte", "consult"));
        } else {
            echo "Error al eliminar";
            
            
        }
    }else {
        echo "Usted no tiene permisos para realizar esta accion";
    }


   
}


    public function viewpdf(){
        $obj=new ReporteModel();
        $Odm_pdf=$_GET['Odm_pdf'];

        header("Content-type:application/pdf");
        header("Content-Disposition: inline; filename=Reporte.pdf");
        readfile("$Odm_pdf");
    }

    

}
?>


   

