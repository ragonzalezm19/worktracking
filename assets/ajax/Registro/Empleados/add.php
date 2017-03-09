<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/insertar.php';

	$nombre       = $_POST['nombre'];
	$apellido  = $_POST['apellido'];
	$cedula    = $_POST['cedula'];
	$telefono       = $_POST['telefono'];
	$correo      = $_POST['correo'];
	$profesion_id = $_POST['profesion_id'];
	$especialidad_id = $_POST['especialidad_id'];
	$creado       = date('Y-m-d H:i:s');
	$editado      = date('Y-m-d H:i:s');

	addIngeniero($nombre, $apellido, $cedula ,$telefono, $correo, $profesion_id, $especialidad_id, $creado, $editado);
	echo json_encode(0);