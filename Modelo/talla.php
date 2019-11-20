<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Talla extends ClaseBase
{
	private $talla;

	public function setTalla($talla)
	{
		$this->talla = $talla;
	}

	public function getTalla()
	{
		return $this->talla;
	}


	
	public function guardarTalla()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (talla) VALUES ('$this->talla')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarTalla()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET talla='$this->talla' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}

	public function getreporte()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT talla, COUNT(*) AS total from atleta INNER join tallas on atleta.id_talla=tallas.id GROUP BY talla";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function comprobarDatos()
	{
		$cc=Conexion::getInstance();
		//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
		$sql="SELECT atleta.id_talla FROM atleta WHERE atleta.id_talla=$this->id";
		$result=$cc->db->prepare($sql);
		$result->execute();
		$trae=$result->fetchAll();
		return ($trae);
	}
}

?>