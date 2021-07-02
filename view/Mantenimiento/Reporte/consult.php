<div class="x_title">
    <h2>Administracion de Maquinas</h2>
    <div class="clearfix"></div>
</div>
<div class="x_title">
    <small class="xc_color">Aqui podras consultar los reportes de las ordenes de mantenimiento</small>
</div>
<div class="col-md-12 col-sm-11 ">
    <div class="x_panel">

        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <table id="table" class="table table-striped jambo_table" style="width:100%">
                            <thead style="background-color: #17A481;; color:#fff;">
                                <tr>
                                    <th>Codigo formulario</th>
                                    <th>Tipo de Mantenimiento</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha fin</th>
                                    <th>Observaciones finales</th>
                                    <th>Formulario completo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //FOREACH CONSULT DE REPORTE 

                                foreach ($orden as $odm){
                                    echo "<tr id='Trhabilitado' onclick='DesactivarCampo()'>";
                                    echo "<td>".$odm['Odm_id']."</td>";
                                    echo "<td>".$odm['Stg_nombre']."</td>";
                                    echo "<td>".$odm['Odm_fechaInicio']."</td>";
                                    echo "<td>".$odm['Odm_fechaFin']."</td>";
                                    echo "<td>".$odm['Odm_observacionesFin']."</td>";


                                    if ($_SESSION['rolUser'] == 'Funcionario' || $_SESSION['rolUser'] =='Administrador') {


                                    echo "<td>"."<a target='_blank' href='".getUrl("Mantenimiento","Pdf","postPDF",array("Odm_id"=>$odm['Odm_id']),"ajax")."'>"."<button style='display:none;'id='botonpdf'class='btn btn-primary btn-sm ' title='pdf' data-toggle='tooltip'
                                    data-placement='bottom'><i class='fa fa-file-pdf-o '></i></button>"."</a>".
                                    
                                    "<button id='AlertDeleteReporte' data-id='".$odm['Odm_id']."' data-url='" . getUrl("Mantenimiento", "Reporte", "DeleteModal",false, "ajax") . "' 
                                    class='btn btn-sm btn-danger ' style='display:none;' data-toggle='tooltip' data-placement='bottom' title='Eliminar'><i class='fa fa-trash-o'></i></button>".
                                    
                                    "<button id='habilitar' value='1' class='btn btn-sm btn-success' data-toggle='tooltip' data-placement='bottom' title='habilitar'><i class='fa fa-unlock'></i></button>";
                                    
                                    if($odm['Stg_nombre']=='Mantenimiento Correctivo'){ 
                                     ?>
                                         <a href="<?php echo getUrl("Mantenimiento", "Reporte", "viewpdf", array("Odm_pdf" => $odm['Odm_pdf']), "ajax") ?>"
                                             target="blank">
                                             <button type="button" style='display:none;' id="ReportePdf"
                                                 class="btn-small btn-info btn-sm " title='reporte' data-toggle='tooltip'
                                                 data-placement='bottom'>
                                                 <i class="fa fa-file-pdf-o"></i>
                                             </button>
                                         </a>
                                         <?php
                                    }
                                  echo  "<button style='display:none;'  id='inhabilitar' value='2' class='btn btn-sm btn-danger' data-toggle='tooltip' data-placement='bottom' title='Inhabilitar'><i class='fa fa-lock'></i></button>";
                                   
                                    "</td>";
                                    echo "</tr>";
                                      
                                }else {
                                    echo "<td>"."<a target='_blank' href='".getUrl("Mantenimiento","Pdf","postPDF",array("Odm_id"=>$odm['Odm_id']),"ajax")."'>"."<button id='botonpdf'class='btn btn-primary btn-sm ' title='pdf' data-toggle='tooltip'
                                    data-placement='bottom'><i class='fa fa-file-pdf-o '></i></button>"."</a>";
                                    
                                    if($odm['Stg_nombre']=='Mantenimiento Correctivo'){ 
                                        ?>
                                            <a href="<?php echo getUrl("Mantenimiento", "Reporte", "viewpdf", array("Odm_pdf" => $odm['Odm_pdf']), "ajax") ?>"
                                                target="blank">
                                                <button type="button"  id="ReportePdf"
                                                    class="btn btn-sm btn-info" title='reporte' data-toggle='tooltip'
                                                    data-placement='bottom'>
                                                    <i class="fa fa-file-pdf-o"></i>
                                                </button>
                                            </a>
                                            <?php
                                       }
                                    }
                                  
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>