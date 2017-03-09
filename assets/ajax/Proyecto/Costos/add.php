<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/insertar.php';

	$costo_real   = $_POST['costo_real'];
	$fecha        = $_POST['fecha'];
	$actividad_id = $_POST['actividad'];
	$proyecto_id  = $_POST['proyecto'];
	$creado       = date('Y-m-d H:i:s');
	$editado      = date('Y-m-d H:i:s');

	addCosto($costo_real, $fecha, $actividad_id, $proyecto_id ,$creado, $editado);
	echo json_encode(0);