<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');
	
	require '../../../database/editar.php';

	$nombre      = $_POST['nombre'];
	$abreviatura = $_POST['abreviatura'];
	$id          = $_POST['id'];
	$editado     = date('Y-m-d H:i:s');

	editEspecialidad($id, $nombre, $abreviatura, $editado);
	echo json_encode(0);