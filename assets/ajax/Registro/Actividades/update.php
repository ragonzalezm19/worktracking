<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');
	
	require '../../../database/editar.php';

	$id              = $_POST['id'];
	$nombre          = $_POST['nombre'];
	$descripcion     = $_POST['descripcion'];
	$condicion_id    = $_POST['condicion'];
	$escala_id       = $_POST['escala'];
	$entrega_id      = $_POST['entrega'];
	$especialidad_id = $_POST['especialidad'];
	$editado         = date('Y-m-d H:i:s');

	editActividad($id, $nombre, $descripcion, $condicion_id, $escala_id, $entrega_id, $especialidad_id, $editado);
	echo json_encode(0);