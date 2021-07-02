<?php
    if ($_SESSION['rolUser'] != 'Aprendiz') {
?>
<form id="formUpdateProduccion" class="form-horizontal form-label-left" action="<?php echo getUrl("Produccion", "Produccion", "postUpdateOrdenProduccion"); ?>" method="POST">
<div class="x_content">
    <!-- Header info -->
    <div class="x_panel">
        <h3>Orden de produccion No. <?= $Odp_id ?></h3>
        <h4>Funcionario que atiende: <?= $usu_name ?></h4>
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

    

        <input type="hidden" name="Odp_id" value="<?= $Odp_id ?>">

        <div class="">
            <div class="row">

                <!--------- Datos del cliente ---------->
                <?php foreach ($Orden as $odp) { ?>
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
                                        <select id="tipoCliente" name="Odp_tipoempresa" class="form-control">
                                            <option selected value="">Tipo de cliente</option>
                                            <!-----Tipo de cliente------>
                                            <?php
                                            foreach ($tipocliente as $res) {
                                                if ($res['Tempr_id'] == $odp['Odp_tipoempresa']) {
                                            ?>
                                                    <option selected value='<?= $res['Tempr_id'] ?>'> <?= $res['Tempr_descripcion'] ?></option>

                                                <?php } else { ?>
                                                    <option value='<?= $res['Tempr_id'] ?>'> <?= $res['Tempr_descripcion'] ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <?php foreach ($consultempresa as $empr) { ?>
                                        <label class="control-label col-md-3 col-sm-3 " for="">Elegir cliente<span class="required">*</span></label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select id="elegirCliente" name="Emp_id" class="form-control" data-url="<?= getUrl("Produccion", "Produccion", "selectCliente", false, "ajax") ?>">
                                                <option value="">Elegir cliente</option>

                                                <!-----Elegir de cliente------>

                                                <?php
                                                foreach ($cliente as $res) {
                                                    if ($res['Emp_id'] == $empr['Emp_id']) {
                                                ?>
                                                        <option value='<?= $res['Emp_id'] ?>' selected> <?= $res['Emp_razonSocial'] ?></option>

                                                    <?php } else { ?>
                                                        <option value='<?= $res['Emp_id'] ?>'> <?= $res['Emp_razonSocial'] ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                </div>
                                <div id="contenedorCliente">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3">Nombre cliente</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control datosCliente" value="<?= $empr['Emp_razonSocial'] ?>" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 ">NIT</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control datosCliente" value="<?= $empr['Emp_NIT'] ?>" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 ">Direccion</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control datosCliente" value="<?= $empr['Emp_direccion'] ?>" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 ">Ciudad</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control datosCliente" value="<?= $empr['Mun_id'] ?>" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 ">Telefono</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control datosCliente" value="<?= $empr['Emp_segundoNumeroContacto'] ?>" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 ">Solicitado por</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control datosCliente" value="<?= $empr['Emp_nombreContacto'] ?>" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 ">Responsable</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control datosCliente" value="<?= $empr['Emp_nombreContacto'] ?>" disabled="disabled">
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!---------- Datos del Producto ----------->
                    <?php foreach ($consultpterminado as $pter) { ?>
                        <div class="col-md-6">
                            <input type="hidden" name="Pte_id" value="<?= $pter['Pte_id'] ?>">
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
                                            <select id="elegirProducto" class="form-control" name="Pba_id">
                                                <option value="">Elegir...</option>
                                                <?php
                                                foreach ($productos as $res) {
                                                    if ($res['Pba_id'] == $pter['Pba_id']) {
                                                ?>
                                                        <option value='<?= $res['Pba_id'] ?>' selected> <?= $res['Pba_descripcion'] ?></option>

                                                    <?php } else { ?>
                                                        <option value='<?= $res['Pba_id'] ?>'> <?= $res['Pba_descripcion'] ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3">Cantidad</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input id="cantidad" type="number" class="form-control" name="Pte_cantidad" value="<?= $pter['Pte_cantidad'] ?>">
                                            <p id="cantidadP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor numerico</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3">Cantidad de paginas</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" id="cantidadPaginas" class="form-control" name="Pte_numeroPaginas" value="<?php if ($pter['Pte_numeroPaginas'] != 0) {
                                                                                                                                                echo $pter['Pte_numeroPaginas'];
                                                                                                                                            } ?>">
                                            <p id="cantidadPP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor numerico</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3">Tama&ntilde;o abierto</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input id="tamañoAbierto" type="text" class="form-control" name="Pte_tamañoAbierto" value="<?= $pter['Pte_tamañoAbierto'] ?>">
                                            <p id="tamañoAbiertoP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor como por ejemplo: 24 x 21.5 cm </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3">Tama&ntilde;o cerrado</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input id="tamañoCerrado" type="text" class="form-control" name="Pte_tamañoCerrado" value="<?= $pter['Pte_tamañoCerrado'] ?>">
                                            <p id="tamañoCerradoP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor como por ejemplo: 24 x 21.5 cm </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3">Fecha de inicio <span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input class="form-control" name="Odp_fechaInicio" value="<?php if ($odp['Odp_fechaInicio'] != "") {
                                                                                                            echo  date('Y-m-d', strtotime($odp['Odp_fechaInicio']));
                                                                                                        } ?>" placeholder="dd-mm-yyyy" type="date">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 ">Fecha fin <span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input class="form-control" name="Odp_fechafin" value="<?php if ($odp['Odp_fechafin'] != "") {
                                                                                                        echo date('Y-m-d', strtotime($odp['Odp_fechafin']));
                                                                                                    } ?>" placeholder="dd-mm-yyyy" type="date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 ">Fecha entrega <span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input class="form-control" name="Odp_fechaEntrega" value="<?php if ($odp['Odp_fechaEntrega'] != "") {
                                                                                                            echo date('Y-m-d', strtotime($odp['Odp_fechaEntrega']));
                                                                                                        } ?>" placeholder="dd-mm-yyyy" type="date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 "><b> Dise&ntilde;ador(a)</b></label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input id="diseñador" type="text" class="form-control" name="Pte_diseñador" value="<?= $pter['Pte_diseñador'] ?>">
                                            <p id="diseñadorP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Solo debe incluir letras </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
            </div>
        <?php } ?>

        <!----------- Pre-impresion ------------->
        <?php foreach ($consultpreimpre as $pimpr) { ?>
            <div class="">
                <input type="hidden" name="Pim_id" value="<?= $pimpr['Pim_id'] ?>">
                <div class="x_panel">
                    <div class="x_content">
                        <h5>Datos de pre-impresión</h5>
                        <div class="ln_solid"></div>
                        <div class="x_panel">
                            <div class="form-group col-md-6 mt-3">
                                <label class="control-label col-md-3 col-sm-3 " for="">Tipo de dise&ntilde;o<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select class="form-control" name="Stg_id">
                                        <option selected>Elegir</option>
                                        <?php
                                        foreach ($tipodiseno as $res) {
                                            if ($res['Stg_id'] == $pimpr['Stg_id']) {
                                        ?>
                                                <option value='<?= $res['Stg_id'] ?>' selected> <?= $res['Stg_nombre'] ?></option>

                                            <?php } else { ?>
                                                <option value='<?= $res['Stg_id'] ?>'> <?= $res['Stg_nombre'] ?></option>
                                            <?php } ?>
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
                                <?php $contsustrato = 1; ?>
                                <?php foreach ($consultsustratos as $sus) { ?>
                                    <div class="col-md-6 copysustrato">
                                        <input type="hidden" name="Sus_id" value="<?= $sus['Sus_id'] ?>">
                                        <?php if ($contsustrato > 1) { ?>
                                            <div class='col-md-1 float-right'>
                                                <button type='button' class='btn btn-danger position-absolute eliminarSustrato' style='z-index: 1;' data-toggle='tooltip' data-placement='bottom' title='Eliminar'>x</button>
                                            </div>
                                        <?php } ?>
                                        <div class="x_panel">
                                            <div class="col-md-12 mt-2">
                                                <div class="form-group col-md-12">
                                                    <label class="" for="">Tipo de sustrato<span class="required">*</span>
                                                </div>
                                                </label>
                                                <div class="form-group col-md-12 col-sm-12 ">
                                                    <select class="form-control" name="Arti_id[]">
                                                        <option selected>Elegir</option>
                                                        <?php
                                                        foreach ($articulo as $res) {
                                                            if ($res['Arti_id'] == $sus['Arti_id']) {
                                                        ?>
                                                                <option value='<?= $res['Arti_id'] ?>' selected> <?= $res['Arti_nombre'] ?></option>
                                                            <?php } else { ?>
                                                                <option value='<?= $res['Arti_id'] ?>'> <?= $res['Arti_nombre'] ?></option>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="">Tama&ntilde;o (cm)</label>
                                                <div class="col-md-12 col-sm-12 ">
                                                    <input id="tamañoSus" type="text" class="form-control" name="Sus_tamañoPliego[]" value="<?= $sus['Sus_tamañoPliego'] ?>">
                                                    <p id="tamañoSusP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor como por ejemplo: 24 x 21.5 cm</p>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="">Cantidad</label>
                                                <div class="col-md-12 col-sm-12 ">
                                                    <input id="cantidadSus" type="text" class="form-control" name="Sus_cantidadSustrato[]" value="<?= $sus['Sus_cantidadSustrato'] ?>">
                                                    <p id="cantidadSusP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor numerico</p>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="">Corte</label>
                                                <div class="col-md-12 col-sm-12 ">
                                                    <input id="corteSus" type="text" class="form-control" name="Sus_tamañoCorte[]" value="<?= $sus['Sus_tamañoCorte'] ?>">
                                                    <p id="corteSusP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor como por ejemplo: 24 x 21.5 cm </p>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="">Tiraje pedido</label>
                                                <div class="col-md-12 col-sm-12 ">
                                                    <input id="tirajePedidoSus" type="text" class="form-control tirajePedido" name="Sus_tirajePedido[]" value="<?= $sus['Sus_tirajePedido'] ?>">
                                                    <p id="tirajePedidoSusP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor numerico. </p>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label class="" for="">Porcentaje de desperdicio %<span class="required">*</span>
                                                </label>
                                                <div class="col-md-12 col-sm-12 ">
                                                    <input id="porcentajeDesperdicio" type="number" class="form-control porcentajeDesperdicio" value="<?= $sus['Sus_porcentajeDesperdicio'] ?>" min="0" max="100" name="Sus_porcentajeDesperdicio[]">
                                                    <p id="porcentajeDesperdicioSusP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor numerico. </p>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class=""><b>Tiraje total</b></label>
                                                <div class="col-md-12 col-sm-12 ">
                                                    <input id="tirajeTotalSus" type="text" name="Sus_tirajeTotal[]" class="form-control tirajeTotal" value="<?= $sus['Sus_tirajeTotal'] ?>">
                                                    <p id="tirajeTotalSusP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor numerico. (El calulo de desperdicio se hace automaticamente con el tiraje pedido). </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php $contsustrato++;
                                } ?>

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
                    <div class="col-md-8">
                        <label class=""><b>Encargado en el area de pre-impresion </b> <span class="required">*</span></label><br>
                        <div class="col-md-6">
                            <input id="encargadoPreImpresion" type="text" class="form-control" name="Pim_encargado" value="<?= $pimpr['Pim_encargado'] ?>">
                            <p id="encargadoPreImpresionP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: El nombre solo debe incluir letras. </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="control-label col-md-3 col-sm-3">Observaciones</label>
                        <div class="form-group">
                            <textarea class="resizable_textarea form-control" name="Pim_observacion"><?= $pimpr['Pim_observacion'] ?></textarea>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>

        <!----------- Datos de impresión -------------->
        <?php
            foreach ($consultimpresion as $impr) { ?>
                <div class="">
                    <input type="hidden" name="Imp_id" value="<?= $impr['Imp_id'] ?>">
                    <div class="x_panel">
                        <div class="x_content">
                            <h5>Datos de impresión</h5>
                            <div class="ln_solid"></div>

                            <div class="x_panel">
                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <label class="" for="">Elegir maquina<span class="required">*</span></label><br>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select name="Maq_id" class="form-control">
                                                <option selected>Elegir</option>
                                                <?php
                                                foreach ($maquina as $res) {
                                                    if ($res['Maq_id'] = $impr['Maq_id']) {
                                                ?>
                                                        <option value='<?= $res['Maq_id'] ?>' selected> <?= $res['Maq_nombre'] ?></option>

                                                    <?php } else { ?>
                                                        <option value='<?= $res['Maq_id'] ?>'> <?= $res['Maq_nombre'] ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="">Formato corte:</label> <br>
                                        <div class="col-md-5 col-sm-5">
                                            <input id="formatoCorteImpresion" type="text" name="Imp_formatoCorte" class="form-control" value="<?= $impr['Imp_formatoCorte'] ?>">
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
                                    <?php $contpliego = 1; ?>
                                    <?php
                                    if (mysqli_num_rows($consultpliegos) > 0) {
                                        foreach ($consultpliegos as $pli) { ?>
                                            <div class="col-md-6 col-sm-6 copyPliego">
                                                <input type="hidden" name="Pli_id" value="<?= $pli['Pli_id'] ?>">
                                                <?php if ($contpliego > 1) { ?>
                                                    <div class='col-md-1 float-right' id='botonEliminarSustrato'>
                                                        <button type='button' class='btn btn-danger position-absolute eliminarPliego' style='z-index: 1;' data-toggle='tooltip' data-placement='bottom' title='Eliminar'>x</button>
                                                    </div>
                                                <?php } ?>
                                                <div class="x_panel ">
                                                    <div class="">
                                                        <div class="col-md-12">
                                                            <h4>Personalizar pliego</h4>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <select name="Pli_rip[]" class="form-control">
                                                                        <option selected>Elegir</option>
                                                                        <?php
                                                                        foreach ($tiporip as $res) {
                                                                            if ($res['Stg_id'] == $pli['Pli_rip']) {
                                                                        ?>
                                                                                <option value='<?= $res['Stg_id'] ?>' selected> <?= $res['Stg_nombre'] ?></option>

                                                                            <?php } else { ?>
                                                                                <option value='<?= $res['Stg_id'] ?>'> <?= $res['Stg_nombre'] ?></option>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <h4>Tintas</h4>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="">
                                                                        <select name="Stg_id_pli[]" class="form-control">
                                                                            <option selected>Elegir</option>
                                                                            <?php
                                                                            foreach ($tintas as $res) {
                                                                                if ($res['Stg_id'] == $pli['Stg_id']) {
                                                                            ?>
                                                                                    <option value='<?= $res['Stg_id'] ?>' selected> <?= $res['Stg_nombre'] ?></option>

                                                                                <?php } else { ?>
                                                                                    <option value='<?= $res['Stg_id'] ?>'> <?= $res['Stg_nombre'] ?></option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <h4>Tinta especial</h4>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="">
                                                                    <div class="input-group">
                                                                        <input id="tintaEspecial" type="text" class="form-control" name="Pli_tintaespecial[]" value="<?= $pli['Pli_tintaespecial'] ?>">
                                                                        <p id="tintaEspecialP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor de tinta. por ejemplo: #E01AB5 </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        <?php $contpliego++;
                                        }
                                    } else {
                                        ?>
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
                            <?php } ?>
                            </div>

                            <button type="button" id="agregarPliego" class="btn btn-success">Agregar pliego <i class="fa fa-plus"></i></button>

                            <div class="x_panel">
                                <div class="col-md-12">
                                    <label class=""><b>Encargado en el area de impresíon </b> <span class="required">*</span></label><br>
                                    <div class="col-md-6">
                                        <input id="encargadoImpresion" type="text" name="Imp_encargado" value="<?= $impr['Imp_encargado'] ?>" class="form-control">
                                        <p id="encargadoImpresionP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: El nombre solo debe incluir letras. </p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label col-md-3 col-sm-3">Observaciones</label>
                                    <div class="form-group">
                                        <textarea class="resizable_textarea form-control" name="Imp_observaciones"><?= $impr['Imp_observaciones'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            <?php
            } 
        ?>
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
                            <input name="tipoterminado[]" <?php $done = 0;
                                                            foreach ($tipoterminado as $tipoter) {
                                                                if ($tipoter['Ter_id'] == 1) {
                                                                    $done = 1;
                                                                }
                                                            }
                                                            echo "type='checkbox'";
                                                            if ($done == 1) {
                                                                echo "checked";
                                                            } ?> class="flat" value="1"> Refile
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input <?php $done = 0;
                                    foreach ($tipoterminado as $tipoter) {
                                        if ($tipoter['Ter_id'] == 6) {
                                            $done = 1;
                                        }
                                    }
                                    echo "type='checkbox'";
                                    echo "type='checkbox'";
                                    if ($done == 1) {
                                        echo "checked";
                                    } ?> class="flat" name="tipoterminado[]" value="6"> Empastado
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input <?php $done = 0;
                                    foreach ($tipoterminado as $tipoter) {
                                        if ($tipoter['Ter_id'] == 11) {
                                            $done = 1;
                                        }
                                    }
                                    echo "type='checkbox'";
                                    if ($done == 1) {
                                        echo "checked";
                                    } ?> class="flat" name="tipoterminado[]" value="11"> Rustica
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input <?php $done = 0;
                                    foreach ($tipoterminado as $tipoter) {
                                        if ($tipoter['Ter_id'] == 2) {
                                            $done = 1;
                                        }
                                    }
                                    echo "type='checkbox'";
                                    if ($done == 1) {
                                        echo "checked";
                                    } ?> class="flat" name="tipoterminado[]" value="2"> Engomado
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input <?php $done = 0;
                                    foreach ($tipoterminado as $tipoter) {
                                        if ($tipoter['Ter_id'] == 7) {
                                            $done = 1;
                                        }
                                    }
                                    echo "type='checkbox'";
                                    if ($done == 1) {
                                        echo "checked";
                                    } ?> class="flat" name="tipoterminado[]" value="7"> Libreta
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input <?php $done = 0;
                                    foreach ($tipoterminado as $tipoter) {
                                        if ($tipoter['Ter_id'] == 12) {
                                            $done = 1;
                                        }
                                    }
                                    echo "type='checkbox'";
                                    if ($done == 1) {
                                        echo "checked";
                                    } ?> class="flat" name="tipoterminado[]" value="12"> Talonario
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input <?php $done = 0;
                                    foreach ($tipoterminado as $tipoter) {
                                        if ($tipoter['Ter_id'] == 3) {
                                            $done = 1;
                                        }
                                    }
                                    echo "type='checkbox'";
                                    if ($done == 1) {
                                        echo "checked";
                                    } ?> class="flat" name="tipoterminado[]" value="3"> Troquelado
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input <?php $done = 0;
                                    foreach ($tipoterminado as $tipoter) {
                                        if ($tipoter['Ter_id'] == 8) {
                                            $done = 1;
                                        }
                                    }
                                    echo "type='checkbox'";
                                    if ($done == 1) {
                                        echo "checked";
                                    } ?> class="flat" name="tipoterminado[]" value="8"> Pasta Dura
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input <?php $done = 0;
                                    foreach ($tipoterminado as $tipoter) {
                                        if ($tipoter['Ter_id'] == 13) {
                                            $done = 1;
                                        }
                                    }
                                    echo "type='checkbox'";
                                    if ($done == 1) {
                                        echo "checked";
                                    } ?> class="flat" name="tipoterminado[]" value="13"> Hot Meal
                        </label>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="checkbox">
                        <label>
                            <input <?php $done = 0;
                                    foreach ($tipoterminado as $tipoter) {
                                        if ($tipoter['Ter_id'] == 4) {
                                            $done = 1;
                                        }
                                    }
                                    echo "type='checkbox'";
                                    if ($done == 1) {
                                        echo "checked";
                                    } ?> class="flat" name="tipoterminado[]" value="4"> Grafado
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input <?php $done = 0;
                                    foreach ($tipoterminado as $tipoter) {
                                        if ($tipoter['Ter_id'] == 9) {
                                            $done = 1;
                                        }
                                    }
                                    echo "type='checkbox'";
                                    if ($done == 1) {
                                        echo "checked";
                                    } ?> class="flat" name="tipoterminado[]" value="9"> Despuntado
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input <?php $done = 0;
                                    foreach ($tipoterminado as $tipoter) {
                                        if ($tipoter['Ter_id'] == 14) {
                                            $done = 1;
                                        }
                                    }
                                    echo "type='checkbox'";
                                    if ($done == 1) {
                                        echo "checked";
                                    } ?> class="flat" name="tipoterminado[]" value="14"> Anillado
                        </label>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input <?php $done = 0;
                                    foreach ($tipoterminado as $tipoter) {
                                        if ($tipoter['Ter_id'] == 5) {
                                            $done = 1;
                                        }
                                    }
                                    echo "type='checkbox'";
                                    if ($done == 1) {
                                        echo "checked";
                                    } ?> class="flat" name="tipoterminado[]" value="5"> Repujado
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input <?php $done = 0;
                                    foreach ($tipoterminado as $tipoter) {
                                        if ($tipoter['Ter_id'] == 10) {
                                            $done = 1;
                                        }
                                    }
                                    echo "type='checkbox'";
                                    if ($done == 1) {
                                        echo "checked";
                                    } ?> class="flat" name="tipoterminado[]" value="10"> Emblocado
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input <?php $done = 0;
                                    foreach ($tipoterminado as $tipoter) {
                                        if ($tipoter['Ter_id'] == 15) {
                                            $done = 1;
                                        }
                                    }
                                    echo "type='checkbox'";
                                    if ($done == 1) {
                                        echo "checked";
                                    } ?> class="flat" name="tipoterminado[]" value="15"> Cosido
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
                            <input class="flat checkActivar" <?php $done = 0;
                                                                foreach ($tipoterminado as $tipoter) {
                                                                    if ($tipoter['Ter_id'] == 16) {
                                                                        $done = 1;
                                                                    }
                                                                }
                                                                echo "type='checkbox'";
                                                                if ($done == 1) {
                                                                    echo "checked";
                                                                } ?> name="tipoterminado[]" value="16"> Numerado
                        </label>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-form-label col-md-3 col-sm-3 ">Desde</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input id="numeradoDesde" type="text" class="form-control inputActivar" value="<?php foreach ($tipoterminado as $tipoter) {
                                                                                                                    if ($tipoter['Ter_id'] == 16) {
                                                                                                                        echo $tipoter['tter_descripcion1'];
                                                                                                                    }
                                                                                                                } ?>" name="numeradodesde" <?php if ($done != 1) {
                                                                                                                                    echo " disabled";
                                                                                                                                } ?>>
                                <p id="numeradoDesdeP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor númerico. </p>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label col-md-3 col-sm-3 ">Hasta</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input id="numeradoHasta" type="text" class="form-control inputActivar" value="<?php foreach ($tipoterminado as $tipoter) {
                                                                                                                    if ($tipoter['Ter_id'] == 16) {
                                                                                                                        echo $tipoter['tter_descripcion2'];
                                                                                                                    }
                                                                                                                } ?>" <?php if ($done != 1) {
                                                                                                                echo " disabled";
                                                                                                            } ?> name="numeradohasta">
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
                            <input class="flat checkActivar" <?php $done = 0;
                                                                foreach ($tipoterminado as $tipoter) {
                                                                    if ($tipoter['Ter_id'] == 17) {
                                                                        $done = 1;
                                                                    }
                                                                }
                                                                echo "type='checkbox'";
                                                                if ($done == 1) {
                                                                    echo "checked";
                                                                } ?> name="tipoterminado[]" value="17"> Estampado
                        </label>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-form-label col-md-3 col-sm-3 ">Color</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input id="estamcolor" type="text" class="form-control inputActivar" value="<?php foreach ($tipoterminado as $tipoter) {
                                                                                                                if ($tipoter['Ter_id'] == 17) {
                                                                                                                    echo $tipoter['tter_descripcion1'];
                                                                                                                }
                                                                                                            } ?>" <?php if ($done != 1) {
                                                                                                                echo " disabled";
                                                                                                            } ?> name="estamcolor">
                                <p id="estamcolorP" class="form_input-error"><span class="fa fa-times-circle"></span> Error: Debe ingresar un valor de color. por ejemplo: #E01AB5 </p>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label col-md-3 col-sm-3 ">Trafico</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control inputActivar" value="<?php foreach ($tipoterminado as $tipoter) {
                                                                                                if ($tipoter['Ter_id'] == 17) {
                                                                                                    echo $tipoter['tter_descripcion2'];
                                                                                                }
                                                                                            } ?>" <?php if ($done != 1) {
                                                                                                                echo " disabled";
                                                                                                            } ?> name="estamtrafico">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="x_panel">
                    <div class="checkbox">
                        <label>
                            <input class="flat checkActivar" name="tipoterminado[]" <?php $done = 0;
                                                                                    foreach ($tipoterminado as $tipoter) {
                                                                                        if ($tipoter['Ter_id'] == 18) {
                                                                                            $done = 1;
                                                                                        }
                                                                                    }
                                                                                    echo "type='checkbox'";
                                                                                    if ($done == 1) {
                                                                                        echo "checked";
                                                                                    } ?> value="18"> Plegado
                        </label>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-form-label col-md-5 col-sm-5 ">Numero de cuerpos</label>
                            <div class="col-md-7 col-sm-7 ">
                                <input id="numeroCuerpos" type="text" class="form-control inputActivar" value="<?php foreach ($tipoterminado as $tipoter) {
                                                                                                                    if ($tipoter['Ter_id'] == 18) {
                                                                                                                        echo $tipoter['tter_descripcion1'];
                                                                                                                    }
                                                                                                                } ?>" <?php if ($done != 1) {
                                                                                                                echo " disabled";
                                                                                                            } ?> name="plenumerocuerpos">
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
                            <input <?php $done = 0;
                                    foreach ($tipoterminado as $tipoter) {
                                        if ($tipoter['Ter_id'] == 19) {
                                            $done = 1;
                                        }
                                    }
                                    echo "type='checkbox'";
                                    if ($done == 1) {
                                        echo "checked";
                                    } ?> class="flat checkActivar" name="tipoterminado[]" value="19"> Embolsado
                        </label>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-form-label col-md-5 col-sm-5 ">Cantidad</label>
                            <div class="col-md-7 col-sm-7 ">
                                <input id="embolsadoCantidad" type="text" class="form-control inputActivar" value="<?php foreach ($tipoterminado as $tipoter) {
                                                                                                                        if ($tipoter['Ter_id'] == 19) {
                                                                                                                            echo $tipoter['tter_descripcion1'];
                                                                                                                        }
                                                                                                                    } ?>" <?php if ($done != 1) {
                                                                                                                echo " disabled";
                                                                                                            } ?> name="embolcantidad">
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
                            <input <?php $done = 0;
                                    foreach ($tipoterminado as $tipoter) {
                                        if ($tipoter['Ter_id'] == 20) {
                                            $done = 1;
                                        }
                                    }
                                    echo "type='checkbox'";
                                    if ($done == 1) {
                                        echo "checked";
                                    } ?> class="flat checkActivar" name="tipoterminado[]" value="20"> Fajado
                        </label>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-form-label col-md-5 col-sm-5 ">Cantidad</label>
                            <div class="col-md-7 col-sm-7 ">
                                <input id="fajadoCantidad" type="text" class="form-control inputActivar" value="<?php foreach ($tipoterminado as $tipoter) {
                                                                                                                    if ($tipoter['Ter_id'] == 20) {
                                                                                                                        echo $tipoter['tter_descripcion1'];
                                                                                                                    }
                                                                                                                } ?>" <?php if ($done != 1) {
                                                                                                                echo " disabled";
                                                                                                            } ?> name="fajacantidad">
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
                            <input <?php $done = 0;
                                    foreach ($tipoterminado as $tipoter) {
                                        if ($tipoter['Ter_id'] == 21) {
                                            $done = 1;
                                        }
                                    }
                                    echo "type='checkbox'";
                                    if ($done == 1) {
                                        echo "checked";
                                    } ?> class="flat checkActivar" name="tipoterminado[]" value="21"> Desbasurado
                        </label>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-form-label col-md-5 col-sm-5 ">Cantidad</label>
                            <div class="col-md-7 col-sm-7 ">
                                <input id="desbasuradoCantidad" type="text" class="form-control inputActivar" value="<?php foreach ($tipoterminado as $tipoter) {
                                                                                                                            if ($tipoter['Ter_id'] == 21) {
                                                                                                                                echo $tipoter['tter_descripcion1'];
                                                                                                                            }
                                                                                                                        } ?>" <?php if ($done != 1) {
                                                                                                                echo " disabled";
                                                                                                            } ?> name="desbcantidad">
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
                            <input <?php $done = 0;
                                    foreach ($tipoterminado as $tipoter) {
                                        if ($tipoter['Ter_id'] == 22) {
                                            $done = 1;
                                        }
                                    }
                                    echo "type='checkbox'";
                                    if ($done == 1) {
                                        echo "checked";
                                    } ?> class="flat checkActivar" name="tipoterminado[]" value="22"> Perforado
                        </label>
                    </div>
                    <div class="row col-md-8">
                        <div class="form-group col-md-6 radioRemoveClass">
                            <label>
                                <input class="flat inputActivar" name="perforado" <?php $check = 0;
                                                                                    foreach ($tipoterminado as $tipoter) {
                                                                                        if ($tipoter['Ter_id'] == 22) {
                                                                                            $check = $tipoter['tter_descripcion1'];
                                                                                        }
                                                                                    }
                                                                                    echo "type='radio'";
                                                                                    if ($check == '1') {
                                                                                        echo "checked value='1'>";
                                                                                    } else {
                                                                                        echo "value='1'>";
                                                                                    } ?> Micro </label>
                        </div>
                        <div class="form-group col-md-6">
                            <label>
                                <input class="flat inputActivar" name="perforado" <?php $check = 0;
                                                                                    foreach ($tipoterminado as $tipoter) {
                                                                                        if ($tipoter['Ter_id'] == 22) {
                                                                                            $check = $tipoter['tter_descripcion1'];
                                                                                        }
                                                                                    }
                                                                                    echo "type='radio' ";
                                                                                    if ($check == '2') {
                                                                                        echo "checked value='2'>";
                                                                                    } else {
                                                                                        echo "value='2'>";
                                                                                    } ?> Normal </label>
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
    <div class="x_panel col-md-12 col-sm-3">
        <div class="col-md-12">
            <div class="col-md-3">
            <div class="col-md-12 col-sm-12 ">
                <div class="checkbox">
                    <label>
                        <input id="plastificadoBrillante" <?php $done = 0;
                                                            foreach ($tipoterminado as $tipoter) {
                                                                if ($tipoter['Ter_id'] == 23) {
                                                                    $done = 1;
                                                                }
                                                            }
                                                            echo "type='checkbox'";
                                                            if ($done == 1) {
                                                                echo "checked";
                                                            } ?> class="flat" name="tipoterminado[]" value="23"> Plastificado Brillante
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input id="plastificadoOpaco" <?php $done = 0;
                                                        foreach ($tipoterminado as $tipoter) {
                                                            if ($tipoter['Ter_id'] == 27) {
                                                                $done = 1;
                                                            }
                                                        }
                                                        echo "type='checkbox'";
                                                        if ($done == 1) {
                                                            echo "checked";
                                                        } ?> class="flat" name="tipoterminado[]" value="27"> Plastificado Opaco
                    </label>
                </div>
            </div>
            </div>

            <div class="col-md-3">
                <div class="col-md-12 col-sm-12 ">

                    <div class="checkbox">
                        <label>
                            <input id="laminadoMate" <?php $done = 0;
                                                        foreach ($tipoterminado as $tipoter) {
                                                            if ($tipoter['Ter_id'] == 24) {
                                                                $done = 1;
                                                            }
                                                        }
                                                        echo "type='checkbox'";
                                                        if ($done == 1) {
                                                            echo "checked";
                                                        } ?> class="flat" name="tipoterminado[]" value="24"> Laminado Mate
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input id="laminadoBrillante" <?php $done = 0;
                                                            foreach ($tipoterminado as $tipoter) {
                                                                if ($tipoter['Ter_id'] == 28) {
                                                                    $done = 1;
                                                                }
                                                            }
                                                            echo "type='checkbox'";
                                                            if ($done == 1) {
                                                                echo "checked";
                                                            } ?> class="flat" name="tipoterminado[]" value="28"> Laminado Brillante
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="col-md-12 col-sm-12 ">

                    <div class="checkbox">
                        <label>
                            <input id="uvTotal" <?php $done = 0;
                                                foreach ($tipoterminado as $tipoter) {
                                                    if ($tipoter['Ter_id'] == 25) {
                                                        $done = 1;
                                                    }
                                                }
                                                echo "type='checkbox'";
                                                if ($done == 1) {
                                                    echo "checked";
                                                } ?> class="flat" name="tipoterminado[]" value="25"> UV total
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input id="uvMate" <?php $done = 0;
                                                foreach ($tipoterminado as $tipoter) {
                                                    if ($tipoter['Ter_id'] == 29) {
                                                        $done = 1;
                                                    }
                                                }
                                                echo "type='checkbox'";
                                                if ($done == 1) {
                                                    echo "checked";
                                                } ?> class="flat" name="tipoterminado[]" value="29"> UV mate
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="col-md-12 col-sm-12 ">

                    <div class="checkbox">
                        <label>
                            <input id="metalizadoFoil" <?php $done = 0;
                                                        foreach ($tipoterminado as $tipoter) {
                                                            if ($tipoter['Ter_id'] == 26) {
                                                                $done = 1;
                                                            }
                                                        }
                                                        echo "type='checkbox'";
                                                        if ($done == 1) {
                                                            echo "checked";
                                                        } ?> class="flat" name="tipoterminado[]" value="26"> Metalizado Foil
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input id="castCure" <?php $done = 0;
                                                    foreach ($tipoterminado as $tipoter) {
                                                        if ($tipoter['Ter_id'] == 30) {
                                                            $done = 1;
                                                        }
                                                    }
                                                    echo "type='checkbox'";
                                                    if ($done == 1) {
                                                        echo "checked";
                                                    } ?> class="flat" name="tipoterminado[]" value="30"> Cast and Cure
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 mt-5">
        <div id="alertaproduccion">

        </div>
        <div class="col-md-6 float-right">
            <a href="<?php echo getUrl("Produccion", "Produccion", "getMain"); ?>">
                <button type="button" class="btn btn-danger float-right">Cancelar</button>
            </a>
            <input type="submit" class="btn btn-success float-right" value="Actualizar Orden">
        </div>
    </div>
</div>

</div>
</form>
<?php }else{

echo "<div class='x_panel'>";
echo "No tienes los permisos necesarios para acceder a esta vista :D <br>";
echo "<a href='".getUrl("Produccion", "Produccion", "getMain")."'> <button class='btn btn-primary mt-3'> Volver </button> </a>";
echo "</div>";
}


?>