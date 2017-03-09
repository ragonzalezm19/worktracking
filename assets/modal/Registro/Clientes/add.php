		<div id="nuevo" class="modal fade" tabindex="-1" data-width="1200" data-backdrop="static" data-focus-on="input:first" style="display: none;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title"><i class="flaticon-user82 teal"></i> Nuevo Cliente</h4>
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
						<div class="col-md-6">
							<!-- RIF y Nombre -->
							<div class="row">
								<div class="col-md-6">
									<div class="col-md-5" style="padding-left: 0px;">
										<div class="form-group">
											<label class="control-label">
												RIF <span class="symbol required"></span>
											</label>
											<select id="pre-rif" class="form-control search-select" >
												<option value=""></option>
												<option value="J">J</option>
												<option value="J">G</option>
											</select>
										</div>
									</div>
									<div class="col-md-7" style="padding-right: 0px;">
										<div class="form-group">
											<label class="control-label">
												&nbsp;
											</label>
											<input id="rif" class="form-control" name="rif" type="text" placeholder="Inserte rif del cliente" >
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Nombre <span class="symbol required"></span>
										</label>
										<input id="nombre" class="form-control" name="nombre" type="text" placeholder="Inserte nombre del cliente" >
									</div>
								</div>
							</div>
							<!-- Direccion y Telefono -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Dirección <span class="symbol required"></span>
										</label>
										<textarea id="direccion" class="form-control" name="direccion" placeholder="Inserte dirección del cliente" style="resize:none"></textarea>
									</div>
								</div>
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
											<input id="telefono" class="form-control" name="telefono" type="text" placeholder="Inserte telefono del cliente" >
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Usuario <span class="symbol required"></span>
										</label>
										<input id="usuario" class="form-control" name="usuario" type="text" placeholder="Inserte nombre del ingeniero suplente" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Correo Electrónico <span class="symbol required"></span>
										</label>
										<input id="correo" class="form-control" name="correo" type="text" placeholder="Inserte nombre del ingeniero suplente" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Clave <span class="symbol required"></span>
										</label>
										<input id="clave" class="form-control" name="clave" type="password" placeholder="Inserte clave del cliente" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Confirmar Clave <span class="symbol required"></span>
										</label>
										<input id="confirmar_clave" class="form-control" name="confirmar_clave" type="password" placeholder="Repite la clave" >
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-6">
							<!-- Ingeniero Encargado -->
								<label class="contro-lable">
									<h4 style="margin: 15px 0px 5px 0px;">Ingeniero Encargado</h4>
								</label>
								<hr style="margin-top: 0px;">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												Nombre <span class="symbol required"></span>
											</label>
											<input id="ing_e_nombre" class="form-control" name="ing_e_nombre" type="text" placeholder="Inserte nombre del ingeniero encargado" >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												Apellido <span class="symbol required"></span>
											</label>
											<input id="ing_e_apellido" class="form-control" name="ing_e_apellido" type="text" placeholder="Inserte apellido del ingeniero encargado" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="col-md-5" style="padding-left: 0px;">
											<div class="form-group">
												<label class="control-label">
													Cédula <span class="symbol required"></span>
												</label>
												<select id="pre-ing_e_cedula" class="form-control search-select" >
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
												<input id="ing_e_cedula" class="form-control" name="ing_e_cedula" type="text" placeholder="Inserte cedula del ingeniero encargado" >
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<lable class="contro-lable">
												Correo Electrónico<span class="symbol required"></span>
											</lable>
											<input id="ing_e_correo" class="form-control" name="ing_e_correo" type="text" placeholder="Inserte correo del ingeniero encargado" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="col-md-6" style="padding-left: 0px;">
											<div class="form-group">
												<label class="control-label">
													Teléfono <span class="symbol required"></span>
												</label>
												<select id="pre-ing_e_telefono" class="form-control search-select" >
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
												<input id="ing_e_telefono" class="form-control" name="ing_e_telefono" type="text" placeholder="Inserte telefono del ingeniero encargado" >
											</div>
										</div>
									</div>
								</div>
						</div>
						<div class="col-md-6">
							<!-- Ingeniero Suplente -->
								<label class="contro-lable">
									<h4 style="margin: 15px 0px 5px 0px;">Ingeniero Suplente</h4>
								</label>
								<hr style="margin-top: 0px;">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												Nombre
											</label>
											<input id="ing_s_nombre" class="form-control" name="ing_s_nombre" type="text" placeholder="Inserte nombre del ingeniero suplente" >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												Apellido
											</label>
											<input id="ing_s_apellido" class="form-control" name="ing_s_apellido" type="text" placeholder="Inserte apellido del ingeniero suplente" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="col-md-5" style="padding-left: 0px;">
											<div class="form-group">
												<label class="control-label">
													Cédula
												</label>
												<select id="pre-ing_s_cedula" class="form-control search-select" >
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
												<input id="ing_s_cedula" class="form-control" name="ing_s_cedula" type="text" placeholder="Inserte cedula del ingeniero suplente" >
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<lable class="contro-lable">
												Correo Electrónico
											</lable>
											<input id="ing_s_correo" class="form-control" name="ing_s_correo" type="text" placeholder="Inserte correo del ingeniero suplente" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="col-md-6" style="padding-left: 0px;">
											<div class="form-group">
												<label class="control-label">
													Teléfono
												</label>
												<select id="pre-ing_s_telefono" class="form-control search-select" >
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
												<input id="ing_s_telefono" class="form-control" name="ing_e_telefono" type="text" placeholder="Inserte telefono del ingeniero encargado" >
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>
				</div>
				<div class="row">
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
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-github">
					Cerrar
				</button>
				<a id="agregar" type="button" class="btn btn-success">
					Agregar
				</a>
			</div>
		</div>