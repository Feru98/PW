<?php
	require_once('queryFunctionsLibrary.php');

	$q = new ConsultasEmpresa();

	if(empty($q->dbc)){
		echo "Error!";
		die();
	}

	$nombre=$_POST["nombre"];

	$empleado = $q->getEmpleado($dni);

	$contrasena=$_POST["contrasena"];
	$admin=$_POST["admin"];

	if(empty($empleado)){
		$q->agregarUsuario( $nombre , $contrasena, $admin);
		header("Location: /index.php");
	}
	else{
		header("Location: /agregarUsuarioFormulario.php?dniRepetido=repetido&nombre=$nombre&direccion=$direccion&nacimiento=$nacimiento");
	}
?>