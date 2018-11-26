<?php
	require_once('queryFunctionsLibrary.php');

	$q = new ConsultasEmpresa();

	if(empty($q->dbc)){
		echo "Error!";
		die();
	}

	$nombre=$_POST["nombre"];

	$empleado = $q->getUsuario($nombre);

	$contrasena=$_POST["contrasena"];
	$contrasena2=$_POST["contrasena2"];
	$admin="0";

	if($contrasena != $contrasena2)
	{
		header("Location: /index.php"); /// a otro sitio que diga que no ha introducido bien ambas con
	}

	$token = hash('ripemd128', $contrasena);

	if(empty($empleado)){
		$q->agregarUsuario( $nombre , $token , $admin);
		header("Location: /index.php");
	}
	else{
		header("Location: /agregarUsuarioFormulario.php?dniRepetido=repetido&nombre=$nombre&direccion=$direccion&nacimiento=$nacimiento");
	}
?>