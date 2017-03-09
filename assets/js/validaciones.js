var error = "si";
var resultado;

$( document ).ready(function() {
	$('#btnRegistro').prop( "disabled", true );
	$('#btnContactenos').prop( "disabled", true );
	$('#btnVerificador').prop( "disabled", true );
	$('#resultado').val("");

	generarOperacion();
});

function camposVaciosRegistro () {
	var nombre = document.getElementById('nombref');
	var apellido = document.getElementById('apellidof');
	var cedula = document.getElementById('cedulaf');
	var correo = document.getElementById('correof');
	var password = document.getElementById('contraseñaf');
	var rpassword = document.getElementById('rcontraseñaf');
	var cnombre = $('#nombref').css("color");
	var capellido = $('#apellidof').css("color");
	var ccedula = $('#cedulaf').css("color");
	var ccorreo = $('#correof').css("color");
	var cpassword = $('#contraseñaf').css("color");
	var crpassword = $('#rcontraseñaf').css("color");

	if ((nombre.value == "")||(apellido.value == "")||(cedula.value == "")||(correo.value == "")||(password.value == "")||(rpassword.value == "")||(cnombre == "rgb(255, 0, 0)")||(capellido == "rgb(255, 0, 0)")||(ccedula == "rgb(255, 0, 0)")||(ccorreo == "rgb(255, 0, 0)")||(cpassword == "rgb(255, 0, 0)")||(crpassword == "rgb(255, 0, 0)")) {
		$('#btnRegistro').prop( "disabled", true );
		// $('#aviso').attr("id","aviso1");
		// var c = $('#errores').attr('class');
		// var b = c.split(' ');
		// if (b.find("alert-success")) {
		// 	$('#errores').removeAttr("class");
		// 	$('#errores').attr("class","alert alert-warning text-center error");
		// };
		// $('#errores').html("Debe <strong>Llenar</strong> todos los campos para <strong>Poder enviar la informacion.</strong>");
		//console.log("nombre: "+nombre.value+" apellido:"+apellido.value+" cedula:"+cedula.value+" correo:"+correo.value+" pass:"+password.value+" rpass:"+rpassword.value);
		desactivarVerificador();
	}else{
		activarVerificador();
		// $('#aviso').attr("id","aviso1");
		//$('#btnRegistro').prop( "disabled", false );
		// $('#errores').removeAttr("class");
		// $('#errores').attr("class","alert alert-success text-center error");
		// $('#errores').html("<strong>Ya puedes enviar el Registro</strong>");
		//console.log("nombre: "+nombre.value+" apellido:"+apellido.value+" cedula:"+cedula.value+" correo:"+correo.value+" pass:"+password.value+" rpass:"+rpassword.value);

	};
}

function camposAlfanumericos(valor,id) {
	var expreg = new RegExp("^[a-zA-Z]+$");
	if(expreg.test(valor) || (valor.length == 0)){
	    $('#'+id).css("color","#5cb85c");
		$('#errores').html("");
		// camposVaciosRegistro();
	}else{
	    $('#'+id).css("color","#FF0000");
		$('#aviso').attr("id","aviso1");
		$('#errores').html("Campos <strong>Alfanumericos</strong> con valores <strong>No Alfanumericos</strong>");
		$('#btnRegistro').prop( "disabled", true );
	}
}

function caracteresMaximos(){
	var numero_maximo = 50;
	var num_caracteres = document.getElementById('comentario').value.length;

	if (num_caracteres > numero_maximo) {
		$('#comentario').css("color","#FF0000");
		$('#aviso').attr("id","aviso1");
		$('#errores').html("La maxima cantidad de Caracteres para el Campo <strong>Comentario</strong> es de <strong>"+numero_maximo+"</strong>");
		//document.getElementById('aviso').style.removeProperty("display");
	}else{
		$('#comentario').css("color","#555");
		$('#aviso1').attr("id","aviso");
		$('#errores').html("");
	}
}

