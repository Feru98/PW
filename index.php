<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="centroAdopcion.css">
	<title> Centro de adopcion </title>
</head>
<body>
<?php
	require_once('queryFunctionsLibrary.php');

	$q = new ConsultasEmpresa();

	if(empty($q->dbc)){
		echo "Error!";
		die();
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
  <a href="./pruebas.php">pruebas</a>
_END;
?>
</body>
</html>
