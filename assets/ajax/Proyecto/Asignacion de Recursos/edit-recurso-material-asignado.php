<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/editar.php';

	$id       = $_POST['id'];
	$cantidad = $_POST['cantidad'];

	editCantidadRecursoMaterialAsignado($id, $cantidad);

	echo json_encode(0);