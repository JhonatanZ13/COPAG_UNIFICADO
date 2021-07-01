<!-- inicio tabla  -->
<?php 
if(isset($funcion)){
  if($funcion=="aprobarSolicitudConsult" || $funcion=="getconsultSolicitud"){
    $disabled="disabled";
    $none="d-none";
    $resize="style='resize: none '";
    // echo ' <script>alert("ok");</script>';
}else {
    $disabled=""; 
    $none="";
    $resize="";
}
}

?>
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
                        <h4 class="<?php echo $none;?>">Cantidad de productos agregados: <span id="itemc" class="font-weight-bold"></span> </h4>
                    </div>
                    <table id="tablap" class="table table-striped table-bordered">

                        <tr>

                            <th style="background-color:#17A481; color:#fff;">Producto</th>
                            <th style="background-color:#17A481; color:#fff;">Cantidad</th>
                            <th style="background-color:#17A481; color:#fff;">Descripcion</th>
                            <th class="<?php echo $none;?>" style="background-color:#17A481; color:#fff;">acción</th>

                        </tr>

                        <tbody id="tbp">
                            <?php  
                            if(isset($funcion)){
                            if ($funcion=="getUpdateSolicitud" || $funcion=="aprobarSolicitudConsult" || $funcion=="getconsultSolicitud"){
                              
                                $cont=0;
                                foreach ($tproducto as $tp){
                                    $cont++;
                              echo "<tr>";  

                              echo '<td><input list="items" autocomplete="off" id="producto0'.$cont.'" name="producto[]" value="'.$tp['Pba_descripcion'].'" class="form-control validar producto"  type="text" placeholder="Producto..."'.$disabled.'>';
                              
                             echo '<datalist id="items">';
                                     foreach ($pbase as $pb){ echo "<option  data-xyz='".$pb['Pba_id']."' class='form-control'>".$pb['Pba_descripcion']."</option>"; }
                                      echo '</datalist>';
                              echo '<input type="hidden" value="'.$tp['Pba_id'].'" name="productoS[]" id="productoS0'.$cont.'">';
                            
                             echo '</td>';
                              echo '<td>
                              <input id="cantidad0'.$cont.'" type="number" class="form-control validar" value="'.$tp['Dpe_cantidad'].'"  name="cantidad[]"
                                                 placeholder="cantidad..." '.$disabled.'>
                              </td>';
                              echo '<td>
                              <textarea class="form-control validar" id="desc0'.$cont.'" rows="2" cols="50" name="desc[]" 
                              placeholder="Descripcion producto.."'.$resize.$disabled.'>'.$tp['Dep_descripcion'].'</textarea>
                              </td>';
                              echo '<td class="'.$none.'">';
                              if($funcion!="aprobarSolicitudConsult"){
                             echo '<button type="button" name="remove" class="btn btn-danger btn_remove btn btn-sm ml-2 mt-3" '.$disabled.'><i class="fa fa-trash"></i></button>';
                            }
                             echo '</td>';
    
                              echo '</tr>'; }}
                            }
                            
                        ?>
                      
                            <tr id="ptr" class="<?php echo $none;?>">

                                <td>
                                    <p>
                                        <label>Ingrese producto:</label> <br>

                                        <input list="items" autocomplete="off" id="producto" name="producto[]"
                                            class="form-control validar producto" type="text" placeholder="Producto...">
                                        <datalist id="items">
                                            <?php foreach ($pbase as $pb){ echo "<option  data-xyz='".$pb['Pba_id']."' class='form-control'>".$pb['Pba_descripcion']."</option>"; } ?>
                                        </datalist>
                                        <input type="hidden" name="productoS[]" id="productoS"></input>

                                    </p>
                                </td>
                                <td>
                                    <p>
                                        <label>Cantidad:</label> <br>
                                        <input id="cantidad" type="number" class="form-control validar "  name="cantidad[]" 
                                             placeholder="cantidad..." min="1"   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
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
                                            class="fa fa-plus-square-o"></i></button>

                                </td>
                            </tr>
                          
                        </tbody>
                    </table>
                </div>
               
            </div>
           
        </div>
        
    </div>
    <span class="<?php echo $none;?>" style="color:red;">Debe darle en el signo de "+" para agregar el producto a la solicitud</span>   
</div>
