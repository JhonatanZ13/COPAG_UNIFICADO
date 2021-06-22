<?php
include_once '../model/Excel/ExcelModel.php';
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelController{
    public function getExcel(){
        echo "<a href='" . getUrl("Costos", "Excel", "postExcel", false, 'ajax') . "' target='_blank'><button class='btn btn-primary mt-5'>Generar EXCEL</button></a>";
    }

    public function postExcel(){
        $sheet = new Spreadsheet();
        $excel = $sheet->getActiveSheet();

        $excel->setCellValue("A1","Hola mundo");
        
        $writer = new Xlsx($sheet);

        $filename = "Prueba.xlsx";
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
    }
}

?>