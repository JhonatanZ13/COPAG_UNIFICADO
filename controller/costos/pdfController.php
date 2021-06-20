<?php 
include_once '../model/Costos/pdfModel.php';

class pdfController{
   
    public function postSolicitudPdf(){
        $obj=new pdfModel();
        include_once 'vendor/autoload.php';
        extract($_GET); 

        // $sql="SELECT tblpedido.Tempr_id FROM tblpedido WHERE tblpedido.Ped_id=$Ped_id";
        // $ejecutar=$obj->consult($sql);
        // $Tempr_id=mysqli_fetch_row($ejecutar);
        // $Tempr_id=$Tempr_id[0];
        // echo $Tempr_id;
            
        $sql="SELECT tblpedido.Tempr_id,tblpedido.Ped_fecha,tblpedido.Ped_objetivo,tblpedido.Ped_plazoEjecucionDias,tblpedido.Ped_plazoEjecucionMeses,tblcentro.Cen_nombre,tblempresa.Emp_razonSocial,tbldepartamento.Dep_nombre,tblmunicipio.Mun_nombre,tblregional.Reg_descripcion,tblpedido.Ped_lugarEjecucionCiu,tblpedido.Ped_lugarEjecucionCen
        FROM tblpedido,tblcentro,tblempresa,tbldepartamento,tblmunicipio,tblregional
         WHERE tblpedido.Ped_id=$Ped_id
         AND tblpedido.Cen_id=tblcentro.Cen_id
         AND tblempresa.Emp_id=tblpedido.Emp_id
         AND tblpedido.Dep_id=tbldepartamento.Dep_id
         AND tblmunicipio.Mun_id=tblpedido.Mun_id
          AND tblcentro.Reg_id=tblregional.Reg_id";

        $pedido=$obj->consult($sql);

        // $sql="SELECT * FROM Tblcentro";
        // $centro=$obj->consult($sql);
        // $sql="SELECT * FROM Tblmunicipio";
        // $municipio=$obj->consult($sql);
       

        // $sql="SELECT * FROM tbldetallepedido WHERE Ped_id=$Ped_id";
        // $tproducto=$obj->consult($sql);
        
    //     $html="<div id='solicitudpdf'>";

    //     $html.="<div id='opacidad-encabezado'>";
            
    //     $html.="<table class='encabezadoC'>
    //     <tr>
    //     <td>
        
    //     <img class='' src='images/encabezadopdf.jpg'>
      
    //     </td>
    //     <td>
    //     <h3 class='tituloc' >SERVICIO NACIONAL DE APRENDIZAJE SENA 
    //     FORMATO SOLICITUD DE COTIZACI&Oacute;N</h3>
    //     </td>
    //     </tr>
    //     </table>
    //     ";
    //     $html.="</div>";

    //     foreach ($pedido as $ped){
    //          setlocale(LC_ALL, "spanish");
    //          $html.=$ped['Mun_nombre']." , ".ucwords(strftime("%d de %B de %Y",strtotime($ped['Ped_fecha'])))."<br>";
    //         // $html.=$ped['Emp_razonSocial'];
    //          $html.="Se&ntilde;or(a)"."<br>";
    //          $html.="N&eacute;stor Espitia Torres"."<br>";
    //          $html.="Cordinador(a)"."<br>";
    //          $html.="CENTRO DE DISE&Ntilde;O TECNOLOGICO INDUSTRIAL"."<br>";
    //          $html.="Regional "."Valle"."<br>";
    //          $html.="Ciudad "."Cali"."<br>";
    //          $html.="<p style='text-align:right;'><b>ASUNTO:</b>Solicitud Cotizaci&oacute;n de Productos o Servicios</p>"."<br>";

    //          $html.="Respetado Subdirector;"."<br>";
     

    //     $html.="<p>En forma atenta me permito solicitar cotizaci&oacute;n para ".$ped['Ped_objetivo']."; como Subdirector del CENTRO DE ".$ped['Cen_nombre'].",
    //      del SENA, Regional ".$ped['Reg_descripcion']." manifiesto la intenci&oacute;n de adquirir los productos con las siguientes consideraciones:</p>";
          
    //      $html.= "<p><b>OBJETO. Adquirir los productos o servicios ".$ped['Ped_objetivo']."</b>, atendiendo el siguiente cuadro de especificaciones:</p>"."<br>";
    //     }

    //     $html.='<table id="tablaps">';
    //     $html.='<tr>
    //     <th><p>No. &Iacute;TEM</p></th>
    //     <th>PRODUCTO</th>
    //     <th>CANTIDAD</th>
    //     <th colspan="3">DESCRIPCI&Oacute;N</th>
        
    //      </tr>';

    //      $cont=0;
    //      foreach ($tproducto as $tp){
    //         $cont++;
    //         $html.="<tr>";  
    //         $html.='<td>'.$cont.'</td>';
    //         $html.='<td>'.$tp['Dep_nombreP'].'</td>';
    //         $html.='<td>'.$tp['Dpe_cantidad'].'</td>';
    //   $html.='<td colspan="3">'.$tp['Dep_descripcion'].'</td>';
     

    //   $html.='</tr>'; }
    //   $html.='</table>';
      
    //       $html.='<p><b>PLAZO PARA LA EJECUCI&Oacute;N DEL PRODUCTO O SERVICIO.</b>Ser&aacute; de ('.$ped['Ped_plazoEjecucionMeses'].') mes con ('.$ped['Ped_plazoEjecucionDias'].') dias,</p>';

    //       foreach ($centro as $cen){
    //           if ($cen['Cen_id']==$ped['Ped_lugarEjecucionCen']){
    //               $nomCen=$cen['Cen_nombre'];
    //           }
    //       }
    //       foreach ($municipio as $mun){
    //         if ($mun['Mun_id']==$ped['Ped_lugarEjecucionCiu']){
    //             $nomMun=$mun['Mun_nombre'];
    //         }
    //     }
    //       $html.='<p><b>LUGAR DE EJECUCI&Oacute;N.</b> La entrega y ubicaci&oacute;n se realizar&aacute; en la ciudad de '.$nomMun.', en las instalaciones del CENTRO DE     '.$nomCen.', o seg&uacute;n lo indicado por el supervisor.</p><br>';

    //       $html.='<br><b>'.strtoupper($ped['subdirector']).'</b><br>';
    //       $html.='CENTRO DE '.strtoupper($ped['Cen_nombre']);

       
    //     $html.="</div>";

    //      $css= file_get_contents('build/css/costos.css');
        
    //     $mpdf=new \Mpdf\Mpdf();
    //     $mpdf->SetTitle("Solicitud No. ".$Ped_id);        
    //     $mpdf->WriteHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
    //     $mpdf->WriteHtml($html,\Mpdf\HTMLParserMode::HTML_BODY);
    //     $mpdf->Output("Solicitud de cotizacion No. ".$Ped_id.".pdf","I");
     }
}



?>