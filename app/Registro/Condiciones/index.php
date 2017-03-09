<?php 
	require_once 'variables.php';
	include $Path.'assets/session/session.php';
	require_once $Path.'app/usuario.php';
	require_once $Path.'assets/database/leer.php';
	require_once $Path.'assets/menu/variables.php';
	$allCondiciones = allCondiciones();
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
							<li class="active"> Condiciones </li>
						</ol>
						<div class="page-header">
							<h1> Parametros: Condiciones </h1>
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
								<a class="btn btn-xs btn-link " href="#responsive" data-toggle="modal">
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
										<th>Nombre</th>
										<th>Abreviatura</th>
										<th>Descripción</th>
										<th>Estado</th>
										<th>Creado</th>
										<th>Editado</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($allCondiciones as $Condicion): ?>
									<tr>
										<td><?php echo $Condicion['id'] ?></td>
										<td><?php echo $Condicion['nombre'] ?></td>
										<td><?php echo $Condicion['abreviatura'] ?></td>
										<td><?php echo $Condicion['descripcion'] ?></td>
										<?php if ($Condicion['estado']): ?>
											<td style="width: 65px;"><span class="label label-success">Habilitado</span></td>
										<?php else: ?>
											<td style="width: 85px;"><span class="label label-danger">Deshabilitado</span></td>
										<?php endif ?>
										<td><?php echo $Condicion['creado'] ?></td>
										<td><?php echo $Condicion['editado'] ?></td>
										<td style="width: 50px;">
											<div class="btn-group">
												<a href="" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
													<i class="fa fa-gear"></i>&nbsp;<span class="caret"></span>
												</a>
												<ul class="dropdown-menu" role="menu" style="min-width: 0px;">
													<li role="presentation">
														<a id="editar_<?php echo $Condicion['id'] ?>" href="#editar" tabindex="-1" role="menuitem" data-toggle="modal">
															Editar
														</a>
													</li>
													<li role="presentation">
														<a id="deshabilitar_<?php echo $Condicion['id'] ?>" href="#estado" tabindex="-1" role="menuitem" data-toggle="modal">
															Deshabilitar
														</a>
													</li>
												</ul>
											</div>
										</td>
									</tr>
									<?php endforeach; ?>
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
		<?php include $Path.'assets/modal/Parametros/Condiciones/add.php' ?>
		<?php include $Path.'assets/modal/Parametros/Condiciones/edit.php' ?>
		<?php include $Path.'assets/modal/Parametros/Condiciones/status.php' ?>
	</body>
	<?php include 'script.php' ?>
</html>