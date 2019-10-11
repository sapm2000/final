<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Cuenta extends ClaseBase
{
	private $cedulat,$nombret,$apellidot,$id_banco,$numeroc,$tipo,$id_atleta,$cod_banco;

	

	public function setCedulat($cedulat)
	{
		$this->cedulat = $cedulat;
	}

	public function getCedulat()
	{
		return $this->cedulat;
	}

	public function setNombret($nombret)
	{
		$this->nombret = $nombret;
	}

	public function getNombret()
	{
		return $this->nombret;
	}

	public function setApellidot($apellidot)
	{
		$this->apellidot = $apellidot;
	}

	public function getApellidot()
	{
		return $this->apellidot;
	}
	public function setId_banco($id_banco)
	{
		$this->id_banco = $id_banco;
	}

	public function getId_banco()
	{
		return $this->id_banco;
	}

	public function setNumeroc($numeroc)
	{
		$this->numeroc = $numeroc;
	}

	public function getNumeroc()
	{
		return $this->numeroc;
	}

	public function setTipo($tipo)
	{
		$this->tipo = $tipo;
	}

	public function getTipo()
	{
		return $this->tipo;
	}


	public function setId_atleta($id_atleta)
	{
		$this->id_atleta = $id_atleta;
	}

	public function getId_atleta()
	{
		return $this->id_atleta;
	}

	public function setCod_banco($cod_banco)
	{
		$this->cod_banco = $cod_banco;
	}

	public function getCod_banco()
	{
		return $this->cod_banco;
	}

	public function setNac($nac)
	{
		$this->nac = $nac;
	}

	public function getNac()
	{
		return $this->nac;

	}




	public function buscaid()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT id FROM bancos WHERE codigo = $this->cod_banco";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
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


		public function guardarCuenta()
		{
			$con = Conexion::getInstance();
			$sql = "INSERT INTO cuenta (cedula,nombre,apellido,id_banco,numeroc,tipo,id_atleta) VALUES ('$this->cedulat','$this->nombret','$this->apellidot','$this->id_banco','$this->numeroc','$this->tipo','$this->id_atleta')";
			$result = $con->db->prepare($sql);
			$insert = $result->execute();
			return $insert;
		}	


		public function modificarCuenta()
		{
			$con = Conexion::getInstance();
			$sql = "UPDATE $this->tabla SET nac='$this->nac', cedula='$this->cedulat', nombre='$this->nombret', apellido='$this->apellidot', id_banco='$this->id_banco', numeroc='$this->numeroc', tipo='$this->tipo' WHERE id_atleta=$this->id_atleta";
			$result = $con->db->prepare($sql);
			$cambio = $result->execute();
			return $cambio;
		}

		public function getByIdCuenta()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT * FROM cuenta WHERE id_atleta = $this->id_atleta";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getByIdAtleta()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT * FROM atleta WHERE id_atleta = $this->id_atleta";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}
}


?>