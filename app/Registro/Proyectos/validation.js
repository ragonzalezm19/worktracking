function Validacion(){
	var flag = 0;
	/* Requeridos */
		var requeridos = [
			$('#nombre').val(),
			$('#descripcion').val(),
			$('#costo').val(),
			$('#cliente').val(),
			$('#fecha').val(),
			$('#personal-asignado').val()
		]
	requeridos.forEach(function(entry){
		if (entry == '') {
			flag++;
		};
	});
	if (flag > 0) {
		return false;
	}else{
		return true;
	};
}

function ShowError(){
	$('.errorHandler').removeClass('no-display');
}

function ValidacionEditar(){
	var flag = 0;
	/* Requeridos */
		var requeridos = [
			$('#nombre_e').val(),
			$('#descripcion_e').val(),
			$('#costo_e').val(),
			$('#cliente_e').val(),
			$('#personal-asignado_e').val(),
			$('#etapa-del-proyecto_e').val()
		]
	requeridos.forEach(function(entry){
		if (entry == '') {
			flag++;
		};
	});
	if (flag > 0) {
		return false;
	}else{
		return true;
	};
}

function ShowErrorEdit(){
	$('.errorHandler_e').removeClass('no-display');
}