<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="centroAdopcion.css">
    <title> Centro de adopcion </title>
</head>
<body style="font-family: verdana">
<img src="./descarga1.jpg" width="20%" style="position: absolute; top: 100; left: 0;" />
<img src="./descarga2.png" width="20%" style="position: absolute; top: 0; right: 0;" />
<br>
<br>
<br>
<br>
<br>
<br>
<?php
	require_once('queryFunctionsLibrary.php');

	$q = new ConsultasEmpresa();

	if(empty($q->dbc)){
		echo "Error!";
		die();
	}

echo <<<_END
	<h1 style="color: #336797 " align="center"><ins>Lista de empleados</ins></h1>
		<table align="center">
		<th>
		<ul style="list-style-type:none">
_END;
/*	<h3 align="center">Listado de empleados</h3>
	<table align = "center" class="list" stylr="margin: 0 auto;">
		<tr align="center" class="list">
			<th class="list">DNI</th>
			<th class="list">Nombre</th>
		</tr>*/

	$empleados = $q->getEmpleados();
	foreach($empleados as $empleado){
echo <<<_END
	<tr align="center" class="list">
		<td class="list"> $empleado[Nombre] </td>
		<td class="list"> $empleado[DNI] </td>
		<td class="list"> <a href="./empleado.php?dni=$empleado[DNI]"><img src="./descarga.png" width="5%"/></a> </td>
	</tr>
_END;
	}

	echo "</table>";
?>
</body>
</html>