var form = document.getElementById('formInsertProduccion');
const formulario = document.getElementById('formInsertProduccion');
const inputs = document.querySelectorAll('#formInsertProduccion input');
const selects = document.querySelectorAll('#formInsertProduccion select');
const textareas = document.querySelectorAll('#formInsertProduccion textarea');

function habilitardatosproducto(){

	var select1 = document.getElementById('elegirProducto');
	var cantidad = document.getElementById('cantidad');
	var cantidadPaginas = document.getElementById('cantidadPaginas');
	var tamañoAbierto = document.getElementById('tamañoAbierto');
	var tamañoCerrado = document.getElementById('tamañoCerrado');
	var fechaInicio = document.getElementById('fechaInicio');
	var fechaFin = document.getElementById('fechaFin');
	var fechaEntrega = document.getElementById('fechaEntrega');
	var diseñador = document.getElementById('diseñador');

	if (select1.value != 0) {
		cantidad.disabled = false;
		cantidadPaginas.disabled = false;
		tamañoAbierto.disabled = false;
		tamañoCerrado.disabled = false;
		fechaInicio.disabled = false;
		fechaFin.disabled = false;
		fechaEntrega.disabled = false;
		diseñador.disabled = false;
	} else {
		cantidad.disabled = true;
		cantidad.value = "";
		cantidad.classList.remove('parsley-error');
		cantidad.classList.remove('parsley-success');

		cantidadPaginas.disabled = true;
		cantidadPaginas.value = "";
		cantidadPaginas.classList.remove('parsley-error');
		cantidadPaginas.classList.remove('parsley-success');

		tamañoAbierto.disabled = true;
		tamañoAbierto.value = "";
		tamañoAbierto.classList.remove('parsley-error');
		tamañoAbierto.classList.remove('parsley-success');

		tamañoCerrado.disabled = true;
		tamañoCerrado.value = "";
		tamañoCerrado.classList.remove('parsley-error');
		tamañoCerrado.classList.remove('parsley-success');

		fechaInicio.disabled = true;
		fechaInicio.value = "";
		fechaInicio.classList.remove('parsley-error');
		fechaInicio.classList.remove('parsley-success');

		fechaFin.disabled = true;
		fechaFin.value = "";
		fechaFin.classList.remove('parsley-error');
		fechaFin.classList.remove('parsley-success');

		fechaEntrega.disabled = true;
		fechaEntrega.value = "";
		fechaEntrega.classList.remove('parsley-success');
		fechaEntrega.classList.remove('parsley-error');

		diseñador.disabled = true;
		diseñador.value = "";
		diseñador.classList.remove('parsley-error');
		diseñador.classList.remove('parsley-success');
	}

}


const expresiones = {
	solonumeros: /^[0-9]*$/, // numeros
	solonumeros2: /^[\s0-9][^a-zA-z]*$/,
	corte: /^[^a-zA-Z\D][0-9]*[.]*[^\D][0-9]* x [0-9]*[.]*[^\D][0-9]*[^a-zA-Z-_]*cm$/, 
	sololetras: /^[^\s\d\W][A-Za-z\s]*$/,
	tinta: /^#[a-zA-Z0-9]{6}$/
}


const campos = {
	Pte_cantidad:false,
	Pte_numeroPaginas:false,
	Pte_tamañoAbierto:false,
	Pte_tamañoCerrado:true,
	Pte_diseñador:false,
	Sus_tamañoPliego:false,
	Sus_cantidadSustrato:false,
	Sus_tamañoCorte:false,
	Sus_tirajePedido:false,
	Sus_porcentajeDesperdicio:true,
	Pim_encargado:false,
	Imp_formatoCorte:false,
	Pli_tintaespecial:true,
	Imp_encargado:false,
	numeradodesde:true,
	numeradohasta:true,
	estamcolor:true,
	plenumerocuerpos:true,
	embolcantidad:true,
	fajacantidad:true,
	desbcantidad:true
}

