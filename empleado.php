<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="centroAdopcion.css">
	<title>Empleado</title>
</head>
<body>
	
<?php

	$dni=$_GET["dni"];
	require_once('queryFunctionsLibrary.php');

	$q = new ConsultasEmpresa();

	if(empty($q->dbc)){
		echo "Error!";
		die();
	}

echo <<<_END
<br>
<br>
<table align="center">
<tr>
  <th>Empleado:</th>
  <th></th>
</tr>

_END;

	$empleados = $q->getEmpleado($dni);

	foreach($empleados as $empleado){
echo <<<_END
		<tr>
		  <th>Nombre</th>
		  <td class="list"> $empleado[Nombre] </td>
		</tr>
		<tr>
		  <th>DNI</th>
		  <td class="list"> $empleado[DNI] </td>
		</tr>
  		<tr>
		  <th>Direccion</th>
		  <td class="list"> $empleado[Direccion] </td>
		</tr>
		<tr>
		  <th>Nacimiento</th>
		  <td class="list"> $empleado[Nacimiento] </td>
		</tr>
		<tr>
		  <th>Sexo</th>
		  <td class="list"> $empleado[Sexo] </td>
		</tr>
		<th>Sueldo</th>
		  <td class="list"> $empleado[Sueldo] </td>
		</tr>
		<th>Imagen</th>
		  <td class="list"> <img src="$empleado[Imagen]" width="30%"/> </td>
		</tr>
		<tr>
		  <th>Turno</th>

	
_END;
	
	echo "<td>";
	if ($empleado['MediaJornada']==1) {
		 echo "MediaJornada<br>";
		
	}

	if ($empleado['Tarde']==1) {
		echo "Tarde<br>";
	}

	if ($empleado['Noche']==1) {
		echo "Noche<br>";
	}
	echo "</td></tr>";
}
	echo "</table>";



?>
</body>
</html>