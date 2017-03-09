		<div id="gantt" class="modal fade" tabindex="-1" data-width="1200" data-height="670" data-backdrop="static" data-keyboard="false" style="display: none;">
			<div class="modal-header">
				<!-- <input value="Export to PDF" type="button" onclick='gantt.exportToPDF()' style='margin:20px;'> -->
				<button  id="close" type="button" class="close" aria-hidden="true" data-dismiss="modal">
					&times;
				</button>
				<div class="btn-group" style="float: right; line-height: 1; margin-right: 20px; margin-top: -8px;">
					<a href="" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
						<i class="fa fa-gear"></i>&nbsp;<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu" style="min-width: 0px;">
						<li role="presentation">
							<a id="" href="#escala" tabindex="-1" role="menuitem" data-toggle="modal">
								Escala
							</a>
						</li>
					</ul>
				</div>
				<h4 class="modal-title"><i class="clip-screen teal"></i>  </h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="container col-md-12">
						<div id="gantt_here" style='width:1150px; height:610px;'></div>
					</div>
				</div>
				<div class="row">
					<!-- Inputs Escondidos-->
					<input id="id-escondido-editar" type="hidden">
					<input id="fecha-inicio-escondido-editar" type="hidden">
				</div>
			</div>
			<div class="modal-footer">
				<button id="cerrar" type="button" data-dismiss="modal" class="btn btn-github">
					Cerrar
				</button>
				<button id="agregar" type="button" data-dismiss="modal" class="btn btn-success">
					Agregar
				</button>
			</div>
		</div>