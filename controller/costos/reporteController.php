<?php

require_once '../model/Costos/ReporteModel.php';

class ReporteController {

    public function consult(){
        $obj=new ReporteModel();




        include_once '../view/costos/Reporte/consultar.php';

    }

    public function getFiltroReporte(){
        $obj=new ReporteModel();

        $fechaInicio=$_POST["fechaInicio"];
        $fechaFin=$_POST["fechaFin"];
        $estado=$_POST["estado"];

        

        // echo $fechaInicio."<br>";
        // echo $fechaFin."<br>";
        // echo $tipoReporte."<br>";
        // echo $estado."<br>";

        if($estado == 99){
            $sql="SELECT
            ped.Ped_id,
            est.Est_nombre,
            CONCAT(emp.Emp_nombreContacto,' ',emp.Emp_apellidoContacto) AS Emp_nombre,
            emp.Emp_razonSocial,
            ped.Ped_fecha
            FROM
            tblpedido AS ped,
            tblestado AS est,
            tblempresa AS emp
            WHERE
            est.Est_id = ped.Est_id AND
            ped.Emp_id = emp.Emp_id AND
            ped.Ped_fecha >= '$fechaInicio' AND
            ped.Ped_fecha <= '$fechaFin' 
            ORDER BY ped.Ped_id ASC";
        }else if($estado == 98){

            $sql="SELECT
            ped.Ped_id,
            est.Est_nombre,
            CONCAT(emp.Emp_nombreContacto,' ',emp.Emp_apellidoContacto) AS Emp_nombre,
            emp.Emp_razonSocial,
            ped.Ped_fecha
            FROM
            tblpedido AS ped,
            tblestado AS est,
            tblempresa AS emp
            WHERE
            est.Est_id = ped.Est_id AND
            ped.Emp_id = emp.Emp_id AND
            ped.Ped_fecha >= '$fechaInicio' AND
            ped.Ped_fecha <= '$fechaFin' AND
            (ped.Est_id = 1 OR ped.Est_id = 8 OR ped.Est_id = 9 OR ped.Est_id = 10)
            ORDER BY ped.Ped_id ASC";

        }else{        
            $sql="SELECT
            ped.Ped_id,
            est.Est_nombre,
            CONCAT(emp.Emp_nombreContacto,' ',emp.Emp_apellidoContacto) AS Emp_nombre,
            emp.Emp_razonSocial,
            ped.Ped_fecha
            FROM
            tblpedido AS ped,
            tblestado AS est,
            tblempresa AS emp
            WHERE
            est.Est_id = ped.Est_id AND
            ped.Emp_id = emp.Emp_id AND
            ped.Ped_fecha >= '$fechaInicio' AND
            ped.Ped_fecha <= '$fechaFin' AND
            ped.Est_id = $estado
            ORDER BY ped.Ped_id ASC";
        }
        // echo $sql;
        $consultar = $obj->consult($sql);
                

        // echo $sql;

        echo "<table id='datatable-responsive-costos-cotizacion-pendiente'
        class='table table-striped table-bordered dt-responsive nowrap' cellspacing='0'
        width='100%'>
        <thead style='background-color:#17A481; color:#fff;'>
        <tr>
            <th cope='col'>Codigo Pedido</th>
            <th>Nombre Cliente</th>
            <th>Centro/Empresa</th>
            <th>Fecha Solicitud</th>
            <th>Responsable</th>
            <th>acciones</th>
        </tr>
        <tbody>";

        foreach($consultar as $c){
            echo "<tr>";
            echo "<td>".$c['Ped_id']."</td>";
            echo "<td>".$c['Emp_nombre']."</td>";
            echo "<td>".$c['Emp_razonSocial']."</td>";
            echo "<td>".$c['Ped_fecha']."</td>";
            echo "<td>".$c['Est_nombre']."</td>";
            echo "<td><button title='' value=''
                    class='btn btn-danger btn-sm botonModal' data-url=''><i
                    class='fa fa-close'></i></button></td>";

            echo "</tr>";
        }

        echo "</tbody>
        </table>";

    }


    public function getFiltroTipoReporte(){
        $obj=new ReporteModel();

        $tipoReporte=$_POST["tipoReporte"];        

        switch ($tipoReporte) {
            case '0':
                    echo "<option value='0'>Seleccione...</option>
                          ";
                break;
            case '1':

                    echo "<option value='0'>Seleccione...</option>
                            <option value='5'>Pendiente por aprobacion - solicitud</option>
                            <option value='6'>Aprobado - solicitud</option>
                            <option value='7'>No aprobado - solicitud</option>
                            ";
                break;

            case '2':
                    echo "<option value='0'>Seleccione...</option>
                            <option value='1'>Activo</option>
                            <option value='8'>Pendiente por aprobacion - cotizacion</option>
                            <option value='9'>Aprobado - cotizacion</option>
                            <option value='10'>No aprobado - cotizacion</option>
                            <option value='98'>Todos</option>
                            ";
                break;
            
            default:
                    echo "<option value='0'>Seleccione...</option>";
                break;
        }

    }


    public function getReporteExcelCotizacion(){
        
        // echo getUrl("costos","Excel","postReporteExcelCotizacion",false,"ajax");
        $fechaInicio=$_POST["fechaInicio"];
        $fechaFin=$_POST["fechaFin"];
        $estado=$_POST["estado"];

        
        $cotizacion = array(8,9);
        $esCotizacion = false;
        for($i=0;$i<COUNT($cotizacion);$i++){
            if($estado == $cotizacion[$i]){
                $esCotizacion = true;
            }
        }

        if($esCotizacion){
            echo getUrl("costos","excel","postReporteExcelCotizacion",array("fechaInicio"=>$fechaInicio,"fechaFin"=>$fechaFin,"estado"=>$estado),"ajax");
        }else{
            echo getUrl("costos","excel","postReporteExcelGenerico",array("fechaInicio"=>$fechaInicio,"fechaFin"=>$fechaFin,"estado"=>$estado),"ajax");
        }
        
    }

}



?>