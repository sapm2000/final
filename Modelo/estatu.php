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


	
	public function guardarEstatus()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (estatu) VALUES ('$this->estatu')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarEstatus()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET estatu='$this->estatu' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}

	public function comprobarDatos()
	{
		$cc=Conexion::getInstance();
		//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
		$sql="SELECT puente_disciplina.id_estatus FROM puente_disciplina WHERE puente_disciplina.id_estatus=$this->id";
		$result=$cc->db->prepare($sql);
		$result->execute();
		$trae=$result->fetchAll();
		return ($trae);
	}
}


?>