function soloNumeros(valor,id){
	var expreg = new RegExp("^(E|e|V|v)-([0-9]{1,})$");
	if(expreg.test(valor) || (valor.length == 0)){
	    $('#'+id).css("color","#5cb85c");
		$('#aviso1').attr("id","aviso");
		$('#errores').html("");
		// camposVaciosRegistro();
	}else{
	    $('#'+id).css("color","#FF0000");
		$('#aviso').attr("id","aviso1");
		$('#errores').html("<strong>Mal Formato</strong> para el campo <strong>Cedula</strong>. <br> Ejemplos: V-123455678");
		$('#btnRegistro').prop( "disabled", true );
	}
}

function passwordMinimo(){
	var password = document.getElementById('contraseñaf').value;

	if (password.length < 6) {
		$('#contraseñaf').css("color","#FF0000");
		$('#aviso').attr("id","aviso1");
		$('#errores').html("La <strong>Contraseña</strong> debe de ser de un minimo de <strong>6 Caracteres</strong>");
		$('#btnRegistro').prop( "disabled", true );
	}else{
		$('#contraseñaf').css("color","#5cb85c");
		$('#aviso1').attr("id","aviso");
		$('#errores').html("");
		// camposVaciosRegistro();
	}
}

function habilitarRP(){
	var password = document.getElementById('contraseñaf').value;
	if (password.length >= 6) {
		$('#rcontraseñaf').prop( "disabled", false );
	}else{
		$('#rcontraseñaf').prop( "disabled", true );
	}
}

function repetirPassword(){
	var password = document.getElementById('contraseñaf').value;
	var rpassword = document.getElementById('rcontraseñaf').value;

	if (password != rpassword) {
		$('#rcontraseñaf').css("color","#FF0000");
		$('#aviso').attr("id","aviso1");
		$('#errores').html("Las <strong>Contraseñas</strong> debe ser <strong>Iguales</strong>");
		$('#btnRegistro').prop( "disabled", true );
	}else{
		$('#rcontraseñaf').css("color","#5cb85c");
		$('#aviso1').attr("id","aviso");
		$('#errores').html("");
		//camposVaciosRegistro();
	}
}

function validarCorreo(valor,id){
	var expreg = new RegExp("^([a-z0-9]+([_a-z0-9-.]+)*@([a-z0-9-]+)\.([a-z]{2,3}))$");
	//var correo = document.getElementById('correof').value;
	if(expreg.test(valor) || (valor.length == 0)){
	    $('#'+id).css("color","#5cb85c");
		$('#aviso1').attr("id","aviso");
		$('#errores').html("");
		// camposVaciosRegistro();
	}else{
	    $('#'+id).css("color","#FF0000");
		$('#aviso').attr("id","aviso1");
		$('#errores').html("<strong>Mal</strong> formato del Campo <strong>Correo.</strong> <br> Ejemplo: algo@correo.com");
		$('#btnRegistro').prop( "disabled", true );
		$('#btnContactenos').prop( "disabled", true );
	}
}

function cambiarColor(id){
	//
	$('#'+id).css("color","#555");
}

function camposVaciosContactenos () {
	var asunto = document.getElementById('asunto');
	var correo = document.getElementById('correoContactenos');
	var comentario = document.getElementById('comentario');
	var numero_maximo = 5;
	var num_caracteres = document.getElementById('comentario').value.length;
	
	if ((asunto.value == "")||(correo.value == "")||(comentario.value == "")||(num_caracteres > numero_maximo)) {
		$('#btnContactenos').prop( "disabled", true );
	}else{
		$('#btnContactenos').prop( "disabled", false );
	};
}

function campoAsunto(){
	var asunto = document.getElementById('asunto').value;
	if (asunto == "") {
		 $('#asunto').css("color","#FF0000");
		$('#aviso').attr("id","aviso1");
		$('#errores').html("Campo <strong>Asunto</strong> no puede estar <strong>Vacio.</strong>");
		$('#btnRegistro').prop( "disabled", true );
		$('#btnContactenos').prop( "disabled", true );
	}else{
		$('#asunto').css("color","#5cb85c");
		$('#aviso1').attr("id","aviso");
		$('#errores').html("");
	}
}

