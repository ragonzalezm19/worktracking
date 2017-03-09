		<div id="editar" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false" style="display: none;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 id="modal-title" class="modal-title"><i class="flaticon-user84 teal"></i>  </h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<!-- Nombre -->
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">
										Nombre <span class="symbol required"></span>
									</label>
									<input id="nombre_e" class="form-control" name="nombre" type="text" placeholder="Inserte nombre para el entregable" >
								</div>
							</div>
						</div>
						<!-- Descripcion -->
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">
										Descripción <span class="symbol required"></span>
									</label>
									<textarea id="descripcion_e" class="form-control" name="descripcion" placeholder="Inserte descripción para el entregable" style="resize:none"></textarea>
								</div>
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
				<button type="button" id="actualizar" class="btn btn-success" data-dismiss="modal">
					Actualizar
				</button>
			</div>
		</div>