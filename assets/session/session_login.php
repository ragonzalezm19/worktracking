<?php 
	$File = $Path.'app/usuario.php';
	if (file_exists($File)) 
	{
		header('Location: '.$Path.'app/Home/');
	}