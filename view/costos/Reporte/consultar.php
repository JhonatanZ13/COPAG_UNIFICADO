<div class="x_title">
    <h2>Generar Reporte</h2>
    <div class="clearfix"></div>
</div>

<div class="x_content">
    <!-- inicio Datos personales  -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Filtrar Reporte</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><button class="btn btn-success btn-sm collapse-link">Desplegar<i
                                class="fa fa-chevron-up pl-3"></i></button></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <!-- Formulario actualizar -->
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Fecha Inicio:</label>
                        <div class="col-md-3 col-sm-3 ">
                            <input id="fechaInicio" class="date-picker form-control" value="<?php  echo date("o-m-d");?>"
                                placeholder="dd-mm-yyyy" type="text" required="required" type="text"
                                onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'"
                                onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                            <script>
                            function timeFunctionLong(input) {
                                setTimeout(function() {
                                    input.type = 'text';
                                }, 60000);
                            }
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Fecha Fin:</label>
                        <div class="col-md-3 col-sm-3 ">
                            <input id="fechaFin" class="date-picker form-control" value="<?php  echo date("o-m-d");?>"
                                placeholder="dd-mm-yyyy" type="text" required="required" type="text"
                                onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'"
                                onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                            <script>
                            function timeFunctionLong(input) {
                                setTimeout(function() {
                                    input.type = 'text';
                                }, 60000);
                            }
                            </script>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Tipo de Reporte:</label>
                        <div class="col-md-4 col-sm-4 ">
                            <select id="tipoReporte" data-url="<?php echo getUrl("costos","reporte","getFiltroTipoReporte",false,"ajax");?>" class="form-control">
                                <option value="0">Seleccione...</option>
                                <option value="1">Solicitud</option>
                                <option value="2">Cotizacion</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Estado:</label>
                        <div class="col-md-5 col-sm-5 ">
                            <select id="estado" class="form-control">
                                <option value="0">Seleccione...</option>
                                
                                <!-- <option value="1">Activo</option> -->
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Boton Guardar Datos  -->
            <div class="form-group mt-3">
                <div class="col-md-3 offset-md-9">
                    <button type='button' id="getReporte"
                        disabled="disabled"
                        data-url="<?php echo getUrl("costos","reporte","getFiltroReporte",false,"ajax");?>"
                        class="btn btn-success">Actualizar</button>
                </div>
            </div>

        </div>
    </div>

    <!-- fin datos personales  -->
</div>



<div class="x_content">
    <!-- inicio tabla  -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Reporte</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><button class="btn btn-success btn-sm collapse-link">Desplegar<i
                                class="fa fa-chevron-up pl-3"></i></button></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive" id="filtroReporteCostos">
                            <table id="datatable-responsive-costos-cotizacion-pendiente"
                                class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                width="100%">
                                <thead style="background-color:#17A481; color:#fff;">
                                    <tr>
                                        <th cope="col">No. Item</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Descripcion</th>
                                        <th>Valor Unitario</th>
                                        <th>Valor Total</th>
                                        <th>acciones</th>
                                    </tr>
                                <tbody>

                                    <!-- <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr> -->
                                    


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fin tabla 1  -->


    <div class="form-group mt-3">
        <div class="col-md-3 offset-md-10">
                    <button type='button' id="getReporteExcel"
                        disabled="disabled"
                        data-url="<?php echo getUrl("costos","reporte","getReporteExcelCotizacion",false,"ajax");?>"
                        class="btn btn-success">Generar Excel</button>
        </div>
    </div>

</div>
