<?php 
include_once '../model/Costos/pdfModel.php';

class pdfController{
   
    public function postSolicitudPdf(){
        $obj=new pdfModel();
        include_once 'vendor/autoload.php';
        extract($_GET); 

        $sql="SELECT tblpedido.Tempr_id FROM tblpedido WHERE tblpedido.Ped_id=$Ped_id";
        $ejecutar=$obj->consult($sql);
        $Tempr_id=mysqli_fetch_row($ejecutar);
        $Tempr_id=$Tempr_id[0];
        
            if ($Tempr_id==5){
                 echo $Tempr_id;
                $sql="SELECT tblempresa.Emp_NIT,tblempresa.Emp_nombreContacto,tblempresa.Emp_apellidoContacto,tbltipoempresa.Tempr_descripcion,tblusuario.Usu_primerNombre,tblusuario.Usu_segundoNombre,tblusuario.Usu_primerApellido,tblusuario.Usu_segundoApellido,tblpedido.Ped_fecha,tblpedido.Ped_objetivo,tblpedido.Ped_plazoEjecucionDias,tblpedido.Ped_plazoEjecucionMeses,tblempresa.Emp_razonSocial,tbldepartamento.Dep_nombre,tblmunicipio.Mun_nombre,tblpedido.Ped_lugarEjecucionCiu,tblpedido.Ped_lugarEjecucionCen 
                FROM tblpedido,tblempresa,tbldepartamento,tblmunicipio,tblusuario,tbltipoempresa
                WHERE tblpedido.Ped_id=$Ped_id
                AND tblempresa.Emp_id=tblpedido.Emp_id
                AND tblpedido.Dep_id=tbldepartamento.Dep_id 
                AND tblmunicipio.Mun_id=tblpedido.Mun_id
                AND tblusuario.Usu_id=tblpedido.destinatario
                AND tbltipoempresa.Tempr_id=tblpedido.Tempr_id";

        $pedido=$obj->consult($sql);
     }
            else{
                $sql="SELECT tbltipoempresa.Tempr_descripcion,tblempresa.Emp_nombreContacto,tblempresa.Emp_apellidoContacto,tblusuario.Usu_primerNombre,tblusuario.Usu_segundoNombre,tblusuario.Usu_primerApellido,tblusuario.Usu_segundoApellido,tblpedido.Ped_fecha,tblpedido.Ped_objetivo,tblpedido.Ped_plazoEjecucionDias,tblpedido.Ped_plazoEjecucionMeses,tblcentro.Cen_nombre,tblempresa.Emp_razonSocial,tbldepartamento.Dep_nombre,tblmunicipio.Mun_nombre,tblregional.Reg_descripcion,tblpedido.Ped_lugarEjecucionCiu,tblpedido.Ped_lugarEjecucionCen
                FROM tblpedido,tblcentro,tblempresa,tbldepartamento,tblmunicipio,tblregional,tblusuario,tbltipoempresa
                 WHERE tblpedido.Ped_id=$Ped_id
                 AND tblpedido.Cen_id=tblcentro.Cen_id
                 AND tblempresa.Emp_id=tblpedido.Emp_id
                 AND tblpedido.Dep_id=tbldepartamento.Dep_id
                 AND tblmunicipio.Mun_id=tblpedido.Mun_id
                  AND tblusuario.Usu_id=tblpedido.destinatario
                  AND tbltipoempresa.Tempr_id=tblpedido.Tempr_id";

        $pedido=$obj->consult($sql);

            }

            $sql="SELECT * FROM Tblmunicipio";
            $municipio=$obj->consult($sql);
   
            $sql="SELECT * FROM Tblcentro";
            $centro=$obj->consult($sql);
   
        
        $sql="SELECT tblproductobase.Pba_descripcion,tbldetallepedido.Dpe_cantidad,tbldetallepedido.Dep_descripcion 
        FROM tbldetallepedido,tblproductobase
         WHERE Ped_id=$Ped_id
         AND tbldetallepedido.Pba_id=tblproductobase.Pba_id ";
        $tproducto=$obj->consult($sql);
        
       // encabezado
        $html="<div id='solicitudpdf'>";

        $html.="<div id='opacidad-encabezado'>";
            
        $html.="<table class='encabezadoC'>
        <tr>
        <td>
        
        <img class='' src='images/encabezadopdf.jpg'>
      
        </td>
        <td>
        <h3 class='tituloc' >SERVICIO NACIONAL DE APRENDIZAJE SENA 
        FORMATO SOLICITUD DE COTIZACI&Oacute;N</h3>
        </td>
        </tr>
        </table>";
        $html.="</div>";

             //   destinatario (la emite el remitente para el CDTI)
        foreach ($pedido as $ped){ }
             setlocale(LC_ALL, "spanish");
             $html.=$ped['Mun_nombre']." , ".ucwords(strftime("%d de %B de %Y",strtotime($ped['Ped_fecha'])))."<br>";
            $html.=$ped['Emp_razonSocial'];
             $html.="Se&ntilde;or(a)"."<br>";
             $html.="N&eacute;stor Espitia Torres"."<br>";
             $html.="Cordinador(a)"."<br>";
             $html.="CENTRO DE DISE&Ntilde;O TECNOLOGICO INDUSTRIAL"."<br>";
             $html.="Regional "."Valle"."<br>";
             $html.="Ciudad "."Cali"."<br>";
            
           
           

            if($Tempr_id==5 || $Tempr_id==4){$cx="-".$ped['Tempr_descripcion'];}else{$cx=" ";}
            $html.="<p style='text-align:right;'><b>ASUNTO:</b>Solicitud Cotizaci&oacute;n de Productos o Servicios ".$cx."</p>"; 
            
            $html.="Respetado Subdirector;"."<br>";

          //  Nota formal 
            if($Tempr_id==3){

                $html.="<p>En forma atenta me permito solicitar cotizaci&oacute;n para ".$ped['Ped_objetivo']."; como Subdirector del CENTRO DE ".$ped['Cen_nombre'].",
                del SENA, Regional ".$ped['Reg_descripcion']." manifiesto la intenci&oacute;n de adquirir los productos con las siguientes consideraciones:</p>";
                 
                $html.= "<p><b>OBJETO. Adquirir los productos o servicios ".$ped['Ped_objetivo']."</b>, atendiendo el siguiente cuadro de especificaciones:</p>"."<br>";
               
       
            }else if($Tempr_id==5){
                $html.="<p>En forma atenta me permito solicitar cotizaci&oacute;n para ".$ped['Ped_objetivo']."; como ".$ped['Emp_nombreContacto']." ".$ped['Emp_apellidoContacto'].",
                de la empresa,".$ped['Emp_razonSocial']." con NIT.".$ped['Emp_NIT'].", manifiesto la intenci&oacute;n de adquirir los productos con las siguientes consideraciones:</p>";
                 
                $html.= "<p><b>OBJETO. Adquirir los productos o servicios ".$ped['Ped_objetivo']."</b>, atendiendo el siguiente cuadro de especificaciones:</p>"."<br>";
               
            }else if ($Tempr_id==4){
                 
                $html.="<p>En forma atenta me permito solicitar cotizaci&oacute;n para ".$ped['Ped_objetivo']."; como solicitud Sena 
                 auto-consumo, manifestando la intenci&oacute;n de adquirir los productos con las siguientes consideraciones:</p>";
                 
                $html.= "<p><b>OBJETO. Adquirir los productos o servicios ".$ped['Ped_objetivo']."</b>, atendiendo el siguiente cuadro de especificaciones:</p>"."<br>";

            }
       
       // tabla de productos
        $html.='<table id="tablaps">';
        $html.='<tr>
        <th><p>No. &Iacute;TEM</p></th>
        <th>PRODUCTO</th>
        <th>CANTIDAD</th>
        <th colspan="3">DESCRIPCI&Oacute;N</th>
        
         </tr>';

         $cont=0;
         foreach ($tproducto as $tp){
            $cont++;
            $html.="<tr>";  
            $html.='<td>'.$cont.'</td>';
            $html.='<td>'.$tp['Pba_descripcion'].'</td>';
            $html.='<td>'.$tp['Dpe_cantidad'].'</td>';
      $html.='<td colspan="3">'.$tp['Dep_descripcion'].'</td>';
     

      $html.='</tr>'; }
      $html.='</table>';
      
          $html.='<p><b>PLAZO PARA LA EJECUCI&Oacute;N DEL PRODUCTO O SERVICIO.</b>Ser&aacute; de ('.$ped['Ped_plazoEjecucionMeses'].') mes con ('.$ped['Ped_plazoEjecucionDias'].') dias,</p>';

          foreach ($centro as $cen){
              if ($cen['Cen_id']==$ped['Ped_lugarEjecucionCen']){
                  $nomCen=$cen['Cen_nombre'];
              }
          }
          foreach ($municipio as $mun){
            if ($mun['Mun_id']==$ped['Ped_lugarEjecucionCiu']){
                $nomMun=$mun['Mun_nombre'];
            }
        }
          $html.='<p><b>LUGAR DE EJECUCI&Oacute;N.</b> La entrega y ubicaci&oacute;n se realizar&aacute; en la ciudad de '.$nomMun.', en las instalaciones del CENTRO DE     '.$nomCen.', o seg&uacute;n lo indicado por el supervisor.</p><br>';



         
         
            $html.=strtoupper($ped['Emp_razonSocial']);
            $html.='<br><b>'.strtoupper($ped['Emp_nombreContacto'])." ".strtoupper($ped['Emp_apellidoContacto']).'</b><br>';
       

       
        $html.="</div>";

         $css= file_get_contents('build/css/costos.css');
        
        $mpdf=new \Mpdf\Mpdf();
        $mpdf->SetTitle("Solicitud de cotizacion No. ".$Ped_id);        
        $mpdf->WriteHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHtml($html,\Mpdf\HTMLParserMode::HTML_BODY);
        $ruta="PdfCostos/solicitud/Solicitud de cotizacion-".$ped['Tempr_descripcion']." No. ".$Ped_id.".pdf";
        $mpdf->Output($ruta,'F');


        





        
        if ($mpdf){
            
            $sql="UPDATE `tblpedido` SET `Ped_ruta_pdf`='".$ruta."' WHERE `tblpedido`.`Ped_id` = $Ped_id";
            $ejecutar= $obj->update($sql);
            
            //redirect(getUrl("costos","solicitud","consult"));
           
            //Enviar correo
            // redirect(getUrl("costos","solicitud","consult"));
            redirect(getUrl("Mail","Mail","postAprobacionSolicitud",array("Ped_id"=>$Ped_id),"ajax"));

        }
      
    }

