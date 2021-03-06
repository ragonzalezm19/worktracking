<!-- start: META -->
	<meta charset="utf-8" />
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta content="" name="description" />
	<meta content="" name="author" />
<!-- end  : META -->
<title>  </title>
<!-- <title> <?php echo date('Y-m-d H:i:s'); ?> </title> -->
<!-- start: LINK -->
	<link rel="stylesheet" href="<?php echo $Path; ?>assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $Path; ?>assets/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $Path; ?>assets/fonts/style.css">
	<link rel="stylesheet" href="<?php echo $Path; ?>assets/plugins/iCheck/skins/all.css">
	<link rel="stylesheet" href="<?php echo $Path; ?>assets/css/main.css">
	<link rel="stylesheet" href="<?php echo $Path; ?>assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css"/>
	<link rel="stylesheet" href="<?php echo $Path; ?>assets/plugins/bootstrap-modal/css/bootstrap-modal.css"/>
	<link rel="stylesheet" href="<?php echo $Path; ?>assets/plugins/iCheck/skins/all.css">
	<link rel="stylesheet" href="<?php echo $Path; ?>assets/plugins/DhtmlxGantt_v3.1.1_gpl/codebase/dhtmlxgantt.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="<?php echo $Path; ?>assets/plugins/DhtmlxGantt_v3.1.1_gpl/codebase/skins/dhtmlxgantt_broadway.css" type="text/css" media="screen" title="no title" charset="utf-8">

	<style type="text/css">
		html, body{ height:100%; padding:0px; margin:0px; overflow: hidden;}
		.status_line{
			background-color: #0ca30a;
		}
		.gantt_task_cell.week_end{
		background-color: #EFF5FD;
		}
		.gantt_task_row.gantt_selected .gantt_task_cell.week_end{
			background-color: #F8EC9C;
		}
		.gantt_task_progress{
			text-align:left;
			padding-left:10px;
			box-sizing: border-box;
			color:white;
			font-weight: bold;
		}
		.red .gantt_cell, .odd.red .gantt_cell,
		.red .gantt_task_cell, .odd.red .gantt_task_cell{
			background-color: #FDE0E0;
		}
		.green .gantt_cell, .odd.green .gantt_cell,
		.green .gantt_task_cell, .odd.green .gantt_task_cell {
			background-color: #BEE4BE;
		}
		.gantt_grid_head_add{
			display: none;
		}
		.gantt_task_line.gantt_dependent_task {
			background-color: #65c16f;
			border: 1px solid #3c9445;
		}
		.gantt_task_line.gantt_dependent_task .gantt_task_progress {
			background-color: #46ad51;
		}
	</style>
	<!-- AJAX -->
		<script src="<?php echo $Path; ?>assets/plugins/jQuery/jquery-2.1.1.js"></script>
	<!-- AJAX -->
<!-- end  : LINK -->