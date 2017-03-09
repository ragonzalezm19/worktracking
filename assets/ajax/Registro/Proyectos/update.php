<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');
	
	require '../../../database/editar.php';

	$id                 = $_POST['id'];
	$nombre             = $_POST['nombre'];
	$descripcion        = $_POST['descripcion'];
	$costo              = $_POST['costo'];
	$cliente_id         = $_POST['cliente'];
	$rh_id              = $_POST['rh_id'];
	$proyecto_estado_id = $_POST['etapa-del-proyecto'];
	$editado            = date('Y-m-d H:i:s');

	editProyecto($id, $nombre, $descripcion, $costo, $cliente_id, $rh_id, $proyecto_estado_id, $editado);
	echo json_encode(0);