<?php 
	require_once 'variables.php';
	include $Path.'assets/session/session.php';
	require_once $Path.'app/usuario.php';
	require_once $Path.'assets/database/leer.php';
	require_once $Path.'assets/menu/variables.php';
	$allCostos = allCostos();
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
							<li class="active"> Costos </li>
						</ol>
						<div class="page-header">
							<h1> Proyecto: Costos </h1>
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
							Tabla de Actividades
							<div class="panel-tools">
							<?php if ($Crear == 1): ?>
								<a class="btn btn-xs btn-link " href="#nuevo" data-toggle="modal">
									<i class="fa fa-plus"></i>
								</a>
							<?php endif ?>
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
										<th>Costo Real</th>
										<th>Fecha</th>
										<th>Actividad</th>
										<th>Proyecto</th>
										<th>Creado</th>
										<th>Editado</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($allCostos as $Costo): ?>
										<tr>
											<td><?php echo $Costo['id'] ?></td>
											<td><?php echo $Costo['costo_real'] ?></td>
											<td><?php echo $Costo['fecha'] ?></td>
											<td><?php echo $Costo['a_id'] ?></td>
											<td><?php echo $Costo['p_id'] ?></td>
											<td><?php echo $Costo['creado'] ?></td>
											<td><?php echo $Costo['editado'] ?></td>
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
		<?php include $Path.'assets/modal/Proyecto/Costos/add.php' ?>
	</body>
	<?php include 'script.php' ?>
</html>