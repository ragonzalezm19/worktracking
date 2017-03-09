		<?php 
			$SubmenuParametros = SubmenuParametros();
			$SubmenuRegistros  = SubmenuRegistros();
		?>
		<div id="editar" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false" style="display: none;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 id="modal-title" class="modal-title"><i class="fa fa-male teal"></i> Nuevo Rol de Usaurio</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="errorHandler_e alert alert-danger no-display">
							<i class="fa fa-remove-sign"></i> Faltan campos requeridos por completar.
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<!-- Descripcion -->
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">
										Descripción <span class="symbol required"></span>
									</label>
									<textarea id="descripcion_e" class="form-control" name="descripcion" placeholder="Inserte descripción para el Rol de Usuario" style="resize:none"></textarea>
								</div>
							</div>
						</div>
						<!-- Acceso y Permisos -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<lable class="contro-lable">
										Acceso <span class="symbol required"></span>
									</lable>
									<select multiple="multiple" id="acceso_e" class="form-control search-select">
										<optgroup label="Parametros">
											<?php foreach ($SubmenuParametros as $Submenu): ?>
												<option value="<?php echo $Submenu['id'] ?>"><?php echo $Submenu['nombre'] ?></option>
											<?php endforeach ?>
										</optgroup>
										<optgroup label="Registros">
											<?php foreach ($SubmenuRegistros as $Submenu): ?>
												<option value="<?php echo $Submenu['id'] ?>"><?php echo $Submenu['nombre'] ?></option>
											<?php endforeach ?>
										</optgroup>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<lable class="contro-lable">
										Permisos 
									</lable>
									<select multiple="multiple" id="permisos_e" class="form-control search-select">
										<option value="CR">Crear</option>
										<option value="LE">Leer</option>
										<option value="ED">Editar</option>
										<option value="EL">Eliminar</option>
									</select>
								</div>
							</div>
						</div>
						<!-- Seguimiento -->
						<div class="row"></div>
						<div class="row">
							<div class="col-md-offset-6 col-md-6">
								<div class="form-group">
									<lable class="contro-lable">
										Seguimiento 
									</lable>
									<select multiple="multiple" id="seguimiento_e" class="form-control search-select">
										<option value="CRE">Creado</option>
										<option value="EDI">Editado</option>
									</select>
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
						<!-- Id Escondido-->
						<input id="id-escondido-editar" type="hidden">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-github">
					Cerrar
				</button>
				<button id="actualizar" type="button" class="btn btn-success">
					Actualizar
				</button>
			</div>
		</div>