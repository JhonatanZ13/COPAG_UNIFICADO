<?php
    include_once '../model/Control/ControlModel.php';

    class ControlController{
        public function getControl(){
            $obj=new ControlModel ();

            if (isset($_SESSION['agrego'])) {
                echo "<div class='alert alert-success' role='alert' id='message'>" .
                "<p>Nuevo articulo añadido con éxito!</p>" .
                "</div>";
                unset($_SESSION['agrego']);
            }
            if (isset($_SESSION['salio'])) {
                echo "<div class='alert alert-success' role='alert' id='message'>" .
                "<p>El articulo salio con éxito!</p>" .
                "</div>";
                unset($_SESSION['salio']);
            }
            
            $sql="SELECT tblarticulo.Arti_id, tblarticulo.Arti_nombre, tbltipoarticulo.Tart_descripcion, tblarticulo.Arti_medida, tblmedida.Med_descripcion, tblarticulo.Arti_descripcion, tblarticulo.Arti_cantidad 
                FROM tblmedida, tblarticulo, tbltipoarticulo 
                WHERE tblarticulo.Tart_id = tbltipoarticulo.Tart_id 
                AND tblarticulo.Tart_id=tblmedida.Med_id";
            $Control=$obj->consult($sql);
            include_once '../view/Inventario/Control/Control.php';

        }
    }
