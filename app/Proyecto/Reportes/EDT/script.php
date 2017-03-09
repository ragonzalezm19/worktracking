<!--[if lt IE 9]>
	<script src="assets/plugins/respond.min.js"></script>
	<script src="assets/plugins/excanvas.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
	<script src="<?php echo $Path; ?>assets/plugins/jQuery/jquery-2.1.1.js"></script>
<!--<![endif]-->
<!-- start: SCRIPT -->
	<!-- <script src="<?php echo $Path; ?>assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
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
	<script src="<?php echo $Path; ?>assets/js/table-data.js"></script> -->
	<!-- <script src="<?php echo $Path; ?>/DataTables-1.10.4/media/js/jquery.dataTables.js"></script> -->

	<!-- <script src="<?php echo $Path; ?>assets/js/main.js"></script>

	<script src="<?php echo $Path; ?>assets/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
	<script src="<?php echo $Path; ?>assets/js/ui-modals.js"></script>
 -->
	<!-- EDT -->
		<script type="text/javascript" src="plugin/demo/js/jquery/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="plugin/demo/js/jquery/jquery-ui-1.10.2.custom.js"></script>
		<script type="text/javascript" src="plugin/demo/jquerylayout/jquery.layout-latest.min.js"></script>
		<!-- <script type="text/javascript" src="plugin/demo/bootstrap/js/bootstrap.js"></script> -->
		<script type="text/javascript" src="plugin/demo/js/primitives.min.js?214"></script>
		<!-- <script type="text/javascript" src="plugin/demo/js/bporgeditor.min.js?214"></script> -->
	<!-- EDT -->

	<!-- <script>
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
	</script> -->
	<!-- start: AJAX SCRIPTS -->
	<!-- <script>
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
	</script> -->
	<!-- end  : AJAX SCRIPTS -->
	<!-- start : EDT  -->
	<!-- <script type='text/javascript'>//<![CDATA[ 

		$(window).load(function () {
			var styles = {
				width  : screen.width,
				height : screen.height-100
			};
			$("#centerpanel").css( styles );
			var options = new primitives.orgdiagram.Config();

			var items = [
				 new primitives.orgdiagram.ItemConfig({
					id: <?php echo $Proyecto['id'] ?>,
					parent: null,
					title: "<?php echo $Proyecto['pro_nombre'].' '.$Proyecto['rh_nombre'].' '.$Proyecto['apellido'] ?>",
					description: "VP, Public Sector",
					image: "plugin/demo/images/photos/a.png"
				}),
				new primitives.orgdiagram.ItemConfig({
					id: 2,
					parent: <?php echo $Proyecto['id'] ?>,
					title: "Ted Lucas",
					description: "VP, Human Resources",
					image: "plugin/demo/images/photos/b.png"
				}),
				new primitives.orgdiagram.ItemConfig({
					id: 3,
					parent: <?php echo $Proyecto['id'] ?>,
					title: "Joao Stuger",
					description: "Business Solutions, US",
					image: "plugin/demo/images/photos/c.png"
				})
			];

			options.items = items;
			options.cursorItem = 0;
			options.templates = [getContactTemplate()];
			options.hasSelectorCheckbox = primitives.common.Enabled.False;



			$("#centerpanel").orgDiagram(options);

			function getContactTemplate() {
					var result = new primitives.orgdiagram.TemplateConfig();
					result.itemSize = new primitives.common.Size(420, 120);
					return result;
				}
		});//]]>  

	 </script> -->
	<script type="text/javascript">
		jQuery(document).ready(function () {
			jQuery('body').layout(
			{
				center__paneSelector: "#contentpanel"
			});
		});
	</script>

	<script type="text/javascript">
		var orgDiagram = null;
		var treeItems = {};
		var contextidcounter = 0;
		var currentHighlightDataTreeItem = null;
		var currentCursorDataTreeItem = null;

		jQuery(document).ready(function () {
			jQuery.ajaxSetup({
				cache: false
			});

			jQuery('#contentpanel').layout(
			{
				center__paneSelector: "#centerpanel"
				, south__paneSelector: "#southpanel"
				, south__resizable: false
				, south__closable: false
				, south__spacing_open: 0
				, south__size: 50
				, west__size: 0
				, west__paneSelector: "#westpanel"
				, west__resizable: false
				, center__onresize: function () {
					if (orgDiagram != null) {
						jQuery("#centerpanel").orgDiagram("update", primitives.common.UpdateMode.Refresh);
					}
				}
			});

			jQuery("#Destroy").button();
			jQuery("#Destroy").click(function () {
				jQuery("#centerpanel").remove();
			});

			/* Page Fit Mode */
			var pageFitModes = jQuery("#pageFitMode");
			for (var key in primitives.common.PageFitMode) {
				var value = primitives.common.PageFitMode[key];
				pageFitModes.append(jQuery("<br/><label><input name='pageFitMode' type='radio' value='" + value + "' " + (value == primitives.common.PageFitMode.FitToPage ? "checked" : "") + " />" + key + "</label>"));
			};

			jQuery("input:radio[name=pageFitMode]").change(function () {
				Update(jQuery("#centerpanel"), primitives.common.UpdateMode.Refresh);
			});

			/* Vertical Items Alignmnet */
			var verticalAlignments = jQuery("#verticalAlignment");
			for (var key in primitives.common.VerticalAlignmentType) {
				var value = primitives.common.VerticalAlignmentType[key];
				verticalAlignments.append(jQuery("<br/><label><input name='verticalAlignment' type='radio' value='" + value + "' " + (value == primitives.common.VerticalAlignmentType.Middle ? "checked" : "") + " />" + key + "</label>"));
			};

			jQuery("input:radio[name=verticalAlignment]").change(function () {
				Update(jQuery("#centerpanel"), primitives.common.UpdateMode.Refresh);
			});

			/* Horizontal Children Alignmnet */
			var horizontalAlignments = jQuery("#horizontalAlignment");
			for (var key in primitives.common.HorizontalAlignmentType) {
				var value = primitives.common.HorizontalAlignmentType[key];
				horizontalAlignments.append(jQuery("<br/><label><input name='horizontalAlignment' type='radio' value='" + value + "' " + (value == primitives.common.HorizontalAlignmentType.Center ? "checked" : "") + " />" + key + "</label>"));
			};

			jQuery("input:radio[name=horizontalAlignment]").change(function () {
				Update(jQuery("#centerpanel"), primitives.common.UpdateMode.Refresh);
			});

			/* Connector Type */
			var connectorTypes = jQuery("#connectorType");
			for (var key in primitives.common.ConnectorType) {
				var value = primitives.common.ConnectorType[key];
				connectorTypes.append(jQuery("<br/><label><input name='connectorType' type='radio' value='" + value + "' " + (value == primitives.common.ConnectorType.Squared ? "checked" : "") + " />" + key + "</label>"));
			};

			jQuery("input:radio[name=connectorType]").change(function () {
				Update(jQuery("#centerpanel"), primitives.common.UpdateMode.Refresh);
			});

			/* Minimal Items Visibility */
			var pageFitModes = jQuery("#minimalVisibility");
			for (var key in primitives.common.Visibility) {
				var value = primitives.common.Visibility[key];
				pageFitModes.append(jQuery("<br/><label><input name='minimalVisibility' type='radio' value='" + value + "' " + (value == primitives.common.Visibility.Dot ? "checked" : "") + " />" + key + "</label>"));
			};

			jQuery("input:radio[name=minimalVisibility]").change(function () {
				Update(jQuery("#centerpanel"), primitives.common.UpdateMode.Refresh);
			});

			/* Selection Path Visibility Mode */
			var selectionPathModes = jQuery("#selectionPathMode");
			for (var key in primitives.common.SelectionPathMode) {
				var value = primitives.common.SelectionPathMode[key];
				selectionPathModes.append(jQuery("<br/><label><input name='selectionPathMode' type='radio' value='" + value + "' " + (value == primitives.common.SelectionPathMode.FullStack ? "checked" : "") + " />" + key + "</label>"));
			};

			jQuery("input:radio[name=selectionPathMode]").change(function () {
				Update(jQuery("#centerpanel"), primitives.common.UpdateMode.Refresh);
			});

			/* Children Placement Type */
			var childrenPlacementType = jQuery("#childrenPlacementType");
			for (var key in primitives.common.ChildrenPlacementType) {
				var value = primitives.common.ChildrenPlacementType[key];
				childrenPlacementType.append(jQuery("<br/><label><input name='childrenPlacementType' type='radio' value='" + value + "' " + (value == primitives.common.ChildrenPlacementType.Vertical ? "checked" : "") + " />" + key + "</label>"));
			};

			jQuery("input:radio[name=childrenPlacementType]").change(function () {
				Update(jQuery("#centerpanel"), primitives.common.UpdateMode.Refresh);
			});

			/* Leaves Placement Type */
			var leavesPlacementType = jQuery("#leavesPlacementType");
			for (var key in primitives.common.ChildrenPlacementType) {
				var value = primitives.common.ChildrenPlacementType[key];
				leavesPlacementType.append(jQuery("<br/><label><input name='leavesPlacementType' type='radio' value='" + value + "' " + (value == primitives.common.ChildrenPlacementType.Horizontal ? "checked" : "") + " />" + key + "</label>"));
			};

			jQuery("input:radio[name=leavesPlacementType]").change(function () {
				Update(jQuery("#centerpanel"), primitives.common.UpdateMode.Refresh);
			});

			/* Selection check box visibility mode */
			var hasSelectorCheckbox = jQuery("#hasSelectorCheckbox");
			for (var key in primitives.common.Enabled) {
				var value = primitives.common.Enabled[key];
				hasSelectorCheckbox.append(jQuery("<br/><label><input name='hasSelectorCheckbox' type='radio' value='" + value + "' " + (value == primitives.common.Enabled.False ? "checked" : "") + " />" + key + "</label>"));
			};

			jQuery("input:radio[name=hasSelectorCheckbox]").change(function () {
				Update(jQuery("#centerpanel"), primitives.common.UpdateMode.Refresh);
			});

			/* User Buttons Visibility mode */
			var hasButtons = jQuery("#hasButtons");
			for (var key in primitives.common.Enabled) {
				var value = primitives.common.Enabled[key];
				hasButtons.append(jQuery("<br/><label><input name='hasButtons' type='radio' value='" + value + "' " + (value == primitives.common.Enabled.False ? "checked" : "") + " />" + key + "</label>"));
			};

			jQuery("input:radio[name=hasButtons]").change(function () {
				Update(jQuery("#centerpanel"), primitives.common.UpdateMode.Refresh);
			});

			/* Setup & Load */
			orgDiagram = Setup(jQuery("#centerpanel"));

			LoadItems(jQuery("#centerpanel"));
		});

		function Setup(selector) {
			return selector.orgDiagram(GetOrgDiagramConfig());
			/**/
		}

		function Update(selector, updateMode) {
			selector.orgDiagram("option", GetOrgDiagramConfig());
			selector.orgDiagram("update", updateMode);
		}

		function GetOrgDiagramConfig() {
			var pageFitMode = parseInt(jQuery("input:radio[name=pageFitMode]:checked").val(), 10);
			var verticalAlignment = parseInt(jQuery("input:radio[name=verticalAlignment]:checked").val(), 10);
			var horizontalAlignment = parseInt(jQuery("input:radio[name=horizontalAlignment]:checked").val(), 10);
			var connectorType = parseInt(jQuery("input:radio[name=connectorType]:checked").val(), 10);
			var minimalVisibility = parseInt(jQuery("input:radio[name=minimalVisibility]:checked").val(), 10);
			var selectionPathMode = parseInt(jQuery("input:radio[name=selectionPathMode]:checked").val(), 10);
			var leavesPlacementType = parseInt(jQuery("input:radio[name=leavesPlacementType]:checked").val(), 10);
			var childrenPlacementType = parseInt(jQuery("input:radio[name=childrenPlacementType]:checked").val(), 10);
			var hasSelectorCheckbox = parseInt(jQuery("input:radio[name=hasSelectorCheckbox]:checked").val(), 10);
			var hasButtons = parseInt(jQuery("input:radio[name=hasButtons]:checked").val(), 10);

			var photoTemplateCheckbox = jQuery("#photoTemplate").prop("checked");
			var contactTemplateCheckbox = jQuery("#contactTemplate").prop("checked");

			var buttons = [];
			buttons.push(new primitives.orgdiagram.ButtonConfig("delete", "ui-icon-close", "Delete"));
			buttons.push(new primitives.orgdiagram.ButtonConfig("properties", "ui-icon-gear", "Info"));
			buttons.push(new primitives.orgdiagram.ButtonConfig("add", "ui-icon-person", "Add"));

			var templates = [];
			templates.push(getManagerTemplate());
			templates.push(getProjectTemplate());
			templates.push(getTaskTemplate());

			return {
				normalLevelShift: 20,
				dotLevelShift: 22,
				lineLevelShift: 10,
				normalItemsInterval: 20,
				dotItemsInterval: 12,
				lineItemsInterval: 5,
				pageFitMode: pageFitMode,
				verticalAlignment: verticalAlignment,
				horizontalAlignment: horizontalAlignment,
				connectorType: connectorType,
				minimalVisibility: minimalVisibility,
				hasSelectorCheckbox: hasSelectorCheckbox,
				selectionPathMode: selectionPathMode,
				childrenPlacementType: childrenPlacementType,
				leavesPlacementType: leavesPlacementType,
				hasButtons: hasButtons,
				buttons: buttons,
				// onButtonClick: onButtonClick,
				// onCursorChanging: onCursorChanging,
				// onCursorChanged: onCursorChanged,
				// onHighlightChanging: onHighlightChanging,
				// onHighlightChanged: onHighlightChanged,
				// onSelectionChanged: onSelectionChanged,
				itemTitleFirstFontColor: primitives.common.Colors.White,
				itemTitleSecondFontColor: primitives.common.Colors.White,
				onItemRender: onTemplateRender,
				templates: templates,
				labelSize: new primitives.common.Size(10, 14),
				labelPlacement: primitives.common.PlacementType.Bottom,
				labelOffset: 3
			};
		}

		function getManagerTemplate() {
			var result = new primitives.orgdiagram.TemplateConfig();
			result.name = "managerTemplate";

			result.itemSize = new primitives.common.Size(184, 94);
			result.minimizedItemSize = new primitives.common.Size(16, 6);
			result.highlightPadding = new primitives.common.Thickness(2, 2, 2, 2);


			var itemTemplate = jQuery(
			  '<div class="bp-item bp-corner-all bt-item-frame">'
				+ '<div name="titleBackground" class="bp-item bp-corner-all bp-title-frame" style="top: 2px; left: 2px; width: 180px; height: 20px;">'
					+ '<div name="title" class="bp-item bp-title" style="top: 3px; left: 6px; width: 208px; height: 18px;">'
					+ '</div>'
				+ '</div>'
				+ '<div class="bp-item bp-photo-frame" style="top: 26px; left: 2px; width: 50px; height: 60px;">'
					+ '<img name="photo" style="height:60px; width:50px;" />'
				+ '</div>'
				+ '<div name="name" class="bp-item" style="top: 26px; left: 56px; width: 250px; height: 30px; font-weight: bold; font-size: 12px;"></div>'
				// + '<div class="bp-item" style="top: 44px; left: 56px; width: 162px; height: 18px; font-size: 12px;"><a name="email" href="" target="_top"></a></div>'
				+ '<div name="description" class="bp-item" style="top: 44px; left: 56px; width: 162px; height: 36px; font-size: 10px;"></div>'
			+ '</div>'
			).css({
				width: result.itemSize.width + "px",
				height: result.itemSize.height + "px"
			});
			result.itemTemplate = itemTemplate.wrap('<div>').parent().html();

			return result;
		}

		function getProjectTemplate() {
			var result = new primitives.orgdiagram.TemplateConfig();
			result.name = "projectTemplate";

			result.itemSize = new primitives.common.Size(320, 120);
			result.minimizedItemSize = new primitives.common.Size(16, 6);
			result.highlightPadding = new primitives.common.Thickness(2, 2, 2, 2);


			var itemTemplate = jQuery(
			  '<div class="bp-item bp-corner-all bt-item-frame">'
				+ '<div name="titleBackground" class="bp-item bp-corner-all bp-title-frame" style="top: 2px; left: 2px; width: 316px; height: 20px;">'
					+ '<div name="title" class="bp-item bp-title" style="top: 3px; left: 6px; width: 208px; height: 18px;">'
					+ '</div>'
				+ '</div>'
				+ '<div class="bp-item bp-photo-frame" style="top: 26px; left: 2px; width: 50px; height: 60px;">'
					+ '<img name="photo" style="height:60px; width:50px;" />'
				+ '</div>'
				+ '<div name="titleProject" class="bp-item" style="top: 26px; left: 56px; width: 250px; height: 30px; font-weight: bold; font-size: 12px;"></div>'
				// + '<div class="bp-item" style="top: 44px; left: 56px; width: 162px; height: 18px; font-size: 12px;"><a name="email" href="" target="_top"></a></div>'
				+ '<div name="description" class="bp-item" style="top: 62px; left: 56px; width: 260px; height: 36px; font-size: 10px;"></div>'
			+ '</div>'
			).css({
				width: result.itemSize.width + "px",
				height: result.itemSize.height + "px"
			});
			result.itemTemplate = itemTemplate.wrap('<div>').parent().html();

			return result;
		}

		function getTaskTemplate() {
			var result = new primitives.orgdiagram.TemplateConfig();
			result.name = "taskTemplate";

			result.itemSize = new primitives.common.Size(220, 120);
			result.minimizedItemSize = new primitives.common.Size(16, 6);
			result.highlightPadding = new primitives.common.Thickness(2, 2, 2, 2);


			var itemTemplate = jQuery(
			'<div class="bp-item bp-corner-all bt-item-frame">'
				+ '<div class="bp-item bp-corner-all bp-title-frame" style="top: 2px; left: 2px; width: 216px; height: 20px;">'
					+ '<div name="title" class="bp-item bp-title" style="top: 3px; left: 6px; width: 208px; height: 18px;">'
					+ '</div>'
				+ '</div>'
				+ '<div class="bp-item bp-photo-frame" style="top: 26px; left: 2px; width: 50px; height: 60px;">'
					+ '<img name="photo" style="height:60px; width:50px;" />'
				+ '</div>'
				+ '<div name="name" class="bp-item" class="bp-item" style="top: 26px; left: 56px; width: 250px; height: 30px; font-weight: bold; font-size: 12px;"></div>'
				// + '<div name="duration" class="bp-item" class="bp-item" style="top: 44px; left: 56px; width: 250px; height: 30px; font-weight: bold; font-size: 12px;"></div>'
				// + '<div name="duratio" class="bp-item" style="top: 44px; left: 56px; width: 162px; height: 18px; font-size: 12px;"><a name="email" href="" target="_top"></a></div>'
				+ '<div name="duration" class="bp-item" style="top: 62px; left: 56px; width: 162px; height: 36px; font-size: 10px;"></div>'
			+ '</div>'
			).css({
				width: result.itemSize.width + "px",
				height: result.itemSize.height + "px"
			});
			result.itemTemplate = itemTemplate.wrap('<div>').parent().html();

			return result;
		}

		function onTemplateRender(event, data) {
			switch (data.renderingMode) {
				case primitives.common.RenderingMode.Create:
					data.element.find("[name=email]").click(function (e) {
						/* Block mouse click propogation in order to avoid layout updates before server postback*/
						primitives.common.stopPropagation(e);
					});
					/* Initialize widgets here */
					break;
				case primitives.common.RenderingMode.Update:
					/* Update widgets here */
					break;
			}

			var itemConfig = data.context;

			switch (data.templateName) {
				case "managerTemplate":
					data.element.find("[name=photo]").attr({ "src": itemConfig.image });
					data.element.find("[name=titleBackground]").css({ "background": itemConfig.itemTitleColor });
					data.element.find("[name=email]").attr({ "href": ("mailto:" + itemConfig.email + "?Subject=Hello%20world") });

					var fields = ["title", "name", "description"];
					for (var index = 0; index < fields.length; index += 1) {
						var field = fields[index];
						data.element.find("[name=" + field + "]").text(itemConfig[field]);
					}
					break;
				case "projectTemplate":
					data.element.find("[name=photo]").attr({ "src": itemConfig.image });
					data.element.find("[name=titleBackground]").css({ "background": itemConfig.itemTitleColor });
					data.element.find("[name=email]").attr({ "href": ("mailto:" + itemConfig.email + "?Subject=Hello%20world") });

					var fields = ["title", "titleProject", "description"];
					for (var index = 0; index < fields.length; index += 1) {
						var field = fields[index];
						data.element.find("[name=" + field + "]").text(itemConfig[field]);
					}
					break;
				case "taskTemplate":
					data.element.find("[name=photo]").attr({ "src": itemConfig.image });
					data.element.find("[name=titleBackground]").css({ "background": itemConfig.itemTitleColor });
					data.element.find("[name=email]").attr({ "href": ("mailto:" + itemConfig.email + "?Subject=Hello%20world") });

					var fields = ["title", "name", "duration", "email"];
					for (var index = 0; index < fields.length; index += 1) {
						var field = fields[index];
						data.element.find("[name=" + field + "]").text(itemConfig[field]);
					}
					break;
			}
		}

		//
			/*function onSelectionChanged(e, data) {
				var selectedItems = jQuery("#centerpanel").orgDiagram("option", "selectedItems");
				var message = "";
				for (var index = 0; index < selectedItems.length; index += 1) {
					var itemConfig = selectedItems[index];
					if (message != "") {
						message += ", ";
					}
					message += "<b>'" + itemConfig.title + "'</b>";
				}
				message += (data.parentItem != null ? " Parent item <b>'" + data.parentItem.title + "'" : "");
				jQuery("#southpanel").empty().append("User selected next items: " + message);
			}*/

			/*function onHighlightChanging(e, data) {
				var message = (data.context != null) ? "User is hovering mouse over item <b>'" + data.context.title + "'</b>." : "";
				message += (data.parentItem != null ? " Parent item <b>'" + data.parentItem.title + "'" : "");

				jQuery("#southpanel").empty().append(message);
			}*/

			/*function onHighlightChanged(e, data) {
				var message = (data.context != null) ? "User hovers mouse over item <b>'" + data.context.title + "'</b>." : "";
				message += (data.parentItem != null ? " Parent item <b>'" + data.parentItem.title + "'" : "");

				jQuery("#southpanel").empty().append(message);
			}*/

			/*function onCursorChanging(e, data) {
				var message = "User is clicking on item '" + data.context.title + "'.";
				message += (data.parentItem != null ? " Parent item <b>'" + data.parentItem.title + "'" : "");

				jQuery("#southpanel").empty().append(message);
			}*/

			/*function onCursorChanged(e, data) {
				var message = "User clicked on item '" + data.context.title + "'.";
				message += (data.parentItem != null ? " Parent item <b>'" + data.parentItem.title + "'" : "");
				jQuery("#southpanel").empty().append(message);
			}*/

			/*function onButtonClick(e, data) {
				var message = "User clicked <b>'" + data.name + "'</b> button for item <b>'" + data.context.title + "'</b>.";
				message += (data.parentItem != null ? " Parent item <b>'" + data.parentItem.title + "'" : "");
				jQuery("#southpanel").empty().append(message);
			}*/
		//


		function LoadItems(selector) {
			var data = [
			/* Proyecto */
				{ 
					id: <?php echo $Proyecto['id'] ?>, 
					parent: null, 
					isVisible: true, 
					description: "<?php echo $Proyecto['descripcion'] ?>", 
					email: "mail@mail.com", 
					groupTitleColor: "#4169e1", 
					image: "plugin/demo/images/photos/p.png", 
					itemTitleColor: "#d62d20", 
					phone: "1-900-800-70-60", 
					titleProject: "<?php echo $Proyecto['nombre'] ?>", 
					title: "Proyecto", 
					templateName: "projectTemplate", 
					labelSize: new primitives.common.Size(300, 30), 
					labelPlacement: primitives.common.PlacementType.Right 
				},
				// { id: 0, parent: null, isVisible: true, description: "Description A", email: "mail@mail.com", groupTitleColor: "#4169e1", image: "plugin/demo/images/photos/a.png", itemTitleColor: "#4169e1", phone: "1-900-800-70-60", title: "Title A", templateName: "managerTemplate", labelSize: new primitives.common.Size(300, 30), labelPlacement: primitives.common.PlacementType.Right },
			/* Encargado del Proyecto */
				{ 
					id: <?php echo $Encargados ?>, 
					parent: <?php echo $Proyecto['id'] ?>, 
					isVisible: true, 
					description: "<?php echo $Proyecto['pro_nombre'] ?>", 
					name:"<?php echo $Proyecto['rh_nombre'].' '.$Proyecto['apellido'] ?>", 
					image: "plugin/demo/images/photos/e.png", 
					itemTitleColor: "#f79727", 
					groupTitleColor: "#f79727", 
					title: "Encargado", 
					templateName: "managerTemplate", 
					itemType: primitives.orgdiagram.ItemType.Adviser 
				},
		<?php foreach($Actividades as $Actividad): ?>
			<?php $Encargados-- ?>
			/* Actividad */
				{ 
					id: <?php echo $Actividad['id'] ?>, 
					// parent: <?php echo $Proyecto['id'] ?>, 
					parent: <?php echo $Proyecto['id'] ?>, 
					isVisible: true, 
					name:"<?php echo $Actividad['text'] ?>",
					description: "<?php echo $Actividad['text'] ?>", 
					groupTitleColor: "#4169e1", 
					image: "plugin/demo/images/photos/a.png", 
					itemTitleColor: "#4169e1", 
					title: "Actividad", 
					duration: "<?php echo $Actividad['duration'] ?> Días", 
					templateName: "taskTemplate", 
					labelSize: new primitives.common.Size(300, 14), 
					labelPlacement: primitives.common.PlacementType.Right 
				},
			/* Encargado de la Actividad */
				{ 
					id: <?php echo $Encargados ?>, 
					parent: <?php echo $Actividad['id'] ?>, 
					isVisible: true, 
					name:"<?php echo $Actividad['nombre'].' '.$Actividad['apellido'] ?>", 
					description: "<?php echo $Actividad['p_nombre'] ?>", 
					groupTitleColor: "#f79727y", 
					image: "plugin/demo/images/photos/e.png", 
					itemTitleColor: "#f79727", 
					title: "Encargado",  
					templateName: "managerTemplate", 
					itemType: primitives.orgdiagram.ItemType.Assistant, 
					labelSize: new primitives.common.Size(300, 14), 
					labelPlacement: primitives.common.PlacementType.Right 
				},
		<?php endforeach; ?>
			];


			selector.orgDiagram("option", {
				items: data,
				cursorItem: 0
			});
			selector.orgDiagram("update");
		}
	</script>
	<!-- end  : EDT -->
	<!-- start : Plugins  -->
	<script>
	</script>
	<!-- end  : Plugins -->
<!-- end  : SCRIPT -->
