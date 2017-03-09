<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');
	
	require '../../../database/leer.php';

	$id        = $_POST['ID'];
	$respuesta = entregable($id);
	
	echo json_encode($respuesta);