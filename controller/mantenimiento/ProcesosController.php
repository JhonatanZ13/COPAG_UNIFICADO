<?php

require_once '../model/mantenimiento/ProcesoModel.php';

class ProcesosController
{
    //FUNCION PARA CONSULTAR DATOS INGRESADOS EN LA TABLA PROCESOS
    public function consult()
    {
        $obj = new ProcesoModel();
        $sql = "SELECT Pro_id, Pro_nombre, Pro_descripcion FROM tblproceso";
        $procesos = $obj->consult($sql);
        include_once '../view/Mantenimiento/Procesos/consult.php';
    }


    //FUNCION MODAL PARA INSERTAR DATOS EN LA TABLA PROCESOS

    public function InsertModal()
    {
        $obj = new ProcesoModel();
        $id = $obj->autoIncrement("tblproceso", "Pro_id");
        $Pro_nombre = $_POST['Pro_nombre'];
        $Pro_descripcion = $_POST['Pro_descripcion'];

        $sql = "INSERT INTO tblproceso VALUES ($id,'" . $Pro_nombre . "','" . $Pro_descripcion . "')";
        $ejecutar = $obj->insert($sql);
        if ($ejecutar) {
            redirect(getUrl("Mantenimiento", "Procesos", "consult"));
        }
    }

    //FUNCION PARA CONSULTAR CAMPOS PARA INSERTAR DE LA TABLA PROCESOS
    public function ModalInsert()
    {

        $obj = new ProcesoModel();
        $sql = "SELECT * FROM tblproceso";
        $procesos = $obj->consult($sql);
        include_once '../view/Mantenimiento/Procesos/ModalInsert.php';
    }
    //FUNCION PARA CONSULTAR DATOS DE MODAL DE EDITAR PARA EDITAR EN LA TABLA PROCESOS
    public function ModalUpdate()
    {

        $pro_id = $_GET['Pro_id'];
        $obj = new ProcesoModel();
        $sql = "SELECT * FROM tblproceso WHERE Pro_id=$pro_id";
        $procesos = $obj->consult($sql);
        include_once '../view/Mantenimiento/Procesos/ModalUpdate.php';
    }
    //FUNCION MODAL PARA EDITAR DATOS DE LA TABLA PROCESOS
    public function UpdateModal()
    {
        $obj = new ProcesoModel();

        $pro_nombre = $_POST['Pro_nombre'];
        $pro_id = $_POST['Pro_id'];
        $pro_descripcion = $_POST['Pro_descripcion'];

        $sql = "UPDATE tblproceso SET Pro_nombre ='" . $pro_nombre . "',Pro_descripcion='" . $pro_descripcion . "' WHERE Pro_id = $pro_id";

        $ejecutar = $obj->Update($sql);
        if ($ejecutar) {

            redirect(getUrl("Mantenimiento", "Procesos", "consult"));
        } else {
            echo "Error al Editar";
        }
    }
    //FUNCION  PARA CONSULTAR DATOS DE ELIMINAR  PARA LA TABLA PROCESOS
    public function ModalDelete()
    {
        if (isset($_POST['Pro_id'])){
            $pro_id=$_POST['Pro_id'];
        }else {$pro_id=$_GET['Pro_id'];}
        $obj = new ProcesoModel();
        $sql = "SELECT * FROM tblproceso WHERE Pro_id=$pro_id";
        $procesos = $obj->consult($sql);
        include_once '../view/Mantenimiento/Procesos/ModalDelete.php';
    }
    //FUNCION MODAL PARA ELIMINAR  DATOS DE LA TABLA PROCESOS

    public function DeleteModal()
    {
        if (isset($_POST['Pro_id'])){
            $pro_id=$_POST['Pro_id'];
        }else {$pro_id=$_GET['Pro_id'];}
        $obj = new ProcesoModel();
      
        $sql = "DELETE FROM tbltareaproceso WHERE Pro_id=$pro_id";

        $ejecutar = $obj->delete($sql);
        
        $sql = "DELETE FROM tblproceso WHERE Pro_id=$pro_id";
        $ejecutar = $obj->delete($sql);

        //  if (!$ejecutar) {

        //     echo $sql;
           
        // } else{

        //     redirect(getUrl("Mantenimiento", "Procesos", "consult"));
        // }
    }
}
