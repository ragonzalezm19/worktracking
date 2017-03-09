<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/leer.php';

	$id = $_POST['asignacion-recurso-id'];
	$respuesta = recursoHumanoAsignadoById($id);

	echo json_encode($respuesta);