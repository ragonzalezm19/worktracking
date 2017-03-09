<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/insertar.php';

	$nombre      = $_POST['nombre'];
	$abreviatura = $_POST['abreviatura'];
	$estado      = 1;
	$creado      = date('Y-m-d H:i:s');
	$editado     = date('Y-m-d H:i:s');

	addEspecialidad($nombre, $abreviatura, $estado, $creado, $editado);
	echo json_encode(0);