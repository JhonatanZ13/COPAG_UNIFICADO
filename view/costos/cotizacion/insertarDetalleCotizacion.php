<div class="col-md-12 col-sm-12 ">
    <h2>Insertar Cotizacion</h2>
    <div class="clearfix"></div>
</div>
<form id="formInsertDetalleCotizacion"
    action="<?php echo getUrl("costos","cotizacion","postInsertDetalleCotizacion");?>" method="post">

    <input type="hidden" name="Ped_id" value="<?php echo $Ped_id; ?>">
    <div class="x_content">
        <!-- Observaciones  -->
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Descripcion del producto:</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><button type="button" class="btn btn-success btn-sm collapse-link">Descripcion
                                <i class="fa fa-chevron-up pl-3"></i></button></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="">
                    <div id="alerts"></div>

                    <div class="form-group">
                        <!-- <label class="control-label col-md-3 col-sm-3 ">Resizable Text area</label> -->
                        <div class="col-md-12 col-sm-12 ">
                            <textarea name="descripcion" class="resizable_textarea form-control"
                                placeholder="Ingrese observaciones generales del producto..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12">

            <div class="x_panel">
                <div class="x_title">
                    <h2>Informacion del producto:</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><button type="button" class="btn btn-success btn-sm collapse-link">Informacion
                                <i class="fa fa-chevron-up pl-3"></i></button></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Tipo de producto:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select class="form-control" name="tipoProducto" id="detalleCotizacionTipoProducto">
                                    <option value="0">Seleccione...</option>
                                    <?php
                                    foreach($productoBase as $producto){
                                        echo "<option value='".$producto['Pba_id']."'>".$producto['Pba_descripcion']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Cantidad:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" id="detalleCotizacionCantidad" min="1" name="cantidadProducto"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Paginas:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" name="paginasProducto" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Tamaño abierto:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" name="tamanoAbierto" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Tamaño cerrado:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" name="tamanoCerrado" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 "><strong>Costo
                                            diseño:</strong></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="number" name="costoDiseno" id="totalDiseno" class="form-control"
                                            placeholder="$">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Encargado:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <select name="encargadoDiseno" class="form-control">
                                            <option value="0">Seleccione...</option>
                                            <option value="funcionario">Funcionario</option>
                                            <option value="aprendiz">Aprendiz</option>
                                            <option value="no aplica">No Aplica</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="x_panel">
                <div class="x_title">
                    <h2>Planchas:</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><button type="button" class="btn btn-success btn-sm collapse-link">Informacion
                                <i class="fa fa-chevron-up pl-3"></i></button></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <!-- Inicio Bloque planchas -->
                <div class="x_content">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Maquina:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="maquinaPlancha" id="detalleCotizacionMaquinaPlancha" class="form-control">
                                    <option value="0">Seleccione...</option>
                                    <?php
                                    foreach($maquina as $m){
                                        echo "<option value='".$m['Maq_id']."'>".$m['Maq_nombre']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Cantidad:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="number" name="cantidadPlancha"
                                            class="form-control calcularCantidad" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Costo Unitario:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="number" name="costoUnitarioPlancha"
                                            class="form-control calcularCostoUnitario" readonly="readonly"
                                            placeholder="$">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 "><strong>Valor total:</strong></label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" name="valorTotalPlancha" class="form-control calcularResultado"
                                    readonly="readonly" placeholder="$" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin Bloque planchas -->
            </div>


            <!-- Bloque de Tintas -->
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tintas:</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><button type="button" class="btn btn-success btn-sm collapse-link">Desplegar
                                <i class="fa fa-chevron-up pl-3"></i></button></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <h2>Tintas Basicas:</h2>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <!-- <label class="col-form-label col-md-3 col-sm-3 "><strong>Tinta:</strong></label> -->
                            <div class="col-md-8 col-sm-8 ">
                                <!-- <select name="articuloTinta" class="form-control">
                                    <option value="0">Seleccione...</option>
                                    <?php
                                        // foreach($tinta as $tin){
                                        //     echo "<option value='".$tin['Arti_id']."'>".$tin['Arti_nombre']."</option>";
                                        // }
                                    ?>
                                </select> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-4 col-sm-4 ">Color:</label>
                            <div class="col-md-8 col-sm-8">
                                <div class="radio" id="tintaBasicaNoAplica">
                                    <label>
                                        <input type="radio" class="flat" checked name="colorTintaBasica"
                                            value="No aplica"> No
                                        aplica
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" class="flat" name="colorTintaBasica" value="CMYK">
                                        CMYK
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" class="flat" name="colorTintaBasica" value="K"> K
                                    </label>
                                </div>

                            </div>
                        </div>
                        <!-- <label class="col-md-1 col-sm-1 "></label> -->
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 ">Cantidad:</label>
                            <div class="col-md-5 col-sm-5">
                                <input type="number" name="cantidadTintaBasica" id="cantidadTintaBasica"
                                    class="form-control">
                            </div>
                            <div class="col-md-4 col-sm-4 ">
                                <select name="unidadCantidadTintaBasica" class="form-control">
                                    <option value="und">Und</option>
                                    <option value="Kg">Kg</option>
                                    <option value="M">M</option>
                                    <option value="Ml">Ml</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label col-md-3 col-sm-3 "><strong>Costo Unitario:</strong></label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="number" class="form-control" name="costoUnitarioTintaBasica"
                                    id="costoUnitarioTintaBasica" placeholder="$" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label col-md-3 col-sm-3 "><strong>Subtotal:</strong></label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="number" class="form-control" name="subtotalTintaBasica"
                                    id="subTotalTintaBasica" readonly="readonly" placeholder="$" value="">
                            </div>
                        </div>
                    </div>
                    <h2>Tintas Especiales:</h2>
                    <div id="contenedorTintaEspecial">
                        <div class="x_panel">
                            <div id="cabeceraTintaEspecial0">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <!-- <label class="col-form-label col-md-3 col-sm-3 "><strong>Tinta:</strong></label> -->
                                        <div class="col-md-8 col-sm-8 ">
                                            <!-- <select name="articuloTintaEspecial[]" class="form-control">
                                                <option value="0">Seleccione...</option>
                                                <?php
                                                    // foreach($tinta as $tin){
                                                    //     echo "<option value='".$tin['Arti_id']."'>".$tin['Arti_nombre']."</option>";
                                                    // }
                                                ?>
                                            </select> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-5 form-group" id="cabeceraTintaEspecial1">
                                        <label class="col-md-2 col-sm-2 ">Codigo Color:</label>
                                        <div class="col-md-10 col-sm-10">
                                            <input type="text" name="colorTintaEspecial[]" class="form-control codigoColorTintaEspecial"
                                                placeholder="Ingrese tinta.">
                                        </div>
                                    </div>
                                    <!-- <label class="col-md-1 col-sm-1 "></label> -->
                                    <div class="col-md-6 form-group" id="cabeceraTintaEspecial2">
                                        <label class="control-label col-md-2 col-sm-2 ">Cantidad:</label>
                                        <div class="col-md-5 col-sm-5">
                                            <input type="number" name="cantidadTintaEspecial[]"
                                                class="form-control cantidadTintaEspecial">
                                        </div>
                                        <div class="col-md-4 col-sm-4 ">
                                            <select name="unidadCantidadTintaEspecial[]" class="form-control">
                                                <option value="und">Und</option>
                                                <option value="Kg">Kg</option>
                                                <option value="M">M</option>
                                                <option value="Ml">Ml</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-1 d-flex justify-content-end">
                                        <button type="button" class="btn btn-success" id="agregarTintaEspecial"><i
                                                class="fas fa-plus-square"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div id="copyTintaEspecial">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- <label class="col-md-1 col-sm-1 "></label> -->
                                        <div class="col-md-6 form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 "><strong>Costo
                                                    unitario:</strong></label>
                                            <div class="col-md-8 col-sm-8 ">
                                                <input type="number" name="costoUnitarioTintaEspecial[]"
                                                    class="form-control costoUnitarioTintaEspecial" placeholder="$"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label
                                                class="col-form-label col-md-3 col-sm-3 "><strong>Subtotal:</strong></label>
                                            <div class="col-md-8 col-sm-8 ">
                                                <input type="number" name="subtotalTintaEspecial[]"
                                                    class="form-control subtotalTintaEspecial" readonly="readonly"
                                                    placeholder="$">
                                            </div>
                                        </div>
                                    </diV>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 my-3">
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 "><strong>Valor total:</strong></label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" name="valorTotalTintas" class="form-control" id="totalTintas"
                                    readonly="readonly" placeholder="$" value="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Inicio Bloque material -->
            <div class="x_panel">
                <div class="x_title">
                    <h2>Material:</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><button type="button" class="btn btn-success btn-sm collapse-link">Desplegar
                                <i class="fa fa-chevron-up pl-3"></i></button></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>


                <!-- Inicio Bloque Material -->
                <div class="x_content">
                    <!-- Inicio Material -->
                    <div id="contenedorMaterial">
                        <div class="x_panel">
                            <div class="row">
                                <div class="col-md-11" id="copyCabeceraMaterial">
                                    <div class="form-group row">
                                        <label class="control-label col-md-2 col-sm-2 ">Material:</label>
                                        <div class="col-md-5 col-sm-5 ">
                                            <select name="material[]" class="form-control selectMaterial"
                                                data-url="<?php echo getUrl("costos","cotizacion","getConsultarUnidadMedida",false,"ajax");?>">
                                                <option value="0">Seleccione...</option>
                                                <?php
                                                    foreach($material as $mt){
                                                        echo "<option value='".$mt['Arti_id']."'>".$mt['Arti_nombre']."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-5 col-sm-5 ">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 ">Unidad:</label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" class="form-control" readonly="readonly"
                                                        placeholder="" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-9 col-sm-9 ">
                                            <select name="material[]" class="form-control">
                                                <option value="0">Seleccione...</option>
                                                <?php
                                                    // foreach($material as $mt){
                                                    //     echo "<option value='".$mt['Arti_id']."'>".$mt['Arti_nombre']."</option>";
                                                    // }
                                                ?>
                                            </select>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-md-1 d-flex justify-content-end">
                                    <button type="button" class="btn btn-success" id="agregarMaterial"><i
                                            class="fas fa-plus-square"></i></button>
                                </div>
                            </div>

                            <div id="copyMaterial">
                                <div class="col-md-12">
                                    <div class="row">
                                        <!-- <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label col-md-2 col-sm-2 ">Tamaño:</label>
                                                <div class="col-md-5 col-sm-5">
                                                    <input type="number" name="tamanoMaterial[]" class="form-control">
                                                </div>
                                                <div class="col-md-4 col-sm-4 ">
                                                    <select name="unidadTamanoMaterial[]" class="form-control">
                                                        <option value="M">M</option>
                                                        <option value="Cm">Cm</option>
                                                        <option value="Mm">MM</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label col-md-2 col-sm-2 ">Gramaje:</label>
                                                <div class="col-md-5 col-sm-5">
                                                    <input type="number" name="gramajeMaterial[]" class="form-control">
                                                </div>
                                                <div class="col-md-4 col-sm-4 ">
                                                    <select name="unidadGramajeMaterial[]" class="form-control">
                                                        <option value="Kg">Kg</option>
                                                        <option value="g">g</option>
                                                        <option value="Mg">Mg</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 ">Cantidad:</label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="number" readonly="readonly" name="cantidadMaterial[]"
                                                        class="form-control cantidadMaterial">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 ">Costo Unitario:</label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="number" readonly="readonly" name="costoUnitarioMaterial[]"
                                                        class="form-control costoUnitarioMaterial" placeholder="$">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 "><strong>Valor
                                                Subtotal:</strong></label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="number" name="subtotalMaterial[]"
                                                class="form-control subtotalMaterial" readonly="readonly"
                                                placeholder="$" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Material -->

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 "><strong>Valor total:</strong></label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" class="form-control" name="valorTotalMaterial" id="totalMaterial"
                                    readonly="readonly" placeholder="$" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="x_panel">
                <div class="x_title">
                    <h2>Terminados:</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><button type="button" class="btn btn-success btn-sm collapse-link">Desplegar
                                <i class="fa fa-chevron-up pl-3"></i></button></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <!-- Inicio Bloque Terminados -->
                <div class="x_content">
                    <!-- Inicio Terminado -->
                    <div id="contenedorTerminado">
                        <div class="x_panel">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-6 " id="copyTerminadoCabecera1">
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 ">Terminado:</label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select name="terminado[]" class="form-control selectTerminado">
                                                    <option value="0">Seleccione...</option>
                                                    <?php
                                                    foreach($terminado as $ter){
                                                        echo "<option value='".$ter['Ter_id']."'>".$ter['Ter_descripcion']."</option>";
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 " id="copyTerminadoCabecera2">
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 ">Maquinaria:</label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select name="maquinaTerminado[]" class="form-control">
                                                    <option value="0">Seleccione...</option>
                                                    <?php
                                                    foreach($maquina as $m){
                                                        echo "<option value='".$m['Maq_id']."'>".$m['Maq_nombre']."</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 d-flex justify-content-end">
                                        <button type="button" class="btn btn-success" id="agregarTerminado"><i
                                                class="fas fa-plus-square"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 " id="copyTerminado">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 ">Cantidad Horas:</label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="number" name="cantidadHorasTerminado[]"
                                                    class="form-control cantidadHoraTerminados" readonly="readonly" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row col-md-6">
                                        <label class="control-label col-md-3 col-sm-3 ">Costo Unitario:</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="number" name="costoUnitarioTerminado[]" readonly="readonly"
                                                class="form-control costoUnitarioTerminados" placeholder="$">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 "><strong>Valor
                                                Subtotal:</strong></label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="number" name="subtotalTerminado[]"
                                                class="form-control subtotalTerminados" readonly="readonly"
                                                placeholder="$" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Copiar despues de aqui -->
                        <!-- inicio eliminar terminado -->
                    </div>
                    <!-- Fin Terminado -->
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 "><strong>Valor total:</strong></label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" name="valorTomadoTerminado" class="form-control"
                                    id="totalTerminados" readonly="readonly" placeholder="$" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table style="border-collapse:inherit;">
                <tr>
                    <td class="text-center px-4"
                        style="background-color: #238276; color:white; border-top-left-radius: 15px; border-bottom-left-radius: 10px;">
                        <h2>INSUMOS</h2>
                    </td>
                    <td
                        style="background-color:#ced4da; border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
                        <input type="number" name="insumos" class="form-control" id="totalInsumos" readonly="readonly"
                            placeholder="$" value="">
                    </td>
                </tr>
                <tr>
                    <td class="text-center"
                        style="background-color: #238276; color:white; border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                        <h2>PROCESOS</h2>
                    </td>
                    <td
                        style="background-color:#ced4da; border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
                        <input type="number" name="procesos" class="form-control" id="totalProcesos" readonly="readonly"
                            placeholder="$" value="">
                    </td>
                </tr>
                <tr>
                    <td class="text-center"
                        style="background-color: #FC7323; color:white; border-top-left-radius: 10px; border-bottom-left-radius: 15px;">
                        <h2>TOTAL</h2>
                    </td>
                    <td
                        style="background-color:#ced4da; border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
                        <input type="number" name="total" class="form-control" id="totalCotizacion" readonly="readonly"
                            placeholder="$" value="">
                    </td>
                </tr>
            </table>


            <div class="ln_solid">

                <div id="contentAlertDetalleCotizacion">
                    <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> mesaje.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->
                </div>




                <div class="form-group mt-3">
                    <div class="col-md-3 offset-md-9">
                        
                        <a href="<?php echo getUrl("costos","cotizacion","updateOrden",array("Ped_id"=>$Ped_id));?>">
                            <button type="button" class="btn btn-danger">Cancelar</button>
                        </a>
                        <button type='submit' class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>