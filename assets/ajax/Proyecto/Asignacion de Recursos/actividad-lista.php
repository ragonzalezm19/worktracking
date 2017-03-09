<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/leer.php';

	$task_id = $_POST['actividad'];
	$rh = recursosHumanosAsignadiosByTask($task_id);
	$rm = recursosMaterialesAsignadiosByTask($task_id);

	$respuesta = array($rh, $rm);

	echo json_encode($respuesta);