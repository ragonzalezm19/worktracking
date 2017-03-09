<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');
	
	require '../../../database/editar.php';

	$id          = $_POST['id'];
	$nombre      = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$editado     = date('Y-m-d H:i:s');

	editEntregable($id, $nombre, $descripcion, $editado);
	echo json_encode(0);