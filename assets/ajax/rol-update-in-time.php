<?php 
	require '../database/leer.php';
	require '../../app/usuario.php';

	$respuesta  = rol($RolId);
	$Usuario = usuarioWithoutRol($Id);

	unlink('../../app/usuario.php');
	$file = fopen('../../app/usuario.php', 'x+');

	if($respuesta['parametros'] != '')
		{
			$parametros = explode(";", $respuesta['parametros']);
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
	if($respuesta['registros'] != '')
		{
			$registros = explode(";", $respuesta['registros']);
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
			$r = 'array()';
		}
		if($respuesta['seguimiento'] != '')
		{
			$seguimiento = explode(";", $respuesta['seguimiento']);
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
	fwrite($file, '	$Id                  = '.$Usuario['id'].';' . PHP_EOL);
	fwrite($file, '	$Name                = "'.$Usuario['nombre'].'";' . PHP_EOL);
	fwrite($file, '	$Lastname            = "'.$Usuario['apellido'].'";' . PHP_EOL);
	fwrite($file, '	$User                = "'.$Usuario['usuario'].'";' . PHP_EOL);
	fwrite($file, '	$RolId               = '.$Usuario['rol_id'].';' . PHP_EOL);
	fwrite($file, '	$Rol                 = "'.$Usuario['descripcion'].'";' . PHP_EOL);
	fwrite($file, '	$Crear               = '.$respuesta['crear'].';' . PHP_EOL);
	fwrite($file, '	$Leer                = '.$respuesta['leer'].';' . PHP_EOL);
	fwrite($file, '	$Editar              = '.$respuesta['editar'].';' . PHP_EOL);
	fwrite($file, '	$Eliminar            = '.$respuesta['eliminar'].';' . PHP_EOL);
	fwrite($file, '	$Acceso_parametros   = '.$p.';' . PHP_EOL);
	fwrite($file, '	$Acceso_registros    = '.$r.';' . PHP_EOL);
	fwrite($file, '	$Usuario_seguimiento = '.$s.';' . PHP_EOL);
	fclose($file);

	echo json_encode(0);