<?php 
	require_once 'variables.php';
	include $Path.'assets/session/session.php';
	require_once $Path.'app/usuario.php';
	require_once $Path.'assets/database/leer.php';
	require_once $Path.'assets/menu/variables.php';
	$allRoles          = allRoles();
	$SubmenuParametros = SubmenuParametros();
	$SubmenuRegistros  = SubmenuRegistros();
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
								Parametros 
							</li>
							<li class="active"> <?php echo $Subclass ?> </li>
						</ol>
						<div class="page-header">
							<h1> Parametros: <?php echo $Subclass ?> </h1>
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
								<a class="btn btn-xs btn-link " href="#nuevo" data-toggle="modal">
									<i class="fa fa-plus"></i>
								</a>
								<a class="btn btn-xs btn-link panel-expand" href="#">
									<i class="icon-resize-full"></i>
								</a>
								<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
								</a>
							</div>
						</div>
						<div class="panel-body">
							<table id="maestros" class="table table-striped table-bordered table-hover table-full-width">
								<thead>
									<tr>
										<th>Id&nbsp;</th>
										<th>Descripción</th>
										<th>Acceso</th>
										<th>Permisos</th>
										<th>Seguimiento</th>
										<?php if (isset($Usuario_seguimiento)): ?>
											<?php if (in_array("Creado", $Usuario_seguimiento)): ?>
											<th>Creado</th>
											<?php endif ?>
											<?php if (in_array("Editado", $Usuario_seguimiento)): ?>
											<th>Editado</th>
											<?php endif ?>
										<?php endif ?>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($allRoles as $Rol): ?>
									<tr>
										<td><?php echo $Rol['id'] ?></td>
										<td><?php echo $Rol['descripcion'] ?></td>
										<!-- Acceso -->
										<td style="width: 50px;">
											<div class="btn-group">
												<a href="" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
													Ver </i>&nbsp;<span class="caret"></span>
												</a>
												<ul class="dropdown-menu" role="menu" style="min-width: 0px;">
													<li role="presentation">
														<a tabindex="-1" role="menuitem" data-toggle="modal">
															Parametros
														</a>
													</li>
													<!-- Parametros -->
													<?php $Accesos = explode(';', $Rol['parametros']) ?>
													<?php foreach ($SubmenuParametros as $Submenu): ?>
													<li role="presentation">
														<a tabindex="-1" role="menuitem" data-toggle="modal">
															&nbsp; <?php echo $Submenu['nombre'] ?> &nbsp;
															<?php if (in_array($Submenu['nombre'], $Accesos)): ?>
																<span style="float: right;" class="label label-success"><i class="fa fa-check fa-white"></i></span>
															<?php else: ?>
																<span style="float: right;" class="label label-danger"><i class="fa fa-times"></i></span>
															<?php endif ?>
														</a>
													</li>
													<?php endforeach ?>
													<li class="divider"></li>
													<li role="presentation">
														<a tabindex="-1" role="menuitem" data-toggle="modal">
															Registros &nbsp;
														</a>
													</li>
													<!-- Registros -->
													<?php $Accesos = explode(';', $Rol['registros']) ?>
													<?php foreach ($SubmenuRegistros as $Submenu): ?>
													<li role="presentation">
														<a tabindex="-1" role="menuitem" data-toggle="modal">
															&nbsp; <?php echo $Submenu['nombre'] ?> &nbsp;
															<?php if (in_array($Submenu['nombre'], $Accesos)): ?>
																<?php if ($Submenu['nombre'] == "Informacion de Proyectos"): ?>
																	<span class="label label-success"><i class="fa fa-check fa-white"></i></span>
																<?php else: ?>
																	<span style="float: right;" class="label label-success"><i class="fa fa-check fa-white"></i></span>
																<?php endif ?>
															<?php else: ?>
																<?php if ($Submenu['nombre'] == "Informacion de Proyectos"): ?>
																	<span class="label label-danger"><i class="fa fa-times"></i></span>
																<?php else: ?>
																	<span style="float: right;" class="label label-danger"><i class="fa fa-times"></i></span>
																<?php endif ?>
															<?php endif ?>
														</a>
													</li>
													<?php endforeach ?>
												</ul>
											</div>
										</td>
										<!-- Roles -->
										<td style="width: 50px;">
											<div class="btn-group">
												<a href="" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
													Ver </i>&nbsp;<span class="caret"></span>
												</a>
												<ul class="dropdown-menu" role="menu" style="min-width: 0px;">
													<li role="presentation">
														<a tabindex="-1" role="menuitem" data-toggle="modal">
															Crear &nbsp;
															<?php if ($Rol['crear']): ?>
																<span style="float: right;" class="label label-success"><i class="fa fa-check fa-white"></i></span>
															<?php else: ?>
																<span style="float: right;" class="label label-danger"><i class="fa fa-times"></i></span>
															<?php endif ?>
														</a>
													</li>
													<li role="presentation">
														<a tabindex="-1" role="menuitem" data-toggle="modal">
															Leer &nbsp;
															<?php if ($Rol['leer']): ?>
																<span style="float: right;" class="label label-success"><i class="fa fa-check fa-white"></i></span>
															<?php else: ?>
																<span style="float: right;" class="label label-danger"><i class="fa fa-times"></i></span>
															<?php endif ?>
														</a>
													</li>
													<li role="presentation">
														<a tabindex="-1" role="menuitem" data-toggle="modal">
															Editar &nbsp;
															<?php if ($Rol['editar']): ?>
																<span style="float: right;" class="label label-success"><i class="fa fa-check fa-white"></i></span>
															<?php else: ?>
																<span style="float: right;" class="label label-danger"><i class="fa fa-times"></i></span>
															<?php endif ?>
														</a>
													</li>
													<li role="presentation">
														<a tabindex="-1" role="menuitem" data-toggle="modal">
															Eliminar &nbsp;
															<?php if ($Rol['eliminar']): ?>
																<span class="label label-success"><i class="fa fa-check fa-white"></i></span>
															<?php else: ?>
																<span class="label label-danger"><i class="fa fa-times"></i></span>
															<?php endif ?>
														</a>
													</li>
												</ul>
											</div>
										</td>
										<!-- Seguimiento -->
										<?php $SeguimientoList = array("Creado","Editado"); ?>
										<?php $Seguimiento = explode(';', $Rol['seguimiento']) ?>
										<td style="width: 50px;">
											<div class="btn-group">
												<a href="" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
													Ver </i>&nbsp;<span class="caret"></span>
												</a>
												<ul class="dropdown-menu" role="menu" style="min-width: 0px;">
												<?php foreach ($SeguimientoList as $SList): ?>
														<li role="presentation">
														<a tabindex="-1" role="menuitem" data-toggle="modal">
															<?php echo $SList ?> &nbsp;
															<?php if (in_array($SList, $Seguimiento)): ?>
																<span class="label label-success"><i class="fa fa-check fa-white"></i></span>
															<?php else: ?>
																<span class="label label-danger"><i class="fa fa-times"></i></span>
															<?php endif ?>
														</a>
													</li>
												<?php endforeach; ?>
												</ul>
											</div>
										</td>
										<?php if (isset($Usuario_seguimiento)): ?>
											<?php if (in_array("Creado", $Usuario_seguimiento)): ?>
											<td><?php echo $Rol['creado'] ?></td>
											<?php endif ?>
											<?php if (in_array("Editado", $Usuario_seguimiento)): ?>
											<td><?php echo $Rol['editado'] ?></td>
											<?php endif ?>
										<?php endif ?>
										<td style="width: 50px;">
											<div class="btn-group">
												<a href="" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
													<i class="fa fa-gear"></i>&nbsp;<span class="caret"></span>
												</a>
												<ul class="dropdown-menu" role="menu" style="min-width: 0px;">
													<li role="presentation">
														<a id="editar_<?php echo $Rol['id'] ?>" href="#editar" tabindex="-1" role="menuitem" data-toggle="modal">
															Editar
														</a>
													</li>
													<!-- <li role="presentation">
														<a id="deshabilitar_<?php echo $Rol['id'] ?>" href="#estado" tabindex="-1" role="menuitem" data-toggle="modal">
															Deshabilitar
														</a>
													</li> -->
												</ul>
											</div>
										</td>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
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
		<?php include $Path.'assets/modal/Registro/Roles/add.php' ?>
		<?php include $Path.'assets/modal/Registro/Roles/edit.php' ?>
		<?php include $Path.'assets/modal/Registro/Roles/status.php' ?>
	</body>
	<?php include 'script.php' ?>
</html>