const validarFormulario = (e) =>{
	var vacio="";
    switch (e.target.name) {
		case "Pte_cantidad":
			if (expresiones.solonumeros.test(e.target.value)) {
				document.getElementById('cantidad').classList.remove('parsley-error');
				document.getElementById('cantidadP').classList.remove('form_input-error-activo');
				campos['Pte_cantidad'] = true;
			} else {
				document.getElementById('cantidad').classList.add('parsley-error');
				document.getElementById('cantidadP').classList.add('form_input-error-activo');
				campos['Pte_cantidad'] = false;
			}
		break;
		case "Pte_numeroPaginas":
			if (expresiones.solonumeros.test(e.target.value)) {
				document.getElementById('cantidadPaginas').classList.remove('parsley-error');
				document.getElementById('cantidadPP').classList.remove('form_input-error-activo');
				campos['Pte_numeroPaginas'] = true;
			} else {
				document.getElementById('cantidadPaginas').classList.add('parsley-error');
				document.getElementById('cantidadPP').classList.add('form_input-error-activo');
				campos['Pte_numeroPaginas'] = false;
			}
		break;
		case "Pte_tamañoAbierto":
			if (expresiones.corte.test(e.target.value)) {
				document.getElementById('tamañoAbierto').classList.remove('parsley-error');
				document.getElementById('tamañoAbiertoP').classList.remove('form_input-error-activo');
				campos['Pte_tamañoAbierto'] = true;
			} else {
				document.getElementById('tamañoAbierto').classList.add('parsley-error');
				document.getElementById('tamañoAbiertoP').classList.add('form_input-error-activo');
				campos['Pte_tamañoAbierto'] = false;
			}
		break;
		case "Pte_tamañoCerrado":
			if (expresiones.corte.test(e.target.value)) {
				document.getElementById('tamañoCerrado').classList.remove('parsley-error');
				document.getElementById('tamañoCerradoP').classList.remove('form_input-error-activo');
				campos['Pte_tamañoCerrado'] = true;
			} else {
				document.getElementById('tamañoCerrado').classList.add('parsley-error');
				document.getElementById('tamañoCerradoP').classList.add('form_input-error-activo');
				campos['Pte_tamañoCerrado'] = false;
			}
		break;
		case "Pte_diseñador":
			if (expresiones.sololetras.test(e.target.value)) {
				document.getElementById('diseñador').classList.remove('parsley-error');
				document.getElementById('diseñadorP').classList.remove('form_input-error-activo');
				campos['Pte_diseñador'] = true;
			} else {
				document.getElementById('diseñador').classList.add('parsley-error');
				document.getElementById('diseñadorP').classList.add('form_input-error-activo');
				campos['Pte_diseñador'] = false;
			}
		break;
		case "Sus_tamañoPliego[]":
			if (expresiones.corte.test(e.target.value)) {
				document.getElementById('tamañoSus').classList.remove('parsley-error');
				document.getElementById('tamañoSusP').classList.remove('form_input-error-activo');
				campos['Sus_tamañoPliego'] = true;
			} else {
				document.getElementById('tamañoSus').classList.add('parsley-error');
				document.getElementById('tamañoSusP').classList.add('form_input-error-activo');
				campos['Sus_tamañoPliego'] = false;
			}
		break;
		case "Sus_cantidadSustrato[]":
			if (expresiones.solonumeros.test(e.target.value)) {
				document.getElementById('cantidadSus').classList.remove('parsley-error');
				document.getElementById('cantidadSusP').classList.remove('form_input-error-activo');
				campos['Sus_cantidadSustrato'] = true;
			} else {
				document.getElementById('cantidadSus').classList.add('parsley-error');
				document.getElementById('cantidadSusP').classList.add('form_input-error-activo');
				campos['Sus_cantidadSustrato'] = false;
			}
		break;
		case "Sus_tamañoCorte[]":
			if (expresiones.corte.test(e.target.value)) {
				document.getElementById('corteSus').classList.remove('parsley-error');
				document.getElementById('corteSusP').classList.remove('form_input-error-activo');
				campos['Sus_tamañoCorte'] = true;
			} else {
				document.getElementById('corteSus').classList.add('parsley-error');
				document.getElementById('corteSusP').classList.add('form_input-error-activo');
				campos['Sus_tamañoCorte'] = false;
			}
		break;
		case "Sus_tirajePedido[]":
			if (expresiones.solonumeros.test(e.target.value)) {
				document.getElementById('tirajePedidoSus').classList.remove('parsley-error');
				document.getElementById('tirajePedidoSusP').classList.remove('form_input-error-activo');
				campos['Sus_tirajePedido'] = true;
			} else {
				document.getElementById('tirajePedidoSus').classList.add('parsley-error');
				document.getElementById('tirajePedidoSusP').classList.add('form_input-error-activo');
				campos['Sus_tirajePedido'] = false;
			}
		break;
		case "Sus_porcentajeDesperdicio[]":
			if (expresiones.solonumeros2.test(e.target.value)) {
				document.getElementById('porcentajeDesperdicio').classList.remove('parsley-error');
				document.getElementById('porcentajeDesperdicioSusP').classList.remove('form_input-error-activo');
				campos['Sus_porcentajeDesperdicio'] = true;
			} else {
				document.getElementById('porcentajeDesperdicio').classList.add('parsley-error');
				document.getElementById('porcentajeDesperdicioSusP').classList.add('form_input-error-activo');
				campos['Sus_porcentajeDesperdicio'] = false;
			}
		break;
		case "Pim_encargado":
			if (expresiones.sololetras.test(e.target.value)) {
				document.getElementById('encargadoPreImpresion').classList.remove('parsley-error');
				document.getElementById('encargadoPreImpresionP').classList.remove('form_input-error-activo');
				campos['Pim_encargado'] = true;
			} else {
				document.getElementById('encargadoPreImpresion').classList.add('parsley-error');
				document.getElementById('encargadoPreImpresionP').classList.add('form_input-error-activo');
				campos['Pim_encargado'] = false;
			}
		break;
		case "Imp_formatoCorte":
			if (expresiones.corte.test(e.target.value)) {
				document.getElementById('formatoCorteImpresion').classList.remove('parsley-error');
				document.getElementById('formatoCorteImpresionP').classList.remove('form_input-error-activo');
				campos['Imp_formatoCorte'] = true;
			} else {
				document.getElementById('formatoCorteImpresion').classList.add('parsley-error');
				document.getElementById('formatoCorteImpresionP').classList.add('form_input-error-activo');
				campos['Imp_formatoCorte'] = false;
			}
		break;
		case "Pli_tintaespecial[]":
			if (expresiones.tinta.test(e.target.value)) {
				document.getElementById('tintaEspecial').classList.remove('parsley-error');
				document.getElementById('tintaEspecialP').classList.remove('form_input-error-activo');
				campos['Pli_tintaespecial'] = true;
			} else {
				document.getElementById('tintaEspecial').classList.add('parsley-error');
				document.getElementById('tintaEspecialP').classList.add('form_input-error-activo');
				campos['Pli_tintaespecial'] = false;
			}
		break;
		case "Imp_encargado":
			if (expresiones.sololetras.test(e.target.value)) {
				document.getElementById('encargadoImpresion').classList.remove('parsley-error');
				document.getElementById('encargadoImpresionP').classList.remove('form_input-error-activo');
				campos['Imp_encargado'] = true;
			} else {
				document.getElementById('encargadoImpresion').classList.add('parsley-error');
				document.getElementById('encargadoImpresionP').classList.add('form_input-error-activo');
				campos['Imp_encargado'] = false;
			}
		break;
		case "numeradodesde":
			if (expresiones.solonumeros.test(e.target.value)) {
				document.getElementById('numeradoDesde').classList.remove('parsley-error');
				document.getElementById('numeradoDesdeP').classList.remove('form_input-error-activo');
				campos['numeradodesde'] = true;
			} else {
				document.getElementById('numeradoDesde').classList.add('parsley-error');
				document.getElementById('numeradoDesdeP').classList.add('form_input-error-activo');
				campos['numeradodesde'] = false;
			}
		break;
		case "numeradohasta":
			if (expresiones.solonumeros.test(e.target.value)) {
				document.getElementById('numeradoHasta').classList.remove('parsley-error');
				document.getElementById('numeradoHastaP').classList.remove('form_input-error-activo');
				campos['numeradohasta'] = true;
			} else {
				document.getElementById('numeradoHasta').classList.add('parsley-error');
				document.getElementById('numeradoHastaP').classList.add('form_input-error-activo');
				campos['numeradohasta'] = false;
			}
		break;
		case "estamcolor":
			if (expresiones.tinta.test(e.target.value)) {
				document.getElementById('estampadoColor').classList.remove('parsley-error');
				document.getElementById('estampadoColorP').classList.remove('form_input-error-activo');
				campos['estamcolor'] = true;
			} else {
				document.getElementById('estampadoColor').classList.add('parsley-error');
				document.getElementById('estampadoColorP').classList.add('form_input-error-activo');
				campos['estamcolor'] = false;
			}
		break;
		case "plenumerocuerpos":
			if (expresiones.solonumeros.test(e.target.value)) {
				document.getElementById('numeroCuerpos').classList.remove('parsley-error');
				document.getElementById('numeroCuerposP').classList.remove('form_input-error-activo');
				campos['plenumerocuerpos'] = true;
			} else {
				document.getElementById('numeroCuerpos').classList.add('parsley-error');
				document.getElementById('numeroCuerposP').classList.add('form_input-error-activo');
				campos['plenumerocuerpos'] = false;
			}
		break;
		case "embolcantidad":
			if (expresiones.solonumeros.test(e.target.value)) {
				document.getElementById('embolsadoCantidad').classList.remove('parsley-error');
				document.getElementById('embolsadoCantidadP').classList.remove('form_input-error-activo');
				campos['embolcantidad'] = true;
			} else {
				document.getElementById('embolsadoCantidad').classList.add('parsley-error');
				document.getElementById('embolsadoCantidadP').classList.add('form_input-error-activo');
				campos['embolcantidad'] = false;
			}
		break;
		case "fajacantidad":
			if (expresiones.solonumeros.test(e.target.value)) {
				document.getElementById('fajadoCantidad').classList.remove('parsley-error');
				document.getElementById('fajadoCantidadP').classList.remove('form_input-error-activo');
				campos['fajacantidad'] = true;
			} else {
				document.getElementById('fajadoCantidad').classList.add('parsley-error');
				document.getElementById('fajadoCantidadP').classList.add('form_input-error-activo');
				campos['fajacantidad'] = false;
			}
		break;
		case "desbcantidad":
			if (expresiones.solonumeros.test(e.target.value)) {
				document.getElementById('desbasuradoCantidad').classList.remove('parsley-error');
				document.getElementById('desbasuradoCantidadP').classList.remove('form_input-error-activo');
				campos['desbcantidad'] = true;
			} else {
				document.getElementById('desbasuradoCantidad').classList.add('parsley-error');
				document.getElementById('desbasuradoCantidadP').classList.add('form_input-error-activo');
				campos['desbcantidad'] = false;
			}
		break;
	}
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);

});

