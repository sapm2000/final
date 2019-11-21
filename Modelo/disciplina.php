<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Disciplina extends ClaseBase
{
	private $disciplina;

	public function setDisciplina($disciplina)
	{
		$this->disciplina = $disciplina;
	}

	public function getDisciplina()
	{
		return $this->disciplina;
	}


	public function getallactivas()
	{
		$cc=Conexion::getInstance();
		$sql="SELECT * FROM disciplinas WHERE disciplinas.activo=0";
		$result=$cc->db->prepare($sql);
		$result->execute();
		$trae=$result->fetchAll();
		return ($trae);
	}
	
	public function getallinactivas()
	{
		$cc=Conexion::getInstance();
		$sql="SELECT * FROM disciplinas WHERE disciplinas.activo=1";
		$result=$cc->db->prepare($sql);
		$result->execute();
		$trae=$result->fetchAll();
		return ($trae);
	}

	public function guardarDisciplina()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (disciplina) VALUES ('$this->disciplina')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarDisciplina()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE  $this->tabla SET disciplina='$this->disciplina' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}

	public function updatedis()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE disciplinas SET activo=1 WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}

	public function updatedis1()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE disciplinas SET activo=0 WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}

	public function updatemod()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE modalidades SET activo=1 WHERE id_disciplina=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}
}


?>