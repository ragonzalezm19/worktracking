<?php 
	// Timezone
	date_default_timezone_set('America/Caracas');
	
	require '../../../database/editar.php';

	$id             = $_POST['id'];
	$rif            = $_POST['pre-rif'].'-'.$_POST['rif'];
	$nombre         = $_POST['nombre'];
	$direccion      = $_POST['direccion'];
	$telefono       = $_POST['pre-telefono'].'-'.$_POST['telefono'];
	$usuario        = strtoupper($_POST['usuario']);
	$correo         = $_POST['correo'];
	$clave          = Hash('SHA1', $_POST['clave']);
	$ing_e_nombre   = $_POST['ing_e_nombre'];
	$ing_e_apellido = $_POST['ing_e_apellido'];
	$ing_e_cedula   = $_POST['pre-ing_e_cedula'].'-'.$_POST['ing_e_cedula'];
	$ing_e_correo   = $_POST['ing_e_correo'];
	$ing_e_telefono = $_POST['pre-ing_e_telefono'].'-'.$_POST['ing_e_telefono'];
	$ing_s_nombre   = $_POST['ing_s_nombre'];
	$ing_s_apellido = $_POST['ing_s_apellido'];
	if ($_POST['pre-ing_s_cedula'] == '' && $_POST['ing_s_cedula'] == '') {
		$ing_s_cedula  = '';
	} else {
		$ing_s_cedula   = $_POST['pre-ing_s_cedula'].'-'.$_POST['ing_s_cedula'];
	}
	$ing_s_correo   = $_POST['ing_s_correo'];
	if ($_POST['pre-ing_s_telefono'] == '' && $_POST['ing_s_telefono'] == '') {
		$ing_s_telefono = '';
	} else {
		$ing_s_telefono = $_POST['pre-ing_s_telefono'].'-'.$_POST['ing_s_telefono'];
	}
	$editado        = date('Y-m-d H:i:s');

	

	if ($_POST['clave'] == "") 
	{
		editClienteWithoutPassword($id, $rif , $nombre, $direccion, $telefono, $usuario, $correo, $ing_e_nombre, $ing_e_apellido, $ing_e_cedula, $ing_e_correo, $ing_e_telefono,  $ing_s_nombre, $ing_s_apellido, $ing_s_cedula, $ing_s_correo, $ing_s_telefono, $editado);
	} 
	else 
	{
		editClienteWithPassword($id, $rif , $nombre, $direccion, $telefono, $usuario, $correo, $clave, $ing_e_nombre, $ing_e_apellido, $ing_e_cedula, $ing_e_correo, $ing_e_telefono,  $ing_s_nombre, $ing_s_apellido, $ing_s_cedula, $ing_s_correo, $ing_s_telefono, $editado);
	}

	// editCliente($id, $rif , $nombre, $direccion, $telefono, $ing_e_nombre, $ing_e_apellido, $ing_e_cedula, $ing_e_correo, $ing_e_telefono,  $ing_s_nombre, $ing_s_apellido, $ing_s_cedula, $ing_s_correo, $ing_s_telefono, $editado);
	echo json_encode(0);