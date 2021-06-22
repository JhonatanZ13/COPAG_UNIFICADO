//compras

$(document).ready(function(){


  var item = document.getElementById('item');            
  var agrega=
  "<button type='button' id='agrega' class='col-9 form-control btn-success'><i class='fa fa-plus-square-o pl-1' ></i></button>";

       function contadorD(){
          var $divs = $(".delete").toArray().length;
          return $divs;
       }
       function contadorItem(){
          var numItem = $(".item").toArray().length;
          //var numItem = document.getElementsByClassName("item").length;
         numItem=numItem+1;
          console.log(numItem);
          return numItem;
       }



  $(document).on('click','#agrega',function(){
  
          $("#agrega").remove();

          var clon = $("#clon").html();

          $("#contenedor").append(

          "<div class='form col-md-12 row ml-5'>"+clon
          + "<div class='col-2'><button type='button' class='delete ml-3 btn btn-danger btn-sm'><i class='fa fa-trash pl-1' ></i></button></div>"
          +agrega
          +"</div> "


          );

return false;


  });

  $(document).on("keyup",".validar",function(){	
          var campo=$(this).val();

          if (campo.length >= 1) {
           if (contadorD()==0 ) {
                  $("#agrega").remove();
                  $("#clon").append(
                          agrega
                          ); 
           }


                }


              

  });

  $(document).on('click','.delete',function(){ 
        var  finalEliminar=contadorD();

          $(this).parent().parent().remove();
          var cont=0;
          if (contadorD()==0 ) {
                  $("#agrega").remove();
                  $("#clon").append(
                          agrega
                          ); 
                          cont++;
          }

                if (cont==0 ) {
                  if (contadorD()!= finalEliminar) {
                          $("#agrega").remove();
                          $("#contenedor").append( 
                                  "<div class='form col-12 row ml-5'>"
                                  +agrega
                                  +"</div> "
                                  ); 


                        }
                } 




  });




});

$(document).on("change", "#selectRegio", function() {
  var id = $(this).val();
  var url = $(this).attr("data-url");
  $.ajax({
      url: url,
      data: "id=" + id,
      type: "POST",
      success: function(datos) {
          $("#selectCentro").html(datos);
      }
  })

})

$(document).on("change", "#selectProdu", function() {
  var idd = $(this).val();
  var url = $(this).attr("data-url");
  $.ajax({
      url: url,
      data: "idd=" + idd,
      type: "POST",
      success: function(datos) {
          $("#selectMedida").html(datos);
      }
  })

})





//fin compras


//modal
$(document).ready(function () {
 
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



//Solicitud inicio
conttr();
var alv= "<p class='text-danger alv'>Falta este campo</p>";

$(document).on("keyup",".validar",function(){
    var producto = document.getElementById("producto").value;
    producto=producto.trim();
    var cantidad = document.getElementById("cantidad").value;
    var desc = document.getElementById("desc").value;
    desc=desc.trim();
    var cont=0;

    if (producto==""){  
     cont++;
  }
    if (cantidad==""){
     cont++;
  }
     if (desc==""){
     cont++;
  }
    if (cont==0){
      $("#adicionar").attr("disabled",false);
  }

  var campo=$(this).val();
    campo=campo.trim();
  if (campo.length>=1){
    $(this).removeClass('is-invalid');
    $(this).siblings(".alv").remove();
    $(this).addClass('is-valid'); 
  }else {
    $(this).siblings(".alv").remove();
    $(this).addClass('is-invalid');
    $(this).parent().append(alv);
  }
});

// obtenemos el valor de los input
  $(document).on('click', '#adicionar', function() { 
    $(".validar").removeClass('is-valid');  
    $("#adicionar").attr("disabled",true);
    var producto = document.getElementById("producto").value;
    producto=producto.trim();
    var cantidad = document.getElementById("cantidad").value;
    var desc = document.getElementById("desc").value;
    desc=desc.trim();
    
    var i = 1; //contador para asignar id al boton que borrara la fila
    var Filas = $("#tablap tr").length-1;
   
        var texa='<textarea class="form-control validar" id="desc' + Filas + '"  name="desc[]" rows="2" cols="50" placeholder="Descripcion producto.."  required>' + desc + '</textarea>';
        var fila = '<tr id="row' + Filas + '" class="fila"><td>'+'<input list="productos" name="producto[]" value="' + producto + '" id="producto' + Filas + '" class="form-control validar" type="text" placeholder="Producto..."  required>'+'</td><td> <input id="cantidad' + Filas + '" class="form-control validar" value="' + cantidad + '" name="cantidad[]" type="number"  placeholder="cantidad..."  required></td><td>'+ texa +'</td><td><button type="button" name="remove" id="' + Filas + '" class="btn btn-danger btn_remove btn btn-sm ml-2 mt-3"><i class="fa fa-trash"></i></button></td></tr>'; //esto seria lo que contendria la fila
        i++;

    $('#tablap tr:last').before(fila);

        conttr();   
       document.getElementById("cantidad").value ="";
       document.getElementById("desc").value = "";
       document.getElementById("producto").value = "";
       document.getElementById("producto").focus(); 
    // first
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
        "<div class='col-md-6'>" +
        cabecera +
        "</div>" +
        "<div class='col-md-6 d-flex justify-content-end'>" +
        "<button type='button' class='btn btn-danger eliminarMaterial'><i class='fas fa-trash-alt'></i></button>" +
        "</div>" +
        "</div>" +
        "<div>" +
        cuerpo +
        "</div>" +
        "</div>" +
        "</div>"
    );
  });
  //   Eliminar material
  $(document).on("click", ".eliminarMaterial", function () {
    $(this).parent().parent().parent().remove();
    calcularTotalMaterial();
  });

  //   Funcion de auto calcular precio
  $(document).on("keyup", ".calcularCantidad", function () {
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

  $(document).on("keyup", ".calcularCostoUnitario", function () {
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
  $(document).on("keyup", "#cantidadTintaBasica", function () {
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

  $(document).on("keyup", "#costoUnitarioTintaBasica", function () {
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

  $(document).on("keyup", ".cantidadTintaEspecial", function () {
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

  $(document).on("keyup", ".costoUnitarioTintaEspecial", function () {
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
  $(document).on("keyup", ".cantidadMaterial", function () {
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

  $(document).on("keyup", ".costoUnitarioMaterial", function () {
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
    calcularTotalCotizacion();
  }

  // Calcular Terminados
  $(document).on("keyup", ".cantidadHoraTerminados", function () {
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

  $(document).on("keyup", ".costoUnitarioTerminados", function () {
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
  $(document).on("keyup","#totalDiseno",function(){
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
});


