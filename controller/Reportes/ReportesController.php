<?php
    include_once '../model/Reportes/ReportesModel.php';

    class ReportesController{
        public function getReporte(){
            include_once '../view/Inventario/Reportes/Reportes.php';
        }
        public function Entrada(){
        include_once '../view/Inventario/Reportes/Entrada.php';
        }
        public function Salida(){
        include_once '../view/Inventario/Reportes/Salida.php';
        }
        public function Control(){
        include_once '../view/Inventario/Reportes/Control.php';
        }

        public function postControl(){
            include_once 'vendor/autoload.php';
            $mpdf=new \Mpdf\Mpdf();
            $mpdf->SetTitle('Mi Primer PDF');

            $obj=new ReportesModel();
            $sql="SELECT * FROM tblarticulo";
            $pdf=$obj->consult($sql);
            
            $css=file_get_contents('build/css/Reportes.css');   
            /*$html='<table class="border-1 t-center">
            <tr>
              <td WIDTH="220" class="pb-3 b-right">
                <img src="images/logo_sena.png" width="80" height="80" class="pb-3"><br>
                Regional Valle del Cauca<br>
                Centro de diseño tecnologico industrial<br>
              </td>
              <td WIDTH="300" class="f-12 b-right">
                  <b>Reporte Control de stock<br>
                  Inventario</b>
              </td>
              <td WIDTH="220" class="t-left b-right">
                  Pagina: 1 de 2
              </td>
            </tr>
          </table>';*/

            $html.="<table class='margen'>" ;
                $html.="<tr>";
                    $html.="<th>N°</th>";
                    $html.="<th>Nombre</th>";
                    $html.="<th>Cantidad</th>";
                $html.="</tr>";
            $j=1;
                foreach ($pdf as $pdf) {
                    $html.="<tr>";
                        $html.="<td>".$j."</td>";
                        $html.="<td>".$pdf['Arti_nombre']."</td>";
                        $html.="<td>".$pdf['Arti_cantidad']."</td>";
                    $html.="</tr>";
                    $j++;
                }
            $html.="</table>";
           
            $mpdf->setFooter('{PAGENO}');
            $mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
            $mpdf->Output("Mi primer pdf.pdf","I");
        }
        public function RegistroActividad(){

            include_once 'vendor/autoload.php';

            $fechaI=$_POST['fecha_inicial'];
            $fechaF=$_POST['fecha_final'];
            $mpdf=new \Mpdf\Mpdf();
            $mpdf->SetTitle('Mi Primer PDF');

            $obj=new ReportesModel();
            $sql="SELECT * FROM tblbitentrada WHERE tblbitentrada.bitfecha BETWEEN '$fechaI' AND '$fechaF'";
            $pdf=$obj->consult($sql);

            $css=file_get_contents('build/css/Reportes.css');         
            $html='<table class="border-1 t-center">
            <tr>
              <td WIDTH="220" class="pb-3 b-right">
                <img src="images/logo_sena.png" width="80" height="80" class="pb-3"><br>
                Regional Valle del Cauca<br>
                Centro de diseño tecnologico industrial<br>
              </td>
              <td WIDTH="300" class="f-12 b-right">
                  <b>Reportes De Actividades<br>
                  Inventario</b>
              </td>
              <td WIDTH="220" class="t-left b-right">
                  Pagina: 1 de 1
              </td>
            </tr>
          </table>';
            $html.="<h1>Registro de actividades</h1>";

            $html.="<table>" ;
                $html.="<tr>";
                    $html.="<th>N°</th>";
                    $html.="<th>Fecha del registro</th>";
                    $html.="<th>Descripcion de la accion</th>";

                $html.="</tr>";
                $i=1;
                foreach ($pdf as $pdf) {
                    $html.="<tr>";
                        $html.="<td>".$i."</td>";
                        $html.="<td>".$pdf['bitfecha']."</td>";
                        $html.="<td>".$pdf['bitdesc']."</td>";
                    $html.="</tr>";
                    $i++;
                }
            $html.="</table>";
            $mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
            $mpdf->Output("Mi primer pdf.pdf","I");


        } 
    }
?>