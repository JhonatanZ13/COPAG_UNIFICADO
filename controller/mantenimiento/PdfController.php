<?php

require_once '../model/mantenimiento/PdfModel.php';

class PdfController{

    public function getPdf(){
        echo "<a href='".getUrl("Pdf","Pdf","postPDF",false,"ajax")."'><button class='btn btn-success'>
        PDF</button></a>";
    }
    

    public function postPdf(){
        include_once 'vendor/autoload.php';

        $obj=new PdfModel();

        $odm_id=$_GET['Odm_id'];

        $sql = "SELECT o.odm_id, o.odm_fechainicio, o.odm_horainicio, o.odm_fechafin, o.odm_horafin, o.odm_tecnico, o.odm_observaciones, o.odm_observacionesfin,  m.maq_id, m.maq_nombre, u.usu_id, u.usu_primernombre, u.usu_primerapellido, s.stg_id, s.stg_nombre
        FROM tblordenmanto as o, tblmaquina as m, tblusuario as u, tblsubtipogeneral as s
        WHERE o.stg_id = s.stg_id AND o.maq_id = m.maq_id AND o.usu_id = u.usu_id
        AND o.odm_id = $odm_id"; 
        
        $orden = $obj->consult($sql);

        foreach ($orden as $odm) {
            $odm_id=$odm['odm_id'];      
            $odm_fechainicio=$odm['odm_fechainicio'];
            $odm_horainicio=$odm['odm_horainicio'];
            $odm_fechafin=$odm['odm_fechafin'];
            $odm_horafin=$odm['odm_horafin'];
            $odm_observaciones=$odm['odm_observaciones'];
            $odm_observacionesfin=$odm['odm_observacionesfin'];
            $odm_tecnico=$odm['odm_tecnico']; 
            $odm_primernombre=$odm['usu_primernombre'];
            $odm_primerapellido=$odm['usu_primerapellido'];
            $odm_maqid=$odm['maq_id'];
            $odm_maqnombre=$odm['maq_nombre'];
            $odm_stgid=$odm['stg_id'];
            $odm_stgnombre=$odm['stg_nombre'];

        }

        $sqlem = "SELECT o.odm_id, e.emp_id ,e.emp_razonsocial, e.emp_nit, e.emp_direccion, e.emp_primernumerocontacto
        FROM tblordenmanto as o, tblempresa as e
        WHERE o.emp_id = e.emp_id AND o.odm_id = $odm_id
        ";

        $ordenem = $obj->consult($sqlem);

        foreach ($ordenem as $odmem) {
            $odmem_id=$odmem['emp_id'];      
            $odmem_nit=$odmem['emp_nit'];      
            $odmem_razonsocial=$odmem['emp_razonsocial'];
            $odmem_direccion=$odmem['emp_direccion']; 
            $odmem_primernumerocontato=$odmem['emp_primernumerocontacto'];

        }
        $sqlde = "SELECT * FROM tblordenmantodetalle WHERE odm_id= $odm_id";
        $sqlpr = "SELECT * FROM tblproceso";
        $sqltr = "SELECT * FROM tbltarea";
        $sqlhr = "SELECT * FROM tblherramienta";
        $sqlar = "SELECT * FROM tblarticulo";

        $ordende = $obj->consult($sqlde);
        $ordenpr = $obj->consult($sqlpr);
        $ordentr = $obj->consult($sqltr);
        $ordenhr = $obj->consult($sqlhr);
        $ordenar = $obj->consult($sqlar);

        $html2="";
        $html3="";
        $html4="";
        $html5="";
        $espacio=" ";


foreach ($ordenpr as $odmpr) {
        foreach ($ordende as $odmde) {    
          if ($odmde['Pro_id']!=NULL && $odmpr['Pro_id'] == $odmde['Pro_id']) {
            $html2= $html2.' <table> <tr>
        <td class="b-bottom" width="10%">'.$odmpr['Pro_nombre'].'</td>
            </tr></table>
             ';
          }

        }
    
}

foreach ($ordentr as $odmtr) {
  foreach ($ordende as $odmde) {    
    if ($odmde['Tar_id']!=NULL && $odmtr['Tar_id'] == $odmde['Tar_id']) {
      $html3= $html3.' <table> <tr>
  <td class="b-bottom" width="10%">'.$odmtr['Tar_nombre'].'</td>
      </tr></table>
       ';
    }

  }

}

foreach ($ordenhr as $odmhr) {
  foreach ($ordende as $odmde) {    
    if ($odmde['Her_id']!=NULL && $odmhr['Her_id'] == $odmde['Her_id']) {
      $html4= $html4.' <table> <tr>
  <td class="b-bottom" width="10%">'.$odmhr['Her_nombre'].'</td>
      </tr></table>
       ';
    }

  }

}

foreach ($ordenar as $odmar) {
  foreach ($ordende as $odmde) {    
    if ($odmde['Arti_id']!=NULL && $odmar['Arti_id'] == $odmde['Arti_id']) {
      $html5= $html5.' <table> <tr>
  <td class="b-bottom" width="10%">'.$odmar['Arti_nombre'].'</td>
      </tr></table>
       ';
    }

  }

}

if ($odm_stgid == 20) {
    $html = '
        <table class="border-1 t-center">
          <tr>
            <td WIDTH="220" class="pb-3 b-right">
              <img src="../web/images/logo_sena.png" width="80" height="80" class="pb-3"><br>
              Regional Valle del Cauca<br>
              Centro de diseño tecnologico industrial<br>
            </td>
            <td WIDTH="300" class="f-12 b-right">
                <b>REPORTE ORDEN MANTENIMIENTO</b>
            </td>
            <td WIDTH="220" class="t-left b-right">
                Codigo de orden: '.$odm_id.'<br><br>
                Funcionario: '. $odm_primernombre .$espacio.$odm_primerapellido.'<br><br>
                Pagina: 1 de 1
            </td>
          </tr>
        </table>
        <br>
    
        <!-----Empresa ----->
        <div class="ln-solid"></div>
        <table>
          <tr>
            <TH COLSPAN=2 width="300px" height="50px" class="f-12 t-left">Empresa:</TH>
            <th width="85"></th>
            <TH COLSPAN=2 width="250px"  class="f-12 t-left"></TH>
          </tr>
    
          <tr>
            <th class="t-left h-20">NIT:</th>
            <td class="b-bottom" width="100px">'.$odmem_nit.'</td>
            <td></td>
            <th class="t-left h-20">Nombre:</th>
             <td class="b-bottom" width="100px">'.$odmem_razonsocial.'</td>
          </tr>
    
          <tr>
            <th class="t-left h-20">Telefono:</th>
             <td class="b-bottom">'. $odmem_primernumerocontato.'</td>
             <td></td>
            <th class="t-left h-20">Dirección:</th>
             <td class="b-bottom">'.$odmem_direccion.'</td>
          </tr>
    
          <tr>
            <th class="t-left h-20">Tecnico:</th>
              <td class="b-bottom">'.$odm_tecnico.'</td>
              <td></td>
          </tr>
    
    
    
        </table>
    
        <br>
    
    <div class="ln-solid"></div>
        <table>
          <tr>
            <TH COLSPAN=2 width="300px" height="50px" class="f-12 t-left">Descripción de la Orden:</TH>
            <th width="85"></th>
            <TH COLSPAN=2 width="250px"  class="f-12 t-left"></TH>
          </tr>
    
          <tr>
            <th class="t-left h-20">ID Maquina:</th>
            <td class="b-bottom" width="100px">'.$odm_maqid.'</td>
            <td></td>
            <th class="t-left h-20">Nombre Maquina:</th>
             <td class="b-bottom" width="100px">'.$odm_maqnombre.'</td>
          </tr>
    
          <tr>
          <th class="t-left h-20">ID Mantenimiento:</th>
          <td class="b-bottom" width="100px">'.$odm_stgid.'</td>
          <td></td>
          <th class="t-left h-20">Descripcion Mantenimiento:</th>
           <td class="b-bottom" width="100px">'.$odm_stgnombre.'</td>
          </tr>
    
          <tr>
            <th class="t-left h-20">Fecha Inicio:</th>
             <td class="b-bottom">'.$odm_fechainicio.'</td>
             <td></td>
            <th class="t-left h-20">Hora Inicio:</th>
             <td class="b-bottom">'.$odm_horainicio.'</td>
          </tr>
    
          <tr>
          <th class="t-left h-20">Fecha Fin:</th>
           <td class="b-bottom">'.$odm_fechafin.'</td>
           <td></td>
          <th class="t-left h-20">Hora Fin:</th>
           <td class="b-bottom">'.$odm_horafin.'</td>
          </tr>
    
          <tr>
            <th class="t-left h-20">Observaciones:</th>
              <td colspan="4">'.$odm_observaciones.'</td>
              <td></td>
          </tr>
    
    
    
        </table>
        <br>
    <div class="ln-solid"></div>
    <table border=20px color=black>
    <tr>
      <TH COLSPAN=1 width="10px" height="10px" class="f-12 t-left">Tareas:</TH>
      <th width="85"></th>
      <TH COLSPAN=1 width="150px"  class="f-12 t-left"></TH>
    </tr>
    
    <tr>
      <th class="t-left h-20"></th>
        <td COLSPAN=2 >'.$html3.'</td>
        <td></td>
    </tr>
    
    </table>
    <br>
    <div class="ln-solid"></div>
    <table border=20px color=black>
    <tr>
      <TH COLSPAN=1 width="10px" height="10px" class="f-12 t-left">Procesos:</TH>
      <th width="85"></th>
      <TH COLSPAN=1 width="150px"  class="f-12 t-left"></TH>
    </tr>
    
    <tr>
      <th class="t-left h-20"></th>
        <td COLSPAN=2 >'.$html2.'</td>
        <td></td>
    </tr>
    
    </table>
    
    
    
    <br><div class="ln-solid"></div>
    <table border=20px color=black>
    <tr>
      <TH COLSPAN=1 width="10px" height="10px" class="f-12 t-left">Herramientas:</TH>
      <th width="85"></th>
      <TH COLSPAN=1 width="150px"  class="f-12 t-left"></TH>
    </tr>
    
    <tr>
      <th class="t-left h-20"></th>
        <td COLSPAN=2 >'.$html4.'</td>
        <td></td>
    </tr>
    
    </table>
    <br>
    
    <div class="ln-solid"></div>
    <table border=20px color=black>
    <tr>
      <TH COLSPAN=1 width="10px" height="10px" class="f-12 t-left">Articulos:</TH>
      <th width="85"></th>
      <TH COLSPAN=1 width="150px"  class="f-12 t-left"></TH>
    </tr>
    
    <tr>
      <th class="t-left h-20"></th>
        <td COLSPAN=2 >'.$html5.'</td>
        <td></td>
    </tr>
    
    </table>
    <br>
    
    
    <!----- Observaciones Finales -------->
        <div class="ln-solid"></div><br>
        <table class="b-top-3">
          <tr>
            <th COLSPAN=2 class="f-12 t-left h-20">Observaciones Finales:</th>
          </tr>
          <textarea width="100%" height="100px">'.$odm_observacionesfin.'</textarea>
        </table>
    
        ';
    
    
    } else if ($odm_stgid == 19 || $odm_stgid == 21) {
        $html = '
        <table class="border-1 t-center">
          <tr>
            <td WIDTH="220" class="pb-3 b-right">
              <img src="../web/images/logo_sena.png" width="80" height="80" class="pb-3"><br>
              Regional Valle del Cauca<br>
              Centro de diseño tecnologico industrial<br>
            </td>
            <td WIDTH="300" class="f-12 b-right">
                <b>REPORTE ORDEN MANTENIMIENTO</b>
            </td>
            <td WIDTH="220" class="t-left b-right">
                Codigo de orden: '.$odm_id.'<br><br>
                Funcionario: '. $odm_primernombre .$espacio.$odm_primerapellido.'<br><br>
                Pagina: 1 de 1
            </td>
          </tr>
        </table>
        <br>
    
        <!-----Empresa ----->
        <div class="ln-solid"></div>
        <table>
          <tr>
            <TH COLSPAN=2 width="300px" height="50px" class="f-12 t-left">Responsable:</TH>
            <th width="85"></th>
            <TH COLSPAN=2 width="250px"  class="f-12 t-left"></TH>
          </tr>
    
          <tr>
            <th class="t-left h-20">Tecnico:</th>
              <td class="b-bottom">'.$odm_tecnico.'</td>
              <td></td>
          </tr>
    
        </table>
    
        <br>
    
    <div class="ln-solid"></div>
        <table>
          <tr>
            <TH COLSPAN=2 width="300px" height="50px" class="f-12 t-left">Descripción de la Orden:</TH>
            <th width="85"></th>
            <TH COLSPAN=2 width="250px"  class="f-12 t-left"></TH>
          </tr>
    
          <tr>
            <th class="t-left h-20">ID Maquina:</th>
            <td class="b-bottom" width="100px">'.$odm_maqid.'</td>
            <td></td>
            <th class="t-left h-20">Nombre Maquina:</th>
             <td class="b-bottom" width="100px">'.$odm_maqnombre.'</td>
          </tr>
    
          <tr>
          <th class="t-left h-20">ID Mantenimiento:</th>
          <td class="b-bottom" width="100px">'.$odm_stgid.'</td>
          <td></td>
          <th class="t-left h-20">Descripcion Mantenimiento:</th>
           <td class="b-bottom" width="100px">'.$odm_stgnombre.'</td>
          </tr>
    
          <tr>
            <th class="t-left h-20">Fecha Inicio:</th>
             <td class="b-bottom">'.$odm_fechainicio.'</td>
             <td></td>
            <th class="t-left h-20">Hora Inicio:</th>
             <td class="b-bottom">'.$odm_horainicio.'</td>
          </tr>
    
          <tr>
          <th class="t-left h-20">Fecha Fin:</th>
           <td class="b-bottom">'.$odm_fechafin.'</td>
           <td></td>
          <th class="t-left h-20">Hora Fin:</th>
           <td class="b-bottom">'.$odm_horafin.'</td>
          </tr>
    
    
          <tr>
            <th class="t-left h-20">Observaciones:</th>
              <td colspan="4">'.$odm_observaciones.'</td>
              <td></td>
          </tr>
    
    
    
        </table>
        
    <br>
    <div class="ln-solid"></div>
    <table border=20px color=black>
    <tr>
      <TH COLSPAN=1 width="10px" height="10px" class="f-12 t-left">Tareas:</TH>
      <th width="85"></th>
      <TH COLSPAN=1 width="150px"  class="f-12 t-left"></TH>
    </tr>
    
    <tr>
      <th class="t-left h-20"></th>
        <td COLSPAN=2 >'.$html3.'</td>
        <td></td>
    </tr>
    
    </table>
    <br>
    <div class="ln-solid"></div>
    <table border=20px color=black>
    <tr>
      <TH COLSPAN=1 width="10px" height="10px" class="f-12 t-left">Procesos:</TH>
      <th width="85"></th>
      <TH COLSPAN=1 width="150px"  class="f-12 t-left"></TH>
    </tr>
    
    <tr>
      <th class="t-left h-20"></th>
        <td COLSPAN=2 >'.$html2.'</td>
        <td></td>
    </tr>
    
    </table>
    
    
    
    <br><div class="ln-solid"></div>
    <table border=20px color=black>
    <tr>
      <TH COLSPAN=1 width="10px" height="10px" class="f-12 t-left">Herramientas:</TH>
      <th width="85"></th>
      <TH COLSPAN=1 width="150px"  class="f-12 t-left"></TH>
    </tr>
    
    <tr>
      <th class="t-left h-20"></th>
        <td COLSPAN=2 >'.$html4.'</td>
        <td></td>
    </tr>
    
    </table>
    <br>
    
    <div class="ln-solid"></div>
    <table border=20px color=black>
    <tr>
      <TH COLSPAN=1 width="10px" height="10px" class="f-12 t-left">Articulos:</TH>
      <th width="85"></th>
      <TH COLSPAN=1 width="150px"  class="f-12 t-left"></TH>
    </tr>
    
    <tr>
      <th class="t-left h-20"></th>
        <td COLSPAN=2 >'.$html5.'</td>
        <td></td>
    </tr>
    
    </table>
    <br>
    
    <!----- Observaciones Finales -------->
        <div class="ln-solid"></div><br>
        <table class="b-top-3">
          <tr>
            <th COLSPAN=2 class="f-12 t-left h-20">Observaciones Finales:</th>
          </tr>
          <textarea width="100%" height="100px">'.$odm_observacionesfin.'</textarea>
        </table>
    
        ';
    
    }

        $mpdf=new \Mpdf\Mpdf();

        $mpdf->SetTitle("Orden Mantenimiento");


    $css=file_get_contents('build/css/PdfStyle.css'); 
    
    $mpdf->WriteHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);

        $mpdf->WriteHtml($html,\Mpdf\HTMLParserMode::HTML_BODY);

        $mpdf->Output("Orden.pdf","I");

    }

}

?>