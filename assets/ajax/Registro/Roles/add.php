<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');

	require '../../../database/insertar.php';
	require '../../../database/leer.php';

	$descripcion = $_POST['descripcion'];
	/*  start: Permisos  */
		if ($_POST['permisos']) 
		{
			$crear    = 0;
			$leer     = 0;
			$editar   = 0;
			$eliminar = 0;
			foreach ($_POST['permisos'] as $permisos) 
			{
				switch ($permisos) {
					case 'CR':
						$crear    = 1;
						break;
					case 'LE':
						$leer     = 1;
						break;
					case 'ED':
						$editar   = 1;
						break;
					case 'EL':
						$eliminar = 1;
						break;
					default:
						$crear    = 0;
						$leer     = 0;
						$editar   = 0;
						$eliminar = 0;
						break;
				}
			}
		} 
		else 
		{
			$crear    = 0;
			$leer     = 0;
			$editar   = 0;
			$eliminar = 0;
		}
	/*  end  : Permisos  */
	/*  start : Acceso  */
		if ($_POST['acceso']) 
		{
			/*  start : Parametros  */
				$SubmenuParametros = SubmenuParametros();
				$parametros = array();
				foreach ($_POST['acceso'] as $p) 
				{
					foreach ($SubmenuParametros as $S) 
					{
						if ($p == $S['id']) 
						{
							array_push($parametros, $S['nombre']);
						}
					}
				}
				$parametros = implode(';', $parametros);
			/*  end   : Parametros  */

			/*  start : Registros  */
				$SubmenuRegistros = SubmenuRegistros();
				$registros = array();
				foreach ($_POST['acceso'] as $p) 
				{
					foreach ($SubmenuRegistros as $S) 
					{
						if ($p == $S['id']) 
						{
							array_push($registros, $S['nombre']);
						}
					}
				}
				$registros = implode(';', $registros);
			/*  end   : Registros  */
		}
		else 
		{
			$registros  = '';
			$parametros = '';
		}
	/*  end   : Acceso  */
	/*  start : Seguimiento  */
		if ($_POST['seguimiento']) 
		{
			$seguimiento = '';
			$count = count($_POST['seguimiento']);
			for ($i=0; $i < $count; $i++) 
			{
				if ($_POST['seguimiento'][$i] == end($_POST['seguimiento']))
				{
					switch ($_POST['seguimiento'][$i]) {
						case 'CRE':
							$seguimiento = $seguimiento.'Creado';
							break;
						case 'EDI':
							$seguimiento = $seguimiento.'Editado';
							break;
					}
				}
				else
				{
					switch ($_POST['seguimiento'][$i]) {
						case 'CRE':
							$seguimiento = $seguimiento.'Creado;';
							break;
						case 'EDI':
							$seguimiento = $seguimiento.'Editado;';
							break;
					}
				}
				
			}
		}
		else
		{
			$seguimiento = '';
		}
	/*  end   : Seguimiento  */
	$creado      = date('Y-m-d H:i:s');
	$editado     = date('Y-m-d H:i:s');

	// addRol($descripcion, $crear, $leer, $editar, $eliminar, $parametros, $registros, $creado, $editado);
	echo json_encode($seguimiento);