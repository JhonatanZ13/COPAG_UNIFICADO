//Elementos Formulario Maquina
const formulariov = document.getElementById('formulariov');
const inputsv = document.querySelectorAll('#formulariov input');
const select = document.querySelectorAll('#formulariov select');
const textarea = document.querySelectorAll('#formulariov textarea');

const actualizarMaquina = document.getElementById('actualziarMaquina');
const inputsActualizarMaquina = document.querySelectorAll('#actualziarMaquina input');
const selectActualizarMaquina = document.querySelectorAll('#actualziarMaquina select');
const textareaActualizarMaquina = document.querySelectorAll('#actualziarMaquina textarea');

//Elementos Formulario Articulo

const formularioArticulo = document.getElementById('formularioArticulo');
const inputsArticulo = document.querySelectorAll('#formularioArticulo input');
const selectArticulo = document.querySelectorAll('#formularioArticulo select');
const textareaArticulo = document.querySelectorAll('#formularioArticulo textarea');

const actualizarArticulo = document.getElementById('actualizarArticulo');
const inputsActualizarArticulo = document.querySelectorAll('#actualizarArticulo input');
const selectActualizarArticulo = document.querySelectorAll('#actualizarArticulo select');
const textareaActualizarArticulo = document.querySelectorAll('#actualizarArticulo textarea');

//Elementos Formulario herramienta

const formularioHerramienta = document.getElementById('formularioHerramienta');
const inputsHerramienta = document.querySelectorAll('#formularioHerramienta input');
const selectHerramienta = document.querySelectorAll('#formularioHerramienta select');
const textareaHerramienta = document.querySelectorAll('#formularioHerramienta textarea');

const actualizarHerramienta = document.getElementById('actualizarHerramienta');
const inputsActualizarHerramienta = document.querySelectorAll('#actualizarHerramienta input');
const selectActualizarHerramienta = document.querySelectorAll('#actualizarHerramienta select');
const textareaActualizarHerramienta = document.querySelectorAll('#actualizarHerramienta textarea');

//Elementos Formulario Empresa

const formularioEmpresa = document.getElementById('formularioEmpresa');
const inputsEmpresa = document.querySelectorAll('#formularioEmpresa input');
const selectEmpresa = document.querySelectorAll('#formularioEmpresa select');
const textareaEmpresa = document.querySelectorAll('#formularioEmpresa textarea');

const actualizarEmpresa = document.getElementById('actualizarEmpresa');
const inputsActualizarEmpresa = document.querySelectorAll('#actualizarEmpresa input');
const selectActualizarEmpresa = document.querySelectorAll('#actualizarEmpresa select');
const textareaActualizarEmpresa = document.querySelectorAll('#actualizarEmpresa textarea');


//Elementos Formulario Usuario

const formularioUsuario = document.getElementById('formularioUsuario');
const inputsUsuario = document.querySelectorAll('#formularioUsuario input');
const selectUsuario = document.querySelectorAll('#formularioUsuario select');
const textareaUsuario = document.querySelectorAll('#formularioUsuario textarea');

const actualizarUsuario = document.getElementById('actualizarUsuario');
const inputsActualizarUsuario = document.querySelectorAll('#actualizarUsuario input');
const selectActualizarUsuario = document.querySelectorAll('#actualizarUsuario select');
const textareaActualizarUsuario = document.querySelectorAll('#actualizarUsuario textarea');

const perfilUsuario = document.getElementById('perfilUsuario');
const inputPerfilUsuario = document.querySelectorAll('#perfilUsuario input');

//Elementos Formulario Login

const formularioLogin = document.getElementById('formularioLogin');
const inputsLogin = document.querySelectorAll('#formularioLogin input');

//variables de entorno

let ext;
let n;
let pdf = [];
let maquina = [];
let articulo = [];
let camposArticulos = [];
let camposEmpresa = [];
let camposMaquina = [];
let camposHerramienta = [];
let camposUsuario = [];
let contraseñaValida = [];

//expresiones validas

