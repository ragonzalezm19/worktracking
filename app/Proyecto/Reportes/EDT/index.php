<?php 
	require_once 'variables.php';
	include $Path.'assets/session/session.php';
	require_once $Path.'app/usuario.php';
	require_once $Path.'assets/database/leer.php';
	$Proyecto    = proyectoAndGanttById($_GET['id']);
	$idGantt     = ganttIdByProjectId($_GET['id']);
	$Actividades = actividadesAndGanttBy(intval($idGantt['gantt_id']));
	// var_dump(intval($idGantt['gantt_id']));
	$Encargados  = -1;
?>
<!DOCTYPE html> 
<html>
	<head>
		<?php include 'head.php' ?>
	</head>
	<body>
		<!-- <div id="centerpanel">
		</div> -->
		<div id="contentpanel" style="padding: 0px;">
			<!--bpcontent-->
			<div id="westpanel" style="padding: 0px; margin: 0px; border-style: solid; font-size: 12px; border-color: grey; border-width: 1px; overflow: scroll; -webkit-overflow-scrolling: touch;">
				<h2>Organizational Chart, Vertical Children layout Demo</h2>
				<p>Chart has two distinct options for children and leaves placement type. These options can be overwritten individually for every item. Chart has 3 types of children layout: Horizontal, Vertical and Matrix. In order to change children alignment relative to its parent use complimentary horizontal children alignment option. In order to occupy minimum space matrix layout has squared shape. Use maximum columns number option to limits number of columns in it. </p>
				<p>All children in matrix aligned vertically and horizontally, regardless of available assistants, advisers or number of sub children in them.</p>
				<h3>Auto Layout Options</h3>
				<p id="pageFitMode">Page Fit Mode</p>
				<p id="minimalVisibility">Minimal nodes visibility</p>
				<p id="selectionPathMode">Selection Path Mode</p>
				<p id="verticalAlignment">Items Vertical Alignment</p>
				<p id="horizontalAlignment">Items Horizontal Alignment</p>
				<p id="childrenPlacementType">Children placement</p>
				<p id="leavesPlacementType">Leaves placement</p>
				<h3>Connectors</h3>
				<p id="connectorType">Connectors</p>
				<h3>Default Template Options</h3>
				<p id="hasButtons">User buttons</p>
				<p id="hasSelectorCheckbox">Selection check box</p>
			</div>
			<div id="centerpanel" style="overflow: hidden; padding: 0px; margin: 0px; border: 0px;">
			</div>
			<!-- <div id="southpanel">
			</div> -->
			<!--/bpcontent-->
		</div>
	</body>
	<?php include 'script.php' ?>
</html>
