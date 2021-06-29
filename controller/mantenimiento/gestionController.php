<?php

require_once '../model/mantenimiento/GestionModel.php';

class GestionController
{
//FUNCION PARA CONSULTAR DATOS INGRESADOS EN LA MAQUINA
    public function consult(){

        $obj = new GestionModel();

        $sql = "SELECT m.Maq_id, m.Maq_nombre,m.Maq_fichaTecnica,m.Maq_manual,e.Est_nombre
        FROM tblMaquina as m, tblEstado as e
        WHERE m.Est_id = e.Est_id";
        
        $maquinas = $obj->consult($sql);
        
        include_once '../view/Mantenimiento/gestion/consult.php';

    }

    public function ModalUpdate(){
        $obj = new GestionModel();
        $maq_id = $_GET["Maq_id"];

        $sql = "SELECT Maq_id,Maq_nombre FROM tblMaquina
        WHERE Maq_id='".$maq_id."'";
        
        $maquina =$obj->consult($sql);

        $sql = "SELECT * FROM tblEstado WHERE Est_id=11 || Est_id=14 || Est_id=13 ";
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