function validarCamposVacios(){

	var tipocliente = $("#tipoCliente").val();
	var elegircliente = $("#elegirCliente").val();
	var elegirproducto = $("#elegirProducto").val();

	if (tipocliente == "" || elegircliente == "" || elegirproducto == "") {
		$("#alert_reg").removeClass("invisible");
		setTimeout(function(){
			$('#alert_reg').addClass("invisible");
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
		return false;	
	}
	if(campos.Pte_cantidad && campos.Pte_numeroPaginas && campos.Pte_tamañoAbierto && campos.Pte_tamañoCerrado && campos.Pte_diseñador && campos.Sus_tamañoPliego && campos.Sus_cantidadSustrato && campos.Sus_tamañoCorte && campos.Sus_tirajePedido && campos.Sus_porcentajeDesperdicio && campos.Pim_encargado && campos.Imp_formatoCorte && campos.Pli_tintaespecial && campos.Imp_encargado && campos.numeradodesde && campos.numeradohasta && campos.estamcolor && campos.plenumerocuerpos && campos.embolcantidad && campos.fajacantidad && campos.desbcantidad){
		return true;
	} else {
		$("#alert_reg").removeClass("invisible");
		setTimeout(function(){
			$('#alert_reg').addClass("invisible");
		}, 5000);
		return false;
	}
}