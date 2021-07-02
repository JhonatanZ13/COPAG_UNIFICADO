<?php

include_once '../model/Excel/ExcelModel.php';
require_once 'vendor/autoload.php';

//include_once '../model/Costos/ExcelModel.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;



class ExcelController
{

    public function postExcel()
    {
        $sheet = new Spreadsheet();
        $excel = $sheet->getActiveSheet();
        $obj = new ExcelModel();
        extract($_GET);
        
        $sql = "SELECT tblcomprasinsumos.com_NoItem, tblarticulo.Arti_nombre, tblmedida.Med_descripcion, tblcomprasinsumos.com_Cantidad, tblcomprasinsumos.com_Observaciones 
        FROM tblcomprasinsumos, tblarticulo, tblmedida 
        WHERE tblcomprasinsumos.Arti_id = tblarticulo.Arti_id
        AND tblcomprasinsumos.Med_id = tblmedida.Med_id 
        AND tblcomprasinsumos.Soc_id=$Soc_id";

        $compras = $obj->consult($sql);

        

        $sql = "SELECT * FROM tblsolicitudecompra WHERE Soc_id=$Soc_id";
        $solicitud = $obj->consult($sql);

        $sql = "SELECT * FROM tblregional";
        $Regionales = $obj->consult($sql);

        $sql = "SELECT * FROM tblcentro";
        $Centros = $obj->consult($sql);


        //Bordes de los headers de la tabla
        $excel->getStyle('B20:F20')

            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THICK)
            ->setColor(new Color('000000'));


        $excel->getStyle('B2:F7')
        ->getBorders()
        ->getOutline()
        ->setBorderStyle(Border::BORDER_THICK)
        ->setColor(new Color('000000'));


        //Centrado de margen

        $excel->getStyle('B2:E2')->getAlignment()->setHorizontal('center');
        $excel->getStyle('B3:E3')->getAlignment()->setHorizontal('center');
        $excel->getStyle('B4:E4')->getAlignment()->setHorizontal('center');
        $excel->getStyle('B5:E5')->getAlignment()->setHorizontal('center');
        $excel->getStyle('B6:E6')->getAlignment()->setHorizontal('center');
        $excel->getStyle('F3')->getAlignment()->setHorizontal('center');
        $excel->getStyle('F4')->getAlignment()->setHorizontal('center');
       $excel-> getStyle('E32')->getAlignment()->setHorizontal('right');

        //imagen
        $exce = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $exce->setName('Paid');
        $exce->setDescription('Paid');
        $exce->setPath('images/logoSena.png');
        $exce->setCoordinates('B3');
        $exce->setOffsetX(2);
        $exce->setRotation(0);
        $exce->getShadow()->setVisible(true);
        $exce->getShadow()->setDirection(45);
        $exce->setWorksheet($sheet->getActiveSheet());

        $exce = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $exce->setName('Paid');
        $exce->setDescription('Paid');
        $exce->setPath('images/siga .png');
        $exce->setCoordinates('E3');
        $exce->setOffsetX(100);
        $exce->setRotation(0);
        $exce->getShadow()->setVisible(true);
        $exce->getShadow()->setDirection(5);
        $exce->setWorksheet($sheet->getActiveSheet());


        //Celdas combinadas
        $excel->mergeCells('B7:C7');
        $excel->mergeCells('B9:C9');
        $excel->mergeCells('B11:E11');
        $excel->mergeCells('B13:E13');
        $excel->mergeCells('C3:E3');
        $excel->mergeCells('C4:E4');
        $excel->mergeCells('C5:E5');
        $excel->mergeCells('C6:E6');
       
        //Activar fuente en negrita
        $excel->getStyle('B2:F20')->getFont()->setBold(true);
        $excel->getStyle('B32:F33')->getFont()->setBold(true);
        //Dar tamaño a columnas
        $excel->getColumnDimension('B')->setWidth(10);
        $excel->getColumnDimension('C')->setWidth(30);
        $excel->getColumnDimension('D')->setWidth(24);
        $excel->getColumnDimension('E')->setWidth(20);
        $excel->getColumnDimension('F')->setWidth(40);



        //Aqui enpieza los titulos del encabezado






