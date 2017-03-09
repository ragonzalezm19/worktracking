<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');
	
	require '../../../database/editar.php';

	$id          = $_POST['id'];
	$nombre      = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$desde       = $_POST['desde'];
	$hasta       = $_POST['hasta'];
	$abreviatura = $_POST['abreviatura'];
	$editado     = date('Y-m-d H:i:s');

	editEscala($id, $nombre, $descripcion, $desde, $hasta, $abreviatura, $editado);
	echo json_encode(0);