		<?php $recursoHumano = recursoHumano($Id); ?>
		<!-- Informacion de Mi Perfil -->
		<div id="informacion-usuario" class="modal fade" data-backdrop="static" data-width="1020" tabindex="-1"  style="display: none;">
			<div class="modal-header">
				<button id="cerrar-mi-perfil" type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title"><i class="clip-user teal"></i> Mi Perfil</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-md-4">
								<div class="">
									<div class="center">
										<h4><?php echo $Name.' '.$Lastname; ?></h4>
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="user-image">
												<div class="fileupload-new thumbnail"><img src="<?php echo $Path ?>assets/images/user-1-xl.jpg" alt="Foto de Perfil">
												</div>
											</div>
										</div>
									</div>
									<table class="table table-condensed table-hover">
										<thead>
											<tr>
												<th colspan="2"></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Nivel de Usuario</td>
												<td style="text-align: right;">
													<span class="label label-sm label-info" ><?php echo $recursoHumano['r_descripcion'] ?></span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-md-8" style="border-left: 1px solid #DDDDDD;">
								<div>
									<form action="#" role="form" id="form">
										<div class="row">
											<div class="col-md-12">
												<h3>Informacion de la Cuenta</h3>
												<hr>
											</div>
											<div class="col-md-12">
												<!-- Nombre y Apellido -->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																Nombre
															</label>
															<input type="text" placeholder="" class="form-control" id="nombre-" name="nombre-" value="<?php echo $recursoHumano['nombre'] ?>" disabled>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																Apellido
															</label>
															<input type="text" placeholder="" class="form-control" id="apellido-" name="apellido-" value="<?php echo $recursoHumano['apellido'] ?>" disabled>
														</div>
													</div>
												</div>
												<!-- Usuario y Correo -->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																Usuario
															</label>
															<input type="text" placeholder="" class="form-control" id="usuario-" name="usuario-" value="<?php echo $recursoHumano['usuario'] ?>" disabled>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																Correo
															</label>
															<input type="text" placeholder="" class="form-control" id="correo-" name="correo-" value="<?php echo $recursoHumano['correo'] ?>" disabled>
														</div>
													</div>
												</div>
												<!-- Clave y Boton Cambiar Información-->
												<div class="row">
													<div id="div-clave-" class="col-md-6" style="display: none;">
														<div class="form-group">
															<label class="control-label">
																Clave <span class="symbol required"></span>
															</label>
															<input id="clave-" class="form-control" name="nombre" type="password" placeholder="Inserte clave del usuario" disabled>
														</div>
													</div>
													<div id="div-cambiar-clave-" class="col-md-offset-6 col-md-6">
														<div class="form-group">
															<a id="cambiar-informacion-" class="btn btn-primary" style="margin-top: 20px;">
																Actualizar información
															</a>
															<a id="cambiar-clave-" data-toggle="modal" class="btn btn-info" href="#modal-clave-" style="margin-top: 20px;">
																Cambiar Clave
															</a>
														</div>
													</div>
												</div>
												<!-- Boton Modificar -->
												<div class="row">
													<div class="col-md-12">
														<div class="col-md-offset-10">
															<button id="modificar-" type="button" data-dismiss="modal" class="btn btn-success col-md-12">
																Modificar
															</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Cambiar Clave -->
		<div id="modal-clave-" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
			<div class="modal-header">
				<h4 class="modal-title"><i class="clip-key teal"></i> Cambio de Clave</h4>
			</div>
			<div class="modal-body" style="text-align: center;">
				<input id="nueva-clave-" class="form-control" name="nombre" type="text" placeholder="Inserte nueva clave" >
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-default">
					Cancelar
				</button>
				<a id="" type="button" class="btn btn-success" data-toggle="modal" data-dismiss="modal" href="#confirmar-">
					Cambiar
				</a>
			</div>
		</div>
		<!-- Confirmar Cambio de Clave -->
		<div id="confirmar-" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
			<div class="modal-body" style="text-align: center;">
				<p>
					<h3>¿Seguro desea cambiar la contraseña actual?</h3>
				</p>
			</div>
			<div class="modal-footer">
				<a type="button" data-dismiss="modal"  data-toggle="modal" class="btn btn-default" href="#modal-clave">
					Cancelar
				</a>
				<button id="aceptar-cambio-clave-" type="button" data-dismiss="modal" class="btn btn-danger">
					Aceptar
				</button>
			</div>
		</div>