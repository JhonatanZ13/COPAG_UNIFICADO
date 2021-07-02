var form2 = document.getElementById('formUpdateProduccion');
const formUpdateProduccion = document.getElementById('formUpdateProduccion');
const inputsupdate = document.querySelectorAll('#formUpdateProduccion input');
const selectsupdate = document.querySelectorAll('#formUpdateProduccion select');
const textareasupdate = document.querySelectorAll('#formUpdateProduccion textarea');

const expresiones2 = {
	solonumeros: /^[0-9]*$/, // numeros
	solonumeros2: /^[0-9][^e\Wa-zA-Z]*$/,
	corte: /^[^a-zA-Z\D][0-9]*[.]*[^\D][0-9]* x [0-9]*[.]*[^\D][0-9]*[^a-zA-Z-_]*cm$/, 
	sololetras: /^[^\s\d\W][A-Za-z\s]*$/,
	tinta: /^#[a-zA-Z0-9]{6}$/
}



const campos2 = {
	Pte_cantidad:true,
	Pte_numeroPaginas:true,
	Pte_tamañoAbierto:true,
	Pte_tamañoCerrado:true,
	Pte_diseñador:true,
	Sus_tamañoPliego:true,
	Sus_cantidadSustrato:true,
	Sus_tamañoCorte:true,
	Sus_tirajePedido:true,
	Sus_porcentajeDesperdicio:true,
	Pim_encargado:true,
	Imp_formatoCorte:true,
	Pli_tintaespecial:true,
	Imp_encargado:true,
	numeradoDesde:true,
	numeradoHasta:true,
	estamcolor:true,
	plenumerocuerpos:true,
	embolcantidad:true,
	fajacantidad:true,
	desbcantidad:true

}

