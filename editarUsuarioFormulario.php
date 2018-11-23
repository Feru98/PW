<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="centroAdopcion.css">
	<title> Editar usuario </title>
</head>
<body>
<?php
	require_once('queryFunctionsLibrary.php');

	$q = new ConsultasEmpresa();

	if(empty($q->dbc)){
		echo "Error!";
		die();
	}

	$dni=$_GET["dni"];

	$empleado = $q->getEmpleado($dni);

	$dni=$empleado[0]['DNI'];
	$nombre=$empleado[0]['Nombre'];
	$direccion=$empleado[0]['Direccion'];
	$nacimiento=$empleado[0]['Nacimiento'];
	$sexo=$empleado[0]['Sexo'];
	$sueldo=$empleado[0]['Sueldo'];
	$imagen=$empleado[0]['Imagen'];
	$mediajornada=$empleado[0]['MediaJornada'];
	$tarde=$empleado[0]['Tarde'];
	$noche=$empleado[0]['Noche'];

echo <<<_END
	<form method="POST" action="editarUsuario.php" align="center">
		<table align="center">
			<tr>
				<th>Nombre*</th>
				<td><input type="text" name="nombre" required value=$nombre><br></td>
			</tr>
			<tr>
				<th>DNI*</th>
				<td><input type="text" name="dni" readonly="readonly" value=$dni><br></td>
			</tr>
	  		<tr>
				<th>Direccion</th>
				<td><input type="text" name="direccion" value=$direccion><br></td>
			</tr>
			<tr>
				<th>Nacimiento</th>
				<td><input type="date" name="nacimiento" value=$nacimiento><br></td>
			</tr>
			<tr>
				<th>Sueldo</th>
				<td><input type="text" name="sueldo" value=$sueldo><br></td>
			</tr>
			<tr>
				<th>Imagen</th>
				<td><input type="text" name="imagen" value=$imagen><br></td>
			</tr>
			<tr>
				<th>Sexo</th>
				<td align="left">
_END;
	if(strcmp($sexo, "Hombre") == 0){
echo <<<_END
					<input type="radio" name="sexo" value="Hombre" checked> Hombre<br>
					<input type="radio" name="sexo" value="Mujer"> Mujer<br>
					<input type="radio" name="sexo" value="No binario"> No binario<br>
_END;
	}
	else{
		if(strcmp($sexo, "Mujer") == 0){
echo <<<_END
					<input type="radio" name="sexo" value="Hombre"> Hombre<br>
					<input type="radio" name="sexo" value="Mujer" checked> Mujer<br>
					<input type="radio" name="sexo" value="No binario"> No binario<br>
_END;
		}
		else{
echo <<<_END
					<input type="radio" name="sexo" value="Hombre"> Hombre<br>
					<input type="radio" name="sexo" value="Mujer"> Mujer<br>
					<input type="radio" name="sexo" value="No binario" checked> No binario<br>
_END;
		}
	}
echo <<<_END
				</td>
			</tr>
			<tr>
				<th>Turno</th>
				<td align="left">
_END;
	if($mediajornada){ echo '<input type="checkbox" name="mediajornada" value=1 checked> Media jornada<br>';}
	else{ echo '<input type="checkbox" name="mediajornada" value=1> Media jornada<br>';}
	if($tarde){ echo '<input type="checkbox" name="tarde" value=1 checked> Tarde<br>';}
	else{ echo '<input type="checkbox" name="tarde" value=1> Tarde<br>';}
	if($noche){ echo '<input type="checkbox" name="noche" value=1 checked> Noche<br>';}
	else{ echo '<input type="checkbox" name="noche" value=1> Noche<br>';}
echo <<<_END
				</td>
			</tr>
		</table>
		<br>
		<table align="center">
			<tr>
				<td><input type="submit" value="Guardar cambios"><td>
			</tr>
		</table>
	</form>
_END;
?>
</body>
</html>
