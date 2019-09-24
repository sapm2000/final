<?php
include('Conexion.php');
class ClaseBase
{
	private $id, $tabla;

	public function __construct()
	{
	} 

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setTabla($tabla)
	{
		$this->tabla = $tabla;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getTabla($tabla)
	{
		$this->tabla = $tabla;
	}	

	public function countAll()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT * FROM $this->tabla";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$num = $result->rowCount();
		return ($num);
	}

	public function getAllLimit($pos,$cols)
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT * FROM $this->tabla ";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function getAll()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT * FROM $this->tabla";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function getById()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT * FROM $this->tabla WHERE id = $this->id";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function deleteAll()
	{
		$cc = Conexion::getInstance();
		$sql = "DELETE FROM $this->tabla";
		$result = $cc->db->prepare($sql);
		$result->execute();
		return ($result);
	}

	public function deleteById()
	{
		$cc = Conexion::getInstance();
		$sql = "DELETE FROM $this->tabla WHERE id = $this->id";
		$result = $cc->db->prepare($sql);
		$result->execute();
		return ($result);
	}
}
?>