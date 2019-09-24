<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Alergia extends ClaseBase
{
	private $alergia;

	public function setAlergia($alergia)
	{
		$this->alergia = $alergia;
	}

	public function getAlergia()
	{
		return $this->alergia;
	}


	
	public function guardarPersona()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (alergia) VALUES ('$this->alergia')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarPersona()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET alergia='$this->alergia' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}
}

?>