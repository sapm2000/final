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

	public function setFecha($fecha)
	{
		$this->fecha = $fecha;
	}

	public function getFecha()
	{
		return $this->fecha;
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

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function getNombre()
	{
		return $this->nombre;
	}




	public function todosBecas()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT atleta.nombre, atleta.id, atleta.apellido, atleta.cedula, becas.monto,cuenta.nac,cuenta.cedula AS ced , cuenta.numeroc FROM atleta INNER JOIN becas ON atleta.id=becas.id_atleta INNER JOIN cuenta ON cuenta.id_atleta=atleta.id WHERE NOT cuenta.numeroc=''";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function todosBecas1()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT * FROM becas_mes";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}


	//

	public function todosatletas()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT atleta.nombre, atleta.id, atleta.apellido, atleta.cedula, becas.monto,cuenta.nac,cuenta.cedula AS ced , cuenta.numeroc FROM atleta LEFT OUTER JOIN becas ON atleta.id=becas.id_atleta INNER JOIN cuenta ON cuenta.id_atleta=atleta.id WHERE NOT cuenta.numeroc=''";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function getDetalles()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT atleta.*, becas_total.monto FROM atleta INNER JOIN becas_total ON becas_total.id_atleta=atleta.id WHERE fecha='$this->fecha'";
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
		$sql = "INSERT INTO becas_total (id_atleta,monto,fecha) VALUES ('$this->id_atleta','$this->monto','$this->fecha')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function guardarDefinitivo()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO becas_mes (fecha,montoT,Becados,nombre) VALUES ('$this->fecha','$this->montoT','$this->becados','$this->nombre')";
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

	public function borron()
	{
		$con = Conexion::getInstance();
		$sql = "DELETE FROM becas_mes WHERE nombre='$this->nombre'";
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

	public function selexmaxbeca()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT MAX(id) FROM becas_mes";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function selecid()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT count(*) FROM atleta";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function traemes()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT mes FROM becas_mes";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function traeanio()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT anio FROM becas_mes";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}


}

?>