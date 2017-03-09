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
	
	<script src="<?php echo $Path; ?>assets/plugins/select2/select2.min.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
	<script src="validation.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			UIModals.init();
		});
		$('a[href="#editar"]').click(function ()
		{
			$('#div-cambiar-clave').removeClass('col-md-offset-6').addClass('col-md-offset-6');
			$('#div-clave').attr("style","").attr("style","display: none;");
		})
		// Cambio de Contraseña
		$('#aceptar-cambio-clave').click(function ()
		{
			$('#div-cambiar-clave').removeClass('col-md-offset-6');
			$('#div-clave').attr("style","");
			$('#clave_e').val($('#nueva-clave').val());
			$('#nueva-clave').val('');
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
						"nombre"                : $('#nombre').val(),
						"apellido"              : $('#apellido').val(),
						"pre-cedula"            : $('#pre-cedula').val(),
						"cedula"                : $('#cedula').val(),
						"direccion"             : $('#direccion').val(),
						"pre-telefono"          : $('#pre-telefono').val(),
						"telefono"              : $('#telefono').val(),
						"correo"                : $('#correo').val(),
						"profesion_id"          : $('#profesion').val(),
						"honorario"             : $('#honorario').val(),
						"clave"                 : $('#clave').val(),
						"usuario"               : $('#usuario').val(),
						"rol_id"                : $('#rol').val(),
						"numero-de-colegiatura" : $('#numero-de-colegiatura').val()
					}
					// alert(JSON.stringify(parametros));
					jQuery.ajax({
						data: parametros,
						url: '<?php echo $Path ?>assets/ajax/Registro/Recursos Humanos/add.php',
						type: 'post',
						dataType: 'json',
						success: function(respuesta){ 
							location.reload();
						},error: function(e){
							console.log(e);
						}
					});
				}
			}
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
					url: '<?php echo $Path ?>assets/ajax/Registro/Recursos Humanos/edit.php',
					type: 'post',
					dataType: 'json',
					success: function(respuesta){
						// alert(JSON.stringify(respuesta))
						$('#modal-title').empty().append('<i class="clip-users teal"></i> Usuario No. ' + respuesta['id']);
						$('#nombre_e').val('').val(respuesta['nombre']);
						$('#apellido_e').val('').val(respuesta['apellido']);
						$('#pre-cedula_e').select2("val",respuesta['cedula'].split('-')[0]);
						$('#cedula_e').val('').val(respuesta['cedula'].split('-')[1]);
						$('#direccion_e').val('').val(respuesta['direccion']);
						$('#pre-telefono_e').select2("val",respuesta['telefono'].split('-')[0]);
						$('#telefono_e').val('').val(respuesta['telefono'].split('-')[1]);
						$('#correo_e').val('').val(respuesta['correo']);
						$('#profesion_e').select2("val",respuesta['profesion_id']);
						$('#honorario_e').val('').val(respuesta['honorario']);
						$('#usuario_e').val('').val(respuesta['usuario']);
						$('#numero-de-colegiatura_e').val('').val(respuesta['numero_de_colegiatura']);
						$('#rol_e').select2("val",respuesta['rol_id']);
						$('#id-escondido-editar').val('').val(respuesta['id']);
					},error: function(e){
						console.log(e);
					}
				});
			}
		});
		// Actualizar informacion
		$('#actualizar').click(function () 
		{
			if (ValidacionEditar()) {
				parametros:{
					parametros = {
						"id"                    : $('#id-escondido-editar').val(),
						"nombre"                : $('#nombre_e').val(),
						"apellido"              : $('#apellido_e').val(),
						"pre-cedula"            : $('#pre-cedula_e').val(),
						"cedula"                : $('#cedula_e').val(),
						"direccion"             : $('#direccion_e').val(),
						"pre-telefono"          : $('#pre-telefono_e').val(),
						"telefono"              : $('#telefono_e').val(),
						"correo"                : $('#correo_e').val(),
						"profesion_id"          : $('#profesion_e').val(),
						"honorario"             : $('#honorario_e').val(),
						"clave"                 : $('#clave_e').val(),
						"usuario"               : $('#usuario_e').val(),
						"rol_id"                : $('#rol_e').val(),
						"numero-de-colegiatura" : $('#numero-de-colegiatura_e').val()
					}
					// alert(JSON.stringify(parametros));
					jQuery.ajax({
						data: parametros,
						url: '<?php echo $Path ?>assets/ajax/Registro/Recursos Humanos/update.php',
						type: 'post',
						dataType: 'json',
						success: function(respuesta){
							location.reload();
						},error: function(e){
							console.log(e);
						}
					});
				}
			}
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
					url: '<?php echo $Path ?>assets/ajax/Registro/Recursos Humanos/status.php',
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
					url: '<?php echo $Path ?>assets/ajax/Registro/Recursos Humanos/update-status.php',
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
		$("#profesion, #profesion_e").select2({
			placeholder: "Seleccione un valor",
			allowClear: true
		});
		$("#rol, #rol_e").select2({
			placeholder: "Seleccione un valor",
			allowClear: true
		});
		$("#pre-cedula, #pre-cedula_e").select2({
			placeholder: " ",
			allowClear: true
		});
		$("#pre-telefono, #pre-telefono_e").select2({
			placeholder: " ",
			allowClear: true
		});
		$("#telefono, #telefono_e").mask("9999999");
		$("#cedula, #cedula_e").mask("9999999?9");
		$("#honorario, #honorario_e").mask("9?99999999999");
	</script>
	<!-- end  : Plugins -->
<!-- end  : SCRIPT -->