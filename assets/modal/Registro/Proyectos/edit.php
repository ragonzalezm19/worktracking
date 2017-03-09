		<?php 
			$allClientes        = allClientes();
			$allRecursosHumanos = allRecursosHumanos();
			$estadosDeProyectos = estadosDeProyectos();
		?>
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
									<input id="nombre_e" class="form-control" name="nombre" type="text" placeholder="Inserte nombre del proyecto" >
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
									<textarea id="descripcion_e" class="form-control" name="descripcion" placeholder="Inserte descripción del proyecto" style="resize:none"></textarea>
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
									<input id="costo_e" type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<!-- Cliente -->
								<div class="form-group">
									<lable class="contro-lable">
										Cliente <span class="symbol required"></span>
									</lable>
									<select id="cliente_e" class="form-control search-select" >
										<option value=""></option>
										<?php foreach ($allClientes as $Cliente): ?>
											<option value="<?php echo $Cliente['id'] ?>"><?php echo $Cliente['nombre'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div>
						<!-- Personal Asignado -->
						<div class="row">
							<!-- Personal Asignado -->
							<div class="col-md-6">
								<div class="form-group">
									<lable class="contro-lable">
										Personal Asignado <span class="symbol required"></span>
									</lable>
									<select id="personal-asignado_e" class="form-control search-select" >
										<option value=""></option>
										<?php foreach ($allRecursosHumanos as $RecursoHumano): ?>
											<option value="<?php echo $RecursoHumano['id'] ?>"><?php echo $RecursoHumano['p_nombre'].' '.$RecursoHumano['nombre'].' '.$RecursoHumano['apellido'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<!-- Estado del Proyecto -->
							<div class="col-md-6">
								<div class="form-group">
									<lable class="contro-lable">
										Etapa del Proyecto <span class="symbol required"></span>
									</lable>
									<select id="etapa-del-proyecto_e" class="form-control search-select" >
										<option value=""></option>
										<?php foreach ($estadosDeProyectos as $estado): ?>
											<option value="<?php echo $estado['id'] ?>"><?php echo $estado['nombre'] ?></option>
										<?php endforeach ?>
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
				<button id="actualizar"class="btn btn-success">
					Actualizar
				</button>
			</div>
		</div>