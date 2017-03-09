<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');
	
	require '../../../database/insertar.php';

	$nombre      = $_POST['nombre'];
	$abreviatura = $_POST['abreviatura'];
	$cantidad    = $_POST['cantidad'];
	$costo       = $_POST['costo'];
	$creado      = date('Y-m-d H:i:s');
	$editado     = date('Y-m-d H:i:s');

	addRecursoMaterial($nombre, $abreviatura, $cantidad, $costo, $creado, $editado);
	echo json_encode(0);