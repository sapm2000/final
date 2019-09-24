<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Parentezco extends ClaseBase
{
	private $parentezco;

	public function setParentezco($parentezco)
	{
		$this->parentezco = $parentezco;
	}

	public function getParentezco()
	{
		return $this->parentezco;
	}


	
	public function guardarParentezco()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (parentezco) VALUES ('$this->parentezco')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarParentezco()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET parentezco='$this->parentezco' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}
}


?>