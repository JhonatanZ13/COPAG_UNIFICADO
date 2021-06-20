
$(document).ready(function () {

  // $("#button").click(function() {
    $('#datatable-responsive-costos-cotizacion-pendiente').DataTable();
    $('#datatable-responsive-costos-cotizacion-historial-todas').DataTable();
    $('#datatable-responsive-costos-cotizacion-historial-aprobadas').DataTable();
    $('#datatable-responsive-costos-cotizacion-historial-rechazadas').DataTable();
    
$(document).on("change",".producto",function(){

    var val = $(this).val();
   
    var xyz = $(this).siblings('#items').children().filter(function() {
        return this.value == val;
    }).data('xyz');
    console.log($(this).siblings('#items').children());
    var inputHidden = $(this).siblings('input');
    inputHidden.val(xyz);
  });


  $(document).on("change","#depId",function(){
    var id=$(this).val();
    var url=$(this).attr("data-url");
  

    $.ajax({
			url:url,
			data:"id="+id,
			type:"POST",
			success:function(datos){
        $("#munId").removeClass('is-valid');
        $("#munId").removeAttr( "disabled" );
          $("#munId").removeAttr( "disabled" );
          $("#munId").html(datos);
			}
		});
  });


//modal
  $(document).on("click",".botonModal",function(){
		var url=$(this).attr("data-url");
		var datos=$(this).val();
    var titulom=$(this).attr("value");
   
		if(datos==""){
			datos=0;
		}
		$.ajax({
			url:url,
			data:"datos="+datos,
			type:"POST",
			success:function(datos){
			$("#contenedor").html(datos);
				$("#modal").modal("show");
        $("#exampleModalLongTitle").text("");
				$('#exampleModalLongTitle').append(titulom);
			}
		});
	});
// modal fin

//modal
$(document).on("click",".botonModal2",function(){
  var url=$(this).attr("data-url");
  var datos=$(this).val();
  var titulom=$(this).attr("title");
 
  if(datos==""){
    datos=0;
  }
  $.ajax({
    url:url,
    data:"id="+datos,
    type:"POST",
    success:function(datos){
    $("#contenedor").html(datos);
      $("#modal").modal("show");
      $("#exampleModalLongTitle").text("");
      $('#exampleModalLongTitle').append(titulom);
    }
  });
});
// modal fin



//Solicitud inicio
conttr();

$(document).on("keyup",".validar",function(){
 
  var id=$(this).attr("id");
  var name=$(this).attr("name");
  var valorid = document.getElementById(id).value;
  valorid=valorid.trim();

    if (name=="cantidad[]"){
    if (valorid==""){  
      
    $(this).siblings(".alv").remove();
    $(this).addClass('is-invalid');
    $(this).parent().append("<p class='text-danger alv'>Campo vacio</p>");
    $(this).removeClass('is-valid');
   
  }else if(valorid.length>4){
    // alert (valorid);
    $(this).removeClass('is-valid');
    $(this).addClass('is-invalid');
    $(this).siblings(".alv").remove();
    $(this).parent().append("<p class='text-danger alv'>Ingreasa un numero no superior a 1000</p>");
  }else{
    $(this).removeClass('is-invalid');
    $(this).addClass('is-valid');
    $(this).siblings(".alv").remove();
  }
} else if (name=="producto[]"){
   if (valorid==""){
      $(this).siblings(".alv").remove();
      $(this).addClass('is-invalid');
      $(this).parent().append("<p class='text-danger alv'>Campo vacio</p>");
      $(this).removeClass('is-valid');
     
  }else if (valorid.length>=1){

    if (novalido(valorid)){
      $(this).removeClass('is-valid');
      $(this).siblings(".alv").remove();
    $(this).parent().append("<p class='text-danger alv'>Caracteres no validos</p>");
    $(this).addClass('is-invalid');

    }else{
       
    $(this).removeClass('is-invalid');
    $(this).addClass('is-valid');
    $(this).siblings(".alv").remove();
    }
   
  }

}
 else if  (name=="desc[]"){
 
 if (valorid==""){
    $(this).siblings(".alv").remove();
    $(this).addClass('is-invalid');
    $(this).parent().append("<p class='text-danger alv'>Campo vacio</p>");
    $(this).removeClass('is-valid');
    
 }else if (valorid.length>250){
 
   $(this).siblings(".alv").remove();
   $(this).addClass('is-invalid');
   $(this).parent().append("<p class='text-danger alv'>No se debe superar los 250 caracteres</p>");

 }else { 
   $(this).siblings(".alv").remove();
   $(this).removeClass('is-invalid');
   $(this).addClass('is-valid');
 }
}




var error = document.getElementsByClassName("is-invalid").length;

if ($("#producto").hasClass("is-valid") && $("#cantidad").hasClass("is-valid") && $("#desc").hasClass("is-valid")){
  $("#adicionar").attr("disabled",false);

}else{ $("#adicionar").attr("disabled",true);}
 
});

$(".vSelect").click(function(){
  var id=$(this).attr("id");
  var valor = document.getElementById(id).value;
if (valor==0){
  $(this).siblings(".alv").remove();
    $(this).removeClass('is-invalid');
    $(this).addClass('is-invalid');
    $(this).parent().append("<p class='text-danger alv'>Debe selecionar una opcion</p>");

}else{
  $(this).siblings(".alv").remove();
    $(this).removeClass('is-invalid');
    $(this).addClass('is-valid');

}
  
});

function novalido(campo){
  var noValido="$#%*\/(){}+-&?¿!¡,'<>°|=.¨[]:;`~¬@";
  var cont=0;

  for (let i = 0; i < campo.length; i++) {
    for (let k = 0; k < noValido.length; k++) {
    if(campo[i]==noValido[k]){
      cont++;
    }     
    }
}
if (cont>0){
return true;
}
}

$(document).on("click", "#adicionar", function () {
  $(".validar").removeClass('is-valid');  
   $("#adicionar").attr("disabled",true);
  var productoS = document.getElementById("productoS").value;
  var producto = document.getElementById("producto").value;
  var cantidad = document.getElementById("cantidad").value;
   var desc = document.getElementById("desc").value;
   desc=desc.trim();
   var Filas = $("#tablap tr").length-1;
     var items = $("#items").html();
  $('#tablap').append(
    "<tr>"+
    "<td>"+
        "<p>"+
            "<label>Ingrese producto:</label> <br>"+
            '<input list="items" autocomplete="off" value="'+producto+'" id="producto'+Filas+'" name="producto[]"'+
                'class="form-control validar producto" type="text" placeholder="Producto...">'+
            ' <datalist id="items">'+items+
            '</datalist>'+
            '<input type="text" value="'+productoS+'"  name="productoS[]" id="productoS'+Filas+'"></input>'+
       '</p>'+
    '</td>'+
    '<td>'+
        '<p>'+
            '<label>Cantidad:</label> <br>'+
            '<input id="cantidad'+Filas+'" type="number" value="'+cantidad+'" class="form-control validar"  name="cantidad[]"'+
                 'placeholder="cantidad...">'+
        '</p>'+
    '</td>'+
    '<td>'+
        '<p>'+
            '<label>Descripcion de producto</label> <br>'+
            '<textarea class="form-control validar" id="desc'+Filas+'" rows="2" cols="50"  name="desc[]"'+
               'placeholder="Descripcion producto..">'+desc+'</textarea>'+
        '</p>'+
    '</td>'+
    '<td>'+
    '<button type="button" name="remove" id="" class="btn btn-danger btn_remove btn btn-sm ml-2 mt-3"><i class="fa fa-trash"></i></button>'+
   '</td>'+
  '</tr>'
 );
 conttr();  
 document.getElementById("cantidad").value ="";
       document.getElementById("desc").value = "";
       document.getElementById("producto").value = "";
       document.getElementById("productoS").value = "";
       document.getElementById("producto").focus();

});



  $(document).on('click', '.btn_remove', function() {
      //remueve una fila y hace el reconteo
      $(this).parent().parent().remove();
      conttr();
    });

    function conttr(){
      $("#itemc").text("");
      var nFilas = $("#tablap tr").length;
   $("#itemc").append(nFilas - 2);
    }

 
  //Cotizacion Inicio
  //Insertar cotizacion - Cliente 

  //Cargar Cliente
  $(document).on("change", "#selectCliente", function () {
    var id =$(this).val();
		var url=$(this).attr("data-url");
    // $('#contenedorCliente').remove();
    
      $.ajax({
        url:url,
        data:"id="+id,
        type:"POST",
        success:function(datos){
          $("#contenedorCliente").html(datos);
        }
      });
    
  });

  //Guardar datos cotizacion
  $(document).on("click", "#updatePedido", function () {
    
    var Ped_id = $("#codigoPedido").val();
    var Emp_id = $("#selectCliente").val();
    var tiposolicitud_id = $("#tipoSolicitudP").val();
		var url=$(this).attr("data-url");

    // $('#contenedorCliente').remove();
    if(Emp_id==0){
      Emp_id = "NULL";
    }
    if(tiposolicitud_id==0){
      tiposolicitud_id = "NULL";
    }
      $.ajax({
        url:url,
        data:"Ped_id="+Ped_id+"&Emp_id="+Emp_id+"&Tempr_id="+tiposolicitud_id,
        type:"POST",
        success:function(datos){
          alert("Datos Actualizados");
          console.log(datos);
          validarPedicoCotizacionCliente();
        }
      });
    
  });






  //Detalle Cotizacion
  //Agregar Tinta Especial
  $(document).on("click", "#agregarTintaEspecial", function () {
    
    var cabecera0 = $("#cabeceraTintaEspecial0").html();
    var cabecera1 = $("#cabeceraTintaEspecial1").html();
    var cabecera2 = $("#cabeceraTintaEspecial2").html();

    var cuerpo = $("#copyTintaEspecial").html();
    $("#contenedorTintaEspecial").append(
      "<div class='x_panel'>" +
        "<div>"+
        cabecera0 +
        "</div>" +
        "<div class='row'>" +
        "<div class='col-md-12'>" +
        "<div class='col-md-5 form-group'>" +
        cabecera1 +
        "</div>" +
        "<div class='col-md-6 form-group'>" +
        cabecera2 +
        "</div>" +
        "<div class='col-md-1 d-flex justify-content-end'>" +
        "<button type='button' class='btn btn-danger eliminarTintaEspecial'><i class='fas fa-trash-alt'></i></button>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "<div>" +
        cuerpo +
        "</div>" +
        "</div>"
    );

    validarCotizacionTintasEspeciales();
    
  });

  //Eliminar TintaEspecial
  $(document).on("click", ".eliminarTintaEspecial", function () {
    $(this).parent().parent().parent().parent().remove();
    calcularTotalTintas();
  });
  // Agregar Terminado
  $(document).on("click", "#agregarTerminado", function () {
    var cabecera1 = $("#copyTerminadoCabecera1").html();
    var cabecera2 = $("#copyTerminadoCabecera2").html();
    var cuerpo = $("#copyTerminado").html();
    $("#contenedorTerminado").append(
      "<div class='x_panel'>" +
        "<div class='col-md-12'>" +
        "<div class='row'>" +
        "<div class='col-md-6'>" +
        cabecera1 +
        "</div>" +
        "<div class='col-md-5'>" +
        cabecera2 +
        "</div>" +
        "<div class='col-md-1 d-flex justify-content-end'>" +
        "<button type='button' class='btn btn-danger eliminarTerminado'><i class='fas fa-trash-alt'></i></button>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "<div class='col-md-12' >" +
        cuerpo +
        "</div>" +
        "</div>"
    );
    validarCotizacionTerminado();
  });

  //Eliminar Terminado
  $(document).on("click", ".eliminarTerminado", function () {
    $(this).parent().parent().parent().parent().remove();
    calcularTotalTerminados();
  });

  //   agregar Material
  $(document).on("click", "#agregarMaterial", function () {
    var cabecera = $("#copyCabeceraMaterial").html();
    var cuerpo = $("#copyMaterial").html();

    $("#contenedorMaterial").append(
      "<div class='x_panel'>" +
        "<div class='row'>" +
        "<div class='col-md-11'>" +
        cabecera +
        "</div>" +
        "<div class='col-md-1 d-flex justify-content-end'>" +
        "<button type='button' class='btn btn-danger eliminarMaterial'><i class='fas fa-trash-alt'></i></button>" +
        "</div>" +
        "</div>" +
        "<div>" +
        cuerpo +
        "</div>" +
        "</div>" +
        "</div>"
    );
    validarCotizacionMateriales();
  });
  //   Eliminar material
  $(document).on("click", ".eliminarMaterial", function () {
    $(this).parent().parent().parent().remove();
    calcularTotalMaterial();
  });

  //   Funcion de auto calcular precio - Plancha por medio de clases
  $(document).on("change", ".calcularCantidad", function () {
    var costo = $(".calcularCantidad").val();
    var cantidad = $(".calcularCostoUnitario").val();
    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        $(".calcularResultado").val(resultado);
      } else {
        $(".calcularResultado").val("");
      }
    } else {
      $(".calcularResultado").val("");
    }
  });

  $(document).on("change", ".calcularCostoUnitario", function () {
    var costo = $(".calcularCantidad").val();
    var cantidad = $(".calcularCostoUnitario").val();
    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        $(".calcularResultado").val(resultado);
      } else {
        $(".calcularResultado").val("");
      }
    } else {
      $(".calcularResultado").val("");
    }
  });

  //Calular Tintas y total

  // Calcular tinta Basica
  $(document).on("change", "#cantidadTintaBasica", function () {
    var costo = $("#costoUnitarioTintaBasica").val();
    var cantidad = $("#cantidadTintaBasica").val();

    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        $("#subTotalTintaBasica").val(resultado);
      } else {
        $("#subTotalTintaBasica").val("");
      }
    } else {
      $("#subTotalTintaBasica").val("");
    }
    calcularTotalTintas();
  });

  $(document).on("change", "#costoUnitarioTintaBasica", function () {
    var costo = $("#costoUnitarioTintaBasica").val();
    var cantidad = $("#cantidadTintaBasica").val();

    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        $("#subTotalTintaBasica").val(resultado);
      } else {
        $("#subTotalTintaBasica").val("");
      }
    } else {
      $("#subTotalTintaBasica").val("");
    }
    calcularTotalTintas();
  });

  // Calular tinta especial

  $(document).on("change", ".cantidadTintaEspecial", function () {
    var costo = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children().eq(2).children().eq(0).children().eq(0).children().eq(0).children().eq(1).children().eq(0).val();
    var cantidad = $(this).val();
    
    var subtotal = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(2)
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(1)
      .children()
      .eq(0);

    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        subtotal.val(resultado);
      } else {
        subtotal.val("");
      }
    } else {
      subtotal.val("");
    }
    calcularTotalTintas();
  });

  $(document).on("change", ".costoUnitarioTintaEspecial", function () {
    var costo = $(this).val();
    var cantidad = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(1)
      .children()
      .eq(0)
      .val();
      
    var subtotal = $(this)
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(1)
      .children()
      .eq(0);

    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        subtotal.val(resultado);
      } else {
        subtotal.val("");
      }
    } else {
      subtotal.val("");
    }
    calcularTotalTintas();
  });

  //Caluclar valor total Tintas

  function calcularTotalTintas() {
    var total = 0;
    var subTotalTintaBasica = $("#subTotalTintaBasica").val();

    if (!isNaN(parseFloat(subTotalTintaBasica))) {
      total += parseFloat(subTotalTintaBasica);
    }
    
    var subTotal = $(".subtotalTintaEspecial");

    for (i = 0; i < subTotal.length; i++) {
      if (!isNaN(parseFloat(subTotal.eq(i).val()))) {
        total += parseFloat(subTotal.eq(i).val());
      }
    }
    $("#totalTintas").val(total);
    calcularTotalCotizacion();
  }

  // Calcular Material
  $(document).on("change", ".cantidadMaterial", function () {
    var costo = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0)
      .val();
    var cantidad = $(this).val();
    var subtotal = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(2)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);

    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        subtotal.val(resultado);
      } else {
        subtotal.val("");
      }
    } else {
      subtotal.val("");
    }
    calcularTotalMaterial();
  });

  $(document).on("change", ".costoUnitarioMaterial", function () {
    var costo = $(this).val();
    var cantidad = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0)
      .val();
    var subtotal = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(2)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);

    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        subtotal.val(resultado);
      } else {
        subtotal.val("");
      }
    } else {
      subtotal.val("");
    }
    calcularTotalMaterial();
  });

  //Caluclar valor total Material

  function calcularTotalMaterial() {
    var total = 0;
    var subTotal = $(".subtotalMaterial");

    for (i = 0; i < subTotal.length; i++) {
      if (!isNaN(parseFloat(subTotal.eq(i).val()))) {
        total += parseFloat(subTotal.eq(i).val());
      }
    }
    $("#totalMaterial").val(total);
    // $("#totalMaterial").prettynumber({delimiter:","});
    calcularTotalCotizacion();
  }

  // Calcular Terminados
  $(document).on("change", ".cantidadHoraTerminados", function () {
    // var costo = $(this).parent().parent().parent().parent().children().eq(0).children().eq(0).children().eq(1).children().eq(0).val();
    var costo = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(1)
      .children()
      .eq(0)
      .val();
    var cantidad = $(this).val();
    var subtotal = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);
    // console.log(subtotal);
    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        subtotal.val(resultado);
      } else {
        subtotal.val("");
      }
    } else {
      subtotal.val("");
    }
    calcularTotalTerminados();
  });

  $(document).on("change", ".costoUnitarioTerminados", function () {
    var costo = $(this).val();
    var cantidad = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0)
      .val();
    var subtotal = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);
    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        subtotal.val(resultado);
      } else {
        subtotal.val("");
      }
    } else {
      subtotal.val("");
    }
    calcularTotalTerminados();


    
  });

  //Caluclar valor total Terminados

  function calcularTotalTerminados() {
    var total = 0;
    var subTotal = $(".subtotalTerminados");

    for (i = 0; i < subTotal.length; i++) {
      if (!isNaN(parseFloat(subTotal.eq(i).val()))) {
        total += parseFloat(subTotal.eq(i).val());
      }
    }
    $("#totalTerminados").val(total);
    calcularTotalCotizacion();
  }

  // Calcular diseño
  $(document).on("change","#totalDiseno",function(){
    calcularTotalCotizacion();
  });
  
  //Calcular Insumos - Procesos - Total
  function calcularTotalCotizacion() {
    var totalTintas = $("#totalTintas").val();
    
    var totalMaterial = $("#totalMaterial").val();
    
    if (!(isNaN(parseFloat(totalTintas))) && !(isNaN(parseFloat(totalMaterial)))) {
      var insumos = parseFloat(totalTintas) + parseFloat(totalMaterial);
      $("#totalInsumos").val(insumos);
    }

    var totalDiseno = $("#totalDiseno").val();
    
    
    var totalTerminados = $("#totalTerminados").val();
    

    if (!(isNaN(parseFloat(totalDiseno))) && !(isNaN(parseFloat(totalTerminados)))) {
      var procesos = parseFloat(totalDiseno) + parseFloat(totalTerminados);
      $("#totalProcesos").val(procesos);
      
    }

    if (!(isNaN(parseFloat(procesos))) && !(isNaN(parseFloat(insumos)))) {
      var totalCotizacion = parseFloat(procesos) + parseFloat(insumos);
      $("#totalCotizacion").val(totalCotizacion);
    }
    
  }

  //Obtener unidad de medida
  //material
  $(document).on("change",".selectMaterial",function(){
    var id = $(this).val();
    var url=$(this).attr("data-url");
    var inputUnidad = $(this).parent().parent().children().eq(2).children().eq(0).children().eq(1).children().eq(0);

    $.ajax({
      url:url,
      data:"id="+id,
      type:"POST",
      success:function(datos){
        inputUnidad.val(datos);
        // console.log(datos);
      }
    });
  });

  //Tintas


  
  

  function cargarTotalesCotizacion() {
    calcularTotalPlancha();
    calcularTotalTerminados();
    calcularTotalMaterial();
    calcularTotalTintas();
    calcularTotalCotizacion();
  }

  cargarTotalesCotizacion();

  //calcular Planchas
  function calcularTotalPlancha(){
    var costo = $(".calcularCantidad").val();
    var cantidad = $(".calcularCostoUnitario").val();
    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        $(".calcularResultado").val(resultado);
      } else {
        $(".calcularResultado").val("");
      }
    } else {
      $(".calcularResultado").val("");
    }
  }




  //Validacion pedido - Cotizacion -> Cliente existente
  
  validarPedicoCotizacionCliente();
  function validarPedicoCotizacionCliente() {
    var value = $("#selectCliente").val();
    if(value != 0){
      $("#msgCliente").attr("class","d-none");
      $("#enviarPedidoCotizacion").prop("disabled", false);
    }else{
      $("#msgCliente").attr("class","d-block");
      $("#enviarPedidoCotizacion").prop("disabled", true);
    }
  }



  // Validar detalle pedido - tipoProducto
  // $('.alert').alert();
  $(".alert").first().hide().slideDown(500).delay(4000).slideUp(500, function () {
    $(this).remove(); 
  });
  // detalleCotizacionTipoProducto
  // detalleCotizacionCantidad

  // swal("Hello world!");

  // swal("Good job!", "You clicked the button!", "error");

  $("#formInsertDetalleCotizacion").submit(function(event) {

    var mensaje = "";
    var errores = 0;
    
    if (  $("#detalleCotizacionTipoProducto").val() === '0' ) {
      mensaje =mensaje + "<br>*Por favor seleccione un producto a cotizar.";
      // console.log($("#detalleCotizacionTipoProducto").val());
      errores++;
    }

    if ( $("#detalleCotizacionCantidad").val() < 1  ) {
      mensaje = mensaje + "<br>*La cantidad del producto a cotizar debe ser mayor a 1 und.";
      // console.log(mensaje);
      errores++;
    }

    


    //Evaluando Planchas
    var textoPlanchas = validarEnvioDetalleCotizacionMaquinaPlancha();
    console.log(textoPlanchas);
    if(textoPlanchas != 'OK'){
      mensaje += textoPlanchas;
      errores++;
    }

    //Evaluando Tintas Basicas





    //Evaluando Tintas especiales
    var textoTintasEspeciales = validarEnvioCotizacionTintasEspeciales();
    // console.log(textoTintasEspeciales);
    if(textoTintasEspeciales != 'OK'){
      mensaje += textoTintasEspeciales;
      errores++;
    }


    //Evaluando Materiales
    var textoMateriales = validarEnvioCotizacionMateriales();
    // console.log(textoMateriales);
    if(textoMateriales != 'OK'){
      mensaje += textoMateriales;
      errores++;
    }

    //Evaluando Terminados
    
    var textoTerminado = validarEnvioCotizacionTerminado();
    if(textoTerminado != 'OK'){
      mensaje += textoTerminado;
      errores++;
    }
    






    //Resultado final
    if(errores>0){
      alertCotizacion("danger","Error!", mensaje);
      // console.log(mensaje);
      
      swal("Error!", "Por favor verifica los datos.", "error");
      event.preventDefault();

    }else{
      // swal("Exito!", "Mensaje!", "success");
      return;
    }

  });


  function alertCotizacion(tipo,title,text) {

    var alerta ="<div class='alert alert-"+tipo+" alert-dismissible fade show' role='alert'>"+
                "<strong>"+title+"!</strong><br> "+text+""+
                "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"+
                "<span aria-hidden='true'>&times;</span>"+
                "</button>"+
                "</div>";

    $("#contentAlertDetalleCotizacion").html(alerta);
    // $(".alert").first().hide().slideDown(500).delay(10000).slideUp(500, function () {
    //   $(this).remove(); 
    // });
    // $(".alert").first().hide().slideDown(500).delay(1000000000000000).slideUp(500, function () {
    //     $(this).remove(); 
    //   });

  }


  //Validar planchas

  $(document).on("change","#detalleCotizacionMaquinaPlancha",function() {
    validarDetalleCotizacionMaquinaPlancha();
  });

  validarDetalleCotizacionMaquinaPlancha();

  function validarDetalleCotizacionMaquinaPlancha() {
    var value = $("#detalleCotizacionMaquinaPlancha").val();
    var cantidad = $("#detalleCotizacionMaquinaPlancha").parent().parent().parent().parent().children().eq(1).children().eq(0).children().eq(0).children().eq(0).children().eq(1).children().eq(0);
    var costoUnitario=$("#detalleCotizacionMaquinaPlancha").parent().parent().parent().parent().children().eq(1).children().eq(0).children().eq(1).children().eq(0).children().eq(1).children().eq(0);
    // console.log(costoUnitario);
    if(value == 0){
      //Limpiar campos
      cantidad.val("");
      costoUnitario.val("");
      cantidad.prop("readonly", true);
      costoUnitario.prop("readonly", true);
      calcularTotalPlancha();
    }else{
      cantidad.prop("readonly", false);
      costoUnitario.prop("readonly", false);
    }
  }

  function validarEnvioDetalleCotizacionMaquinaPlancha() {

    var value = $("#detalleCotizacionMaquinaPlancha").val();
    var cantidad = $("#detalleCotizacionMaquinaPlancha").parent().parent().parent().parent().children().eq(1).children().eq(0).children().eq(0).children().eq(0).children().eq(1).children().eq(0);
    var costoUnitario=$("#detalleCotizacionMaquinaPlancha").parent().parent().parent().parent().children().eq(1).children().eq(0).children().eq(1).children().eq(0).children().eq(1).children().eq(0);
    var resultado='<br><strong>Planchas:</strong>';
    var error = 0;
    if(value != "0"){
      //Evaluar cada campo
      if(cantidad.val()<1){
        //Error Cantidad
        error++;
        resultado += "<br>*La <strong>cantidad</strong> de planchas debe ser mayor a 1.";
      }
      if(costoUnitario.val()<0){
        //Error Cantidad
        error++;
        resultado += "<br>*El <strong>costo unitario</strong> de planchas debe ser positivo.";
      }
    }
    if(error>0){
      return resultado;
    }else{
      resultado = 'OK';
      return resultado;
    }

  }

  //Validar Tintas Basicas


 







  //Validar Tintas Especiales
  $(document).on("keyup",".codigoColorTintaEspecial",function() {
    var codigo = $(this).val();
    var cantidad = $(this).parent().parent().parent().children().eq(1).children().eq(1).children().eq(0);
    var costoUnitario = $(this).parent().parent().parent().parent().parent().children().eq(2).children().eq(0).children().eq(0).children().eq(0).children().eq(1).children().eq(0);
    var subTotal = $(this).parent().parent().parent().parent().parent().children().eq(2).children().eq(0).children().eq(0).children().eq(1).children().eq(1).children().eq(0);
    if(codigo == ""){
      //Limpiar campos
      cantidad.val("");
      costoUnitario.val("");
      subTotal.val("");
      cantidad.prop("readonly", true);
      costoUnitario.prop("readonly", true);
      calcularTotalTintas();
    }else{
      cantidad.prop("readonly", false);
      costoUnitario.prop("readonly", false);
    }
    // console.log(subTotal);
  });


  validarCotizacionTintasEspeciales();
  function validarCotizacionTintasEspeciales(){
    var tintasEspeciales = $(".codigoColorTintaEspecial");
    for (i = 0; i < tintasEspeciales.length; i++) {
      var codigo = tintasEspeciales.eq(i).val();
      var cantidad = tintasEspeciales.eq(i).parent().parent().parent().children().eq(1).children().eq(1).children().eq(0);
      var costoUnitario = tintasEspeciales.eq(i).parent().parent().parent().parent().parent().children().eq(2).children().eq(0).children().eq(0).children().eq(0).children().eq(1).children().eq(0);
      var subTotal = tintasEspeciales.eq(i).parent().parent().parent().parent().parent().children().eq(2).children().eq(0).children().eq(0).children().eq(1).children().eq(1).children().eq(0);
      if(codigo == ""){
        //Limpiar campos
        cantidad.val("");
        costoUnitario.val("");
        subTotal.val("");
        cantidad.prop("readonly", true);
        costoUnitario.prop("readonly", true);
      }else{
        cantidad.prop("readonly", false);
        costoUnitario.prop("readonly", false);
      }
    }
    calcularTotalTintas();
  }



  function validarEnvioCotizacionTintasEspeciales(){
    var tintasEspeciales = $(".codigoColorTintaEspecial");
    var errores=0;
    var resultado ='<br><strong>Tintas Especiales:</strong>';
    for (i = 0; i < tintasEspeciales.length; i++) {
      var codigo = tintasEspeciales.eq(i).val();
      var cantidad = tintasEspeciales.eq(i).parent().parent().parent().children().eq(1).children().eq(1).children().eq(0);
      var costoUnitario = tintasEspeciales.eq(i).parent().parent().parent().parent().parent().children().eq(2).children().eq(0).children().eq(0).children().eq(0).children().eq(1).children().eq(0);
      var subTotal = tintasEspeciales.eq(i).parent().parent().parent().parent().parent().children().eq(2).children().eq(0).children().eq(0).children().eq(1).children().eq(1).children().eq(0);
      if(codigo != ""){

        //Limpiar campos
        if(cantidad.val() <1){
          errores++;
          resultado += "<br>*La <strong>cantidad</strong> de tinta con codigo <strong>"+codigo+"</strong> debe ser mayor a 1.";
        }
        if(costoUnitario.val() <0){
          errores++;
          resultado += "<br>*El <strong>costo unitario</strong> de la tinta con codigo <strong>"+codigo+"</strong> debe ser positivo.";
        }
      }
    }

    if(errores>0){
      return resultado;
    }else{
      resultado = 'OK';
      return resultado;
    }
  }


  // Validaciones Detalle Cotizacion Bloque Material

  //material
  $(document).on("change",".selectMaterial",function(){
    var material = $(this).val();
    var inputUnidad = $(this).parent().parent().children().eq(2).children().eq(0).children().eq(1).children().eq(0);
    var cantidad = $(this).parent().parent().parent().parent().parent().children().eq(1).children().eq(1).children().eq(0).children().eq(0).children().eq(0).children().eq(1).children().eq(0);
    var costoUnitario= $(this).parent().parent().parent().parent().parent().children().eq(1).children().eq(1).children().eq(0).children().eq(1).children().eq(0).children().eq(1).children().eq(0);
    var subTotal=$(this).parent().parent().parent().parent().parent().children().eq(1).children().eq(2).children().eq(0).children().eq(1).children().eq(0);

    if(material == "0"){
      //Limpiar campos
      inputUnidad.val("");
      cantidad.val("");
      costoUnitario.val("");
      subTotal.val("");

      cantidad.prop("readonly", true);
      costoUnitario.prop("readonly", true);
    }else{

      cantidad.prop("readonly", false);
      costoUnitario.prop("readonly", false);
    }
    calcularTotalMaterial();

    // console.log(cantidad);
    
  });

  validarCotizacionMateriales();
  function validarCotizacionMateriales(){

    var selectMaterial = $(".selectMaterial");
    for (i = 0; i < selectMaterial.length; i++) {
      var material = selectMaterial.eq(i).val();
      var inputUnidad = selectMaterial.eq(i).parent().parent().children().eq(2).children().eq(0).children().eq(1).children().eq(0);
      var cantidad = selectMaterial.eq(i).parent().parent().parent().parent().parent().children().eq(1).children().eq(1).children().eq(0).children().eq(0).children().eq(0).children().eq(1).children().eq(0);
      var costoUnitario= selectMaterial.eq(i).parent().parent().parent().parent().parent().children().eq(1).children().eq(1).children().eq(0).children().eq(1).children().eq(0).children().eq(1).children().eq(0);
      var subTotal=selectMaterial.eq(i).parent().parent().parent().parent().parent().children().eq(1).children().eq(2).children().eq(0).children().eq(1).children().eq(0);
      
      if(material == "0"){
        //Limpiar campos
        inputUnidad.val("");
        cantidad.val("");
        costoUnitario.val("");
        subTotal.val("");

        cantidad.prop("readonly", true);
        costoUnitario.prop("readonly", true);
      }else{

        cantidad.prop("readonly", false);
        costoUnitario.prop("readonly", false);
      }
    }
    calcularTotalMaterial();
  }


  function validarEnvioCotizacionMateriales(){
    var errores=0;
    var resultado ='<br><strong>Materiales:</strong>';

    var selectMaterial = $(".selectMaterial");
    for (i = 0; i < selectMaterial.length; i++) {

      var material = selectMaterial.eq(i).val();      
      var cantidad = selectMaterial.eq(i).parent().parent().parent().parent().parent().children().eq(1).children().eq(1).children().eq(0).children().eq(0).children().eq(0).children().eq(1).children().eq(0);
      var costoUnitario= selectMaterial.eq(i).parent().parent().parent().parent().parent().children().eq(1).children().eq(1).children().eq(0).children().eq(1).children().eq(0).children().eq(1).children().eq(0);
      // var nombreMaterial = selectMaterial.eq(i).("option:selected").text();
      var nombre = selectMaterial.eq(i).children("option:selected").text();
      // console.log(nombre);

      if(material != "0"){
        //Limpiar campos
        
        //Limpiar campos
        if(cantidad.val() <1){
          errores++;
          resultado += "<br>*La <strong>cantidad</strong> del Material <strong>"+nombre+"</strong> debe ser mayor a 1.";
        }
        if(costoUnitario.val() <0){
          errores++;
          resultado += "<br>*El <strong>costo unitario</strong> del Material <strong>"+nombre+"</strong> debe ser positivo.";
        }

      }
      
    }

    if(errores>0){
      return resultado;
    }else{
      resultado = 'OK';
      return resultado;
    }
  }





  //// Validaciones Detalle Cotizacion Bloque Terminados
  $(document).on("change",".selectTerminado",function(){
    var terminado=$(this).val();
    var maquina=$(this).parent().parent().parent().parent().children().eq(1).children().eq(0).children().eq(1).children().eq(0);
    var costoUnitario = $(this)
      .parent()
      .parent()
      .parent()
      .parent().parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(1).children().eq(1).children()
      .eq(0);
    
    var cantidad = $(this)
      .parent()
      .parent()
      .parent()
      .parent().parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(0).children().eq(0).children()
      .eq(1).children().eq(0);
      
    var subtotal = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children().eq(1).children().eq(1).children().eq(0).children().eq(1).children().eq(0)
      ;

    if(terminado == "0"){
      //Limpiar campos
      maquina.val("0");
      cantidad.val("");
      costoUnitario.val("");
      subtotal.val("");

      cantidad.prop("readonly", true);
      costoUnitario.prop("readonly", true);
    }else{
      cantidad.prop("readonly", false);
      costoUnitario.prop("readonly", false);
    }
    calcularTotalTerminados();

  });



  validarCotizacionTerminado();
  function validarCotizacionTerminado(){

    var selectTerminado = $(".selectTerminado");
    for (i = 0; i < selectTerminado.length; i++) {
      var terminado = selectTerminado.eq(i).val();
      var maquina=selectTerminado.eq(i).parent().parent().parent().parent().children().eq(1).children().eq(0).children().eq(1).children().eq(0);
      var costoUnitario = selectTerminado.eq(i)
        .parent()
        .parent()
        .parent()
        .parent().parent()
        .parent()
        .children()
        .eq(1)
        .children()
        .eq(0)
        .children()
        .eq(1).children().eq(1).children()
        .eq(0);
      
      var cantidad = selectTerminado.eq(i)
        .parent()
        .parent()
        .parent()
        .parent().parent()
        .parent()
        .children()
        .eq(1)
        .children()
        .eq(0)
        .children()
        .eq(0).children().eq(0).children()
        .eq(1).children().eq(0);
        
      var subtotal = selectTerminado.eq(i)
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .children().eq(1).children().eq(1).children().eq(0).children().eq(1).children().eq(0)
        ;

        // console.log("Este el terminado = "+terminado);

      if(terminado == "0"){
        //Limpiar campos
        maquina.val("0");
        cantidad.val("");
        costoUnitario.val("");
        subtotal.val("");

        cantidad.prop("readonly", true);
        costoUnitario.prop("readonly", true);
      }else{
        cantidad.prop("readonly", false);
        costoUnitario.prop("readonly", false);
      }
    }
    
    calcularTotalTerminados();
  }

  function validarEnvioCotizacionTerminado(){
    var errores=0;
    var resultado ='<br><strong>Terminados:</strong>';
    var selectTerminado = $(".selectTerminado");
    for (i = 0; i < selectTerminado.length; i++) {
      var terminado=selectTerminado.eq(i).val();
      var costoUnitario = selectTerminado.eq(i)
        .parent()
        .parent()
        .parent()
        .parent().parent()
        .parent()
        .children()
        .eq(1)
        .children()
        .eq(0)
        .children()
        .eq(1).children().eq(1).children()
        .eq(0);
      
      var cantidad = selectTerminado.eq(i)
        .parent()
        .parent()
        .parent()
        .parent().parent()
        .parent()
        .children()
        .eq(1)
        .children()
        .eq(0)
        .children()
        .eq(0).children().eq(0).children()
        .eq(1).children().eq(0);
      
      var nombre = selectTerminado.eq(i).children("option:selected").text();
      

      if(terminado != "0"){
        //Limpiar campos

        if(cantidad.val() <1){
          errores++;
          resultado += "<br>*La <strong>cantidad</strong> del terminado <strong>"+nombre+"</strong> debe ser mayor a 1.";
        }
        if(costoUnitario.val() <0){
          errores++;
          resultado += "<br>*El <strong>costo unitario</strong> del terminado <strong>"+nombre+"</strong> debe ser positivo.";
        }

      }

    }
    
    if(errores>0){
      return resultado;
    }else{
      resultado = 'OK';
      return resultado;
    }
  }








  








});


