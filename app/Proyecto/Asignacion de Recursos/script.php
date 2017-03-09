<!--[if lt IE 9]>
	<script src="assets/plugins/respond.min.js"></script>
	<script src="assets/plugins/excanvas.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
	<script src="<?php echo $Path; ?>assets/plugins/jQuery/jquery-2.1.1.js"></script>
<!--<![endif]-->
<!-- start: SCRIPT -->
	<script src="<?php echo $Path; ?>assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/blockUI/jquery.blockUI.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/iCheck/jquery.icheck.min.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/less/less-1.5.0.min.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
	<script src="<?php echo $Path; ?>assets/js/table-data.js"></script>
	<script src="<?php echo $Path; ?>/DataTables-1.10.4/media/js/jquery.dataTables.js"></script>

	<script src="<?php echo $Path; ?>assets/js/main.js"></script>

	<script src="<?php echo $Path; ?>assets/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
	<script src="<?php echo $Path; ?>assets/js/ui-modals.js"></script>

	<script src="<?php echo $Path; ?>assets/plugins/select2/select2.min.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/autosize/jquery.autosize.min.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/iCheck/jquery.icheck.min.js"></script>

	<script src="<?php echo $Path; ?>assets/plugins/DhtmlxGantt_v3.1.1_gpl/codebase/dhtmlxgantt.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/DhtmlxGantt_v3.1.1_gpl/codebase/ext/dhtmlxgantt_marker.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $Path; ?>assets/plugins/DhtmlxGantt_v3.1.1_gpl/codebase/ext/api.js" type="text/javascript" charset="utf-8"></script>
	<!-- <script src="<?php echo $Path; ?>assets/plugins/DhtmlxGantt_v3.1.1_gpl/codebase/ext/dhtmlxgantt_quick_info.js" type="text/javascript" charset="utf-8"></script> -->
	<script src="<?php echo $Path; ?>assets/plugins/DhtmlxGantt_v3.1.1_gpl/codebase/ext/dhtmlxgantt_tooltip.js" type="text/javascript" charset="utf-8"></script>
	<!-- <script src="<?php echo $Path; ?>assets/plugins/DhtmlxGantt_v3.1.1_gpl/samples/common/testdata.js"></script> -->
	<!-- <script src="<?php echo $Path; ?>assets/plugins/DhtmlxGantt_v3.1.1_gpl/samples/common/data.json"></script> -->
	<script src="<?php echo $Path; ?>assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			UIModals.init();
		});
		// Cambio de clave de Mi Perfil
		$('#aceptar-cambio-clave-').click(function ()
		{
			$('#div-cambiar-clave-').removeClass('col-md-offset-6');
			$('#div-clave-').attr("style","");
			$('#clave-').val($('#nueva-clave-').val());
			$('#nueva-clave-').val('');
		});
		$('#cerrar-mi-perfil').click(function ()
		{
			$('#div-cambiar-clave-').removeClass('col-md-offset-6').addClass('col-md-offset-6');
			$('#div-clave-').attr("style","").attr("style","display: none;");
			$('#nombre-').prop("disabled",true);
			$('#apellido-').prop("disabled",true);
			$('#usuario-').prop("disabled",true);
			$('#correo-').prop("disabled",true);
			$('#cambiar-informacion-').attr("style","margin-top: 20px;");
		});
		$('#cambiar-informacion-').click(function ()
		{
			$('#nombre-').prop("disabled",false);
			$('#apellido-').prop("disabled",false);
			$('#usuario-').prop("disabled",false);
			$('#correo-').prop("disabled",false);
			$(this).attr("style","display: none;");
		});
	</script>
	<!-- start: AJAX SCRIPTS -->
	<script>
		// Eliminando el archivo usuario.php y cerrando sesion
		$('a#logout').click(function () 
		{
			jQuery.ajax({
				url: '<?php echo $Path ?>assets/ajax/logout.php',
				success: function () {
					window.location.href = "<?php echo $Path ?>app/Login/";
				}
			});
		});
		// Actualizar la informacion del Usuario en Mi Perfil
		$('#modificar-').click(function () 
		{
			parametros:{
				parametros = {
					"id"      : <?php echo $Id ?>,
					"nombre"  : $('#nombre-').val(),
					"apellido": $('#apellido-').val(),
					"usuario" : $('#usuario-').val(),
					"correo"  : $('#correo-').val(),
					"clave"   : $('#clave-').val()
				}
				// alert(JSON.stringify(parametros));
				jQuery.ajax({
					data: parametros,
					url: '<?php echo $Path ?>assets/ajax/user-my-profile.php',
					type: 'post',
					dataType: 'json',
					success: function(respuesta){
						location.reload();
					},error: function(e){
						console.log(e);
					}
				});
			}
		});
		$('button#agregar').click(function(){
			window.location.href = '#gantt';
		});
	</script>
	<!-- end  : AJAX SCRIPTS -->
	<!-- start : Actividades del Proyecto -->
	<script>
		$('a[id*=\'proyecto_\']').click( function (){
			var target = $(this).attr('id').split('_')[1];
			$('#id-proyecto-escondido').val(target);

			/*  */
			parametros:{
				parametros = {
					"parent" : target
				}
				// alert(JSON.stringify(parametros));
				jQuery.ajax({
					data: parametros,
					url: '<?php echo $Path ?>assets/ajax/Proyecto/Asignacion de Recursos/task.php',
					type: 'post',
					dataType: 'json',
					success: function(respuesta){ 
						var proyecto = respuesta[respuesta.length-1];
						respuesta.pop();
						// alert(JSON.stringify(respuesta.length));
						// alert(JSON.stringify(proyecto));
						$('#tbody-asignacion-de-recursos').empty();
						$('#modal-title').empty().append('<i class="clip-clipboard teal"></i> ' + proyecto['text']);
						$('#proyecto-id').val(target);
						// $('#fecha-inicio-escondido-editar').val(respuesta['start_date']);
						respuesta.forEach(function(entry) {
							var fecha_inicio = entry['start_date'].split('-');
							var fi = fecha_inicio[2]+'/'+fecha_inicio[1]+'/'+fecha_inicio[0];
							$('#tbody-asignacion-de-recursos').append('<tr>'
										+'<td style="text-align: center;">'+entry['id']+'</td>'
										+'<td style="text-align: center;">'+entry['text']+'</td>'
										+'<td style="text-align: center;">'+fi+'</td>'
										+'<td style="text-align: center;">'+entry['duration']+' Días</td>'
										+'<td style="text-align: center;">'+Math.round(entry['progress']*100)+'%</td>'
										+'<td style="width: 50px;" >'
											+'<a id="task_'+entry['id']+'" class="btn btn-primary tooltips" href="#asignacion-de-recurso" data-toggle="modal" ><i class="clip-pencil"></i></a>'
										+'</td>'
										+'<td style="width: 50px;" >'
											+'<a id="tasklist_'+entry['id']+'" class="btn btn-orange" href="#lista-de-recursos" data-toggle="modal"><i class="clip-folder"></i></a>'
										+'</td>'
									+'</tr>');
							// var f = entry['fecha'].split('-');
							// feriados.push(new Date(parseInt(f[0]), parseInt(f[1])-1, parseInt(f[2])));
						});
						/* Click Boton Asignar Recurso */
							$('[id*=\'task_\']').click(function (){
								var actividad = $(this).attr('id').split('_')[1];

								parametros:{
									parametros = {
										"id" : actividad
									}
									// alert(JSON.stringify(parametros));
									jQuery.ajax({
										data: parametros,
										url: '<?php echo $Path ?>assets/ajax/Proyecto/Asignacion de Recursos/actividad.php',
										type: 'post',
										dataType: 'json',
										success: function(respuesta){ 
											$('#actividad-id').val(actividad);
											$('#asignacion-de-recurso-titulo').empty().append('<i class="clip-clipboard teal"></i>&nbsp; '+respuesta['text']);
										},error: function(e){
											console.log(e);
										}
									});
								}
							});
						/* Click Boton Asignar Recurso */

						/* Click Boton Lista de Recursos Asignados */
							$('a[id*=\'tasklist_\']').click( function (){
								var target = $(this).attr('id').split('_')[1];

								parametros:{
									parametros = {
										"actividad" : target
									}
									// alert(JSON.stringify(parametros));
									jQuery.ajax({
										data: parametros,
										url: '<?php echo $Path ?>assets/ajax/Proyecto/Asignacion de Recursos/actividad-lista.php',
										type: 'post',
										dataType: 'json',
										success: function(respuesta){ 
											// alert(JSON.stringify(respuesta));
											$('#tbody-tabla-recursos-humanos').empty();
											$('#tbody-tabla-recursos-materiales').empty();

											var lrh = respuesta[0];
											var lrm = respuesta[1];
											// alert(JSON.stringify(lrh));
											// alert(JSON.stringify(lrm));
											
											lrh.forEach(function (entry){
												$('#tbody-tabla-recursos-humanos').append(''
													+'<tr>'
														/*+'<td style="text-align: center;">'+entry['id']+'</td>'*/
														+'<td style="text-align: center;">'+entry['p_nombre']+' '+entry['nombre']+' '+entry['apellido']+'</td>'
														+'<td style="width: 50px;" >'
															+'<a id="rh-delete_'+entry['id']+'" class="btn btn-danger" href="#delete-arh-confirm" data-toggle="modal"><i class="clip-cancel-circle-2"></i></a>'
														+'</td>'
													+'</tr>');
											});

											lrm.forEach(function (entry){
												$('#tbody-tabla-recursos-materiales').append(''
													+'<tr>'
														/*+'<td style="text-align: center;">'+entry['id']+'</td>'*/
														+'<td style="text-align: center;">'+entry['nombre']+'</td>'
														+'<td style="text-align: center;">'+entry['cantidad']+'</td>'
														+'<td style="width: 50px;" >'
															+'<a id="rm-edit_'+entry['id']+'" class="btn btn-primary tooltips" href="#editar-asignacion-de-recurso" data-toggle="modal" ><i class="clip-pencil-3"></i></a>'
														+'</td>'
														+'<td style="width: 50px;" >'
															+'<a id="rm-delete_'+entry['id']+'" class="btn btn-danger" href="#delete-arm-confirm" data-toggle="modal"><i class="clip-cancel-circle-2"></i></a>'
														+'</td>'
													+'</tr>');
											});
											/* Click Boton Editar Asignacion de Recurso Material */
												$('a[id*=\'rm-edit_\']').click(function (){
													var id_asignacion_de_recurso = $(this).attr('id').split('_')[1];

													parametros : {
														parametros = {
															"asignacion-recurso-id" : id_asignacion_de_recurso
														}
														// alert(JSON.stringify(parametros));
														jQuery.ajax({
															data: parametros,
															url: '<?php echo $Path ?>assets/ajax/Proyecto/Asignacion de Recursos/recurso-asignado-rm.php',
															type: 'post',
															dataType: 'json',
															success: function(respuesta){ 
																// alert(JSON.stringify(respuesta));
																$('#id-asignacion-recurso-material').val(respuesta['id']);
																$('#titulo-recuros-editar').empty().append('<i class="clip-clipboard teal"></i>&nbsp; Cantidad de '+respuesta['nombre']+' en la Actividad '+respuesta['text']);
																$('#editar-cantidad').attr('min','1').attr('max',respuesta['rm_cantidad']).val(respuesta['cantidad']);
															},error: function(e){
																console.log(e);
															}
														});
													}
												});
												
												$('#actualziar-cantidad').click(function (){
													parametros : {
														parametros = {
															"id"      : $('#id-asignacion-recurso-material').val(),
															"cantidad": $('#editar-cantidad').val()
														}
														// alert(JSON.stringify(parametros));
														jQuery.ajax({
															data: parametros,
															url: '<?php echo $Path ?>assets/ajax/Proyecto/Asignacion de Recursos/edit-recurso-material-asignado.php',
															type: 'post',
															dataType: 'json',
															success: function(respuesta){ 
																location.reload();
															},error: function(e){
																console.log(e);
															}
														});
													}
												});

											/* Click Boton Editar Asignacion de Recurso Material */
											/* Click Boton Eliminar Asignacion de Recurso Material */
												$('a[id*=\'rm-delete_\']').click(function (){
													var id_asignacion_de_recurso = $(this).attr('id').split('_')[1];
													parametros : {
														parametros = {
															"asignacion-recurso-id" : id_asignacion_de_recurso
														}
														// alert(JSON.stringify(parametros));
														jQuery.ajax({
															data: parametros,
															url: '<?php echo $Path ?>assets/ajax/Proyecto/Asignacion de Recursos/recurso-asignado.php',
															type: 'post',
															dataType: 'json',
															success: function(respuesta){ 
																$('#arm-elimnar').empty().append(''
																	+'<tr>'
																		+'<td style="text-align: center;">'+respuesta['nombre']+'</td>'
																		+'<td style="text-align: center;">'+respuesta['cantidad']+'</td>'
																	+'</tr>');
																$('#arm-id').val(respuesta['id']);
																// 
																// 
																// 
																	$('#aceptar-eliminacion-de-recurso-material').click(function (){
																		parametros : {
																			parametros = {
																				"id" : $('#arm-id').val()
																			}
																			// alert(JSON.stringify(parametros));
																			jQuery.ajax({
																				data: parametros,
																				url: '<?php echo $Path ?>assets/ajax/Proyecto/Asignacion de Recursos/delete-arm.php',
																				type: 'post',
																				dataType: 'json',
																				success: function(respuesta){ 
																					location.reload();
																				},error: function(e){
																					console.log(e);
																				}
																			});
																		}
																	});
																// 
																// 
																// 
															},error: function(e){
																console.log(e);
															}
														});
													}
												});
											/* Click Boton Eliminar Asignacion de Recurso Material */
											/* Click Boton Eliminar Asignacion de Recurso Humano */
												$('a[id*=\'rh-delete_\']').click(function (){
													var id_asignacion_de_recurso = $(this).attr('id').split('_')[1];
													parametros : {
														parametros = {
															"asignacion-recurso-id" : id_asignacion_de_recurso
														}
														// alert(JSON.stringify(parametros));
														jQuery.ajax({
															data: parametros,
															url: '<?php echo $Path ?>assets/ajax/Proyecto/Asignacion de Recursos/recurso-asignado-rh.php',
															type: 'post',
															dataType: 'json',
															success: function(respuesta){ 
																$('#arh-elimnar').empty().append(''
																	+'<tr>'
																		+'<td style="text-align: center;">'+respuesta['p_nombre']+' '+respuesta['nombre']+' '+respuesta['apellido']+'</td>'
																	+'</tr>');
																$('#arh-id').val(respuesta['id']);
																// 
																// 
																// 
																	$('#aceptar-eliminacion-de-recurso-humano').click(function (){
																		parametros : {
																			parametros = {
																				"id" : $('#arh-id').val()
																			}
																			// alert(JSON.stringify(parametros));
																			jQuery.ajax({
																				data: parametros,
																				url: '<?php echo $Path ?>assets/ajax/Proyecto/Asignacion de Recursos/delete-arh.php',
																				type: 'post',
																				dataType: 'json',
																				success: function(respuesta){ 
																					location.reload();
																				},error: function(e){
																					console.log(e);
																				}
																			});
																		}
																	});
																// 
																// 
																// 
															},error: function(e){
																console.log(e);
															}
														});
													}
												});
											/* Click Boton Eliminar Asignacion de Recurso Humano */
										},error: function(e){
											console.log(e);
										}
									});
								}
							});
						/* Click Boton Lista de Recursos Asignados */
					},error: function(e){
						console.log(e);
					}
				});
			}
		});
	</script>
	<!-- end   : Actividades del Proyecto -->
	<!-- start : Asignacion de Recursos -->
	<script>
		$('#tipos-de-recursos').change( function (){
			/*  */
			parametros:{
				parametros = {
					"tipo-de-recurso" : $(this).val()
				}
				// alert(JSON.stringify(parametros));
				jQuery.ajax({
					data: parametros,
					url: '<?php echo $Path ?>assets/ajax/Proyecto/Asignacion de Recursos/recursos.php',
					type: 'post',
					dataType: 'json',
					success: function(respuesta){ 
						// alert(JSON.stringify(respuesta));
						var tipo = $('#tipos-de-recursos').val();
						if (tipo == '')
						{
							$('#div-recursos, #div-cantidad').attr('style','display:none;');
						}
						else
						{
							$('#div-recursos').attr('style','');
							if (tipo == 'rm') 
							{
								$('#recursos').empty().append('<option value=""></option>').select2('val','');
								respuesta.forEach(function (entry){
									$('#recursos').append('<option value="'+entry['id']+'">'+entry['nombre']+'</option>');
								});
								$('#div-cantidad').attr('style','display:none;');
							}
							else
							{
								$('#recursos').empty().append('<option value=""></option>').select2('val','');
								respuesta.forEach(function (entry){
									$('#recursos').append('<option value="'+entry['id']+'">'+entry['p_nombre']+' '+entry['nombre']+' '+entry['apellido']+'</option>');
								});
								$('#div-cantidad').attr('style','display:none;');
							};
						}
					},error: function(e){
						console.log(e);
					}
				});
			}
			/*  */
		});
		
		$('#recursos').change( function (){
			/*  */
			parametros:{
				parametros = {
					"tipos-de-recursos": $('#tipos-de-recursos').val(),
					"recurso"          : $(this).val()
				}
				// alert(JSON.stringify(parametros));
				jQuery.ajax({
					data: parametros,
					url: '<?php echo $Path ?>assets/ajax/Proyecto/Asignacion de Recursos/recurso-cantidad.php',
					type: 'post',
					dataType: 'json',
					success: function(respuesta){ 
						// alert(JSON.stringify(respuesta));
						var tipo = $('#tipos-de-recursos').val();
						switch(tipo) {
							case 'rm':
								$('#div-cantidad').attr('style','');
								$('#cantidad').attr('min','1').attr('max',respuesta['cantidad']);
								break;
							case 'rh':
								$('#div-cantidad').attr('style','display:none;');
								$('#cantidad').val(0);
								break;
						}
					},error: function(e){
						console.log(e);
					}
				});
			}
			/*  */
		});

		$('#ok').click( function (){
			/*  */
			parametros:{
				parametros = {
					"proyecto"         : $('#proyecto-id').val(),
					"actividad"        : $('#actividad-id').val(),
					"tipos-de-recursos": $('#tipos-de-recursos').val(),
					"recurso"          : $('#recursos').val(),
					"cantidad"         : $('#cantidad').val(),
				}
				// alert(JSON.stringify(parametros));
				jQuery.ajax({
					data: parametros,
					url: '<?php echo $Path ?>assets/ajax/Proyecto/Asignacion de Recursos/asignacion-de-recurso.php',
					type: 'post',
					dataType: 'json',
					success: function(respuesta){ 
						location.reload();
					},error: function(e){
						console.log(e);
					}
				});
			}
			/*  */
		});
	</script>
	<!-- end   : Asignacion de Recursos -->
	<!-- start : Lista de Recursos -->
	<script>
		$('a[id*=\'tasklist_\']').click( function (){
			var target = $(this).attr('id').split('_')[1];

			parametros:{
				parametros = {
					"actividad" : target
				}
				// alert(JSON.stringify(parametros));
				jQuery.ajax({
					data: parametros,
					url: '<?php echo $Path ?>assets/ajax/Proyecto/Asignacion de Recursos/actividad.php',
					type: 'post',
					dataType: 'json',
					success: function(respuesta){ 
						// alert(JSON.stringify(respuesta));
					},error: function(e){
						console.log(e);
					}
				});
			}
			/*  */
		});
	</script>
	<!-- end   : Lista de Recursos -->
	<!-- start : Plugins  -->
	<script>
		$('#descripcion').autosize();
		$(".search-select").select2({
			placeholder: "Seleccione un valor",
			allowClear: true
		});
		$("#cantidad, #editar-cantidad").mask("9?999999");
	</script>
	<!-- end  : Plugins -->
<!-- end  : SCRIPT -->
