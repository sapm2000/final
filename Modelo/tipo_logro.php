<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Tipo_logro extends ClaseBase
{
	private $tipo_logro;

	public function setTipo_logro($tipo_logro)
	{
		$this->tipo_logro = $tipo_logro;
	}

	public function getTipo_logro()
	{
		return $this->tipo_logro;
	}


	
	public function guardarTipoLogro()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (tipo_logro) VALUES ('$this->tipo_logro')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarTipoLogro()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET tipo_logro='$this->tipo_logro' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}
}

?>