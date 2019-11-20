<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Calzado extends ClaseBase
{
	private $calzado;

	public function setCalzado($calzado)
	{
		$this->calzado = $calzado;
	}

	public function getCalzado()
	{
		return $this->calzado;
	}


	
	public function guardarCalzado()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (calzado) VALUES ('$this->calzado')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarCalzado()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET calzado='$this->calzado' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}

	public function getreporte()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT calzado, COUNT(*) AS total from atleta INNER join calzados on atleta.id_calzado=calzados.id GROUP BY calzado";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function comprobarDatos()
	{
		$cc=Conexion::getInstance();
		//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
		$sql="SELECT atleta.id_calzado FROM atleta WHERE atleta.id_calzado=$this->id";
		$result=$cc->db->prepare($sql);
		$result->execute();
		$trae=$result->fetchAll();
		return ($trae);
	}
}

?>