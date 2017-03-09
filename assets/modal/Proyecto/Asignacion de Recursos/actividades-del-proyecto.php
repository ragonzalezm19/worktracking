		<div id="actividades-del-proyecto" class="modal fade" tabindex="-1" data-width="800" data-height="300" data-backdrop="static" data-keyboard="false" style="display: none;">
			<div class="modal-header">
				<!-- <input value="Export to PDF" type="button" onclick='gantt.exportToPDF()' style='margin:20px;'> -->
				<button  id="close" type="button" class="close" aria-hidden="true" data-dismiss="modal">
					&times;
				</button>
				<h4 id="modal-title" class="modal-title"><i class="clip-clipboard teal"></i>&nbsp; Proyectos Activos </h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<table class="table table-hover" id="sample-table-1">
							<thead>
								<tr>
									<th style="width: 50px; text-align: center;">Id&nbsp;</th>
									<th style="text-align: center;">Actividades</th>
									<th style="text-align: center;">Inicio</th>
									<th style="text-align: center;">Duración</th>
									<th style="text-align: center;">Progreso</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody id="tbody-asignacion-de-recursos">
								<!-- <tr>
									<td></td>
									<td></td>
									<td></td>
									<td style="width: 50px;">
										<a class="btn btn-primary" href="#" target="blank_" data-rel="tooltip" data-original-title="Hello Tooltip!"><i class="glyphicon glyphicon-log-in"></i></a>
									</td>
								</tr> -->
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="cerrar" type="button" data-dismiss="modal" class="btn btn-github">
					Cerrar
				</button>
			</div>
		</div>