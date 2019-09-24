<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Nivel extends ClaseBase
{
	private $nivel;

	public function setNivel($nivel)
	{
		$this->nivel = $nivel;
	}

	public function getNivel()
	{
		return $this->nivel;
	}


	
	public function guardarPersona()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (nivel) VALUES ('$this->nivel')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarPersona()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET nivel='$this->nivel' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}
}


?>