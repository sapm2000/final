<?php 
require_once("../Config/ClaseBase.php");
class Municipio extends ClaseBase
{
	private $descrip;

	public function setDescrip($descrips)
	{
		$this->descrips = $descrips;
	}

	public function getDescrip()
	{
		return $this->descrips;
	}

	public function RegMunicipio()
	{
		$cc=Conexion::getInstance();
		$sql="INSERT INTO $this->tabla (descrips) VALUES ('$this->descrips')";
		$result=$cc->db->prepare($sql);
		$result->execute();
		return $result;
	}

	public function ModMunicipio($id)
	{
		$cc=Conexion::getInstance();
//		$sql="UPDATE municipio SET descrip='$this->descrip' WHERE id = :id";
		$sql="UPDATE $this->tabla SET descrips='$this->descrips' WHERE id = ".$id;
		$result = $cc->db->prepare($sql);
		$result->execute();
		return $result;
	}	

	public function updatemun()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE municipio SET activo=1 WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}

	public function updatemun1()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE municipio SET activo=0 WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}

	public function updatepar()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE parroquia SET activo=1 WHERE id_municipio=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}

	public function getAllactivos()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT * FROM municipio where activo=0";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function getAllinactivos()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT * FROM municipio where activo=1";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}
}
?>