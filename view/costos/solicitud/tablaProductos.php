<!-- inicio tabla  -->
<div class="x_panel mt-5 mb-5">
    <div class="x_title">
        <h2>Tabla productos</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <div class="mb-3">
                        <h4>Cantidad de productos agregados: <span id="itemc" class="font-weight-bold"></span> </h4>

                    </div>
                    <table id="tablap" class="table table-striped table-bordered">

                        <tr>

                            <th style="background-color:#17A481; color:#fff;">Producto</th>
                            <th style="background-color:#17A481; color:#fff;">Cantidad</th>
                            <th style="background-color:#17A481; color:#fff;">Descripcion</th>
                            <th style="background-color:#17A481; color:#fff;">acción</th>

                        </tr>

                        <tbody id="tbp">
                            <?php  
                            if(isset($funcion)){
                            if ($funcion=="getUpdateSolicitud"){
                                $cont=0;
                                foreach ($tproducto as $tp){
                                    $cont++;
                              echo "<tr>";  

                              echo '<td><input list="items" autocomplete="off" id="producto0'.$cont.'" name="producto[]" value="'.$tp['Pba_descripcion'].'" class="form-control validar producto"  type="text" placeholder="Producto...">';
                              
                             echo '<datalist id="items">';
                                     foreach ($pbase as $pb){ echo "<option  data-xyz='".$pb['Pba_id']."' class='form-control'>".$pb['Pba_descripcion']."</option>"; }
                                      echo '</datalist>';
                              echo '<input type="text" value="'.$tp['Pba_id'].'" name="productoS[]" id="productoS0'.$cont.'">';
                            
                             echo '</td>';
                              echo '<td>
                              <input id="cantidad0'.$cont.'" type="number" class="form-control validar" value="'.$tp['Dpe_cantidad'].'"  name="cantidad[]"
                                                 placeholder="cantidad...">
                              </td>';
                              echo '<td>
                              <textarea class="form-control validar" id="desc0'.$cont.'" rows="2" cols="50" name="desc[]" 
                              placeholder="Descripcion producto..">'.$tp['Dep_descripcion'].'</textarea>
                              </td>';
                              echo '<td>
                              <button type="button" name="remove" class="btn btn-danger btn_remove btn btn-sm ml-2 mt-3"><i class="fa fa-trash"></i></button>
                              </td>';
    
                              echo '</tr>'; }}
                            }
                            
                        ?>
                            <tr id="ptr">

                                <td>
                                    <p>
                                        <label>Ingrese producto:</label> <br>

                                        <input list="items" autocomplete="off" id="producto" name="producto[]"
                                            class="form-control validar producto" type="text" placeholder="Producto...">
                                        <datalist id="items">
                                            <?php foreach ($pbase as $pb){ echo "<option  data-xyz='".$pb['Pba_id']."' class='form-control'>".$pb['Pba_descripcion']."</option>"; } ?>
                                        </datalist>
                                        <input type="text"  name="productoS[]" id="productoS"></input>

                                    </p>
                                </td>
                                <td>
                                    <p>
                                        <label>Cantidad:</label> <br>
                                        <input id="cantidad" type="number" class="form-control validar"  name="cantidad[]"
                                             placeholder="cantidad...">
                                    </p>

                                </td>
                                <td>
                                    <p>
                                        <label>Descripcion de producto</label> <br>
                                        <textarea class="form-control validar" id="desc" rows="2" cols="50"  name="desc[]"
                                            placeholder="Descripcion producto.."></textarea>


                                    </p>
                                </td>
                                <td>
                                    <button id="adicionar" class="btn btn-success btn btn-sm ml-2 mt-5" type="button" ><i
                                            class="fa fa-plus-square-o" ></i></button>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
               
            </div>
           
        </div>
        
    </div>
    <span style="color:red;">Debe darle en el signo de "+" para agregar el producto a la solicitud</span>   
</div>
