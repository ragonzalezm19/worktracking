<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');
	
	require '../../../database/editar.php';

	$id      = $_POST['id'];
	$estado  = $_POST['estado'];
	$editado = date('Y-m-d H:i:s');

	updateStatusEspecialidad($id, $estado, $editado);
	echo json_encode(0);