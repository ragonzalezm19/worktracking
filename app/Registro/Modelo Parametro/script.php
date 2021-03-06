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
			parametros:{
				parametros = {
					""         : $('#').val()
				}
				// alert(JSON.stringify(parametros));
				jQuery.ajax({
					data: parametros,
					url: '<?php echo $Path ?>assets/ajax/Parametros/Modelo Parametros/add.php',
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
					url: '<?php echo $Path ?>assets/ajax/Parametros/Actividades/edit.php',
					type: 'post',
					dataType: 'json',
					success: function(respuesta){
						$('#modal-title').empty().append('<i class="flaticon-person128 teal"></i> Actividad No. ' + respuesta['id']);
						$('#nombre_e').val(respuesta['nombre']);
						$('#descripcion_e').val(respuesta['descripcion']);
						$('#condicion_e').select2("val",respuesta['condicion_id']);
						$('#escala_e').select2("val",respuesta['escala_id']);
						$('#entrega_e').select2("val",respuesta['entrega_id']);
						$('#especialidad_e').select2("val",respuesta['especialidad_id']);
						$('#cliente_e').select2("val",respuesta['cliente_id']);
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
			parametros:{
				parametros = {
					"id"          : $('#id-escondido-editar').val(),
					"nombre"      : $('#nombre_e').val(),
					"descripcion" : $('#descripcion_e').val(),
					"condicion"   : $('#condicion_e').val(),
					"escala"      : $('#escala_e').val(),
					"entrega"     : $('#entrega_e').val(),
					"especialidad": $('#especialidad_e').val()
				}
				// alert(JSON.stringify(parametros));
				jQuery.ajax({
					data: parametros,
					url: '<?php echo $Path ?>assets/ajax/Parametros/Actividades/update.php',
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
					url: '<?php echo $Path ?>assets/ajax/Parametros/Actividades/status.php',
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
					url: '<?php echo $Path ?>assets/ajax/Parametros/Actividades/update-status.php',
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