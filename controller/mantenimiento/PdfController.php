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

        $sql = "SELECT o.Odm_id, e.Emp_razonSocial, e.Emp_nit, e.Emp_direccion, e.Emp_primerNumeroContacto, o.Odm_fechaInicio, o.Odm_horainicio, o.odm_fechafin, o.odm_horafin, o.odm_tecnico, o.odm_observaciones, o.odm_observacionesfin,  m.maq_id, m.maq_nombre, u.usu_id, u.usu_primernombre, u.usu_primerapellido, s.stg_id, s.stg_nombre
        FROM tblordenmanto as o, tblempresa as e, tblmaquina as m, tblusuario as u, tblsubtipogeneral as s
        WHERE o.emp_id = e.emp_id AND o.stg_id = s.stg_id AND o.maq_id = m.maq_id AND o.usu_id = u.usu_id
        AND odm_id = $odm_id"; 
        
        $orden = $obj->consult($sql);

        foreach ($orden as $odm) {
            $odm_id=$odm['odm_id'];      
            $odm_nit=$odm['emp_nit'];      
            $odm_razonsocial=$odm['emp_razonsocial'];
            $odm_direccion=$odm['emp_direccion']; 
            $odm_primernumerocontato=$odm['emp_primernumerocontacto'];
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

        $mpdf=new \Mpdf\Mpdf();

        $mpdf->SetTitle("Orden Mantenimiento");



        $html="<div id='page_pdf'>
        <table id='pdf_head'>
            <tr>
                <td class='logo_pdf'>
                    <div>
                        <img src='../web/images/logos.png' width='190px' height='60px'>
                    </div>
                </td>
                <td class='info_empresa'>
                    <div>
                        <span class='h2'><b>REPORTE ORDEN MANTENIMIENTO</b></span>
                        <p>(Dirección Artes Graficas), Santiago de Cali</p>
                        <p>Teléfono: </p>
                        <p>Email: </p>
                    </div>
                </td>
                <td class='info_orden'>
                    <div class='round'>
                        <p><b>ID Orden: $odm_id </b></p>
                        <p><b>Funcionario:</b> $odm_primernombre $odm_primerapellido</p>
                    </div>
                </td>
            </tr>
        </table>
    
        <br></br>
        <table id='pdf_cliente'>
            <tr>
                <td class='info_cliente'>
                    <div class='round'>
                        <span class='h3'><b>Empresa: </b></span>
                        <table class='datos_cliente'>
                            <tr>
                                <td><label><b>Nit: </b></label><p>$odm_nit</p></td>
                                <td><label><b>Nombre: </b></label> <p>$odm_razonsocial</p></td>
                            </tr>
                            <tr>
                                <td><label><b>Teléfono: </b></label> <p>$odm_primernumerocontato</p></td>
                                <td><label><b>Dirección: </b></label> <p>$odm_direccion</p></td>
                            </tr>
                            <tr>
                                <td><label><b>Tecnico: </b></label> <p>$odm_tecnico</p></td>
                            </tr>
                        </table>
                    </div>
                </td>
    
            </tr>
        </table>
    
    <br></br>
    
        <table id='pdf_cliente'>
            <tr>
                <td class='info_cliente'>
                    <div class='round'>
                        <span class='h3'><b>Descripción de la Orden: </b></span>
                        <table class='datos_cliente'>
                            <tr>
                                <td><label><b>ID Maquina: </b></label><p>$odm_maqid</p></td>
                                <td><label><b>Nombre Maquina: </b></label> <p>$odm_maqnombre</p></td>
                            </tr>
                            <tr>
                                <td><label><b>ID Mantenimiento: </b></label><p>$odm_stgid</p></td>
                                <td><label><b>Descripción Mantenimiento: </b></label> <p>$odm_stgnombre</p></td>
                            </tr>
                            <tr>
                                <td><label><b>Fecha Inicio: </b></label> <p>$odm_fechainicio</p></td>
                                <td><label><b>Hora Inicio: </b></label> <p>$odm_horainicio</p></td>
                            </tr>
                            <tr>
                                <td><label><b>Fecha Fin: </b></label> <p>$odm_fechafin</p></td>
                                <td><label><b>Hora Fin: </b></label> <p>$odm_horafin</p></td>
                            </tr>
                            <tr>
                                <td colspan='2'><label><b>Observaciones: </b></label> <p>$odm_observaciones</p></td>
                            </tr>
    
                        </table>
                    </div>
                </td>
    
            </tr>
        </table>

        <br></br>
    
        <table id='pdf_cliente'>
            <tr>
                <td class='info_cliente'>
                    <div class='round'>
                        <span class='h3'><b>Observaciones Finales: </b></span>
                        <div class='datos_cliente'>
                        <p>$odm_observacionesfin</p>
                        </div>
                    </div>
                </td>
    
            </tr>
        </table>
    
    </div>";


    $css=file_get_contents('css/PdfStyle.css'); 
    
    $mpdf->WriteHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);

        $mpdf->WriteHtml($html,\Mpdf\HTMLParserMode::HTML_BODY);

        $mpdf->Output("Orden.pdf","I");

    }

}

?>