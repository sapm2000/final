<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Beca extends ClaseBase
{
	private $beca;

	public function setId_atleta($id_atleta)
	{
		$this->id_atleta = $id_atleta;
	}

	public function getId_atleta()
	{
		return $this->id_atleta;
	}

	public function setMonto($monto)
	{
		$this->monto = $monto;
	}

	public function getMonto()
	{
		return $this->monto;
	}

	public function setMes($mes)
	{
		$this->mes = $mes;
	}

	public function getMes()
	{
		return $this->mes;
	}

	public function setAnio($anio)
	{
		$this->anio = $anio;
	}

	public function getAnio()
	{
		return $this->anio;
	}

	public function setMontoT($montoT)
	{
		$this->montoT = $montoT;
	}

	public function getMontoT()
	{
		return $this->montoT;
	}

	public function setBecados($becados)
	{
		$this->becados = $becados;
	}

	public function getBecados()
	{
		return $this->becados;
	}




	public function todosBecas()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT atleta.*, becas.monto FROM atleta LEFT OUTER JOIN becas ON atleta.id=becas.id_atleta";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}
	public function getDetalles()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT atleta.*, becas_total.monto FROM atleta INNER JOIN becas_total ON becas_total.id_atleta=atleta.id WHERE mes='$this->mes' AND anio='$this->anio'";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}
	
	public function todosTotal()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT * FROM becas_mes";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function guardarPersona()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (id_atleta,monto) VALUES ('$this->id_atleta','$this->monto')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}
	
	public function guardarRegistro()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO becas_total (id_atleta,monto,mes,anio) VALUES ('$this->id_atleta','$this->monto','$this->mes','$this->anio')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function guardarDefinitivo()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO becas_mes (mes,anio,montoT,Becados) VALUES ('$this->mes','$this->anio','$this->montoT','$this->becados')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function truncar()
	{
		$con = Conexion::getInstance();
		$sql = "TRUNCATE TABLE becas";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarPersona()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET beca='$this->beca' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}

	public function selexmax()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT MAX(id) FROM atleta";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

	//SELECT becas.id_atleta, becas.monto, atleta.cedula, atleta.nombre, atleta.apellido FROM becas INNER JOIN atleta ON becas.id_atleta=atleta.id
}

?>