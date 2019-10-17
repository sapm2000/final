<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Registro_medico extends ClaseBase
{
	private $registro_medico;

	public function setRegistro_medico($registro_medico)
	{
		$this->registro_medico = $registro_medico;
	}

	public function getRegistro_medico()
	{
		return $this->registro_medico;
	}


	
	public function guardarRegistro_medico()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (registro_medico) VALUES ('$this->registro_medico')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarRegistro_medico()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET registro_medico='$this->registro_medico' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}
}

?>