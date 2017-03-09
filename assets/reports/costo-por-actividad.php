<?php
	// Timezone
	date_default_timezone_set('America/Caracas');
	/* --------------------------------------------------------- */
		/* Llamadas de archivos */
			require('../plugins/fpdf/fpdf.php');
			require('../database/leer.php');
			/* Parametros GET */
				$id = $_GET['id'];
			/* Parametros GET */
			/* Variables */
				$hoy         = date('d/m/Y');
				$Proyecto    = proyecto($id);
				$idGantt     = ganttIdByProjectId($id);
				$actividades = actividadesByParent(intval($idGantt['gantt_id']));
			/* Variables */
		/* Llamadas de archivos */
	/* --------------------------------------------------------- */
		/* Metodos */
			class Metodos extends FPDF
			{
				public static $CostoPorActividadRecursosHumanos    = 0;
				public static $CostoPorActividadRecursosMateriales = 0;

				function Inicio()
				{
					$this->AddPage();
					/**/
				}

				function NuevaPagina()
				{
					$this->AddPage();
					/**/
				}

				function Header()
				{
					$this->Image('../images/logo.png',120,8,60);
					$this->Ln(20);
					$this->SetFont('Arial','',10);
					$this->Cell(50);
					$this->Cell(120,3,utf8_decode('J-31380252-2'),'',0,'R');
					$this->Ln(20);
				}

				function Footer()
				{
					// Posición: a 1,5 cm del final
					$this->SetY(-22);
					// Arial italic 8
					$this->SetFont('Arial','B',8.5);
					// Número de página
					$this->Cell(0,4,utf8_decode('Sismica, C.A'),0,1,'C');
					$this->SetFont('Arial','I',8.5);
					$this->Cell(0,4,utf8_decode('C.C. Las Chimeneas. Módulo 1 Piso 2 Oficina 4A-1. Urb. Las Chimeneas Valencia - Estado Carabobo. CP:2001'),0,1,'C');
					$this->Cell(0,4,utf8_decode('Tel: 0241 - 8432995 Fax: 0241 - 8430112'),0,1,'C');
					$this->Cell(0,4,utf8_decode('Correo: proyecto.ingenieria@sismica.com.ve'),0,1,'C');
					// $this->Cell(0,4,'RIF: J-31702299-8',0,1,'C');
				}

				function Fin()
				{
					// $this->Cell(180,1,'','LRB',1,'L');
					$this->Output();
				}

				function Informacion($hoy, $Proyecto){
					$this->SetFont('Arial','B',12);
					$this->Cell(30,6, utf8_decode('Fecha de Hoy: '),0,0,'L');
					$this->SetFont('Arial','',12);
					$this->Cell(70,6, $hoy,0,1,'L');
					$this->SetFont('Arial','B',12);
					$this->Cell(18,6, utf8_decode('Cliente: '),0,0,'L');
					$this->SetFont('Arial','',12);
					$this->Cell(70,6, utf8_decode($Proyecto['c_nombre']) ,0,1,'L');
					$this->SetFont('Arial','B',12);
					$this->Cell(22,6, utf8_decode('Proyecto: '),0,0,'L');
					$this->SetFont('Arial','',12);
					$this->Cell(70,6, utf8_decode($Proyecto['nombre']) ,0,1,'L');
					$this->SetFont('Arial','B',12);
					$this->Cell(10,6, utf8_decode('RIF: '),0,0,'L');
					$this->SetFont('Arial','',12);
					$this->Cell(70,6, utf8_decode($Proyecto['rif']) ,0,1,'L');
					$this->Ln(10);
				}

				function TituloCostoPorActividad(){
					$this->SetFont('Arial','B',14);
					$this->Cell(277,6, utf8_decode('Costo por Actividad'),0,1,'C');
					$this->Ln(4);
				}

				
					function TablasRecursosHumanos($Proyecto, $actividades)
					{
						$this->SetFont('Arial','U',12);
						$this->Cell(277,6, utf8_decode('Recurso Humano'),0,1,'C');
						$this->Ln(6);
						$this->SetFont('Arial','B',12);
						$this->Cell(85.4,6, utf8_decode('Actividad'),1,0,'C');
						$this->Cell(25.4,6, utf8_decode('Duración'),1,0,'C');
						$this->Cell(105.4,6, utf8_decode('Recurso'),1,0,'C');
						$this->Cell(25.4,6, utf8_decode('Honorario'),1,0,'C');
						$this->Cell(35.4,6, utf8_decode('Total'),1,1,'C');
						foreach ($actividades as $actividad)
						{
							$infoParaCostoPorActividadRecursoHumano = infoParaCostoPorActividadRecursoHumano($actividad['id']);
							$total = intval($infoParaCostoPorActividadRecursoHumano['duration']) * intval($infoParaCostoPorActividadRecursoHumano['honorario']);
							$this->SetFont('Arial','',12);
							$this->Cell(85.4,6, utf8_decode($actividad['text']),1,0,'C');
							$this->Cell(25.4,6, utf8_decode($actividad['duration'].' Días'),1,0,'C');
							if ($infoParaCostoPorActividadRecursoHumano['p_nombre'] == "") {
								$mensaje = 'Ninguno';
							} else {
								$mensaje = $infoParaCostoPorActividadRecursoHumano['p_nombre'].' '.$infoParaCostoPorActividadRecursoHumano['nombre'].' '.$infoParaCostoPorActividadRecursoHumano['apellido'];
							}
							$this->Cell(105.4,6, utf8_decode($mensaje),1,0,'C');
							if ($infoParaCostoPorActividadRecursoHumano['p_nombre'] == "") {
								$honorario = 0;
							} else {
								$honorario = $infoParaCostoPorActividadRecursoHumano['honorario'];
							}
							$this->Cell(25.4,6, utf8_decode($honorario.' BsF.'),1,0,'C');
							$this->Cell(35.4,6, utf8_decode($total.' BsF.'),1,1,'C');
							self::$CostoPorActividadRecursosHumanos += $total;
						}
						$this->SetFont('Arial','B',14);
						$this->Cell(241.6,6, utf8_decode('Costo Total en Recursos Huamnos'),1,0,'R');
						$this->SetFillColor(255,215,0);
						$this->Cell(35.4,6, utf8_decode(self::$CostoPorActividadRecursosHumanos.' BsF.'),1,1,'C', true);
					}

				/* Recursos Humanos */
					function RecursosHumanos($Proyecto, $actividades){
						$this->SetFont('Arial','B',12);
						$this->Cell(277,6, utf8_decode('Recursos Humanos'),0,1,'C');
						$this->Ln(4);
						foreach ($actividades as $actividad) {
							$informacion = infoParaCostoPorActividadRecursoHumano($actividad['id']);
							self::TablaRecursosHumanos($actividad['text'], $informacion);
							$this->Ln(5);
						}
					}

					function TablaRecursosHumanos($nombre, $informacion){
						$this->SetFont('Arial','U',12);
						$this->Cell(277,6, utf8_decode('Actividad: '.$nombre),0,1,'C');
						$this->Ln(6);
						$this->SetFont('Arial','B',12);
						$this->Cell(98.75,6, utf8_decode('Recurso'),1,0,'C');
						$this->Cell(72.1,6, utf8_decode('Duración de la actividad'),1,0,'C');
						$this->Cell(70.75,6, utf8_decode('Honorario'),1,0,'C');
						$this->Cell(35.4,6, utf8_decode('Total'),1,1,'C');
						$this->SetFont('Arial','',12);
						$totalFinal = 0;
						foreach ($informacion as $info)
						{
							$total = intval($info['duration']) * intval($info['honorario']);
							$this->Cell(98.75,6, utf8_decode($info['p_nombre'].' '.$info['nombre'].' '.$info['apellido']),1,0,'C');
							$this->Cell(72.1,6, utf8_decode($info['duration'].' Días'),1,0,'C');
							$this->Cell(70.75,6, utf8_decode($info['honorario'].' BsF'),1,0,'C');
							$this->Cell(35.4,6, utf8_decode($total.' BsF'),1,1,'C');
							$totalFinal += $total;
						}
						$this->SetFont('Arial','B',14);
						$this->Cell(241.6,8, utf8_decode('Costo Total de Recursos Humanos en la Actividad \''.$nombre.'\''),1,0,'R');
						$this->SetFillColor(255,215,0);
						$this->Cell(35.4,8, utf8_decode($totalFinal.' BsF.'),1,1,'C',true);
						self::$CostoPorActividadRecursosHumanos += $totalFinal;
					}

					function CostoRecursoHumanosTotal(){
						$this->Ln(10);
						$this->SetFont('Arial','BU',16);
						$this->SetFillColor(255,215,0);
						$this->Cell(60);
						$this->Cell(157,8, utf8_decode('Costo Total de Recursos Humanos: '.self::$CostoPorActividadRecursosHumanos.' BsF'),0,1,'C', true);
					}
				/* Recursos Humanos*/

				/* Recursos Materiales */
					function RecursosMateriales($Proyecto, $actividades){
						$this->SetFont('Arial','B',12);
						$this->Cell(277,6, utf8_decode('Recursos Materiales'),0,1,'C');
						$this->Ln(4);
						foreach ($actividades as $actividad) {
							$informacion = infoParaCostoPorActividadRecursoMaterial($actividad['id']);
							self::TablaRecursosMateriales($actividad['text'], $informacion);
							$this->Ln(5);
						}
					}

					function TablaRecursosMateriales($nombre, $informacion){
						$this->SetFont('Arial','U',12);
						$this->Cell(277,6, utf8_decode('Actividad: '.$nombre),0,1,'C');
						$this->Ln(6);
						$this->SetFont('Arial','B',12);
						$this->Cell(75.4,6, utf8_decode('Recurso'),1,0,'C');
						$this->Cell(72.1,6, utf8_decode('Duración de la actividad'),1,0,'C');
						$this->Cell(46.7,6, utf8_decode('Cantidad'),1,0,'C');
						$this->Cell(47.4,6, utf8_decode('Costo por Unidad'),1,0,'C');
						$this->Cell(35.4,6, utf8_decode('Total'),1,1,'C');
						$this->SetFont('Arial','',12);
						$totalFinal = 0;
						foreach ($informacion as $info)
						{
							$total = intval($info['duration']) * intval($info['cantidad']) * intval($info['costo']);
							$this->Cell(75.4,6, utf8_decode($info['nombre']),1,0,'C');
							$this->Cell(72.1,6, utf8_decode($info['duration'].' Días'),1,0,'C');
							$this->Cell(46.7,6, utf8_decode($info['cantidad'].' '.$info['abreviatura'] ),1,0,'C');
							$this->Cell(47.4,6, utf8_decode($info['costo']),1,0,'C');
							$this->Cell(35.4,6, utf8_decode($total.' BsF'),1,1,'C');
							$totalFinal += $total;
						}
						$this->SetFont('Arial','B',14);
						$this->Cell(241.6,8, utf8_decode('Costo Total de Recursos Materiales en la Actividad \''.$nombre.'\''),1,0,'R');
						$this->SetFillColor(255,215,0);
						$this->Cell(35.4,8, utf8_decode($totalFinal.' BsF.'),1,1,'C',true);
						self::$CostoPorActividadRecursosMateriales += $totalFinal;
					}

					function CostoRecursoMaterialTotal(){
						$this->Ln(10);
						$this->SetFont('Arial','BU',16);
						$this->SetFillColor(255,215,0);
						$this->Cell(60);
						$this->Cell(157,8, utf8_decode('Costo Total de Recursos Materiales: '.self::$CostoPorActividadRecursosMateriales.' BsF'),0,1,'C', true);
					}
				/* Recursos Materiales*/
			}
		/* Metodos */
	/* --------------------------------------------------------- */
		/* Inicializacion de PDF */
			// $pdf = new Metodos('L','mm',array(210,180));
			$pdf = new Metodos('L','mm',array(215,297));
			// $pdf = new Metodos();
			/**/
		/* Inicializacion de PDF */
	/* --------------------------------------------------------- */
		/* Creacion de Pagina */
			$pdf->Inicio();
			$pdf->Informacion($hoy, $Proyecto);
			$pdf->TituloCostoPorActividad();
			$pdf->RecursosHumanos($Proyecto, $actividades);
			$pdf->CostoRecursoHumanosTotal();
			$pdf->NuevaPagina();
			$pdf->Informacion($hoy, $Proyecto);
			$pdf->TituloCostoPorActividad();
			$pdf->RecursosMateriales($Proyecto, $actividades);
			$pdf->CostoRecursoMaterialTotal();
			$pdf->Fin();
		/* Creacion de Pagina */
	/* --------------------------------------------------------- */
	/*$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(40,10,'Hello World! '.$id);
	$pdf->Output();*/