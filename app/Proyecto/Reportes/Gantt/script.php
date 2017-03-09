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
	<script>
		jQuery(document).ready(function() {
			Main.init();
			UIModals.init();
		});
		$('button[id*="export-PDF"]').click(function (){
			var i  = $(this).attr('id');
			var id = parseInt(i.split('_')[1]);
			var p  = parseInt(i.split('_')[2]);
			window.open('../../../../assets/reports/gantt-informacion.php?id='+id+'&p='+p,'_blank');
		});
		$('button[id*="export-PNG"]').click(function (){
			var i  = $(this).attr('id');
			var id = parseInt(i.split('_')[1]);
			var p  = parseInt(i.split('_')[2]);
			window.open('../../../../assets/reports/gantt-informacion.php?id='+id+'&p='+p,'_blank');
		});
	</script>
	<!-- start : Gantt -->
	<script>
			/*var target = $(this).attr('id').split('_')[1];
			$('#id-escondido-editar').val(target);*/

			/*  AJAX para obtener la informacon del proyecto*/
			parametros:{
				parametros = {
					"id" : $('#id-escondido-editar').val()
				}
				// alert(JSON.stringify(parametros));
				jQuery.ajax({
					data: parametros,
					url: '<?php echo $Path ?>assets/ajax/Proyecto/Informacion de Actividades/info.php',
					type: 'post',
					dataType: 'json',
					success: function(respuesta){ 
						// alert(JSON.stringify(respuesta));
						$('#fecha-inicio-escondido-editar').val(respuesta['start_date']);
					},error: function(e){
						console.log(e);
					}
				});
			}
			/*  AJAX para obtener la informacon del proyecto*/

			/*  AJAX para obtener los feriados*/
			parametros:{
				jQuery.ajax({
					dataType: 'json',
					url: '<?php echo $Path ?>assets/ajax/Proyecto/Informacion de Actividades/holidays.php',
					success: function (respuesta) {
						// alert(JSON.stringify(respuesta));
						var feriados = [];
						respuesta.forEach(function(entry) {
							// alert(entry['fecha']);
							var f = entry['fecha'].split('-');
							feriados.push(new Date(parseInt(f[0]), parseInt(f[1])-1, parseInt(f[2])));
						});

						for(var i=0; i < feriados.length; i++){
							gantt.setWorkTime({
								date:feriados[i],
								hours:false
							});
						}
					}
				});
			}
			/*  AJAX para obtener los feriados*/

			/*  Definiendo lo que va en el menu  */
			/*gantt.config.columns =  [
				{name:"text",       label:"Task name", resize:true,  tree:true, width:'*' },
				{name:"holder",     label:"Holder",     align: "center" },
				{name:"start_date", label:"Start time", align: "center" },
				{name:"add",        label:"",           width:44 }
			];*/
			/*  Definiendo lo que va en el menu  */

			/*  Friados  */
			/*var holidays = [
				new Date(2015, 0, 1),
				new Date(2015, 0, 28),
				new Date(2015, 1, 17),
				new Date(2015, 3, 16),
				new Date(2015, 4, 26),
				new Date(2015, 6, 4),
				new Date(2015, 8, 1),
				new Date(2015, 9, 13),
				new Date(2015, 10, 11),
				new Date(2015, 10, 27),
				new Date(2015, 11, 25)
			];*/

			// alert(r);

			/*for(var i=0; i < holidays.length; i++){
				gantt.setWorkTime({
					date:holidays[i],
					hours:false
				});
			}*/

			/*  Feriados  */

			/*var dateToStr = gantt.date.date_to_str("%d %F");
			dhtmlx.message("Following holidays are excluded from working time:");
			for(var i =0; i < holidays.length; i++){
				setTimeout(
					(function(i){
						return function(){
							dhtmlx.message(dateToStr(holidays[i]))
						} })(i)
					,
					(i+1)*600
				);
			}*/

			gantt.config.work_time = true;

			function setScaleConfig(value){
				switch (value) {
					case "1":
						gantt.config.scale_unit = "day";
						gantt.config.step = 1;
						gantt.config.date_scale = "%d, %M";
						gantt.config.subscales = [];
						gantt.config.scale_height = 27;
						gantt.templates.date_scale = null;
						break;
					case "2":
						var weekScaleTemplate = function(date){
							var dateToStr = gantt.date.date_to_str("%d, %M");
							var endDate = gantt.date.add(gantt.date.add(date, 1, "week"), -1, "day");
							return dateToStr(date) + " - " + dateToStr(endDate);
						};

						gantt.config.scale_unit = "week";
						gantt.config.step = 1;
						gantt.templates.date_scale = weekScaleTemplate;
						gantt.config.subscales = [
							{unit:"day", step:1, date:"%d, %D" }
						];
						gantt.config.scale_height = 60;
						break;
					case "3":
						gantt.config.scale_unit = "month";
						gantt.config.date_scale = "%F, %Y";
						gantt.config.subscales = [
							{unit:"day", step:1, date:"%j, %D" }
						];
						gantt.config.scale_height = 60;
						gantt.templates.date_scale = null;
						break;
					case "4":
						gantt.config.scale_unit = "year";
						gantt.config.step = 1;
						gantt.config.date_scale = "%Y";
						gantt.config.min_column_width = 70;

						gantt.config.scale_height = 50;
						gantt.templates.date_scale = null;

						
						gantt.config.subscales = [
							{unit:"month", step:1, date:"%M" }
						];
						break;
				}
			}

			setScaleConfig('2');
			
			$('.square-green').on('ifClicked', function(event){
				setScaleConfig($(this).val());
				gantt.render();
			});


			var date_to_str = gantt.date.date_to_str(gantt.config.task_date);

			gantt.config.xml_date = "%Y-%m-%d %H:%i";
			gantt.config.fit_tasks = true;
			// Solo lectura
			gantt.config.readonly = true;
			gantt.config.grid_width = 0;
			gantt.init("gantt_here");

			/*var weekScaleTemplate = function(date){
				var dateToStr = gantt.date.date_to_str("%d %M");
				var weekNum = gantt.date.date_to_str("(week %W)");
				var endDate = gantt.date.add(gantt.date.add(date, 1, "week"), -1, "day");
				return dateToStr(date) + " - " + dateToStr(endDate) + " " + weekNum(date);
			};

			gantt.config.subscales = [
				{unit:"month", step:1, date:"%F, %Y"},
				{unit:"week", step:1, template:weekScaleTemplate}

			];*/

			/*  Diferenciando los dias fines de semanas a los demas dias */
			gantt.templates.task_cell_class = function(task, date){
				if(!gantt.isWorkTime(date))
					return "week_end";
				return "";
			};
			/*  Diferenciando los dias fines de semanas a los demas dias */

			/*  % de Progreso en la barra */
			/*gantt.templates.progress_text = function(start, end, task){
				return "<span style='text-align:left;'>"+Math.round(task.progress*100)+ "% </span>";
			};*/
			/*  % de Progreso en la barra */

			/*  Asignacion de colores pra actividades por estado  */
			gantt.templates.grid_row_class = function(item) {
				if (item.progress  == 0) return "red";
				if (item.progress >= 1) return "green";
			};

			gantt.templates.task_row_class = function(start_date, end_date, item) {
				if (item.progress  == 0) return "red";
				if (item.progress >= 1) return "green";
			};
			/*  Asignacion de colores pra actividades por estado  */

			/*  Quick Info  */
			gantt.templates.quick_info_content = function(start, end, task){ 
				return '<strong>Progreso: </strong>'+Math.round(task.progress*100)+'%';
			};
			/*  Quick Info  */

			/*  Tooltips  */
			gantt.templates.tooltip_date_format = function (date){
				var formatFunc = gantt.date.date_to_str("%d-%m-%Y");
				return formatFunc(date);
			};

			gantt.templates.tooltip_text = function(start,end,task){
				var mensaje = '<strong>Nombre: </strong>' + task.text + '<br>' +
									'<strong>Fecha de Inicio: </strong>' + gantt.templates.tooltip_date_format(start) + '<br>' +
									'<strong>Fecha de Fin: </strong>' + gantt.templates.tooltip_date_format(end) + '<br>' +
									'<strong>Progreso: </strong>'+Math.round(task.progress*100)+'%';
				return mensaje;
			};
			/*  Tooltips  */

			/**/
			gantt.templates.grid_folder = function(item) {
				return "<div class='gantt_tree_icon gantt_folder_" +
				(item.$open ? "open" : "closed") + "'></div>";
			};
			/**/

			gantt.attachEvent("onTaskLoading", function(task){
				var id_gantt = $('#id-escondido-editar').val();
				gantt.open(id_gantt);
				var anno = parseInt($('#fecha-inicio-escondido-editar').val().split('-')[0]);
				var mes  = parseInt($('#fecha-inicio-escondido-editar').val().split('-')[1]);
				var dia  = parseInt($('#fecha-inicio-escondido-editar').val().split('-')[2]);

				if(task.id == id_gantt ||task.parent == id_gantt )
				{
					return true;
				}

				var start = new Date(anno, (mes-1), dia);
				gantt.addMarker({
					start_date: start,
					css: "status_line",
					text: "*",
					title:"Start project: "+ date_to_str(start)
				});

				var t = new Date();
				var today = new Date(t.getFullYear(), t.getMonth(), t.getDate());
				gantt.addMarker({
					start_date: today,
					css: "today",
					text: "Hoy",
					title:"Today: "+ date_to_str(today)
				});
			});

			/*  Al arrastrar el proyecto, se aarastran las actividades de el*/
			gantt.attachEvent("onTaskDrag", function(id, mode, task, original){
				var modes = gantt.config.drag_mode;
				if(mode == modes.move){
					var diff = task.start_date - original.start_date;
					gantt.eachTask(function(child){
						if(child.$source.length != 0 || child.$target.length != 0){
							child.start_date = new Date(+child.start_date + diff);
							child.end_date = new Date(+child.end_date + diff);
							gantt.refreshTask(child.id, true);
						}
					},id );
				}
				return true;
			});
			/*  Al arrastrar el proyecto, se aarastran las actividades de el*/

			var dp = new dataProcessor("<?php echo $Path ?>assets/plugins/DhtmlxGantt_v3.1.1_gpl/data.php");
			gantt.load('<?php echo $Path ?>assets/plugins/DhtmlxGantt_v3.1.1_gpl/data.php')
			dp.init(gantt);
	</script>
	<!-- end   : Gantt -->
<!-- end  : SCRIPT -->
