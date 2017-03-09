<?php 
	include '../database/leer.php';

	$usuario   = strtoupper($_POST['usuario']);
	$clave     = Hash('SHA1', $_POST['clave']);
	$respuestaRecursoHumano = inicioSesionRecursoHumano($usuario, $clave);
	$respuestaCliente = inicioSesionCliente($usuario, $clave);

	if (!empty($respuestaRecursoHumano) && empty($respuestaCliente)) 
	{
		$respuesta = $respuestaRecursoHumano;

		$file = fopen('../../app/usuario.php', 'x+');

		if($respuesta[0]['parametros'] != '')
		{
			$parametros = explode(";", $respuesta[0]['parametros']);
			$count = count($parametros);
			$p = 'array(';
			for ($i=0; $i < $count; $i++) 
			{ 
				if ($i == ($count-1)) 
				{
					$p = $p.'"'.$parametros[$i].'"';
				} 
				else 
				{
					$p = $p.'"'.$parametros[$i].'",';
				}
			}
			$p = $p.')';
		}
		else
		{
			$p = 'array()';
		}
		if($respuesta[0]['registros'] != '')
		{
			$registros = explode(";", $respuesta[0]['registros']);
			$count = count($registros);
			$r = 'array(';
			for ($i=0; $i < $count; $i++) 
			{ 
				if ($i == ($count-1)) 
				{
					$r = $r.'"'.$registros[$i].'"';
				} 
				else 
				{
					$r = $r.'"'.$registros[$i].'",';
				}
			}
			$r = $r.')';
		}
		else
		{
			$s = 'array()';
		}
		if($respuesta[0]['seguimiento'] != '')
		{
			$seguimiento = explode(";", $respuesta[0]['seguimiento']);
			$count = count($seguimiento);
			$s = 'array(';
			for ($i=0; $i < $count; $i++) 
			{ 
				if ($i == ($count-1)) 
				{
					$s = $s.'"'.$seguimiento[$i].'"';
				} 
				else 
				{
					$s = $s.'"'.$seguimiento[$i].'",';
				}
			}
			$s = $s.')';
		}
		else
		{
			$s = 'array()';
		}

		fwrite($file, '<?php' . PHP_EOL);
		fwrite($file, '	//Variables Usuario' . PHP_EOL);
		fwrite($file, '	$Id                  = '.$respuesta[0]['id'].';' . PHP_EOL);
		fwrite($file, '	$Name                = "'.$respuesta[0]['nombre'].'";' . PHP_EOL);
		fwrite($file, '	$Lastname            = "'.$respuesta[0]['apellido'].'";' . PHP_EOL);
		fwrite($file, '	$User                = "'.$respuesta[0]['usuario'].'";' . PHP_EOL);
		fwrite($file, '	$RolId               = '.$respuesta[0]['rol_id'].';' . PHP_EOL);
		fwrite($file, '	$Rol                 = "'.$respuesta[0]['descripcion'].'";' . PHP_EOL);
		fwrite($file, '	$Crear               = '.$respuesta[0]['crear'].';' . PHP_EOL);
		fwrite($file, '	$Leer                = '.$respuesta[0]['leer'].';' . PHP_EOL);
		fwrite($file, '	$Editar              = '.$respuesta[0]['editar'].';' . PHP_EOL);
		fwrite($file, '	$Eliminar            = '.$respuesta[0]['eliminar'].';' . PHP_EOL);
		fwrite($file, '	$Acceso_parametros   = '.$p.';' . PHP_EOL);
		fwrite($file, '	$Acceso_registros    = '.$r.';' . PHP_EOL);
		fwrite($file, '	$Usuario_seguimiento = '.$s.';' . PHP_EOL);
		fclose($file);
	}
	else if (empty($respuestaRecursoHumano) && !empty($respuestaCliente)) 
	{
		$respuesta = $respuestaCliente;

		$file = fopen('../../app/usuario.php', 'x+');

		if($respuesta[0]['parametros'] != '')
		{
			$parametros = explode(";", $respuesta[0]['parametros']);
			$count = count($parametros);
			$p = 'array(';
			for ($i=0; $i < $count; $i++) 
			{ 
				if ($i == ($count-1)) 
				{
					$p = $p.'"'.$parametros[$i].'"';
				} 
				else 
				{
					$p = $p.'"'.$parametros[$i].'",';
				}
			}
			$p = $p.')';
		}
		else
		{
			$p = 'array()';
		}
		if($respuesta[0]['registros'] != '')
		{
			$registros = explode(";", $respuesta[0]['registros']);
			$count = count($registros);
			$r = 'array(';
			for ($i=0; $i < $count; $i++) 
			{ 
				if ($i == ($count-1)) 
				{
					$r = $r.'"'.$registros[$i].'"';
				} 
				else 
				{
					$r = $r.'"'.$registros[$i].'",';
				}
			}
			$r = $r.')';
		}
		else
		{
			$s = 'array()';
		}
		if($respuesta[0]['seguimiento'] != '')
		{
			$seguimiento = explode(";", $respuesta[0]['seguimiento']);
			$count = count($seguimiento);
			$s = 'array(';
			for ($i=0; $i < $count; $i++) 
			{ 
				if ($i == ($count-1)) 
				{
					$s = $s.'"'.$seguimiento[$i].'"';
				} 
				else 
				{
					$s = $s.'"'.$seguimiento[$i].'",';
				}
			}
			$s = $s.')';
		}
		else
		{
			$s = 'array()';
		}

		fwrite($file, '<?php' . PHP_EOL);
		fwrite($file, '	//Variables Usuario' . PHP_EOL);
		fwrite($file, '	$Id                  = '.$respuesta[0]['id'].';' . PHP_EOL);
		fwrite($file, '	$Name                = "Cliente";' . PHP_EOL);
		fwrite($file, '	$Lastname            = "'.$respuesta[0]['nombre'].'";' . PHP_EOL);
		fwrite($file, '	$User                = "'.$respuesta[0]['usuario'].'";' . PHP_EOL);
		fwrite($file, '	$RolId               = '.$respuesta[0]['rol_id'].';' . PHP_EOL);
		fwrite($file, '	$Rol                 = "'.$respuesta[0]['descripcion'].'";' . PHP_EOL);
		fwrite($file, '	$Crear               = '.$respuesta[0]['crear'].';' . PHP_EOL);
		fwrite($file, '	$Leer                = '.$respuesta[0]['leer'].';' . PHP_EOL);
		fwrite($file, '	$Editar              = '.$respuesta[0]['editar'].';' . PHP_EOL);
		fwrite($file, '	$Eliminar            = '.$respuesta[0]['eliminar'].';' . PHP_EOL);
		fwrite($file, '	$Acceso_parametros   = '.$p.';' . PHP_EOL);
		fwrite($file, '	$Acceso_registros    = '.$r.';' . PHP_EOL);
		fwrite($file, '	$Usuario_seguimiento = '.$s.';' . PHP_EOL);
		fclose($file);
	}
	else
	{
		$respuesta = array();
	}

	echo json_encode($respuesta);