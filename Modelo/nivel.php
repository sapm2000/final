<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Nivel extends ClaseBase
{
	private $nivel;

	public function setNivel($nivel)
	{
		$this->nivel = $nivel;
	}

	public function getNivel()
	{
		return $this->nivel;
	}


	
	public function guardarNivel()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (nivel) VALUES ('$this->nivel')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarNivel()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET nivel='$this->nivel' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}

	public function comprobarDatos()
	{
		$cc=Conexion::getInstance();
		//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
		$sql="SELECT atleta.id_nivel FROM atleta WHERE atleta.id_nivel=$this->id";
		$result=$cc->db->prepare($sql);
		$result->execute();
		$trae=$result->fetchAll();
		return ($trae);
	}
}


?>