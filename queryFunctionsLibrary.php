<?php
class ConsultasEmpresa {
	public $usuario = 'root';

	public $pass = '';


	public $dbc;

	public function __construct(){
		$this->dbc = $this->dbconnect();
	}

	public function dbconnect(){
		$dbc = null;

		try {
			$dbc = new PDO('mysql:host=localhost; dbname=empleados', $this->usuario, $this->pass, array(PDO::ATTR_PERSISTENT => true));
		} catch (PDOException $e) {
			return null;
		}

		return $dbc;
	}

	public function getEmpleados(){
		$empleados = array();
		$i = 0;

		$sentence = $this->dbc->prepare("SELECT * FROM Empleados");

		if ($sentence->execute()) {
			while ($row = $sentence->fetch()) {
				$empleados[$i] = $row;
				$i++;
			}
		}

		return $empleados;
	}

	public function getEmpleado($dni){
		$empleados = array();
		$i = 0;
		$sentence = $this->dbc->prepare("SELECT * FROM Empleados WHERE DNI='$dni' ");


		if ($sentence->execute()) {
			while ($row = $sentence->fetch()) {
				$empleados[$i] = $row;
				$i++;
			}
		}


		return $empleados;
	}


	public function getUsuario($nombre){
		$empleados = array();
		$i = 0;
		$sentence = $this->dbc->prepare("SELECT * FROM Usuarios WHERE Nombre='$nombre' ");


		if ($sentence->execute()) {
			while ($row = $sentence->fetch()) {
				$empleados[$i] = $row;
				$i++;
			}
		}


		return $empleados;
	}

	public function deleteEmpleado($dni){
		
		try{
		$sentence = $this->dbc->prepare("DELETE FROM Empleados WHERE DNI='$dni' ");
		$sentence->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}

	
	}

	public function deleteAll(){
		
		try{
		$sentence = $this->dbc->prepare("DELETE FROM Empleados ");
		$sentence->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}

	
	}

	public function agregarEmpleado($dni , $nombre , $direccion, $nacimiento , $sexo , $mediajornada , $tarde , $noche , $sueldo ,$imagen){
		
		try {
			$sentence = $this->dbc->prepare("INSERT INTO Empleados (Nombre, DNI, Direccion, Nacimiento, Sexo, MediaJornada, Tarde, Noche , Sueldo , Imagen) VALUES ('$nombre','$dni','$direccion','$nacimiento','$sexo', '$mediajornada' , '$tarde' , '$noche', '$sueldo', '$imagen')");
			$sentence->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}


	public function modificarEmpleado($dni , $nombre , $direccion, $nacimiento , $sexo, $mediajornada , $tarde , $noche , $sueldo, $imagen){
		
		try {
			$sentence = $this->dbc->prepare("UPDATE Empleados 
												SET Nombre= '$nombre'
												WHERE DNI='$dni'");
			$sentence->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();

		}

		try {
			$sentence = $this->dbc->prepare("UPDATE Empleados 
												SET Direccion= '$direccion'
												WHERE DNI='$dni'");
			$sentence->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();

		}

		try {
			$sentence = $this->dbc->prepare("UPDATE Empleados 
												SET Nacimiento='$nacimiento'
												WHERE DNI='$dni'");
			$sentence->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();

		}

		try {
			$sentence = $this->dbc->prepare("UPDATE Empleados 
												SET Sexo='$sexo'
												WHERE DNI='$dni'");
			$sentence->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();

		}
		try {
			$sentence = $this->dbc->prepare("UPDATE Empleados 
												SET Sueldo='$sueldo'
												WHERE DNI='$dni'");
			$sentence->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();

		}
		try {
			$sentence = $this->dbc->prepare("UPDATE Empleados 
												SET Imagen='$imagen'
												WHERE DNI='$dni'");
			$sentence->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();

		}

		try {
			$sentence = $this->dbc->prepare("UPDATE Empleados 
												SET MediaJornada='$mediajornada'
												WHERE DNI='$dni'");
			$sentence->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();

		}

		try {
			$sentence = $this->dbc->prepare("UPDATE Empleados 
												SET Tarde='$tarde'
												WHERE DNI='$dni'");
			$sentence->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();

		}

		try {
			$sentence = $this->dbc->prepare("UPDATE Empleados 
												SET Noche='$noche'
												WHERE DNI='$dni'");
			$sentence->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();

		}
	}

/*
SET Direccion='$direccion'
												SET Nacimiento='$nacimiento'
												SET Sexo='$sexo'

*/

}
?>

