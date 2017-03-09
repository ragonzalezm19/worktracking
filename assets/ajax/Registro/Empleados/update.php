<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');
	
	require '../../../database/editar.php';

	$id              = $_POST['id'];
	$nombre          = $_POST['nombre'];
	$apellido        = $_POST['apellido'];
	$cedula          = $_POST['cedula'];
	$telefono        = $_POST['telefono'];
	$correo          = $_POST['correo'];
	$profesion_id    = $_POST['profesion'];
	$especialidad_id = $_POST['especialidad'];
	$editado         = date('Y-m-d H:i:s');

	editIngeniero($id, $nombre, $apellido, $cedula, $telefono, $correo, $profesion_id, $especialidad_id, $editado);
	echo json_encode(0);