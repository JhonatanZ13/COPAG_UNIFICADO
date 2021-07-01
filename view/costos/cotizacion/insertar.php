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
                <!-- Formulario actualizar -->

                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Codigo Pedido:</label>
                        <div class="col-md-3 col-sm-3 ">
                            <input type="text" id="codigoPedido" class="form-control" placeholder="" readonly="readonly"
                                value="<?php echo $Ped_id; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Fecha:</label>
                        <div class="col-md-3 col-sm-3 ">
                            <input id="birthday" class="date-picker form-control" value="<?php  echo date("o-m-d");?>"
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
                        <label class="control-label col-md-2 col-sm-2 ">Destinatario:</label>
                        <div class="col-md-4 col-sm-4 ">
                            <select id="destinatario" class="form-control">
                                <option value="0">Seleccione...</option>
                                <?php
                            $opciones = array('id' => 0,'des' => '');
                            if(isset($respuestaDestinitario)){
                                foreach($respuestaDestinitario AS $res){
                                    $opciones['id'] = $res['Usu_id'];
                                    $opciones['des'] = $res['Usu_nombre'];
                                }
                            }
                            
                            foreach($destinitario as $des){
                                if($des['Usu_id'] == $opciones['id']){
                                    echo "<option value='".$des['Usu_id']."' selected>".$des['Usu_nombre']."</option>";
                                }else{
                                    echo "<option value='".$des['Usu_id']."'>".$des['Usu_nombre']."</option>";
                                }
                            }
                            
                            ?>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Tipo de cliente:</label>
                        <div class="col-md-4 col-sm-4 ">
                            <select id="tipoSolicitudP" class="form-control">
                                <option value="0">Seleccione...</option>
                                <?php
                            $tipoSolicitud = array('id' => 0,'des' => '');
                            if(isset($respuestaTipoCliente)){
                                foreach($respuestaTipoCliente AS $res){
                                    $tipoSolicitud['id'] = $res['Tempr_id'];
                                    $tipoSolicitud['des'] = $res['Tempr_descripcion'];
                                }
                            }
                            
                            foreach($tipoCliente as $tc){
                                if($tc['Tempr_id'] == $tipoSolicitud['id']){
                                    echo "<option value='".$tc['Tempr_id']."' selected>".$tc['Tempr_descripcion']."</option>";
                                }else{
                                    echo "<option value='".$tc['Tempr_id']."'>".$tc['Tempr_descripcion']."</option>";
                                }
                            }
                            
                            ?>

                            </select>
                        </div>
                    </div>
                </div>


                <!-- Bloque Cliente -->
                

                <?php  if(isset($cliente)){
                    foreach ($cliente as $clien) {
                ?>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Cliente:</label>
                        <div class="col-md-4 col-sm-4 ">
                            <select id="selectCliente"
                                data-url="<?php echo getUrl("costos","cotizacion","getConsultClientes",false,"ajax");?>"
                                class="form-control">

                                <option value="0">Seleccione...</option>
                                <?php
                                foreach($clientes as $c){
                                    if($clien['Emp_id'] == $c['Emp_id']){
                                        echo "<option value='".$c['Emp_id']."' selected>".$c['Emp_razonSocial']."</option>";
                                    }else{
                                        echo "<option value='".$c['Emp_id']."'>".$c['Emp_razonSocial']."</option>";
                                    }
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="contenedorCliente">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 col-sm-2 ">Nombre:</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" placeholder="Ingrese nombre" readonly="readonly"
                                    value="<?php echo $clien['Emp_nombre']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 col-sm-2 ">NIT/CC:</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" placeholder="Ingrese NIT O CC"
                                    readonly="readonly" value="<?php echo $clien['Emp_razonSocial']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 col-sm-2 ">Direccion:</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" placeholder="Ingrese Direccion"
                                    readonly="readonly" value="<?php echo $clien['Emp_direccion']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 col-sm-2 ">Ciudad:</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" placeholder="Ingrese Ciudad" readonly="readonly"
                                    value="<?php echo $clien['Mun_nombre']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 col-sm-2 ">Telefono:</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" placeholder="Ingrese Telefono"
                                    readonly="readonly" value="<?php echo $clien['Emp_primerNumeroContacto']; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Solicitado por:</label>
                        <div class="col-md-8 col-sm-8 ">
                            <input type="text" class="form-control" placeholder="Ingrese Nombre" >
                        </div>
                    </div>
                </div> -->
                </div>
                <?php }  }else{ ?>

                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Cliente:</label>
                        <div class="col-md-4 col-sm-4 ">
                            <select id="selectCliente"
                                data-url="<?php echo getUrl("costos","cotizacion","getConsultClientes",false,"ajax");?>"
                                class="form-control">
                                <option value="0">Seleccione...</option>
                                <?php
                            foreach($clientes as $c){
                                echo "<option value='".$c['Emp_id']."'>".$c['Emp_razonSocial']."</option>";
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="contenedorCliente">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 col-sm-2 ">Nombre:</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" placeholder="Ingrese nombre"
                                    readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 col-sm-2 ">NIT/CC:</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" placeholder="Ingrese NIT O CC"
                                    readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 col-sm-2 ">Direccion:</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" placeholder="Ingrese Direccion"
                                    readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 col-sm-2 ">Ciudad:</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" placeholder="Ingrese Ciudad"
                                    readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 col-sm-2 ">Telefono:</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" placeholder="Ingrese Telefono"
                                    readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Solicitado por:</label>
                        <div class="col-md-8 col-sm-8 ">
                            <input type="text" class="form-control" placeholder="Ingrese Nombre">
                        </div>
                    </div>
                </div> -->
                </div>

                <?php } ?>


                <!-- Fin Bloque Cliente -->

                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Responsable:</label>
                        <div class="col-md-8 col-sm-8 ">
                            <?php
                            
                            foreach ($responsable as $resp) {
                            ?>
                            <input type="text" class="form-control" placeholder="Ingrese Nombre" readonly="readonly"
                                value="<?php echo $resp['Usu_nombre']; ?>">
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <p style="color:red" id="msgDestinatario" class="d-none">*Por favor seleccione un destinatario y click en guardar.</p>
                <p style="color:red" id="msgCliente" class="d-none">*Por favor seleccione un cliente y click en guardar.</p>
                
            </div>
            <!-- Boton Guardar Datos  -->
            <div class="form-group mt-3">
                <div class="col-md-3 offset-md-9">
                    <button type='submit' id="updatePedido"
                        data-url="<?php echo getUrl("costos","cotizacion","postUpdateCotizacion",false,"ajax");?>"
                        class="btn btn-primary">Guardar</button>
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
                    <a
                        href="<?php echo getUrl("costos","cotizacion","insertDetalleCotizacion",array('Ped_id' =>$Ped_id));?>">
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
                            <table id="table"
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


                                    <?php
                                    if($detalleCotizacion->num_rows >0){
                                        echo "<tr>";
                                    $contadorItem = 0;
                                    foreach($detalleCotizacion as $dc){
                                        $contadorItem++;
                                        echo "
                                        <td>".$contadorItem."</td>
                                        <td>".$dc['Pba_descripcion']."</td>
                                        <td>".$dc['Dpe_cantidad']."</td>
                                        <td>".$dc['Dep_descripcion']."</td>
                                        <td>".$dc['Dpe_valorUnitario']."</td>
                                        <td>".$dc['Dpe_valorTotal']."</td>
                                        <td>";
                                    ?>
                                    
                                        <a href='<?php echo getUrl("costos","cotizacion","consultDetalleCotizacion",array('Dpe_id' => $dc["Dpe_id"] ));?>'>
                                            <button class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></button>
                                        </a>
                                    
                                        <a href='<?php echo getUrl("costos","cotizacion","postDeleteDetelleCotizacion",array('Dpe_id' => $dc["Dpe_id"],'Ped_id'=>$Ped_id ));?>'>
                                            <button value="Cancelar Solicitud de Cotización"
                                                class="btn btn-danger btn-sm" data-url=""><i
                                                    class="fa fa-close"></i></button>
                                        </a>
                                    
                                    
                                    </td>
                                    </tr>
                                    <?php
                                    }
                                    echo "</tr>";
                                }else{ ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php  
                                }
                                    ?>


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
                <button type='button' class="btn btn-danger">Volver</button>
            </a>

            <button  class="btn btn-success botonModal2"
            type="button"
            id="enviarPedidoCotizacion"
            title="Solicitud de Aprobacion - Cotización"
            value="<?php echo $Ped_id; ?>"
            data-url="<?php echo getUrl('costos','cotizacion','solicitarAprobarCotizacionModal',false,'ajax');?>"
            >Enviar</button>

            
        </div>
    </div>

</div>
