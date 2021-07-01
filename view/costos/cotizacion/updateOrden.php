<div class="x_title">
    <h2>Generar Cotizacion</h2>
    <div class="clearfix"></div>
</div>

<div class="x_content">
    <!-- inicio Datos personales  -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Datos del Cliente</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><button class="btn btn-success btn-sm collapse-link">Desplegar<i
                                class="fa fa-chevron-up pl-3"></i></button></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Fecha:</label>
                        <div class="col-md-3 col-sm-3 ">
                            <input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"
                                required="required" type="text" onfocus="this.type='date'"
                                onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'"
                                onmouseout="timeFunctionLong(this)">
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
                        <label class="control-label col-md-2 col-sm-2 ">Tipo de cliente:</label>
                        <div class="col-md-4 col-sm-4 ">
                            <select class="form-control">
                                <option>Sena Proveedor Sena</option>
                                <option>Sena AutoConsumo</option>
                                <option>Cliente Externo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Cliente:</label>
                        <div class="col-md-4 col-sm-4 ">
                            <select class="form-control">
                                <option>CDTI</option>
                                <option>CEAI</option>
                                <option>CGTI</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Nombre:</label>
                        <div class="col-md-8 col-sm-8 ">
                            <input type="text" class="form-control" placeholder="Ingrese nombre">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">NIT/CC:</label>
                        <div class="col-md-8 col-sm-8 ">
                            <input type="text" class="form-control" placeholder="Ingrese NIT O CC">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Direccion:</label>
                        <div class="col-md-8 col-sm-8 ">
                            <input type="text" class="form-control" placeholder="Ingrese Direccion">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Ciudad:</label>
                        <div class="col-md-8 col-sm-8 ">
                            <input type="text" class="form-control" placeholder="Ingrese Ciudad">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Telefono:</label>
                        <div class="col-md-8 col-sm-8 ">
                            <input type="text" class="form-control" placeholder="Ingrese Telefono">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Solicitado por:</label>
                        <div class="col-md-8 col-sm-8 ">
                            <input type="text" class="form-control" placeholder="Ingrese Nombre">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Responsable:</label>
                        <div class="col-md-8 col-sm-8 ">
                            <input type="text" class="form-control" placeholder="Ingrese Nombre">
                        </div>
                    </div>
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
                <h2>Productos Cotizados</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><button class="btn btn-success btn-sm collapse-link">Cotizaciones pendientes<i
                                class="fa fa-chevron-up pl-3"></i></button></li>
                    <a href="<?php echo getUrl("costos","cotizacion","insertDetalleCotizacion");?>">
                        <li><button class="btn btn-success btn-sm">Crear cotizacion<i
                                    class="fas fa-plus-square pl-3"></i></button></li>
                    </a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-responsive-costos-cotizacion-pendiente"
                                class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                width="100%">
                                <thead style="background-color:#fc7424; color:#fff;">
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
                                    <tr>
                                    <?php
                                    $contadorItem = 0;
                                    foreach($detalleCotizacion as $dc){
                                        $contadorItem++;
                                        echo "
                                        <td>".$contadorItem."</td>
                                        <td>".$dc['Pba_descripcion']."</td>
                                        <td>".$dc['Dpe_cantidad']."</td>
                                        <td>".$dc['Dpe_descripcion']."</td>
                                        <td>".$dc['Dpe_valorUnitario']."</td>
                                        <td>".$dc['Dpe_valorTotal']."</td>
                                        <td>";

                                        

                                    ?>
                                            <a href='<?php echo getUrl("costos","cotizacion","consultDetalleCotizacion",array('Dpe_id' => $dc["Dpe_id"] ));?>'><i class='fa fa-eye'></i></a>
                                            <a href='<?php echo getUrl("costos","cotizacion","consult");?>'><i class='fa fa-close pl-3' style='color:red;'></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    
                                    </tr>
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
            <div class="col-md-3 offset-md-9">
                

                <a href="<?php echo getUrl("costos","cotizacion","consult");?>">
                <button type='button' class="btn btn-danger">Cancelar</button>
                </a>
                <button type='submit' class="btn btn-success">Guardar</button>
            </div>
        </div>
                            
</div>