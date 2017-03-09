		<?php 
			$allProfesiones    = allProfesiones();
			$allEspecialidades = allEspecialidades();
		?>
		<div id="nuevo" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false" style="display: none;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title"><i class="flaticon-engineer teal"></i> Nuevo Empleados</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<!-- Nombre y Apellido -->
						<div class="row">
							<!-- 	Nombre -->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Nombre <span class="symbol required"></span>
									</label>
									<input id="nombre" class="form-control" name="nombre" type="text" placeholder="Inserte nombre para el ingeniero" >
								</div>
							</div>
							<!-- Apellido -->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Apellido <span class="symbol required"></span>
									</label>
									<input id="apellido" class="form-control" name="apellido" type="text" placeholder="Inserte apellido para el ingeniero">
								</div>
							</div>
						</div>
						<!-- Cedula y Telefono -->
						<div class="row">
							<!-- Cedula -->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Cedula <span class="symbol required"></span>
									</label>
									<input id="cedula" class="form-control" name="cedula" type="text" placeholder="Inserte cedula para el ingeniero" >
								</div>
							</div>
							<!-- Telefono -->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Telefono <span class="symbol required"></span>
									</label>
									<input id="telefono" class="form-control" name="telefono" type="text" placeholder="Inserte telefono para el ingeniero">
								</div>
							</div>
						</div>
						<!-- Correo -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Correo <span class="symbol required"></span>
									</label>
									<input id="correo" class="form-control" name="correo" type="text" placeholder="Inserte correo para el ingeniero" >
								</div>
							</div>
						</div>
						<!-- Profesion y Especialidad -->
						<div class="row">
							<!-- Profesion -->
							<div class="col-md-6">
								<div class="form-group">
									<lable class="contro-lable">
										Profesion <span class="symbol required"></span>
									</lable>
									<select id="profesion" class="form-control search-select" >
										<option value=""></option>
										<?php foreach ($allProfesiones as $Profesion): ?>
											<option value="<?php echo $Profesion['id'] ?>"><?php echo $Profesion['nombre'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<!-- Especialidad -->
							<div class="col-md-6">
								<div class="form-group">
									<lable class="contro-lable">
										Especialidad <span class="symbol required"></span>
									</lable>
									<select id="especialidad" class="form-control search-select" >
										<option value=""></option>
										<?php foreach ($allEspecialidades as $Especialidad): ?>
											<option value="<?php echo $Especialidad['id'] ?>"><?php echo $Especialidad['nombre'] ?></option>
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
				<button id="agregar" type="button" data-dismiss="modal" class="btn btn-success">
					Agregar
				</button>
			</div>
		</div>