<?php
	require_once('queryFunctionsLibrary.php');

	$q = new ConsultasEmpresa();

	if(empty($q->dbc)){
		echo "Error!";
		die();
	}

	$user = $_POST['usuario'];
	$password = $_POST['contrasena'];

	$token = hash('ripemd128', $password);

	$usuario = $q->getUsuario($user);

	if(empty($usuario)){
		header("Location: /sesionRechazada.php?usuarioMal");
	}

	$contrasena = $usuario[0]['Contrasena'];
	if(strcmp($token, $contrasena) == 0){
		session_start();

		$_SESSION['loggedin'] = true;
		$_SESSION['name'] = $user;
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (1 * 60);

		header("Location: /pruebas.php");
	}
	else header("Location: /sesionRechazada.php");
/*
	if(strcmp($user, Tomi) == 0){
		if(strcmp($token, hash('ripemd128', '123')) == 0){
			session_start();

			$_SESSION['loggedin'] = true;
			$_SESSION['name'] = $user;
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (1 * 60);

			header("Location: /index.php");
		}
		else{
			header("Location: /sesionRechazada.php");
		}
	}
	else{
		header("Location: /sesionRechazada.php");
	}
*/
?>
