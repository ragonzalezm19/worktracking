<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');
	
	require '../../../database/insertar.php';

	$nombre      = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$creado      = date('Y-m-d H:i:s');
	$editado     = date('Y-m-d H:i:s');

	addEntregable($nombre, $descripcion, $creado, $editado);
	echo json_encode(0);