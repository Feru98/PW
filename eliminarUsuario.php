<?php
	require_once('queryFunctionsLibrary.php');

	$q = new ConsultasEmpresa();

	if(empty($q->dbc)){
		echo "Error!";
		die();
	}

	$dni=$_GET["dni"];

	$empleado = $q->getEmpleado($dni);


	if(empty($empleado)){
		echo "no esta";

	}
	else{
			$q->deleteEmpleado($dni);
			header("Location: /index.php");
	}
?>
