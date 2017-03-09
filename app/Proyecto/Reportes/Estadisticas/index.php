<?php 
	require_once 'variables.php';
	require_once $Path.'assets/database/leer.php';
	$Proyecto         = proyectoAndGanttById($_GET['id']);
	$idGantt          = ganttIdByProjectId($_GET['id']);
	$actividades      = actividadesByParent(intval($idGantt['gantt_id']));
	$tam = count($actividades);
	$listaActividades      = '[';
	$porcentajeActividades = '[';
	$i                     = 0;

	foreach ($actividades as $actividad) {
		$i++;
		$listaActividades .= "'".$actividad['text']."'";
		$porcentajeActividades .= ''.round($actividad['progress']*100, 2).'';
		if ($i < $tam) {
			$listaActividades      .= ",";
			$porcentajeActividades .= ",";
		} else {
			$listaActividades      .= "]";
			$porcentajeActividades .= "]";
		}
		
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="<?php echo $Path ?>assets/plugins/jQuery/jquery-1.8.2.min.js"></script>
		<style type="text/css">
			${demo.css}
		</style>
		<script type="text/javascript">
			$(function () {
				$('#container').highcharts({
					chart: {
						type: 'line'
					},
					title: {
						text: <?php echo '\''.$Proyecto['nombre'].'\'' ?>
					},
					subtitle: {
						text: 'Porcentaje de progeso por actividad'
					},
					xAxis: {
						categories: <?php echo $listaActividades ?>
					},
					yAxis: {
						title: {
							text: 'Progreso (%)'
						}
					},
					plotOptions: {
						line: {
							dataLabels: {
								enabled: true
							},
							enableMouseTracking: false
						}
					},
					series: [{
						name: <?php echo '\''.$Proyecto['nombre'].'\'' ?>,
						data: <?php echo $porcentajeActividades ?>
					}]
				});
			});
		</script>
	</head>
	<body>
		<script src="<?php echo $Path ?>assets/plugins/Highcharts/js/highcharts.js"></script>
		<script src="<?php echo $Path ?>assets/plugins/Highcharts/js/modules/exporting.js"></script>

		<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
