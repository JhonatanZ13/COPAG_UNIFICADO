<?php

$pagina1 = '
    <table class="border-1 t-center">
      <tr>
        <td WIDTH="220" class="pb-3 b-right">
          <img src="images/logo_sena.png" width="80" height="80" class="pb-3"><br>
          Regional Valle del Cauca<br>
          Centro de diseño tecnologico industrial<br>
        </td>
        <td WIDTH="300" class="f-12 b-right">
            <b>Orden de producción<br>
            Unidad productiva artes graficas</b>
        </td>
        <td WIDTH="220" class="t-left b-right">
            Codigo de orden: '.$Odp_id.'<br><br>
            Fecha de Creación: '.$Odp_fechaCreacion.'<br><br>
            Estado: '.$Odp_Estado.'<br><br>
            Pagina: 1 de 2
        </td>
      </tr>
    </table>
    <br>

    <!-----Cliente y Producto ----->
    <div class="ln-solid"></div>
    <table>
      <tr>
        <TH COLSPAN=2 width="300px" height="50px" class="f-12 t-left">DATOS DEL CLIENTE</TH>
        <th width="100"></th>
        <TH COLSPAN=2 width="300px" class="f-12 t-left">DATOS DEL PRODUCTO</TH>
      </tr>

      <tr>
        <th class="t-left h-20">Tipo de cliente: </th>
        <td class="b-bottom" width="100px">'.$Tempr_descripcion.'</td>
        <td></td>
        <th class="t-left h-20">Producto:</th>
         <td class="b-bottom" width="100px">'.$Pba_descripcion.'</td>
      </tr>

      <tr>
        <th class="t-left h-20">Cliente</th>
         <td class="b-bottom">'.$Emp_razonSocial.'</td>
         <td></td>
        <th class="t-left h-20">Cantidad:</th>
         <td class="b-bottom">'.$Pte_cantidad.'</td>
      </tr>

      <tr>
        <th class="t-left h-20">Nombre cliente:</th>
          <td class="b-bottom">'.$Emp_razonSocial.'</td>
          <td></td>
        <th class="t-left h-20">Num. Paginas</th>
         <td class="b-bottom">'.$Pte_numeroPaginas.'</td>
      </tr>

      <tr>
        <th class="t-left h-20">NIT:</th>
          <td class="b-bottom">'.$Emp_NIT.'</td>
          <td></td>
        <th class="t-left h-20">Tamaño abierto:</th>
         <td class="b-bottom">'.$Pte_tamañoAbierto.'</td>
      </tr>
      
      <tr>
        <th class="t-left h-20">Dirección:</th>
          <td class="b-bottom">'.$Emp_direccion.'</td>
          <td></td>
          <th class="t-left h-20">Tamaño cerrado:</th>
           <td class="b-bottom">'.$Pte_tamañoCerrado.'</td>
      </tr>

      <tr>
        <th class="t-left h-20">Ciudad:</th>
          <td class="b-bottom">'.$Mun_nombre.'</td>
          <td></td>
          <th class="t-left h-20">Fecha de inicio:</th>
           <td class="b-bottom">'.$Odp_fechaInicio.'</td>
      </tr>

      <tr>
        <th class="t-left h-20">Telefono:</th>
         <td class="b-bottom">'.$Emp_segundoNumeroContacto.'</td>
         <td></td>
         <th class="t-left h-20">Fecha de Fin</th>
          <td class="b-bottom">'.$Odp_fechafin.'</td>
      </tr>

      <tr>
        <th class="t-left h-20">Solicitado por:</th>
          <td class="b-bottom">'.$Emp_nombreContacto.'</td>

          <td></td>
         <th class="t-left h-20">Fecha de Entrega</th>
          <td class="b-bottom">'.$Odp_fechaEntrega.'</td>
      </tr>

      <tr>
        <th class="t-left h-20">Responsable:</th>
         <td class="b-bottom">'.$Emp_nombreContacto.'</td>

         <td></td>
         <th class="t-left h-20">Diseñador:</th>
          <td class="b-bottom">'.$Pte_diseñador.'</td>
      </tr>

    </table>
<br>

<!----- Pre-impresion -------->
    <div class="ln-solid"></div><br>
    <table class="b-top-3">
      <tr>
        <th COLSPAN=2 class="f-12 t-left h-20">DATOS PRE-IMPRESION</th>
      </tr>
      <tr>
        <th class="h-20 t-left">Tipo de diseño:  '.$ntipopliego.'</th>
    </tr>
    </table>

    <br>
    <table>
        <tr>
            <TH COLSPAN=2 class="f-12 t-left h-20">Sustratos:</TH>
        </tr>
    </table>
    ';