const expresioness = {
    nombresEspeciales: /^[a-zA-Z0-9\_\-\s]{1,40}$/, // Letras, numeros, guion y guion_bajo y espacio
    descripcion: /^[a-zA-ZÀ-ÿ0-9\_\-\()\.\:\,\s]{3,200}$/,
    razonSocial: /^[a-zA-ZÀ-ÿ0-9\_\-\.\s]{4,40}$/,
    serial: /^[a-zA-Z0-9\_\-]{4,40}$/, // Letras, numeros, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s]{3,40}$/,
    nombreOpcional: /^[a-zA-ZÀ-ÿ\s]{0,40}$/, // Letras y espacios, pueden llevar acentos.
    direccion: /^[a-zA-Z0-9\s\#\-]{1,45}$/,
    password: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    correosena: /^[a-zA-Z0-9_.+-]+@+sena+\.[a-zA-Z0-9-.]+$/,
    correosena2: /^[a-zA-Z0-9_.+-]+@+misena+\.[a-zA-Z0-9-.]+$/,
    telefono: /^[0-9]{7,14}$/, // 7 a 14 numeros.
    telefonoOpcional: /^[0-9]{0,14}$/,
    pdf: /pdf/,
    imagen: /[png-jpg][jpeg]/,
    estado: /true/,
    nit: /^[0-9\-\s]{8,12}$/
};

//Campos de validacion de Maquina

if (formulariov) {
    camposMaquina = {
        nombreMaquina: false,
        tipoMaquina: false,
        serial: false,
        descripcion: false,
        ficha: true,
        manual: true,
        imagenMaquina: true
    };
} else if (actualizarMaquina) {
    camposMaquina = {
        nombreMaquina: true,
        tipoMaquina: true,
        serial: true,
        descripcion: true,
        ficha: true,
        manual: true,
        imagenMaquina: true
    };
}

//Campos de validacion de Articulo

if (formularioArticulo) {
    camposArticulo = {
        nombreArticulo: false,
        tipoArticulo: false,
        tipoMedida: false,
        medida: false,
        descripcionArticulo: false,
        imagenArticulo: true
    };
} else if (actualizarArticulo) {
    camposArticulo = {
        nombreArticulo: true,
        tipoArticulo: true,
        tipoMedida: true,
        medida: true,
        descripcionArticulo: true,
        imagenArticulo: true
    };
}

//Campos de validacion de Herramienta

if (formularioHerramienta) {
    camposHerramienta = {
        nombreHerramienta: false,
        tipoHerramienta: false,
        descripcionHerramienta: false,
        imagenHerramienta: true
    };
} else if (actualizarHerramienta) {
    camposHerramienta = {
        nombreHerramienta: true,
        tipoHerramienta: true,
        descripcionHerramienta: true,
        imagenHerramienta: true
    };
}

//Campos de validacion de Empresa

if (formularioEmpresa) {
    camposEmpresa = {
        razonSocial: false,
        nit: false,
        emailEmpresa: false,
        direccionEmpresa: false,
        departamentoEmpresa: false,
        nombreContacto: false,
        apellidoContacto: false,
        tipoDocumentoContacto: false,
        numeroDocumentoContacto: false,
        primerNumeroContacto: false,
        segundoNumeroContacto: true,
        tipoEmpresa: false,
    };
} else if (actualizarEmpresa) {
    camposEmpresa = {
        razonSocial: true,
        nit: true,
        emailEmpresa: true,
        direccionEmpresa: true,
        departamentoEmpresa: true,
        nombreContacto: true,
        apellidoContacto: true,
        tipoDocumentoContacto: true,
        numeroDocumentoContacto: true,
        primerNumeroContacto: true,
        segundoNumeroContacto: true,
        tipoEmpresa: true,
    };
}

//Campos de validacion de Usuario

if (formularioUsuario) {
    camposUsuario = {
        primerNombreUsuario: false,
        segundoNombreUsuario: true,
        primerApellidoUsuario: false,
        segundoApellidoUsuario: false,
        tipoDocumentoUsuario: false,
        numeroDocumentoUsuario: false,
        telefonoUsuario: false,
        generoUsuario: false,
        emailUsuario: false,
        rolUsuario: false,
        areaUsuario: false,
    };
} else if (actualizarUsuario) {
    camposUsuario = {
        primerNombreUsuario: true,
        segundoNombreUsuario: true,
        primerApellidoUsuario: true,
        segundoApellidoUsuario: true,
        tipoDocumentoUsuario: true,
        numeroDocumentoUsuario: true,
        telefonoUsuario: true,
        generoUsuario: true,
        emailUsuario: true,
        rolUsuario: true,
        areaUsuario: true,
    };
}else if(perfilUsuario){
    camposUsuario = {
        primerNombreUsuario: true,
        segundoNombreUsuario: true,
        primerApellidoUsuario: true,
        segundoApellidoUsuario: true,
        tipoDocumentoUsuario: true,
        numeroDocumentoUsuario: true,
        telefonoUsuario: true,
        generoUsuario: true,
        emailUsuario: true,
        rolUsuario: true,
        areaUsuario: true,
        contraseñaNueva: true,
        contraseñaConfirmar: true,
        contraseñaVieja: true,
    };
}

const validarFormulariov = (e) => {
    if (formulariov || actualizarMaquina) {
        switch (e.target.name) {
            //Validaciones de MAQUINA ---------
            case "Maq_nombre":
                validarCampo(expresioness.nombresEspeciales, e.target, 'nombreMaquina', camposMaquina);
                break;
            case "Maq_serial":
                validarCampo(expresioness.serial, e.target, 'serial', camposMaquina);
                break;
            case "Maq_descripcion":
                validarCampo(expresioness.descripcion, e.target, 'descripcion', camposMaquina);
                break;
            case "Maq_fichaTecnica":
                ext = e.target.value.split('.');
                n = ext.length;
                pdf.value = ext[n - 1];
                validarCampo(expresioness.pdf, pdf, 'ficha', camposMaquina);
                break;
            case "Maq_manual":
                ext = e.target.value.split('.');
                n = ext.length;
                pdf = [];
                pdf.value = ext[n - 1];
                validarCampo(expresioness.pdf, pdf, 'manual', camposMaquina);
                break;
            case "Maq_imagen":
                ext = e.target.value.split('.');
                n = ext.length;
                pdf = [];
                pdf.value = ext[n - 1];
                validarCampo(expresioness.imagen, pdf, 'imagenMaquina', camposMaquina);
                break;
            case "Stg_id":
                if (e.target.value == "") {
                    maquina.value = false;
                } else {
                    maquina.value = true;
                }
                validarCampo(expresioness.estado, maquina, 'tipoMaquina', camposMaquina);
                break;
                //Aqui termina MAQUINA -------------
        }
    }
    if (formularioArticulo || actualizarArticulo) {
        switch (e.target.name) {
            //Validaciones de ARTICULO ----------
            case "Arti_nombre":
                validarCampo(expresioness.nombresEspeciales, e.target, 'nombreArticulo', camposArticulo);
                break;
            case "Tart_id":
                if (e.target.value == "") {
                    articulo.value = false;
                } else {
                    articulo.value = true;
                }
                validarCampo(expresioness.estado, articulo, 'tipoArticulo', camposArticulo);
                break;
            case "Arti_medida":
                validarCampo(expresioness.telefono, e.target, 'tipoMedida', camposArticulo);
                break;
            case "Med_id":
                if (e.target.value == "") {
                    articulo.value = false;
                } else {
                    articulo.value = true;
                    camposArticulo.medida = true;
                }
                validarCampo(expresioness.estado, articulo, 'tipoMedida', camposArticulo);
                break;
            case "Arti_descripcion":
                validarCampo(expresioness.descripcion, e.target, 'descripcionArticulo', camposArticulo);
                break;
            case "Arti_imagen":
                ext = e.target.value.split('.');
                n = ext.length;
                pdf = [];
                pdf.value = ext[n - 1];
                validarCampo(expresioness.imagen, pdf, 'imagenArticulo', camposArticulo);
                break;
                //Aqui termina ARTICULO -------------
        }
    }
    if (formularioHerramienta || actualizarHerramienta) {
        switch (e.target.name) {
            //Validaciones de Herramienta -------
            case "Her_nombre":
                validarCampo(expresioness.nombresEspeciales, e.target, 'nombreHerramienta', camposHerramienta);
                break;
            case 'Stg_id':
                if (e.target.value == "") {
                    maquina.value = false;
                } else {
                    maquina.value = true;
                }
                validarCampo(expresioness.estado, maquina, 'tipoHerramienta', camposHerramienta);
                break;
            case 'Her_descripcion':
                validarCampo(expresioness.descripcion, e.target, 'descripcionHerramienta', camposHerramienta);
                break;
            case 'Her_foto':
                ext = e.target.value.split('.');
                n = ext.length;
                pdf = [];
                pdf.value = ext[n - 1];
                validarCampo(expresioness.imagen, pdf, 'imagenHerramienta', camposHerramienta);
                break;
        }
    }
    if (formularioEmpresa || actualizarEmpresa) {
        switch (e.target.name) {
            case "Emp_razonSocial":
                validarCampo(expresioness.razonSocial, e.target, 'razonSocial', camposEmpresa);
                break;
            case "Emp_NIT":
                validarCampo(expresioness.nit, e.target, 'nit', camposEmpresa);
                break;
            case "Emp_email":
                validarCampo(expresioness.correo, e.target, 'emailEmpresa', camposEmpresa);
                break;
            case "Emp_direccion":
                validarCampo(expresioness.direccion, e.target, 'direccionEmpresa', camposEmpresa);
                break;
            case "Dep_id":
                if (e.target.value == "") {
                    maquina.value = false;
                } else {
                    maquina.value = true;
                }
                validarCampo(expresioness.estado, maquina, 'departamentoEmpresa', camposEmpresa);
                break;
            case "Emp_nombreContacto":
                validarCampo(expresioness.nombre, e.target, 'nombreContacto', camposEmpresa);
                break;
            case "Emp_apellidoContacto":
                validarCampo(expresioness.nombre, e.target, 'apellidoContacto', camposEmpresa);
                break;
            case "Stg_id":
                if (e.target.value == "") {
                    maquina.value = false;
                } else {
                    maquina.value = true;
                }
                validarCampo(expresioness.estado, maquina, 'tipoDocumentoContacto', camposEmpresa);
                break;
            case "Emp_numeroDocumento":
                validarCampo(expresioness.nit, e.target, 'numeroDocumentoContacto', camposEmpresa);
                break;
            case "Emp_primerNumeroContacto":
                validarCampo(expresioness.telefono, e.target, 'primerNumeroContacto', camposEmpresa);
                break;
            case "Emp_segundoNumeroContacto":
                validarCampo(expresioness.telefonoOpcional, e.target, 'segundoNumeroContacto', camposEmpresa);
                break;
            case "Tempr_id":
                if (e.target.value == "") {
                    maquina.value = false;
                } else {
                    maquina.value = true;
                }
                validarCampo(expresioness.estado, maquina, 'tipoEmpresa', camposEmpresa);
                break;
        }
    }
    if (formularioUsuario || actualizarUsuario || perfilUsuario) {
        switch (e.target.name) {
            case 'Usu_primerNombre':
                validarCampo(expresioness.nombre, e.target, 'primerNombreUsuario', camposUsuario);
                break;
            case 'Usu_segundoNombre':
                validarCampo(expresioness.nombreOpcional, e.target, 'segundoNombreUsuario', camposUsuario);
                break;
            case 'Usu_primerApellido':
                validarCampo(expresioness.nombre, e.target, 'primerApellidoUsuario', camposUsuario);
                break;
            case 'Usu_segundoApellido':
                validarCampo(expresioness.nombreOpcional, e.target, 'segundoApellidoUsuario', camposUsuario);
                break;
            case 'Stg_id':
                if (e.target.value == "") {
                    maquina.value = false;
                } else {
                    maquina.value = true;
                }
                validarCampo(expresioness.estado, maquina, 'tipoDocumentoUsuario', camposUsuario);
                break;
            case 'Usu_numeroDocumento':
                validarCampo(expresioness.nit, e.target, 'numeroDocumentoUsuario', camposUsuario);
                break;
            case 'Usu_telefono':
                validarCampo(expresioness.telefono, e.target, 'telefonoUsuario', camposUsuario);
                break;
            case 'Gen_id':
                if (e.target.value == "") {
                    maquina.value = false;
                } else {
                    maquina.value = true;
                }
                validarCampo(expresioness.estado, maquina, 'generoUsuario', camposUsuario);
                break;
            case 'Usu_email':
                validarEmail(expresioness.correosena2, expresioness.correosena, e.target, 'emailUsuario', camposUsuario);
                break;
            case 'Rol_id':
                if (e.target.value == "") {
                    maquina.value = false;
                } else {
                    maquina.value = true;
                }
                validarCampo(expresioness.estado, maquina, 'rolUsuario', camposUsuario);
                break;
            case 'Area_id':
                if (e.target.value == "") {
                    maquina.value = false;
                } else {
                    maquina.value = true;
                }
                validarCampo(expresioness.estado, maquina, 'areaUsuario', camposUsuario);
                break;
            case "Usu_passwordNew":
                contraseñaValida.value=validar_clave(e.target.value);
                validarCampo(expresioness.estado, contraseñaValida, 'contraseñaNueva', camposUsuario);
                if(e.target.value==""){
                    camposUsuario.contraseñaConfirmar=true;
                }else{
                    camposUsuario.contraseñaConfirmar=false;
                }
                validarPassword2();
                break;
            case "Usu_password":
                validarPassword2();
                if(e.target.value==""){
                    camposUsuario.contraseñaConfirmar=true;
                }else{
                    camposUsuario.contraseñaConfirmar=false;
                }
                break;
        }
    }
};

//Funcion para validar los campos de un formulario

const validarCampo = (expresion, input, campo, campos) => {
    if (expresion.test(input.value)) {
        document.getElementById(`grupo__${campo}`).classList.remove('formularioPanel__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formularioPanel__grupo-correcto');
        document.querySelector(`#grupo__${campo} .formularioPanel__input-error`).classList.remove('formularioPanel__input-error-activo');
        campos[campo] = true;
    } else {
        document.getElementById(`grupo__${campo}`).classList.add('formularioPanel__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formularioPanel__grupo-correcto');
        document.querySelector(`#grupo__${campo} .formularioPanel__input-error`).classList.add('formularioPanel__input-error-activo');
        campos[campo] = false;
    }
};

//Validar correo misena

const validarEmail = (expresion, expresion2, input, campo, campos) => {
    if (expresion.test(input.value) || expresion2.test(input.value)) {
        document.getElementById(`grupo__${campo}`).classList.remove('formularioPanel__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formularioPanel__grupo-correcto');
        document.querySelector(`#grupo__${campo} .formularioPanel__input-error`).classList.remove('formularioPanel__input-error-activo');
        campos[campo] = true;
    } else {
        document.getElementById(`grupo__${campo}`).classList.add('formularioPanel__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formularioPanel__grupo-correcto');
        document.querySelector(`#grupo__${campo} .formularioPanel__input-error`).classList.add('formularioPanel__input-error-activo');
        campos[campo] = false;
    }
};

//Validar Formato de contraseña

        function validar_clave(contrasenna)
		{
			if(contrasenna.length >= 8)
			{		
				var mayuscula = false;
				var minuscula = false;
				var numero = false;
				var caracter_raro = false;
				for(var i = 0;i<contrasenna.length;i++)
				{
					if(contrasenna.charCodeAt(i) >= 65 && contrasenna.charCodeAt(i) <= 90)
					{
						mayuscula = true;
					}
					else if(contrasenna.charCodeAt(i) >= 97 && contrasenna.charCodeAt(i) <= 122)
					{
						minuscula = true;
					}
					else if(contrasenna.charCodeAt(i) >= 48 && contrasenna.charCodeAt(i) <= 57)
					{
						numero = true;
					}
					else
					{
						caracter_raro = true;
					}
				}
				if(mayuscula == true && minuscula == true && caracter_raro == true && numero == true)
				{
					return true;
				}
			}else if(contrasenna==""){
                return true;
            }
            return false;
		        }

        const validarPassword2 = () => {
            const inputPassword1 = document.getElementById('Usu_passwordNew');
            const inputPassword2 = document.getElementById('Usu_password');
        
            if(inputPassword1.value == inputPassword2.value){
                document.getElementById(`Usu_password`).classList.remove('is-invalid');
                document.getElementById(`Usu_password`).classList.add('is-valid');
                camposUsuario['contraseñaConfirmar'] = true;
            } else {
                document.getElementById(`Usu_password`).classList.add('is-invalid');
                document.getElementById(`Usu_password`).classList.remove('is-valid');
                campos['contraseñaConfirmar'] = false;
            }
        }        

//Funcion para validar el formulario de Maquina

if (formulariov) {
    formulariov.addEventListener('submit', (e) => {
        e.preventDefault();
        if (camposMaquina.tipoMaquina && camposMaquina.imagenMaquina &&
            camposMaquina.ficha && camposMaquina.nombreMaquina &&
            camposMaquina.manual && camposMaquina.descripcion && camposMaquina.serial) {
            formulariov.submit();
        } else {
            document.getElementById('formularioPanel__mensaje').classList.add('formularioPanel__mensaje-activo');
        }
    });
}

if (actualizarMaquina) {
    actualizarMaquina.addEventListener('submit', (e) => {
        e.preventDefault();
        if (camposMaquina.tipoMaquina && camposMaquina.imagenMaquina &&
            camposMaquina.ficha && camposMaquina.nombreMaquina &&
            camposMaquina.manual && camposMaquina.descripcion && camposMaquina.serial) {
            swal({
                title: '¿Desea actualizar este Maquina?',
                text: 'Se guardaran todos los cambios que realizo',
                type: 'info',
                icon: 'info',
                buttons: {
                    confirm: {
                        text: 'Actualizar',
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
                    actualizarMaquina.submit();
                }
            });

        } else {
            document.getElementById('formularioPanel__mensaje').classList.add('formularioPanel__mensaje-activo');
        }
    });
}

//Funcion para validar el formulario de Articulo

if (formularioArticulo) {
    formularioArticulo.addEventListener('submit', (e) => {
        e.preventDefault();
        if (camposArticulo.descripcionArticulo && camposArticulo.nombreArticulo && camposArticulo.tipoArticulo && camposArticulo.tipoMedida && camposArticulo.medida && camposArticulo.imagenArticulo) {
            formularioArticulo.submit();
        } else {
            document.getElementById('formularioPanel__mensaje').classList.add('formularioPanel__mensaje-activo');
        }
    });
}

if (actualizarArticulo) {
    actualizarArticulo.addEventListener('submit', (e) => {
        e.preventDefault();
        if (camposArticulo.descripcionArticulo && camposArticulo.nombreArticulo && camposArticulo.tipoArticulo && camposArticulo.tipoMedida && camposArticulo.medida &&
            camposArticulo.imagenArticulo) {
            swal({
                title: '¿Desea actualizar este Articulo?',
                text: 'Se guardaran todos los cambios que realizo',
                type: 'info',
                icon: 'info',
                buttons: {
                    confirm: {
                        text: 'Actualizar',
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
                    actualizarArticulo.submit();
                }
            });
        } else {
            document.getElementById('formularioPanel__mensaje').classList.add('formularioPanel__mensaje-activo');
        }
    });
}

//Funcion para validar el formulario de Herramienta

if (formularioHerramienta) {
    formularioHerramienta.addEventListener('submit', (e) => {
        e.preventDefault();
        if (camposHerramienta.descripcionHerramienta && camposHerramienta.imagenHerramienta && camposHerramienta.nombreHerramienta && camposHerramienta.tipoHerramienta) {
            formularioHerramienta.submit();
        } else {
            document.getElementById('formularioPanel__mensaje').classList.add('formularioPanel__mensaje-activo');
        }
    });
}

if (actualizarHerramienta) {
    actualizarHerramienta.addEventListener('submit', (e) => {
        e.preventDefault();
        if (camposHerramienta.descripcionHerramienta && camposHerramienta.imagenHerramienta && camposHerramienta.nombreHerramienta && camposHerramienta.tipoHerramienta) {
            swal({
                title: '¿Desea actualizar este Herramienta?',
                text: 'Se guardaran todos los cambios que realizo',
                type: 'info',
                icon: 'info',
                buttons: {
                    confirm: {
                        text: 'Actualizar',
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
                    actualizarHerramienta.submit();
                }
            });

        } else {
            document.getElementById('formularioPanel__mensaje').classList.add('formularioPanel__mensaje-activo');
        }
    });
}

//Funcion para validar el formulario de Empresa

if (formularioEmpresa) {
    formularioEmpresa.addEventListener('submit', (e) => {
        e.preventDefault();
        if (camposEmpresa.departamentoEmpresa && camposEmpresa.nit && camposEmpresa.emailEmpresa && camposEmpresa.direccionEmpresa && camposEmpresa.tipoEmpresa && camposEmpresa.apellidoContacto &&
            camposEmpresa.nombreContacto && camposEmpresa.numeroDocumentoContacto && camposEmpresa.primerNumeroContacto && camposEmpresa.razonSocial &&
            camposEmpresa.segundoNumeroContacto && camposEmpresa.tipoDocumentoContacto) {
            formularioEmpresa.submit();
        } else {
            document.getElementById('formularioPanel__mensaje').classList.add('formularioPanel__mensaje-activo');
        }
    });
}

if (actualizarEmpresa) {
    actualizarEmpresa.addEventListener('submit', (e) => {
        e.preventDefault();
        if (camposEmpresa.departamentoEmpresa && camposEmpresa.nit && camposEmpresa.emailEmpresa && camposEmpresa.direccionEmpresa && camposEmpresa.tipoEmpresa && camposEmpresa.apellidoContacto &&
            camposEmpresa.nombreContacto && camposEmpresa.numeroDocumentoContacto && camposEmpresa.primerNumeroContacto && camposEmpresa.razonSocial &&
            camposEmpresa.segundoNumeroContacto && camposEmpresa.tipoDocumentoContacto) {
            swal({
                title: '¿Desea actualizar este Empresa?',
                text: 'Se guardaran todos los cambios que realizo',
                type: 'info',
                icon: 'info',
                buttons: {
                    confirm: {
                        text: 'Actualizar',
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
                    actualizarEmpresa.submit();
                }
            });

        } else {
            document.getElementById('formularioPanel__mensaje').classList.add('formularioPanel__mensaje-activo');
        }
    });
}

//Funcion para validar el formulario de Empresa

if (formularioUsuario) {
    formularioUsuario.addEventListener('submit', (e) => {
        e.preventDefault();
        if (camposUsuario.primerNombreUsuario &&
            camposUsuario.primerApellidoUsuario &&
            camposUsuario.segundoApellidoUsuario &&
            camposUsuario.tipoDocumentoUsuario &&
            camposUsuario.numeroDocumentoUsuario &&
            camposUsuario.telefonoUsuario &&
            camposUsuario.generoUsuario &&
            camposUsuario.emailUsuario &&
            camposUsuario.rolUsuario &&
            camposUsuario.areaUsuario) {
            formularioUsuario.submit();
        } else {
            document.getElementById('formularioPanel__mensaje').classList.add('formularioPanel__mensaje-activo');
            console.log(camposUsuario);
        }
    });
}

if (actualizarUsuario) {
    actualizarUsuario.addEventListener('submit', (e) => {
        e.preventDefault();
        if (camposUsuario.primerNombreUsuario &&
            camposUsuario.primerApellidoUsuario &&
            camposUsuario.segundoApellidoUsuario &&
            camposUsuario.tipoDocumentoUsuario &&
            camposUsuario.numeroDocumentoUsuario &&
            camposUsuario.telefonoUsuario &&
            camposUsuario.generoUsuario &&
            camposUsuario.emailUsuario &&
            camposUsuario.rolUsuario &&
            camposUsuario.areaUsuario) {
            swal({
                title: '¿Desea actualizar este Usuario?',
                text: 'Se guardaran todos los cambios que realizo',
                type: 'info',
                icon: 'info',
                buttons: {
                    confirm: {
                        text: 'Actualizar',
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
                    actualizarUsuario.submit();
                }
            });

        } else {
            document.getElementById('formularioPanel__mensaje').classList.add('formularioPanel__mensaje-activo');
        }
    });
}

if (perfilUsuario) {
    perfilUsuario.addEventListener('submit', (e) => {
        e.preventDefault();
        const inputContraseña = document.querySelectorAll('#contraseñaConfirmar');
        const inputContraseña2 = document.querySelectorAll('#contraseñaAnterior');
        if(camposUsuario.contraseñaConfirmar==false){
            if(inputContraseña2[0].value==inputContraseña[0].value){
                camposUsuario.contraseñaConfirmar=true;
                document.getElementById(`grupo__contraseñaAnterior`).classList.remove('formularioPanel__grupo-incorrecto');
                document.getElementById(`grupo__contraseñaAnterior`).classList.add('formularioPanel__grupo-correcto');
                document.querySelector(`#grupo__contraseñaAnterior .formularioPanel__input-error`).classList.remove('formularioPanel__input-error-activo');
            }else{
                document.getElementById(`grupo__contraseñaAnterior`).classList.add('formularioPanel__grupo-incorrecto');
                document.getElementById(`grupo__contraseñaAnterior`).classList.remove('formularioPanel__grupo-correcto');
                document.querySelector(`#grupo__contraseñaAnterior .formularioPanel__input-error`).classList.add('formularioPanel__input-error-activo');
                camposUsuario.contraseñaConfirmar=false;
            }
        }else{
            camposUsuario.contraseñaConfirmar=true;
        }
        if (camposUsuario.primerNombreUsuario &&
            camposUsuario.primerApellidoUsuario &&
            camposUsuario.segundoApellidoUsuario &&
            camposUsuario.tipoDocumentoUsuario &&
            camposUsuario.numeroDocumentoUsuario &&
            camposUsuario.telefonoUsuario &&
            camposUsuario.generoUsuario &&
            camposUsuario.emailUsuario &&
            camposUsuario.rolUsuario &&
            camposUsuario.areaUsuario &&
            camposUsuario.contraseñaConfirmar &&
            camposUsuario.contraseñaVieja &&
            camposUsuario.contraseñaNueva) {

                perfilUsuario.submit();

        } else {
            document.getElementById('formularioPanel__mensaje').classList.add('formularioPanel__mensaje-activo');
        }
    });
}

//Escuchadores de los campos del formulario Maquina

textarea.forEach((text) => {
    text.addEventListener('keyup', validarFormulariov);

});

select.forEach((e) => {
    e.addEventListener('change', validarFormulariov);
});

inputsv.forEach((input) => {
    input.addEventListener('keyup', validarFormulariov);
    input.addEventListener('change', validarFormulariov);
});

//Escuchadores de los campos de Actualizar Maquina

textareaActualizarMaquina.forEach((text) => {
    text.addEventListener('keyup', validarFormulariov);

});

selectActualizarMaquina.forEach((e) => {
    e.addEventListener('change', validarFormulariov);
});

inputsActualizarMaquina.forEach((input) => {
    input.addEventListener('keyup', validarFormulariov);
    input.addEventListener('change', validarFormulariov);
});

//Escuchadores de los campos del formulario Articulo

textareaArticulo.forEach((text) => {
    text.addEventListener('keyup', validarFormulariov);

});

selectArticulo.forEach((e) => {
    e.addEventListener('change', validarFormulariov);
});

inputsArticulo.forEach((input) => {
    input.addEventListener('keyup', validarFormulariov);
    input.addEventListener('change', validarFormulariov);
});

//Escuchadores de los campos del Actualizar Articulo

textareaActualizarArticulo.forEach((text) => {
    text.addEventListener('keyup', validarFormulariov);

});

selectActualizarArticulo.forEach((e) => {
    e.addEventListener('change', validarFormulariov);
});

inputsActualizarArticulo.forEach((input) => {
    input.addEventListener('keyup', validarFormulariov);
    input.addEventListener('change', validarFormulariov);
});

//Escuchadores de los campos del formulario Herramienta

textareaHerramienta.forEach((text) => {
    text.addEventListener('keyup', validarFormulariov);

});

selectHerramienta.forEach((e) => {
    e.addEventListener('change', validarFormulariov);
});

inputsHerramienta.forEach((input) => {
    input.addEventListener('keyup', validarFormulariov);
    input.addEventListener('change', validarFormulariov);
});

//Escuchadores de los campos del Actualizar Herramienta

textareaActualizarHerramienta.forEach((text) => {
    text.addEventListener('keyup', validarFormulariov);

});

selectActualizarHerramienta.forEach((e) => {
    e.addEventListener('change', validarFormulariov);
});

inputsActualizarHerramienta.forEach((input) => {
    input.addEventListener('keyup', validarFormulariov);
    input.addEventListener('change', validarFormulariov);
});

//Escuchadores de los campos del formulario Empresa

textareaEmpresa.forEach((text) => {
    text.addEventListener('keyup', validarFormulariov);

});

selectEmpresa.forEach((e) => {
    e.addEventListener('change', validarFormulariov);
});

inputsEmpresa.forEach((input) => {
    input.addEventListener('keyup', validarFormulariov);
    input.addEventListener('change', validarFormulariov);
});

//Escuchadores de los campos del Actualizar Empresa

textareaActualizarEmpresa.forEach((text) => {
    text.addEventListener('keyup', validarFormulariov);

});

selectActualizarEmpresa.forEach((e) => {
    e.addEventListener('change', validarFormulariov);
});

inputsActualizarEmpresa.forEach((input) => {
    input.addEventListener('keyup', validarFormulariov);
    input.addEventListener('change', validarFormulariov);
});

//Escuchadores de los campos del formulario Usuario

textareaUsuario.forEach((text) => {
    text.addEventListener('keyup', validarFormulariov);

});

selectUsuario.forEach((e) => {
    e.addEventListener('change', validarFormulariov);
});

inputsUsuario.forEach((input) => {
    input.addEventListener('keyup', validarFormulariov);
    input.addEventListener('change', validarFormulariov);
});

//Escuchadores de los campos del Actualizar Usuario

textareaActualizarUsuario.forEach((text) => {
    text.addEventListener('keyup', validarFormulariov);

});

selectActualizarUsuario.forEach((e) => {
    e.addEventListener('change', validarFormulariov);
});

inputsActualizarUsuario.forEach((input) => {
    input.addEventListener('keyup', validarFormulariov);
    input.addEventListener('change', validarFormulariov);
});

inputPerfilUsuario.forEach((input) => {
    input.addEventListener('keyup', validarFormulariov);
});