const validarFormularioUpdate = (e) =>{
    switch (e.target.name) {
		case "Pte_cantidad":
			if (expresiones2.solonumeros2.test(e.target.value)) {
				document.getElementById('cantidad').classList.remove('parsley-error');
				document.getElementById('cantidadP').classList.remove('form_input-error-activo');
				campos2['Pte_cantidad'] = true;
			} else {
				document.getElementById('cantidad').classList.add('parsley-error');
				document.getElementById('cantidadP').classList.add('form_input-error-activo');
				campos2['Pte_cantidad'] = false;
				if(e.target.value == ""){// esta condicion hace que los input puedan estar y enviarse vacios en caso de ser requerido.
					document.getElementById('cantidad').classList.add('parsley-error');
					document.getElementById('cantidadP').classList.add('form_input-error-activo');
					campos2['Pte_cantidad'] = false;
				}
			}
		break;
		case "Pte_numeroPaginas":
			if (expresiones2.solonumeros.test(e.target.value)) {
				document.getElementById('cantidadPaginas').classList.remove('parsley-error');
				document.getElementById('cantidadPP').classList.remove('form_input-error-activo');
				campos2['Pte_numeroPaginas'] = true;
			} else {
				document.getElementById('cantidadPaginas').classList.add('parsley-error');
				document.getElementById('cantidadPP').classList.add('form_input-error-activo');
				campos2['Pte_numeroPaginas'] = false;
				if(e.target.value == ""){// esta condicion hace que los input puedan estar y enviarse vacios en caso de ser requerido.
					document.getElementById('cantidadPaginas').classList.remove('parsley-error');
					document.getElementById('cantidadPP').classList.remove('form_input-error-activo');
					campos2['Pte_numeroPaginas'] = true;
				}
			}
		break;
		case "Pte_tamañoAbierto":
			if (expresiones2.corte.test(e.target.value)) {
				document.getElementById('tamañoAbierto').classList.remove('parsley-error');
				document.getElementById('tamañoAbiertoP').classList.remove('form_input-error-activo');
				campos2['Pte_tamañoAbierto'] = true;
			} else {
				document.getElementById('tamañoAbierto').classList.add('parsley-error');
				document.getElementById('tamañoAbiertoP').classList.add('form_input-error-activo');
				campos2['Pte_tamañoAbierto'] = false;
				if(e.target.value == ""){// esta condicion hace que los input puedan estar y enviarse vacios en caso de ser requerido.
					document.getElementById('tamañoAbierto').classList.remove('parsley-error');
					document.getElementById('tamañoAbiertoP').classList.remove('form_input-error-activo');
					campos2['Pte_tamañoAbierto'] = true;
				}
			}
		break;
		case "Pte_tamañoCerrado":
			if (expresiones2.corte.test(e.target.value)) {
				document.getElementById('tamañoCerrado').classList.remove('parsley-error');
				document.getElementById('tamañoCerradoP').classList.remove('form_input-error-activo');
				campos2['Pte_tamañoCerrado'] = true;
			} else {
				document.getElementById('tamañoCerrado').classList.add('parsley-error');
				document.getElementById('tamañoCerradoP').classList.add('form_input-error-activo');
				campos2['Pte_tamañoCerrado'] = false;
				if(e.target.value == ""){// esta condicion hace que los input puedan estar y enviarse vacios en caso de ser requerido.
					document.getElementById('tamañoCerrado').classList.remove('parsley-error');
					document.getElementById('tamañoCerradoP').classList.remove('form_input-error-activo');
					campos2['Pte_tamañoCerrado'] = true;
				}
			}
		break;
		case "Pte_diseñador":
			if (expresiones2.sololetras.test(e.target.value)) {
				document.getElementById('diseñador').classList.remove('parsley-error');
				document.getElementById('diseñadorP').classList.remove('form_input-error-activo');
				campos2['Pte_diseñador'] = true;
			} else {
				document.getElementById('diseñador').classList.add('parsley-error');
				document.getElementById('diseñadorP').classList.add('form_input-error-activo');
				campos2['Pte_diseñador'] = false;
			}
		break;
		case "Sus_tamañoPliego[]":
			if (expresiones2.corte.test(e.target.value)) {
				document.getElementById('tamañoSus').classList.remove('parsley-error');
				document.getElementById('tamañoSusP').classList.remove('form_input-error-activo');
				campos2['Sus_tamañoPliego'] = true;
			} else {
				document.getElementById('tamañoSus').classList.add('parsley-error');
				document.getElementById('tamañoSusP').classList.add('form_input-error-activo');
				campos2['Sus_tamañoPliego'] = false;
				if(e.target.value == ""){// esta condicion hace que este input pueda estar y enviarse vacio.
					document.getElementById('tamañoSus').classList.remove('parsley-error');
					document.getElementById('tamañoSusP').classList.remove('form_input-error-activo');
					campos2['Sus_tamañoPliego'] = true;
				}
			}
		break;
		case "Sus_cantidadSustrato[]":
			if (expresiones2.solonumeros.test(e.target.value)) {
				document.getElementById('cantidadSus').classList.remove('parsley-error');
				document.getElementById('cantidadSusP').classList.remove('form_input-error-activo');
				campos2['Sus_cantidadSustrato'] = true;
			} else {
				document.getElementById('cantidadSus').classList.add('parsley-error');
				document.getElementById('cantidadSusP').classList.add('form_input-error-activo');
				campos2['Sus_cantidadSustrato'] = false;
				if(e.target.value == ""){// esta condicion hace que este input pueda estar y enviarse vacio.
					document.getElementById('cantidadSus').classList.remove('parsley-error');
					document.getElementById('cantidadSusP').classList.remove('form_input-error-activo');
					campos2['Sus_cantidadSustrato'] = true;
				}
			}
		break;
		case "Sus_tamañoCorte[]":
			if (expresiones2.corte.test(e.target.value)) {
				document.getElementById('corteSus').classList.remove('parsley-error');
				document.getElementById('corteSusP').classList.remove('form_input-error-activo');
				campos2['Sus_tamañoCorte'] = true;
			} else {
				document.getElementById('corteSus').classList.add('parsley-error');
				document.getElementById('corteSusP').classList.add('form_input-error-activo');
				campos2['Sus_tamañoCorte'] = false;
				if(e.target.value == ""){// esta condicion hace que este input pueda estar y enviarse vacio.
					document.getElementById('corteSus').classList.remove('parsley-error');
					document.getElementById('corteSusP').classList.remove('form_input-error-activo');
					campos2['Sus_tamañoCorte'] = true;
				}
			}
		break;
		case "Sus_tirajePedido[]":
			if (expresiones2.solonumeros.test(e.target.value)) {
				document.getElementById('tirajePedidoSus').classList.remove('parsley-error');
				document.getElementById('tirajePedidoSusP').classList.remove('form_input-error-activo');
				campos2['Sus_tirajePedido'] = true;
			} else {
				document.getElementById('tirajePedidoSus').classList.add('parsley-error');
				document.getElementById('tirajePedidoSusP').classList.add('form_input-error-activo');
				campos2['Sus_tirajePedido'] = false;
				if(e.target.value == ""){// esta condicion hace que este input pueda estar y enviarse vacio.
					document.getElementById('tirajePedidoSus').classList.remove('parsley-error');
					document.getElementById('tirajePedidoSusP').classList.remove('form_input-error-activo');
					campos2['Sus_tirajePedido'] = true;
				}
			}
		break;
		case "Sus_porcentajeDesperdicio[]":
			if (expresiones2.solonumeros2.test(e.target.value)) {
				document.getElementById('porcentajeDesperdicio').classList.remove('parsley-error');
				document.getElementById('porcentajeDesperdicioSusP').classList.remove('form_input-error-activo');
				campos2['Sus_porcentajeDesperdicio'] = true;
			} else {
				document.getElementById('porcentajeDesperdicio').classList.add('parsley-error');
				document.getElementById('porcentajeDesperdicioSusP').classList.add('form_input-error-activo');
				campos2['Sus_porcentajeDesperdicio'] = false;
			}
		break;
		case "Sus_tirajeTotal[]":
			if (expresiones2.solonumeros2.test(e.target.value)) {
				document.getElementById('tirajeTotalSus').classList.remove('parsley-error');
				document.getElementById('tirajeTotalSusP').classList.remove('form_input-error-activo');
				campos2['Sus_tirajeTotal'] = true;
			} else {
				document.getElementById('tirajeTotalSus').classList.add('parsley-error');
				document.getElementById('tirajeTotalSusP').classList.add('form_input-error-activo');
				campos2['Sus_tirajeTotal'] = false;
			}
		break;
		case "Pim_encargado":
			if (expresiones2.sololetras.test(e.target.value)) {
				document.getElementById('encargadoPreImpresion').classList.remove('parsley-error');
				document.getElementById('encargadoPreImpresionP').classList.remove('form_input-error-activo');
				campos2['Pim_encargado'] = true;
			} else {
				document.getElementById('encargadoPreImpresion').classList.add('parsley-error');
				document.getElementById('encargadoPreImpresionP').classList.add('form_input-error-activo');
				campos2['Pim_encargado'] = false;
			}
		break;
		case "Imp_formatoCorte":
			if (expresiones2.corte.test(e.target.value)) {
				document.getElementById('formatoCorteImpresion').classList.remove('parsley-error');
				document.getElementById('formatoCorteImpresionP').classList.remove('form_input-error-activo');
				campos2['Imp_formatoCorte'] = true;
			} else {
				document.getElementById('formatoCorteImpresion').classList.add('parsley-error');
				document.getElementById('formatoCorteImpresionP').classList.add('form_input-error-activo');
				campos2['Imp_formatoCorte'] = false;
				if(e.target.value == ""){// esta condicion hace que este input pueda estar y enviarse vacio.
					document.getElementById('formatoCorteImpresion').classList.remove('parsley-error');
					document.getElementById('formatoCorteImpresionP').classList.remove('form_input-error-activo');
					campos2['Imp_formatoCorte'] = true;
				}
			}
		break;
		case "Pli_tintaespecial[]":
			if (expresiones2.tinta.test(e.target.value)) {
				document.getElementById('tintaEspecial').classList.remove('parsley-error');
				document.getElementById('tintaEspecialP').classList.remove('form_input-error-activo');
				campos2['Pli_tintaespecial'] = true;
			} else {
				document.getElementById('tintaEspecial').classList.add('parsley-error');
				document.getElementById('tintaEspecialP').classList.add('form_input-error-activo');
				campos2['Pli_tintaespecial'] = false;
				if(e.target.value == ""){// esta condicion hace que los input puedan estar y enviarse vacios en caso de ser requerido.
					document.getElementById('tintaEspecial').classList.remove('parsley-error');
					document.getElementById('tintaEspecialP').classList.remove('form_input-error-activo');
					campos2['Pli_tintaespecial'] = true;
				}
			}
		break;
		case "Imp_encargado":
			if (expresiones2.sololetras.test(e.target.value)) {
				document.getElementById('encargadoImpresion').classList.remove('parsley-error');
				document.getElementById('encargadoImpresionP').classList.remove('form_input-error-activo');
				campos2['Imp_encargado'] = true;
			} else {
				document.getElementById('encargadoImpresion').classList.add('parsley-error');
				document.getElementById('encargadoImpresionP').classList.add('form_input-error-activo');
				campos2['Imp_encargado'] = false;
			}
		break;
		
		// Inputs de terminados
		case "numeradodesde":
			if (expresiones2.solonumeros2.test(e.target.value)) {
				document.getElementById('numeradoDesde').classList.remove('parsley-error');
				document.getElementById('numeradoDesdeP').classList.remove('form_input-error-activo');
				campos2['numeradoDesde'] = true;
			} else {
				document.getElementById('numeradoDesde').classList.add('parsley-error');
				document.getElementById('numeradoDesdeP').classList.add('form_input-error-activo');
				campos2['numeradoDesde'] = false;
				if(e.target.value == ""){// esta condicion hace que este input pueda estar y enviarse vacio.
					document.getElementById('numeradoDesde').classList.remove('parsley-error');
					document.getElementById('numeradoDesdeP').classList.remove('form_input-error-activo');
					campos2['numeradoDesde'] = true;
				}
			}
		break;
		case "numeradohasta":
			if (expresiones2.solonumeros2.test(e.target.value)) {
				document.getElementById('numeradoHasta').classList.remove('parsley-error');
				document.getElementById('numeradoHastaP').classList.remove('form_input-error-activo');
				campos2['numeradoHasta'] = true;
			} else {
				document.getElementById('numeradoHasta').classList.add('parsley-error');
				document.getElementById('numeradoHastaP').classList.add('form_input-error-activo');
				campos2['numeradoHasta'] = false;
				if(e.target.value == ""){// esta condicion hace que los input puedan estar y enviarse vacios en caso de ser requerido.
					document.getElementById('numeradoHasta').classList.remove('parsley-error');
					document.getElementById('numeradoHastaP').classList.remove('form_input-error-activo');
					campos2['numeradoHasta'] = true;
				}
			}
		break;
		case "estamcolor":
			if (expresiones2.tinta.test(e.target.value)) {
				document.getElementById('estamcolor').classList.remove('parsley-error');
				document.getElementById('estamcolorP').classList.remove('form_input-error-activo');
				campos2['estamcolor'] = true;
			} else {
				document.getElementById('estamcolor').classList.add('parsley-error');
				document.getElementById('estamcolorP').classList.add('form_input-error-activo');
				campos2['estamcolor'] = false;
				if(e.target.value == ""){// esta condicion hace que los input puedan estar y enviarse vacios en caso de ser requerido.
					document.getElementById('estamcolor').classList.remove('parsley-error');
					document.getElementById('estamcolorP').classList.remove('form_input-error-activo');
					campos2['estamcolor'] = true;
				}
			}
		break;
		case "plenumerocuerpos":
			if (expresiones2.solonumeros.test(e.target.value)) {
				document.getElementById('numeroCuerpos').classList.remove('parsley-error');
				document.getElementById('numeroCuerposP').classList.remove('form_input-error-activo');
				campos2['plenumerocuerpos'] = true;
			} else {
				document.getElementById('numeroCuerpos').classList.add('parsley-error');
				document.getElementById('numeroCuerposP').classList.add('form_input-error-activo');
				campos2['plenumerocuerpos'] = false;
			}
		break;
		case "embolcantidad":
			if (expresiones2.solonumeros.test(e.target.value)) {
				document.getElementById('embolsadoCantidad').classList.remove('parsley-error');
				document.getElementById('embolsadoCantidadP').classList.remove('form_input-error-activo');
				campos['embolcantidad'] = true;
			} else {
				document.getElementById('embolsadoCantidad').classList.add('parsley-error');
				document.getElementById('embolsadoCantidadP').classList.add('form_input-error-activo');
				campos2['embolcantidad'] = false;
			}
		break;
		case "fajacantidad":
			if (expresiones2.solonumeros.test(e.target.value)) {
				document.getElementById('fajadoCantidad').classList.remove('parsley-error');
				document.getElementById('fajadoCantidadP').classList.remove('form_input-error-activo');
				campos2['fajacantidad'] = true;
			} else {
				document.getElementById('fajadoCantidad').classList.add('parsley-error');
				document.getElementById('fajadoCantidadP').classList.add('form_input-error-activo');
				campos2['fajacantidad'] = false;
			}
		break;
		case "desbcantidad":
			if (expresiones2.solonumeros.test(e.target.value)) {
				document.getElementById('desbasuradoCantidad').classList.remove('parsley-error');
				document.getElementById('desbasuradoCantidadP').classList.remove('form_input-error-activo');
				campos2['desbcantidad'] = true;
			} else {
				document.getElementById('desbasuradoCantidad').classList.add('parsley-error');
				document.getElementById('desbasuradoCantidadP').classList.add('form_input-error-activo');
				campos2['desbcantidad'] = false;
			}
		break;
	}
}

