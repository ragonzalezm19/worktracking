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
						<!-- Nombre y Abreviatura-->
						<div class="row">
							<div class="col-md-10">
								<div class="form-group">
									<label class="control-label">
										Nombre <span class="symbol required"></span>
									</label>
									<input id="nombre_e" class="form-control" name="nombre" type="text" placeholder="Inserte nombre del recurso material" >
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label">
										Abreviatura <span class="symbol required"></span>
									</label>
									<input id="abreviatura_e" class="form-control tooltips" name="abreviatura" type="text" data-placement="bottom" data-original-title="No mas de 4 digito no numericos">
								</div>
							</div>
						</div>
						<!-- Cantidad Maxima y Costo Unidad por Día -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Cantidad Máxima <span class="symbol required"></span>
									</label>
									<input id="cantidad_e" class="form-control" name="cantidad" type="text" placeholder="Inserte cantidad maxima del recurso material" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Costo Unidad por Día <span class="symbol required"></span>
									</label>
									<input id="costo_e" class="form-control" name="costo" type="text" placeholder="Inserte costo por unidad del recurso material" >
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
				<button type="button" class="btn btn-github" data-dismiss="modal">
					Cerrar
				</button>
				<button type="button" id="actualizar" class="btn btn-success">
					Actualizar
				</button>
			</div>
		</div>