<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/insertar.php';

	$nombre      = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$desde       = $_POST['desde'];
	$hasta     = $_POST['hasta'];
	$abreviatura = $_POST['abreviatura'];
	$creado      = date('Y-m-d H:i:s');
	$editado     = date('Y-m-d H:i:s');

	addEscala($nombre, $descripcion, $desde, $hasta, $abreviatura, $creado, $editado);
	echo json_encode(0);