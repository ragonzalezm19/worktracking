<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/leer.php';

	$Id = $_POST['id'];
	$respuesta = ganntById($Id);

	echo json_encode($respuesta);