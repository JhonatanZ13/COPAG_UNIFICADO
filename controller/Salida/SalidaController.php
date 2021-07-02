<?php
include_once '../model/Salida/SalidaModel.php';

class SalidaController{
    public function getSalida(){
        $obj = new SalidaModel();

        $sql = "SELECT tblarticulo.Arti_id, tblarticulo.Arti_nombre, tbltipoarticulo.Tart_descripcion, tblarticulo.Arti_medida, tblarticulo.Med_id, tblarticulo.Arti_descripcion, tblarticulo.Arti_cantidad
            FROM tblarticulo,tbltipoarticulo
            WHERE tblarticulo.Tart_id=tbltipoarticulo.Tart_id";
        $salida = $obj->consult($sql);

        include_once '../view/Inventario/Salida/Salida.php';
    }
    
    public function postSalida(){
        $id = $_POST['Arti_id'];
        $cantidad = $_POST['Arti_cantidad'];
        $obj = new SalidaModel();

        $sql = "UPDATE tblarticulo SET Arti_cantidad = Arti_cantidad - $cantidad WHERE tblarticulo.Arti_id=$id";
        $ejecutar = $obj->update($sql);

        if ($ejecutar) {
            redirect(getUrl("Salida", "Salida", "getSalida"));
        }
    }
    public function getSalidaMasiva(){
        $obj = new SalidaModel();
        $sql = "SELECT * FROM tbltipoarticulo";
        $sql2 = "SELECT * FROM tbltipoarticulo";
        $tipos = $obj->consult($sql);
        include_once '../view/Inventario/Salida/SalidaMasiva.php';
    }
    public function postSalidaMasiva(){
        $obj = new SalidaModel();
        $id = $_POST['Arti_id'];
            $tipo=$_POST['tipo'];
            $cantidad = $_POST['Arti_cantidad'];

            for ($i = 0; $i < count($id); $i++) {
                /* echo $id[$i] . "<br>" . $cantidad . "<br>"; */
                if($tipo[$i]=="Maquina"){
                    $sql = "UPDATE tblmaquina
                    SET Maq_cantidad = Maq_cantidad - $cantidad[$i] 
                    WHERE tblmaquina.Maq_id = $id[$i]";
                    $ejecutar = $obj->update($sql);
                }else if($tipo[$i]=="Herramienta"){
                    $sql = "UPDATE tblherramienta
                    SET Her_cantidad = Her_cantidad - $cantidad[$i] 
                    WHERE tblherramienta.Her_id = $id[$i]";
                    $ejecutar = $obj->update($sql);
                }else{
                    $sql = "UPDATE tblarticulo
                    SET Arti_cantidad = Arti_cantidad - $cantidad[$i] 
                    WHERE tblarticulo.Arti_id = $id[$i]";
                    $ejecutar = $obj->update($sql);
                }
                
            }
        if ($ejecutar) {
            $_SESSION['salio']=1;
            redirect(getUrl("Control", "Control", "getControl"));
        }
    }
    public function SelectEntrada(){
        $obj = new SalidaModel();
        $id = $_POST['id'];
        if($id=="Maquina"){
            $sql = "SELECT * FROM tblmaquina";
            $tipos = $obj->consult($sql);
            foreach ($tipos as $tp) {
                echo "<option value='" . $tp['Maq_id'] . "'>" . $tp['Maq_nombre'] . "</option>";
            }
        }else if($id=="Herramienta"){
            $sql = "SELECT * FROM tblherramienta";
            $tipos = $obj->consult($sql);
            foreach ($tipos as $tp) {
                echo "<option value='" . $tp['Her_id'] . "'>" . $tp['Her_nombre'] . "</option>";
            }
        }else if($id=="Insumos"){
            $sql = "SELECT * FROM tblarticulo where Tart_id='2'";
            $tipos = $obj->consult($sql);
            foreach ($tipos as $tp) {
                echo "<option value='" . $tp['Arti_id'] . "'>" . $tp['Arti_nombre'] . "</option>";
            }
        }else {
            $sql = "SELECT * FROM tblarticulo where Tart_id='1'";
            $tipos = $obj->consult($sql);
            foreach ($tipos as $tp) {
                echo "<option value='" . $tp['Arti_id'] . "'>" . $tp['Arti_nombre'] . "</option>";
            }
        }
    }
    public function cantidad(){
        $obj = new SalidaModel();
        $vale = $_POST['vale'];
        $tipo = $_POST['tipo'];
        if($tipo=="Herramienta"){
            $sql = "SELECT tblherramienta.Her_cantidad FROM `tblherramienta` WHERE Her_id= $vale";
        }else{
            $sql = "SELECT tblarticulo.Arti_cantidad FROM `tblarticulo` WHERE Arti_id= $vale";
        }
        

        $existen = $obj->consult($sql);

        foreach ($existen as $hay) {
         echo implode($hay);
        }
        return intval($hay);
    }
}