    public function postCotizacionPdf(){
        $obj=new pdfModel();
        include_once 'vendor/autoload.php';

        extract($_GET);

        // echo '<script>alert("hola");</script>';
        $sql="SELECT
        ped.Ped_id,
        CONCAT(emp.Emp_nombreContacto,' ',emp.Emp_apellidoContacto) AS Emp_nombre,
        emp.Emp_razonSocial,
        mun.Mun_nombre,
        ped.Ped_fecha,
        ped.Ped_objetivo,
        dep.Dep_nombre,
        ped.Ped_plazoEjecucionDias,
        ped.Ped_plazoEjecucionMeses,
        ped.Ped_plazoEjecucionMeses,
        ped.Ped_lugarEjecucionCiu,
        ped.Ped_lugarEjecucionCen      
        FROM
        tbldepartamento AS dep,
        tblestado AS est,
        tblpedido AS ped,
        tblempresa AS emp,
        tblmunicipio AS mun
        WHERE
        dep.Dep_id=ped.Dep_id   AND
        est.Est_id = ped.Est_id AND
        ped.Emp_id = emp.Emp_id AND
        emp.Mun_id = mun.Mun_id AND
        ped.Ped_id = ".$Ped_id;
        $pedido =$obj->consult($sql);
      
        
        $sql="SELECT 
        pb.Pba_descripcion, 
        dp.Dpe_cantidad, 
        dp.Dep_descripcion, 
        dp.Dpe_valorUnitario, 
        dp.Dpe_valorTotal 
        FROM 
        tbldetallepedido as dp, 
        tblproductobase as pb 
        WHERE 
        dp.Ped_id=$Ped_id AND 
        pb.Pba_id = dp.Pba_id";
        $tproducto=$obj->consult($sql);

        $sql="SELECT * FROM Tblmunicipio";
        $municipio=$obj->consult($sql);

        $sql="SELECT * FROM Tblcentro";
        $centro=$obj->consult($sql);
        
       // encabezado
        $html="<div id='solicitudpdf'>";

        $html.="<div id='opacidad-encabezado'>";
            
        $html.="<table class='encabezadoC'>
        <tr>
        <td>
        
        <img class='' src='images/encabezadopdf.jpg'>
      
        </td>
        <td>
        <h3 class='tituloc' >SERVICIO NACIONAL DE APRENDIZAJE SENA 
        COTIZACI&Oacute;N</h3>
        </td>
        </tr>
        </table>";
        $html.="</div>";

             //   destinatario (la emite el remitente para el CDTI)
         foreach ($pedido as $ped){ 
              setlocale(LC_ALL, "spanish");
             $html.=$ped['Mun_nombre'].",".ucwords(strftime("%d de %B de %Y",strtotime(date("o-m-d"))))."<br>";
             $html.=$ped['Emp_nombre']."<br>"; 
             $html.=$ped['Emp_razonSocial']."<br>"; 
             $html.=$ped['Dep_nombre']."<br>"; 
             
            }
        //      $html.="Se&ntilde;or(a)"."<br>";
        //      $html.="N&eacute;stor Espitia Torres"."<br>";
        //      $html.="Cordinador(a)"."<br>";
        //      $html.="CENTRO DE DISE&Ntilde;O TECNOLOGICO INDUSTRIAL"."<br>";
        //      $html.="Regional "."Valle"."<br>";
        //      $html.="Ciudad "."Cali"."<br>";
            
           
           

             $html.="<p style='text-align:right;'><b>ASUNTO:</b>Solicitud Cotizaci&oacute;n de Productos o Servicios </p>"; 
            
             $html.="Respetado ".$ped['Emp_nombre'].";"."<br>";

          //  Nota formal 
         

                

                $html.="<p>En forma atenta y atendiendo su solicitud de Cotización recibida por el Centro el ".ucwords(strftime("%d de %B de %Y",strtotime($ped['Ped_fecha'])))."
                para la elaboración de productos gráficos; como Líder de Producción del Centro de Diseño Tecnológico Industrial del SENA, Regional Valle, manifiesto que tenemos la 
                capacidad de atender la demanda de los productos o servicios requeridos por usted con las siguientes consideraciones:"."</p>";
                 
                 $html.= "<p><b>OBJETO. Adquirir los productos o servicios ".$ped['Ped_objetivo']."</b>, atendiendo el siguiente cuadro de especificaciones y precios presentados por su Centro:</p>"."<br>";
               
       
          
       
       // tabla de productos
        $html.='<table id="tablaps">';
        $html.='<tr>
        <th><p>No. &Iacute;TEM</p></th>
        <th>PRODUCTO</th>
        <th>CANTIDAD</th>

        <th colspan="3">DESCRIPCI&Oacute;N</th>
        <th>VALOR UNITARIO</th>
        <th>VALOR TOTAL</th>


        
         </tr>';

         $cont=0;
         $valorT=0;
         foreach ($tproducto as $tp){
             $valorT=$valorT+$tp['Dpe_valorTotal'];
            $cont++;
            $html.="<tr>";  
            $html.='<td>'.$cont.'</td>';
            $html.='<td>'.$tp['Pba_descripcion'].'</td>';
            $html.='<td>'.$tp['Dpe_cantidad'].'</td>';
            $html.='<td colspan="3">'.$tp['Dep_descripcion'].'</td>';
            $html.='<td>$'.$tp['Dpe_valorUnitario'].'</td>';
            $html.='<td>$'.$tp['Dpe_valorTotal'].'</td>';


      $html.='</tr>'; }
      $html.='<tr>';
      $html.='<td colspan="7">TOTAL COTIZACION</td>';
      $html.='<td>$'.$valorT.'</td>';
      $html.='</tr>';
      $html.='</table>';
      
          $html.='<p><b>PLAZO PARA LA EJECUCI&Oacute;N DEL PRODUCTO O SERVICIO.</b>Ser&aacute; de ('.$ped['Ped_plazoEjecucionMeses'].') mes con ('.$ped['Ped_plazoEjecucionDias'].') dias,</p>';

          foreach ($centro as $cen){
              if ($cen['Cen_id']==$ped['Ped_lugarEjecucionCen']){
                  $nomCen=$cen['Cen_nombre'];
              }
          }
          foreach ($municipio as $mun){
            if ($mun['Mun_id']==$ped['Ped_lugarEjecucionCiu']){
                $nomMun=$mun['Mun_nombre'];
            }
        }
          $html.='<p><b>LUGAR DE EJECUCI&Oacute;N.</b> La entrega y ubicaci&oacute;n se realizar&aacute; en la ciudad de '.$nomMun.', en las instalaciones del CENTRO DE     '.$nomCen.', o seg&uacute;n lo indicado por el supervisor.</p><br>';



         
         
        //     $html.=strtoupper($ped['Emp_razonSocial']);
        //     $html.='<br><b>'.strtoupper($ped['Emp_nombreContacto'])." ".strtoupper($ped['Emp_apellidoContacto']).'</b><br>';
       

       
        $html.="</div>";

         $css= file_get_contents('build/css/costos.css');
        
        $mpdf=new \Mpdf\Mpdf();
        $mpdf->SetTitle("Cotizacion No. ".$Ped_id);        
        $mpdf->WriteHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHtml($html,\Mpdf\HTMLParserMode::HTML_BODY);
         $ruta="PdfCostos/cotizacion/Cotizacion-No.".$Ped_id.".pdf";
        $mpdf->Output($ruta,'F');


        

        if ($mpdf){
            
            $sql="UPDATE `tblpedido` SET `Ped_ruta_pdf_cotizacion`='".$ruta."' WHERE `tblpedido`.`Ped_id` = $Ped_id";
            $ejecutar= $obj->update($sql);
            
            //redirect(getUrl("costos","solicitud","consult"));
           
            //Enviar correo
            // redirect(getUrl("costos","solicitud","consult"));
            redirect(getUrl("Mail","Mail","postAprobacionCotizacion",array("Ped_id"=>$Ped_id),"ajax"));

        }

    } 

}



   
?>