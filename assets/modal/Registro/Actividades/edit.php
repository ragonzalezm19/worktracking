		<?php 
			$allCondiciones    = allCondiciones();
			$allEscalas        = allEscalas();
			$allEntregables    = allEntregables();
			$allEspecialidades = allEspecialidades();
			$allClientes       = allClientes();
		?>
		<div id="editar" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false" style="display: none;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 id="modal-title" class="modal-title"><i class="flaticon-person128 teal"></i> Nueva Actividad</h4>
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
									<input id="nombre_e" class="form-control" name="nombre" type="text" placeholder="Inserte nombre para la actividad" >
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
									<textarea id="descripcion_e" class="form-control" name="descripcion" placeholder="Inserte descripción para la actividad" style="resize:none"></textarea>
								</div>
							</div>
						</div>
						<!-- Condicion y Escala -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<lable class="contro-lable">
										Condición <span class="symbol required"></span>
									</lable>
									<select id="condicion_e" class="form-control search-select" >
										<option value=""></option>
										<?php foreach ($allCondiciones as $Condicion): ?>
											<option value="<?php echo $Condicion['id'] ?>"><?php echo $Condicion['nombre'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<lable class="contro-lable">
										Escala <span class="symbol required"></span>
									</lable>
									<select id="escala_e" class="form-control search-select" >
										<option value=""></option>
										<?php foreach ($allEscalas as $Escala): ?>
											<option value="<?php echo $Escala['id'] ?>"><?php echo $Escala['nombre'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div>
						<!-- Entrega y Especialidad -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<lable class="contro-lable">
										Entrega<span class="symbol required"></span>
									</lable>
									<select id="entrega_e" class="form-control search-select" >
										<option value=""></option>
										<?php foreach ($allEntregables as $Entrega): ?>
											<option value="<?php echo $Entrega['id'] ?>"><?php echo $Entrega['nombre'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<lable class="contro-lable">
										Especialidad<span class="symbol required"></span>
									</lable>
									<select id="especialidad_e" class="form-control search-select" >
										<option value=""></option>
										<?php foreach ($allEspecialidades as $Especialidad): ?>
											<option value="<?php echo $Especialidad['id'] ?>"><?php echo $Especialidad['nombre'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div>
						<!-- Ciente -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<lable class="contro-lable">
										Cliente<span class="symbol required"></span>
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
						<!-- Campos necesarios -->
						<hr>
						<div class="row">
							<div class="col-md-offset-9 col-md-3">
								<h5>
									<span class="symbol required"></span> Campos necesarios
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
				<button id="actualizar" type="button" data-dismiss="modal" class="btn btn-success">
					Actualizar
				</button>
			</div>
		</div>