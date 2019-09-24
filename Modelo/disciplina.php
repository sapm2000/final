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


	
	public function guardarPersona()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (disciplina) VALUES ('$this->disciplina')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarPersona()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE  $this->tabla SET disciplina='$this->disciplina' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}
}


?>