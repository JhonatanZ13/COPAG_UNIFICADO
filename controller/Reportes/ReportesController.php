<?php
include_once '../model/Reportes/ReportesModel.php';

class ReportesController
{
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

    public function postControl()
    {
        include_once 'vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf(['setAutoTopMargin' => 'stretch']);
        $mpdf->SetTitle('Reporte_Actividades_Inventario');

        $obj = new ReportesModel();

        $sql = "SELECT * FROM tblarticulo";
        $pdf = $obj->consult($sql);

        $sql = "SELECT Maq_nombre, Maq_cantidad FROM TblMaquina";
        $maquina = $obj->consult($sql);

        $sql = "SELECT Her_nombre, Her_cantidad FROM TblHerramienta";
        $herramienta = $obj->consult($sql);

        $css = file_get_contents('build/css/Reportes.css');
        $header = '<table class="border-1 t-center">
            <tr>
              <td WIDTH="220" class="pb-3 b-right">
                <img src="images/logo_sena.png" width="80" height="80" class="pb-3"><br>
                Regional Valle del Cauca<br>
                Centro de diseño tecnologico industrial<br>
              </td>
              <td WIDTH="300" class="f-12 b-right">
                  <b>Reporte Control De Stock<br>
                  Inventario</b>
              </td>
            </tr>
          </table>';

        /* Dibujamos la tabla */
        $html .= "<table>"
        . "<tr>"
        . "<th>N°</th>"
        . "<th>Nombre</th>"
        . "<th>Cantidad</th>"
        . "</tr>";
        /* Dibujamos la tabla */
        
        /* contenido de la tabla */
            $j = 1;
            foreach ($pdf as $pdf) {
                $html .= "<tr>"
                . "<td>" . $j . "</td>"
                . "<td>" . $pdf['Arti_nombre'] . "</td>"
                . "<td>" . $pdf['Arti_cantidad'] . "</td>"
                . "</tr>";
                $j++;
            }
            foreach ($maquina as $maq) {
                $html .= "<tr>"
                . "<td>" . $j . "</td>"
                . "<td>" . $maq['Maq_nombre'] . "</td>"
                . "<td>" . $maq['Maq_cantidad'] . "</td>"
                . "</tr>";
                $j++;
            }
            foreach ($herramienta as $her) {
                $html .= "<tr>"
                . "<td>" . $j . "</td>"
                . "<td>" . $her['Her_nombre'] . "</td>"
                . "<td>" . $her['Her_cantidad'] . "</td>"
                . "</tr>";
                $j++;
            }
            $html .= "</table>";
        /* contenido de la tabla */

        $mpdf->setHeader($header);
        $mpdf->setFooter('<p>COPAG Artes Graficas {PAGENO} </p>');
        $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output("Inventario.pdf", "I");
    }



    /* aqui empieza el otro reporte */
    public function RegistroActividad()
    {
        include_once 'vendor/autoload.php';

        $fechaI = $_POST['fecha_inicial'];
        $fechaF = $_POST['fecha_final'];
        $mpdf = new \Mpdf\Mpdf(['setAutoTopMargin' => 'stretch']);
        $mpdf->SetTitle('Registro PDF');

        $obj = new ReportesModel();

        /* condicion para imprimir el pdf */
        if ($fechaI == "" && $fechaF == "") {
            $sql = "SELECT * FROM tblbitentrada";
        } else {
            $sql = "SELECT * FROM tblbitentrada 
                    WHERE tblbitentrada.bitfecha 
                    BETWEEN '$fechaI' AND '$fechaF'";
        }
        /*/condicion para imprimir el pdf */

        $pdf = $obj->consult($sql);
        $css = file_get_contents('build/css/Reportes.css');
        $header = '<table class="border-1 t-center">
            <tr>
              <td WIDTH="220" class="pb-3 b-right">
                <img src="images/logo_sena.png" width="80" height="80" class="pb-3"><br>
                Regional Valle del Cauca<br>
                Centro de diseño tecnologico industrial<br>
              </td>
              <td WIDTH="300" class="f-12 b-right">
                  <b>Reporte Registro de Actividades<br>
                  Inventario</b>
              </td>
            </tr>
          </table>';


        $html = "<table class='margen'>"
        . "<tr>"
        . "<th>N°</th>"
        . "<th>Fecha del registro</th>"
        . "<th>Descripcion de la accion</th>"
        . "</tr>";
        $i = 1;
        foreach ($pdf as $pdf) {
            $html .= "<tr>"
            . "<td>" . $i . "</td>"
            . "<td>" . $pdf['bitfecha'] . "</td>"
            . "<td>" . $pdf['bitdesc'] . "</td>"
            . "</tr>";
            $i++;
        }
        $html .= "</table>";

        $mpdf->defaultheaderline = 0;
        $mpdf->setHeader($header);
        $mpdf->setFooter('<p>COPAG Artes Graficas {PAGENO} </p>');
        $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output("Reporte_Registro.pdf", "I");
    }
}
