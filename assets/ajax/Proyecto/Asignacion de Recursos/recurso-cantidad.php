<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/leer.php';

	$id = $_POST['recurso'];

	switch ($_POST['tipos-de-recursos']) {
		case 'rm':
			$respuesta = recursoMaterial($id);
			break;
		case 'rh':
			$respuesta = recursoHumano($id);
			break;
	}

	echo json_encode($respuesta);