<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Estatu extends ClaseBase
{
	private $estatu;

	public function setEstatu($estatu)
	{
		$this->estatu = $estatu;
	}

	public function getEstatu()
	{
		return $this->estatu;
	}


	
	public function guardarPersona()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (estatu) VALUES ('$this->estatu')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarPersona()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET estatu='$this->estatu' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}
}


?>