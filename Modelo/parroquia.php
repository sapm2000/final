<?php
require_once("../Config/ClaseBase.php");
class Parroquia extends ClaseBase
{
	private $descrip, $id_municipio;

	public function setDescrip($descrip)
	{
		$this->descrip = $descrip;
	}

	public function getDescrip()
	{
		return $this->descrip;
	}

	public function setId_municipio($id_municipio)
	{
		$this->id_municipio = $id_municipio;
	}

	public function getId_municipio()
	{
		return $this->id_municipio;
	}

	public function RegParroquia()
	{
		$cc=Conexion::getInstance();
		$sql="INSERT INTO $this->tabla (descrip, id_municipio) VALUES ('$this->descrip', $this->id_municipio)";
		$result=$cc->db->prepare($sql);
		$result->execute();
		return ($result);
	}

	public function consDetParroquia()
	{
		$cc=Conexion::getInstance();
		//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
		$sql="SELECT parroquia.*,municipio.descrips AS std FROM parroquia INNER JOIN municipio ON municipio.id=parroquia.id_municipio where parroquia.activo=0";
		$result=$cc->db->prepare($sql);
		$result->execute();
		$trae=$result->fetchAll();
		return ($trae);
	}

	public function consDetParroquiai()
	{
		$cc=Conexion::getInstance();
		//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
		$sql="SELECT parroquia.*,municipio.descrips AS std FROM parroquia INNER JOIN municipio ON municipio.id=parroquia.id_municipio where parroquia.activo=1";
		$result=$cc->db->prepare($sql);
		$result->execute();
		$trae=$result->fetchAll();
		return ($trae);
	}

	public function ModParroquia($id)
	{
		$cc=Conexion::getInstance();
		$sql="UPDATE $this->tabla SET descrip='$this->descrip', id_municipio=$this->id_municipio WHERE id= ".$id;
		$result=$cc->db->prepare($sql);
		$result->execute();
		return ($result);
	}

	public function updatepar()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE parroquia SET activo=1 WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}

	public function updatepar1()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE parroquia SET activo=0 WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}

	public function getAllactivos()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT * FROM parroquia where activo=0";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function updatemun1()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE municipio SET activo=0 WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}


}
?>