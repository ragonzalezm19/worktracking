<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/insertar.php';

	$nombre      = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$abreviatura = $_POST['abreviatura'];
	$creado      = date('Y-m-d H:i:s');
	$editado     = date('Y-m-d H:i:s');

	addCondicion($nombre, $descripcion, $abreviatura, $creado, $editado);
	echo json_encode(0);