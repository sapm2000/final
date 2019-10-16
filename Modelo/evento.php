<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Evento extends ClaseBase
{
	private $nombre, $fecha_inicio, $fecha_cierre, $descripcion, $id_disciplina;

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function getNombre()
	{
		return $this->nombre;
	}
	public function setFecha_Inicio($fecha_inicio)
	{
		$this->fecha_inicio = $fecha_inicio;
	}

	public function getFecha_Inicio()
	{
		return $this->fecha_inicio;
	}

	public function setFecha_Cierre($fecha_cierre)
	{
		$this->fecha_cierre = $fecha_cierre;
	}

	public function getFecha_cierre()
	{
		return $this->fecha_cierre;
	}

	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

	public function getDescripcion()
	{
		return $this->descripcion;
	}
	public function setId_disciplina($id_disciplina)
	{
		$this->id_disciplina = $id_disciplina;
	}

	public function getId_disciplina()
	{
		return $this->id_disciplina;
	}
	public function setId_municipio($id_municipio)
	{
		$this->id_municipio = $id_municipio;
	}

	public function getId_municipio()
	{
		return $this->id_municipio;
	}
	public function setId_parroquia($id_parroquia)
	{
		$this->id_parroquia = $id_parroquia;
	}

	public function getId_parroquia()
	{
		return $this->id_parroquia;
	}

	public function setId_evento($id_evento)
	{
		$this->id_evento = $id_evento;
	}

	public function getId_evento()
	{
		return $this->id_evento;
	}

	public function setCedula($cedula)
	{
		$this->cedula = $cedula;
	}

	public function getCedula()
	{
		return $this->cedula;
	}

	public function setId_atleta($id_atleta)
	{
		$this->id_atleta = $id_atleta;
	}

	public function getId_atleta()
	{
		return $this->id_atleta;
	}	

	public function setPosicion($posicion)
	{
		$this->posicion = $posicion;
	}

	public function getPosicion()
	{
		return $this->posicion;
	}

	public function setParti($parti)
	{
		$this->parti = $parti;
	}

	public function getParti()
	{
		return $this->parti;
	}

	public function setCanti($canti)
	{
		$this->canti = $canti;
	}

	public function getCanti()
	{
		return $this->canti;
	}

	public function setMaxpo($maxpo)
	{
		$this->maxpo = $maxpo;
	}

	public function getMaxpo()
	{
		return $this->maxpo;
	}

	public function setActual($actual)
	{
		$this->actual = $actual;
	}

	public function getActual()
	{
		return $this->actual;
	}

	public function setObservacion($observacion)
	{
		$this->observacion = $observacion;
	}

	public function getObservacion()
	{
		return $this->observacion;
	}


	


	
	public function guardarEvento()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (nombre,fecha_inicio,fecha_cierre,descripcion,id_disciplina,id_municipio,id_parroquia,maxpo,parti,canti,actual) VALUES ('$this->nombre','$this->fecha_inicio','$this->fecha_cierre','$this->descripcion','$this->id_disciplina','$this->id_municipio','$this->id_parroquia','$this->maxpo','$this->parti','$this->canti','$this->actual')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}
	public function consDetdisciplina()
	{
		$cc=Conexion::getInstance();
		$sql="SELECT eventos.*,disciplinas.disciplina AS std, municipio.descrips,parroquia.descrip FROM eventos INNER JOIN disciplinas ON disciplinas.id=eventos.id_disciplina INNER JOIN municipio ON municipio.id=eventos.id_municipio INNER JOIN parroquia ON parroquia.id=eventos.id_parroquia";
		//SELECT eventos.*,disciplinas.disciplina AS std, municipio.descrip,parroquia.descrip, parroquia.id FROM eventos INNER JOIN disciplinas ON disciplinas.id=eventos.id_disciplina INNER JOIN municipio ON municipio.id=eventos.id_municipio INNER JOIN parroquia ON parroquia.id=eventos.id_parroquia
		$result=$cc->db->prepare($sql);
		$result->execute();
		$trae=$result->fetchAll();
		return ($trae);
	}

	public function selecmax()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT MAX(id) FROM eventos";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function modificarEvento()
		{
			$con = Conexion::getInstance();
			$sql = "UPDATE $this->tabla SET nombre='$this->nombre', fecha_inicio='$this->fecha_inicio', fecha_cierre='$this->fecha_cierre', descripcion='$this->descripcion', id_disciplina='$this->id_disciplina', id_municipio='$this->id_municipio', id_parroquia='$this->id_parroquia', maxpo='$this->maxpo', canti='$this->canti', parti='$this->parti' WHERE id=$this->id";
			$result = $con->db->prepare($sql);
			$cambio = $result->execute();
			return $cambio;
		}

		public function consdetparticipante()
	{
		$cc=Conexion::getInstance();
		//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
		$sql="SELECT evento_participantes.posicion, evento_participantes.id_atleta, evento_participantes.observacion,evento_participantes.id_evento AS tonto, evento_participantes.id,atleta.nombre,atleta.apellido,atleta.cedula FROM evento_participantes INNER JOIN atleta ON evento_participantes.id_atleta=atleta.id WHERE id_evento=$this->id_evento";
		$result=$cc->db->prepare($sql);
		$result->execute();
		$trae=$result->fetchAll();
		return ($trae);
	}	

	public function consDetdisciplina1()
	{
		$cc=Conexion::getInstance();
		$sql="SELECT eventos.*,disciplinas.disciplina AS std, municipio.descrips,parroquia.descrip FROM eventos INNER JOIN disciplinas ON disciplinas.id=eventos.id_disciplina INNER JOIN municipio ON municipio.id=eventos.id_municipio INNER JOIN parroquia ON parroquia.id=eventos.id_parroquia WHERE eventos.id=$this->id_evento";
		//SELECT eventos.*,disciplinas.disciplina AS std, municipio.descrip,parroquia.descrip, parroquia.id FROM eventos INNER JOIN disciplinas ON disciplinas.id=eventos.id_disciplina INNER JOIN municipio ON municipio.id=eventos.id_municipio INNER JOIN parroquia ON parroquia.id=eventos.id_parroquia
		$result=$cc->db->prepare($sql);
		$result->execute();
		$trae=$result->fetchAll();
		return ($trae);
	}

	public function deleteById1()
	{
		$cc = Conexion::getInstance();
		$sql = "DELETE FROM evento_participantes WHERE id = $this->id";
		$result = $cc->db->prepare($sql);
		$result->execute();
		return ($result);
	}

	public function buscaid()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT id FROM atleta WHERE cedula = $this->cedula";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function losatletasdeesteevento()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT id_atleta FROM evento_participantes WHERE id_evento= $this->id_evento";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
		
	}

	public function guargarPuente()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO evento_participantes (id_evento,id_atleta,posicion,observacion) VALUES ('$this->id_evento','$this->id_atleta','$this->posicion','$this->observacion')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function guardarA()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET actual='$this->actual' WHERE id=$this->id_evento";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}

	public function buscaActual()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT actual FROM $this->tabla WHERE id=$this->id_evento";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function buscaCiudad()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT municipio.descrips FROM eventos INNER JOIN municipio ON eventos.id_municipio=municipio.id WHERE eventos.id=$this->id_evento";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function buscaDisciplina()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT disciplinas.disciplina FROM eventos INNER JOIN disciplinas ON eventos.id_disciplina=disciplinas.id WHERE eventos.id=$this->id_evento";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function buscaDescripcion()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT descripcion FROM eventos WHERE id=$this->id_evento";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function consultaPosicion()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT posicion FROM evento_participantes WHERE id_evento=$this->id_evento AND posicion=$this->posicion";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function consultarTodo()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT id FROM evento_participantes WHERE id_evento=$this->id";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function consultaPosicionmodi()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT posicion FROM evento_participantes WHERE id_evento=$this->id AND posicion=$this->posicion";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}
	
	public function deletetodo()
	{
		$cc = Conexion::getInstance();
		$sql = "DELETE FROM logros WHERE id_evento=$this->id_evento AND id_atleta=$this->id_atleta";
		$result = $cc->db->prepare($sql);
		$result->execute();
		return ($result);
	}

}


?>