<?php
include_once '../model/Entrada/EntradaModel.php';

class EntradaController
{

    public function getEntrada()
    {
        $obj = new EntradaModel();
        $sql = "SELECT * FROM tbltipoarticulo";
        $tipos = $obj->consult($sql);
        include_once '../view/Inventario/Entrada/EntradaMasiva.php';
    }

    public function SelectEntrada()
    {
        $obj = new EntradaModel();
        $id = $_POST['id'];
        $sql = "SELECT * FROM tblarticulo WHERE Tart_id = $id ";
        $tipos = $obj->consult($sql);

        foreach ($tipos as $tp) {
            echo "<option value='" . $tp['Arti_id'] . "'>" . $tp['Arti_nombre'] . "</option>";
        }
    }



    public function postEntradaMasiva()
    {
        $obj = new EntradaModel();
        $id = $_POST['Arti_id'];
        $cantidad = $_POST['Arti_cantidad'];

        for ($i = 0; $i < count($id); $i++) {
            /* echo $id[$i] . "<br>" . $cantidad . "<br>"; */
            $sql = "UPDATE tblarticulo
            SET Arti_cantidad = Arti_cantidad + $cantidad[$i] 
            WHERE tblarticulo.Arti_id = $id[$i]";
            $ejecutar = $obj->update($sql);
        }
        if ($ejecutar) {
            $_SESSION['agrego']=1;
            redirect(getUrl("Control", "Control", "getControl"));
        }
    }
}
