<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');
	
	require '../database/editar.php';
	require '../database/leer.php';

	$id        = $_POST['id'];
	$nombre    = $_POST['nombre'];
	$apellido  = $_POST['apellido'];
	$clave     = Hash('SHA1', $_POST['clave']);
	$usuario   = strtoupper($_POST['usuario']);
	$correo    = $_POST['correo'];
	$editado   = date('Y-m-d H:i:s');

	$respuesta = recursoHumano($id);

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

	fwrite($file, '<?php' . PHP_EOL);
	fwrite($file, '	//Variables Usuario' . PHP_EOL);
	fwrite($file, '	$Id                = '.$id.';' . PHP_EOL);
	fwrite($file, '	$Name              = \''.$nombre.'\';' . PHP_EOL);
	fwrite($file, '	$Lastname          = \''.$apellido.'\';' . PHP_EOL);
	fwrite($file, '	$User              = \''.$usuario.'\';' . PHP_EOL);
	fwrite($file, '	$RolId             = '.$respuesta['rol_id'].';' . PHP_EOL);
	fwrite($file, '	$Rol               = \''.$respuesta['r_descripcion'].'\';' . PHP_EOL);
	fwrite($file, '	$Crear             = '.$respuesta['crear'].';' . PHP_EOL);
	fwrite($file, '	$Leer              = '.$respuesta['leer'].';' . PHP_EOL);
	fwrite($file, '	$Editar            = '.$respuesta['editar'].';' . PHP_EOL);
	fwrite($file, '	$Eliminar          = '.$respuesta['eliminar'].';' . PHP_EOL);
	fwrite($file, '	$Acceso_parametros = '.$p.';' . PHP_EOL);
	fwrite($file, '	$Acceso_registros  = '.$r.';' . PHP_EOL);
	fclose($file);

	if ($_POST['clave'] == "") 
	{
		editMyProfilWithoutPassword($id, $nombre, $apellido, $usuario, $correo, $editado);
	} 
	else 
	{
		editMyProfilWithPassword($id, $nombre, $apellido, $usuario, $correo, $clave, $editado);
	}
	
	echo json_encode(0);