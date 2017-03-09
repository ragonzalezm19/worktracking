function Validacion(){
	var flag = 0;
	/* Requeridos */
		var requeridos = [
			$('#nombre').val(),
			$('#fecha').val()
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
			$('#fecha_e').val()
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