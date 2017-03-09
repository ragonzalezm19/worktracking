<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/leer.php';

	$respuesta = feriadosFechas();

	echo json_encode($respuesta);