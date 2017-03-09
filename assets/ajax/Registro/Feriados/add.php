<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/insertar.php';

	$nombre  = $_POST['nombre'];
	$f = explode("-",$_POST['fecha']);
	$fecha   = $f[2].'-'.$f[1].'-'.$f[0];
	$creado  = date('Y-m-d H:i:s');
	$editado = date('Y-m-d H:i:s');

	addFeriado($nombre, $fecha, $creado, $editado);
	echo json_encode(0);