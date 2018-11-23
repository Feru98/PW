<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="centroAdopcion.css">
	<title> Nuevo usuario </title>
</head>
<body>
<?php

	$dniRepetido=$_GET["dniRepetido"];

	if(empty($dniRepetido)){
echo <<<_END
	<form method="POST" action="agregarUsuario.php" align="center">
		<table align="center">
			<tr>
				<th>Nombre*</th>
				<td><input type="text" name="nombre" required><br></td>
			</tr>
			<tr>
				<th>DNI*</th>
				<td><input type="text" name="dni" required><br></td>
			</tr>
	  		<tr>
				<th>Direccion</th>
				<td><input type="text" name="direccion"><br></td>
			</tr>
			<tr>
				<th>Nacimiento</th>
				<td><input type="date" name="nacimiento"><br></td>
			</tr>
			<tr>
				<th>Sexo</th>
				<td>
					<input type="radio" name="sexo" value="Hombre" checked> Hombre<br>
					<input type="radio" name="sexo" value="Mujer"> Mujer<br>
					<input type="radio" name="sexo" value="nobinario"> No binario<br>
				</td>
			</tr>
			<tr>
				<th>Sueldo</th>
				<td><input type="text" name="sueldo"><br></td>
			</tr>
			<tr>
				<th>Imagen</th>
				<td><input type="text" name="imagen"><br></td>
			</tr>
			<tr>
				<th>Turno</th>
				<td>
					<input type="checkbox" name="mediajornada" value=1> Media jornada<br>
					<input type="checkbox" name="tarde" value=1> Tarde<br>
					<input type="checkbox" name="noche" value=1> Noche<br>
				</td>
			</tr>
		</table>
		<br>
		<table align="center">
			<tr>
				<td><input type="submit" value="Agregar usuario"><td>
			</tr>
		</table>
	</form>
_END;
	}
	else{
		$nombre=$_GET["nombre"];
		$direccion=$_GET["direccion"];
		$nacimiento=$_GET["nacimiento"];

echo <<<_END
		<br>
		<table class="error" align="center">
			<tr>
				<th class="error"> Error: El DNI que ha introducido ya está en uso </th>
			</tr>
		</table>
		<br>
	<form method="POST" action="index1.php" align="center">
		<table align="center">
			<tr>
				<th>Nombre*</th>
				<td><input type="text" name="nombre" value=$nombre required><br></td>
			</tr>
			<tr>
				<th>DNI*</th>
				<td><input type="text" name="dni" required><br></td>
			</tr>
	  		<tr>
				<th>Direccion</th>
				<td><input type="text" name="direccion" value=$direccion><br></td>
			</tr>
			<tr>
				<th>Nacimiento</th>
				<td><input type="text" name="nacimiento" value=$nacimiento><br></td>
			</tr>
			<tr>
				<th>Sexo</th>
				<td align="left">
					<input type="radio" name="sexo" value="hombre" checked> Hombre<br>
					<input type="radio" name="sexo" value="mujer"> Mujer<br>
					<input type="radio" name="sexo" value="nobinaria"> No binario<br>
				</td>
			</tr>
			<tr>
				<th>Sueldo</th>
				<td><input type="text" name="sueldo"><br></td>
			</tr>
			<tr>
				<th>Imagen</th>
				<td><input type="text" name="imagen"><br></td>
			</tr>
			<tr>
				<th>Turno</th>
				<td align="left">
					<input type="checkbox" name="mediajornada" value="Media jornada"> Media jornada<br>
					<input type="checkbox" name="tarde" value="Tarde"> Tarde<br>
					<input type="checkbox" name="noche" value="Noche"> Noche<br>
				</td>
			</tr>
		</table>
		<br>
		<table align="center">
			<tr>
				<td><input type="submit" value="Agregar usuario"><td>
			</tr>
		</table>
	</form>
_END;
	}

?>
</body>
</html>
