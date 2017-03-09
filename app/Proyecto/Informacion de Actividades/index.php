<?php 
	require_once 'variables.php';
	include $Path.'assets/session/session.php';
	require_once $Path.'app/usuario.php';
	require_once $Path.'assets/database/leer.php';
	require_once $Path.'assets/menu/variables.php';
	$ableProyectos = ableProyectos();
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
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="icon-external-link-sign"></i>
							Tabla de <?php echo $Subclass ?>
							<div class="panel-tools">
								<!-- <a class="btn btn-xs btn-link " href="#responsive" data-toggle="modal">
									<i class="fa fa-plus"></i>
								</a> -->
								<a class="btn btn-xs btn-link panel-expand" href="#">
									<i class="icon-resize-full"></i>
								</a>
								<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
								</a>
							</div>
						</div>
						<div class="panel-body">
						<?php if ($Leer == 1): ?>
							<table id="maestros" class="table table-striped table-bordered table-hover table-full-width">
								<thead>
									<tr>
										<th>Id&nbsp;</th>
										<th>Nombre del Proyecto</th>
										<th>Descripción del Proyecto</th>
										<th style="width: 79px;">Etapa</th>
										<?php if ($Editar == 1): ?>
										<th></th>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($ableProyectos as $Proyecto): ?>
										<tr>
											<td><?php echo $Proyecto['id'] ?></td>
											<td><?php echo $Proyecto['nombre'] ?></td>
											<td><?php echo $Proyecto['descripcion'] ?></td>
											<td><span class="<?php echo $Proyecto['clase'] ?>"><?php echo $Proyecto['pe_nombre'] ?></span></td>
											<?php if ($Editar == 1): ?>
											<td style="width: 50px;">
												<a id="gantt_<?php echo $Proyecto['gantt_id'] ?>" href="#gantt" class="btn btn-info" data-toggle="modal">
													<i class="fa fa-tasks"></i> Gantt
												</a>
											</td>
											<?php endif ?>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						<?php endif ?>
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
		<?php include $Path.'assets/modal/Proyecto/Informacion de Actividades/gantt.php' ?>
		<?php include $Path.'assets/modal/Proyecto/Informacion de Actividades/scale.php' ?>
	</body>
	<?php include 'script.php' ?>
</html>