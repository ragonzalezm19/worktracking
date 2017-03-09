		<div id="delete-arm-confirm" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
			<div class="modal-body" style="text-align: center;">
				<p>
					<h3>¿Seguro desea eliminar la asignacion de recurso?</h3>
				</p>
				<div class="row">&nbsp;</div>
				<table class="table table-hover">
					<thead>
						<tr>
							<th style="text-align: center;">Recurso Material</th>
							<th style="text-align: center;">Cantidad</th>
							<th></th>
						</tr>
					</thead>
					<tbody id="arm-elimnar">
						
					</tbody>
				</table>
				<input id="arm-id" type="hidden">
			</div>
			<div class="modal-footer">
				<a type="button" data-dismiss="modal" class="btn btn-default">
					Cancelar
				</a>
				<button id="aceptar-eliminacion-de-recurso-material" type="button" data-dismiss="modal" class="btn btn-danger">
					Aceptar
				</button>
			</div>
		</div>