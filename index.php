<?php
	session_start();
echo <<<_END
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="centroAdopcion.css">
	<title> Centro de adopcion </title>
</head>
<body>
_END;
	require_once('queryFunctionsLibrary.php');

	$q = new ConsultasEmpresa();

	if(empty($q->dbc)){
		echo "Error!";
		die();
	}
	
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
		$now = time();

		if($now > $_SESSION['expire']){
			session_destroy();
echo <<<_END
			<table class="error" align="center">
				<tr>
					<th class="error"><a href="./index.php">Su sesión ha expirado, vuelva a introducir sus datos</a></th>
				</tr>
			</table>
_END;
			exit;
		}

		$usuario = $q->getUsuario($_SESSION['name']);

		if(strcmp($usuario[0]['Admin'], '1') == 0){
echo <<<_END
		<table align="right">
			<tr>
				<th>Usuario</th>
			</tr>
			<tr>
				<td>$_SESSION[name]</td>
			</tr>
		</table>
		<br>
		<br>
		<br>
		<br>
		<center>
			<img src="./Dog_Category_Header_Image.png" width="45%"/>
		</center>
		<br>
		<br>
		<br>
		<br>

		<table align="center">
		<tr>
		  <th>Nuestros cuidadores:</th>
		  <th></th>
		  <th></th>
		  <th></th>
		  <th></th>
		</tr>
		<tr>
		  <th>DNI</th>
		  <th>Nombre</th>
		  <th></th>
		  <th></th>
		  <th></th>
		</tr>
_END;
			$empleados = $q->getEmpleados();
			foreach($empleados as $empleado){
echo <<<_END
		<tr>
		  <td>$empleado[DNI]</td>
		  <td>$empleado[Nombre]</td>
		  <td><a href="./empleado.php?dni=$empleado[DNI]"><img src="cursor(1).png" width="10%"/></a></td>
		  <td><a href="./editarUsuarioFormulario.php?dni=$empleado[DNI]"><img src="pencil-edit-button.png" width="10%"/></a></td>
		  <td><a href="./eliminarUsuario.php?dni=$empleado[DNI]"><img src="rubbish-bin.png" width="10%"/></a></td>
		</tr>
_END;
			}
echo <<<_END
		<tr>
		  <td><a href="./agregarUsuarioFormulario.php?dniRepetido="><img src="icon.png" width="10%"/></a></td>
		   <td><a href="./borrarTodos.php"><img src="delete.png" width="10%"/></a></td>
		</tr>
		</table>
_END;
		}
		else{
echo <<<_END
		<table align="right">
			<tr>
				<th>Usuario</th>
			</tr>
			<tr>
				<td>$_SESSION[name]</td>
			</tr>
		</table>
		<br>
		<br>
		<br>
		<br>
		<center>
			<img src="./Dog_Category_Header_Image.png" width="45%"/>
		</center>
		<br>
		<br>
		<br>
		<br>

		<table align="center">
		<tr>
		  <th>Nuestros cuidadores:</th>
		  <th></th>
		  <th></th>
		</tr>
		<tr>
		  <th>DNI</th>
		  <th>Nombre</th>
		  <th></th>
		</tr>
_END;
			$empleados = $q->getEmpleados();
			foreach($empleados as $empleado){
echo <<<_END
		<tr>
		  <td>$empleado[DNI]</td>
		  <td>$empleado[Nombre]</td>
		  <td><a href="./empleado.php?dni=$empleado[DNI]"><img src="cursor(1).png" width="10%"/></a></td>
		</tr>
_END;
			}
			echo "</table>";
		}
	}else{
echo <<<_END
		<form method="POST" action="login.php" align="right">
			<table align="right">
				<tr>
					<th>Usuario</th>
					<td><input type="text" name="usuario" required><br></td>
				</tr>
				<tr>
					<th>Password</th>
					<td><input type="password" name="contrasena" required><br></td>
				</tr>
			</table>
			<br>
			<br>
			<br>
			<br>
			<table align="right">
				<tr>
					<td><input type="submit" value="Iniciar sesion"><td>
				</tr>
			</table>
		</form>
		<table align="right">
				<tr>
					<td><a href="./agregarUserFormulario.php"> Crear Usuario </a></td>
				</tr>
		</table>
		<br>
		<br>
		<br>
		<center>
			<img src="./Dog_Category_Header_Image.png" width="45%"/>
		</center>
		<br>
		<br>
		<br>
		<br>

		<table align="center">
		<tr>
		  <th>Nuestros cuidadores:</th>
		  <th></th>
		</tr>
		<tr>
		  <th>DNI</th>
		  <th>Nombre</th>
		</tr>
_END;
			$empleados = $q->getEmpleados();
			foreach($empleados as $empleado){
echo <<<_END
		<tr>
		  <td>$empleado[DNI]</td>
		  <td>$empleado[Nombre]</td>
		</tr>
_END;
			}
echo <<<_END
		</table>
_END;
		exit;
	}
?>
</body>
</html>
