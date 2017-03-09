		<?php $ableProyectosReports = ableProyectosReports(); ?>
		<div id="costo-por-actividad" class="modal fade" tabindex="-1" data-width="1200" data-height="670" data-backdrop="static" data-keyboard="false" style="display: none;">
			<div class="modal-header">
				<!-- <input value="Export to PDF" type="button" onclick='gantt.exportToPDF()' style='margin:20px;'> -->
				<button  id="close" type="button" class="close" aria-hidden="true" data-dismiss="modal">
					&times;
				</button>
				<h4 class="modal-title"><i class="clip-screen teal"></i>&nbsp; Proyectos Activos </h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<table id="tabla-proyectos" class="table table-striped table-bordered table-hover table-full-width">
							<thead>
								<tr>
									<!-- <th>Id&nbsp;</th> -->
									<th>Nombre</th>
									<th>Descripción</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($ableProyectosReports as $Proyecto): ?>
								<?php if ($RolId != 3): ?>
								<tr>
									<!-- <td><?php echo $Proyecto['id'] ?></td> -->
									<td><?php echo $Proyecto['nombre'] ?></td>
									<td><?php echo $Proyecto['descripcion'] ?></td>
									<td style="width: 50px;">
										<a class="btn btn-primary" href="../../../assets/reports/costo-por-actividad.php?id=<?php echo $Proyecto['id'] ?>" target="blank_" ><i class="clip-banknote"></i></a>
									</td>
								</tr>
								<?php else: ?>
									<?php if ($Lastname == $Proyecto['c_nombre']): ?>
									<tr>
										<!-- <td><?php echo $Proyecto['id'] ?></td> -->
										<td><?php echo $Proyecto['nombre'] ?></td>
										<td><?php echo $Proyecto['descripcion'] ?></td>
										<td style="width: 50px;">
											<a class="btn btn-primary" href="../../../assets/reports/costo-por-actividad.php?id=<?php echo $Proyecto['id'] ?>" target="blank_" ><i class="clip-banknote"></i></a>
										</td>
									</tr>
									<?php endif; ?>
								<?php endif; ?>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-github">
					Cerrar
				</button>
			</div>
		</div>