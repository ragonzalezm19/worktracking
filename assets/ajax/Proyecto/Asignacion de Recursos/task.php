<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/leer.php';

	$parent = $_POST['parent'];
	$respuesta = actividadesByParent($parent);
	$gantt = ganntById($parent);
	array_push($respuesta, $gantt);

	echo json_encode($respuesta);