inputsupdate.forEach((input) => {
    input.addEventListener('keyup', validarFormularioUpdate);
    input.addEventListener('blur', validarFormularioUpdate);

});


$(document).on("submit", "#formUpdateProduccion", function(){
	event.preventDefault();

	var tipocliente = $("#tipoCliente").val();
	var elegircliente = $("#elegirCliente").val();
	var elegirproducto = $("#elegirProducto").val();
    var alertaVacio = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" +
				"<strong>Por favor llene todos los campos obligatorios. (*)</strong><br> " +
				"<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
				"<span aria-hidden='true'>&times;</span>" +
				"</button>" +
				"</div>";

	var alertafaltantes = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" +
	"<strong>Por favor revise que todos los datos esten correctamente escritos.</strong><br> " +
	"<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
	"<span aria-hidden='true'>&times;</span>" +
	"</button>" +
	"</div>";				

	if (tipocliente == "" || elegircliente == "" || elegirproducto == "") {

		$("#alertaproduccion").html(alertaVacio);
		setTimeout(function(){
			$('#alertaproduccion').html("");
		}, 5000);

		if(elegirproducto == ""){
			$("#elegirProducto").addClass("parsley-error");
			setTimeout(function(){
				$("#elegirProducto").removeClass("parsley-error");	
			}, 10000);
			
		}
		if(tipocliente == ""){
			$("#tipoCliente").addClass("parsley-error");
			setTimeout(function(){
				$("#tipoCliente").removeClass("parsley-error");	
			}, 10000);
			
		}
		if(elegircliente == ""){
			$("#elegirCliente").addClass("parsley-error");
			setTimeout(function(){
				$("#elegirCliente").removeClass("parsley-error");	
			}, 10000);
			
		}
	}else if(campos2.Pte_cantidad && campos2.Pte_numeroPaginas && campos2.Pte_tamañoAbierto && campos2.Pte_tamañoCerrado && campos2.Pte_diseñador && campos2.Sus_tamañoPliego && campos2.Sus_cantidadSustrato && campos2.Sus_tamañoCorte && campos2.Sus_tirajePedido && campos2.Sus_porcentajeDesperdicio && campos2.Pim_encargado && campos2.Imp_formatoCorte && campos2.Pli_tintaespecial && campos2.Imp_encargado && campos2.numeradoDesde && campos2.numeradoHasta && campos2.estamcolor && campos2.plenumerocuerpos && campos2.embolcantidad && campos2.fajacantidad && campos2.desbcantidad){
		swal({
			title: '¿Desea insertar esta orden?',
			text: 'Se insertaran todos los datos que lleno.',
			type: 'info',
			icon: 'info',
			buttons: {
			  confirm: {
				text: 'Registrar orden',
				className: 'btn btn-success'
			  },
		
			  cancel: {
				visible: true,
				text: "Cancelar",
				className: 'btn btn-primary'
			  }
		
			}
		  }).then((Delete) => {
			if (Delete) {
			  $(this).submit();
			}
		  });
	} else {
		$("#alertaproduccion").html(alertafaltantes);
		setTimeout(function(){
			$('#alertaproduccion').html("");
		}, 5000);
		return false;
	}
});