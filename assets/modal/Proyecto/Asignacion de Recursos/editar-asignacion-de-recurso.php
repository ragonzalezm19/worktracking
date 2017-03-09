		<div id="editar-asignacion-de-recurso" class="modal fade" tabindex="-1" data-width="500" data-height="150" data-backdrop="static" data-keyboard="false" style="display: none;">
			<div class="modal-header">
				<!-- <input value="Export to PDF" type="button" onclick='gantt.exportToPDF()' style='margin:20px;'> -->
				<button  id="close" type="button" class="close" aria-hidden="true" data-dismiss="modal">
					&times;
				</button>
				<h4 id="titulo-recuros-editar" class="modal-title"><i class="clip-clipboard teal"></i>&nbsp; </h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-offset-3 col-md-6">
							<div class="form-group">
								<lable class="contro-lable">
									Cantidad <span class="symbol required"></span>
								</lable>
								<input id="editar-cantidad" class="form-control" >
								<input id="id-asignacion-recurso-material" type="hidden">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="actualziar-cantidad" type="button" data-dismiss="modal" class="btn btn-success">
					Actualizar
				</button>
			</div>
		</div>