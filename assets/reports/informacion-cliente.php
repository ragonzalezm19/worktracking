<?php
	// Timezone
	date_default_timezone_set('America/Caracas');
	/* --------------------------------------------------------- */
		/* Llamadas de archivos */
			require('../plugins/fpdf/fpdf.php');
			require('../database/leer.php');
			/* Parametros GET */
				$nombre     = $_GET['n'];
				$usuario    = $_GET['u'];
				$contraseña = $_GET['c'];
			/* Parametros GET */
			/* Variables */
				$hoy = date('d/m/Y');
				// $Proyecto = proyecto($usuario);
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
					/*$this->Cell(0,4,utf8_decode('Tel: 0241 - 8432995 Fax: 0241 - 8430112'),0,1,'C');
					$this->Cell(0,4,utf8_decode('Correo: proyecto.ingenieria@sismica.com.ve'),0,1,'C');*/
					// $this->Cell(0,4,'RIF: J-31702299-8',0,1,'C');
				}
				function Fin()
				{
					// $this->Cell(180,1,'','LRB',1,'L');
					$this->Output();
				}

				function Cuerpo($hoy, $nombre, $usuario, $contraseña)
				{
					$this->SetFont('Arial','B',12);
					$this->Cell(40,6, utf8_decode('Fecha de Creación: '),0,0,'L');
					$this->SetFont('Arial','',12);
					$this->Cell(70,6, $hoy,0,1,'L');
					$this->Ln(5);
					$this->SetFont('Arial','',12);
					$this->Cell(42,6, utf8_decode('Bienvenido "'.$nombre.'".'),0,1,'L');
					$this->Ln(10);
					$this->SetFont('Arial','B',12);
					$this->Cell(42,6, utf8_decode('Información Importante:'),0,1,'L');
					$this->Cell(10);
					$this->SetFont('Arial','B',12);
					$this->Cell(39,6, utf8_decode('- URL del Sistema: '),0,0,'L');
					$this->SetFont('Arial','',12);
					$this->Cell(42,6, utf8_decode('worktraking.isoftdesing.com'),0,1,'L');
					$this->Cell(10);
					$this->SetFont('Arial','B',12);
					$this->Cell(21,6, utf8_decode('- Usuario: '),0,0,'L');
					$this->SetFont('Arial','',12);
					$this->Cell(42,6, utf8_decode(''.$usuario),0,1,'L');
					$this->Cell(10);
					$this->SetFont('Arial','B',12);
					$this->Cell(28,6, utf8_decode('- Contraseña: '),0,0,'L');
					$this->SetFont('Arial','',12);
					$this->Cell(42,6, utf8_decode(''.$contraseña),0,1,'L');
					$this->Ln(15);
					$this->SetFont('Arial','B',14);
					$this->Cell(160,6, utf8_decode('Para soporte comunicarse a:'),0,1,'C');
					$this->Ln(2);
					$this->SetFont('Arial','',12);
					$this->Cell(160,6, utf8_decode('Teléfonos: (+ 58) 241- 843.29.95'),0,1,'C');
					$this->Cell(160,6, utf8_decode('Fax: (+ 58) 241- 843.01.12'),0,1,'C');
					$this->Cell(160,6, utf8_decode('Correo: proyecto.ingenieria@sismica.com.ve'),0,1,'C');
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
			$pdf->Cuerpo($hoy, $nombre, $usuario, $contraseña);
			$pdf->Fin();
		/* Creacion de Pagina */
	/* --------------------------------------------------------- */
	/*$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(40,10,'Hello World! '.$id);
	$pdf->Output();*/