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
				function Inicio()
				{
					$this->AddPage();
					/**/
				}
				function Header()
				{
					$this->Image('../images/logo.png',60,8,60);
					$this->Ln(20);
					$this->SetFont('Arial','',10);
					$this->Cell(50);
					$this->Cell(60,3,utf8_decode('J-31380252-2'),'',0,'R');
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

				function Cuerpo($hoy, $Proyecto, $actividades)
				{
					$this->SetFont('Arial','B',12);
					$this->Cell(30,6, utf8_decode('Fecha de Hoy: '),0,0,'L');
					$this->SetFont('Arial','',12);
					$this->Cell(70,6, $hoy,0,1,'L');
					$this->SetFont('Arial','B',12);
					$this->Cell(18,6, utf8_decode('Cliente: '),0,0,'L');
					$this->SetFont('Arial','',12);
					$this->Cell(70,6, utf8_decode($Proyecto['c_nombre']) ,0,1,'L');
					$this->SetFont('Arial','B',12);
					$this->Cell(10,6, utf8_decode('RIF: '),0,0,'L');
					$this->SetFont('Arial','',12);
					$this->Cell(70,6, utf8_decode($Proyecto['rif']) ,0,1,'L');
					$this->Ln(10);
					$this->SetFont('Arial','B',14);
					$this->Cell(160,6, utf8_decode('Información de Proyecto'),0,1,'C');
					$this->Ln(3);
					$this->Cell(10);
					$this->SetFont('Arial','B',12);
					$this->Cell(46,6, utf8_decode('Nombre del Proyecto: '),0,0,'L');
					$this->SetFont('Arial','',12);
					$this->Cell(70,6, utf8_decode($Proyecto['nombre']),0,1,'L');
					$this->Cell(10);
					$this->SetFont('Arial','B',12);
					$this->Cell(52,6, utf8_decode('Ingeniero Responsable: '),0,0,'L');
					$this->SetFont('Arial','',12);
					$this->Cell(70,6, utf8_decode($Proyecto['rh_nombre'].' '.$Proyecto['apellido']),0,1,'L');
					$this->Cell(10);
					$this->SetFont('Arial','B',12);
					$this->Cell(34,6, utf8_decode('Fecha de Inicio: '),0,0,'L');
					$fecha_inicio = explode('-', $Proyecto['fecha']);
					$this->SetFont('Arial','',12);
					$this->Cell(70,6, utf8_decode($fecha_inicio[2].'/'.$fecha_inicio[1].'/'.$fecha_inicio[0]),0,1,'L');
					$this->Ln(10);
					$this->SetFont('Arial','B',12);
					$this->Cell(40,6, utf8_decode('Actividad'),1,0,'C');
					$this->Cell(40,6, utf8_decode('Fecha de Inicio'),1,0,'C');
					$this->Cell(40,6, utf8_decode('Duración'),1,0,'C');
					$this->Cell(40,6, utf8_decode('Progreso'),1,1,'C');
					foreach ($actividades as $actividad)
					{
						$fecha = explode('-', $actividad['start_date']);
						$this->SetFont('Arial','',12);
						$this->Cell(40,6, utf8_decode($actividad['text']),1,0,'C');
						$this->Cell(40,6, utf8_decode($fecha[2].'/'.$fecha[1].'/'.$fecha[0]),1,0,'C');
						$this->Cell(40,6, utf8_decode($actividad['duration'].' Días'),1,0,'C');
						$this->Cell(40,6, utf8_decode(round($actividad['progress']*100).'%'),1,1,'C');
					}

				}
			}
		/* Metodos */
	/* --------------------------------------------------------- */
		/* Inicializacion de PDF */
			$pdf = new Metodos('P','mm',array(210,180));
			// $pdf = new Metodos();
			/**/
		/* Inicializacion de PDF */
	/* --------------------------------------------------------- */
		/* Creacion de Pagina */
			$pdf->Inicio();
			$pdf->Cuerpo($hoy, $Proyecto, $actividades);
			$pdf->Fin();
		/* Creacion de Pagina */
	/* --------------------------------------------------------- */
	/*$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(40,10,'Hello World! '.$id);
	$pdf->Output();*/