        $excel->setCellValue("C3", "SERVICIO NACIONAL DE APRENDIZAJE SENA ");
        $excel->setCellValue("C4", "GESTIÓN DE INFRAESTRUCTURA Y LOGÍSTICA ");
        $excel->setCellValue("C5", "FORMATO DE SOLICITUD DE SALIDA DE BIENES  PARA EL USO DE LOS ");
        $excel->setCellValue("C6", "CUENTADANTES QUE  TIENEN VINCULO CON LA ENTIDAD");
        $excel->setCellValue("F3", "Vervión 04");
        $excel->setCellValue("F4", "Código: GIL-F-014"); 




        foreach ($solicitud as $soli) {


            $excel->setCellValue("B9", "FECHA SOLICITUD:  " . $soli['Soc_fecha']);
            $excel->setCellValue("F9", "AREA: " . $soli['Soc_area']);

            foreach ($Regionales as $regio) {
                if($soli['Reg_id']==$regio['Reg_id']){
                    $excel->setCellValue("F11", "NOMBRE REGIONAL:  " . $regio['Reg_descripcion']);
                }
               
            }
            foreach ($Centros as $cen) {
                if($soli['Cen_id']==$cen['Cen_id']){
                $excel->setCellValue("B11", "NOMBRE CENTRO DE COSTO: " . $cen['Cen_nombre']);
                }
            }
            $excel->setCellValue("B13", "NOMBRE DE JEFE DE OFICINA O COORDINADOR DE AREA: " . $soli['Soc_nom_je']);
            $excel->setCellValue("F13", "CEDULA: " . $soli['Soc_DNI_jefeOficina']);
            $excel->setCellValue("B15", "NOMBRE DE SERVIDOR PÚBLICO A QUIEN SE LE ASIGNARA EL BIEN: " . $soli['Soc_nom_je']);
            $excel->setCellValue("F15", "CEDULA: " . $soli['Soc_DNI_servidorPublico']);
            $excel->setCellValue("B17", "CÓDIGO DE GRUPO O FICHA DE CARACTERIZACIÓN: " . $soli['Soc_ficha']);
        }



        //Encabezado de la tabla
        $excel->setCellValue("B20", "ITEM");
        $excel->setCellValue("C20", "DESCRIPCION DE BIEN");
        $excel->setCellValue("D20", "UNIDAD DE MEDIDA");
        $excel->setCellValue("E20", "CANTIDAD");
        $excel->setCellValue("F20", "OBSERVACIONES");


        $n = 21;
        //Cuerpo de la tabla
        foreach ($compras as $comp) {

            $excel->setCellValue("B" . $n, "" . $comp['com_NoItem']);
            $excel->setCellValue("C" . $n, "" . $comp['Arti_nombre']);
            $excel->setCellValue("D" . $n, "" . $comp['Med_descripcion']);
            $excel->setCellValue("E" . $n, "" . $comp['com_Cantidad']);
            $excel->setCellValue("F" . $n, "" . $comp['com_Observaciones']);
            $n++;
        }

        $n = $n - 1;

