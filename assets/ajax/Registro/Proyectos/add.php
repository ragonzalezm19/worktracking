<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/insertar.php';
	require '../../../database/leer.php';

	/*  Proyecto  */
		$nombre      = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$costo       = $_POST['costo'];
		$cliente_id  = $_POST['cliente_id'];
		$rh_id       = $_POST['rh_id'];
		$creado      = date('Y-m-d H:i:s');
		$editado     = date('Y-m-d H:i:s');
	/*  Gantt  */
		$text        = $_POST['nombre'];
		$f           = explode('-',$_POST['fecha']);
		krsort($f);
		$start_date  = implode('-', $f).' 00:00:00';
		$duration    = 1;
		$progress    = 0;
		$sortorder   = 0;
		$parent      = 0;

	proyectoGantt($text, $start_date, $duration, $progress, $sortorder, $parent);
	
	addProyecto($nombre, $descripcion, $costo, $cliente_id, idGanttByName($text)['id'], $creado, $editado);
	
	echo json_encode(idGanttByName($text)['id']);