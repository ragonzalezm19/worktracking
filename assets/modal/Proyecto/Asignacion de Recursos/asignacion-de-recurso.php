		<div id="asignacion-de-recurso" class="modal fade" tabindex="-1" data-width="950" data-height="300" data-backdrop="static" data-keyboard="false" style="display: none;">
			<div class="modal-header">
				<!-- <input value="Export to PDF" type="button" onclick='gantt.exportToPDF()' style='margin:20px;'> -->
				<button  id="close" type="button" class="close" aria-hidden="true" data-dismiss="modal">
					&times;
				</button>
				<h4 id="asignacion-de-recurso-titulo" class="modal-title"><i class="clip-clipboard teal"></i>&nbsp; </h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<!-- <div class="col-md-12">
						<div class="col-md-8">
							<div class="form-group">
								<lable class="contro-lable">
									Recursos Humanos <span class="symbol required"></span>
								</lable>
								<select multiple="multiple" id="recursos-humanos" class="form-control search-select">
								<?php foreach ($allRecursosHumanos as $RecursoHumano): ?>
									<option value="<?php echo $RecursoHumano['id'] ?>"><?php echo $RecursoHumano['p_nombre'].' '.$RecursoHumano['nombre'].' '.$RecursoHumano['apellido'] ?></option>
								<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<lable class="contro-lable">
									Cantidad <span class="symbol required"></span>
								</lable>
								<input type="recurso" name="" value="" placeholder="">
							</div>
						</div>
					</div> -->
					<div class="col-md-12">
						<div class="col-md-offset-2 col-md-8">
							<div class="form-group">
								<lable class="contro-lable">
									Tipos de Recurso <span class="symbol required"></span>
								</lable>
								<select id="tipos-de-recursos" class="form-control search-select">
									<option value=""></option>
									<option value="rm">Recurso Material</option>
									<option value="rh">Recurso Humano</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row">&nbsp;</div>
				<div class="row">&nbsp;</div>
				<div class="row">&nbsp;</div>
			<!-- Lista de recursos -->
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-8">
							<div id="div-recursos" class="form-group" style="display:none;">
								<lable class="contro-lable">
									Recurso <span class="symbol required"></span>
								</lable>
								<select id="recursos" class="form-control search-select">
									<option value=""></option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div id="div-cantidad" class="form-group" style="display:none;">
								<lable class="contro-lable">
									Cantidad <span class="symbol required"></span>
								</lable>
								<input id="cantidad" class="form-control">
							</div>
						</div>
					</div>
				</div>
			<!-- Lista de recursos -->
				<input id="proyecto-id" type="hidden">
				<input id="actividad-id" type="hidden">
			</div>
			<div class="modal-footer">
				<button id="ok" type="button" data-dismiss="modal" class="btn btn-github">
					Ok
				</button>
			</div>
		</div>