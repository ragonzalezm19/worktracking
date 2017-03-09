function Validacion(){
	var flag = 0;
	/* Requeridos */
		var requeridos = [
			$('#pre-rif').val(),
			$('#rif').val(),
			$('#nombre').val(),
			$('#direccion').val(),
			$('#pre-telefono').val(),
			$('#telefono').val(),
			$('#usuario').val(),
			$('#correo').val(),
			$('#clave').val(),
			$('#confirmar_clave').val(),
			$('#ing_e_nombre').val(),
			$('#ing_e_apellido').val(),
			$('#pre-ing_e_cedula').val(),
			$('#ing_e_cedula').val(),
			$('#ing_e_correo').val(),
			$('#pre-ing_e_telefono').val(),
			$('#ing_e_telefono').val(),
			
		]
	requeridos.forEach(function(entry){
		if (entry == '') {
			flag++;
		};
	});
	if (flag > 0) {
		ShowErrorRequisito();
		return false;
	}else{
		return ValidacionClaveLargo($('#clave').val(), $('#confirmar_clave').val());
	};
}

function ValidacionClaveLargo(clave, confirmacion){
	if (clave.length < 4){
		ShowErrorCaracteres();
		return false;
	}else{
		return ValidacionDeClaves(clave, confirmacion);
	}
}

function ValidacionDeClaves(clave, confirmacion){
	if (clave != confirmacion){
		ShowErrorConfirmacion();
		return false;
	}else{
		return true
	}
}

function ShowErrorRequisito(){
	$('.errorHandlerRequisito').removeClass('no-display');
	$('.errorHandlerCaracteres').addClass('no-display');
	$('.errorHandlerConfirmacion').addClass('no-display');
}

function ShowErrorCaracteres(){
	$('.errorHandlerRequisito').addClass('no-display');
	$('.errorHandlerCaracteres').removeClass('no-display');
	$('.errorHandlerConfirmacion').addClass('no-display');
}

function ShowErrorConfirmacion(){
	$('.errorHandlerRequisito').addClass('no-display');
	$('.errorHandlerCaracteres').addClass('no-display');
	$('.errorHandlerConfirmacion').removeClass('no-display');
}

function ValidacionEditar(){
	var flag = 0;
	/* Requeridos */
		var requeridos = [
			$('#pre-rif_e').val(),
			$('#rif_e').val(),
			$('#nombre_e').val(),
			$('#direccion_e').val(),
			$('#pre-telefono_e').val(),
			$('#telefono_e').val(),
			$('#usuario_e').val(),
			$('#correo_e').val(),
			$('#ing_e_nombre_e').val(),
			$('#ing_e_apellido_e').val(),
			$('#pre-ing_e_cedula_e').val(),
			$('#ing_e_cedula_e').val(),
			$('#ing_e_correo_e').val(),
			$('#pre-ing_e_telefono_e').val(),
			$('#ing_e_telefono_e').val(),
		]
	requeridos.forEach(function(entry){
		if (entry == '') {
			flag++;
		};
	});
	if (flag > 0) {
		ShowErrorRequisitoEdit();
		return false;
	}else{
		if ($('#clave_e').val() == ''){
			return true;
		}else{
			return ValidacionClaveLargoEdit($('#clave_e').val());
		}
	};
}

function ValidacionClaveLargoEdit(clave){
	if (clave.length < 4){
		ShowErrorCaracteresEdit();
		return false;
	}else{
		return true;
	}
}


function ShowErrorRequisitoEdit(){
	$('.errorHandlerRequisito_e').removeClass('no-display');
	$('.errorHandlerCaracteres_e').addClass('no-display');
}

function ShowErrorCaracteresEdit(){
	$('.errorHandlerRequisito_e').addClass('no-display');
	$('.errorHandlerCaracteres_e').removeClass('no-display');
}