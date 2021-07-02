<div class="x_content">
    <!-- Header info -->
    <div class="x_panel">
        <h3>Orden de produccion No. <?= $Odp_id ?></h3>
        <h4>Funcionario que atiende:  <?= $usu_name ?></h4>
    </div>
    <!-- <div class="row">
        <div class="x_panel col-md-3 text-center">
            <img src="images/logo_sena.png" alt="LogoSena" width="90px"><br>
            <h4>Regional Valle del Cauca</h4>
            <h4>Centro de diseño tecnologico industrial</h4>
        </div>
        <div class="x_panel col-md-6 text-center">
            <h2>Orden de producción</h2>
            <h2>Unidad productiva artes graficas</h2>
        </div>
        <div class="x_panel col-md-3 text-right">
            <b>Codigo de orden:</b><br>
            <b>Fecha:</b><br>
            <b>Version:</b><br>
            <b>Pagina:</b>
        </div>
    </div> -->


    <!---------------------- Inicio formulario ----------------------->

    <form class="form-horizontal form-label-left" id="formInsertProduccion" data-parsley-validate action="<?php echo getUrl("Produccion", "Produccion", "postInsertOrdProduccion"); ?>" method="POST">

        <input type="hidden" name="Odp_id" value="<?= $Odp_id ?>">

        <div class="">
            <div class="row">

                <!--------- Datos del cliente ---------->

                <div class="col-md-6">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="">
                                <h5>Datos del cliente</h5>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group row mt-3">
                                <label class="control-label col-md-3 col-sm-3 " for="">Tipo de cliente<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="Odp_tipoempresa" id="tipoCliente" class="form-control">
                                        <option value="">Tipo de cliente</option>
                                        <!-----Tipo de cliente------>
                                        <?php
                                        foreach ($tipocliente as $res) {
                                        ?>
                                            <option value='<?= $res['Tempr_id'] ?>'> <?= $res['Tempr_descripcion'] ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 " for="">Elegir cliente<span class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select id="elegirCliente" class="form-control" data-url="<?= getUrl("Produccion", "Produccion", "selectCliente", false, "ajax") ?>">
                                        <option value="">Elegir cliente</option>

                                        <!-----Elegir de cliente------>

                                        <?php
                                        foreach ($cliente as $res) {
                                        ?>
                                            <option value='<?= $res['Emp_id'] ?>'> <?= $res['Emp_razonSocial'] ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div id="contenedorCliente">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3">Nombre cliente</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" id="nombreCliente" class="form-control" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 ">NIT</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" id="nit" class="form-control datosCliente" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 ">Direccion</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" id="direccion" class="form-control datosCliente" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 ">Ciudad</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" id="ciudad" class="form-control datosCliente" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 ">Telefono</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" id="telefono" class="form-control datosCliente" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 ">Solicitado por</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" id="solicitado" class="form-control datosCliente" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 ">Responsable</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" id="responsable" class="form-control datosCliente" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!---------- Datos del Producto ----------->

                <div class="col-md-6">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="">
                                <h5>Datos del producto</h5>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group row mt-3">
                                <label class="control-label col-md-3 col-sm-3" for="">Elegir producto<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select id="elegirProducto" class="form-control" name="Pba_id" onchange="habilitardatosproducto()">
                                        <option selected value="">Elegir...</option>
                                        <?php
                                        foreach ($productos as $res) {
                                        ?>
                                            <option value='<?= $res['Pba_id'] ?>'> <?= $res['Pba_descripcion'] ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" id="grupoCantidad">
                                <label class="col-form-label col-md-3 col-sm-3">Cantidad<span class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input disabled type="text" id="cantidad" class="form-control" name="Pte_cantidad" value="">
                                    <p id="cantidadP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor numerico</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3">Cantidad de paginas</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input disabled type="text" value="" id="cantidadPaginas" class="form-control" name="Pte_numeroPaginas">
                                    <p id="cantidadPP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor numerico</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3">Tama&ntilde;o abierto</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input disabled placeholder="Ej. 24 x 21.5 cm" type="text" id="tamañoAbierto" class="form-control" name="Pte_tamañoAbierto">
                                    <p id="tamañoAbiertoP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor como por ejemplo: 24 x 21.5 cm </p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3">Tama&ntilde;o cerrado</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input disabled placeholder="Ej. 24 x 21.5 cm" type="text" id="tamañoCerrado" class="form-control" name="Pte_tamañoCerrado">
                                    <p id="tamañoCerradoP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor como por ejemplo: 24 x 21.5 cm </p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3">Fecha de inicio
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input disabled class="date-picker form-control" id="fechaInicio" name="Odp_fechaInicio" placeholder="dd-mm-yyyy" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Fecha fin
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input disabled class="date-picker form-control" id="fechaFin" name="Odp_fechafin" placeholder="dd-mm-yyyy" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Fecha entrega <span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input disabled class="date-picker form-control" id="fechaEntrega" name="Odp_fechaEntrega" placeholder="dd-mm-yyyy" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 "><b> Dise&ntilde;ador(a)</b><span class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input disabled type="text" id="diseñador" class="form-control" name="Pte_diseñador">
                                    <p id="diseñadorP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Solo debe incluir letras </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!----------- Pre-impresion ------------->

            <div class="">
                <div class="x_panel">
                    <div class="">
                        <h5>Datos de pre-impresión</h5>
                        <div class="ln_solid"></div>
                        <div class="x_panel">
                            <div class="form-group col-md-6 mt-3">
                                <label class="control-label col-md-3 col-sm-3 " for="">Tipo de dise&ntilde;o<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select id="tipoDiseño" class="form-control" name="Stg_id">
                                        <option selected>Elegir</option>
                                        <?php
                                        foreach ($tipodiseno as $res) {
                                        ?>
                                            <option value='<?= $res['Stg_id'] ?>'> <?= $res['Stg_nombre'] ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="x_panel">
                            <h4>Sustratos</h4>
                            <div class="ln_solid"></div>
                            <div class="row sustratoContainer">

                                <!--Contenedor de sustrato---->

                                <div class="col-md-6 copysustrato">
                                    <div class="x_panel">
                                        <div class="col-md-12 mt-2">
                                            <div class="form-group col-md-12">
                                                <label class="" for="">Tipo de sustrato<span class="required">*</span>
                                            </div>
                                            </label>
                                            <div class="form-group col-md-12 col-sm-12 ">
                                                <select id="tipoSustrato" class="form-control" name="Arti_id[]">
                                                    <option selected>Elegir</option>
                                                    <?php
                                                    foreach ($articulo as $res) {
                                                    ?>
                                                        <option value='<?= $res['Arti_id'] ?>'> <?= $res['Arti_nombre'] ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="">Tama&ntilde;o (cm)</label>
                                            <div class="col-md-12 col-sm-12 ">
                                                <input placeholder="Ejemplo: 24 x 21.5 cm" id="tamañoSus" type="text" class="form-control" name="Sus_tamañoPliego[]">
                                                <p id="tamañoSusP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor como por ejemplo: 24 x 21.5 cm</p>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="">Cantidad</label>
                                            <div class="col-md-12 col-sm-12 ">
                                                <input placeholder="Ejemplo: 50" id="cantidadSus" type="text" id="cantidad" class="form-control" name="Sus_cantidadSustrato[]">
                                                <p id="cantidadSusP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor numerico</p>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="">Corte (cm)</label>
                                            <div class="col-md-12 col-sm-12 ">
                                                <input placeholder="Ejemplo: 50 x 70 cm" type="text" id="corteSus" class="form-control" name="Sus_tamañoCorte[]">
                                                <p id="corteSusP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor como por ejemplo: 24 x 21.5 cm </p>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="">Tiraje pedido</label>
                                            <div class="col-md-12 col-sm-12 ">
                                                <input placeholder="Ejemplo: 4000" type="text" id="tirajePedidoSus" class="form-control tirajePedido" name="Sus_tirajePedido[]">
                                                <p id="tirajePedidoSusP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor numerico. </p>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label class="" for="">Porcentaje de desperdicio %<span class="required">*</span>
                                            </label>
                                            <div class="col-md-12 col-sm-12 ">
                                                <input type="number" id="porcentajeDesperdicio" class="form-control porcentajeDesperdicio" value="5" min="0" max="100" name="Sus_porcentajeDesperdicio[]">
                                                <p id="porcentajeDesperdicioSusP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor numerico. </p>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class=""><b>Tiraje total</b></label>
                                            <div class="col-md-12 col-sm-12 ">
                                                <input type="text" name="Sus_tirajeTotal[]" id="tirajeTotal" class="form-control tirajeTotal">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <button type="button" class="btn btn-success" id="agregarSustrato">Agregar sustrato <i class="fa fa-plus"></i></button>

                    <div class="ln_solid"></div>

                    <!-- Insumos -->

                    <!-- <div class="x_panel">
                        <h5>Insumos</h5>
                        <div class="ln_solid"></div>
                        <div class="col-md-12 tintaContainer">
                            <div class="col-md-6 col-sm-6 copyInsumo">
                                <div class="x_panel">
                                    <div class="form-group col-md-6 row">
                                        <label class="col-form-label col-md-3 col-sm-3">Planchas</label>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control datosCliente">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 row">
                                        <label class="col-form-label col-md-3 col-sm-3">Barniz</label>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control datosCliente">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                        <label class="col-form-label col-md-3 col-sm-3">Tinta</label>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control datosCliente">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 row">
                                        <label class="col-form-label col-md-3 col-sm-3">Especial</label>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control datosCliente">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success" id="agregarInsumo">Agregar Insumo <i class="fa fa-plus"></i></button> -->

                </div>
                <div class="ln_solid"></div>

                <div class="x_panel">
                    <div class="col-md-12">
                        <label class="control-label col-md-12"><b>Encargado en el area de pre-impresion </b> <span class="required">*</span></label><br>
                        <div class="form-group">
                            <input type="text" id="encargadoPreImpresion" class="form-control col-md-4" name="Pim_encargado">
                        </div>
                        <p id="encargadoPreImpresionP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: El nombre solo debe incluir letras. </p>
                    </div>
                    <div class="col-md-12">
                        <label class="control-label col-md-3 col-sm-3">Observaciones</label>
                        <div class="form-group">
                            <textarea id="observacionesPreImpresion" class="resizable_textarea form-control" name="Pim_observacion"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!----------- Datos de impresión -------------->

        <div class="">
            <div class="x_panel">
                <div class="x_content">
                    <h5>Datos de impresión</h5>
                    <div class="ln_solid"></div>

                    <div class="x_panel">
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label class="" for="">Elegir maquina<span class="required">*</span></label><br>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="Maq_id" id="elegirMaquina" class="form-control">
                                        <option value="">Elegir</option>
                                        <?php
                                        foreach ($maquina as $res) {
                                        ?>
                                            <option value='<?= $res['Maq_id'] ?>'> <?= $res['Maq_nombre'] ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="">Formato corte (cm):</label> <br>
                                <div class="col-md-5 col-sm-5">
                                    <input placeholder="ejemplo: 50 x 70 cm" type="text" id="formatoCorteImpresion" name="Imp_formatoCorte" class="form-control">
                                    <p id="formatoCorteImpresionP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor como por ejemplo: 50 x 70 cm </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!---- Pliegos ------>

                    <div class="x_panel">
                        <h4>Pliegos</h4>
                        <div class="ln_solid"></div>

                        <div class="col-md-12 pliegoContainer">

                            <!--Card tintas y rip ---->
                            <div class="col-md-6 col-sm-6 copyPliego">
                                <div class="x_panel ">
                                    <div class="">
                                        <div class="col-md-12">
                                            <h4>Personalizar pliego</h4>
                                            <div class="">
                                                <select id="personalizarPliego" name="Pli_rip[]" class="form-control">
                                                    <option selected>Elegir</option>
                                                    <?php
                                                    foreach ($tiporip as $res) {
                                                    ?>
                                                        <option value='<?= $res['Stg_id'] ?>'> <?= $res['Stg_nombre'] ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <h4>Tintas</h4>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <select id="tintas" name="Stg_id_pli[]" class="form-control">
                                                            <option selected>Elegir</option>
                                                            <option value="7">CMYK</option>
                                                            <option value="8">Solo negro</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <h4>Tinta especial</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="">
                                                    <div class="input-group">
                                                        <input placeholder="Ejemplo: #e01ab5" id="tintaEspecial" type="text" class="form-control" name="Pli_tintaespecial[]" /> <br>
                                                        <p id="tintaEspecialP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor de tinta. por ejemplo: #e01ab5 </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6 col-sm-6 copyPliego">
                                <div class="x_panel ">
                                    <div class="">
                                        <div class="col-md-12">
                                            <h4>Personalizar pliego</h4>
                                            <div class="input-group">
                                                <div class="x_panel">
                                                //Pegar foreach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h4>Tintas</h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="x_panel">
                                                        <div class="col-md-6">
                                                            <input type="radio" class="" name="Stg_id_pli[]" checked> CMYK
                                                        </div>
                                                        <div class="col-md-1 ml-1" style="border: 1px solid #00FFFF; height:20px; background:#00FFFF;"></div>
                                                        <div class="col-md-1 ml-1" style="border: 1px solid #E5097F; height:20px; background:#E5097F;"></div>
                                                        <div class="col-md-1 ml-1" style="border: 1px solid #FFE900; height:20px; background:#FFE900;"></div>
                                                        <div class="col-md-1 ml-1" style="border: 1px solid #000000; height:20px; background:#000000;"></div>
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="x_panel">
                                                        <div class="col-md-8">
                                                            <input type="radio" class="" name="Stg_id_pli[]"> SOLO NEGRO
                                                        </div>
                                                        <div class="col-md-3 ml-1" style="border: 1px solid #000000; height:20px; width:100%; background:#000000;"></div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="col-form-label col-md-3 col-sm-3 text-left">Tinta especial</label>
                                            <div class="col-md-9 col-sm-9">
                                                <div class="input-group">
                                                    <input type="text" value="#e01ab5" class="form-control" name="Pli_tintaespecial[]" />
                                                    <span class=""><i></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                        <button type="button" id="agregarPliego" class="btn btn-success">Agregar pliego <i class="fa fa-plus"></i></button>

                        <div class="x_panel">
                            <div class="col-md-12">
                                <label class=""><b>Encargado en el area de impresíon </b> <span class="required">*</span></label><br>
                                <div class="col-md-6">
                                    <input type="text" id="encargadoImpresion" name="Imp_encargado" class="form-control">
                                    <p id="encargadoImpresionP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: El nombre solo debe incluir letras. </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="control-label col-md-3 col-sm-3">Observaciones</label>
                                <div class="form-group">
                                    <textarea id="observacionImpresion" class="resizable_textarea form-control" name="Imp_observaciones"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- Terminados -->
        <div class="x_panel">
            <h5>Terminados</h5>
            <h4>Elija los terminados que desee</h4>
            <div class="ln_solid"></div>

            <div class="x_panel">
                <div class="col-md-12 col-sm-12">
                    <div class="col-md-12 checkbox-inline x_panel">
                        <div class="col-md-3">
                            <div class="checkbox">
                                <label>
                                    <input id="refile" type="checkbox" class="flat" name="tipoterminado[]" value="1"> Refile
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input id="empastado" type="checkbox" class="flat" name="tipoterminado[]" value="6"> Empastado
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input id="rustica" type="checkbox" class="flat" name="tipoterminado[]" value="11"> Rustica
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="checkbox">
                                <label>
                                    <input id="engomado" type="checkbox" class="flat" name="tipoterminado[]" value="2"> Engomado
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input id="libreta" type="checkbox" class="flat" name="tipoterminado[]" value="7"> Libreta
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input id="talonario" type="checkbox" class="flat" name="tipoterminado[]" value="12"> Talonario
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="checkbox">
                                <label>
                                    <input id="troquelado" type="checkbox" class="flat" name="tipoterminado[]" value="3"> Troquelado
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input id="pastaDura" type="checkbox" class="flat" name="tipoterminado[]" value="8"> Pasta Dura
                                </label>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input id="hotMeal" type="checkbox" class="flat" name="tipoterminado[]" value="13"> Hot Meal
                                </label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="checkbox">
                                <label>
                                    <input id="grafado" type="checkbox" class="flat" name="tipoterminado[]" value="4"> Grafado
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input id="despuntado" type="checkbox" class="flat" name="tipoterminado[]" value="9"> Despuntado
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input id="anillo" type="checkbox" class="flat" name="tipoterminado[]" value="14"> Anillado
                                </label>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="checkbox">
                                <label>
                                    <input id="repujado" type="checkbox" class="flat" name="tipoterminado[]" value="5"> Repujado
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input id="emblocado" type="checkbox" class="flat" name="tipoterminado[]" value="10"> Emblocado
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input id="cosido" type="checkbox" class="flat" name="tipoterminado[]" value="15"> Cosido
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <div class="x_panel">
                            <div class="checkbox">
                                <label>
                                    <input id="numerado" type="checkbox" class="flat checkActivar" name="tipoterminado[]" value="16"> Numerado
                                </label>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-form-label col-md-3 col-sm-3 ">Desde</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input id="numeradoDesde" type="text" class="form-control inputActivar" disabled="disabled" name="numeradodesde">
                                        <p id="numeradoDesdeP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor númerico. </p>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label col-md-3 col-sm-3 ">Hasta</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input id="numeradoHasta" type="text" class="form-control inputActivar" disabled="disabled" name="numeradohasta">
                                        <p id="numeradoHastaP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor númerico. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="x_panel">
                            <div class="checkbox">
                                <label>
                                    <input id="estampado" type="checkbox" class="flat checkActivar" name="tipoterminado[]" value="17"> Estampado
                                </label>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-form-label col-md-3 col-sm-3 ">Color</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input placeholder="#FFFFFF" id="estampadoColor" type="text" class="form-control inputActivar" disabled="disabled" name="estamcolor">
                                        <p id="estampadoColorP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor de color. por ejemplo: #e01ab5 </p>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label col-md-3 col-sm-3 ">Trafico </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input id="estampadoTrafico" type="text" class="form-control inputActivar" disabled="disabled" name="estamtrafico">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="x_panel">
                            <div class="checkbox">
                                <label>
                                    <input id="Plegado" type="checkbox" class="flat checkActivar" name="tipoterminado[]" value="18"> Plegado
                                </label>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="col-form-label col-md-5 col-sm-5 ">Numero de cuerpos</label>
                                    <div class="col-md-7 col-sm-7 ">
                                        <input id="numeroCuerpos" type="text" class="form-control inputActivar" disabled="disabled" name="plenumerocuerpos">
                                        <p id="numeroCuerposP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor númerico. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="x_panel">
                            <div class="checkbox">
                                <label>
                                    <input id="embolsado" type="checkbox" class="flat checkActivar" name="tipoterminado[]" value="19"> Embolsado
                                </label>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="col-form-label col-md-5 col-sm-5 ">Cantidad</label>
                                    <div class="col-md-7 col-sm-7 ">
                                        <input id="embolsadoCantidad" type="text" class="form-control inputActivar" disabled="disabled" name="embolcantidad">
                                        <p id="embolsadoCantidadP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor númerico. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="x_panel">
                            <div class="checkbox">
                                <label class="">
                                    <input id="fajado" type="checkbox" class="flat checkActivar" name="tipoterminado[]" value="20"> Fajado
                                </label>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="col-form-label col-md-5 col-sm-5 ">Cantidad</label>
                                    <div class="col-md-7 col-sm-7 ">
                                        <input id="fajadoCantidad" type="text" class="form-control inputActivar" disabled="disabled" name="fajacantidad">
                                        <p id="fajadoCantidadP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor númerico. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="x_panel">
                            <div class="checkbox">
                                <label>
                                    <input id="desbasurado" type="checkbox" class="flat checkActivar" name="tipoterminado[]" value="21"> Desbasurado
                                </label>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="col-form-label col-md-5 col-sm-5 ">Cantidad</label>
                                    <div class="col-md-7 col-sm-7 ">
                                        <input id="desbasuradoCantidad" type="text" class="form-control inputActivar" disabled="disabled" name="desbcantidad">
                                        <p id="desbasuradoCantidadP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor númerico. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="x_panel">
                            <div class="checkbox col-md-4">
                                <label>
                                    <input id="perforado" type="checkbox" class="flat checkActivar" name="tipoterminado[]" value="22"> Perforado
                                </label>
                            </div>
                            <div class="row col-md-8">
                                <div class="form-group col-md-6 radioRemoveClass">
                                    <label>
                                        <input id="perforadoMicro" type="radio" class="flat inputActivar" name="perforado" disabled="disabled" value="1"> Micro
                                    </label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>
                                        <input id="perforadoNormal" type="radio" class="flat inputActivar" name="perforado" disabled="disabled" value="2"> Normal
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Terminados especiales -->
            <div class="col-md-12"><br></div>
            <div class="col-md-12">
            </div>
            <h4>Terminados especiales</h4>
            <div class="x_panel col-md-12">
                <div class="col-md-12">
                    <div class="col-md-3">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="checkbox">
                            <label>
                                <input id="plastificadoBrillante" type="checkbox" class="flat" name="tipoterminado[]" value="23"> Plastificado Brillante
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input id="plastificadoOpaco" type="checkbox" class="flat" name="tipoterminado[]" value="27"> Plastificado Opaco
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-3">
                        <div class="col-md-12 col-sm-12 ">

                            <div class="checkbox">
                                <label>
                                    <input id="laminadoMate" type="checkbox" class="flat" name="tipoterminado[]" value="24"> Laminado Mate
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input id="laminadoBrillante" type="checkbox" class="flat" name="tipoterminado[]" value="28"> Laminado Brillante
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="col-md-12 col-sm-12 ">

                            <div class="checkbox">
                                <label>
                                    <input id="uvTotal" type="checkbox" class="flat" name="tipoterminado[]" value="25"> UV total
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input id="uvMate" type="checkbox" class="flat" name="tipoterminado[]" value="29"> UV mate
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="col-md-12 col-sm-12 ">

                            <div class="checkbox">
                                <label>
                                    <input id="metalizadoFoil" type="checkbox" class="flat" name="tipoterminado[]" value="26"> Metalizado Foil
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input id="castCure" type="checkbox" class="flat" name="tipoterminado[]" value="30"> Cast and Cure
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="alertaproduccion">
        
        </div>
        <!-- <div class="formulario__mensaje" id="formulario__mensaje">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
        </div> -->
        <div class="col-md-12 mt-3">
        <div class="col-md-6 float-right">
            <a href="<?php echo getUrl("Produccion", "Produccion", "getMain"); ?>">
                <button type="button" class="btn btn-danger float-right">Cancelar</button>
            </a>
            <input type="submit" class="btn btn-success float-right" value="Registrar Orden">
        </div>
        </div>
    </form>
</div>