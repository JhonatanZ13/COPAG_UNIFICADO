<?php
    include_once '../model/Entrada/EntradaModel.php';

    class EntradaController
    {

        public function getEntrada()
        {
            $obj = new EntradaModel();
            $sql = "SELECT * FROM tbltipoarticulo";
            $tipos = $obj->consult($sql);
            $sql = "SELECT * from tblsubtipogeneral where tge_id='1'";
            $tipos2= $obj->consult($sql);
            include_once '../view/Inventario/Entrada/EntradaMasiva.php';
        }

        public function SelectEntrada()
        {
            $obj = new EntradaModel();
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



        public function postEntradaMasiva()
        {
            $obj = new EntradaModel();
            $id = $_POST['Arti_id'];
            $tipo=$_POST['tipo'];
            $cantidad = $_POST['Arti_cantidad'];

            for ($i = 0; $i < count($id); $i++) {
                /* echo $id[$i] . "<br>" . $cantidad . "<br>"; */
                if($tipo[$i]=="Maquina"){
                    $sql = "UPDATE tblmaquina
                    SET Maq_cantidad = Maq_cantidad + $cantidad[$i] 
                    WHERE tblmaquina.Maq_id = $id[$i]";
                    $ejecutar = $obj->update($sql);
                }else if($tipo[$i]=="Herramienta"){
                    $sql = "UPDATE tblherramienta
                    SET Her_cantidad = Her_cantidad + $cantidad[$i] 
                    WHERE tblherramienta.Her_id = $id[$i]";
                    $ejecutar = $obj->update($sql);
                }else{
                    $sql = "UPDATE tblarticulo
                    SET Arti_cantidad = Arti_cantidad + $cantidad[$i] 
                    WHERE tblarticulo.Arti_id = $id[$i]";
                    $ejecutar = $obj->update($sql);
                }
                
            }
            if ($ejecutar) {
                $_SESSION['agrego']=1;
                redirect(getUrl("Control", "Control", "getControl"));
            }
            
        }
    }