foreach ($consultsustratos as $res) {
  $pagina1 = $pagina1.'<table width="100%">
  <tr>
    <th class="t-left h-30">Tipo de sustrato:</th>
    <td class="b-bottom">'.$res['Arti_nombre'].'</td>
    <td WIDTH="30"></td>
    <th class="t-left h-30">Tamaño:</th>
    <td class="b-bottom">'.$res['Sus_tamañoPliego'].'</td>
    <td WIDTH="30" ></td>
    <th class="t-left h-30">Cantidad:</th>
    <td class="b-bottom">'.$res['Sus_cantidadSustrato'].'</td>
  </tr>
  <tr>
    <th class="t-left h-30">Corte</th>
    <td class="b-bottom">'.$res['Sus_tamañoCorte'].'</td>
    <td WIDTH="30"></td>
    <th class="t-left h-30">Tiraje Pedido</th>
    <td class="b-bottom">'.$res['Sus_tirajePedido'].'</td>
    <td WIDTH="30"></td>
    <th class="t-left h-30">Desperdicio</th>
    <td class="b-bottom">'.$res['Sus_porcentajeDesperdicio'].'</td>
  </tr>
  <tr>
    <th class="t-left h-30">Tiraje Total</th>
    <td class="b-bottom">'.$res['Sus_tirajeTotal'].'</td>
  </tr>
  </table>
  
  <br><div class="ln-dotted"></div><br>';
}


$pagina1 = $pagina1.'<table>
<tr>
  <th>Encargado en el area de Pre-impresion:</th> 
  <td>'.$Pim_encargado.'</td>
</tr>
</table>
<br>
<textarea width="100%" height="100px">Observaciones: '.$Pim_observacion.'</textarea>';



$pagina2 ='
    <table class="border-1 t-center">
      <tr>
        <td WIDTH="220" class="pb-3 b-right">
          <img src="images/logo_sena.png" width="80" height="80" class="pb-3"><br>
          Regional Valle del Cauca<br>
          Centro de diseño tecnologico industrial<br>
        </td>
        <td WIDTH="300" class="f-12 b-right">
            <b>Orden de producción<br>
            Unidad productiva artes graficas</b>
        </td>
        <td WIDTH="220" class="t-left b-right">
            Codigo de orden: '.$Odp_id.'<br><br>
            Fecha de Creación: '.$Odp_fechaCreacion.'<br><br>
            Estado: '.$Odp_Estado.'<br><br>
            Pagina: 2 de 2
        </td>
      </tr>
    </table>

    <!----- Impresion -------->

    <br><div class="ln-solid"></div><br>
    <table class="b-top-3">
      <tr>
        <th COLSPAN=2 class="f-12 t-left h-20">DATOS IMPRESION</th>
      </tr>
    </table>
    <br>
    <table class="b-top-3">
        <tr>
            <th class="t-left">Maquina:  '.$Maq_nombre.'</th>
        </tr>
        <tr>
            <td class="t-left">Formato corte: '.$Imp_formatoCorte.'</td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <TH COLSPAN=2 class="f-12 t-left h-20">Pliegos:</TH>
        </tr>
    </table>
    <br>';
  
