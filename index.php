<?php
	session_start();
echo <<<_END
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="centroAdopcion.css">
	<title> Centro de adopcion </title>
</head>
<body>
	<table align="right">
	<tr>
		<td><a href="./iniciarSesion.php">Iniciar sesion</a></td>
	</tr>
	</table>
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
			echo "Time out";
			exit;
		}
echo <<<_END
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

	}else{
echo <<<_END
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


?>
</body>
</html>
