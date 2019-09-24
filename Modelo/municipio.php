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
}
?>