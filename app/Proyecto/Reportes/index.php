<?php 
	require_once 'variables.php';
	include $Path.'assets/session/session.php';
	require_once $Path.'app/usuario.php';
	require_once $Path.'assets/database/leer.php';
	require_once $Path.'assets/menu/variables.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php' ?>
	</head>
	<body>
		<?php include $Path.'assets/navbar/navbar.php' ?>
		<?php include $Path.'assets/menu/menu.php' ?>
		<div class="main-content">
			<div id="container-info" class="container">
				<div class="row">
					<div class="col-sm-12">
						<ol class="breadcrumb">
							<li>
								<i class="clip-home-3"></i>
								<a href="<?php echo $Path.'app/Home/' ?>">Inicio</a>
							</li>
							<li class="active"> 
								<i class="clip-screen"></i>
								Proyecto 
							</li>
							<li class="active"> <?php echo $Subclass ?> </li>
						</ol>
						<div class="page-header">
							<h1> Proyecto: <?php echo $Subclass ?> </h1>
						</div>
					</div>
				</div>
				<div class="row">
				</div> 
				<div class="col-md-12">
				<!-- start: Contenido -->
					<div class="row">
						<div class="col-sm-4">
							<div class="core-box">
								<div class="heading">
									<a href="#EDT" data-toggle="modal">
										<i class="clip-tree circle-icon circle-green"></i>
										<h2>EDT</h2>
									</a>
								</div>
								<!-- <div class="content">
									Una Estructura de Descomposición del Trabajo, descomposición jerárquica orientada al entregable.
								</div> -->
							</div>
						</div>
						<div class="col-sm-4">
							<div class="core-box">
								<div class="heading">
									<a href="#estadisticas" data-toggle="modal">
										<i class="clip-stats circle-icon circle-teal"></i>
										<h2>Estadísticas</h2>
									</a>
								</div>
								<!-- <div class="content">
									
								</div> -->
							</div>
						</div>
						<div class="col-sm-4">
							<div class="core-box">
								<div class="heading">
									<a href="#diagrama-de-costo" data-toggle="modal">
										<i class="flaticon-education14 circle-icon circle-bricky"></i>
										<h2>Diagrama de Costo</h2>
									</a>
								</div>
								<!-- <div class="content">
									Grafica comparativa entre el costo estimado por el proyecto y el costo real del proyecto.
								</div> -->
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="core-box">
								<div class="heading">
									<a href="#gantt-list" data-toggle="modal">
										<i class="flaticon-chart12 circle-icon circle-green"></i>
										<h2>Diagrama de Gantt</h2>
									</a>
								</div>
								<!-- <div class="content">
									Herramienta grafica de planificacion de tareas necesaras para la realización de un proyecto.
								</div> -->
							</div>
						</div>
						<div class="col-sm-4">
							<div class="core-box">
								<div class="heading">

									<a href="#informacion-de-proyecto" data-toggle="modal">
										<i class="flaticon-dataanalytics1 circle-icon circle-teal"></i>
										<h2>Información de Proyecto</h2>
									</a>
								</div>
								<!-- <div class="content">
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
								</div> -->
							</div>
						</div>
						<div class="col-sm-4">
							<div class="core-box">
								<div class="heading">
									<a href="#costo-por-actividad" data-toggle="modal">
										<i class="clip-banknote circle-icon circle-bricky"></i>
										<h2>Costos por Actividad</h2>
									</a>
								</div>
								<!-- <div class="content">
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
								</div> -->
							</div>
						</div>
					</div>
				<!-- end  : Contenido -->
				</div>
			</div>
		</div>
		</div>
			<div class="footer clearfix">
				<div class="footer-inner">
					Desarrollado por <a href="https://github.com/ragonzalezm19" target="_blanc">Roberto Gonzalez.</a>
				</div>
				<div class="footer-items">
					<span class="go-top"><i class="clip-chevron-up"></i></span>
				</div>
			</div>
		</div>
		<?php include $Path.'assets/modal/user-info.php' ?>
		<?php include $Path.'assets/modal/Proyecto/Reportes/edt.php' ?>
		<?php include $Path.'assets/modal/Proyecto/Reportes/gantt-list.php' ?>
		<?php include $Path.'assets/modal/Proyecto/Reportes/informacion-de-proyecto.php' ?>
		<?php include $Path.'assets/modal/Proyecto/Reportes/costo-por-actividad.php' ?>
		<?php include $Path.'assets/modal/Proyecto/Reportes/diagrama-de-costo.php' ?>
		<?php include $Path.'assets/modal/Proyecto/Reportes/estadisticas.php' ?>
	</body>
	<?php include 'script.php' ?>
</html>