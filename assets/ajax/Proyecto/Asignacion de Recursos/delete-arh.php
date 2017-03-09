<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/eliminar.php';

	$id = $_POST['id'];
	
	deleteARH($id);

	echo json_encode(0);