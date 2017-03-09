<?php
	include ('codebase/connector/gantt_connector.php');
	
	$res   = mysql_connect("localhost","root","");
	mysql_select_db("worktracking");
	
	$gantt = new JSONGanttConnector($res);
	$gantt->render_links("gantt_conexiones","id","source,target,type");
	$gantt->render_table("gantt","id","start_date,duration,text,progress,sortorder,parent");