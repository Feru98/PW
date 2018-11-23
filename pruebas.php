<?php
	session_start();
echo <<<_END
<!DOCTYPE html>
<head>
	<title> Inicio sesion </title>
</head>
<body>
	<a href="./iniciarSesion.php">Iniciar sesion</a>;
_END;
echo hash('ripemd128', '123');
	
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
		$now = time();

		if($now > $_SESSION['expire']){
			session_destroy();
			echo "Time out";
			exit;
		}
		echo "Conectado";
		echo $_SESSION['name'];

	}else{
		echo "No conectado";
		exit;
	}
?>
</body>
</html>