//Pliegos
if(mysqli_num_rows($consultpliegos)>0){
foreach ($consultpliegos as $res) {
  $pagina2 = $pagina2.'
  <table width="100%">
  <tr>';
    foreach ($subtipo as $stg) {
      if($res['Pli_rip']== $stg['Stg_id']){
        $pagina2 = $pagina2.'
        <th class="t-left h-30" width="15%">Tipo de RIP:</th>
        <td class="b-bottom" width="10%">'.$stg['Stg_nombre'].'</td>
        <td width="10%"></td>';
      }
    }
    foreach ($subtipo as $stg) {
      if($res['Stg_id']== $stg['Stg_id']){
        $pagina2 = $pagina2.'
        <th class="t-left h-30" width="10%">Tintas:</th>
        <td class="b-bottom" width="15%">'.$stg['Stg_nombre'].'</td>
        <td width="10%"></td>';
      }
    }
    $pagina2 = $pagina2.'
    <th class="t-left h-30" width="15%">Tinta especial:</th>
    <td class="b-bottom" width="15%">'.$res['Pli_tintaespecial'].'</td>
    <td width="10%"></td>
  </tr>
</table>
<br><div class="ln-dotted"></div><br>';
}
}else{
  $pagina2 = $pagina2.'
  <table width="100%">
  <tr>
    <th class="t-left h-30" width="15%">Tipo de RIP:</th>
    <td class="b-bottom" width="10%"></td>
    <td width="10%"></td>
    <th class="t-left h-30" width="10%">Tintas:</th>
    <td class="b-bottom" width="15%"></td>
    <td width="10%"></td>
    <th class="t-left h-30" width="15%">Tinta especial:</th>
    <td class="b-bottom" width="15%"></td>
    <td width="10%"></td>
  </tr>
</table>
<br><div class="ln-dotted"></div><br>';
}



    
$pagina2 = $pagina2.'<table>
      <tr>
        <th>Encargado en el area de impresion:</th> 
        <td>'.$Imp_encargado.'</td>
      </tr>
    </table>
      <br>
      <textarea width="100%" height="100px">Observaciones: '.$Imp_observaciones.'</textarea>
    <br>';

$pagina2 = $pagina2.'
<!----- Terminados -------->

  <br><div class="ln-solid"></div><br>
  <table class="b-top-3">
    <tr>
      <th COLSPAN=2 class="f-12 t-left h-20">TERMINADOS</th>
    </tr>
    <tr>
      <td COLSPAN=2 class="t-left h-20"><i>Terminados del producto:</i></td>
    </tr>
  </table>';
  
foreach ($tipoterminado as $res) {

  $numero = intval($res['Ter_id']);

  foreach ($terminados as $ter) {
    //Convierte ter_id a numero
    $numero2 = intval($ter['Ter_id']);
    //Verifica que no sean los terminados que tienen descripcion
    if ($numero < 16) {
      //Compara los ids para saber el nombre del terminado
      if($numero == $numero2){
        //Crea 4 filas en cada tabla
        $pagina2 = $pagina2.'
        <table width="100%">
        <tr>
          <td width="25%">
            <ul>
              <li class="">'.$ter['Ter_descripcion'].'</li>
            </ul>
          </td>
        </tr>
        </table>';
      }
    }
  }
}

$pagina2 = $pagina2.'
<br><div class="ln-dotted"></div><br>';

