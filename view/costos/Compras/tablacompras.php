<?php 
 
echo '
<table class="table table-striped table-bordered"  border="1px" align="center">
<thead style="background-color:#17A481; color:#fff;">
<tr>
<th>producto</th>
<th>catidad</th>


<th>descripcion</th>
<th>eliminar</th>

</tr>   </thead>';
if (isset($consulta)){
    foreach ($consulta as $consul){
        echo'
      <tr>
 <td   contenteditable data-id_nombre="'.$consul['Dpe_id'].'">'.$consul['Dep_nombreP'].'</td>
 <td   contenteditable data-id_cantidad="'.$consul['Dpe_id'].'">'.$consul['Dpe_cantidad'].'</td>
 <td   contenteditable data-id_desc="'.$consul['Dpe_id'].'">'.$consul['Dep_descripcion'].'</td>
 <td><button id="eliminar">eliminar</button></td>
 
 </tr>
        ';
    }
}



echo '
<tr>
<td id="Dep_nombreP" contenteditable></td>
<td id="Dpe_cantidad" contenteditable></td>

<td id="Dep_descripcion" contenteditable></td>

<td>';?>

<input  type="button" id="add" value="Registrar"
    data-url="<?php echo getUrl("costos","solicitud","tableInsert",false,"ajax"); ?>"/> 
<?php
echo '
</td>

</tr>
';


echo'</table>';



?>