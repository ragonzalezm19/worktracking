var TableData = function () {
	//function to initiate DataTable
	//DataTable is a highly flexible tool, based upon the foundations of progressive enhancement, 
	//which will add advanced interaction controls to any HTML table
	//For more information, please visit https://datatables.net/
	$(document).ready(function() {
		$('#maestros, #tabla-proyectos').dataTable({
			"aoColumnDefs": [
			{
				"bSortable" : false,
				"aTargets" : [ "no-sort"]
			}],
			"oLanguage": {
				"sUrl": '../../../assets/plugins/DataTables/dataTables.spanish.txt',
				"sLengthMenu": "Show _MENU_ Rows",
				"sSearch": "",
				"oPaginate": {
					"sPrevious": "",
					"sNext": ""
				}
			},
			"aLengthMenu": [
				[5, 10, 15, 20, 25, -1],
				[5, 10, 15, 20, 25, "Todos"] // change per page values here
			],
			"iDisplayLength": 5,
		});
	} );

	var runDataTable1 = function () {
		$('#tabla_2_col').dataTable({
			"aoColumnDefs": [
			{
				"bSortable" : false,
				"aTargets" : [ "no-sort"]
			},
			{ 
				"bVisible": false, 
				"aTargets": [ "hidden-col" ]
			}
			],
			"oLanguage": {
				"sUrl": '../assets/plugins/DataTables/dataTables.spanish.txt',
				"sLengthMenu": "Show _MENU_ Rows",
				"sSearch": "",
				"oPaginate": {
					"sPrevious": "",
					"sNext": ""
				}
			},
			"aaSorting": [
				[1, 'asc']
			],

			"aLengthMenu": [
				[10, 15, 20, 25, -1],
				[10, 15, 20, 25, "Todos"] // change per page values here
			],
			// set the initial value
			"iDisplayLength": 10,
		});
		$('#tabla_1_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		$('#tabla_1_length label select').addClass("m-wrap small");
		// modify table per page dropdown
		$("select[name='tabla_1_length']").select2();
		// initialzie select2 dropdown
		$('#tabla_1_column_toggler input[type="checkbox"]').change(function () {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt($(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, (bVis ? false : true));
		});
	};

	var runDataTable2 = function () {
		$('#tabla_3_col').dataTable({
			"aoColumnDefs": [
			{
				"bSortable" : false,
				"aTargets" : [ "no-sort"]
			},
			{ 
				"bVisible": false, 
				"aTargets": [ "hidden-col" ]
			}
			],
			"oLanguage": {
				"sUrl": '../assets/plugins/DataTables/dataTables.spanish.txt',
				"sLengthMenu": "Show _MENU_ Rows",
				"sSearch": "",
				"oPaginate": {
					"sPrevious": "",
					"sNext": ""
				}
			},
			"aaSorting": [
				[1, 'asc']
			],

			"aLengthMenu": [
				[10, 15, 20, 25, -1],
				[10, 15, 20, 25, "Todos"] // change per page values here
			],
			// set the initial value
			"iDisplayLength": 10,
		});
		$('#tabla_1_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		$('#tabla_1_length label select').addClass("m-wrap small");
		// modify table per page dropdown
		$("select[name='tabla_1_length']").select2();
		// initialzie select2 dropdown
		$('#tabla_1_column_toggler input[type="checkbox"]').change(function () {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt($(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, (bVis ? false : true));
		});
	};

	var runDataTable3 = function () {
		$('#tabla_4_col').dataTable({
			"aoColumnDefs": [
			{
				"bSortable" : false,
				"aTargets" : [ "no-sort"]
			},
			{ 
				"bVisible": false, 
				"aTargets": [ "hidden-col" ]
			}
			],
			"oLanguage": {
				"sUrl": '../assets/plugins/DataTables/dataTables.spanish.txt',
				"sLengthMenu": "Show _MENU_ Rows",
				"sSearch": "",
				"oPaginate": {
					"sPrevious": "",
					"sNext": ""
				}
			},
			"aaSorting": [
				[1, 'asc']
			],

			"aLengthMenu": [
				[10, 15, 20, 25,-1],
				[10, 15, 20, 25,"Todos"] // change per page values here
			],
			// set the initial value
			"iDisplayLength": 10,
		});
		$('#tabla_1_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		$('#tabla_1_length label select').addClass("m-wrap small");
		// modify table per page dropdown
		$("select[name='tabla_1_length']").select2();
		// initialzie select2 dropdown
		$('#tabla_1_column_toggler input[type="checkbox"]').change(function () {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt($(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, (bVis ? false : true));
		});
	};

	var runDataTable4 = function () {
		$('#empresa').dataTable({
			"aoColumnDefs": [
			{
				"bSortable" : false,
				"aTargets" : [ "no-sort"]
			},
			{ 
				"bVisible": false, 
				"aTargets": [ "hidden-col" ]
			}
			],
			"oLanguage": {
				"sUrl": '../assets/plugins/DataTables/dataTables.spanish.txt',
				"sLengthMenu": "Show _MENU_ Rows",
				"sSearch": "",
				"oPaginate": {
					"sPrevious": "",
					"sNext": ""
				}
			},
			"aaSorting": [
				[1, 'asc']
			],

			"aLengthMenu": [
				[10, 15, 20, 25, -1],
				[10, 15, 20, 25, "Todos"] // change per page values here
			],
			// set the initial value
			"iDisplayLength": 10,
		});
		$('#tabla_1_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		$('#tabla_1_length label select').addClass("m-wrap small");
		// modify table per page dropdown
		$("select[name='tabla_1_length']").select2();
		// initialzie select2 dropdown
		$('#tabla_1_column_toggler input[type="checkbox"]').change(function () {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt($(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, (bVis ? false : true));
		});
	};
	return {
		//main function to initiate template pages
		init: function () {
			runDataTable1();
			runDataTable2();
			runDataTable3();
			runDataTable4();
		}
	};
}();