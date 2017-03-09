		<?php 
			$allClientes    = allClientes();
			$allActividades = allActividades();
		?>
		<div id="responsive" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false" style="display: none;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title"><!-- <i class="clip-pyramid teal"></i> --><i class="clip-screen teal"></i> Nuevo Proyecto</h4>
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
									<input id="nombre" class="form-control" name="nombre" type="text" placeholder="Inserte nombre del proyecto" >
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
									<textarea id="descripcion" class="form-control" name="descripcion" placeholder="Inserte descripción del proyecto" style="resize:none"></textarea>
								</div>
							</div>
						</div>
						<!-- Costo y Cliente -->
						<div class="row">
							<div class="col-md-6">
								<!-- Costo -->
								<div class="form-group">
									<lable class="contro-lable">
										Costo estimado<span class="symbol required"></span>
									</lable>
									<input id="costo" type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<!-- Cliente -->
								<div class="form-group">
									<lable class="contro-lable">
										Cliente <span class="symbol required"></span>
									</lable>
									<select id="cliente" class="form-control search-select" >
										<option value=""></option>
										<?php foreach ($allClientes as $Cliente): ?>
											<option value="<?php echo $Cliente['id'] ?>"><?php echo $Cliente['nombre'] ?></option>
										<?php endforeach ?>
									</select>
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
				<button id="agregar" href="#gantt" data-toggle="modal" data-dismiss="modal" class="btn btn-success">
					Agregar
				</button>
			</div>
		</div>