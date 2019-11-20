<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Discapacidad extends ClaseBase
{
	private $discapacidad;

	public function setDiscapacidad($discapacidad)
	{
		$this->discapacidad = $discapacidad;
	}

	public function getDiscapacidad()
	{
		return $this->discapacidad;
	}


	
	public function guardarDiscapacidad()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (discapacidad) VALUES ('$this->discapacidad')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarDiscapacidad()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET discapacidad='$this->discapacidad' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}

	public function comprobarDatos()
	{
		$cc=Conexion::getInstance();
		//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
		$sql="SELECT puente_discapacidad.id_discapacidad FROM puente_discapacidad WHERE puente_discapacidad.id_discapacidad=$this->id";
		$result=$cc->db->prepare($sql);
		$result->execute();
		$trae=$result->fetchAll();
		return ($trae);
	}
}


?>