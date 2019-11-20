<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Parentesco extends ClaseBase
{
	private $parentesco;

	public function setParentesco($parentesco)
	{
		$this->parentesco = $parentesco;
	}

	public function getParentesco()
	{
		return $this->parentesco;
	}


	
	public function guardarParentesco()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (parentesco) VALUES ('$this->parentesco')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarParentesco()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET parentesco='$this->parentesco' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}

	public function comprobarDatos()
	{
		$cc=Conexion::getInstance();
		//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
		$sql="SELECT atleta_representante.id_parentesco FROM atleta_representante WHERE atleta_representante.id_parentesco=$this->id";
		$result=$cc->db->prepare($sql);
		$result->execute();
		$trae=$result->fetchAll();
		return ($trae);
	}
}


?>