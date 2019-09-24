<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Datosl extends ClaseBase
{
	private $correol,$empresa,$id_municipio1,$id_parroquia1,$direccion1;

	

	public function setCorreol($correol)
	{
		$this->correol = $correol;
	}

	public function getCorreol()
	{
		return $this->correol;
	}

	public function setEmpresa($empresa)
	{
		$this->empresa = $empresa;
	}

	public function getEmpresa()
	{
		return $this->empresa;
	}

	public function setId_municipio1($id_municipio1)
	{
		$this->id_municipio1 = $id_municipio1;
	}

	public function getId_municipio1()
	{
		return $this->id_municipio1;
	}
	public function setId_parroquia1($id_parroquia1)
	{
		$this->id_parroquia1 = $id_parroquia1;
	}

	public function getId_parroquia1()
	{
		return $this->id_parroquia1;
	}

	public function setDireccion1($direccion1)
	{
		$this->direccion1 = $direccion1;
	}

	public function getDireccion1()
	{
		return $this->direccion1;
	}

	public function setId_atleta($id_atleta)
	{
		$this->id_atleta = $id_atleta;
	}

	public function getId_atleta()
	{
		return $this->id_atleta;
	}



		public function selecmax()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT MAX(id) FROM atleta";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}


		public function guardarDatos()
		{
			$con = Conexion::getInstance();
			$sql = "INSERT INTO datoll (correol,empresa,id_municipio1,id_parroquia1,direccion1,id_atleta) VALUES ('$this->correol','$this->empresa','$this->id_municipio1','$this->id_parroquia1','$this->direccion1','$this->id_atleta')";
			$result = $con->db->prepare($sql);
			$insert = $result->execute();
			return $insert;
		}	


		public function modificarDatosl()
		{
			$con = Conexion::getInstance();
			$sql = "UPDATE datoll SET correol='$this->correol', empresa='$this->empresa', id_municipio1='$this->id_municipio1', id_parroquia1='$this->id_parroquia1', direccion1='$this->direccion1' WHERE id_atleta=$this->id_atleta";
			$result = $con->db->prepare($sql);
			$cambio = $result->execute();
			return $cambio;
		}
		public function getByIdDatos()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT * FROM datoll WHERE id_atleta = $this->id_atleta";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}
}


?>