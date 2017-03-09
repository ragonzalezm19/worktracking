<?php 
	require_once 'variables.php';
	include $Path.'assets/session/session.php';
	require_once $Path.'app/usuario.php';
	require_once $Path.'assets/database/leer.php';
	require_once $Path.'assets/menu/variables.php';
	$allProfesiones = allProfesiones();
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
								<i class="clip-database"></i>
								Registro 
							</li>
							<li class="active"> <?php echo $Subclass ?> </li>
						</ol>
						<div class="page-header">
							<h1> Registro: <?php echo $Subclass ?> </h1>
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
										<th>Nombre</th>
										<th>Descripción</th>
										<th>Estado</th>
										<?php if (isset($Usuario_seguimiento)): ?>
											<?php if (in_array("Creado", $Usuario_seguimiento)): ?>
											<th>Creado</th>
											<?php endif ?>
											<?php if (in_array("Editado", $Usuario_seguimiento)): ?>
											<th>Editado</th>
											<?php endif ?>
										<?php endif ?>
										<?php if ($Editar == 1 || $Eliminar == 1): ?>
										<th></th>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php foreach($allProfesiones as $Profesion): ?>
									<tr>
										<td><?php echo $Profesion['id'] ?></td>
										<td><?php echo $Profesion['nombre'] ?></td>
										<td><?php echo $Profesion['descripcion'] ?></td>
										<?php if ($Profesion['estado']): ?>
											<td style="width: 65px;"><span class="label label-success">Habilitado</span></td>
										<?php else: ?>
											<td style="width: 85px;"><span class="label label-danger">Deshabilitado</span></td>
										<?php endif ?>
										<?php if (isset($Usuario_seguimiento)): ?>
											<?php if (in_array("Creado", $Usuario_seguimiento)): ?>
											<td><?php echo $Profesion['creado'] ?></td>
											<?php endif ?>
											<?php if (in_array("Editado", $Usuario_seguimiento)): ?>
											<td><?php echo $Profesion['editado'] ?></td>
											<?php endif ?>
										<?php endif ?>
										<?php if ($Editar == 1 || $Eliminar == 1): ?>
										<td style="width: 50px;">
											<div class="btn-group">
												<a href="" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
													<i class="fa fa-gear"></i>&nbsp;<span class="caret"></span>
												</a>
												<ul class="dropdown-menu" role="menu" style="min-width: 0px;">
												<?php if ($Editar == 1): ?>
													<li role="presentation">
														<a id="editar_<?php echo $Profesion['id'] ?>" href="#editar" tabindex="-1" role="menuitem" data-toggle="modal">
															Editar
														</a>
													</li>
												<?php endif ?>
												<?php if ($Eliminar == 1): ?>
													<li role="presentation">
														<a id="deshabilitar_<?php echo $Profesion['id'] ?>" href="#estado" tabindex="-1" role="menuitem" data-toggle="modal">
															Deshabilitar
														</a>
													</li>
												<?php endif ?>
												</ul>
											</div>
										</td>
										<?php endif ?>
									</tr>
									<?php endforeach; ?>
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
		<?php include $Path.'assets/modal/Registro/Profesiones/add.php' ?>
		<?php include $Path.'assets/modal/Registro/Profesiones/edit.php' ?>
		<?php include $Path.'assets/modal/Registro/Profesiones/status.php' ?>
	</body>
	<?php include 'script.php' ?>
</html>