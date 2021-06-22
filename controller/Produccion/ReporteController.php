<?php
    include_once '../model/Produccion/ReporteModel.php';
    require_once 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\IOFactory;

    class ReporteController{
        
        public function getMainReporte(){
            $obj = new ReporteModel();
            $sql = "SELECT * FROM tbltipoempresa WHERE Tempr_id = 3 || Tempr_id = 4 || Tempr_id = 5";
            $tipocliente = $obj->consult($sql);

            $sql = "SELECT * FROM tblproductobase";
            $productos = $obj->consult($sql);
            include_once '../view/Produccion/Inicio/reporteProduccion.php';
        }

        public function postExcel(){

            $obj = new ReporteModel();
            $sheet = new Spreadsheet();
            $excel = $sheet->getActiveSheet();
            $excel->getAutoFilter('A1:B1');
            $excel->setCellValue("A1","Hola mundo");
            $excel->setCellValue("A2","Hola mundo");
            $excel->setCellValue("A3","Hola mundo");
            $excel->setCellValue("B1","1");
            
            $writer = new Xlsx($sheet);
            
            $filename = "Reporte.xlsx";
            $ruta = "Excel/".$filename;
            try {
                $writer->save($ruta);
            } catch (Exception $e) {
                echo $e->getMessage();
            }

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0');

            $objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($sheet, 'Xlsx');
            $objWriter->save('php://output');
            unlink($ruta);
        }
    }


?>