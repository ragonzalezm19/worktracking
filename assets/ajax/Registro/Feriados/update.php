<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');
	
	require '../../../database/editar.php';

	$id      = $_POST['id'];
	$nombre  = $_POST['nombre'];
	$f = explode("-",$_POST['fecha']);
	$fecha   = $f[2].'-'.$f[1].'-'.$f[0];
	$editado = date('Y-m-d H:i:s');

	editFeriado($id, $nombre, $fecha, $editado);
	echo json_encode(0);