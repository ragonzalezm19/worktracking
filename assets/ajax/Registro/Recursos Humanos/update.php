<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');
	
	require '../../../database/editar.php';

	$id                    = $_POST['id'];
	$nombre                = $_POST['nombre'];
	$apellido              = $_POST['apellido'];
	$cedula                = $_POST['pre-cedula'].'-'.$_POST['cedula'];
	$direccion             = $_POST['direccion'];
	$telefono              = $_POST['pre-telefono'].'-'.$_POST['telefono'];
	$correo                = $_POST['correo'];
	$numero_de_colegiatura = $_POST['numero-de-colegiatura'];
	$profesion_id          = $_POST['profesion_id'];
	$honorario             = $_POST['honorario'];
	$clave                 = Hash('SHA1', $_POST['clave']);
	$usuario               = strtoupper($_POST['usuario']);
	$rol_id                = $_POST['rol_id'];
	$editado               = date('Y-m-d H:i:s');

	if ($_POST['clave'] == "") 
	{
		editRecursoHumanoWithoutPassword($id, $nombre, $apellido, $cedula, $direccion, $telefono, $correo, $numero_de_colegiatura, $profesion_id, $honorario, $usuario, $rol_id, $editado);
	} 
	else 
	{
		editRecursoHumanoWithPassword($id, $nombre, $apellido, $cedula, $direccion, $telefono, $correo, $numero_de_colegiatura, $profesion_id, $honorario, $clave, $usuario, $rol_id, $editado);
	}
	// editRecursoHumano($id, $nombre, $apellido, $cedula, $direccion, $telefono, $correo, $profesion_id, $honorario, $clave, $usuario, $rol_id, $editado);
	echo json_encode(0);