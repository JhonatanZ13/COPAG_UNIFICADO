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
        $cantidad = $_POST['Arti_cantidad'];

        for ($i = 0; $i < count($id); $i++) {
            /* echo $id[$i] . "<br>" . $cantidad . "<br>"; */
            $sql = "UPDATE tblarticulo
            SET Arti_cantidad = Arti_cantidad - $cantidad[$i] 
            WHERE tblarticulo.Arti_id = $id[$i]";
            $ejecutar = $obj->update($sql);
        }
        if ($ejecutar) {
            $_SESSION['salio']=1;
            redirect(getUrl("Control", "Control", "getControl"));
        }
    }
    public function SelectEntrada(){
        $obj = new SalidaModel();
        $id = $_POST['id'];
        $sql = "SELECT * FROM tblarticulo WHERE Tart_id = $id ";
        $tipos = $obj->consult($sql);

        foreach ($tipos as $tp) {
            echo "<option value='" . $tp['Arti_id'] . "'>" . $tp['Arti_nombre'] . "</option>";
        }
    }
    public function cantidad(){
        $obj = new SalidaModel();
        $vale = $_POST['vale'];
        $sql = "SELECT tblarticulo.Arti_cantidad FROM `tblarticulo` WHERE Arti_id= $vale ";
        $existen = $obj->consult($sql);

        foreach ($existen as $hay) {
         echo implode($hay);
        }
        return intval($hay);
    }
}