function campoComentario(){
	var comentario = document.getElementById('comentario').value;
	if (comentario == "") {
		$('#comentario').css("color","#FF0000");
		$('#aviso').attr("id","aviso1");
		$('#errores').html("Campo <strong>Asunto</strong> no puede estar <strong>Vacio.</strong>");
		$('#btnRegistro').prop( "disabled", true );
		$('#btnContactenos').prop( "disabled", true );
	}else{
		$('#comentario').css("color","#5cb85c");
		$('#aviso1').attr("id","aviso");
		$('#errores').html("");
	}
}

function activarVerificador(){
	$("#verificador").attr("id","verificador_");
	//
}

function desactivarVerificador(){
	$("#verificador_").attr("id","verificador");
	//
}

function generarOperacion(){
	var operadores = ["+","-","X"];
	var num1 = Math.floor((Math.random() * 50) + 1);
	var num2 = Math.floor((Math.random() * 50) + 1);
	var op = Math.floor((Math.random() * 3));
	
	switch(op) {
	    case 0:
	        respuesta = num1 + num2;
	        document.getElementById('valor1').innerHTML = num1;
	        document.getElementById('operacion').innerHTML = operadores[op];
	        document.getElementById('valor2').innerHTML = num2;
	        console.log("Resultado: "+respuesta);
	        document.getElementById('resultado_').value = respuesta;
	        break;
	    case 1:
	        respuesta = num1 - num2;
	        document.getElementById('valor1').innerHTML = num1;
	        document.getElementById('operacion').innerHTML = operadores[op];
	        document.getElementById('valor2').innerHTML = num2;
	        console.log("Resultado: "+respuesta);
	        document.getElementById('resultado_').value = respuesta;
	        break;
	    case 2:
	        respuesta = num1 * num2;
	        document.getElementById('valor1').innerHTML = num1;
	        document.getElementById('operacion').innerHTML = operadores[op];
	        document.getElementById('valor2').innerHTML = num2;
	        console.log("Resultado: "+respuesta);
	        document.getElementById('resultado_').value = respuesta;
	        break;
	} 
}

function habilitarVerificador(){
	var r = document.getElementById('resultado').value;
	if (r == "") {
		$('#btnVerificador').prop( "disabled", true );
	}else{
		$('#btnVerificador').prop( "disabled", false );
	};
}

function verificarOperacion(){
	var r = document.getElementById('resultado').value;
	var r_ = document.getElementById('resultado_').value;
	console.log("r: "+r+" "+typeof(parseInt(r)));
	if (parseInt(r) == parseInt(r_)) {
		$('#verificadorAviso').removeAttr("class");
		$('#verificadorAviso').attr("class","alert alert-success text-center error");
		$('#verificadorAviso').html("<strong>Felicitaciones, sabes Matematica Basica.</strong>");
		$('#resultado').prop( "disabled", true );
		$('#btnVerificador').prop( "disabled", true );
		$('#btnRegistro').prop( "disabled", false );
	}else{
		$('#verificadorAviso').removeAttr("class");
		$('#verificadorAviso').attr("class","alert alert-danger text-center error");
		$('#verificadorAviso').html("<strong>Alguien tiene que volver a primaria :/.</strong>");
		$('#resultado').prop( "disabled", true );
		$('#btnVerificador').removeAttr("class");
		$('#btnVerificador').attr("class","btn btn-info");
		$('#btnVerificador').removeAttr("onclick");
		$('#btnVerificador').attr("onclick","reintentarOperacion()")
		$('#btnVerificador').html("Reintentar");
		$('#btnRegistro').prop( "disabled", true );
	};
}

function reintentarOperacion(){
	generarOperacion();

	$('#resultado').val("");
	$('#verificadorAviso').removeAttr("class");
	$('#verificadorAviso').attr("class","alert alert-info text-center error");
	$('#verificadorAviso').html("Otra <strong>Oportunidad.</strong>");
	$('#btnVerificador').removeAttr("class");
	$('#btnVerificador').attr("class","btn btn-success");
	$('#btnVerificador').removeAttr("onclick");
	$('#btnVerificador').attr("onclick","verificarOperacion()")
	$('#btnVerificador').html("Verificar");
}