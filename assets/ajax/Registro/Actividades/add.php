<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/insertar.php';

	$nombre       = $_POST['nombre'];
	$descripcion  = $_POST['descripcion'];
	$condicion_id    = $_POST['condicion_id'];
	$escala_id       = $_POST['escala_id'];
	$entrega_id      = $_POST['entrega_id'];
	$especialidad_id = $_POST['especialidad_id'];
	$creado       = date('Y-m-d H:i:s');
	$editado      = date('Y-m-d H:i:s');

	addActividad($nombre, $descripcion, $condicion_id ,$escala_id, $entrega_id, $especialidad_id, $creado, $editado);
	echo json_encode(0);