<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');
	
	require '../../../database/editar.php';

	$id          = $_POST['id'];
	$nombre      = $_POST['nombre'];
	$abreviatura = $_POST['abreviatura'];
	$cantidad    = $_POST['cantidad'];
	$costo       = $_POST['costo'];
	$editado     = date('Y-m-d H:i:s');

	editRecursoMaterial($id, $nombre, $abreviatura, $cantidad, $costo, $editado);
	echo json_encode(0);