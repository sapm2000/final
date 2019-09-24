<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Calzado extends ClaseBase
{
	private $calzado;

	public function setCalzado($calzado)
	{
		$this->calzado = $calzado;
	}

	public function getCalzado()
	{
		return $this->calzado;
	}


	
	public function guardarPersona()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (calzado) VALUES ('$this->calzado')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarPersona()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET calzado='$this->calzado' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}
}

?>