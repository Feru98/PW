<?php
	require_once('queryFunctionsLibrary.php');

	$q = new ConsultasEmpresa();

	if(empty($q->dbc)){
		echo "Error!";
		die();
	}

	$dni=$_POST["dni"];

	$empleado = $q->getEmpleado($dni);

	$nombre=$_POST["nombre"];
	$direccion=$_POST["direccion"];
	$nacimiento=$_POST["nacimiento"];
	$sexo=$_POST["sexo"];
	$sueldo=$_POST["sueldo"];
	$imagen=$_POST["imagen"];
	$mediajornada=$_POST["mediajornada"];
	$tarde=$_POST["tarde"];
	$noche=$_POST["noche"];

	if(empty($empleado)){
		$q->agregarEmpleado($dni , $nombre , $direccion, $nacimiento , $sexo, $mediajornada , $tarde , $noche , $sueldo , $imagen );
		header("Location: /index.php");
	}
	else{
		header("Location: /agregarUsuarioFormulario.php?dniRepetido=repetido&nombre=$nombre&direccion=$direccion&nacimiento=$nacimiento");
	}
?>
