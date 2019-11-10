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

	public function setDisc($disc)
	{
		$this->disc = $disc;
	}

	public function getDisc()
	{
		return $this->disc;
	}

	public function setGloria($gloria)
	{
		$this->gloria = $gloria;
	}

	public function getGloria()
	{
		return $this->gloria;
	}

	public function setPrimer($primer)
	{
		$this->primer = $primer;
	}

	public function getPrimer()
	{
		return $this->primer;

	}
	public function setSegundo($segundo)
	{
		$this->segundo = $segundo;
	}

	public function getSegundo()
	{
		return $this->segundo;

	}




	public function todosBecas()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT atleta.nombre, atleta.id, atleta.apellido, atleta.cedula, becas.monto,becas.disc,cuenta.nac,cuenta.cedula AS ced , cuenta.numeroc FROM atleta INNER JOIN becas ON atleta.id=becas.id_atleta INNER JOIN cuenta ON cuenta.id_atleta=atleta.id WHERE NOT cuenta.numeroc='' and atleta.activo='0'";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function todosBecasgloriosos()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT atleta.nombre, atleta.id, atleta.apellido, atleta.cedula, becas_gloria.monto, becas_gloria.disc, cuenta.nac,cuenta.cedula AS ced , cuenta.numeroc FROM atleta INNER JOIN becas_gloria ON atleta.id=becas_gloria.id_atleta INNER JOIN cuenta ON cuenta.id_atleta=atleta.id WHERE NOT cuenta.numeroc='' and atleta.activo='2'";
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
		$sql = "SELECT atleta.nombre, atleta.id, atleta.apellido, atleta.cedula, becas.monto,cuenta.nac,cuenta.cedula AS ced , cuenta.numeroc, puente_disciplina.becar,disciplinas.disciplina FROM atleta LEFT OUTER JOIN becas ON atleta.id=becas.id_atleta INNER JOIN cuenta ON cuenta.id_atleta=atleta.id INNER JOIN puente_disciplina ON atleta.id=puente_disciplina.id_atleta INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id WHERE NOT cuenta.numeroc='' and atleta.activo='0' and becar=1";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function todosatletasgloriosos()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT atleta.nombre, atleta.id, atleta.apellido, atleta.cedula, becas_gloria.monto,cuenta.nac,cuenta.cedula AS ced , cuenta.numeroc, puente_disciplina.becar,disciplinas.disciplina FROM atleta LEFT OUTER JOIN becas_gloria ON atleta.id=becas_gloria.id_atleta INNER JOIN cuenta ON cuenta.id_atleta=atleta.id INNER JOIN puente_disciplina ON atleta.id=puente_disciplina.id_atleta INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id WHERE NOT cuenta.numeroc='' and atleta.activo='2' and becar=1";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function getDetalles()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT atleta.*, becas_total.monto,becas_total.disc FROM atleta INNER JOIN becas_total ON becas_total.id_atleta=atleta.id WHERE fecha='$this->fecha' and becas_total.nombre='$this->nombre'";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}
	public function getDetallesenca()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT * FROM becas_mes WHERE fecha='$this->fecha' and nombre='$this->nombre'";
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
		$sql = "INSERT INTO $this->tabla (id_atleta,monto,disc) VALUES ('$this->id_atleta','$this->monto','$this->disc')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}
	public function guardarPersonagloriosa()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO becas_gloria (id_atleta,monto,disc) VALUES ('$this->id_atleta','$this->monto','$this->disc')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}
	
	public function guardarRegistro()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO becas_total (id_atleta,monto,fecha,nombre,disc,gloria) VALUES ('$this->id_atleta','$this->monto','$this->fecha','$this->nombre','$this->disc','$this->gloria')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function guardarDefinitivo()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO becas_mes (fecha,montoT,becados,nombre,gloria) VALUES ('$this->fecha','$this->montoT','$this->becados','$this->nombre','$this->gloria')";
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

	public function truncar_gloria()
	{
		$con = Conexion::getInstance();
		$sql = "TRUNCATE TABLE becas_gloria";
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

	public function borrontotal()
	{
		$con = Conexion::getInstance();
		$sql = "DELETE FROM becas_total WHERE nombre='$this->nombre'";
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



	public function cuenta()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT COUNT(*) FROM becas_mes";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function becasfiltradas()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT * FROM becas_mes WHERE becas_mes.gloria=0 AND becas_mes.fecha BETWEEN  '$this->primer' AND '$this->segundo' 	";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function montogeneral()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT sum(becas_mes.montoT) AS montofinal FROM becas_mes WHERE becas_mes.gloria=0 AND becas_mes.fecha BETWEEN  '$this->primer' AND '$this->segundo' 	";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}


}

?>