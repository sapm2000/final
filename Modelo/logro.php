<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Logro extends ClaseBase
{
	private $alergia;

	public function setTipo($tipo)
	{
		$this->tipo = $tipo;
	}

	public function getTipo()
	{
		return $this->tipo;
	}

	public function setPais($pais)
	{
		$this->pais = $pais;
	}

	public function getPais()
	{
		return $this->pais;
	}

	public function setEstado($estado)
	{
		$this->estado = $estado;
	}

	public function getEstado()
	{
		return $this->estado;
	}

	public function setCiudad($ciudad)
	{
		$this->ciudad = $ciudad;
	}

	public function getCiudad()
	{
		return $this->ciudad;
	}

	public function setDisciplina($disciplina)
	{
		$this->disciplina = $disciplina;
	}

	public function getDisciplina()
	{
		return $this->disciplina;
	}

	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

	public function getDescripcion()
	{
		return $this->descripcion;
	}

	public function setResultado($resultado)
	{
		$this->resultado = $resultado;
	}

	public function getResultado()
	{
		return $this->resultado;
	}

	public function setObservacion($observacion)
	{
		$this->observacion = $observacion;
	}

	public function getObservacion()
	{
		return $this->observacion;
	}

	public function setId_atleta($id_atleta)
	{
		$this->id_atleta = $id_atleta;
	}

	public function getId_atleta()
	{
		return $this->id_atleta;
	}

	public function setModi($modi)
	{
		$this->modi = $modi;
	}

	public function getModi()
	{
		return $this->modi;
	}

	public function setId_evento($id_evento)
	{
		$this->id_evento = $id_evento;
	}

	public function getId_evento()
	{
		return $this->id_evento;
	}


	
	public function guardarLogro()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (tipo,pais,estado,ciudad,disciplina,descripcion,resultado,observacion,id_atleta,modi,id_evento) VALUES ('$this->tipo','$this->pais','$this->estado','$this->ciudad','$this->disciplina','$this->descripcion','$this->resultado','$this->observacion','$this->id_atleta','$this->modi','$this->id_evento')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarLogro()
		{
			$con = Conexion::getInstance();
			$sql = "UPDATE logros SET tipo='$this->tipo', pais='$this->pais', estado='$this->estado', ciudad='$this->ciudad', disciplina='$this->disciplina', descripcion='$this->descripcion', resultado='$this->resultado', observacion='$this->observacion' WHERE id=$this->id";
			$result = $con->db->prepare($sql);
			$cambio = $result->execute();
			return $cambio;
		}

	public function getById_atleta()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT * FROM $this->tabla WHERE id_atleta=$this->id_atleta";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
			
		}

		public function deletetodo()
		{
			$cc = Conexion::getInstance();
			$sql = "DELETE FROM evento_participantes WHERE id_evento=$this->id_evento AND id_atleta=$this->id_atleta";
			$result = $cc->db->prepare($sql);
			$result->execute();
			return ($result);
		}
}

?>