foreach ($tipoterminado as $res) {

  $numero = intval($res['Ter_id']);

  foreach ($terminados as $ter) {
    //Convierte ter_id a numero
    $numero2 = intval($ter['Ter_id']);
    //Verifica que no sean los terminados que tienen descripcion
    if (($numero > 16 ) || ($numero < 22)) {
      //Compara los ids para saber el nombre del terminado
      if(($numero == $numero2) && $numero == 16){
        //Crea 4 filas en cada tabla
        $pagina2 = $pagina2.'
        <table>
          <tr>
            <td width="100px">
              <ul>
                <li>'.$ter['Ter_descripcion'].'</li>
              </ul>
            </td>
            
            <td class="b-bottom">Desde:</td>
            <td width="40px">'.$res['tter_descripcion1'].'</td>
            <td width="50px"></td>
            <td class="b-bottom">Hasta:</td>
            <td width="20px">'.$res['tter_descripcion2'].'</td>
          </tr>
        </table>
        ';
      }
    }

    if (($numero > 16 ) || ($numero < 22)) {
      //Compara los ids para saber el nombre del terminado
      if(($numero == $numero2) && $numero == 17){
        //Crea 4 filas en cada tabla
        $pagina2 = $pagina2.'
        <table>
          <tr>
            <td width="100px">
              <ul>
                <li>'.$ter['Ter_descripcion'].'</li>
              </ul>
            </td>
            
            <td class="b-bottom">Color:</td>
            <td width="40px">'.$res['tter_descripcion1'].'</td>
            <td width="50px"></td>
            <td class="b-bottom">Trafico:</td>
            <td width="20px">'.$res['tter_descripcion2'].'</td>
          </tr>
        </table>
        ';
      }
    }

    if (($numero > 16 ) || ($numero < 22)) {
      //Compara los ids para saber el nombre del terminado
      if(($numero == $numero2) && $numero == 18){
        //Crea 4 filas en cada tabla
        $pagina2 = $pagina2.'
        <table>
          <tr>
            <td width="100px">
              <ul>
                <li>'.$ter['Ter_descripcion'].'</li>
              </ul>
            </td>
            
            <td class="b-bottom">Numero de cuerpos:</td>
            <td>'.$res['tter_descripcion1'].'</td>
            <td width="50px"></td>
          </tr>
        </table>
        ';
      }
    }

    if (($numero > 16 ) || ($numero < 22)) {
      //Compara los ids para saber el nombre del terminado
      if(($numero == $numero2) && $numero == 19){
        //Crea 4 filas en cada tabla
        $pagina2 = $pagina2.'
        <table>
          <tr>
            <td width="100px">
              <ul>
                <li>'.$ter['Ter_descripcion'].'</li>
              </ul>
            </td>
            
            <td class="b-bottom">Cantidad:</td>
            <td>'.$res['tter_descripcion1'].'</td>
            <td width="50px"></td>
          </tr>
        </table>
        ';
      }
    }

    if (($numero > 16 ) || ($numero < 22)) {
      //Compara los ids para saber el nombre del terminado
      if(($numero == $numero2) && $numero == 20){
        //Crea 4 filas en cada tabla
        $pagina2 = $pagina2.'
        <table>
          <tr>
            <td width="100px">
              <ul>
                <li>'.$ter['Ter_descripcion'].'</li>
              </ul>
            </td>
            
            <td class="b-bottom">Cantidad:</td>
            <td>'.$res['tter_descripcion1'].'</td>
            <td width="50px"></td>
          </tr>
        </table>
        ';
      }
    }

    if (($numero > 16 ) || ($numero < 22)) {
      //Compara los ids para saber el nombre del terminado
      if(($numero == $numero2) && $numero == 21){
        //Crea 4 filas en cada tabla
        $pagina2 = $pagina2.'
        <table>
          <tr>
            <td width="100px">
              <ul>
                <li>'.$ter['Ter_descripcion'].'</li>
              </ul>
            </td>
            
            <td class="b-bottom">Cantidad:</td>
            <td>'.$res['tter_descripcion1'].'</td>
            <td width="50px"></td>
          </tr>
        </table>
        ';
      }
    }

    if (($numero > 16 ) || ($numero < 22)) {
      //Compara los ids para saber el nombre del terminado
      if(($numero == $numero2) && $numero == 22){
        //Crea 4 filas en cada tabla
        if($res['tter_descripcion1'] == 1){
          $tp="Micro";
        }else{
          $tp="Normal";
        }
        $pagina2 = $pagina2.'
        <table>
          <tr>
            <td width="100px">
              <ul>
                <li>'.$ter['Ter_descripcion'].'</li>
              </ul>
            </td>
            
            <td class="b-bottom">Tipo</td>
            <td></td>
            <td width="50px">'.$tp.'</td>
          </tr>
        </table>
        ';
      }
    }
  }
}

$pagina2 = $pagina2.'
<br><div class="ln-dotted"></div><br>
<table class="b-top-3">
    <tr>
      <td COLSPAN=2 class="t-left h-20"><i>Terminados especiales:</i></td>
    </tr>
</table>';


$contr = 0;
foreach ($tipoterminado as $res) {

  $numero = intval($res['Ter_id']);

  foreach ($terminados as $ter) {
    //Convierte ter_id a numero
    $numero2 = intval($ter['Ter_id']);
    //Verifica que no sean los terminados que tienen descripcion
    if ($numero > 22) {
      //Compara los ids para saber el nombre del terminado
      if($numero == $numero2){
        //Crea 4 filas en cada tabla
        $pagina2 = $pagina2.'
        <table width="100%">
        <tr>
          <td width="25%">
            <ul>
              <li class="">'.$ter['Ter_descripcion'].'</li>
            </ul>
          </td>
        </tr>
        </table>';
      }
    }
    
  }
  
  $contr++;
}

$pagina2 = $pagina2.'
<br><div class="ln-solid"></div><br>
    <table class="">
      <tr>
        <td class="b-bottom" width="200px">'.$imagenfirma.'</td>
        <td width="250px"></td>
        <td class="b-bottom" width="200px"></td>
      </tr>
      <tr>
        <td>'.$usu_name.'</td>
        <td width="200px"></td>
        <td>Recibi:</td>
      </tr>
      <tr>
        <td>'.$fir_cargo.'</td>
        <td width="200px"></td>
        <td></td>
      </tr>
    </table>
';
