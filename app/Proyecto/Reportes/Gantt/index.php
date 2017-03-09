<?php 
	require_once 'variables.php';
	require_once $Path.'assets/database/leer.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php' ?>
	</head>
	<body>
		<button id="export-PDF_<?php echo $_GET['id'] ?>_<?php echo $_GET['p'] ?>" class="btn btn-primary" value="Export to PDF" type="button" onclick='gantt.exportToPDF()' style='margin:20px;'>
			Exportar PDF <i class="clip-file-pdf"></i>
		</button>
		<button id="export-PNG_<?php echo $_GET['id'] ?>_<?php echo $_GET['p'] ?>" class="btn btn-primary" value="Export to PNG" type="button" onclick='gantt.exportToPNG()' style='margin:20px;'>
			Exportar PNG <i class="clip-images-3"></i>
		</button>
		<div class="btn-group" style="float: right; line-height: 1; margin-right: 20px; margin-top: 12px;">
			<a href="" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
				<i class="fa fa-gear"></i>&nbsp;<span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu" style="min-width: 0px;">
				<li role="presentation">
					<a id="" href="#escala" tabindex="-1" role="menuitem" data-toggle="modal">
						Escala
					</a>
				</li>
			</ul>
		</div>
		<div id="gantt_here" style='width:100%; height:100%;'></div>
		<!-- Inputs Escondidos-->
		<input id="id-escondido-editar" type="hidden" value="<?php echo $_GET['id'] ?>">
		<input id="fecha-inicio-escondido-editar" type="hidden">
		<?php include $Path.'assets/modal/Proyecto/Reportes/scale.php' ?>
	</body>
	<?php include 'script.php' ?>
</html>