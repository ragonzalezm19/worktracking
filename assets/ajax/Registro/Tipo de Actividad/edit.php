<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');
	
	require '../../../database/leer.php';

	$id        = $_POST['ID'];
	$respuesta = especialidad($id);
	
	echo json_encode($respuesta);