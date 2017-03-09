<!--[if lt IE 9]>
	<script src="assets/plugins/respond.min.js"></script>
	<script src="assets/plugins/excanvas.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
	<script src="<?php echo $Path; ?>assets/plugins/jQuery/jquery-1.8.2.min.js"></script>
<!--<![endif]-->
	<script src="<?php echo $Path; ?>assets/plugins/Highcharts/js/highcharts.js"></script>
	<script src="<?php echo $Path; ?>assets/plugins/Highcharts/js/modules/exporting.js"></script>
<!-- start: SCRIPT -->
	

	<script>
		$(function () {
			 $('#container').highcharts({
					chart: {
						type: 'column'
					},
					title: {
						text: '<?php echo $Proyecto["nombre"] ?>'
					},
					xAxis: {
						categories: [
							 'Costo del Proyecto'
						]
					},
					yAxis: [{
						min: 0,
						title: {
							 text: 'BsF.'
						}
					}, {
						title: {
							 text: ''
						},
						opposite: true
					}],
					legend: {
						shadow: false
					},
					tooltip: {
						shared: true
					},
					plotOptions: {
						column: {
							 grouping: false,
							 shadow: false,
							 borderWidth: 0
						}
					},
					series: [{
						name: 'Costo Estimado',
						color: 'rgba(165,170,217,1)',
						data: [<?php echo $Proyecto["costo"] ?>],
						pointPadding: 0.36,
						pointPlacement: 0
					}, {
						name: 'Costo Real',
						color: 'rgba(126,86,134,.8)',
						data: [<?php echo $CostoTotal ?>],
						pointPadding: 0.38,
						pointPlacement: 0
					}]
			 });
		});
	</script>
	<!-- start: AJAX SCRIPTS -->
	<script>

	</script>
	<!-- end  : AJAX SCRIPTS -->
<!-- end  : SCRIPT -->
