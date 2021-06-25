<?php

require_once '../model/mantenimiento/GestionModel.php';

class GestionController
{
//FUNCION PARA CONSULTAR DATOS INGRESADOS EN LA MAQUINA
public function consult(){

    $obj = new GestionModel();

    $sql = "SELECT m.maq_id, m.maq_nombre, e.est_nombre
    FROM tblmaquina as m, tblestado as e
    WHERE m.est_id = e.est_id"; 
    
    $maquinas = $obj->consult($sql);
    
    include_once '../view/Mantenimiento/gestion/consult.php';

}

    public function ModalUpdate(){
        $obj = new GestionModel();
        $maq_id = $_GET["maq_id"];

        $sql = "SELECT Maq_id,Maq_nombre FROM tblmaquina
        WHERE Maq_id='".$maq_id."'";
        
        $maquina =$obj->consult($sql);

        $sql = "SELECT * FROM tblEstado WHERE Est_id";
        $estado =$obj->consult($sql);

        include_once '../view/Mantenimiento/gestion/ModalUpdate.php';




    }

    public function ModalUpdateEstado(){
        $obj = new GestionModel();
        $maq_id = $_POST["Maq_id"];
        $Est_id = $_POST["Est_id"]; 
        $sql="UPDATE tblmaquina SET Est_id='".$Est_id."'
              WHERE Maq_id=$maq_id";
        $ejecutar=$obj->Update($sql);
        if($ejecutar){
            redirect(getUrl("Mantenimiento","gestion","consult"));
        }else{
            echo("Error al editar");
        }

    }

}
?>


   

