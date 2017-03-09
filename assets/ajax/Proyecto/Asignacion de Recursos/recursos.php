<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/leer.php';

	switch ($_POST['tipo-de-recurso']) {
		case 'rm':
			$respuesta = recursosMaerialesAble();
			break;
		case 'rh':
			$respuesta = recursosHumanosAble();
			break;
		default:
			$respuesta = '';
			break;
	}

	echo json_encode($respuesta);