		<?php 
			$allRoles       = allRoles(); 
			$allProfesiones = allProfesiones();
		?>
		<div id="nuevo" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false" style="display: none;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title"><i class="clip-users teal"></i> Nueva Recurso Humano</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="errorHandlerRequisito alert alert-danger no-display">
							<i class="fa fa-remove-sign"></i> Faltan campos requeridos por completar.
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="errorHandlerCaracteres alert alert-danger no-display">
							<i class="fa fa-remove-sign"></i> La Clave debe tener un minimo de 4 caracteres.
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="errorHandlerConfirmacion alert alert-danger no-display">
							<i class="fa fa-remove-sign"></i> La Calve de Confirmación debe ser igual a la Clave.
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<!-- Nombre y Apellido -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Nombre <span class="symbol required"></span>
									</label>
									<input id="nombre" class="form-control" name="nombre" type="text" placeholder="Inserte nombre del recurso humano" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Apellido <span class="symbol required"></span>
									</label>
									<input id="apellido" class="form-control" name="apellido" type="text" placeholder="Inserte apellido del recurso humano" >
								</div>
							</div>
						</div>
						<!-- Cedula y Dirección -->
						<div class="row">
							<div class="col-md-6">
								<div class="col-md-5" style="padding-left: 0px;">
									<div class="form-group">
										<label class="control-label">
											Cédula <span class="symbol required"></span>
										</label>
										<select id="pre-cedula" class="form-control search-select" >
											<option value=""></option>
											<option value="E">E</option>
											<option value="V">V</option>
										</select>
									</div>
								</div>
								<div class="col-md-7" style="padding-right: 0px;">
									<div class="form-group">
										<label class="control-label">
											&nbsp;
										</label>
										<input id="cedula" class="form-control" name="ing_s_cedula" type="text" placeholder="Inserte cedula del ingeniero suplente" >
									</div>
								</div>
								<!-- <div class="form-group">
									<label class="control-label">
										Cedula <span class="symbol required"></span>
									</label>
									<input id="cedula" class="form-control" name="cedula" type="text" placeholder="Inserte cedula del recurso humano" >
								</div> -->
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Dirección <span class="symbol required"></span>
									</label>
									<input id="direccion" class="form-control" name="direccion" type="text" placeholder="Inserte dirección del recurso humano" >
								</div>
							</div>
						</div>
						<!-- Telefono y Correo Electronico -->
						<div class="row">
							<div class="col-md-6">
								<div class="col-md-6" style="padding-left: 0px;">
									<div class="form-group">
										<label class="control-label">
											Teléfono <span class="symbol required"></span>
										</label>
										<select id="pre-telefono" class="form-control search-select" >
											<option value=""></option>
											<option value="0241">0241</option>
											<option value="0414">0414</option>
											<option value="0424">0424</option>
											<option value="0416">0416</option>
											<option value="0426">0426</option>
											<option value="0412">0412</option>
										</select>
									</div>
								</div>
								<div class="col-md-6" style="padding-right: 0px;">
									<div class="form-group">
										<label class="control-label">
											&nbsp;
										</label>
										<input id="telefono" class="form-control" name="telefono" type="text" placeholder="Inserte telefono del recurso humano" >
									</div>
								</div>
								<!-- <div class="form-group">
									<label class="control-label">
										Telefono <span class="symbol required"></span>
									</label>
									<input id="telefono" class="form-control" name="telefono" type="text" placeholder="Inserte telefono del recurso humano" >
								</div> -->
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Correo Electrónico <span class="symbol required"></span>
									</label>
									<input id="correo" class="form-control" name="correo" type="text" placeholder="Inserte correo del recurso humano" >
								</div>
							</div>
						</div>
						<!-- Profesión y Honorario/Día -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Profesión <span class="symbol required"></span>
									</label>
									<select id="profesion" class="form-control search-select" >
										<option value=""></option>
										<?php foreach ($allProfesiones as $Profesion): ?>
											<option value="<?php echo $Profesion['id'] ?>"><?php echo $Profesion['nombre'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Honorario/Día <span class="symbol required"></span>
									</label>
									<input id="honorario" class="form-control" name="honorario" type="text" placeholder="Inserte honorario del recurso humano" >
								</div>
							</div>
						</div>
						<!-- Clave y Confirmar Clave -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Clave <span class="symbol required"></span>
									</label>
									<input id="clave" class="form-control" name="nombre" type="password" placeholder="Inserte clave del recurso humano" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Confirme Clave <span class="symbol required"></span>
									</label>
									<input id="confirmar_clave" class="form-control" name="apellido" type="password" placeholder="Repite la clave" >
								</div>
							</div>
						</div>
						<!-- Usuario y Rol -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Usuario <span class="symbol required"></span>
									</label>
									<input id="usuario" class="form-control" name="usuario" type="text" placeholder="Inserte nombre de usuario " >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Rol <span class="symbol required"></span>
									</label>
									<select id="rol" class="form-control search-select" >
										<option value=""></option>
										<?php foreach ($allRoles as $Rol): ?>
											<option value="<?php echo $Rol['id'] ?>"><?php echo $Rol['descripcion'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div>
						<!-- Numero de Colegiatura -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Numero de Colegiatura
									</label>
									<input id="numero-de-colegiatura" class="form-control" name="numero-de-colegiatura" type="text" placeholder="Inserte numero de colegiatura " >
								</div>
							</div>
						</div>
						<!-- Campos requeridos -->
						<hr>
						<div class="row">
							<div class="col-md-offset-9 col-md-3">
								<h5>
									<span class="symbol required"></span> Campos requeridos
								</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-github">
					Cerrar
				</button>
				<button id="agregar" type="button" class="btn btn-success">
					Agregar
				</button>
			</div>
		</div>