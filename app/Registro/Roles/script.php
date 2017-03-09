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
	<!-- <script src="<?php echo $Path; ?>/DataTables-1.10.4/media/js/jquery.dataTables.js"></script> -->

	<script src="<?php echo $Path; ?>assets/js/main.js"></script>

	<script src="<?php echo $Path; ?>assets/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
	<script src="<?php echo $Path; ?>assets/js/ui-modals.js"></script>

	<script src="<?php echo $Path; ?>assets/plugins/autosize/jquery.autosize.min.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/select2/select2.min.js"></script>
	<script src="validation.js"></script>
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
		// Guardado en base de datos
		$('button#agregar').click(function () 
		{
			if (Validacion()){
				parametros:{
					parametros = {
						"descripcion": $('#descripcion').val(),
						"acceso"     : $('#acceso').val(),
						"permisos"   : $('#permisos').val(),
						"seguimiento": $('#seguimiento').val(),
					}
					alert(JSON.stringify(parametros));
					jQuery.ajax({
						data: parametros,
						url: '<?php echo $Path ?>assets/ajax/Registro/Roles/add.php',
						type: 'post',
						dataType: 'json',
						success: function(respuesta){ 
							location.reload();
							// alert(JSON.stringify(respuesta));
							// alert(respuesta[0]);
						},error: function(e){
							console.log(e);
						}
					});
				}
			}else{
				ShowError();
			};
		});
		// Cargar informacion para editar
		$('a[href="#editar"]').click(function () 
		{
			parametros:{
				parametros = {
					"ID" : $(this).attr('id').split('_')[1]
				}
				// alert(JSON.stringify(parametros));
				jQuery.ajax({
					data: parametros,
					url: '<?php echo $Path ?>assets/ajax/Registro/Roles/edit.php',
					type: 'post',
					dataType: 'json',
					success: function(respuesta){
						// alert(JSON.stringify(respuesta));
						$('#modal-title').empty().append('<i class="fa fa-male teal"></i> Rol de Usuario No. ' + respuesta['id']);
						$('#descripcion_e').val(respuesta['descripcion']);
						var Submenu = respuesta[0];
						var s = Array();
						if (respuesta['parametros'] != null && respuesta['registros'] != null) 
						{
							var acceso = Array();
							if (respuesta['parametros'] != '' && respuesta['registros'] == '') 
							{
								var acceso = respuesta['parametros'].split(';');
							} 
							else if(respuesta['parametros'] == '' && respuesta['registros'] != '')
							{
								var acceso = respuesta['registros'].split(';');
							}
							else
							{
								var acceso = (respuesta['parametros']+';'+respuesta['registros']).split(';');
							}
							// var acceso = (respuesta['parametros']+';'+respuesta['registros']).split(';');
							// alert(JSON.stringify(acceso));
							for (var i = 0; i < Submenu.length; i++) {
								if (acceso.indexOf(Submenu[i]['nombre']) > -1) 
								{
									// alert(Submenu[i]['nombre']);
									s.push(Submenu[i]['id']);
								};
							};
						}
						var r = Array();
						if (respuesta['crear'] == 1) 
						{
							r.push("CR");
						};
						if (respuesta['leer'] == 1) 
						{
							r.push("LE");
						};
						if (respuesta['editar'] == 1) 
						{
							r.push("ED");
						};
						if (respuesta['eliminar'] == 1) 
						{
							r.push("EL");
						};
						var f = Array();
						if (respuesta['seguimiento'] != null) 
						{
							var seguimiento = respuesta['seguimiento'].split(';');
						}
						for (var i = 0; i < seguimiento.length; i++) {
							if (seguimiento[i] == 'Creado') 
							{
								f.push("CRE");
							}
							else if (seguimiento[i] == 'Editado')
							{
								f.push("EDI")
							};
							seguimiento[i]
						};
						$('#permisos_e').select2("val",r);
						$('#acceso_e').select2("val",s);
						$('#seguimiento_e').select2("val",f);
						$('#id-escondido-editar').val(respuesta['id']);
					},error: function(e){
						console.log(e);
					}
				});
			}
		});
		// Actualizar informacion
		$('#actualizar').click(function () 
		{
			if (ValidacionEditar()){
				parametros:{
					parametros = {
						"id"         : $('#id-escondido-editar').val(),
						"descripcion": $('#descripcion_e').val(),
						"acceso"     : $('#acceso_e').val(),
						"permisos"   : $('#permisos_e').val(),
						"seguimiento": $('#seguimiento_e').val()
					}
					// alert(JSON.stringify(parametros));
					jQuery.ajax({
						data: parametros,
						url: '<?php echo $Path ?>assets/ajax/Registro/Roles/update.php',
						type: 'post',
						dataType: 'json',
						success: function(respuesta){
							parametros:{
								parametros = {
									"id" : $('#id-escondido-editar').val()
								}
								// alert(JSON.stringify(parametros));
								jQuery.ajax({
									data: parametros,
									url: '<?php echo $Path ?>assets/ajax/rol-update-in-time.php',
									type: 'post',
									dataType: 'json',
									success: function(respuesta){
										// alert(JSON.stringify(respuesta));
										location.reload();
									},error: function(e){
										console.log(e);
									}
								});
							}
						},error: function(e){
							console.log(e);
						}
					});
				}
			}else{
				ShowErrorEdit()
			};
		});
		// Cargar informacion para cambiar estado
		$('a[href="#estado"]').click(function () 
		{
			parametros:{
				parametros = {
					"ID" : $(this).attr('id').split('_')[1]
				}
				//alert(JSON.stringify(parametros));
				jQuery.ajax({
					data: parametros,
					url: '<?php echo $Path ?>assets/ajax/Registro/Actividades/status.php',
					type: 'post',
					dataType: 'json',
					success: function(respuesta){
						var aviso = "¿Seguro desea "
						$('#id-escondido-estado').val('').val(respuesta['id']);
						if (respuesta['estado'] == 1)
						{
							$('#aviso').empty().append(aviso + 'dehabilitar?');
							$('#estado-accion').removeClass().addClass('btn btn-danger').empty().append('Deshabilitar');
							$('#estado-a-cambiar-escondido-estado').val('').val(0);
						}
						else
						{
							$('#aviso').empty().append(aviso + 'habilitar?');
							$('#estado-accion').removeClass().addClass('btn btn-success').empty().append('Habilitar');
							$('#estado-a-cambiar-escondido-estado').val('').val(1);
						}
					},error: function(e){
						console.log(e);
					}
				});
			}
		});
		// Asignacion de estado 
		$('button#estado-accion').click(function () 
		{
			parametros:{
				parametros = {
					"id"    : $('#id-escondido-estado').val(),
					"estado": $('#estado-a-cambiar-escondido-estado').val(),
				}
				// alert(JSON.stringify(parametros));
				jQuery.ajax({
					data: parametros,
					url: '<?php echo $Path ?>assets/ajax/Registro/Actividades/update-status.php',
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
	</script>
	<!-- end  : AJAX SCRIPTS -->
	<!-- start : Plugins  -->
	<script>
		$("#descripcion").autosize();
		$("#descripcion_e").autosize();
		$(".search-select").select2({
			placeholder: "Seleccione un valor",
			allowClear: true
		});
	</script>
	<!-- end  : Plugins -->
<!-- end  : SCRIPT -->