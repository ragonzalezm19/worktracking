		<div id="nuevo" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false" style="display: none;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title"><i class="flaticon-graduate6 teal"></i> Nuevo Tipo de Actividad</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<!-- Nombre -->
						<div class="row">
							<div class="col-md-10">
								<div class="form-group">
									<label class="control-label">
										Nombre <span class="symbol required"></span>
									</label>
									<input id="nombre" class="form-control" name="nombre" type="text" placeholder="Inserte nombre para el Tipo de Actividad" >
								</div>
							</div>
							<!-- Abreviatura -->
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label">
										Abreviatura <span class="symbol required"></span>
									</label>
									<input id="abreviatura" class="form-control tooltips" name="abreviatura" type="text" data-placement="bottom" data-original-title="No mas de 4 digito no numericos">
								</div>
							</div>
						</div>
						<!-- Campos necesarios -->
						<hr>
						<div class="row">
							<div class="col-md-offset-9 col-md-3">
								<h5>
									<span class="symbol required"></span> Campos necesarios
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
				<button id="agregar" type="button" data-dismiss="modal" class="btn btn-success">
					Agregar
				</button>
			</div>
		</div>