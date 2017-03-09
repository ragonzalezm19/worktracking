<?php 
	require_once 'variables.php';
	require_once $Path.'assets/database/leer.php';
	require_once $Path.'assets/menu/variables.php';
	$Proyecto    = proyectoAndGanttById($_GET['id']);
	$idGantt     = ganttIdByProjectId($_GET['id']);
	$actividades = actividadesByParent(intval($idGantt['gantt_id']));

	$CostoPorActividadRecursosHumanos    = 0;
	$CostoPorActividadRecursosMateriales = 0;

	foreach ($actividades as $actividad) {
		/* Recursos Humanos */
			$informacion = infoParaCostoPorActividadRecursoHumano($actividad['id']);
			$totalFinalRecursoHumano = 0;
			foreach ($informacion as $info)
			{
				$totalRecursoHumano       = intval($info['duration']) * intval($info['honorario']);
				$totalFinalRecursoHumano += $totalRecursoHumano;
			}
			$CostoPorActividadRecursosHumanos += $totalFinalRecursoHumano;
		/* Recursos Humanos */

		/* Recursos Materiales */
			$informacion = infoParaCostoPorActividadRecursoMaterial($actividad['id']);
			$totalFinalRecursoMaterial = 0;
			foreach ($informacion as $info)
			{
				$totalRecursoMaterial       = intval($info['duration']) * intval($info['cantidad']) * intval($info['costo']);
				$totalFinalRecursoMaterial += $totalRecursoMaterial;
			}
			$CostoPorActividadRecursosMateriales += $totalFinalRecursoMaterial;
		/* Recursos Materiales */
	}

	$CostoTotal = $CostoPorActividadRecursosHumanos + $CostoPorActividadRecursosMateriales;
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php' ?>
	</head>
	<body>
		<div id="container" style="min-width: 400px; height: 400px; margin: 25px 200px auto;">
		</div>
	</body>
	</body>
	<?php include 'script.php' ?>
</html>