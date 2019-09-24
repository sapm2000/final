<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Discapacidad extends ClaseBase
{
	private $discapacidad;

	public function setDiscapacidad($discapacidad)
	{
		$this->discapacidad = $discapacidad;
	}

	public function getDiscapacidad()
	{
		return $this->discapacidad;
	}


	
	public function guardarPersona()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (discapacidad) VALUES ('$this->discapacidad')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarPersona()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET discapacidad='$this->discapacidad' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}
}


?>