        $excel->setCellValue("B32", "NOMBRE: ");
        $excel->setCellValue("B33", "FIRMA: ");
        $excel->setCellValue("E32", "CARGO: ");
        $excel->getStyle('C32')
        ->getBorders()
        ->getBottom()
        ->setBorderStyle(Border::BORDER_THICK)
        ->setColor(new Color('000000'));
        $excel->getStyle('C33')
        ->getBorders()
        ->getBottom()
        ->setBorderStyle(Border::BORDER_THICK)
        ->setColor(new Color('000000'));
        $excel->getStyle('F32')
        ->getBorders()
        ->getBottom()
        ->setBorderStyle(Border::BORDER_THICK)
        ->setColor(new Color('000000'));
        //Bordes del cuerpo de la tabla
        $excel->getStyle('B21:F' . $n)
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN)
            ->setColor(new Color('000000'));

        //Activar Filtros
        $excel->setAutoFilter('B20:F20');

        $writer = new Xlsx($sheet);

        $filename = "GIL-F-014_Formato_Solicitud_de_Bienes.xlsx";
        $ruta = "Excel/" . $filename;
        try {
            $writer->save($ruta);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($sheet, 'Xlsx');
        $objWriter->save('php://output');
    }


    //Excel Cotizacion
    public function postReporteExcelCotizacion()
    {

        // getUrl("costos","reporte","postReporteExcelCotizacion",array("fechaInicio"=>$fechaInicio,"fechaFin"=>$fechaFin,"estado"=>$estado),"ajax");
        // echo getUrl("costos","Excel","postReporteExcelCotizacion",false,"ajax");
        $fechaInicio = $_GET["fechaInicio"];
        $fechaFin = $_GET["fechaFin"];
        $estado = $_GET["estado"];


        $sheet = new Spreadsheet();
        $excel = $sheet->getActiveSheet();
        $obj = new ExcelModel();

        $sql = "SELECT
        ped.Ped_id,
        ped.Est_id,
        est.Est_nombre,
        CONCAT(emp.Emp_nombreContacto,' ',emp.Emp_apellidoContacto) AS Emp_nombre,
        emp.Emp_razonSocial,
        tpe.Tempr_descripcion,
        ped.Ped_fecha,
        coti.Cot_fecha,
        CONCAT(usu.Usu_primerNombre,' ',usu.Usu_segundoNombre,' ',usu.Usu_primerApellido,' ',usu.Usu_segundoApellido) AS Usu_nombre,
        dp.cantidad,
        dp.total
        FROM
        tblpedido AS ped
        INNER JOIN (SELECT Ped_id, COUNT(*) AS cantidad, SUM(Dpe_valorTotal) AS total FROM `tbldetallepedido` GROUP BY Ped_id) AS dp
            ON ped.Ped_id = dp.Ped_id
        INNER JOIN tblestado AS est
            ON est.Est_id = ped.Est_id
        
        INNER JOIN tblempresa AS emp
            ON ped.Emp_id = emp.Emp_id

        INNER JOIN tbltipoempresa AS tpe
            ON tpe.Tempr_id = ped.Tempr_id
        
        INNER JOIN tblcotizacion AS coti
            ON coti.Cot_id = ped.Cot_id

        INNER JOIN tblusuario AS usu
            ON coti.Usu_id = usu.Usu_id        
         
        ORDER BY est.Est_nombre DESC";

        $consultPedidos = $obj->consult($sql);

        $excel->getStyle('B6:K6')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THICK)
            ->setColor(new Color('000000'));


        //Celdas combinadas
        $excel->mergeCells('B1:C1');
        $excel->mergeCells('B2:C2');
        $excel->mergeCells('B3:D3');

        //Activar fuente en negrita
        $excel->getStyle('B1:K6')->getFont()->setBold(true);
        $excel->getStyle('B1:K5')->getFont()->setSize(18);

        //Dar tamaño a columnas
        $excel->getColumnDimension('B')->setWidth(12);
        $excel->getColumnDimension('C')->setWidth(28);
        $excel->getColumnDimension('D')->setWidth(23);
        $excel->getColumnDimension('E')->setWidth(35);
        $excel->getColumnDimension('F')->setWidth(20);
        $excel->getColumnDimension('G')->setWidth(20);
        $excel->getColumnDimension('H')->setWidth(35);
        $excel->getColumnDimension('I')->setWidth(30);
        $excel->getColumnDimension('J')->setWidth(18);
        $excel->getColumnDimension('K')->setWidth(20);

        //Aqui enpieza los titulos del reporte
        $excel->setCellValue("B2", "Fecha del Reporte ");
        $excel->setCellValue("D2", date("d-m-o"));

        $excel->setCellValue("B3", "MODULO COSTOS COPAG ");

        $excel->setCellValue("B5", "Reporte General de Cotizaciones.");
        //Encabezado de la tabla
        $excel->setCellValue("B6", "Codigo");
        $excel->setCellValue("C6", "Tipo de Cliente");
        $excel->setCellValue("D6", "Nombre Solicitante");
        $excel->setCellValue("E6", "Empresa/Centro");
        $excel->setCellValue("F6", "Fecha Inicio");
        $excel->setCellValue("G6", "Fecha Fin");
        $excel->setCellValue("H6", "Proceso Actual");
        $excel->setCellValue("I6", "Elaborador");
        $excel->setCellValue("J6", "Cantidad");
        $excel->setCellValue("K6", "Total");

        $n = 7;
        //Cuerpo de la tabla
        foreach ($consultPedidos as $consult) {
            if ($consult['Ped_fecha'] >= $fechaInicio && $consult['Ped_fecha'] <= $fechaFin) {
                if ($estado == $consult['Est_id'] || $estado == 98) {

                    $excel->setCellValue("B" . $n, "" . $consult['Ped_id']);
                    $excel->setCellValue("C" . $n, "" . $consult['Tempr_descripcion']);
                    $excel->setCellValue("D" . $n, "" . $consult['Emp_nombre']);
                    $excel->setCellValue("E" . $n, "" . $consult['Emp_razonSocial']);
                    $excel->setCellValue("F" . $n, "" . $consult['Ped_fecha']);
                    $excel->setCellValue("G" . $n, "" . $consult['Cot_fecha']);
                    $excel->setCellValue("H" . $n, "" . $consult['Est_nombre']);
                    $excel->setCellValue("I" . $n, "" . $consult['Usu_nombre']);
                    $excel->setCellValue("J" . $n, "" . $consult['cantidad']);
                    $excel->setCellValue("K" . $n, "" . $consult['total']);

                    $n++;
                }
            }
        }
        $n = $n - 1;

        //Bordes del uerpo de la tabla
        $excel->getStyle('B7:K' . $n)
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN)
            ->setColor(new Color('000000'));

        //Activar Filtros
        $excel->setAutoFilter('B6:K6');

        $writer = new Xlsx($sheet);

        $filename = "reporteCotizacion.xlsx";
        $ruta = "Excel/" . $filename;
        // $writer=IOFactory::createWriter($filename,"Xlsx");

        try {
            $writer->save($ruta);
            //$writer->save($filename);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($sheet, 'Xlsx');
        $objWriter->save('php://output');
    }

    public function postReporteExcelGenerico()
    {

        // getUrl("costos","reporte","postReporteExcelCotizacion",array("fechaInicio"=>$fechaInicio,"fechaFin"=>$fechaFin,"estado"=>$estado),"ajax");
        // echo getUrl("costos","Excel","postReporteExcelCotizacion",false,"ajax");
        $fechaInicio = $_GET["fechaInicio"];
        $fechaFin = $_GET["fechaFin"];
        $estado = $_GET["estado"];


        $sheet = new Spreadsheet();
        $excel = $sheet->getActiveSheet();
        $obj = new ExcelModel();

        if ($estado == 99) {
            $sql = "SELECT
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
        } else if ($estado == 98) {

            $sql = "SELECT
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
        } else {
            $sql = "SELECT
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



        $consultPedidos = $obj->consult($sql);

        $excel->getStyle('B6:F6')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THICK)
            ->setColor(new Color('000000'));


        //Celdas combinadas
        $excel->mergeCells('B1:C1');
        $excel->mergeCells('B2:C2');
        $excel->mergeCells('B3:D3');

        //Activar fuente en negrita
        $excel->getStyle('B1:F6')->getFont()->setBold(true);
        $excel->getStyle('B1:F5')->getFont()->setSize(18);

        //Dar tamaño a columnas
        $excel->getColumnDimension('B')->setWidth(12);
        $excel->getColumnDimension('C')->setWidth(28);
        $excel->getColumnDimension('D')->setWidth(23);
        $excel->getColumnDimension('E')->setWidth(35);
        $excel->getColumnDimension('F')->setWidth(20);


        //Aqui enpieza los titulos del reporte
        $excel->setCellValue("B2", "Fecha del Reporte ");
        $excel->setCellValue("D2", date("d-m-o"));

        $excel->setCellValue("B3", "MODULO COSTOS COPAG ");

        $excel->setCellValue("B5", "Reporte General.");
        //Encabezado de la tabla
        $excel->setCellValue("B6", "Codigo");
        $excel->setCellValue("C6", "Descripcion Estado");
        $excel->setCellValue("D6", "Nombre Solicitante");
        $excel->setCellValue("E6", "Empresa/Centro");
        $excel->setCellValue("F6", "Fecha Pedido");

        $n = 7;
        //Cuerpo de la tabla
        foreach ($consultPedidos as $consult) {

            $excel->setCellValue("B" . $n, "" . $consult['Ped_id']);
            $excel->setCellValue("C" . $n, "" . $consult['Est_nombre']);
            $excel->setCellValue("D" . $n, "" . $consult['Emp_nombre']);
            $excel->setCellValue("E" . $n, "" . $consult['Emp_razonSocial']);
            $excel->setCellValue("F" . $n, "" . $consult['Ped_fecha']);

            $n++;
        }
        $n = $n - 1;

        //Bordes del uerpo de la tabla
        $excel->getStyle('B7:F' . $n)
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN)
            ->setColor(new Color('000000'));

        //Activar Filtros
        $excel->setAutoFilter('B6:F6');

        $writer = new Xlsx($sheet);

        $filename = "reporteGeneralCostos.xlsx";
        $ruta = "Excel/" . $filename;
        // $writer=IOFactory::createWriter($filename,"Xlsx");

        try {
            $writer->save($ruta);
            // $writer->save($filename);

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($sheet, 'Xlsx');
        $objWriter->save('php://output');
    }
}
