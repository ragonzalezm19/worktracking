<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/eliminar.php';

	$id = $_POST['id'];
	
	deleteARM($id);

	echo json_encode(0);