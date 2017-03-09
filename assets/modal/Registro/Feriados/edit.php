		<div id="editar" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false" style="display: none;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 id="modal-title" class="modal-title"></h4>
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
						<!-- Nombre -->
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">
										Nombre <span class="symbol required"></span>
									</label>
									<input id="nombre_e" class="form-control" name="nombre" type="text" placeholder="Inserte nombre para la profesion" >
								</div>
							</div>
						</div>
						<!-- Fecha -->
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">
										Fecha <span class="symbol required"></span>
									</label>
									<input id="fecha_e" type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker">
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