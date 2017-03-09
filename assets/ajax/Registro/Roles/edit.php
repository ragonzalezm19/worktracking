<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');
	
	require '../../../database/leer.php';

	$id        = $_POST['ID'];
	$respuesta = rol($id);
	$Submenu   = Submenu();
	array_push($respuesta, $Submenu);
	
	echo json_encode($respuesta);