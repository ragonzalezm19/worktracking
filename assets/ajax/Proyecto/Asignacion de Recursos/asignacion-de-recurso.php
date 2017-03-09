<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/insertar.php';

	$actividad         = $_POST['actividad'];
	$tipos_de_recursos = $_POST['tipos-de-recursos'];
	$recurso           = $_POST['recurso'];
	$cantidad          = $_POST['cantidad'];

	switch ($tipos_de_recursos) {
		case 'rh':
			addAsignacionRecursoHumano($actividad, $recurso);
			break;
		case 'rm':
			addAsignacionRecursoMaterial($actividad, $recurso, $cantidad);
			break;
	}

	echo json_encode(0);