<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Representante extends ClaseBase
{
	private $cedula, $nombre, $apellido, $n_tel, $correo;

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function getNombre()
	{
		return $this->nombre;
	}
	public function setApellido($apellido)
	{
		$this->apellido = $apellido;
	}

	public function getApellido()
	{
		return $this->apellido;
	}

	public function setCedula($cedula)
	{
		$this->cedula = $cedula;
	}

	public function getCedula()
	{
		return $this->cedula;
	}

	

	public function setN_tel($n_tel)
	{
		$this->n_tel = $n_tel;
	}

	public function getN_tel()
	{
		return $this->n_tel;
	}



	public function setCorreo($correo)
	{
		$this->correo = $correo;
	}

	public function getCorreo()
	{
		return $this->correo;
	}



	public function setCedula_a($cedula_a)
	{
		$this->cedula_a = $cedula_a;
	}

	public function getCedula_a()
	{
		return $this->cedula_a;
	}

	public function setId_atleta($id_atleta)
	{
		$this->id_atleta = $id_atleta;
	}

	public function getId_atleta()
	{
		return $this->id_atleta;
	}

	public function setId_parentesco($id_parentesco)
	{
		$this->id_parentesco = $id_parentesco;
	}

	public function getId_parentesco()
	{
		return $this->id_parentesco;
	}

	public function setId_representante($id_representante)
	{
		$this->id_representante = $id_representante;
	}

	public function getId_representante()
	{
		return $this->id_representante;
	}


	
	public function guardarpuenterepre()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO atleta_representante (id_representante,id_atleta,id_parentesco) VALUES ('$this->id_representante','$this->id_atleta','$this->id_parentesco')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function getByIdAtleta()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT id FROM atleta WHERE cedula = $this->cedula_a";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
			
		}

		public function selecmax()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT MAX(id) FROM representantes";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

	public function guardarRepresentante()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (cedula,nombre,apellido,n_tel,correo) VALUES ('$this->cedula','$this->nombre','$this->apellido','$this->n_tel','$this->correo')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarRepresentante()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET cedula='$this->cedula', nombre='$this->nombre', apellido='$this->apellido', n_tel='$this->n_tel', correo='$this->correo' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}
	
	public function condet()
	{
		$cc=Conexion::getInstance();
		//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
		$sql="	SELECT atleta_representante.id, atleta_representante.id_representante AS carajo, atleta.cedula, atleta.nombre, atleta.apellido, parentescos.parentesco FROM atleta_representante INNER JOIN atleta ON atleta_representante.id_atleta=atleta.id INNER JOIN parentescos ON atleta_representante.id_parentesco=parentescos.id WHERE id_representante=$this->id_representante";
		$result=$cc->db->prepare($sql);
		$result->execute();
		$trae=$result->fetchAll();
		return ($trae);
	}

	public function deleteById1()
	{
		$cc = Conexion::getInstance();
		$sql = "DELETE FROM atleta_representante WHERE id = $this->id";
		$result = $cc->db->prepare($sql);
		$result->execute();
		return ($result);
	}

	public function todoslosatletas()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT id_atleta FROM atleta_representante WHERE id_representante = $this->id_representante";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
			
		}

		public function todoslosrepresentantes()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT cedula FROM representantes";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
			
		}

		public function todoslosatletasreg()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT id_atleta FROM atleta_representante";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
			
		}

		public function getallrepre()
	{
		$cc=Conexion::getInstance();
		
		$sql="SELECT representantes.*, atleta.cedula AS atl, parentescos.parentesco FROM atleta_representante INNER JOIN representantes ON atleta_representante.id_representante=representantes.id INNER JOIN atleta ON atleta_representante.id_atleta=atleta.id INNER JOIN parentescos ON atleta_representante.id_parentesco=parentescos.id";
		$result=$cc->db->prepare($sql);
		$result->execute();
		$trae=$result->fetchAll();
		return ($trae);
	}

		public function deletePuente()
	{
		$cc = Conexion::getInstance();
		$sql = "DELETE FROM atleta_representante WHERE id_representante = $this->id";
		$result = $cc->db->prepare($sql);
		$result->execute();
		return ($result);
	}

	public function Todosmenos1()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT id_atleta FROM atleta_representante WHERE id_representante= $this->id_representante";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
		
	}

	public function esterepre()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT cedula FROM representantes WHERE id=$this->id";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
			
		}

}


?>
