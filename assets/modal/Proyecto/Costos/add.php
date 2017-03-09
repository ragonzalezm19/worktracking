		<?php 
			$allActividades = allActividades();
			$allProyectos   = allProyectos();
		?>
		<div id="nuevo" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false" style="display: none;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title"><i class="clip-banknote teal"></i> Nuevo Costo</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<!-- Actividad y Proyecto -->
						<div class="row">
							<!-- Actividad -->
							<div class="col-md-6">
								<div class="form-group">
									<lable class="contro-lable">
										Actividad <span class="symbol required"></span>
									</lable>
									<select id="actividad" class="form-control search-select" >
										<option value=""></option>
										<?php foreach ($allActividades as $Actividad): ?>
											<option value="<?php echo $Actividad['id'] ?>"><?php echo $Actividad['nombre'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<!-- Proyecto -->
							<div class="col-md-6">
								<div class="form-group">
									<lable class="contro-lable">
										Proyecto <span class="symbol required"></span>
									</lable>
									<select id="proyecto" class="form-control search-select" >
										<option value=""></option>
										<?php foreach ($allProyectos as $Proyecto): ?>
											<option value="<?php echo $Proyecto['id'] ?>"><?php echo $Proyecto['nombre'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div>
						<!-- Costo Real y Fecha -->
						<div class="row">
							<!-- Costo Real -->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Costo Real <span class="symbol required"></span>
									</label>
									<input id="costo_real" class="form-control" name="costo_real" type="text" placeholder="Inserte el costo real del proyecto" >
								</div>
							</div>
							<!-- Fecha -->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Fecha <span class="symbol required"></span>
									</label>
									<input id="fecha" type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker">
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