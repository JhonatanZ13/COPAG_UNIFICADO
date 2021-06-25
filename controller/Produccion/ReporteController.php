<?php
    include_once '../model/Produccion/ReporteModel.php';
    require_once 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\Style\Border;
    use PhpOffice\PhpSpreadsheet\Style\Color;

    class ReporteController{
        
        public function getMainReporte(){
            $obj = new ReporteModel();
            $sql = "SELECT * FROM tbltipoempresa WHERE Tempr_id = 3 || Tempr_id = 4 || Tempr_id = 5";
            $tipocliente = $obj->consult($sql);

            $sql = "SELECT * FROM tblproductobase";
            $productos = $obj->consult($sql);
            include_once '../view/Produccion/ReporteProduccion/reporteProduccion.php';
        }

        public function postExcel(){

            $obj = new ReporteModel();
            $inicio = date('Y-m-d', strtotime($_POST['inicio']));
            $fin = date('Y-m-d', strtotime($_POST['fin']));
            
            $sql = "SELECT o.Odp_id, e.Emp_razonSocial, pb.Pba_descripcion, pt.Pte_cantidad, o.Odp_fechaCreacion, u.Usu_primerNombre, u.Usu_primerApellido
            FROM tblusuario u, tblordenproduccion o, tblempresa e, tblproductobase pb, tblproductoterminado pt
            WHERE o.Usu_id = u.Usu_id
            AND o.Emp_id = e.Emp_id
            AND o.Pte_id = pt.Pte_id
            AND pt.Pba_id = pb.Pba_id
            AND o.Odp_fechaCreacion BETWEEN '$inicio' AND '$fin'";
            $datos = $obj->consult($sql);


            $sheet = new Spreadsheet();
            $fechaActual = date('d-m-Y H:i:s');
                  
            $excel = $sheet->getActiveSheet();
            //Bordes de los headers de la tabla
            $excel->getStyle('B5:G5')
                    ->getBorders()
                    ->getAllBorders()
                    ->setBorderStyle(Border::BORDER_THICK)
                    ->setColor(new Color('000000'));

            //Celdas combinadas
            $excel->mergeCells('B2:C2');
            $excel->mergeCells('B3:C3');
            //Activar fuente en negrita
            $excel->getStyle('B2:G5')->getFont()->setBold(true);
            //Dar tamaño a columnas
            $excel->getColumnDimension('C')->setWidth(50);
            $excel->getColumnDimension('D')->setWidth(20);
            $excel->getColumnDimension('E')->setWidth(20);
            $excel->getColumnDimension('F')->setWidth(25);
            $excel->getColumnDimension('G')->setWidth(30);

            //Aqui enpieza los titulos del reporte
            $excel->setCellValue("B2","REPORTE DE PRODUCCION");
            $excel->setCellValue("B3","Fecha de reporte: ".$fechaActual);
            //Encabezado de la tabla
            $excel->setCellValue("B5","CODIGO");
            $excel->setCellValue("C5","CLIENTE");
            $excel->setCellValue("D5","PRODUCTO");
            $excel->setCellValue("E5","CANTIDAD");
            $excel->setCellValue("F5","FECHA DE CREACION");
            $excel->setCellValue("G5","ENCARGADO");

            $n = 6;
            //Cuerpo de la tabla
            foreach ($datos as $d){

                $excel->setCellValue("B".$n,"".$d['Odp_id']);
                $excel->setCellValue("C".$n,"".$d['Emp_razonSocial']);
                $excel->setCellValue("D".$n,"".$d['Pba_descripcion']);
                $excel->setCellValue("E".$n,"".$d['Pte_cantidad']);
                $excel->setCellValue("F".$n,"".$d['Odp_fechaCreacion']);
                $excel->setCellValue("G".$n,"".$d['Usu_primerNombre']." ".$d['Usu_primerApellido']);
                $n++;
            }
            $n = $n-1;

            //Bordes del uerpo de la tabla
            $excel->getStyle('B6:G'.$n)
                    ->getBorders()
                    ->getAllBorders()
                    ->setBorderStyle(Border::BORDER_THIN)
                    ->setColor(new Color('000000'));
            
            //Activar Filtros
            $excel->setAutoFilter('B5:F8');


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