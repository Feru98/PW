<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="centroAdopcion.css">
	<title> Nuevo usuario </title>
</head>
<body>
	<form method="POST" action="agregarUser.php" align="center">
		<table align="center">
			<tr>
				<th>Nombre*</th>
				<td><input type="text" name="nombre" required><br></td>
			</tr>
			<tr>
				<th>Contrasena*</th>
				<td><input type="password" name="contrasena" required><br></td>
			</tr>
	  		<tr>
				<th>Repita la contrasena</th>
				<td><input type="password" name="contrasena2"><br></td>
			</tr>
			
		</table>
		<br>
		<table align="center">
			<tr>
				<td><input type="submit" value="Agregar usuario"><td>
			</tr>
		</table>
	</form>
</body>
</html>