<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/insertar.php';

	$nombre                = $_POST['nombre'];
	$apellido              = $_POST['apellido'];
	$cedula                = $_POST['pre-cedula'].'-'.$_POST['cedula'];
	$direccion             = $_POST['direccion'];
	$telefono              = $_POST['pre-telefono'].'-'.$_POST['telefono'];
	$correo                = $_POST['correo'];
	$profesion_id          = $_POST['profesion_id'];
	$honorario             = $_POST['honorario'];
	$numero_de_colegiatura = $_POST['numero-de-colegiatura'];
	$clave                 = Hash('SHA1', $_POST['clave']);
	$usuario               = strtoupper($_POST['usuario']);
	$rol_id                = $_POST['rol_id'];
	$creado                = date('Y-m-d H:i:s');
	$editado               = date('Y-m-d H:i:s');

	addRecursoHumano($nombre, $apellido, $cedula, $direccion, $telefono, $correo, $numero_de_colegiatura, $profesion_id, $honorario, $clave, $usuario, $rol_id, $creado, $editado);
	echo json_encode(0);