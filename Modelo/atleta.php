<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Atleta extends ClaseBase
{
	private $cedula, $nombre, $apellido, $f_nac, $tipos, $estadoc, $sexo, $id_nivel,$n_eme,$n_tel,$correo,$id_municipio,$id_parroquia,$correol,$empresa,$id_municipio1,$id_parroquia1,$direccion1;

	public function setCedula($cedula)
	{
		$this->cedula = $cedula;
	}

	public function getCedula()
	{
		return $this->cedula;
	}

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

	public function setF_nac($f_nac)
	{
		$this->f_nac = $f_nac;
	}

	public function getF_nac()
	{
		return $this->f_nac;
	}

	public function setTipos($tipos)
	{
		$this->tipos = $tipos;
	}

	public function getTipos()
	{
		return $this->tipos;
	}

	public function setEstadoc($estadoc)
	{
		$this->estadoc = $estadoc;
	}

	public function getEstadoc()
	{
		return $this->estadoc;
	}

	public function setSexo($sexo)
	{
		$this->sexo = $sexo;
	}

	public function getSexo()
	{
		return $this->sexo;
	}

	public function setId_nivel($id_nivel)
	{
		$this->id_nivel = $id_nivel;
	}

	public function getId_nivel()
	{
		return $this->id_nivel;
	}

	public function setN_tel($n_tel)
	{
		$this->n_tel = $n_tel;
	}

	public function getN_tel()
	{
		return $this->n_tel;
	}

	public function setN_eme($n_eme)
	{
		$this->n_eme = $n_eme;
	}

	public function getN_eme()
	{
		return $this->n_eme;
	}

	public function setCorreo($correo)
	{
		$this->correo = $correo;
	}

	public function getCorreo()
	{
		return $this->correo;

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

	public function setDireccion($direccion)
	{
		$this->direccion = $direccion;
	}

	public function getDireccion()
	{
		return $this->direccion;
	}

	public function setId_atleta($id_atleta)
	{
		$this->id_atleta = $id_atleta;
	}

	public function getId_atleta()
	{
		return $this->id_atleta;
	}

	public function setId_discapacidad($id_discapacidad)
	{
		$this->id_discapacidad = $id_discapacidad;
	}

	public function getId_discapacidad()
	{
		return $this->id_discapacidad;
	}

	public function setId_alergia($id_alergia)
	{
		$this->id_alergia = $id_alergia;
	}

	public function getId_alergia()
	{
		return $this->id_alergia;
	}

	public function setId_disciplina($id_disciplina)
	{
		$this->id_disciplina = $id_disciplina;
	}

	public function getId_disciplina()
	{
		return $this->id_disciplina;
	}

	public function setId_modalidad($id_modalidad)
	{
		$this->id_modalidad = $id_modalidad;
	}

	public function getId_modalidad()
	{
		return $this->id_modalidad;
	}

	public function setId_estatus($id_estatus)
	{
		$this->id_estatus = $id_estatus;
	}

	public function getId_estatus()
	{
		return $this->id_estatus;
	}

	public function setId_talla($id_talla)
	{
		$this->id_talla = $id_talla;
	}

	public function getId_talla()
	{
		return $this->id_talla;
	}

	public function setId_calzado($id_calzado)
	{
		$this->id_calzado = $id_calzado;
	}

	public function getId_calzado()
	{
		return $this->id_calzado;
	}

	public function setPeso($peso)
	{
		$this->peso = $peso;
	}

	public function getPeso()
	{
		return $this->peso;

	}

	public function setAltura($altura)
	{
		$this->altura = $altura;
	}

	public function getAltura()
	{
		return $this->altura;

	}

	public function setMano($mano)
	{
		$this->mano = $mano;
	}

	public function getMano()
	{
		return $this->mano;

	}

	

	public function guardarAtleta()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (cedula,nombre,apellido,f_nac,tipos,estadoc,sexo,id_nivel,correo,n_tel,n_eme,id_municipio,id_parroquia,direccion) VALUES ('$this->cedula','$this->nombre','$this->apellido','$this->f_nac','$this->tipos','$this->estadoc','$this->sexo','$this->id_nivel','$this->correo','$this->n_tel','$this->n_eme','$this->id_municipio','$this->id_parroquia','$this->direccion')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
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
			$sql = "INSERT INTO datoll (correol,empresa,id_municipio1,id_parroquia1,direccion1,id_atleta) VALUES ('$this->correol','$this->empresa','$this->id_municipio1','$this->parroquia1','$this->direccion1','$this->id_atleta')";
			$result = $con->db->prepare($sql);
			$insert = $result->execute();
			return $insert;
		}	
		public function agregardatosc()
		{
			$con = Conexion::getInstance();
			$sql = "UPDATE atleta SET correo='$this->correo', n_tel='$this->n_tel', n_eme='$this->n_eme', id_municipio='$this->id_municipio', id_parroquia='$this->id_parroquia', direccion='$this->direccion' WHERE id=$this->id";
			$result = $con->db->prepare($sql);
			$cambio = $result->execute();
			return $cambio;
		}


		public function modificarDatosp()
		{
			$con = Conexion::getInstance();
			$sql = "UPDATE $this->tabla SET cedula='$this->cedula', nombre='$this->nombre', apellido='$this->apellido', f_nac='$this->f_nac', tipos='$this->tipos', estadoc='$this->estadoc', sexo='$this->sexo', id_nivel='$this->id_nivel' WHERE id=$this->id";
			$result = $con->db->prepare($sql);
			$cambio = $result->execute();
			return $cambio;
		}

		public function updateestado()
		{
			$con = Conexion::getInstance();
			$sql = "UPDATE atleta SET activo=1 WHERE id=$this->id";
			$result = $con->db->prepare($sql);
			$cambio = $result->execute();
			return $cambio;
		}

		public function updateestado1()
		{
			$con = Conexion::getInstance();
			$sql = "UPDATE atleta SET activo=0 WHERE id=$this->id";
			$result = $con->db->prepare($sql);
			$cambio = $result->execute();
			return $cambio;
		}

		public function getAllAtleta()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.*, tallas.talla, calzados.calzado FROM atleta LEFT OUTER JOIN tallas ON atleta.id_talla=tallas.id LEFT OUTER JOIN calzados ON atleta.id_calzado=calzados.id WHERE activo=0";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}
		public function getAllAtletai()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.*, tallas.talla, calzados.calzado FROM atleta LEFT OUTER JOIN tallas ON atleta.id_talla=tallas.id LEFT OUTER JOIN calzados ON atleta.id_calzado=calzados.id WHERE activo=1";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function todoslosatletas()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT cedula FROM atleta";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
			
		}

		public function detdiscapacidad()
		{
			$cc=Conexion::getInstance();
			//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
			$sql="SELECT id_discapacidad FROM puente_discapacidad WHERE id_atleta=$this->id_atleta";
			$result=$cc->db->prepare($sql);
			$result->execute();
			$trae=$result->fetchAll();
			return ($trae);
		}

		public function consdetDiscapacidad()
		{
			$cc=Conexion::getInstance();
			//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
			$sql="SELECT puente_discapacidad.id AS iddi, discapacidades.discapacidad, atleta.id FROM puente_discapacidad INNER JOIN discapacidades ON puente_discapacidad.id_discapacidad=discapacidades.id INNER JOIN atleta ON puente_discapacidad.id_atleta=atleta.id WHERE atleta.id=$this->id_atleta";
			$result=$cc->db->prepare($sql);
			$result->execute();
			$trae=$result->fetchAll();
			return ($trae);
		}

		public function guardarPuente1()
		{
			$con = Conexion::getInstance();
			$sql = "INSERT INTO puente_discapacidad (id_atleta,id_discapacidad) VALUES ('$this->id_atleta',$this->id_discapacidad)";
			$result = $con->db->prepare($sql);
			$insert = $result->execute();
			return $insert;
		}

		public function deletedisca()
		{
			$cc = Conexion::getInstance();
			$sql = "DELETE FROM puente_discapacidad WHERE id = $this->id";
			$result = $cc->db->prepare($sql);
			$result->execute();
			return ($result);
		}

		public function detalergias()
		{
			$cc=Conexion::getInstance();
			//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
			$sql="SELECT id_alergia FROM puente_alergia WHERE id_atleta=$this->id_atleta";
			$result=$cc->db->prepare($sql);
			$result->execute();
			$trae=$result->fetchAll();
			return ($trae);
		}

		public function consdetAlergia()
		{
			$cc=Conexion::getInstance();
			//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
			$sql="SELECT puente_alergia.id AS idal, alergias.alergia, atleta.id FROM puente_alergia INNER JOIN alergias ON puente_alergia.id_alergia=alergias.id INNER JOIN atleta ON puente_alergia.id_atleta=atleta.id WHERE atleta.id=$this->id_atleta";
			$result=$cc->db->prepare($sql);
			$result->execute();
			$trae=$result->fetchAll();
			return ($trae);
		}

		public function guardarPuente()
		{
			$con = Conexion::getInstance();
			$sql = "INSERT INTO puente_alergia (id_atleta,id_alergia) VALUES ('$this->id_atleta',$this->id_alergia)";
			$result = $con->db->prepare($sql);
			$insert = $result->execute();
			return $insert;
		}

		public function deleteAlergia()
		{
			$cc = Conexion::getInstance();
			$sql = "DELETE FROM puente_alergia WHERE id = $this->id";
			$result = $cc->db->prepare($sql);
			$result->execute();
			return ($result);
		}

		public function detdisciplinas()
		{
			$cc=Conexion::getInstance();
			//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
			$sql="SELECT id_modalidad FROM puente_disciplina WHERE id_atleta=$this->id_atleta";
			$result=$cc->db->prepare($sql);
			$result->execute();
			$trae=$result->fetchAll();
			return ($trae);
		}

		public function consdetDisciplina()
		{
			$cc=Conexion::getInstance();
			//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
			$sql="SELECT puente_disciplina.id AS iddis,estatus.estatu, disciplinas.disciplina,modalidades.modalidad, atleta.id FROM puente_disciplina INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id INNER JOIN atleta ON puente_disciplina.id_atleta=atleta.id INNER JOIN modalidades ON puente_disciplina.id_modalidad=modalidades.id INNER JOIN estatus ON puente_disciplina.id_estatus=estatus.id WHERE atleta.id=$this->id_atleta";
			$result=$cc->db->prepare($sql);
			$result->execute();
			$trae=$result->fetchAll();
			return ($trae);
		}

		public function guardarPuente2()
		{
			$con = Conexion::getInstance();
			$sql = "INSERT INTO puente_disciplina (id_atleta,id_disciplina,id_modalidad,id_estatus) VALUES ('$this->id_atleta','$this->id_disciplina','$this->id_modalidad','$this->id_estatus')";
			$result = $con->db->prepare($sql);
			$insert = $result->execute();
			return $insert;
		}

		public function deleteDisciplina()
		{
			$cc = Conexion::getInstance();
			$sql = "DELETE FROM puente_disciplina WHERE id = $this->id";
			$result = $cc->db->prepare($sql);
			$result->execute();
			return ($result);
		}

		public function getEstatus()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT * FROM puente_disciplina WHERE id=$this->id";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function modificarEstatus()
		{
			$con = Conexion::getInstance();
			$sql = "UPDATE puente_disciplina SET id_estatus='$this->id_estatus' WHERE id=$this->id";
			$result = $con->db->prepare($sql);
			$cambio = $result->execute();
			return $cambio;
		}

		public function modificarIndumentaria()
		{
			$con = Conexion::getInstance();
			$sql = "UPDATE $this->tabla SET id_talla='$this->id_talla', id_calzado='$this->id_calzado', altura='$this->altura', peso='$this->peso', mano='$this->mano' WHERE id=$this->id";
			$result = $con->db->prepare($sql);
			$cambio = $result->execute();
			return $cambio;
		}
}


?>