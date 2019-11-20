<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Patologia_medica extends ClaseBase
{
	private $patologia_medica;

	public function setPatologia_medica($patologia_medica)
	{
		$this->patologia_medica = $patologia_medica;
	}

	public function getPatologia_medica()
	{
		return $this->patologia_medica;
	}


	
	public function guardarPatologia_medica()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (patologia_medica) VALUES ('$this->patologia_medica')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarPatologia_medica()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET patologia_medica='$this->patologia_medica' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}
}

?>