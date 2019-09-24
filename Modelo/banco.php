<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Banco extends ClaseBase
{
	private $banco, $codigo;

	public function setBanco($banco)
	{
		$this->banco = $banco;
	}

	public function getBanco()
	{
		return $this->banco;
	}



	
	public function guardarBanco()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (banco) VALUES ('$this->banco')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarBanco()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET banco='$this->banco' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}
}


?>